<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Detail Pembelian</title>
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
        </style>
    </head>

    <body>
        <div class="body">
            <div
                class="heading"
                style="align-items: center; text-align: center"
            >
                <h1>DETAIL PEMBELIAN</h1>
                <p style="margin-top: -10px; font-size: larger;">Periode {{ date('d-M-Y', strtotime($startDate)) }} s/d {{ date('d-M-Y', strtotime($endDate)) }}</p>
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
                        <td>Kadar</td>
                        <td>Berat</td>
                        <td>H.Emas</td>
                        <td>Nilai Tukar</td>
                        <td>Jumlah Harga</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupTotal = 0;
                        $beratTotal = 0;
                        $totalGrandTotal = 0;
                        $prevNoBukti = null;
                    @endphp
                    @foreach($pembelians as $item)
                        @foreach($item->pembeliandetail as $detailItem)
                            <tr>
                                <td>
                                    @if ($loop->first)
                                        {{ $loop->parent->iteration }}
                                    @endif
                                </td>
                                <td>
                                    @if ($loop->first)
                                        {{ $item->pembelian_nobukti }}
                                    @endif
                                </td>
                                <td>
                                    @if ($loop->first)
                                        {{ date('d-M-y', strtotime($item->pembelian_tanggal)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($loop->first)
                                        {{ $item->supplier->supplier_nama }}
                                    @endif
                                </td>
                                <td>{{ $detailItem->barang->barang_kode }}</td>
                                <td style="width:100px">{{ $detailItem->barang->barang_nama }}</td>
                                <td>{{ $detailItem->detail_pembelian_kadar }}</td>
                                <td>{{ $detailItem->detail_pembelian_berat }}</td>
                                <td style="text-align: right">Rp.{{ number_format($detailItem->detail_pembelian_harga_beli) }}</td>
                                <td>{{ $detailItem->detail_pembelian_nilai_tukar }}</td>
                                <td style="text-align: right">Rp.{{ number_format($detailItem->detail_pembelian_total) }}</td>
                            </tr>
                            @php
                                $groupTotal += $detailItem->detail_pembelian_total;
                                $beratTotal += $detailItem->detail_pembelian_berat;
                                $totalGrandTotal += $detailItem->detail_pembelian_total;
                            @endphp
                        @endforeach

                        @if ($prevNoBukti !== $item->pembelian_nobukti)
                            <tr>
                                <td colspan="7" style="text-align: right"><strong>Total</strong></td>
                                <td><strong>{{ $beratTotal }}</strong></td>
                                <td colspan="2"></td>
                                <td style="text-align: right"><strong>Rp. {{ number_format($groupTotal) }}</strong></td>
                            </tr>
                            @php
                                $groupTotal = 0;
                            @endphp
                        @endif
                        @php
                            $prevNoBukti = $item->pembelian_nobukti;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10" style="text-align: right"><strong>Grand Total</strong></td>
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
