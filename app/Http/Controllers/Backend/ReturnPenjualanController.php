<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
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
        if ($request->ajax()) {
            $penjualanreturns   = TransaksiPenjualanReturn::with(['penjualan'])->latest()->get();
            return DataTables::of($penjualanreturns)
                ->addIndexColumn()
                ->addColumn('penjualan_return_nobukti', function ($item) {
                    return $item->penjualan_return_nobukti;
                })
                ->addColumn('penjualan_return_tanggal', function ($item) {
                    return $item->penjualan_return_tanggal;
                })
                ->addColumn('penjualan_nobukti', function ($item) {
                    return $item->penjualan->penjualan_nobukti;
                })
                ->addColumn('penjualan_return_keterangan', function ($item) {
                    return $item->penjualan_return_keterangan;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('penjualan.return-penjualan');
    }

    // STORED DATA RETURN PENJUALAN
    public function returnPenjualanStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'detail_penjualan_return_berat' => 'required|array',
            'detail_penjualan_return_berat.*' => 'required|numeric',
            'detail_penjualan_return_harga_return' => 'required|array',
            'detail_penjualan_return_harga_return.*' => 'required|numeric',
            'detail_penjualan_return_kondisi' => 'required|array',
            'detail_penjualan_return_kondisi.*' => 'required|in:LEBUR,CUCI,ETALASE,REPARASI',
        ], [
            'detail_penjualan_return_berat.required' => 'Berat Return must be included.',
            'detail_penjualan_return_berat.array' => 'Berat Return must be an array.',
            'detail_penjualan_return_berat.*.required' => 'Each value in Berat Return must be present.',
            'detail_penjualan_return_berat.*.numeric' => 'Each value in Berat Return must be numeric.',
            'detail_penjualan_return_harga_return.required' => 'Harga Return must be included.',
            'detail_penjualan_return_harga_return.array' => 'Harga Return must be an array.',
            'detail_penjualan_return_harga_return.*.required' => 'Each value in Harga Return must be present.',
            'detail_penjualan_return_harga_return.*.numeric' => 'Each value in Harga Return must be numeric.',
            'detail_penjualan_return_kondisi.required' => 'Kondisi must be included.',
            'detail_penjualan_return_kondisi.array' => 'Kondisi must be an array.',
            'detail_penjualan_return_kondisi.*.required' => 'Each value in Kondisi must be present.',
            'detail_penjualan_return_kondisi.*.in' => 'Invalid value in Kondisi. Allowed values are: LEBUR, CUCI, ETALASE, REPARASI.',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

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
        $newId      = $datePart . sprintf("%03d", $counter);
        $nobukti    = 'RP.' . $datePart . sprintf("%03d", $counter);

        for ($x = 0; $x < count($request->barang_id); $x++) {

            $penjualanreturn = TransaksiPenjualanReturn::updateOrCreate([
                'penjualan_return_id'          => $newId,
            ], [
                'penjualan_return_tanggal'     => $request->penjualan_return_tanggal,
                'penjualan_return_nobukti'     => $nobukti,
                'penjualan_kode'               => $request->penjualan_kode[$x],
                'penjualan_return_keterangan'  => $request->penjualan_return_keterangan == null ? '-' : $request->penjualan_return_keterangan,
                'user_id'                      => Auth::user()->user_id,
            ]);

            $returndetail = TransaksiPenjualanReturnDetail::updateOrCreate([
                'detail_penjualan_return_id'                => $request->detail_penjualan_return_id,
            ], [
                'barang_id'                                 => $request->barang_id[$x],
                'penjualan_return_nobukti'                  => $nobukti,
                'detail_penjualan_barang_berat'             => $request->penjualan_berat_jual[$x],
                'detail_penjualan_return_berat'             => $request->detail_penjualan_return_berat[$x],
                'detail_penjualan_return_harga_jual'        => $request->detail_penjualan_return_harga_jual[$x],
                'detail_penjualan_return_harga_return'      => $request->detail_penjualan_return_harga_return[$x],
                'detail_penjualan_return_potongan'          => $request->detail_penjualan_return_potongan[$x],
                'detail_penjualan_return_jml_harga'         => $request->detail_penjualan_return_total[$x],
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
                // 
            } elseif ($barang->barang_lokasi == 'LEBUR') {
                $barang->update(['barang_status'    => 'non-aktif']);
            } else {
                $barang->update(['barang_lokasi'    => 'ETALASE']);
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
        $returns     = TransaksiPenjualanReturn::with(['penjualan'])->whereBetween('penjualan_return_tanggal', [$request->startDate, $request->endDate])->get();

        $return = [];
        $index     = 1;
        foreach ($returns as $item) {
            $penjualan_return_id             = $item->penjualan_return_id;
            $penjualan_return_tanggal        = $item->penjualan_return_tanggal;
            $penjualan_return_nobukti        = $item->penjualan_return_nobukti;
            $penjualan_nobukti               = $item->penjualan->penjualan_nobukti;
            $penjualan_return_keterangan     = $item->penjualan_return_keterangan;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  
            data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

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
