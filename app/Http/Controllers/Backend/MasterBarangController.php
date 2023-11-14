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
use Barryvdh\DomPDF\PDF;
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
use Illuminate\Support\Facades\Storage;
use Psy\Readline\Hoa\Console;

class MasterBarangController extends Controller
{
    //////////////LOKASI///////////
    //-blm dipajang = sdh beli
    //-tejual = sudah terjual
    //-etalase = sdh pindah etalase
    //-kosong(" ") = belum beli
    //-cuci, lebur, reparasi

    // INDEX BARANG
    public function barangIndex(Request $request)
    {
        $barangs    = Barang::all();
        $models     = ModelBarang::all();
        $pabriks    = Pabrik::all();
        $suppliers  = Supplier::all();
        $kadars     = Kadar::all();

        $countBerat = Barang::sum('barang_berat');

        if ($request->ajax()) {
            $barangs   =   Barang::latest()->get();

            return datatables::of($barangs)
                ->addIndexColumn()
                ->addColumn('barang_nama', function ($item) {
                    $barang_nama = '<div class="media align-items-center">
                                <div class="media-head me-2">
                                    <div class="avatar avatar-xs avatar-rounded">
                                        <a href="' . asset('storage/foto_barang/' . $item->barang_foto) . '" download>
                                            <img src="' . asset('storage/foto_barang/' . $item->barang_foto) . '" alt="user" class="avatar-img">
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="text-high-em">' . ucfirst($item->barang_nama) . '</div>
                                    <div class="fs-7" class="table-link-text link-medium-em">' . $item->barang_kode . ' </div>
                                </div>
                            </div>';
                    return $barang_nama;
                })
                ->addColumn('barang_berat', function ($item) {
                    return number_format($item->barang_berat, 2);
                })
                ->addColumn('model_id', function ($item) {
                    $temp_model = ModelBarang::find($item->model_id);
                    return  ucfirst($temp_model->model_nama);
                })
                ->addColumn('pabrik_id', function ($item) {
                    $temp_pabrik = Pabrik::find($item->pabrik_id);
                    return  ucfirst($temp_pabrik->pabrik_nama);
                })
                ->addColumn('supplier_id', function ($item) {
                    $temp_supplier = Supplier::find($item->supplier_id);
                    return  ucfirst($temp_supplier->supplier_nama);
                })
                ->addColumn('kadar_id', function ($item) {
                    $temp_kadar = Kadar::find($item->kadar_id);
                    return  ucfirst($temp_kadar->kadar_nama);
                })
                ->addColumn('barang_lokasi', function ($item) {
                    return  ucfirst($item->barang_lokasi);
                })
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
                        $text = 'NON-AKTIFKAN';
                    } else {
                        $text = 'AKTIFKAN';
                        $button = 'success';
                        $icon = 'visibility';
                    }

                    $btn = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" id="barang-edit" data-id="' . $item->barang_id . '" title="EDIT BARANG"><span class="material-icons btn-sm" >edit</span></button>';

                    // $btn = $btn . '<button class="btn btn-icon btn-' . $button . ' btn-rounded flush-soft-hover me-1" id="user-delete" data-id="' . $item->barang_id . '" title="' . $text . ' BARANG"><span class="material-icons btn-sm">' . $icon . '</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" id="barang-etalase" data-id="' . $item->barang_id . '" title="PINDAH ETALASE"><span class="material-icons btn-sm">store</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" id="barang-barcode" data-id="' . $item->barang_id . '" data-berat="' . $item->barang_berat . '" data-kadar="' . $item->kadar->kadar_nama . '" data-model="' . $item->model->model_nama . '" data-kode="' . $item->barang_kode . '" title="CETAK BARCODE"><span class="material-icons btn-sm">print</span></button>';
                    return $btn;
                })
                ->rawColumns(['barang_nama', 'barang_status', 'action'])
                ->make(true);
        }
        return view('masterdata.data-barang', compact('barangs', 'models', 'pabriks', 'suppliers', 'kadars', 'countBerat'));
    }

    // BARANG STORE
    public function barangStore(Request $request)
    {
        //define validation rules  
        $formData = $request->input('data');

        $validator = Validator::make($request->all(), [
            'data.nama.*'       => 'required',
            'data.supplier.*'   => 'required|not_in:0',
            'data.pabrik.*'     => 'required|not_in:0',
            'data.berat.*'      => 'required|not_in:0',
            'data.kadar.*'      => 'required|not_in:0',
            'data.model.*'      => 'required|not_in:0',
        ], [
            'data.nama.*.required'     => 'Nama Barang Must be included!',
            'data.supplier.*.required' => 'Supplier Must be included!',
            'data.supplier.*.not_in'   => 'Supplier Must be included!',
            'data.pabrik.*.required'   => 'Pabrik Must be included!',
            'data.pabrik.*.not_in'     => 'Pabrik Must be included!',
            'data.berat.*.required'    => 'Berat Must be included!',
            'data.kadar.*.required'    => 'Kadar Must be included!',
            'data.kadar.*.not_in'      => 'Kadar Must be included!',
            'data.model.*.required'    => 'Model Must be included!',
            'data.model.*.not_in'      => 'Model Must be included!',
        ]);

        //check if validation fails 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // store to detail manifest
        for ($x = 0; $x < count($formData['kode']); $x++) {

            $barang = Barang::where('barang_kode', 'like', $formData['kode'][$x] . '%')
                ->orderBy('barang_kode', 'desc')
                ->first();

            // ADDED NUMERATOR
            if ($formData['id'][$x] != null) {
                // If $barang is not found, add 4 digits as the numerator
                // You can customize this logic to generate a new ID for new entries
                $newId = $formData['kode'][$x]; // Starting from '0001'

            } else {

                if ($barang) {
                    // Get the part of the kode_barang without the last 4 digits
                    $prefix = substr($barang->barang_kode, 0, -4);

                    // Increment the last 4 digits of kode_barang
                    $last4Digits = intval(substr($barang->barang_kode, -4)) + 1;

                    // Combine the prefix and the incremented last 4 digits
                    $newId = $prefix . str_pad($last4Digits, 4, '0', STR_PAD_LEFT);
                } else {
                    // If $barang is not found, add 4 digits as the numerator
                    // You can customize this logic to generate a new ID for new entries
                    $newId = $formData['kode'][$x] . '0001'; // Starting from '0001'
                }
            }

            // CHECK STATUS
            $status = "";
            try {
                //agak aneh tapi work
                if ($request->status[$x] == "on" || $request->status[$x] == "aktif") {
                    $status = "aktif";
                } else {
                    $status = "non-aktif";
                }
            } catch (\Exception $e) {
                $status = "non-aktif";
            }

            $pictures = $request->file('pictures')[$x] ?? null;

            // CHECK FILES
            if ($pictures && $pictures->isValid()) {
                $foto_barang = 'foto_barang-' . rand(1, 100000) . '.' . $pictures->getClientOriginalExtension();

                // Store the original image
                $path = Storage::putFileAs('public/foto_barang', $pictures, $foto_barang);

                Barang::updateOrCreate([
                    'barang_id' => $formData['id'][$x],
                ], [
                    'barang_kode'    => $newId,
                    'barang_nama'    => $formData['nama'][$x],
                    'barang_kondisi' => $formData['kondisi'][$x],
                    'barang_berat'   => $formData['berat'][$x],
                    'supplier_id'    => $formData['supplier'][$x],
                    'pabrik_id'      => $formData['pabrik'][$x],
                    'kadar_id'       => $formData['kadar'][$x],
                    'model_id'       => $formData['model'][$x],
                    'barang_foto'    => $foto_barang,
                    'barang_status'  => $status
                ]);
            } else {

                Barang::updateOrCreate([
                    'barang_id' => $formData['id'][$x],
                ], [
                    'barang_kode'    => $newId,
                    'barang_nama'    => $formData['nama'][$x],
                    'barang_kondisi' => $formData['kondisi'][$x],
                    'barang_berat'   => $formData['berat'][$x],
                    'supplier_id'    => $formData['supplier'][$x],
                    'pabrik_id'      => $formData['pabrik'][$x],
                    'kadar_id'       => $formData['kadar'][$x],
                    'model_id'       => $formData['model'][$x],
                    'barang_status'  => $status
                ]);
            }
        }

        // //masuk sini untuk create/update satu2
        // $dataCount = count($formData['id']);
        // $pictures = $request->file('pictures');
        // $masukedit = 1;
        // $cekedit = Barang::find($formData['id'][0]);
        // if (isset($cekedit)) {
        //     $masukedit = 0;
        // }
        // // try { 
        // //     $cekedit = Barang::find($formData['id'][0]); 
        // //     print_r($cekedit);
        // // } catch (\Exception $e) {
        // //     $masukedit = 0;
        // // }

        // for ($i = 0; $i < $dataCount; $i++) {
        //     //cek status per item
        //     $status = "";
        //     //tidak bisa pake if has status biasa, sudah di coba, ngk masuk di else nya, return error
        //     try {
        //         //agak aneh tapi work
        //         if ($formData['status'][$i] == "on" || $formData['status'][$i] == "aktif") {
        //             $status = "aktif";
        //         } else {
        //             $status = "non-aktif";
        //         }
        //     } catch (\Exception $e) {
        //         $status = "non-aktif";
        //     }

        //     //if means update else mean create new barang
        //     if (isset($cekedit)) {
        //         $barang = Barang::find($formData['id'][$i]);
        //         $filename = "";
        //         //tidak bisa pake if has file biasa, sudah di coba, ngk masuk di else nya, return error 
        //         try {
        //             $path = $pictures[$i];
        //             $filename = "foto_barang/" . $formData['nama'][$i] . "_" . $formData['id'][$i] . ".jpg";
        //             $location = public_path('/foto_barang');
        //             $path->move($location, $filename);
        //         } catch (\Exception $e) {
        //             $filename = "";
        //         }
        //         if ($filename == "") {
        //             Barang::updateOrCreate([
        //                 'barang_id' => $barang->barang_id,
        //             ], [
        //                 'barang_kode' => $formData['kode'][$i],
        //                 'barang_nama' => $formData['nama'][$i],
        //                 'barang_kondisi' => $formData['kondisi'][$i],
        //                 'barang_berat' => $formData['berat'][$i],
        //                 'supplier_id' => $formData['supplier'][$i],
        //                 'pabrik_id' => $formData['pabrik'][$i],
        //                 'kadar_id' => $formData['kadar'][$i],
        //                 'model_id' => $formData['model'][$i],
        //                 'barang_status' => $status
        //             ]);
        //         } else {
        //             Barang::updateOrCreate([
        //                 'barang_id' => $barang->barang_id,
        //             ], [
        //                 'barang_kode' => $formData['kode'][$i],
        //                 'barang_nama' => $formData['nama'][$i],
        //                 'barang_kondisi' => $formData['kondisi'][$i],
        //                 'barang_berat' => $formData['berat'][$i],
        //                 'supplier_id' => $formData['supplier'][$i],
        //                 'pabrik_id' => $formData['pabrik'][$i],
        //                 'kadar_id' => $formData['kadar'][$i],
        //                 'model_id' => $formData['model'][$i],
        //                 'barang_foto' => $filename,
        //                 'barang_status' => $status
        //             ]);
        //         }
        //     } else {
        //         //////////////bikin id baru
        //         //210003
        //         //2 digit tahun
        //         //4 no urut
        //         // Get the current date and time
        //         $currentTime = Carbon::now();
        //         $datePart = $currentTime->format('yy');
        //         $datePart = substr($datePart, 0, 2);
        //         $all_barang = Barang::all();
        //         $counter = 1;
        //         $digitid = "";
        //         foreach ($all_barang as $barang) {
        //             $digitid = substr($barang->barang_id, 0, 2);
        //             if ($datePart == $digitid) {
        //                 $counter++;
        //             }
        //         }
        //         $nourut = str_pad($counter, 4, "0", STR_PAD_LEFT);
        //         $newId = $datePart . $nourut;
        //         $filename = "";

        //         try {
        //             $path = $pictures[$i];
        //             $filename = "foto_barang/" . $formData['nama'][$i] . "_" . $newId . ".jpg";
        //             $location = public_path('/foto_barang');
        //             $path->move($location, $filename);
        //         } catch (\Exception $e) {
        //             $filename = "";
        //         }

        //         Barang::updateOrCreate([
        //             'barang_id' => (int)$newId,
        //             'barang_kode' => $formData['kode'][$i],
        //             'barang_nama' => $formData['nama'][$i],
        //             'barang_kondisi' => $formData['kondisi'][$i],
        //             'barang_berat' => $formData['berat'][$i],
        //             'supplier_id' => $formData['supplier'][$i],
        //             'pabrik_id' => $formData['pabrik'][$i],
        //             'kadar_id' => $formData['kadar'][$i],
        //             'model_id' => $formData['model'][$i],
        //             'barang_foto' => $filename,
        //             'barang_status' => $status
        //         ]);
        //     }
        // }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!'
        ]);
    }

    // BARANG EDIT
    public function barangEdit(Request $request)
    {
        $barang = Barang::where('barang_id', $request->barang_id)->first();
        return response()->json($barang);
    }

    // BARANG DETAIL
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

    // BARANG CETAK
    public function barangCetak(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $barcodeHtml = DNS1D::getBarcodeHTML($dataArray, 'CODABAR', 2, 40);

        $barang = Barang::with(['kadar', 'model'])->where('barang_id', $dataArray)->first();

        $filename = 'Barcode ' . $barang->barang_kode;
        $formatPaper = 'landscape';

        // Load the HTML view with the data
        $html = view('masterdata.pdf-barcode', ['barang' => $barang, 'barcode' => $barcodeHtml])->render();

        // Create Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parser
        $options->set('isPhpEnabled', true); // Enable PHP

        // Set the page size and margins
        $options->set('size', '560px 300px'); // Width x Height
        $options->set('margin-left', 0);
        $options->set('margin-right', 0);
        $options->set('margin-top', 0);
        $options->set('margin-bottom', 0);

        // Create a new Dompdf instance
        $dompdf = new Dompdf($options);

        // Load your HTML content
        $html = '<style>
                    @page {
                        size: 5.6cm 3cm; /* Set page size and margins here */
                        margin: 0;
                    }
                    body {
                        margin: 0;
                        padding: 0;
                    }
                    /* Set font size to 8px */
                    table, td {
                        font-size: 8px;
                    }
                </style>
                <table class="table">
                    <tr>
                        <td class="centered-content2">
                            ' . $barang->barang_berat . ' Gr
                        </td>
                    </tr>
                    <tr>
                        <td class="centered-content2">
                            ' . $barang->kadar->kadar_nama . '
                        </td>
                    </tr>
                    <tr>
                        <td class="centered-content2">
                            ' . $barang->model->model_nama . '
                        </td>
                    </tr>
                    <tr>
                        <td class="centered-content2">
                            ' . $barcodeHtml . '
                        </td>
                    </tr>
                    <tr>
                        <td class="centered-content2">
                            ' . $barang->barang_kode . '
                        </td>
                    </tr>
                </table>';

        // Load the HTML into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', $formatPaper);

        // Render the HTML as PDF
        $dompdf->render();

        // Get the PDF content as a string
        $pdfContent = $dompdf->output();

        // Return the PDF content with appropriate headers
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '.pdf"');
    }

    // BARANG SHOW BARCODE
    public function barangBarcode(Request $request)
    {
        $barang_id = $request->barang_id;
        $barang = Barang::with(['kadar', 'model'])->where('barang_id', $request->barang_id)->first();

        $barcodeHTML = DNS1D::getBarcodeHTML($barang_id, 'CODABAR', 2, 50);
        //$barcodeHTML = DNS1D::getBarcodeSVG('4445645656', 'CODABAR');   
        return response()->json([
            'barang'    => $barang,
            'barcode'   => $barcodeHTML,
        ]);
    }

    // BARANG NON-AKTIF
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

    // BARANG PINDAH ETALASE
    public function barangPindahEtalase(Request $request)
    {
        $barang = Barang::where('barang_id', $request->barang_id)->first();
        $barang->update([
            'barang_lokasi' => 'ETALASE',
        ]);

        return response()->json(['status' => 'Data is Moved to Etalase Successfully!']);
    }

    // LOAD BERAT
    public function loadBerat()
    {
        $berat = Barang::sum('barang_berat');
        $beratFormatted = number_format($berat, 3);

        return response()->json($beratFormatted);
    }
}
