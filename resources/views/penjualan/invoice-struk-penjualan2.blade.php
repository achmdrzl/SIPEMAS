<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Faktur Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        @page {
            size: A5 landscape;
            /* Set the page size to half A4 (A5) */
            margin: 0.5cm;
            /* Set the page margins (adjust as needed) */
        }

        #header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            /* Align items at the top of the header */
        }

        #toko {
            /* font-weight: bold; */
            text-align: left;
            /* Align text to the left within the toko div */
        }

        #faktur {
            text-align: right;
            margin-bottom: 20px;
            margin-top: -80px;
            text-align: right;
            /* Align text to the right within the faktur div */
        }

        #alamat {
            font-size: 12px;
            margin-bottom: 10px;
            margin-top: -17px;
            text-align: left;
            /* Align text to the left within the alamat div */
        }

        #tables {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }

        #tables th,
        #tables td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        #tables th {
            background-color: #f0f0f0;
        }

        #subtotal,
        #disc,
        #total {
            text-align: right;
            /* font-weight: bold; */
        }

        #keterangan {
            font-style: italic;
            margin-bottom: 20px;
        }

        #perhatian {
            font-size: 12px;
        }

        #subtotal {
            position: absolute;
            margin-left: 480px;
            margin-top: -100px;
        }

        .subtotal-perhatian {
            display: flex;
            justify-content: space-between;
        }

        .table-cell {
            display: flex;
            align-items: center;
            padding: 15px;
        }

        .left {
            flex: 1;
            text-align: left;
        }

        .center {
            flex: 1;
            text-align: left;
            max-width: 300px;
        }

        .right {
            flex: 1;
            /* text-align: right; */
            /* margin-left: 30px; */
        }

        .gambar {
            display: block;
            max-width: 80px;
            max-height: 80px;
            /* margin-top: -50px; */
        }

        .gambar {
            display: block;
            max-width: 80px;
            max-height: 80px;
        }
    </style>
</head>

<body>
    <div id="header">
        <div id="toko">
            <p style="margin-left: 100px;">TOKO EMAS</p>
            <h1 style="margin-top: -15px;">BINTANG KENCANA</h1>
            <p style="margin-left: 25px; margin-top:-20px;">Jl. Raya Blimbing No.48 Blimbing</p>
        </div>
        <div id="faktur">
            <strong>Faktur Penjualan</strong><br>
            Tanggal: {{ date('d-M-y', strtotime($penjualans->penjualan_tanggal)) }}<br>
            Jam: {{ date('H:i', strtotime($penjualans->created_at)) }}
        </div>
    </div>
    <table id="tables">
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Nama Barang</th>
                <th>Kadar</th>
                <th>Berat</th>
                <th>Harga/gr</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans->penjualandetail as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="center">
                            {{ $item->barang->barang_nama }}
                        </div>
                        <div class="left">
                            <div class="gambar2">
                                {!! $barcode[$key] !!}
                            </div>
                            <div>{{ $item->barang->barang_kode }}</div>
                        </div>
                    </td>
                    <td>
                        <div class="right">
                            @if ($item->barang->barang_foto)
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/foto_barang/' . $item->barang->barang_foto))) }}"
                                    alt="Gambar Barang" class="gambar">
                            @else
                                <span>no photo</span>
                            @endif
                        </div>
                    </td>
                    <td>{{ $item->barang->kadar->kadar_nama }}</td>
                    <td>{{ number_format($item->detail_penjualan_berat_jual, 2) }}</td>
                    <td>Rp. {{ number_format($item->detail_penjualan_harga) }}</td>
                    <td>Rp. {{ number_format($item->detail_penjualan_jml_harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="perhatian" style="width: 200px; max-height: 400px; overflow-y: auto;">
        <p style="width: 400px; overflow-wrap: break-word;">
            Keterangan: {{ $penjualans->penjualan_keterangan }}
        </p>
    </div>
    <div class="subtotal-perhatian">
        <div id="perhatian" style="width: 450px">
            Perhatian:<br>
            1. Surat pembelian faktur dibawa saat barang akan dijual kembali.<br>
            2. Jika surat pembelian faktur hilang atau rusak harus ada surat keterangan kehilangan dari kepolisian
        </div>
        <div>
            <table id="subtotal" style="font-size:14px">
                <tr>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($penjualans->penjualan_subtotal) }}</td>
                </tr>
                <tr>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td>Disc</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($penjualans->penjualan_diskon) }}</td>
                </tr>
                <tr>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td><strong>Total</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Rp. {{ number_format($penjualans->penjualan_grandtotal) }}</strong></td>
                </tr>
                <tr>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td>Bayar</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($penjualans->penjualan_bayar) }}</td>
                </tr>
                <tr>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td class="empty-cell"></td>
                    <td>Kembalian</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($penjualans->penjualan_kembalian) }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
