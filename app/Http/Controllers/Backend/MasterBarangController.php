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
use Milon\Barcode\DNS1D;
use Yajra\DataTables\Facades\DataTables;  
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use PDF;
use Psy\Readline\Hoa\Console;

class MasterBarangController extends Controller
{
    // protected $barcodeGeneratorService;
    // public function __construct(BarcodeGeneratorService $barcodeGeneratorService)
    // {
    //     $this->barcodeGeneratorService = $barcodeGeneratorService;
    // }

    // public function generatePDF()
    // {
    //     $barcodeTexts = ['123456', '789012', '345678']; // Replace with your barcode texts

    //     $barcodes = [];
    //     foreach ($barcodeTexts as $text) {
    //         $barcodes[] = [
    //             'text' => $text,
    //             'image' => $this->barcodeGeneratorService->generateBarcode($text)
    //         ];
    //     }

    //     $pdf = PDF::loadView('barcode.pdf', ['barcodes' => $barcodes]);
    //     return $pdf->stream('barcodes.pdf');
    // }
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
        //dd("masuk controller brang index");
        

        $barangs   =   Barang::all();
        $models = ModelBarang::all();
        $pabriks = Pabrik::all();
        $suppliers = Supplier::all();
        $kadars = Kadar::all();
        $detail_barangs = DetailBarang::all();

        ///////tidak bisa masuk ke ajax
        if ($request->ajax()) {
            $barangs   =   Barang::all();
            //dd("masuk controller brang index");
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


        //////////////////////////
        ////////testing
  

        //dd($formData['supplier']);
        $formData = $request->input('data');
        //dd($formData); 
 
        $validator = Validator::make($request->all(), [
            'data.nama.*' => 'required',
            'data.supplier.*' => 'required',
            'data.pabrik.*' => 'required',
            'data.berat.*' => 'required',
            'data.kadar.*' => 'required',
            'data.model.*' => 'required',
        ], [
            'data.nama.*.required' => 'Nama Barang Must be included!',
            'data.supplier.*.required' => 'Supplier Must be included!',
            'data.pabrik.*.required' => 'Pabrik Must be included!',
            'data.berat.*.required' => 'Berat Must be included!',
            'data.kadar.*.required' => 'Kadar Must be included!',
            'data.model.*.required' => 'Model Must be included!', 
        ]);  
        //check if validation fails 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
  

        //masuk sini untuk create/update satu2
        $dataCount = count($formData['id']); 
        $pictures = $request->file('pictures');  
        $masukedit =1;
        $cekedit = Barang::find($formData['id'][0]);  
        if(isset($cekedit)){ 
            $masukedit =0;
        }
        // try { 
        //     $cekedit = Barang::find($formData['id'][0]); 
        //     print_r($cekedit);
        // } catch (\Exception $e) {
        //     $masukedit = 0;
        // }
        
        for ($i = 0; $i < $dataCount; $i++) {
            //cek status per item
            $status = ""; 
            //tidak bisa pake if has status biasa, sudah di coba, ngk masuk di else nya, return error
            try {
                //agak aneh tapi work
                if ($formData['status'][$i]=="on" || $formData['status'][$i]=="aktif") {
                    $status = "aktif";
                } 
                else{
                    $status = "non-aktif"; 
                }
            } catch (\Exception $e) { 
                $status = "non-aktif"; 
            }
            //dd($status); 
            //if means update else mean create new barang
            if (isset($cekedit)) {   
                $barang = Barang::find($formData['id'][$i]);
                $filename = "";  
                //tidak bisa pake if has file biasa, sudah di coba, ngk masuk di else nya, return error 
                try {
                    $path = $pictures[$i];
                    $filename = "foto_barang/" . $formData['nama'][$i] . "_" . $formData['id'][$i] . ".jpg";
                    $location = public_path('/foto_barang');
                    $path->move($location, $filename);
                } catch (\Exception $e) { 
                    $filename = ""; 
                } 
                if($filename == ""){
                    Barang::updateOrCreate([
                        'barang_id' => $barang->barang_id,
                    ], [
                        'barang_kode' => $formData['kode'][$i],
                        'barang_nama' => $formData['nama'][$i],
                        'barang_kondisi' => $formData['kondisi'][$i],
                        'barang_berat' => $formData['berat'][$i],
                        'supplier_id' => $formData['supplier'][$i],
                        'pabrik_id' => $formData['pabrik'][$i],
                        'kadar_id' => $formData['kadar'][$i],
                        'model_id' => $formData['model'][$i], 
                        'barang_status' => $status
                    ]);
                }
                else{
                    Barang::updateOrCreate([
                        'barang_id' => $barang->barang_id,
                    ], [
                        'barang_kode' => $formData['kode'][$i],
                        'barang_nama' => $formData['nama'][$i],
                        'barang_kondisi' => $formData['kondisi'][$i],
                        'barang_berat' => $formData['berat'][$i],
                        'supplier_id' => $formData['supplier'][$i],
                        'pabrik_id' => $formData['pabrik'][$i],
                        'kadar_id' => $formData['kadar'][$i],
                        'model_id' => $formData['model'][$i],
                        'barang_foto' => $filename,
                        'barang_status' => $status
                    ]);
                }
                
    
            } 
            else {   
                //////////////bikin id baru
                //210003
                //2 digit tahun
                //4 no urut
                // Get the current date and time
                $currentTime = Carbon::now(); 
                $datePart = $currentTime->format('yy');
                $datePart = substr($datePart, 0, 2);
                $all_barang = Barang::all();
                $counter =1;
                $digitid = "";
                foreach ($all_barang as $barang) {
                    $digitid = substr($barang->barang_id, 0, 2); 
                    if($datePart == $digitid){
                        $counter++;
                    }
                } 
                $nourut = str_pad($counter, 4, "0", STR_PAD_LEFT);
                $newId = $datePart.$nourut;
                $filename = "";
                 
                try {
                    $path = $pictures[$i];
                    $filename = "foto_barang/" . $formData['nama'][$i] . "_" . $newId . ".jpg";
                    $location = public_path('/foto_barang');
                    $path->move($location, $filename); 
                } catch (\Exception $e) { 
                    $filename = ""; 
                } 
             
                Barang::updateOrCreate([ 
                    'barang_id' => (int)$newId,
                    'barang_kode' => $formData['kode'][$i],
                    'barang_nama' => $formData['nama'][$i],
                    'barang_kondisi' => $formData['kondisi'][$i],
                    'barang_berat' => $formData['berat'][$i],
                    'supplier_id' => $formData['supplier'][$i],
                    'pabrik_id' => $formData['pabrik'][$i],
                    'kadar_id' => $formData['kadar'][$i],
                    'model_id' => $formData['model'][$i],
                    'barang_foto' => $filename,
                    'barang_status' => $status
                ]);
            } 
        }
   
        //return response
        //return response()->json(['errors' => "test"]);

        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!'
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

        // return DataTables::of($jurnals)->toJson();

        //dd($request->query('age'));
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
    public function generatepdf($barang_id, Request $request)
    {
        //dd($barang_id);
        $barcodeHTML = DNS1D::getBarcodeHTML($barang_id, 'CODABAR', 2, 50);

        $tes = "<h1>halo halo</h1>";
        $pdf = PDF::loadView('masterdata.pdf-barcode', ['data' => $barcodeHTML]); 
        return $pdf->download('barcode.pdf');
    }
    public function barangBarcode(Request $request)
    {
         

        $barang_id = $request->barang_id;

        // return DataTables::of($jurnals)->toJson();

        //dd($request->query('age'));
        $barcodeHTML = DNS1D::getBarcodeHTML($barang_id, 'CODABAR', 2, 50);
        //$barcodeHTML = DNS1D::getBarcodeSVG('4445645656', 'CODABAR');   
        return response()->json($barcodeHTML);
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
            'barang_lokasi' => 'ETALASE',
        ]);

        return response()->json(['status' => 'Data is Moved to Etalase Successfully!']);
    }
}
