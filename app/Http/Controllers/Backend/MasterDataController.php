<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kadar;
use App\Models\Merk;
use App\Models\ModelBarang;
use App\Models\Pabrik;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules;
use PDO;
use Termwind\Components\Dd;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }


    public function userIndex(Request $request)
    {
        $users   =   User::all();
        if ($request->ajax()) {
            $users   =   User::all();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('email', function ($item) {
                    return $item->email;
                })
                ->addColumn('role', function ($item) {
                    return ucfirst($item->role);
                })
                ->addColumn('phone_number', function ($item) {
                    return $item->phone_number;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->user_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->user_id . '"><span class="material-icons btn-sm">visibility_off</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('masterdata.data-user', compact('users'));
    }

    public function userStore(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'email' => 'required|email',
            'role' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password'
        ], [
            'name.required' => 'Name Must Be Included!',
            'email.required' => 'Email Must Be Included!',
            'phone_number.required' => 'Phone Number Must Be Included!',
            'role.required' => 'Position Must Be Included',
            'password' => 'Password Must be at least 8 Characters',
            'password_confirmation' => 'Password Confirmation Must be at least 8 Characters',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // insert data to table user 
        $user = User::updateOrCreate([
            'user_id' => $request->user_id
        ], [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->role);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function userEdit(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        return response()->json($user);
    }

    public function userDestroy(Request $request)
    {
        $user = User::find($request->user_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);
    }

    public function pabrikIndex(Request $request)
    {
        //dd("asasas");
        $pabriks   =   Pabrik::all();
        if ($request->ajax()) {
            $pabriks   =   Pabrik::all();
            return DataTables::of($pabriks)
                ->addIndexColumn()
                ->addColumn('name', function ($item) {
                    return ucfirst($item->pabrik_nama);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">' . ucfirst($item->status) . '</div>';
                    } else {
                        $status = '<div class="badge bg-danger">' . ucfirst($item->status) . '</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {
                    if ($item->status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->pabrik_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->pabrik_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-pabrik', compact('pabriks'));
    }

    public function pabrikStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'pabrik_nama' => 'required',

        ], [
            'pabrik_nama.required' => 'Pabrik Nama Must be included!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the last counter value from cache
        $counter = Cache::increment('counter', 1, 1);

        // Generate the new ID
        $newId = $datePart . sprintf(
            "%03d",
            $counter
        );

        $pabrik = Pabrik::find($request->pabrik_id);

        if (isset($pabrik)) {
            Pabrik::updateOrCreate([
                'pabrik_id' => $request->pabrik_id
            ], [
                'pabrik_nama' => $request->pabrik_nama
            ]);
        } else {
            Pabrik::updateOrCreate([
                'pabrik_id' => $newId
            ], [
                'pabrik_nama' => $request->pabrik_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function pabrikEdit(Request $request)
    {
        $pabrik = Pabrik::where('pabrik_id', $request->pabrik_id)->first();
        return response()->json($pabrik);
    }

    public function pabrikDestroy(Request $request)
    {
        $pabrik = Pabrik::where('pabrik_id', $request->pabrik_id)->first();

        if ($pabrik->status == 'aktif') {
            $pabrik->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $pabrik->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }

    public function kadarIndex(Request $request)
    {
        $kadars   =   Kadar::all();
        if ($request->ajax()) {
            $kadars   =   Kadar::all();
            return DataTables::of($kadars)
                ->addIndexColumn()
                ->addColumn('kadar_nama', function ($item) {
                    return ucfirst($item->kadar_nama);
                })
                ->addIndexColumn()
                ->addColumn('kadar_harga_jual_1', function ($item) {
                    return  'Rp.' . number_format($item->kadar_harga_jual_1);
                })
                ->addIndexColumn()
                ->addColumn('kadar_harga_jual_2', function ($item) {
                    return 'Rp.' . number_format($item->kadar_harga_jual_2);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">' . ucfirst($item->status) . '</div>';
                    } else {
                        $status = '<div class="badge bg-danger">' . ucfirst($item->status) . '</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {

                    if ($item->status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->kadar_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->kadar_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-kadar', compact('kadars'));
    }

    public function kadarStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'kadar_nama' => 'required',
            'kadar_harga_jual_1' => 'required',
            'kadar_harga_jual_2' => 'required',
        ], [
            'kadar_nama.required' => 'Nama Pabrik Must be included!',
            'kadar_harga_jual_1.required' => 'Harga Jual 1 Must be included!',
            'kadar_harga_jual_2.required' => 'Harga Jual 2 Must be included!',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the last counter value from cache
        $counter = Cache::increment('counter', 1, 1);

        // Generate the new ID
        $newId = $datePart . sprintf(
            "%03d",
            $counter
        );

        $kadar = Kadar::find($request->kadar_id);

        if (isset($kadar)) {
            Kadar::updateOrCreate([
                'kadar_id' => $kadar->kadar_id,
            ], [
                'kadar_nama' => $request->kadar_nama,
                'kadar_harga_jual_1' => $request->kadar_harga_jual_1,
                'kadar_harga_jual_2' => $request->kadar_harga_jual_2
            ]);
        } else {
            Kadar::updateOrCreate([
                'kadar_id' => $newId
            ], [
                'kadar_nama' => $request->kadar_nama,
                'kadar_harga_jual_1' => $request->kadar_harga_jual_1,
                'kadar_harga_jual_2' => $request->kadar_harga_jual_2
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function kadarEdit(Request $request)
    {
        $kadar = Kadar::where('kadar_id', $request->kadar_id)->first();
        return response()->json($kadar);
    }

    public function kadarDestroy(Request $request)
    {
        $kadar = Kadar::where('kadar_id', $request->kadar_id)->first();

        if ($kadar->status == 'aktif') {
            $kadar->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $kadar->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }

    public function modelIndex(Request $request)
    {
        //dd("asasas");
        $models   =   ModelBarang::all();
        if ($request->ajax()) {
            $models   =   ModelBarang::all();
            return DataTables::of($models)
                ->addIndexColumn()
                ->addColumn('model_nama', function ($item) {
                    return ucfirst($item->model_nama);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">' . ucfirst($item->status) . '</div>';
                    } else {
                        $status = '<div class="badge bg-danger">' . ucfirst($item->status) . '</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {
                    if ($item->status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->model_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->model_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-model', compact('models'));
    }

    public function modelStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'model_nama' => 'required',
        ], [
            'model_nama.required' => 'Nama Model Must be included!',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the last counter value from cache
        $counter = Cache::increment('counter', 1, 1);

        // Generate the new ID
        $newId = $datePart . sprintf(
            "%03d",
            $counter
        );

        $model = ModelBarang::find($request->model_id);

        if (isset($model)) {
            ModelBarang::updateOrCreate([
                'model_id' => $request->model_id,
            ], [
                'model_nama' => $request->model_nama
            ]);
        } else {
            ModelBarang::updateOrCreate([
                'model_id' => $newId
            ], [
                'model_nama' => $request->model_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function modelEdit(Request $request)
    {
        //dd($request->all());
        $model = ModelBarang::where('model_id', $request->model_id)->first();
        return response()->json($model);
    }

    public function modelDestroy(Request $request)
    {
        $model = ModelBarang::where('model_id', $request->model_id)->first();

        if ($model->status == 'aktif') {
            $model->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $model->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }

    public function supplierIndex(Request $request)
    {
        //dd("asasas");
        $suppliers   =   Supplier::all();
        if ($request->ajax()) {
            $suppliers   =   Supplier::all();
            return DataTables::of($suppliers)
                ->addIndexColumn()
                ->addColumn('supplier_nama', function ($item) {
                    return ucfirst($item->supplier_nama);
                })
                ->addIndexColumn()
                ->addColumn('supplier_alamat', function ($item) {
                    return ucfirst($item->supplier_alamat);
                })
                ->addIndexColumn()
                ->addColumn('supplier_no_telp', function ($item) {
                    return ucfirst($item->supplier_no_telp);
                })
                ->addIndexColumn()
                ->addColumn('supplier_kota', function ($item) {
                    return ucfirst($item->supplier_kota);
                })
                ->addIndexColumn()
                ->addColumn('supplier_pengurus', function ($item) {
                    return ucfirst($item->supplier_pengurus);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">' . ucfirst($item->status) . '</div>';
                    } else {
                        $status = '<div class="badge bg-danger">' . ucfirst($item->status) . '</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {

                    if ($item->status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->supplier_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->supplier_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-supplier', compact('suppliers'));
    }

    public function supplierStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'supplier_nama' => 'required',
            'supplier_alamat' => 'required',
            'supplier_no_telp' => 'required',
            'supplier_kota' => 'required',
            'supplier_pengurus' => 'required',
        ], [
            'supplier_nama.required' => 'Nama Supplier Must be included!',
            'supplier_alamat.required' => 'Alamat Must be included!',
            'supplier_no_telp.required' => 'No Telp Must be included!',
            'supplier_kota.required' => 'Kota Must be included!',
            'supplier_pengurus.required' => 'Pengurus Must be included!',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the last counter value from cache
        $counter = Cache::increment('counter', 1, 1);

        // Generate the new ID
        $newId = $datePart . sprintf("%03d",
            $counter
        );

        $supplier = Supplier::find($request->supplier_id);

        if (isset($supplier)) {
            Supplier::updateOrCreate([
                'supplier_id' => $supplier->supplier_id
            ], [
                'supplier_nama' => $request->supplier_nama,
                'supplier_alamat' => $request->supplier_alamat,
                'supplier_no_telp' => $request->supplier_no_telp,
                'supplier_kota' => $request->supplier_kota,
                'supplier_pengurus' => $request->supplier_pengurus
            ]);
        } else {
            Supplier::updateOrCreate([
                'supplier_id' => $newId,
            ], [
                'supplier_nama' => $request->supplier_nama,
                'supplier_alamat' => $request->supplier_alamat,
                'supplier_no_telp' => $request->supplier_no_telp,
                'supplier_kota' => $request->supplier_kota,
                'supplier_pengurus' => $request->supplier_pengurus
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function supplierEdit(Request $request)
    {
        //dd($request->all());
        $supplier = Supplier::where('supplier_id', $request->supplier_id)->first();
        return response()->json($supplier);
    }

    public function supplierDestroy(Request $request)
    {

        $supplier = Supplier::where('supplier_id', $request->supplier_id)->first();

        if ($supplier->status == 'aktif') {
            $supplier->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $supplier->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }

    public function merkIndex(Request $request)
    {
        //dd("asasas");
        $merks   =   Merk::all();
        if ($request->ajax()) {
            $merks   =   Merk::all();
            return DataTables::of($merks)
                ->addIndexColumn()
                ->addColumn('merk_nama', function ($item) {
                    return ucfirst($item->merk_nama);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">' . ucfirst($item->status) . '</div>';
                    } else {
                        $status = '<div class="badge bg-danger">' . ucfirst($item->status) . '</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {
                    if ($item->status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->merk_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->merk_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-merk', compact('merks'));
    }

    public function merkStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'merk_nama' => 'required',
        ], [
            'merk_nama.required' => 'Nama Merk Must be included!',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the last counter value from cache
        $counter = Cache::increment('counter', 1, 1);

        // Generate the new ID
        $newId = $datePart . sprintf("%03d", $counter);

        $merk = Merk::find($request->merk_id);

        if (isset($merk)) {
            Merk::updateOrCreate([
                'merk_id' => $merk->merk_id,
            ], [
                'merk_nama' => $request->merk_nama
            ]);
        } else {
            Merk::updateOrCreate([
                'merk_id' => $newId,
            ], [
                'merk_nama' => $request->merk_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function merkEdit(Request $request)
    {
        //dd($request->all());
        $merk = Merk::where('merk_id', $request->merk_id)->first();
        return response()->json($merk);
    }

    public function merkDestroy(Request $request)
    {

        $merk = Merk::where('merk_id', $request->merk_id)->first();

        if ($merk->status == 'aktif') {
            $merk->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $merk->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }
}
