<!DOCTYPE html>
<html>

<head>
    <title>Laporan Detail Pengeluaran</title>
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
            <h1>DETAIL PENGELUARAN BARANG</h1>
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
                    <td>Supplier</td>
                    <td>Kode</td>
                    <td>Nama Barang</td>
                    <td>Berat</td>
                    <td>Kondisi</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalGrandTotal = 0;
                    $prevNoBukti = null;
                @endphp
                @foreach ($pengeluarans as $parentIndex => $item)
                    @php
                        $beratTotal = 0;
                    @endphp
                    @foreach ($item->pengeluarandetail as $detailIndex => $detailItem)
                        <tr>
                            <td>
                                @if ($detailIndex === 0)
                                    {{ $loop->parent->iteration }}
                                @endif
                            </td>
                            <td>
                                @if ($detailIndex === 0)
                                    {{ $item->pengeluaran_nobukti }}
                                @endif
                            </td>
                            <td>
                                @if ($detailIndex === 0)
                                    {{ date('d-M-y', strtotime($item->pengeluaran_tanggal)) }}
                                @endif
                            </td>
                            <td>
                                @if ($detailIndex === 0)
                                    {{ isset($item->supplier->supplier_nama) ? $item->supplier->supplier_nama : '-' }}
                                @endif
                            </td>

                            <td>{{ $detailItem->barang->barang_kode }}</td>
                            <td style="width:300px; text-align:left;">{{ $detailItem->barang->barang_nama }}</td>
                            <td>{{ $detailItem->detail_pengeluaran_berat }}</td>
                            <td>{{ $detailItem->detail_pengeluaran_kondisi }}</td>
                        </tr>
                        @php
                            $beratTotal += $detailItem->detail_pengeluaran_berat;
                        @endphp
                    @endforeach

                    @if ($prevNoBukti !== $item->pengeluaran_nobukti)
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>Total</strong></td>
                            <td><strong>{{ $beratTotal }}</strong></td>
                            <td></td>
                        </tr>
                        @php
                            $groupTotal = 0;
                        @endphp
                    @endif

                    @php
                        $prevNoBukti = $item->pengeluaran_nobukti;
                        $totalGrandTotal += $beratTotal;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right"><strong>Grand Total Berat</strong></td>
                    <td><strong>{{ $totalGrandTotal }}</strong></td>
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
