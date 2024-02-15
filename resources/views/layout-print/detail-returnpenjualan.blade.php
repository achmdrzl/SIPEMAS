<!DOCTYPE html>
<html>

<head>
    <title>Laporan Detail Return Penjualan</title>
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
            border: 2px solid black;
            /* Ubah ketebalan sesuai keinginan Anda */
            margin: 10px 0;
            /* Atur margin di atas dan bawah garis horizontal */
        }

        .pagenum::before {
            content: "Page " counter(page);
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="heading" style="align-items: center; text-align: center">
            <h1>DETAIL RETURN PENJUALAN</h1>
            <p style="margin-top: -10px; font-size: larger;">Periode {{ date('d-M-Y', strtotime($startDate)) }} s/d
                {{ date('d-M-Y', strtotime($endDate)) }}</p>
        </div>
        <hr />
        <!-- Ini adalah garis horizontal yang lebih tebal -->
        <table class="body" style="width: 100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>No Bukti</td>
                    <td>Tanggal</td>
                    <td>No Faktur</td>
                    <td>Kode</td>
                    <td>Nama Barang</td>
                    <td>Berat Return</td>
                    <td>Harga Return</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $groupTotal = 0;
                    $beratTotal = 0;
                    $totalGrandTotal = 0;
                    $prevNoBukti = null;
                @endphp
                @foreach ($returnpenjualans as $item)
                    {{-- @foreach ($item->returndetail as $detailItem) --}}
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $item->penjualan_return_nobukti }}
                            @if ($loop->first)
                            @endif
                        </td>
                        <td>
                            {{ date('d-M-y', strtotime($item->penjualan_return_tanggal)) }}
                            @if ($loop->first)
                            @endif
                        </td>
                        <td>
                            {{ $item->penjualan->penjualan_nobukti }}
                            @if ($loop->first)
                            @endif
                        </td>
                        <td>{{ $item->returndetail->barang->barang_kode }}</td>
                        <td style="width:300px; text-align:left;">{{ $item->returndetail->barang->barang_nama }}</td>
                        <td>{{ $item->returndetail->detail_penjualan_return_berat }}</td>
                        <td style="text-align: right">
                            Rp.{{ number_format($item->returndetail->detail_penjualan_return_jml_harga) }}</td>
                    </tr>
                    @php
                        $groupTotal += $item->returndetail->detail_penjualan_return_jml_harga;
                        $totalGrandTotal += $item->returndetail->detail_penjualan_return_jml_harga;
                    @endphp
                    {{-- @endforeach --}}

                    @if ($prevNoBukti !== $item->penjualan_return_nobukti)
                        <tr>
                            <td colspan="7" style="text-align: right"><strong>Total</strong></td>
                            <td style="text-align: right"><strong>Rp. {{ number_format($groupTotal) }}</strong></td>
                        </tr>
                        @php
                            $groupTotal = 0;
                        @endphp
                    @endif
                    @php
                        $prevNoBukti = $item->penjualan_return_nobukti;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" style="text-align: right"><strong>Grand Total</strong></td>
                    <td style="text-align: right"><strong>Rp. {{ number_format($totalGrandTotal) }}</strong></td>
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
