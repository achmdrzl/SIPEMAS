<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kadar;
use App\Models\Merk;
use App\Models\ModelBarang;
use App\Models\Pabrik;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
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

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->user_id . '"><span class="material-icons btn-sm">delete</span></button>';

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
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->pabrik_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->pabrik_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
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

        Pabrik::updateOrCreate([
            'pabrik_id' => $request->pabrik_id
        ], [
            'pabrik_nama' => $request->pabrik_nama
        ]);

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
        $pabrik = Pabrik::find($request->pabrik_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

    }

    public function kadarIndex(Request $request)
    {
        //dd("asasas");
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
                    return ucfirst($item->kadar_harga_jual_1);
                }) 
                ->addIndexColumn()
                ->addColumn('kadar_harga_jual_2', function ($item) {
                    return ucfirst($item->kadar_harga_jual_2);
                }) 
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->kadar_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->kadar_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('masterdata.data-kadar', compact('kadars'));
    }

    public function kadarStore(Request $request)
    { 
        // dd($request->all());
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

        Kadar::updateOrCreate([
            'kadar_id' => $request->kadar_id
        ], [
            'kadar_nama' => $request->kadar_nama,
            'kadar_harga_jual_1' => $request->kadar_harga_jual_1,
            'kadar_harga_jual_2' => $request->kadar_harga_jual_2
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function kadarEdit(Request $request)
    {
        //dd($request->all());
        $kadar = Kadar::where('kadar_id', $request->kadar_id)->first();
        return response()->json($kadar);
    }

    public function kadarDestroy(Request $request)
    {
        $kadar = Kadar::find($request->kadar_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

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
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->model_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->model_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
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

        ModelBarang::updateOrCreate([
            'model_id' => $request->model_id
        ], [
            'model_nama' => $request->model_nama
        ]);

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
        $model = ModelBarang::find($request->model_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

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
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->supplier_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->supplier_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
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

        Supplier::updateOrCreate([
            'supplier_id' => $request->supplier_id
        ], [
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_no_telp' => $request->supplier_no_telp,
            'supplier_kota' => $request->supplier_kota,
            'supplier_pengurus' => $request->supplier_pengurus
        ]);

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
        $supplier = Supplier::find($request->supplier_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

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
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->merk_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->merk_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
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

        Merk::updateOrCreate([
            'merk_id' => $request->merk_id
        ], [
            'merk_nama' => $request->merk_nama
        ]);

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
        Merk::find($request->merk_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

    }

    public function barangIndex(Request $request)
    {
        //dd("asasas");
        $barangs   =   Barang::all();
        if ($request->ajax()) {
            $barangs   =   Barang::all();
            return DataTables::of($barangs)
                ->addIndexColumn()
                ->addColumn('barang_nama', function ($item) {
                    return ucfirst($item->barang_nama);
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-danger btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">delete</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('masterdata.data-barang', compact('barangs'));
    }

    public function barangStore(Request $request)
    { 
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'barang_nama' => 'required',  
        ], [
            'barang_nama.required' => 'Nama Barang Must be included!', 

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } 

        Barang::updateOrCreate([
            'barang_id' => $request->barang_id
        ], [
            'barang_nama' => $request->barang_nama
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function barangEdit(Request $request)
    {
        //dd($request->all());
        $barang = Barang::where('barang_id', $request->barang_id)->first();
        return response()->json($barang);
    }

    public function barangDestroy(Request $request)
    {
        Barang::find($request->barang_id)->delete();

        return response()->json(['status' => 'Data Deleted Successfully!']);

    }
}
