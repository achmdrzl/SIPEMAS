<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kadar;
use App\Models\Merk;
use App\Models\ModelBarang;
use App\Models\Pabrik;
use App\Models\Supplier;
use App\Models\TransaksiInOut;
use App\Models\User;
use DateTime;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\Eloquent\Model;
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
    // INDEX DASHBOARD
    public function index()
    {
        return view('dashboard');
    }

    // INDEX USER
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

    // USER STORED DATA
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

    // USER EDIT DATA
    public function userEdit(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        return response()->json($user);
    }

    // USER DELETE DATA
    public function userDestroy(Request $request)
    {
        $user = User::find($request->user_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);
    }

    // PABRIK INDEX
    public function pabrikIndex(Request $request)
    {
        //dd("asasas");
        $pabriks   =   Pabrik::all();
        if ($request->ajax()) {
            $pabriks   =   Pabrik::all();
            return DataTables::of($pabriks)
                ->addIndexColumn()
                ->addColumn('pabrik_kode', function ($item) {
                    return ucfirst($item->pabrik_kode);
                })
                ->addColumn('pabrik_nama', function ($item) {
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

    // PABTIK STORED DATA
    public function pabrikStore(Request $request)
    {
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

        // Check if any records exist
        if (Pabrik::count() === 0) {
            $initialId = '01';
        } else {
            // Retrieve the last record from the table
            $lastRecord = Pabrik::latest()->first();

            // Retrieve the last custom code
            $lastCode = $lastRecord->pabrik_kode;

            // Increment the last code by 1
            $nextCode = sprintf("%02d", intval($lastCode) + 1);

            $initialId = $nextCode;
        }

        // Define the model name
        $modelName = 'Pabrik';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if ($lastDate !== $datePart) {
            // Reset the counter
            $counter = 1;
            Cache::put($modelName . '_counter', $counter);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

        // Generate the new ID
        $newId = $datePart . sprintf("%03d", $counter);

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
                'pabrik_kode' => $initialId,
                'pabrik_nama' => $request->pabrik_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // PABRIK EDIT
    public function pabrikEdit(Request $request)
    {
        $pabrik = Pabrik::where('pabrik_id', $request->pabrik_id)->first();
        return response()->json($pabrik);
    }

    // PABRIK UPDATE STATUS
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

    // KADAR INDEX
    public function kadarIndex(Request $request)
    {
        $kadars   =   Kadar::all();
        if ($request->ajax()) {
            $kadars   =   Kadar::all();
            return DataTables::of($kadars)
                ->addIndexColumn()
                ->addColumn('kadar_kode', function ($item) {
                    return ucfirst($item->kadar_kode);
                })
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

    // KADAR STORED DATA
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

        // Check if any records exist
        if (Kadar::count() === 0) {
            $initialId = '01';
        } else {
            // Retrieve the last record from the table
            $lastRecord = Kadar::latest()->first();

            // Retrieve the last custom code
            $lastCode = $lastRecord->kadar_kode;

            // Increment the last code by 1
            $nextCode = sprintf("%02d", intval($lastCode) + 1);

            $initialId = $nextCode;
        }

        // Define the model name
        $modelName = 'Kadar';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if ($lastDate !== $datePart) {
            // Reset the counter
            $counter = 1;
            Cache::put($modelName . '_counter', $counter);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

        // Generate the new ID
        $newId = $datePart . sprintf("%03d", $counter);

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
                'kadar_kode' => $initialId,
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

    // KADAR EDIT DATA
    public function kadarEdit(Request $request)
    {
        $kadar = Kadar::where('kadar_id', $request->kadar_id)->first();
        return response()->json($kadar);
    }

    // KADAR UPDATE DATA
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

    // MODEL INDEX
    public function modelIndex(Request $request)
    {
        //dd("asasas");
        $models   =   ModelBarang::all();
        if ($request->ajax()) {
            $models   =   ModelBarang::all();
            return DataTables::of($models)
                ->addIndexColumn()
                ->addColumn('model_kode', function ($item) {
                    return ucfirst($item->model_kode);
                })
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

    // MODEL STORED DATA
    public function modelStore(Request $request)
    {
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

        // Check if any records exist
        if (ModelBarang::count() === 0) {
            $initialId = '01';
        } else {
            // Retrieve the last record from the table
            $lastRecord = ModelBarang::latest()->first();

            // Retrieve the last custom code
            $lastCode = $lastRecord->model_kode;

            // Increment the last code by 1
            $nextCode = sprintf("%02d", intval($lastCode) + 1);

            $initialId = $nextCode;
        }

        // Define the model name
        $modelName = 'ModelBarang';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if ($lastDate !== $datePart) {
            // Reset the counter
            $counter = 1;
            Cache::put($modelName . '_counter', $counter);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

        // Generate the new ID
        $newId = $datePart . sprintf("%03d", $counter);

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
                'model_kode' => $initialId,
                'model_nama' => $request->model_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // MODEL EDIT DATA
    public function modelEdit(Request $request)
    {
        $model = ModelBarang::where('model_id', $request->model_id)->first();
        return response()->json($model);
    }

    // MODEL UPDATE STATUS
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

    // SUPPLIER INDEX
    public function supplierIndex(Request $request)
    {
        $suppliers   =   Supplier::all();
        if ($request->ajax()) {
            $suppliers   =   Supplier::all();
            return DataTables::of($suppliers)
                ->addIndexColumn()
                ->addColumn('supplier_kode', function ($item) {
                    return ucfirst($item->supplier_kode);
                })
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

    // SUPPLIER STORED DATA
    public function supplierStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'supplier_nama' => 'required',
            'supplier_alamat' => 'required',
            'supplier_no_telp' => 'required',
            'supplier_kota' => 'required',
        ], [
            'supplier_nama.required' => 'Nama Supplier Must be included!',
            'supplier_alamat.required' => 'Alamat Must be included!',
            'supplier_no_telp.required' => 'No Telp Must be included!',
            'supplier_kota.required' => 'Kota Must be included!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Check if any records exist
        if (Supplier::count() === 0) {
            $initialId = '01';
        } else {
            // Retrieve the last record from the table
            $lastRecord = Supplier::latest()->first();

            // Retrieve the last custom code
            $lastCode = $lastRecord->supplier_kode;

            // Increment the last code by 1
            $nextCode = sprintf("%02d", intval($lastCode) + 1);

            $initialId = $nextCode;
        }

        // Define the model name
        $modelName = 'Supplier';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if ($lastDate !== $datePart) {
            // Reset the counter
            $counter = 1;
            Cache::put($modelName . '_counter', $counter);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

        // Generate the new ID
        $newId = $datePart . sprintf("%03d", $counter);

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
                'supplier_kode' => $initialId,
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

    // SUPPLIER EDIT DATA
    public function supplierEdit(Request $request)
    {
        $supplier = Supplier::where('supplier_id', $request->supplier_id)->first();
        return response()->json($supplier);
    }

    // SUPPLIER UPDATE STATUS
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

    // MERK INDEX
    public function merkIndex(Request $request)
    {
        $merks   =   Merk::all();
        if ($request->ajax()) {
            $merks   =   Merk::all();
            return DataTables::of($merks)
                ->addIndexColumn()
                ->addColumn('merk_kode', function ($item) {
                    return ucfirst($item->merk_kode);
                })
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

    // MERK STORED DATA
    public function merkStore(Request $request)
    {
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

        // Check if any records exist
        if (Merk::count() === 0) {
            $initialId = '01';
        } else {
            // Retrieve the last record from the table
            $lastRecord = Merk::latest()->first();

            // Retrieve the last custom code
            $lastCode = $lastRecord->merk_kode;

            // Increment the last code by 1
            $nextCode = sprintf("%02d", intval($lastCode) + 1);

            $initialId = $nextCode;
        }

        // Define the model name
        $modelName = 'Merk';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if ($lastDate !== $datePart) {
            // Reset the counter
            $counter = 1;
            Cache::put($modelName . '_counter', $counter);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

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
                'merk_kode' => $initialId,
                'merk_nama' => $request->merk_nama
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // MERK EDIT DATA
    public function merkEdit(Request $request)
    {
        //dd($request->all());
        $merk = Merk::where('merk_id', $request->merk_id)->first();
        return response()->json($merk);
    }

    // MERK UPDATE STATUS
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

    // TRANSAKSI IN & OUT INDEX
    public function transaksi_in_out(Request $request)
    {
        if ($request->ajax()) {
            $datas   =   TransaksiInOut::all();
            return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('kode_transaksi', function ($item) {
                    return ucfirst($item->kode_transaksi);
                })
                ->addColumn('tgl_transaksi', function ($item) {
                    return $item->tgl_transaksi;
                })
                ->addColumn('jenis_transaksi', function ($item) {
                    return ucfirst($item->jenis_transaksi);
                })
                ->addColumn('total', function ($item) {
                    return 'Rp.' . number_format($item->total);
                })
                ->addColumn('keterangan', function ($item) {
                    return ucfirst($item->keterangan);
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="transaksi-edit" data-id="' . $item->kode_transaksi . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="transaksi-delete" data-id="' . $item->kode_transaksi . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('transaksi.transaksi-in_out');
    }

    // STORE DATA TRANSAKSI IN OUT 
    public function transaksiInOutStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'tgl_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ], [
            'tgl_transaksi.required' => 'Tanggal Transaksi Must be included!',
            'jenis_transaksi.required' => 'Jenis Transaksi Must be included!',
            'total.required' => 'Total Transaksi Must be included!',
            'keterangan.required' => 'Keterangan Transaksi Must be included!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Define the model name
        $modelName = 'TransaksiInOut';

        // Get the current date and time
        $currentTime = DateTime::createFromFormat('Y-m-d', $request->tgl_transaksi);

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Check if the counter needs to be reset for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');
        if ($lastDate !== $datePart) {
            // Reset the counter for the specific model
            Cache::put($modelName . '_counter', 1);
            Cache::put($modelName . '_counter_date',
                $datePart
            );
        }

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Generate the new ID
        $newId = 'KB' . $datePart . sprintf("%03d", $counter);

        // Increment the counter for the next ID for the specific model
        Cache::increment($modelName . '_counter');

        $transaksi = TransaksiInOut::find($request->transaksi_id);

        if (isset($transaksi)) {
            TransaksiInOut::updateOrCreate([
                'transaksi_id' => $transaksi->transaksi_id,
            ], [
                'tgl_transaksi' => $request->tgl_transaksi,
                'jenis_transaksi' => $request->jenis_transaksi,
                'total' => $request->total,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            TransaksiInOut::updateOrCreate([
                'transaksi_id' => $newId,
            ], [
                'kode_transaksi' => $newId,
                'tgl_transaksi' => $request->tgl_transaksi,
                'jenis_transaksi' => $request->jenis_transaksi,
                'total' => $request->total,
                'keterangan' => $request->keterangan,
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // TRANSAKSI IN OUT EDIT DATA
    public function transaksiInOutEdit(Request $request)
    {
        $transaksi = TransaksiInOut::where('transaksi_id', $request->transaksi_id)->first();
        return response()->json($transaksi);
    }

    // TRANKSAKSI IN OUT DELETE DATA
    public function transaksiInOutDestroy(Request $request)
    {
        $transaksi = TransaksiInOut::where('kode_transaksi', $request->transaksi_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);
    }

    // TRANSAKSI HUTANG INDEX
    public function transaksiHutang(Request $request)
    {
        return view('transaksi.transaksi-hutang');
    }
}
