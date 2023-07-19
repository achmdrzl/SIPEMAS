<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\Kadar;
use App\Models\Merk;
use App\Models\ModelBarang;
use App\Models\Pabrik;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasterBarangController extends Controller
{
    // public function barangIndex()
    // {
    //     return view('masterdata.dummy');
    // }

    //////////////LOKASI///////////
    //-blm dipajang = sdh beli
    //-tejual = sudah terjual
    //-etalase = sdh pindah etalase
    //-kosong(" ") = belum beli
    //-cuci, lebur, reparasi
    //

    public function barangIndex(Request $request)
    {
        ///////////////////////
        //////////////////////
        ///barang////////////
        $barangs   =   Barang::all();
        $models = ModelBarang::all();
        $pabriks = Pabrik::all();
        $suppliers = Supplier::all();
        $kadars = Kadar::all();
        $detail_barangs = DetailBarang::all();
        if ($request->ajax()) {
            $barangs   =   Barang::all();

            return datatables::of($barangs)
                ->addIndexColumn()
                ->addColumn('barang_nama', function ($item) {
                    $barang_nama = '<div class="media align-items-center">
                                <div class="media-head me-2">
                                    <div class="avatar avatar-xs avatar-rounded">
                                        <img src="' . $item->barang_foto . '"
                                        alt="user" class="avatar-img">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="text-high-em">' . ucfirst($item->barang_nama) . '</div>
                                    <div class="fs-7" class="table-link-text link-medium-em">' . $item->barang_kode . ' </div>
                                </div>
                            </div>';
                    return $barang_nama;
                })
                ->addIndexColumn()
                ->addColumn('barang_berat', function ($item) {
                    return  $item->barang_berat;
                })
                ->addIndexColumn()
                ->addColumn('model_id', function ($item) {
                    $temp_model = ModelBarang::find($item->model_id);
                    return  ucfirst($temp_model->model_nama);
                })
                ->addIndexColumn()
                ->addColumn('pabrik_id', function ($item) {
                    $temp_pabrik = Pabrik::find($item->pabrik_id);
                    return  ucfirst($temp_pabrik->pabrik_nama);
                })
                ->addIndexColumn()
                ->addColumn('supplier_id', function ($item) {
                    $temp_supplier = Supplier::find($item->supplier_id);
                    return  ucfirst($temp_supplier->supplier_nama);
                })
                ->addIndexColumn()
                ->addColumn('kadar_id', function ($item) {
                    $temp_kadar = Kadar::find($item->kadar_id);
                    return  ucfirst($temp_kadar->kadar_nama);
                })
                ->addIndexColumn()
                ->addColumn('barang_lokasi', function ($item) {
                    return  ucfirst($item->barang_lokasi);
                })
                ->addIndexColumn()
                ->addColumn('barang_kondisi', function ($item) {
                    return  ucfirst($item->barang_kondisi);
                })
                ->addColumn('barang_status', function ($item) {
                    if ($item->barang_status == 'aktif') {
                        $barang_status = '<div class="badge bg-success">' . ucfirst($item->barang_status) . '</div>';
                    } else {
                        $barang_status = '<div class="badge bg-danger">' . ucfirst($item->barang_status) . '</div>';
                    }
                    return $barang_status;
                })
                ->addColumn('action', function ($item) {

                    if ($item->barang_status == 'aktif') {
                        $icon = 'visibility_off';
                        $button = 'danger';
                    } else {
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1" id="user-edit" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm" >edit</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    $btn = $btn . '<button onclick="tesdetail(' . $item->barang_id . ')" class="btn btn-icon btn-warning btn-rounded flush-soft-hover me-1" id="barang-detail"  data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">dvr</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" id="barang-etalase" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">store</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" id="barang-barcode" data-id="' . $item->barang_id . '"><span class="material-icons btn-sm">print</span></button>';
                    return $btn;
                })
                ->rawColumns(['barang_nama', 'barang_status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-barang', compact('barangs', 'models', 'pabriks', 'suppliers', 'kadars', 'detail_barangs'));
    }

    public function barangStore(Request $request)
    {
        //return response()->json(['errors' => "masok pak eko"]);
        //define validation rules  
        //dd($request->input('barang_kode'));

        //klo multi input validatornya gimana
        $validator = Validator::make($request->all(), [
            'barang_nama' => 'required',
            'supplier_id' => 'required',
            'pabrik_id' => 'required',
            'barang_berat' => 'required',
            'kadar_id' => 'required',
            'model_id' => 'required',
        ], [
            'barang_nama.required' => 'Nama Barang Must be included!',
            'supplier_id.required' => 'Supplier Must be included!',
            'pabrik_id.required' => 'Pabrik Must be included!',
            'barang_berat.required' => 'Berat Must be included!',
            'kadar_id.required' => 'Kadar Must be included!',
            'model_id.required' => 'Model Must be included!',

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


        // get status from checkbox
        $status = "";
        if ($request->has('barang_status')) {
            $status = "aktif";
        } else {
            $status = "non-aktif";
        }

        $barang = Barang::find($request->barang_id);

        //upload or replace photo
        $path = $request->file('barang_foto');

        $filename = "";
        if (isset($barang)) {
            $filename = "foto_barang/" . $request->input('barang_nama') . "_" . $barang->barang_id . ".jpg";
        } else {
            $filename = "foto_barang/" . $request->input('barang_nama') . "_" . $newId . ".jpg";
        }

        $location = public_path('/foto_barang');
        $path->move($location, $filename);

        if (isset($barang)) {
            Barang::updateOrCreate([
                'barang_id' => $barang->barang_id,
            ], [
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'barang_kondisi' => $request->barang_kondisi,
                'barang_berat' => $request->barang_berat,
                'supplier_id' => $request->supplier_id,
                'pabrik_id' => $request->pabrik_id,
                'kadar_id' => $request->kadar_id,
                'model_id' => $request->model_id,
                'barang_foto' => $filename,
                'barang_status' => $status
            ]);
        } else {
            Barang::updateOrCreate([
                'barang_id' => $newId
            ], [
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'barang_kondisi' => $request->barang_kondisi,
                'barang_berat' => $request->barang_berat,
                'supplier_id' => $request->supplier_id,
                'pabrik_id' => $request->pabrik_id,
                'kadar_id' => $request->kadar_id,
                'model_id' => $request->model_id,
                'barang_foto' => $filename,
                'barang_status' => $status
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    public function barangEdit(Request $request)
    {
        $barang = Barang::where('barang_id', $request->barang_id)->first();
        return response()->json($barang);
    }

    public function barangDetail($barang_id, Request $request)
    {
        
        $barangs   =   DetailBarang::where('barang_id', $barang_id)->get();
        if ($request->ajax()) {
            //sudah masuk barang id nya
            $buatCompare = $request->barang_id;
            // $barangs   =   DetailBarang::all();

            //$data->where('name', 'LIKE', "%$searchValue%");
            //$name = $request->input('name');
            //$request->query('name');
            //return $barangs;
            //sdh betul querynya
            //sudah terikirim data tabelnya tpi di view ngk tampil
            //kalau detail all bisa
            //return response()->json($barangs);
            return datatables::of($barangs)
                ->addIndexColumn()
                ->addColumn('detail_barang_no_transaksi', function ($item) {
                    return $item->detail_barang_no_transaksi;
                })
                ->addIndexColumn()
                ->addColumn('detail_barang_berat', function ($item) {
                    return  $item->detail_barang_berat;
                })
                ->addColumn('detail_barang_harga_jual', function ($item) {
                    return  $item->detail_barang_harga_jual;
                })
                ->addColumn('detail_barang_harga_beli', function ($item) {
                    return  $item->detail_barang_harga_beli;
                })
                ->addColumn('created_at', function ($item) {
                    return  $item->created_at;
                })
                ->addColumn('detail_barang_keterangan', function ($item) {
                    return  $item->detail_barang_keterangan;
                })
                ->addColumn('detail_barang_kondisi', function ($item) {
                    return  $item->detail_barang_kondisi;
                })
                ->rawColumns(['detail_barang_kondisi', 'detail_barang_kondisi', 'detail_barang_kondisi'])
                ->make(true);
        }
        // return DataTables::of($jurnals)->toJson();

        return response()->json($barangs);
    }

    public function barangDestroy(Request $request)
    {
        $barang = Barang::where('barang_id', $request->barang_id)->first();

        if ($barang->barang_status == 'aktif') {
            $status = 'non-aktif';
            $barang->update([
                'barang_status' => 'non-aktif',
            ]);
        } else {
            $status = 'aktif';
            $barang->update([
                'barang_status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Set to ' . $status . ' Successfully!']);
    }

    public function barangPindahEtalase(Request $request)
    {
        $barang = Barang::where('barang_id', $request->barang_id)->first();
        $barang->update([
            'barang_lokasi' => 'etalase',
        ]);

        return response()->json(['status' => 'Data is Moved to Etalase Successfully!']);
    }
}
