<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules;
use PDO;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function supplierIndex()
    {
        return view('masterdata.data-supplier');
    }

    public function modelIndex()
    {
        return view('masterdata.data-model');
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
}
