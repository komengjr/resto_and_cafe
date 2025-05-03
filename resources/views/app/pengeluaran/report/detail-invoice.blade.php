<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
</head>
<style>
    @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #0087C3;
        text-decoration: none;
    }

    body {
        position: relative;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-family: SourceSansPro;
    }

    header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
    }

    #logo {
        float: left;
        margin-top: 8px;
    }

    #logo img {
        height: 70px;
    }

    #company {
        float: right;
        text-align: right;
    }


    #details {
        margin-bottom: 50px;
    }

    #client {
        padding-left: 6px;
        border-left: 6px solid #db3311;
        float: left;
    }

    #client .to {
        color: #777777;
    }

    h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
    }

    #invoice {
        padding-top: 0;
        float: right;
        text-align: right;
    }

    #invoice span {
        font-size: 1.5rem;
    }

    #invoice h1 {
        color: #db3311;
        font-size: 2.4em;
        /* line-height: 1em; */
        font-weight: normal;
        margin: 0 0 10px 0;
    }

    #invoice .date {
        font-size: 1.1em;
        color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 5px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    table th {
        white-space: nowrap;
        font-weight: normal;
    }

    table td {
        text-align: right;
    }

    table td h3 {
        color: #db3311;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
    }

    table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        text-align: center;
        background: #db3311;
    }

    table .desc {
        text-align: left;
    }

    table .unit {
        background: #DDDDDD;
    }

    table .qty {
        text-align: center;
    }

    table .total {
        background: #eaebe3;
        color: #ff0404;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table tbody tr:last-child td {
        border: none;
    }

    table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.2em;
        white-space: nowrap;
        border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
        border-top: none;
    }

    table tfoot tr:last-child td {
        color: #db3311;
        font-size: 1.4em;
        border-top: 1px solid #db3311;

    }

    table tfoot tr td:first-child {
        border: none;
    }

    #thanks {
        font-size: 2em;
        margin-bottom: 50px;
    }

    #notices {
        position: absolute;
        bottom: 0;
        padding-left: 6px;
        border-left: 6px solid #db3311;
    }

    #notices .notice {
        font-size: 1.2em;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
    }
</style>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="data:image/png;base64, {{ $image }}">
        </div>
        <div id="company">
            <h2 class="name">CV Indotama Sukarani</h2>
            <div>Lorem ipsum dolor sit amet consectetur </div>
            <div>0561 982 0029</div>
            <div>resto@cafemail.com</div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Range Date:</div>
                <h2 class="name">
                </h2>
                <div class="address"></div>
                <div class="email">Create By : {{ Auth::user()->fullname }}</div>
            </div>
            <div id="invoice">
                <span>Laporan Keuangan</span>
                <div class="date" style="color: red;">Report Pembelanjaan</div>
                <div class="date">{{ date('d-m-Y') }}</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">NO NOTA</th>
                    <th class="qty">BAHAN</th>
                    <th class="unit">JUMLAH</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody id="invoiceItems">
                @php
                    $no = 1;
                    $hasil = 0;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td class="no">{{$no++}}</td>
                        <td class="desc">{{$datas->no_inv}}</td>
                        <td>{{$datas->m_bahan_name}}</td>
                        <td class="unit">{{$datas->qty_detail}} {{$datas->m_bahan_satuan}}</td>
                        <td class="total">@currency($datas->price_detail)</td>
                    </tr>
                    @php
                        $hasil = $hasil + $datas->price_detail ;
                    @endphp
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
                {{-- <tr>
                    <td colspan="3"></td>
                    <td colspan="2">TAX 25%</td>
                    <td>123</td>
                </tr> --}}
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>@currency($hasil)</td>
                </tr>
            </tfoot>
        </table>
        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
</body>

</html>
