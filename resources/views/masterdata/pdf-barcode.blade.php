44
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Set the page size */

        body {
            margin: 0;
            /* Remove default margins */
        }

        .table {
            width: 100%;
            height: 100%;
        }

        .centered-content2 {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            height: 100%;
            /* Make the div take the full height of the table cell */
        }

        .spacer {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <td class="centered-content2">
                {{ $barang->barang_berat }} Gr
            </td>
        </tr>
        <tr>
            <td class="centered-content2">
                {{ $barang->kadar->kadar_nama }}
            </td>
        </tr>
        <tr>
            <td class="centered-content2">
                {{ $barang->model->model_nama }}
            </td>
        </tr>
        <tr class="spacer">
            <td>
                <!-- Spacer row with CSS class -->
            </td>
        </tr>
        <tr>
            <td class="centered-content2">
                {!! $barcode !!}
            </td>
        </tr>
        <tr>
            <td class="centered-content2">
                {{ $barang->barang_kode }}
            </td>
        </tr>
    </table>
</body>

</html>
