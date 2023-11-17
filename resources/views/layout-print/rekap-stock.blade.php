<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Lain-Lain</title>
        <style>
            body {
                font-family: "Arial", sans-serif;
                font-size: 12px;
            }

            table.body {
                border-collapse: collapse;
            }

            table.body thead {
                font-weight: bold;
            }

            .manifest {
                border: 1px solid black;
            }

            table.body,
            table.body th,
            table.body td {
                border: 1px solid black;
                padding: 4px;
            }

            th,
            td {
                padding: 4px;
                text-align: center;
            }

            /* Menambahkan style untuk garis horizontal */
            hr {
                border: 2px solid black; /* Ubah ketebalan sesuai keinginan Anda */
                margin: 10px 0; /* Atur margin di atas dan bawah garis horizontal */
            }
            .pagenum::before {
                content: "Page " counter(page);
            }
        </style>
    </head>

    <body>
        <div class="body">
            <div
                class="heading"
                style="align-items: center; text-align: center"
            >
                <h1>REKAP STOCK</h1>
                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{-- <h5 style="font-size: larger; text-align: left; margin: 0;">Jumlah Barang : {{ $jumlah->count() }}</h5>
                    <h5 style="font-size: larger; text-align: left; margin: 0;">Berat Total : {{ $jumlah->sum('barang_berat') }}</h5> --}}
                </div>
            </div>
            <hr />
            <!-- Ini adalah garis horizontal yang lebih tebal -->
            <table class="body" style="width: 100%">
                <thead>
                    <tr>
                        <td>Kode</td>
                        <td>Nama</td>
                        <td>Berat</td>
                        <td>Kadar</td>
                        <td>Model</td>
                        <td>Pabrik</td>
                        <td>Supplier</td>
                        <td>Lokasi</td>
                        <td>Harga</td>
                        <td>Ket</td>
                    </tr>
                </thead>
                <tbody>
                    @php($totalHarga = 0)
                    @foreach($barangs as $item)
                        {{ $totalHarga += $item['harga'] }}
                        <tr>
                            <td>{{ $item['barang_kode'] }}</td>
                            <td style="width:100px">{{ $item['barang_nama'] }}</td>
                            <td>{{ $item['barang_berat'] }}</td>
                            <td>{{ $item['kadar'] }}</td>
                            <td>{{ $item['model'] }}</td>
                            <td>{{ $item['pabrik'] }}</td>
                            <td>{{ $item['supplier'] }}</td>
                            <td>{{ $item['barang_lokasi'] }}</td>
                            <td style="text-align: right">Rp. {{ number_format($item['harga']) }}</td>
                            <td>{{ $item['jenis'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" style="text-align: right"><strong>Grand Total</strong></td>
                        <td style="text-align: right"><strong>Rp. {{ number_format($totalHarga) }}</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- Footer --}}
        <script type="text/php">
            if (isset($pdf)) {
                $x = 745; // Adjust the X-coordinate to move the page number to the right
                $y = 10;  // Adjust the Y-coordinate to move the page number to the top
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = null;
                $size = 8;
                $color = array(0, 0, 0); // Set the color to black (RGB: 0, 0, 0)
                $word_space = 0.0;       // Default
                $char_space = 0.0;       // Default
                $angle = 0.0;            // Default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
    </body>
</html>
