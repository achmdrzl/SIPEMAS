<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\TransaksiInOut;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPenjualan;
use App\Models\TransaksiPenjualanDetail;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Milon\Barcode\DNS1D;
use Yajra\DataTables\Facades\DataTables;

class TransaksiPenjualanController extends Controller
{
    // TRANSAKSI PENJUALAN INDEX
    public function transaksi_penjualan(Request $request)
    {
        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $penjualans   =   TransaksiPenjualan::whereDate('created_at', $today)->latest()->get();

            return DataTables::of($penjualans)
                ->addIndexColumn()
                ->addColumn('penjualan_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->penjualan_tanggal)->format('d-M-Y');
                })
                ->addColumn('penjualan_nobukti', function ($item) {
                    return ucfirst($item->penjualan_nobukti);
                })
                ->addColumn('penjualan_grandtotal', function ($item) {
                    return 'Rp. ' . number_format($item->penjualan_grandtotal);
                })
                ->addColumn('penjualan_jenis', function ($item) {
                    return 'Perhiasan';
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Penjualan" id="detail-penjualan"  data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Cetak Faktur" id="cetak-faktur" data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">print</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('penjualan.penjualan-index');
    }

    // BARANG INDEX
    public function barangIndex(Request $request)
    {
        $barangs   =   Barang::latest()->get();

        $barang = [];
        $no = 1;
        foreach ($barangs as $item) {
            $barang_id      = $item->barang_id;
            $select         = '<input type="checkbox" class="row-checkbox form-check-input is-valid" value="' . $barang_id . '">';
            $barang_nama    = '<div class="media align-items-center">
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
            $barang_berat   = $item->barang_berat;
            $barang_jenis   = 'Perhiasan';
            $barang_satuan  = 'Pcs';
            $barang_lokasi  = $item->barang_lokasi;

            $barang[] = [
                'index'         => $no++,
                'barang_id'     => $barang_id,
                'select'        => $select,
                'barang_nama'   => $barang_nama,
                'barang_berat'  => $barang_berat,
                'barang_jenis'  => $barang_jenis,
                'barang_lokasi' => $barang_lokasi,
                'barang_satuan' => $barang_satuan,
            ];
        }

        return DataTables::of($barang)
            ->rawColumns(['select', 'barang_nama']) // Specify the columns containing HTML
            ->toJson();
    }

    // LOAD SELECTED BARANG IN TRANSAKSI PENJUALAN
    public function loadSelectedBarang(Request $request)
    {
        $barang = Barang::with(['kadar', 'transaksipenjualandetail'])->whereIn('barang_id', $request->barang_id)->latest()->get();

        return response()->json($barang);
    }

    // PENJUALAN STORED DATA
    public function penjualanStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'detail_penjualan_berat_jual'   => 'required|array',
            'detail_penjualan_berat_jual.*' => 'required|numeric',
            'detail_penjualan_harga'        => 'required|array',
            'detail_penjualan_harga.*'      => 'required|numeric',
            'inputtunai'                   => 'required',
        ], [
            'detail_penjualan_berat_jual.required'   => 'Berat Jual must be included.',
            'detail_penjualan_berat_jual.array'      => 'Berat Jual must be an array.',
            'detail_penjualan_berat_jual.*.required' => 'Each value in Berat Jual must be present.',
            'detail_penjualan_berat_jual.*.numeric'  => 'Each value in Berat Jual must be numeric.',
            'detail_penjualan_harga.required'        => 'Harga Jual must be included.',
            'detail_penjualan_harga.array'           => 'Harga Jual must be an array.',
            'detail_penjualan_harga.*.required'      => 'Each value in Harga Jual must be present.',
            'detail_penjualan_harga.*.numeric'       => 'Each value in Harga Jual must be numeric.',
            'inputtunai.required'                    => 'Total Pembayaran Tunai must be included',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Define the model name
        $modelName = 'TransaksiPenjualan';

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
            Cache::put(
                $modelName . '_counter_date',
                $datePart
            );
        } else {
            // Increment the counter
            $counter++;
            Cache::put($modelName . '_counter', $counter);
        }

        // Generate the new ID
        $newId = $datePart . sprintf(
            "%03d",
            $counter
        );

        // Generate the new Kode Penjualan
        $KodePenjualan = 'FP.' . $datePart . sprintf(
            "%03d",
            $counter
        );

        $ppn = [];
        for ($x = 0; $x < count($request->barang_id); $x++) {
            $ppn[] = ($request->ppn[$x] / 100) *  $request->detail_penjualan_total[$x];
        }

        $penjualan_ppn = array_sum($ppn);

        $penjualan = TransaksiPenjualan::updateOrCreate([
            'penjualan_id'          => $newId,
        ], [
            'penjualan_tanggal'     => $request->penjualan_tanggal,
            'penjualan_nobukti'     => $KodePenjualan,
            'penjualan_subtotal'    => $request->penjualan_subtotal,
            'penjualan_diskon'      => $request->penjualan_diskon,
            'penjualan_ppn'         => $penjualan_ppn,
            // 'penjualan_grandtotal'  => $request->penjualan_grandtotal + $penjualan_ppn,
            'penjualan_grandtotal'  => $request->penjualan_grandtotal,
            'penjualan_bayar'       => $request->penjualan_tunai,
            'penjualan_kembalian'   => $request->penjualan_kembalian,
            'penjualan_keterangan'  => $request->penjualan_keterangan == null ? '-' : $request->penjualan_keterangan,
            'user_id'               => Auth::user()->user_id,
        ]);

        for ($x = 0; $x < count($request->barang_id); $x++) {

            $pembeliandetail = TransaksiPenjualanDetail::updateOrCreate([
                'detail_penjualan_id' => $request->detail_pembelian_id,
            ], [
                'penjualan_id'                  => $penjualan->penjualan_id,
                'barang_id'                     => $request->barang_id[$x],
                'detail_penjualan_berat_jual'   => $request->detail_penjualan_berat_jual[$x],
                'detail_penjualan_harga'        => $request->detail_penjualan_harga[$x],
                'detail_penjualan_ongkos'       => $request->detail_penjualan_ongkos[$x],
                'detail_penjualan_diskon'       => $request->detail_penjualan_diskon[$x],
                'detail_penjualan_jml_harga'    => $request->detail_penjualan_total[$x],
            ]);
        }

        // UPDATE STATUS BARANG 
        $barang     = Barang::whereIn('barang_id', $request->barang_id)->get();
        foreach ($barang as $item) {
            $item->update(['barang_lokasi'  => 'TERJUAL']);
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // PENJUALAN DETAIL
    public function penjualanDetail(Request $request)
    {
        $penjualan  = TransaksiPenjualan::with(['penjualandetail.barang.kadar'])->where('penjualan_id', $request->penjualan_id)->first();

        return response()->json($penjualan);
    }

    // FILTERED DATA
    public function filterdata(Request $request)
    {
        $penjualans     = TransaksiPenjualan::whereBetween('penjualan_tanggal', [$request->startDate, $request->endDate])->latest()->get();

        $penjualan = [];
        $index     = 1;
        foreach ($penjualans as $item) {
            $penjualan_id             = $item->penjualan_id;
            $penjualan_tanggal        = \Carbon\Carbon::parse($item->penjualan_tanggal)->format('d-M-Y');
            $penjualan_nobukti        = $item->penjualan_nobukti;
            $penjualan_jenis          = 'Perhiasan';
            $penjualan_grandtotal     = $item->penjualan_grandtotal;

            $action                   = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Penjualan" id="detail-penjualan"  
            data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $action                   .= '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Cetak Faktur" id="cetak-faktur" 
                                         data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">print</span></button>';
            $penjualan[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'penjualan_id'           => $penjualan_id,
                'penjualan_tanggal'      => $penjualan_tanggal,
                'penjualan_nobukti'      => $penjualan_nobukti,
                'penjualan_jenis'        => $penjualan_jenis,
                'penjualan_grandtotal'   => $penjualan_grandtotal,
                'action'                 => $action,
            ];
        }

        return DataTables::of($penjualan)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // GET LATEST PENJUALAN ID
    public function getLatestPenjualanId()
    {
        $latestPenjualan = TransaksiPenjualan::latest()->first();
        if ($latestPenjualan) {
            return response()->json(['latestPenjualanId' => $latestPenjualan->penjualan_id]);
        } else {
            return response()->json(['latestPenjualanId' => 0]); // Default value if no Penjualan records exist
        }
    }

    // PRINT FAKTUR
    public function cetakFakturPenjualan(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $penjualan = TransaksiPenjualan::with(['penjualandetail.barang.kadar'])->where('penjualan_id', $dataArray)->first();
        
        $filename = 'Faktur Penjualan ' . $penjualan->penjualan_nobukti . ' ';
        $formatPaper = 'landscape';

        // Generate barcode HTML
        $barcodeHtml = [];
        foreach ($penjualan->penjualandetail as $detail) {
            $barcodeHtml2[] = $detail->barang;
            // Generate a barcode for each item using its unique identifier
            $barcodeHtml[] = DNS1D::getBarcodeHTML($detail->barang->barang_id, 'CODABAR', 2, 50);
        }
        
        // Load the HTML view with the data
        $html = view('penjualan.invoice-struk-penjualan2', ['penjualans' => $penjualan, 'barcode' => $barcodeHtml])->render();

        // Create Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parser
        $options->set('isPhpEnabled', true); // Enable PHP

        // Create a new Dompdf instance
        $dompdf = new Dompdf($options);

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

    public function retur_penjualan()
    {
        return view('penjualan.retur-penjualan');
    }
    public function invoice_penjualan()
    {
        return view('penjualan.invoice-struk-penjualan2');
    }
}
