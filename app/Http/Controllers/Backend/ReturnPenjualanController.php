<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiPengeluaran;
use App\Models\TransaksiPengeluaranDetail;
use App\Models\TransaksiPenjualanReturn;
use App\Models\TransaksiPenjualanReturnDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ReturnPenjualanController extends Controller
{
    // INDEX RETURN PENJUALAN
    public function returnPenjualanIndex(Request $request)
    {
        $supplier               = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $penjualanreturns   = TransaksiPenjualanReturn::with(['penjualan'])
                ->whereDate('created_at', $today)
                ->latest()
                ->get();

            return DataTables::of($penjualanreturns)
                ->addIndexColumn()
                ->addColumn('penjualan_return_nobukti', function ($item) {
                    return $item->penjualan_return_nobukti;
                })
                ->addColumn('penjualan_return_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->penjualan_return_tanggal)->format('d-M-Y');
                })
                ->addColumn('penjualan_nobukti', function ($item) {
                    return $item->penjualan->penjualan_nobukti;
                })
                ->addColumn('penjualan_return_keterangan', function ($item) {
                    return $item->penjualan_return_keterangan;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    $btn = $btn . '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Edit Return Penjualan" id="edit-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">edit</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('penjualan.return-penjualan', compact('supplier'));
    }

    // BARANG INDEX
    public function barangIndex(Request $request)
    {
        $barangs   =   Barang::where('barang_lokasi', 'TERJUAL')->latest()->get();

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
                                    <p style="font-size:1px;">' . $item->barang_id . '</p>
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

    // STORED DATA RETURN PENJUALAN
    public function returnPenjualanStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'detail_penjualan_return_berat'          => 'required|array',
            'detail_penjualan_return_berat.*'        => 'required|numeric',
            'detail_penjualan_return_harga_return'   => 'required|array',
            'detail_penjualan_return_harga_return.*' => 'required',
            'detail_penjualan_return_kondisi'        => 'required|array',
            'detail_penjualan_return_kondisi.*'      => 'required|in:LEBUR,CUCI,ETALASE,REPARASI',
            'pembelian_supplier_id'                  => 'required_if:detail_penjualan_return_kondisi,CUCI,REPARASI',
        ], [
            'detail_penjualan_return_berat.required'          => 'Berat Return must be included.',
            'detail_penjualan_return_berat.array'             => 'Berat Return must be an array.',
            'detail_penjualan_return_berat.*.required'        => 'Each value in Berat Return must be present.',
            'detail_penjualan_return_berat.*.numeric'         => 'Each value in Berat Return must be numeric.',
            'detail_penjualan_return_harga_return.required'   => 'Harga Return must be included.',
            'detail_penjualan_return_harga_return.array'      => 'Harga Return must be an array.',
            'detail_penjualan_return_harga_return.*.required' => 'Each value in Harga Return must be present.',
            // 'detail_penjualan_return_harga_return.*.numeric'  => 'Each value in Harga Return must be numeric.',
            'detail_penjualan_return_kondisi.required'        => 'Kondisi must be included.',
            'detail_penjualan_return_kondisi.array'           => 'Kondisi must be an array.',
            'detail_penjualan_return_kondisi.*.required'      => 'Each value in Kondisi must be present.',
            'detail_penjualan_return_kondisi.*.in'            => 'Invalid value in Kondisi. Allowed values are: LEBUR, CUCI, ETALASE, REPARASI.',
            'pembelian_supplier_id.required_if'               => 'The supplier is required when the condition is CUCI or REPARASI.',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if($request->penjualan_return_nobukti != null){

            for ($x = 0; $x < count($request->barang_id); $x++) {

                $penjualanreturn = TransaksiPenjualanReturn::updateOrCreate([
                    'penjualan_return_nobukti'     => $request->penjualan_return_nobukti,
                ], [
                    'penjualan_return_tanggal'     => $request->penjualan_return_tanggal,
                    'penjualan_return_keterangan'  => $request->penjualan_return_keterangan == null ? '-' : $request->penjualan_return_keterangan,
                    'user_id'                      => Auth::user()->user_id,
                ]);

                $returndetail = TransaksiPenjualanReturnDetail::updateOrCreate([
                    'penjualan_return_nobukti'                  => $request->penjualan_return_nobukti, 'barang_id' => $request->barang_id[$x],
                ], [
                    'barang_id'                                 => $request->barang_id[$x],
                    'detail_penjualan_return_berat'             => $request->detail_penjualan_return_berat[$x],
                    'detail_penjualan_return_harga_jual'        => (int)str_replace(',', '', $request->detail_penjualan_return_harga_jual[$x]),
                    'detail_penjualan_return_harga_return'      => (int)str_replace(',', '', $request->detail_penjualan_return_harga_return[$x]),
                    'detail_penjualan_return_potongan'          => (int)str_replace(',', '', $request->detail_penjualan_return_potongan[$x] == null ? null : $request->detail_penjualan_return_potongan[$x]),
                    'detail_penjualan_return_ppn'               => (int)str_replace(',', '', $request->detail_penjualan_return_total[$x]) * (1.65 / 100),
                    // 'detail_penjualan_return_jml_harga'         => $request->detail_penjualan_return_total[$x] + ($request->detail_penjualan_return_total[$x] * (1.65 / 100)),
                    'detail_penjualan_return_jml_harga'         => (int)str_replace(',', '', $request->detail_penjualan_return_total[$x]),
                    'detail_penjualan_return_kondisi'           => $request->detail_penjualan_return_kondisi[$x],
                ]);
            }

        }else{

            // Define the model name
            $modelName = 'TransaksiReturnPenjualan';
    
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
            $newId              = $datePart . sprintf("%03d", $counter);
            $nobuktireturn      = 'RP.' . $datePart . sprintf("%03d", $counter);
    
            // Define the model name
            $modelName2 = 'TransaksiPengeluaran';
    
            // Get the current date and time
            $currentTime = Carbon::now();
    
            // Get the formatted date portion (yymmdd)
            $datePart2 = $currentTime->format('ymd');
    
            // Get the current counter value from cache for the specific model
            $counter2 = Cache::get($modelName2 . '_counter');
    
            // Get the last date stored in the cache for the specific model
            $lastDate2 = Cache::get($modelName2 . '_counter_date');
    
            // Check if the counter needs to be reset
            if (
                $lastDate2 !== $datePart2
            ) {
                // Reset the counter
                $counter2 = 1;
                Cache::put($modelName2 . '_counter', $counter2);
                Cache::put(
                    $modelName2 . '_counter_date',
                    $datePart2
                );
            } else {
                // Increment the counter
                $counter2++;
                Cache::put($modelName2 . '_counter', $counter2);
            }
    
            $nobuktipengeluaran = 'LB.' . $datePart2 . sprintf("%03d", $counter2);
    
            for ($x = 0; $x < count($request->barang_id); $x++) {
    
                $penjualanreturn = TransaksiPenjualanReturn::updateOrCreate([
                    'penjualan_return_id'          => $newId,
                ], [
                    'penjualan_return_tanggal'     => $request->penjualan_return_tanggal,
                    'penjualan_return_nobukti'     => $nobuktireturn,
                    'penjualan_kode'               => $request->penjualan_kode[$x],
                    'penjualan_return_keterangan'  => $request->penjualan_return_keterangan == null ? '-' : $request->penjualan_return_keterangan,
                    'user_id'                      => Auth::user()->user_id,
                ]);
    
                $returndetail = TransaksiPenjualanReturnDetail::updateOrCreate([
                    'detail_penjualan_return_id'                => $request->detail_penjualan_return_id,
                ], [
                    'barang_id'                                 => $request->barang_id[$x],
                    'penjualan_return_nobukti'                  => $nobuktireturn,
                    'detail_penjualan_barang_berat'             => $request->penjualan_berat_jual[$x],
                    'detail_penjualan_return_berat'             => $request->detail_penjualan_return_berat[$x],
                    'detail_penjualan_return_harga_jual'        => (int)str_replace(',', '', $request->detail_penjualan_return_harga_jual[$x]),
                    'detail_penjualan_return_harga_return'      => (int)str_replace(',', '', $request->detail_penjualan_return_harga_return[$x]),
                    'detail_penjualan_return_potongan'          => (int)str_replace(',', '', $request->detail_penjualan_return_potongan[$x] == null ? null : $request->detail_penjualan_return_potongan[$x]),
                    'detail_penjualan_return_ppn'               => (int)str_replace(',', '', $request->detail_penjualan_return_total[$x]) * (1.65 / 100),
                    // 'detail_penjualan_return_jml_harga'         => $request->detail_penjualan_return_total[$x] + ($request->detail_penjualan_return_total[$x] * (1.65 / 100)),
                    'detail_penjualan_return_jml_harga'         => (int)str_replace(',', '', $request->detail_penjualan_return_total[$x]),
                    'detail_penjualan_return_kondisi'           => $request->detail_penjualan_return_kondisi[$x],
                ]);
    
                // UPDATE STATUS BARANG 
                $barang     = Barang::where('barang_id', $request->barang_id[$x])->first();
                // UPDATE LOKASI
                $barang->update(['barang_lokasi'    => $request->detail_penjualan_return_kondisi[$x]]);
                // UPDATE BERAT BARANG
                $barang->update(['barang_berat'     => $request->detail_penjualan_return_berat[$x]]);
    
                // CHECK STATUS KONDISI BARANG
                if ($barang->barang_lokasi == 'CUCI' || $barang->barang_lokasi == 'REPARASI') {
    
                    $pengeluaran    = TransaksiPengeluaran::updateOrCreate([
                        'pengeluaran_id'            => $request->pengeluaran_id,
                    ], [
                        'pengeluaran_nobukti'       => $nobuktipengeluaran,
                        'pengeluaran_tanggal'       => $request->penjualan_return_tanggal,
                        'pengeluaran_keterangan'    => $request->pengeluaran_keterangan,
                        'jenis'                     => 'pengeluaran',
                        'supplier_id'               => $request->pembelian_supplier_id,
                        'user_id'                   => Auth::user()->user_id,
                    ]);
    
                    $detail         = TransaksiPengeluaranDetail::updateOrCreate([
                        'detail_pengeluaran_id'         => $request->detail_pengeluaran_id,
                    ], [
                        'pengeluaran_nobukti'           => $nobuktipengeluaran,
                        'pengeluaran_id'                => $pengeluaran->pengeluaran_id,
                        'barang_id'                     => $request->barang_id[$x],
                        'kadar_id'                      => $request->kadar_id[$x],
                        'detail_pengeluaran_berat'      => $request->detail_penjualan_return_berat[$x],
                        'detail_pengeluaran_kembali'    => 0,
                        'detail_pengeluaran_kondisi'    => $request->detail_penjualan_return_kondisi[$x],
                    ]);
                } elseif ($barang->barang_lokasi == 'LEBUR') {
                    $barang->update(['barang_status'    => 'non-aktif']);
                } else {
                    $barang->update(['barang_lokasi'    => 'ETALASE']);
                }
            }
        }


        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // SHOW DETAIL RETURN PENJUALAN
    public function returnDetail(Request $request)
    {
        $return     = TransaksiPenjualanReturn::with(['penjualan', 'returndetail.barang'])->where('penjualan_return_id', $request->penjualan_return_id)->first();

        return response()->json($return);
    }

    // FILTERED DATA
    public function filterdata(Request $request)
    {
        $returns     = TransaksiPenjualanReturn::with(['penjualan'])->whereBetween('penjualan_return_tanggal', [$request->startDate, $request->endDate])->latest()->get();

        $return = [];
        $index     = 1;
        foreach ($returns as $item) {
            $penjualan_return_id             = $item->penjualan_return_id;
            $penjualan_return_tanggal        = \Carbon\Carbon::parse($item->penjualan_return_tanggal)->format('d-M-Y');
            $penjualan_return_nobukti        = $item->penjualan_return_nobukti;
            $penjualan_nobukti               = $item->penjualan->penjualan_nobukti;
            $penjualan_return_keterangan     = $item->penjualan_return_keterangan;

            $action                   = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return" data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $action                  .= '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Edit Return Penjualan" id="edit-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">edit</span></button>';

            $return[] = [
                'DT_RowIndex'                   => $index++, // Add DT_RowIndex as the index plus 1
                'penjualan_return_id'           => $penjualan_return_id,
                'penjualan_return_tanggal'      => $penjualan_return_tanggal,
                'penjualan_return_nobukti'      => $penjualan_return_nobukti,
                'penjualan_nobukti'             => $penjualan_nobukti,
                'penjualan_return_keterangan'   => $penjualan_return_keterangan,
                'action'                        => $action,
            ];
        }

        return DataTables::of($return)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }
}
