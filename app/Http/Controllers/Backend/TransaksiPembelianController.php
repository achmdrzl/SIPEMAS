<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kadar;
use App\Models\Supplier;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPembelianDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TransaksiPembelianController extends Controller
{

    // TRANSAKSI PEMBELIAN INDEX
    public function transaksi_pembelian(Request $request)
    {
        $supplier         = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $pembelians   =   TransaksiPembelian::with(['supplier'])
                ->whereDate('created_at', $today)
                ->latest()
                ->get();

            return DataTables::of($pembelians)
                ->addIndexColumn()
                ->addColumn('pembelian_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->pembelian_tanggal)->format('d-M-Y');
                })
                ->addColumn('pembelian_nobukti', function ($item) {
                    return $item->pembelian_nobukti;
                })
                ->addColumn('pembelian_supplier_id', function ($item) {
                    return ucfirst($item->supplier->supplier_nama);
                })
                ->addColumn('pembelian_grandtotal', function ($item) {
                    return 'Rp. ' . number_format($item->pembelian_grandtotal);
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Pembelian" id="detail-pembelian"  data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" data-check="edit" title="Edit Pembelian" id="edit-pembelian"  data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pembelian.pembelian-index', compact('supplier'));
    }

    // BARANG INDEX
    public function barangIndex(Request $request)
    {
        $barangs   =   Barang::with('kadar')->latest()->get();

        $barang = [];
        $no = 1;
        foreach ($barangs as $item) {
            $barang_id      = $item->barang_id;
            $select         = '<input type="checkbox" class="row-checkbox form-check-input is-valid" value="' . $barang_id . '">';
            $barang_nama    = '<div class="media align-items-center">
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
                                    <p style="font-size:1px;">'. $item->barang_id .'</p>
                                </div>
                            </div>';

            $barang_berat   = $item->barang_berat;
            $barang_kadar   = $item->kadar->kadar_nama;
            $barang_jenis   = 'Perhiasan';
            $barang_satuan  = 'Pcs';
            $barang_lokasi  = ucfirst($item->barang_lokasi);

            $barang[] = [
                'index'         => $no++,
                'barang_id'     => $barang_id,
                'select'        => $select,
                'barang_nama'   => $barang_nama,
                'barang_berat'  => $barang_berat,
                'barang_kadar'  => $barang_kadar,
                'barang_jenis'  => $barang_jenis,
                'barang_lokasi' => $barang_lokasi,
                'barang_satuan' => $barang_satuan,
            ];
        }

        return DataTables::of($barang)
            ->rawColumns(['select', 'barang_nama']) // Specify the columns containing HTML
            ->toJson();
    }

    // PEMBELIAN STORED DATA
    public function pembelianStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'pembelian_tanggal' => 'required',
            'pembelian_supplier_id' => 'required',
            'detail_pembelian_harga_beli' => 'required|array',
            // 'detail_pembelian_harga_beli.*' => 'required|numeric',
            'detail_pembelian_harga_beli.*' => 'required',
            'detail_pembelian_nilai_tukar' => 'required|array',
            'detail_pembelian_nilai_tukar.*' => 'required|numeric',
        ], [
            'pembelian_tanggal.required' => 'Tanggal Must be included!',
            'pembelian_supplier_id.required' => 'Supplier Must be included!',
            'detail_pembelian_harga_beli.required' => 'Harga Beli must be included.',
            'detail_pembelian_harga_beli.array' => 'Harga Beli must be an array.',
            'detail_pembelian_harga_beli.*.required' => 'Each value in Harga Beli must be present.',
            // 'detail_pembelian_harga_beli.*.numeric' => 'Each value in Harga Beli must be numeric.',
            'detail_pembelian_nilai_tukar.required' => 'Nilai Tukar must be included.',
            'detail_pembelian_nilai_tukar.array' => 'Nilai Tukar must be an array.',
            'detail_pembelian_nilai_tukar.*.required' => 'Each value in Nilai Tukar must be present.',
            'detail_pembelian_nilai_tukar.*.numeric' => 'Each value in Nilai Tukar must be numeric.',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->pembelian_id !== null) {

            $pembelian = TransaksiPembelian::updateOrCreate([
                'pembelian_id'          => $request->pembelian_id,
            ], [
                'pembelian_tanggal'     => $request->pembelian_tanggal,
                'pembelian_subtotal'    => (int)str_replace(',', '', $request->pembelian_subtotal),
                'pembelian_diskon'      => (int)str_replace(',', '', $request->pembelian_diskon),
                'pembelian_ppn'         => (int)str_replace(',', '', $request->pembelian_ppn),
                'pembelian_grandtotal'  => (int)str_replace(',', '', $request->pembelian_grandtotal),
                'pembelian_keterangan'  => $request->pembelian_keterangan == null ? '-' : $request->pembelian_keterangan,
                'supplier_id'           => $request->pembelian_supplier_id,
                'user_id'               => Auth::user()->user_id,
            ]);

            for ($x = 0; $x < count($request->barang_id); $x++) {

                $pembeliandetail = TransaksiPembelianDetail::updateOrCreate([
                    'pembelian_id' => $request->pembelian_id, 'barang_id' => $request->barang_id[$x],
                ], [
                    'pembelian_id'                  => $pembelian->pembelian_id,
                    'barang_id'                     => $request->barang_id[$x],
                    'detail_pembelian_berat'        => $request->detail_pembelian_barang_berat[$x],
                    'detail_pembelian_kadar'        => $request->detail_pembelian_kadar[$x],
                    'detail_pembelian_harga_beli'   => (int)str_replace(',', '', $request->detail_pembelian_harga_beli[$x]),
                    'detail_pembelian_nilai_tukar'  => $request->detail_pembelian_nilai_tukar[$x],
                    'detail_pembelian_jml_beli'     => (int)str_replace(',', '', $request->detail_pembelian_jml_beli[$x]),
                    'detail_pembelian_total'        => (int)str_replace(',', '', $request->detail_pembelian_total[$x])
                ]);
            }
        } else {

            // Define the model name
            $modelName = 'TransaksiPembelian';

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
            $newId = $datePart . sprintf("%03d", $counter);

            $pembelian = TransaksiPembelian::updateOrCreate([
                'pembelian_id'          => $newId,
            ], [
                'pembelian_tanggal'     => $request->pembelian_tanggal,
                'pembelian_nobukti'     => $newId,
                'pembelian_subtotal'    => (int)str_replace(',', '', $request->pembelian_subtotal),
                'pembelian_diskon'      => (int)str_replace(',', '', $request->pembelian_diskon),
                'pembelian_ppn'         => (int)str_replace(',', '', $request->pembelian_ppn),
                'pembelian_grandtotal'  => (int)str_replace(',', '', $request->pembelian_grandtotal),
                'pembelian_keterangan'  => $request->pembelian_keterangan == null ? '-' : $request->pembelian_keterangan,
                'supplier_id'           => $request->pembelian_supplier_id,
                'user_id'               => Auth::user()->user_id,
            ]);

            for ($x = 0; $x < count($request->barang_id); $x++) {

                $pembeliandetail = TransaksiPembelianDetail::updateOrCreate([
                    'detail_pembelian_id'           => $request->detail_pembelian_id,
                ], [
                    'pembelian_id'                  => $pembelian->pembelian_id,
                    'barang_id'                     => $request->barang_id[$x],
                    'detail_pembelian_berat'        => $request->detail_pembelian_barang_berat[$x],
                    'detail_pembelian_kadar'        => $request->detail_pembelian_kadar[$x],
                    'detail_pembelian_harga_beli'   => (int)str_replace(',', '', $request->detail_pembelian_harga_beli[$x]),
                    'detail_pembelian_nilai_tukar'  => $request->detail_pembelian_nilai_tukar[$x],
                    'detail_pembelian_jml_beli'     => (int)str_replace(',', '', $request->detail_pembelian_jml_beli[$x]),
                    'detail_pembelian_total'        => (int)str_replace(',', '', $request->detail_pembelian_total[$x])
                ]);
            }

            // UPDATE STATUS BARANG 
            $barang     = Barang::whereIn('barang_id', $request->barang_id)->get();
            foreach ($barang as $item) {
                $item->update(['barang_lokasi'  => 'BLM DIPAJANG']);
            }
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // FILTERED DATA
    public function filterdata(Request $request)
    {
        $pembelians     = TransaksiPembelian::with('supplier')
            ->whereBetween('pembelian_tanggal', [$request->startDate, $request->endDate])
            ->latest()
            ->get();

        $pembelian = [];
        $index     = 1;
        foreach ($pembelians as $item) {
            $pembelian_id             = $item->pembelian_id;
            $pembelian_tanggal        = \Carbon\Carbon::parse($item->pembelian_tanggal)->format('d-M-Y');
            $pembelian_nobukti        = $item->pembelian_nobukti;
            $pembelian_supplier_id    = ucfirst($item->supplier->supplier_nama);
            $pembelian_grandtotal     = $item->pembelian_grandtotal;

            $action                   = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Pembelian" id="detail-pembelian" data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $action                  .= '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" data-check="edit" title="Edit Pembelian" id="edit-pembelian"  data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">edit</span></button>';

            $pembelian[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'pembelian_id'           => $pembelian_id,
                'pembelian_tanggal'      => $pembelian_tanggal,
                'pembelian_nobukti'      => $pembelian_nobukti,
                'pembelian_supplier_id'  => $pembelian_supplier_id,
                'pembelian_grandtotal'   => $pembelian_grandtotal,
                'action'                 => $action,
            ];
        }

        return DataTables::of($pembelian)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // PEMBELIAN DETAIL
    public function pembelianDetail(Request $request)
    {
        $pembelian  = TransaksiPembelian::with(['pembeliandetail.barang'])->where('pembelian_id', $request->pembelian_id)->first();

        return response()->json($pembelian);
    }
}
