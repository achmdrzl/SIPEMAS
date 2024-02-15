<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekap Hutang</title>
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
            <h1>REKAP HUTANG</h1>
            <p style="margin-top: -10px; font-size: larger;">Periode {{ date('d-M-Y', strtotime($startDate)) }} s/d
                {{ date('d-M-Y', strtotime($endDate)) }}</p>
        </div>
        <hr />
        <!-- Ini adalah garis horizontal yang lebih tebal -->
        <table class="body" style="width: 100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kode Hutang</td>
                    <td>Tanggal Transaksi</td>
                    <td>Keterangan</td>
                    <td>Total</td>
                    <td>Total Bayar</td>
                    <td>Tersisa</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($hutangs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_hutang }}</td>
                        <td>{{ date('d-M-y', strtotime($item->tgl_transaksi)) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td style="text-align: right">Rp.{{ number_format($item->total) }}</td>
                        <td style="text-align: right">Rp.{{ number_format($item->total_bayar) }}</td>
                        <td style="text-align: right">Rp.{{ number_format($item->total - $item->total_bayar) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <strong>Total</strong>
                    </td>
                    <td style="text-align: right">
                        <strong>Rp. {{ number_format($hutangs->sum('total')) }}</strong>
                    </td>
                    <td style="text-align: right">
                        <strong>Rp. {{ number_format($hutangs->sum('total_bayar')) }}</strong>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">
                        <strong>Total Hutang Tersisa</strong>
                    </td>
                    <td colspan="3" style="text-align: right">
                        <strong>Rp. {{ number_format($hutangs->sum('total') - $hutangs->sum('total_bayar')) }}</strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    {{-- Footer --}}
    <script type="text/php">
            if (isset($pdf)) {
                $x = 545; // Adjust the X-coordinate to move the page number to the right
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
