<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\TransaksiPengeluaran;
use App\Models\TransaksiPengeluaranDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TransaksiPenerimaanController extends Controller
{
    // INDEX PENGELUARAN BARANG
    public function penerimaanIndex(Request $request)
    {
        $supplier               = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $pengeluarans   =   TransaksiPengeluaran::with(['pengeluarandetail', 'supplier'])
            ->whereDate('created_at', $today)
            ->where('jenis', 'penerimaan')
            ->latest()
            ->get();

            return DataTables::of($pengeluarans)
                ->addIndexColumn()
                ->addColumn('pengeluaran_nobukti', function ($item) {
                    return $item->pengeluaran_nobukti;
                })
                ->addColumn('pengeluaran_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->pengeluaran_tanggal)->format('d-M-Y');
                })
                ->addColumn('supplier_nama', function ($item) {
                    return $item->supplier->supplier_nama;
                })
                ->addColumn('pengeluaran_keterangan', function ($item) {
                    return strtoupper($item->pengeluaran_keterangan);
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penerimaan"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('penerimaan.penerimaan-index', compact('supplier'));
    }

    // PENERIMAAN STORE
    public function penerimaanStore(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'supplier_id'                  => 'required',
            'pengeluaran_tanggal'          => 'required',
            'detail_pengeluaran_berat'     => 'required|array',
            'detail_pengeluaran_berat.*'   => 'required|numeric',
            'detail_pengeluaran_kondisi'   => 'required|array',
            'detail_pengeluaran_kondisi.*' => 'required|in:LEBUR,CUCI,ETALASE,REPARASI',
        ], [
            'supplier_id.required'                  => 'Supplier must be included.',
            'pengeluaran_tanggal.required'          => 'Tanggal Pengeluaran must be included.',
            'detail_pengeluaran_berat.required'     => 'Berat Return must be included.',
            'detail_pengeluaran_berat.array'        => 'Berat Return must be an array.',
            'detail_pengeluaran_berat.*.required'   => 'Each value in Berat Return must be present.',
            'detail_pengeluaran_berat.*.numeric'    => 'Each value in Berat Return must be numeric.',
            'detail_pengeluaran_kondisi.required'   => 'Kondisi must be included.',
            'detail_pengeluaran_kondisi.array'      => 'Kondisi must be an array.',
            'detail_pengeluaran_kondisi.*.required' => 'Each value in Kondisi must be present.',
            'detail_pengeluaran_kondisi.*.in'       => 'Invalid value in Kondisi. Allowed values are: LEBUR, CUCI, ETALASE, REPARASI.',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Define the model name
        $modelName = 'TransaksiPenerimaan';

        // Get the current date and time
        $currentTime = Carbon::now();

        // Get the formatted date portion (yymmdd)
        $datePart = $currentTime->format('ymd');

        // Get the current counter value from cache for the specific model
        $counter = Cache::get($modelName . '_counter');

        // Get the last date stored in the cache for the specific model
        $lastDate = Cache::get($modelName . '_counter_date');

        // Check if the counter needs to be reset
        if (
            $lastDate !== $datePart
        ) {
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

        $nobuktipenerimaan = 'TRM.' . $datePart . sprintf("%03d", $counter);

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
        
        $penerimaan    = TransaksiPengeluaran::updateOrCreate([
            'pengeluaran_id'            => $request->pengeluaran_id,
        ], [
            'pengeluaran_nobukti'       => $nobuktipenerimaan,
            'pengeluaran_tanggal'       => $request->pengeluaran_tanggal,
            'pengeluaran_keterangan'    => $request->pengeluaran_keterangan == null ? '-' : $request->pengeluaran_keterangan,
            'supplier_id'               => $request->supplier_id,
            'user_id'                   => Auth::user()->user_id,
            'jenis'                     => 'penerimaan',
        ]);

        for ($x = 0; $x < count($request->barang_id); $x++) {

            // UPDATE STATUS BARANG 
            $barang     = Barang::where('barang_id', $request->barang_id[$x])->first();
            // UPDATE LOKASI
            $barang->update(['barang_lokasi'    => $request->detail_pengeluaran_kondisi[$x]]);
            // UPDATE BERAT BARANG
            $barang->update(['barang_berat'     => $request->detail_pengeluaran_berat_kembali[$x]]);

            // CHECK STATUS KONDISI BARANG
            $detail         = TransaksiPengeluaranDetail::updateOrCreate([
                'detail_pengeluaran_id'         => $request->detail_pengeluaran_id,
            ], [
                'pengeluaran_nobukti'           => $nobuktipenerimaan,
                'pengeluaran_id'                => $penerimaan->pengeluaran_id,
                'barang_id'                     => $request->barang_id[$x],
                'kadar_id'                      => $request->kadar_id[$x],
                'detail_pengeluaran_berat'      => $request->detail_pengeluaran_berat[$x],
                'detail_pengeluaran_kembali'    => $request->detail_pengeluaran_berat_kembali[$x],
                'detail_pengeluaran_kondisi'    => $request->detail_pengeluaran_kondisi[$x],
            ]);

            // CHECK STATUS KONDISI BARANG
            if ($barang->barang_lokasi == 'CUCI' || $barang->barang_lokasi == 'REPARASI') {

                $pengeluaran    = TransaksiPengeluaran::updateOrCreate([
                    'pengeluaran_id'            => $request->pengeluaran_id,
                ], [
                    'pengeluaran_nobukti'       => $nobuktipengeluaran,
                    'pengeluaran_tanggal'       => $request->pengeluaran_tanggal,
                    'pengeluaran_keterangan'    => $request->pengeluaran_keterangan == null ? '-' : $request->pengeluaran_keterangan,
                    'supplier_id'               => $request->supplier_id,
                    'user_id'                   => Auth::user()->user_id,
                    'jenis'                     => 'pengeluaran',
                ]);

                $detail         = TransaksiPengeluaranDetail::updateOrCreate([
                        'detail_pengeluaran_id'         => $request->detail_pengeluaran_id,
                    ], [
                        'pengeluaran_nobukti'           => $nobuktipengeluaran,
                        'pengeluaran_id'                => $pengeluaran->pengeluaran_id,
                        'barang_id'                     => $request->barang_id[$x],
                        'kadar_id'                      => $request->kadar_id[$x],
                        'detail_pengeluaran_berat'      => $request->detail_pengeluaran_berat[$x],
                        'detail_pengeluaran_kembali'    => 0,
                        'detail_pengeluaran_kondisi'    => $request->detail_pengeluaran_kondisi[$x],
                    ]);

            }else if ($barang->barang_lokasi == 'LEBUR') {
                $barang->update(['barang_status'    => 'non-aktif']);
            } else if ($barang->barang_lokasi == 'ETALASE') {
                $barang->update(['barang_lokasi'    => 'ETALASE']);
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
        $pengeluarans     = TransaksiPengeluaran::with(['pengeluarandetail', 'supplier'])
            ->where('jenis', 'penerimaan')
            ->whereBetween('pengeluaran_tanggal', [$request->startDate, $request->endDate])
            ->latest()
            ->get();

        $pengeluaran = [];
        $index     = 1;
        foreach ($pengeluarans as $item) {
            $pengeluaran_id           = $item->pengeluaran_id;
            $pengeluaran_nobukti      = $item->pengeluaran_nobukti;
            $pengeluaran_tanggal      = \Carbon\Carbon::parse($item->pengeluaran_tanggal)->format('d-M-Y');
            $supplier_nama            = ucfirst($item->supplier->supplier_nama);
            $pengeluaran_keterangan   = $item->pengeluaran_keterangan;

            $action                   = '<button class="btn btn-icon btn-primary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penerimaan"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $pengeluaran[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'pengeluaran_id'         => $pengeluaran_id,
                'pengeluaran_nobukti'    => $pengeluaran_nobukti,
                'pengeluaran_tanggal'    => $pengeluaran_tanggal,
                'supplier_nama'          => $supplier_nama,
                'pengeluaran_keterangan' => strtoupper($pengeluaran_keterangan),
                'action'                 => $action,
            ];
        }

        return DataTables::of($pengeluaran)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }
}
