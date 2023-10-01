<?php

namespace App\Http\Controllers\Backend;

use App\Exports\DetailPembelianExcel;
use App\Exports\DetailPenerimaanExcel;
use App\Exports\DetailPengeluaranExcel;
use App\Exports\DetailPenjualanExcel;
use App\Exports\DetailReturnExcel;
use App\Exports\RekapHistory;
use App\Exports\RekapHutangExcel;
use App\Exports\RekapInOutExcel;
use App\Exports\RekapPembelianExcel;
use App\Exports\RekapPenerimaanExcel;
use App\Exports\RekapPengeluaranExcel;
use App\Exports\RekapPenjualanExcel;
use App\Exports\RekapReturnExcel;
use App\Exports\RekapStock;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kadar;
use App\Models\Merk;
use App\Models\ModelBarang;
use App\Models\Pabrik;
use App\Models\Supplier;
use App\Models\TransaksiHutang;
use App\Models\TransaksiInOut;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPengeluaran;
use App\Models\TransaksiPenjualan;
use App\Models\TransaksiPenjualanReturn;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Svg\Tag\Rect;
use Yajra\DataTables\Facades\DataTables;

class DataLaporanController extends Controller
{
    public function historyBarang()
    {
        return view('laporan.history-barang');
    }
    public function laporanStockIndex()
    {
        return view('laporan.rekap-stok-barang');
    }

    // LAPORAN PEMBELIAN INDEX
    public function laporanPembelianIndex(Request $request)
    {
        $supplier         = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date

            $pembelians = TransaksiPembelian::with(['supplier'])
                ->whereDate('created_at', $today) // Filter by the date part of the "created_at" column
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
                ->addColumn('pembelian_subtotal', function ($item) {
                    return $item->pembelian_subtotal;
                })
                ->addColumn('pembelian_diskon', function ($item) {
                    return $item->pembelian_diskon;
                })
                ->addColumn('pembelian_ppn', function ($item) {
                    return $item->pembelian_ppn;
                })
                ->addColumn('pembelian_grandtotal', function ($item) {
                    return $item->pembelian_grandtotal;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-pembelian', compact('supplier'));
    }

    // LAPORAN PEMBELIAN INDEX DETAIL
    public function laporanPembelianIndexDetail(Request $request)
    {
        $supplier         = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date

            $pembelians = TransaksiPembelian::with(['supplier', 'pembeliandetail.barang'])
                ->whereDate('created_at', $today) // Filter by the date part of the "created_at" column
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
                ->addColumn('pembelian_subtotal', function ($item) {
                    return $item->pembelian_subtotal;
                })
                ->addColumn('pembelian_diskon', function ($item) {
                    return $item->pembelian_diskon;
                })
                ->addColumn('pembelian_ppn', function ($item) {
                    return $item->pembelian_ppn;
                })
                ->addColumn('pembelian_grandtotal', function ($item) {
                    return $item->pembelian_grandtotal;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Pembelian" id="detail-pembelian"  data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-pembelian-detail', compact('supplier'));
    }

    // LAPORAN PENJUALAN INDEX
    public function laporanPenjualanIndex(Request $request)
    {
        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $penjualans   =   TransaksiPenjualan::whereDate('created_at', $today)
                ->latest()
                ->get();

            return DataTables::of($penjualans)
                ->addIndexColumn()
                ->addColumn('penjualan_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->penjualan_tanggal)->format('d-M-Y');
                })
                ->addColumn('penjualan_nobukti', function ($item) {
                    return ucfirst($item->penjualan_nobukti);
                })
                ->addColumn('penjualan_jenis', function ($item) {
                    return 'Perhiasan';
                })
                ->addColumn('penjualan_subtotal', function ($item) {
                    return $item->penjualan_subtotal;
                })
                ->addColumn('penjualan_ppn', function ($item) {
                    return $item->penjualan_ppn;
                })
                ->addColumn('penjualan_grandtotal', function ($item) {
                    return $item->penjualan_grandtotal;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-penjualan');
    }

    // LAPORAN PENJUALAN INDEX DETAIL
    public function laporanPenjualanIndexDetail(Request $request)
    {
        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $penjualans   =   TransaksiPenjualan::whereDate('created_at', $today)
                ->latest()
                ->get();
            return DataTables::of($penjualans)
                ->addIndexColumn()
                ->addColumn('penjualan_tanggal', function ($item) {
                    return \Carbon\Carbon::parse($item->penjualan_tanggal)->format('d-M-Y');
                })
                ->addColumn('penjualan_nobukti', function ($item) {
                    return ucfirst($item->penjualan_nobukti);
                })
                ->addColumn('penjualan_jenis', function ($item) {
                    return 'PERHIASAN';
                })
                ->addColumn('penjualan_subtotal', function ($item) {
                    return $item->penjualan_subtotal;
                })
                ->addColumn('penjualan_ppn', function ($item) {
                    return $item->penjualan_ppn;
                })
                ->addColumn('penjualan_grandtotal', function ($item) {
                    return $item->penjualan_grandtotal;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Penjualan" id="detail-penjualan"  data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-penjualan-detail');
    }

    // LAPORAN RETURN PENJUALAN INDEX
    public function laporanReturnPenjualanIndex(Request $request)
    {
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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-return-penjualan');
    }

    // LAPORAN RETURN PENJUALAN INDEX DETAIL
    public function laporanReturnPenjualanIndexDetail(Request $request)
    {
        $supplier         = Supplier::where('status', 'aktif')->get();

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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-return-penjualan-detail', compact('supplier'));
    }

    // LAPORAN RETURN PENGELUARAN INDEX
    public function laporanPengeluaranIndex(Request $request)
    {
        $supplier               = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $pengeluarans   =   TransaksiPengeluaran::with(['pengeluarandetail', 'supplier'])
                ->whereDate('created_at', $today)
                ->where('jenis', 'pengeluaran')
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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Pengeluaran" id="detail-pengeluaran"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-pengeluaran', compact('supplier'));
    }

    // LAPORAN RETURN PENGELUARAN INDEX DETAIL
    public function laporanPengeluaranIndexDetail(Request $request)
    {
        $supplier               = Supplier::where('status', 'aktif')->get();

        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date

            $pengeluarans   =   TransaksiPengeluaran::with(['pengeluarandetail', 'supplier'])
                ->whereDate('created_at', $today)
                ->where('jenis', 'pengeluaran')
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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Pengeluaran" id="detail-pengeluaran"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-pengeluaran-detail', compact('supplier'));
    }

    // LAPORAN RETURN PENGELUARAN INDEX
    public function laporanPenerimaanIndex(Request $request)
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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penerimaan"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-penerimaan', compact('supplier'));
    }

    // LAPORAN RETURN PENGELUARAN INDEX DETAIL
    public function laporanPenerimaanIndexDetail(Request $request)
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

                    $btn = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penerimaan"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('laporan.laporan-penerimaan-detail', compact('supplier'));
    }

    // LAPORAN HUTANG
    public function laporanHutang(Request $request)
    {
        if ($request->ajax()) {
            $today   = Carbon::today(); // Get the current date
            $datas   =   TransaksiHutang::whereDate('created_at', $today)->latest()->get();

            return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('kode_hutang', function ($item) {
                    return ucfirst($item->kode_hutang);
                })
                ->addColumn('tgl_transaksi', function ($item) {
                    return \Carbon\Carbon::parse($item->tgl_transaksi)->format('d-M-Y');
                })
                ->addColumn('total', function ($item) {
                    return $item->total;
                })
                ->addColumn('keterangan', function ($item) {
                    return ucfirst($item->keterangan);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-hutang');
    }

    // LAPORAN HUTANG
    public function laporanInOut(Request $request)
    {
        if ($request->ajax()) {
            $today = Carbon::today(); // Get the current date
            $datas   =   TransaksiInOut::whereDate('created_at', $today)
                ->latest()
                ->get();

            return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('kode_transaksi', function ($item) {
                    return ucfirst($item->kode_transaksi);
                })
                ->addColumn('tgl_transaksi', function ($item) {
                    return \Carbon\Carbon::parse($item->tgl_transaksi)->format('d-M-Y');
                })
                ->addColumn('jenis_transaksi', function ($item) {
                    return ucfirst($item->jenis_transaksi);
                })
                ->addColumn('total', function ($item) {
                    return $item->total;
                })
                ->addColumn('keterangan', function ($item) {
                    return ucfirst($item->keterangan);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan.laporan-inOut');
    }

    // LAPORAN STOCK
    public function laporanStock(Request $request)
    {
        // if ($request->ajax()) {
        //     $today = Carbon::today(); // Get the current date
        //     $datas   =   Barang::whereDate('created_at', $today)
        //         ->latest()
        //         ->get();

        //     return DataTables::of($datas)
        //         ->addIndexColumn()
        //         ->addColumn('barang_nama', function ($item) {
        //             return ucfirst($item->barang_nama);
        //         })
        //         ->addColumn('barang_kode', function ($item) {
        //             return $item->barang_kode;
        //         })
        //         ->addColumn('barang_berat', function ($item) {
        //             return $item->barang_berat;
        //         })
        //         ->addColumn('supplier', function ($item) {
        //             return $item->supplier->supplier_nama;
        //         })
        //         ->addColumn('pabrik', function ($item) {
        //             return $item->pabrik->pabrik_nama;
        //         })
        //         ->addColumn('kadar', function ($item) {
        //             return $item->kadar->kadar_nama;
        //         })
        //         ->addColumn('model', function ($item) {
        //             return $item->model->model_nama;
        //         })
        //         ->addColumn('barang_lokasi', function ($item) {
        //             return $item->barang_lokasi;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('laporan.laporan-stock');
    }

    // LAPORAN HISTORY BARANG
    public function laporanHistoryBarang(Request $request)
    {
        return view('laporan.history-barang');
    }

    // FILTER DATA FOR SORTING FILTER
    public function filter_data(Request $request)
    {
        $data = '';
        if ($request->filterdata == 'supplier_id') {

            $data   = Supplier::where('status', 'aktif')->get();
            return response()->json(['supplier' => $data]);
        } elseif ($request->filterdata == 'pabrik_id') {

            $data   = Pabrik::where('status', 'aktif')->get();
            return response()->json(['pabrik' => $data]);
        } elseif ($request->filterdata == 'kadar_id') {

            $data   = Kadar::where('status', 'aktif')->get();
            return response()->json(['kadar' => $data]);
        } elseif ($request->filterdata == 'model_id') {

            $data   = ModelBarang::where('status', 'aktif')->get();
            return response()->json(['model' => $data]);
        } elseif ($request->filterdata == 'lokasi_id') {
            $data = ['tampilkan-semua', 'lebur', 'cuci', 'reparasi', 'tdk-ada-catatan', 'etalase'];
            return response()->json(['lokasi' => $data]);
        }
    }

    // SORTING PEMBELIAN
    public function sortingPembelian(Request $request)
    {
        $pembelians = TransaksiPembelian::with(['supplier', 'pembeliandetail.barang']);

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $pembelians->whereBetween('pembelian_tanggal', [$request->startDate, $request->endDate]);
        }

        // Check if nobukti is provided
        if ($request->nobukti !== null) {
            $pembelians->where('pembelian_nobukti', $request->nobukti);
        }

        // Check if namabarang is provided
        if ($request->namabarang !== null) {
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($request) {
                $query->where('barang_nama', $request->namabarang);
            });
        }

        // Check if supplier is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $supplier = $request->has('supplier') ? $request->supplier : null;
            $pembelians->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $pembelians = $pembelians->get();

        $pembelian = [];
        $index     = 1;
        foreach ($pembelians as $item) {
            $pembelian_id             = $item->pembelian_id;
            $pembelian_tanggal        = \Carbon\Carbon::parse($item->pembelian_tanggal)->format('d-M-Y');
            $pembelian_nobukti        = $item->pembelian_nobukti;
            $pembelian_subtotal       = $item->pembelian_subtotal;
            $pembelian_diskon         = $item->pembelian_diskon;
            $pembelian_ppn            = $item->pembelian_ppn;
            $pembelian_supplier_id    = ucfirst($item->supplier->supplier_nama);
            $pembelian_grandtotal     = $item->pembelian_grandtotal;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Pembelian" id="detail-pembelian"  
            data-id="' . $item->pembelian_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $pembelian[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'pembelian_id'           => $pembelian_id,
                'pembelian_tanggal'      => $pembelian_tanggal,
                'pembelian_nobukti'      => $pembelian_nobukti,
                'pembelian_subtotal'     => $pembelian_subtotal,
                'pembelian_diskon'       => $pembelian_diskon,
                'pembelian_ppn'          => $pembelian_ppn,
                'pembelian_supplier_id'  => $pembelian_supplier_id,
                'pembelian_grandtotal'   => $pembelian_grandtotal,
                'action'                 => $action,
            ];
        }

        return DataTables::of($pembelian)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING PENJUALAN
    public function sortingPenjualan(Request $request)
    {
        $penjualans = TransaksiPenjualan::with(['penjualandetail.barang']);

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $penjualans->whereBetween('penjualan_tanggal', [$request->startDate, $request->endDate]);
        }

        // Check if nobukti is provided
        if ($request->nobukti !== null) {
            $penjualans->where('penjualan_nobukti', $request->nobukti);
        }

        // Check if namabarang is provided
        if ($request->namabarang !== null) {
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($request) {
                $query->where('barang_nama', $request->namabarang);
            });
        }

        // Check if supplier is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $supplier = $request->has('supplier') ? $request->supplier : null;
            $penjualans->whereHas('penjualandetail.barang.supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier);
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $penjualans = $penjualans->get();

        $penjualan = [];
        $index     = 1;
        foreach ($penjualans as $item) {
            $penjualan_id             = $item->penjualan_id;
            $penjualan_tanggal        = \Carbon\Carbon::parse($item->penjualan_tanggal)->format('d-M-Y');
            $penjualan_nobukti        = $item->penjualan_nobukti;
            $penjualan_subtotal       = $item->penjualan_subtotal;
            $penjualan_diskon         = $item->penjualan_diskon;
            $penjualan_ppn            = $item->penjualan_ppn;
            $penjualan_grandtotal     = $item->penjualan_grandtotal;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Penjualan" id="detail-penjualan"  data-id="' . $item->penjualan_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $penjualan[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'penjualan_id'           => $penjualan_id,
                'penjualan_tanggal'      => $penjualan_tanggal,
                'penjualan_jenis'        => 'PERHIASAN',
                'penjualan_nobukti'      => $penjualan_nobukti,
                'penjualan_subtotal'     => $penjualan_subtotal,
                'penjualan_diskon'       => $penjualan_diskon,
                'penjualan_ppn'          => $penjualan_ppn,
                'penjualan_grandtotal'   => $penjualan_grandtotal,
                'action'                 => $action,
            ];
        }

        return DataTables::of($penjualan)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING RETURN PENJUALAN
    public function sortingReturnPenjualan(Request $request)
    {
        // dd($request->all());
        $returnpenjualans = TransaksiPenjualanReturn::with(['returndetail.barang', 'penjualan.penjualandetail.barang']);

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $returnpenjualans->whereBetween('penjualan_return_tanggal', [$request->startDate, $request->endDate]);
        }

        // Check if nobukti is provided
        if ($request->nobukti !== null) {
            $returnpenjualans->where('penjualan_return_nobukti', $request->nobukti);
        }

        // Check if nofaktur is provided
        if ($request->nofaktur !== null) {
            $returnpenjualans->whereHas('penjualan', function ($query) use ($request) {
                $query->where('penjualan_nobukti', $request->nofaktur);
            });
        }

        // Check if namabarang is provided
        if ($request->namabarang !== null) {
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($request) {
                $query->where('barang_nama', $request->namabarang);
            });
        }

        // Check if supplier is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $supplier = $request->has('supplier') ? $request->supplier : null;
            $returnpenjualans->whereHas('returndetail.barang.supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier);
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $returnpenjualans = $returnpenjualans->get();

        $returnpenjualan = [];
        $index     = 1;
        foreach ($returnpenjualans as $item) {
            $penjualan_return_id             = $item->penjualan_return_id;
            $penjualan_return_tanggal        = \Carbon\Carbon::parse($item->penjualan_return_tanggal)->format('d-M-Y');
            $penjualan_return_nobukti        = $item->penjualan_return_nobukti;
            $penjualan_nobukti               = $item->penjualan->penjualan_nobukti;
            $penjualan_return_keterangan     = $item->penjualan_return_keterangan;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penjualan-return"  data-id="' . $item->penjualan_return_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $returnpenjualan[] = [
                'DT_RowIndex'                   => $index++, // Add DT_RowIndex as the index plus 1
                'penjualan_return_id'           => $penjualan_return_id,
                'penjualan_return_tanggal'      => $penjualan_return_tanggal,
                'penjualan_return_nobukti'      => $penjualan_return_nobukti,
                'penjualan_nobukti'             => $penjualan_nobukti,
                'penjualan_return_keterangan'   => $penjualan_return_keterangan,
                'action'                        => $action,
            ];
        }

        return DataTables::of($returnpenjualan)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING PENGELUARAN
    public function sortingPengeluaran(Request $request)
    {
        // dd($request->all());
        $pengeluarans = TransaksiPengeluaran::with(['pengeluarandetail.barang'])->where('jenis', 'pengeluaran');

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $pengeluarans->whereBetween('pengeluaran_tanggal', [$request->startDate, $request->endDate]);
        }

        // Check if nobukti is provided
        if ($request->nobukti !== null) {
            $pengeluarans->where('pengeluaran_nobukti', $request->nobukti);
        }

        // Check if nobukti is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $pengeluarans->where('supplier_id', $request->supplier);
        }

        // Check if namabarang is provided
        if ($request->namabarang !== null) {
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($request) {
                $query->where('barang_nama', $request->namabarang);
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }
        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $pengeluarans = $pengeluarans->get();

        $pengeluaran = [];
        $index     = 1;
        foreach ($pengeluarans as $item) {
            $pengeluaran_id             = $item->pengeluaran_id;
            $pengeluaran_tanggal        = \Carbon\Carbon::parse($item->pengeluaran_tanggal)->format('d-M-Y');
            $pengeluaran_nobukti        = $item->pengeluaran_nobukti;
            $supplier_nama              = $item->supplier->supplier_nama;
            $pengeluaran_keterangan     = $item->pengeluaran_keterangan;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Pengeluaran" id="detail-pengeluaran"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $pengeluaran[] = [
                'DT_RowIndex'              => $index++, // Add DT_RowIndex as the index plus 1
                'pengeluaran_id'           => $pengeluaran_id,
                'pengeluaran_tanggal'      => $pengeluaran_tanggal,
                'pengeluaran_nobukti'      => $pengeluaran_nobukti,
                'supplier_nama'            => $supplier_nama,
                'pengeluaran_keterangan'   => strtoupper($pengeluaran_keterangan),
                'action'                   => $action,
            ];
        }

        return DataTables::of($pengeluaran)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING PENERIMAAN
    public function sortingPenerimaan(Request $request)
    {
        // dd($request->all());
        $pengeluarans = TransaksiPengeluaran::with(['pengeluarandetail.barang'])->where('jenis', 'penerimaan');

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $pengeluarans->whereBetween('pengeluaran_tanggal', [$request->startDate, $request->endDate]);
        }

        // Check if nobukti is provided
        if ($request->nobukti !== null) {
            $pengeluarans->where('pengeluaran_nobukti', $request->nobukti);
        }

        // Check if nobukti is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $pengeluarans->where('supplier_id', $request->supplier);
        }

        // Check if namabarang is provided
        if ($request->namabarang !== null) {
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($request) {
                $query->where('barang_nama', $request->namabarang);
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }
        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $pengeluarans = $pengeluarans->get();

        $pengeluaran = [];
        $index     = 1;
        foreach ($pengeluarans as $item) {
            $pengeluaran_id             = $item->pengeluaran_id;
            $pengeluaran_tanggal        = \Carbon\Carbon::parse($item->pengeluaran_tanggal)->format('d-M-Y');
            $pengeluaran_nobukti        = $item->pengeluaran_nobukti;
            $supplier_nama              = $item->supplier->supplier_nama;
            $pengeluaran_keterangan     = $item->pengeluaran_keterangan;

            $action                   = '<button class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1" title="Detail Return Penjualan" id="detail-penerimaan"  data-id="' . $item->pengeluaran_id . '"><span class="material-icons btn-sm">visibility</span></button>';

            $pengeluaran[] = [
                'DT_RowIndex'              => $index++, // Add DT_RowIndex as the index plus 1
                'pengeluaran_id'           => $pengeluaran_id,
                'pengeluaran_tanggal'      => $pengeluaran_tanggal,
                'pengeluaran_nobukti'      => $pengeluaran_nobukti,
                'supplier_nama'            => $supplier_nama,
                'pengeluaran_keterangan'   => strtoupper($pengeluaran_keterangan),
                'action'                   => $action,
            ];
        }

        return DataTables::of($pengeluaran)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING HUTANG
    public function sortingHutang(Request $request)
    {
        $hutangs = TransaksiHutang::query();

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $hutangs->whereBetween('tgl_transaksi', [$request->startDate, $request->endDate]);
        }

        // Retrieve the filtered results
        $hutangs = $hutangs->get();

        $hutang = [];
        $index     = 1;
        foreach ($hutangs as $item) {
            $hutang_id             = $item->hutang_id;
            $tgl_transaksi         = \Carbon\Carbon::parse($item->tgl_transaksi)->format('d-M-Y');
            $kode_hutang           = $item->kode_hutang;
            $total                 = $item->total;
            $keterangan            = $item->keterangan;

            $hutang[] = [
                'DT_RowIndex'              => $index++, // Add DT_RowIndex as the index plus 1
                'kode_hutang'              => $kode_hutang,
                'tgl_transaksi'            => $tgl_transaksi,
                'total'                    => $total,
                'keterangan'               => $keterangan,
            ];
        }

        return DataTables::of($hutang)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING PENDAPATAN / PENGELUARAN LAIN
    public function sortingInOut(Request $request)
    {
        $inOuts = TransaksiInOut::query();

        // Check if startDate and endDate are provided
        if ($request->startDate !== null && $request->endDate !== null) {
            $inOuts->whereBetween('tgl_transaksi', [$request->startDate, $request->endDate]);
        }

        // Retrieve the filtered results
        $inOuts = $inOuts->get();

        $inOut = [];
        $index     = 1;
        foreach ($inOuts as $item) {
            $transaksi_id          = $item->transaksi_id;
            $tgl_transaksi         = \Carbon\Carbon::parse($item->tgl_transaksi)->format('d-M-Y');
            $kode_transaksi        = $item->kode_transaksi;
            $jenis_transaksi       = $item->jenis_transaksi;
            $total                 = $item->total;
            $keterangan            = $item->keterangan;

            $inOut[] = [
                'DT_RowIndex'              => $index++, // Add DT_RowIndex as the index plus 1
                'kode_transaksi'           => $kode_transaksi,
                'jenis_transaksi'          => strtoupper($jenis_transaksi),
                'tgl_transaksi'            => $tgl_transaksi,
                'total'                    => $total,
                'keterangan'               => $keterangan,
            ];
        }

        return DataTables::of($inOut)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING STOCK
    public function sortingStock(Request $request)
    {
        // dd($request->all());
        $barangs = Barang::with(['supplier', 'kadar', 'model', 'pabrik']);

        // Check if barang nama
        if ($request->namabarang !== null) {
            $barangs->where('barang_nama', $request->namabarang);
        }

        // Check if barang lokasi
        if ($request->lokasi !== 'tampilkan-semua' && $request->lokasi !== '-' && $request->lokasi !== null) {
            $barangs->where('barang_lokasi', $request->lokasi);
        } else if ($request->lokasi == 'tdk-ada-catatan') {
            $barangs->where('barang_lokasi', '');
        }

        // Check if supplier is provided
        if ($request->supplier !== null && $request->supplier !== '-') {
            $supplier = $request->has('supplier') ? $request->supplier : null;
            $barangs->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier);
            });
        }

        // Check if pabrik is provided
        if ($request->pabrik !== null && $request->pabrik !== '-') {
            $pabrik = $request->has('pabrik') ? $request->pabrik : null;
            $barangs->whereHas('pabrik', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($request->kadar != null && $request->kadar !== '-') {
            $kadar = $request->has('kadar') ? $request->kadar : null;
            $barangs->whereHas('kadar', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($request->model != null && $request->model !== '-') {
            $model = $request->has('model') ? $request->model : null;
            $barangs->whereHas('model', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $barangs = $barangs->get();

        $barang = [];
        $index     = 1;
        foreach ($barangs as $item) {
            $barang_id             = $item->barang_id;
            $barang_kode           = $item->barang_kode;
            $barang_nama           = $item->barang_nama;
            $barang_berat          = $item->barang_berat;
            $kadar_nama            = $item->kadar->kadar_nama;
            $model_nama            = $item->model->model_nama;
            $pabrik_nama           = $item->pabrik->pabrik_nama;
            $supplier_nama         = $item->supplier->supplier_nama;
            $barang_lokasi         = $item->barang_lokasi;

            $barang[] = [
                'DT_RowIndex'            => $index++, // Add DT_RowIndex as the index plus 1
                'barang_kode'            => $barang_kode,
                'barang_nama'            => $barang_nama,
                'barang_berat'           => $barang_berat,
                'kadar'                  => $kadar_nama,
                'model'                  => $model_nama,
                'pabrik'                 => $pabrik_nama,
                'supplier'               => $supplier_nama,
                'barang_lokasi'          => $barang_lokasi,
            ];
        }

        return DataTables::of($barang)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // SORTING HISTORY
    public function sortingHistory(Request $request)
    {
        $barangs = Barang::with(['transaksipembeliandetail.pembelian', 'transaksipenjualandetail.penjualan', 'transaksipenjualanreturndetail.return']);

        // Check if barang nama
        if ($request->namabarang !== null) {
            $barangs->where('barang_nama', $request->namabarang);
        }

        // Check if barang kode
        if ($request->kodebarang !== null) {
            $barangs->where('barang_kode', $request->kodebarang);
        }

        // Retrieve the filtered results
        $barangs = $barangs->get();
        // dd($barangs);
        $barang = [];
        $index = 1;
        foreach ($barangs as $item) {
            $barang_id = $item->barang_id;
            $barang_kode = $item->barang_kode;
            $barang_nama = $item->barang_nama;

            // Loop through pembelian relationships
            foreach ($item->transaksipembeliandetail as $pembelianDetail) {
                $tanggal_beli = $pembelianDetail->pembelian->pembelian_tanggal;
                $nobukti_beli = $pembelianDetail->pembelian->pembelian_nobukti;
                $harga_beli = $pembelianDetail->pembelian->pembelian_grandtotal;

                // Add pembelian data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_beli,
                    'nobukti' => $nobukti_beli,
                    'harga' => $harga_beli,
                    'jenis' => 'PEMBELIAN',
                    'kondisi' => '-',
                ];
            }

            // Loop through penjualan relationships
            foreach ($item->transaksipenjualandetail as $penjualanDetail) {
                $tanggal_jual = $penjualanDetail->penjualan->penjualan_tanggal;
                $nobukti_jual = $penjualanDetail->penjualan->penjualan_nobukti;
                $harga_jual = $penjualanDetail->penjualan->penjualan_grandtotal;

                // Add penjualan data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_jual,
                    'nobukti' => $nobukti_jual,
                    'harga' => $harga_jual,
                    'jenis' => 'PENJUALAN',
                    'kondisi' => '-',
                ];
            }

            // Loop through return relationships
            foreach ($item->transaksipenjualanreturndetail as $returnDetail) {
                $tanggal_return = $returnDetail->return->penjualan_return_tanggal;
                $nobukti_return = $returnDetail->return->penjualan_return_nobukti;
                $harga_return = $returnDetail->detail_penjualan_return_jml_harga;
                $kondisi_return = $returnDetail->detail_penjualan_return_kondisi;

                // Add return data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_return,
                    'nobukti' => $nobukti_return,
                    'harga' => $harga_return,
                    'jenis' => 'RETURN PENJUALAN',
                    'kondisi' => $kondisi_return,
                ];
            }
        }

        return DataTables::of($barang)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // CETAK PEMBELIAN
    public function cetakPembelian(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $pembelians = TransaksiPembelian::with(['supplier', 'pembeliandetail.barang']);

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $pembelians->whereBetween('pembelian_tanggal', [$dataArray[0], $dataArray[1]]);
        }

        // Check if nobukti is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '') {
            $pembelians->where('pembelian_nobukti', $dataArray[2]);
        }

        // Check if namabarang is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '') {
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($dataArray) {
                $query->where('barang_nama', $dataArray[3]);
            });
        }

        // Check if supplier is provided
        if ($dataArray[5] !== null && $dataArray[5] !== '-') {
            $supplier = $dataArray[5] ? $dataArray[5] : null;
            $pembelians->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($dataArray[6] !== null && $dataArray[6] !== '-') {
            $pabrik = $dataArray[6] ? $dataArray[6] : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($dataArray[7] != null && $dataArray[7] !== '-') {
            $kadar = $dataArray[7] ? $dataArray[7] : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($dataArray[8] != null && $dataArray[8] !== '-') {
            $model = $dataArray[8] ? $dataArray[8] : null;
            $pembelians->whereHas('pembeliandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $pembelians = $pembelians->get();

        if ($dataArray[10] === 'pdf') {

            if ($dataArray[9] === 'rekap-pembelian') {
                $filename = 'Laporan Rekap Pembelian-';
                $formatPaper = 'potrait';
                // Load the HTML view with the data
                $html = view('layout-print.rekap-pembelian', ['pembelians' => $pembelians, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            } else if ($dataArray[9] === 'detail-pembelian') {
                $filename = 'Laporan Detail Pembelian-';
                $formatPaper = 'landscape';
                // Load the HTML view with the data
                $html = view('layout-print.detail-pembelian', ['pembelians' => $pembelians, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            }

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            if ($dataArray[9] === 'rekap-pembelian') {
                // Send to Exports Function
                $export = new RekapPembelianExcel($pembelians, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Rekap Pembelian-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            } else if ($dataArray[9] === 'detail-pembelian') {
                // Send to Exports Function
                $export = new DetailPembelianExcel($pembelians, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Detail Pembelian-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            }
        }
    }

    // CETAK PENJUALAN
    public function cetakPenjualan(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $penjualans = TransaksiPenjualan::with(['penjualandetail.barang']);

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $penjualans->whereBetween('penjualan_tanggal', [$dataArray[0], $dataArray[1]]);
        }

        // Check if nobukti is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '') {
            $penjualans->where('penjualan_nobukti', $dataArray[2]);
        }

        // Check if namabarang is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '') {
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($dataArray) {
                $query->where('barang_nama', $dataArray[3]);
            });
        }

        // Check if supplier is provided
        if ($dataArray[5] !== null && $dataArray[5] !== '-') {
            $supplier = $dataArray[5] ? $dataArray[5] : null;
            $penjualans->whereHas('penjualandetail.barang.supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($dataArray[6] !== null && $dataArray[6] !== '-') {
            $pabrik = $dataArray[6] ? $dataArray[6] : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($dataArray[7] != null && $dataArray[7] !== '-') {
            $kadar = $dataArray[7] ? $dataArray[7] : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($dataArray[8] != null && $dataArray[8] !== '-') {
            $model = $dataArray[8] ? $dataArray[8] : null;
            $penjualans->whereHas('penjualandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $penjualans = $penjualans->get();

        if ($dataArray[10] === 'pdf') {

            if ($dataArray[9] === 'rekap-penjualan') {
                $filename = 'Laporan Rekap Penjualan-';
                $formatPaper = 'potrait';
                // Load the HTML view with the data
                $html = view('layout-print.rekap-penjualan', ['penjualans' => $penjualans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            } else if ($dataArray[9] === 'detail-penjualan') {
                $filename = 'Laporan Detail Penjualan-';
                $formatPaper = 'landscape';
                // Load the HTML view with the data
                $html = view('layout-print.detail-penjualan', ['penjualans' => $penjualans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            }

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            if ($dataArray[9] === 'rekap-penjualan') {
                // Send to Exports Function
                $export = new RekapPenjualanExcel($penjualans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Rekap Penjualan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            } else if ($dataArray[9] === 'detail-penjualan') {
                // Send to Exports Function
                $export = new DetailPenjualanExcel($penjualans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Detail Penjualan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            }
        }
    }

    // CETAK RETURN PENJUALAN
    public function cetakReturn(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $returnpenjualans = TransaksiPenjualanReturn::with(['returndetail.barang', 'penjualan.penjualandetail.barang']);

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $returnpenjualans->whereBetween('penjualan_return_tanggal', [$dataArray[0], $dataArray[1]]);
        }

        // Check if nobukti is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '') {
            $returnpenjualans->where('penjualan_return_nobukti', $dataArray[2]);
        }

        // Check if nofaktur is provided
        if ($dataArray[11] !== null && $dataArray[11] !== '') {
            $returnpenjualans->whereHas('penjualan', function ($query) use ($dataArray) {
                $query->where('penjualan_nobukti', $dataArray[11]);
            });
        }

        // Check if namabarang is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '') {
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($dataArray) {
                $query->where('barang_nama', $dataArray[3]);
            });
        }

        // Check if supplier is provided
        if ($dataArray[5] !== null && $dataArray[5] !== '-') {
            $supplier = $dataArray[5] ? $dataArray[5] : null;
            $returnpenjualans->whereHas('returndetail.barang.supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($dataArray[6] !== null && $dataArray[6] !== '-') {
            $pabrik = $dataArray[6] ? $dataArray[6] : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($dataArray[7] != null && $dataArray[7] !== '-') {
            $kadar = $dataArray[7] ? $dataArray[7] : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($dataArray[8] != null && $dataArray[8] !== '-') {
            $model = $dataArray[8] ? $dataArray[8] : null;
            $returnpenjualans->whereHas('returndetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $returnpenjualans = $returnpenjualans->get();

        if ($dataArray[10] === 'pdf') {

            if ($dataArray[9] === 'rekap-returnpenjualan') {
                $filename = 'Laporan Rekap Return Penjualan-';
                $formatPaper = 'potrait';
                // Load the HTML view with the data
                $html = view('layout-print.rekap-returnpenjualan', ['returnpenjualans' => $returnpenjualans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            } else if ($dataArray[9] === 'detail-returnpenjualan') {
                $filename = 'Laporan Detail Return Penjualan-';
                $formatPaper = 'landscape';
                // Load the HTML view with the data
                $html = view('layout-print.detail-returnpenjualan', ['returnpenjualans' => $returnpenjualans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            }

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            if ($dataArray[9] === 'rekap-returnpenjualan') {
                // Send to Exports Function
                $export = new RekapReturnExcel($returnpenjualans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Rekap Return Penjualan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            } else if ($dataArray[9] === 'detail-returnpenjualan') {
                // Send to Exports Function
                $export = new DetailReturnExcel($returnpenjualans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Detail Return Penjualan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            }
        }
    }

    // CETAK PENGELUARAN
    public function cetakPengeluaran(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);
        
        $pengeluarans = TransaksiPengeluaran::with(['pengeluarandetail.barang'])->where('jenis', 'pengeluaran');

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $pengeluarans->whereBetween('pengeluaran_tanggal', [$dataArray[0], $dataArray[1]]);
        }

        // Check if nobukti is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '') {
            $pengeluarans->where('pengeluaran_nobukti', $dataArray[2]);
        }

        // Check if namabarang is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '') {
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($dataArray) {
                $query->where('barang_nama', $dataArray[3]);
            });
        }

        // Check if supplier is provided
        if ($dataArray[5] !== null && $dataArray[5] !== '-') {
            $supplier = $dataArray[5] ? $dataArray[5] : null;
            $pengeluarans->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($dataArray[6] !== null && $dataArray[6] !== '-') {
            $pabrik = $dataArray[6] ? $dataArray[6] : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($dataArray[7] != null && $dataArray[7] !== '-') {
            $kadar = $dataArray[7] ? $dataArray[7] : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($dataArray[8] != null && $dataArray[8] !== '-') {
            $model = $dataArray[8] ? $dataArray[8] : null;
            $pengeluarans->whereHas('pengeluarandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $pengeluarans = $pengeluarans->get();

        if ($dataArray[10] === 'pdf') {

            if ($dataArray[9] === 'rekap-pengeluaran') {
                $filename = 'Laporan Rekap Pengeluaran-';
                $formatPaper = 'potrait';
                // Load the HTML view with the data
                $html = view('layout-print.rekap-pengeluaran', ['pengeluarans' => $pengeluarans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            } else if ($dataArray[9] === 'detail-pengeluaran') {
                $filename = 'Laporan Detail Pengeluaran-';
                $formatPaper = 'landscape';
                // Load the HTML view with the data
                $html = view('layout-print.detail-pengeluaran', ['pengeluarans' => $pengeluarans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            }

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            if ($dataArray[9] === 'rekap-pengeluaran') {
                // Send to Exports Function
                $export = new RekapPengeluaranExcel($pengeluarans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Rekap Pengeluaran-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            } else if ($dataArray[9] === 'detail-pengeluaran') {
                // Send to Exports Function
                $export = new DetailPengeluaranExcel($pengeluarans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Detail Pengeluaran-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            }
        }
    }

    // CETAK PENERIMAAN
    public function cetakPenerimaan(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $penerimaans = TransaksiPengeluaran::with(['pengeluarandetail.barang'])->where('jenis', 'penerimaan');

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $penerimaans->whereBetween('pengeluaran_tanggal', [$dataArray[0], $dataArray[1]]);
        }

        // Check if nobukti is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '') {
            $penerimaans->where('pengeluaran_nobukti', $dataArray[2]);
        }

        // Check if namabarang is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '') {
            $penerimaans->whereHas('pengeluarandetail.barang', function ($query) use ($dataArray) {
                $query->where('barang_nama', $dataArray[3]);
            });
        }

        // Check if supplier is provided
        if ($dataArray[5] !== null && $dataArray[5] !== '-') {
            $supplier = $dataArray[5] ? $dataArray[5] : null;
            $penerimaans->whereHas('supplier', function ($query) use ($supplier) {
                $query->where('supplier_id', $supplier); // Adjust 'id' to the actual foreign key in your relationships
            });
        }

        // Check if pabrik is provided
        if ($dataArray[6] !== null && $dataArray[6] !== '-') {
            $pabrik = $dataArray[6] ? $dataArray[6] : null;
            $penerimaans->whereHas('pengeluarandetail.barang', function ($query) use ($pabrik) {
                $query->where('pabrik_id', $pabrik);
            });
        }

        // Check if kadar is provided
        if ($dataArray[7] != null && $dataArray[7] !== '-') {
            $kadar = $dataArray[7] ? $dataArray[7] : null;
            $penerimaans->whereHas('pengeluarandetail.barang', function ($query) use ($kadar) {
                $query->where('kadar_id', $kadar);
            });
        }

        // Check if model is provided
        if ($dataArray[8] != null && $dataArray[8] !== '-') {
            $model = $dataArray[8] ? $dataArray[8] : null;
            $penerimaans->whereHas('pengeluarandetail.barang', function ($query) use ($model) {
                $query->where('model_id', $model);
            });
        }

        // Retrieve the filtered results
        $penerimaans = $penerimaans->get();

        if ($dataArray[10] === 'pdf') {

            if ($dataArray[9] === 'rekap-penerimaan') {
                $filename = 'Laporan Rekap Penerimaan-';
                $formatPaper = 'potrait';
                // Load the HTML view with the data
                $html = view('layout-print.rekap-penerimaan', ['penerimaans' => $penerimaans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            } else if ($dataArray[9] === 'detail-penerimaan') {
                $filename = 'Laporan Detail Penerimaan-';
                $formatPaper = 'landscape';
                // Load the HTML view with the data
                $html = view('layout-print.detail-penerimaan', ['penerimaans' => $penerimaans, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();
            }

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            if ($dataArray[9] === 'rekap-penerimaan') {
                // Send to Exports Function
                $export = new RekapPenerimaanExcel($penerimaans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Rekap Penerimaan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            } else if ($dataArray[9] === 'detail-penerimaan') {
                // Send to Exports Function
                $export = new DetailPenerimaanExcel($penerimaans, $dataArray[0], $dataArray[1]);

                return Excel::download($export, 'Laporan Detail Penerimaan-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
            }
        }
    }

    // CETAK HUTANG
    public function cetakHutang(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $hutangs = TransaksiHutang::query();

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $hutangs->whereBetween('tgl_transaksi', [$dataArray[0], $dataArray[1]]);
        }

        // Retrieve the filtered results
        $hutangs = $hutangs->get();

        if ($dataArray[2] === 'pdf') {

            $filename = 'Laporan Rekap Hutang-';
            $formatPaper = 'potrait';
            // Load the HTML view with the data
            $html = view('layout-print.rekap-hutang', ['hutangs' => $hutangs, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            // Send to Exports Function
            $export = new RekapHutangExcel($hutangs, $dataArray[0], $dataArray[1]);

            return Excel::download($export, 'Laporan Rekap Hutang-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
        }
    }

    // CETAK PENDAPATAN / PENGELUARAN LAIN
    public function cetakInOut(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $inOuts = TransaksiInOut::query();

        // Check if startDate and endDate are provided
        if ($dataArray[0] !== null && $dataArray[1] !== null) {
            $inOuts->whereBetween('tgl_transaksi', [$dataArray[0], $dataArray[1]]);
        }

        // Retrieve the filtered results
        $inOuts = $inOuts->get();

        if ($dataArray[2] === 'pdf') {

            $filename = 'Laporan Rekap Pendapatan/Pengeluaran Lain-';
            $formatPaper = 'potrait';
            // Load the HTML view with the data
            $html = view('layout-print.rekap-inOut', ['inOuts' => $inOuts, 'startDate' => $dataArray[0], 'endDate' => $dataArray[1]])->render();

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
                ->header('Content-Disposition', 'attachment; filename="' . $filename . $dataArray[0] . '/' . $dataArray[1] . '.pdf"');
        } else {

            // Send to Exports Function
            $export = new RekapInOutExcel($inOuts, $dataArray[0], $dataArray[1]);

            return Excel::download($export, 'Laporan Rekap Pendapatan-Pengeluaran Lain-' . $dataArray[0] . '-' . $dataArray[1] . '.xlsx');
        }
    }

    // CETAK STOCK
    public function cetakStock(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);

        $barangs = Barang::with(['supplier', 'pabrik', 'kadar', 'model']);

        // Check if barang nama
        if ($dataArray[0] !== null && $dataArray[0] !== '') {
            $barangs->where('barang_nama', $dataArray[0]);
        }

        // Check if barang lokasi
        if ($dataArray[7] !== 'tampilkan-semua' && $dataArray[7] !== '-' && $dataArray[7] !== null) {
            $barangs->where('barang_lokasi', $dataArray[7]);
        } else if ($dataArray[7] == 'tdk-ada-catatan') {
            $barangs->where('barang_lokasi', '');
        }

        // Check if supplier is provided
        if ($dataArray[1] !== null && $dataArray[1] !== '-') {
            $barangs->whereHas('supplier', function ($query) use ($dataArray) {
                $query->where('supplier_id', $dataArray[1]);
            });
        }

        // Check if pabrik is provided
        if ($dataArray[2] !== null && $dataArray[2] !== '-') {
            $barangs->whereHas('pabrik', function ($query) use ($dataArray) {
                $query->where('pabrik_id', $dataArray[2]);
            });
        }

        // Check if kadar is provided
        if ($dataArray[3] !== null && $dataArray[3] !== '-') {
            $barangs->whereHas('kadar', function ($query) use ($dataArray) {
                $query->where('kadar_id', $dataArray[3]);
            });
        }

        // Check if model is provided
        if ($dataArray[4] !== null && $dataArray[4] !== '-') {
            $barangs->whereHas('model', function ($query) use ($dataArray) {
                $query->where('model_id', $dataArray[4]);
            });
        }

        // Retrieve the filtered results
        $barangs = $barangs->get();

        if ($dataArray[6] === 'pdf') {

            $filename = 'Laporan Rekap Stock Lokasi ' . strtoupper($dataArray[7]) . ' ';
            $formatPaper = 'landscape';
            // Load the HTML view with the data
            $html = view('layout-print.rekap-stock', ['barangs' => $barangs])->render();

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
        } else {

            // Send to Exports Function
            $export = new RekapStock($barangs);

            return Excel::download($export, 'Laporan Rekap Stock Lokasi ' . strtoupper($dataArray[7]) . ' .xlsx');
        }
    }

    // CETAK HISTORY BARANG
    public function cetakHistory(Request $request)
    {
        $data = $request->query('data');
        $dataArray = json_decode($data, true);
        
        $barangs = Barang::with(['transaksipembeliandetail.pembelian', 'transaksipenjualandetail.penjualan', 'transaksipenjualanreturndetail.return']);

        // Check if barang nama
        if ($dataArray[0] !== null && $dataArray[0] !== '') {
            $barangs->where('barang_nama', $dataArray[0]);
        }

        // Check if barang kode
        if ($dataArray[1] !== null && $dataArray[1] !== '') {
            $barangs->where('barang_kode', $dataArray[1]);
        }

        // Retrieve the filtered results
        $barangss = $barangs->get();
        
        $barang = [];
        $index = 1;
        foreach ($barangss as $item) {
            $barang_id = $item->barang_id;
            $barang_kode = $item->barang_kode;
            $barang_nama = $item->barang_nama;

            // Loop through pembelian relationships
            foreach ($item->transaksipembeliandetail as $pembelianDetail) {
                $tanggal_beli = $pembelianDetail->pembelian->pembelian_tanggal;
                $nobukti_beli = $pembelianDetail->pembelian->pembelian_nobukti;
                $harga_beli = $pembelianDetail->pembelian->pembelian_grandtotal;

                // Add pembelian data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_beli,
                    'nobukti' => $nobukti_beli,
                    'harga' => $harga_beli,
                    'jenis' => 'PEMBELIAN',
                    'kondisi' => '-',
                ];
            }

            // Loop through penjualan relationships
            foreach ($item->transaksipenjualandetail as $penjualanDetail) {
                $tanggal_jual = $penjualanDetail->penjualan->penjualan_tanggal;
                $nobukti_jual = $penjualanDetail->penjualan->penjualan_nobukti;
                $harga_jual = $penjualanDetail->penjualan->penjualan_grandtotal;

                // Add penjualan data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_jual,
                    'nobukti' => $nobukti_jual,
                    'harga' => $harga_jual,
                    'jenis' => 'PENJUALAN',
                    'kondisi' => '-',
                ];
            }

            // Loop through return relationships
            foreach ($item->transaksipenjualanreturndetail as $returnDetail) {
                $tanggal_return = $returnDetail->return->penjualan_return_tanggal;
                $nobukti_return = $returnDetail->return->penjualan_return_nobukti;
                $harga_return = $returnDetail->detail_penjualan_return_jml_harga;
                $kondisi_return = $returnDetail->detail_penjualan_return_kondisi;

                // Add return data to barang
                $barang[] = [
                    'DT_RowIndex' => $index++,
                    'barang_kode' => $barang_kode,
                    'barang_nama' => $barang_nama,
                    'tanggal' => $tanggal_return,
                    'nobukti' => $nobukti_return,
                    'harga' => $harga_return,
                    'jenis' => 'RETURN PENJUALAN',
                    'kondisi' => $kondisi_return,
                ];
            }
        }
        
        if ($dataArray[3] === 'pdf') {

            $filename = 'Laporan Rekap History Barang '. $dataArray[0] .' ';
            $formatPaper = 'landscape';
            // Load the HTML view with the data
            $html = view('layout-print.rekap-history', ['barangs' => $barang])->render();

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
        } else {

            // Send to Exports Function
            $export = new RekapHistory($barang);

            return Excel::download($export, 'Laporan Rekap History Barang '. $dataArray[0] .' .xlsx');
        }
    }
}
