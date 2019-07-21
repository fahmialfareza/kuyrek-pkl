<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #{{$booking->id}}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: rgb(55, 143, 185);
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{$booking->user->name}}</h3>
                <pre>
<!-- Street 15
123456 City
United Kingdom -->
Indonesia
<br /><br />
Tanggal dan Waktu: {{$booking->created_at}}
No. Pesanan: #{{$booking->id}}
Status: Sudah Dibayar
</pre>


            </td>
            <td align="center">
                <img src="img/kitaolahraga-fav-white.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>KuyRek</h3>
                <pre>
                    https://kuyrek.com

                    Jalan Kembang Turi Gang VI no. 22
                    65141 Kota Malang
                    Indonesia
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Bukti Pemesanan #{{$booking->id}}</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Deskripsi</th>
            <th>Kuantitas</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$booking->sportvenue->name}} main tanggal {{$booking->date}} pada jam {{$booking->start_time}} sampai {{$booking->end_time}}</td>
            <td>1</td>
            <td align="left">Rp {{$booking->total_payment}},00</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">Rp {{$booking->total_payment}},00</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} KuyRek - Hak Cipta.
            </td>
            <td align="right" style="width: 50%;">
                "Kuy Rek olahraga!"
            </td>
        </tr>

    </table>
</div>
</body>
</html>
