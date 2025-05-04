<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Barcode</title>

</head>
<style>
    @page {
        margin-left: 2px;
        margin-top: 0px;
        font-family: Arial, Helvetica, sans-serif;
        font-style: normal;
        font-weight: normal;
        /* src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype'); */
    }

    /* @media print {
        @page {
            size: 86mm 54mm;
            margin: 0;
        }
    } */
</style>
<style>
    div.relative {
        position: absolute;
        top: 15px;
        left: 0px;
        width: 123px;
        height: 55px;
    }

    div.absolute {
        position: absolute;
        top: -12.8px;
        right: 0;
        width: 56px;
        height: 61px;
        border: 1px solid #000000;
    }

    table tr td p {
        border-collapse: collapse;
        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }

    table {
        /* border-collapse: collapse; */
        width: 100%;
    }



    tr,
    td {
        border: 0.2px solid black;
        border-radius: 1px;
    }
</style>
</head>

<body style="padding-top:0px; padding-left: 0px;">

    <div class="relative">
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate($data->id_inventaris), ) !!}"> --}}
        <img style="padding-top: 0px; width: 63px; height: 63px;" src="data:image/png;base64, {!! base64_encode(
            QrCode::format('png')->backgroundColor(255, 255, 255)->size(907)->style('round')->eye('circle')->generate($data->inventaris_data_code),
        ) !!} ">
        <div class="absolute">
            <table style="font-size: 4px; margin: 0px; padding: 0px;">
                <tr>
                    <td colspan="3"><strong style="color: #000000">{{ $data->inventaris_data_name }}</strong></td>
                </tr>
                <tr>
                    <td style="width: 20%;">
                        <p style="color: #000000">Lokasi</p>
                    </td>
                    <td class="text-center" style="width: 1%;">
                        <p>:</p>
                    </td>
                    <td>
                        <p style="color: #000000">
                            123
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center" style="font-size: 4px">
                        <strong style="color: #000000">{{ $data->inventaris_data_code }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <strong style="color: #000000">123</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="color: #000000">
                            @php
                                $cabang = DB::table('master_cabang')->where('master_cabang_code',$data->inventaris_data_cabang)->first();
                            @endphp
                            {{$cabang->master_cabang_name}}
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</html>
