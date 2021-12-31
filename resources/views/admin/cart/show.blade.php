<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Label Pengiriman</title>
    <style>
        @page {
            size: A6;
        }
        .card {
            width: 14.8cm;
            height: 10.5cm;
            border-style: dashed;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-bottom: 0.5px solid gray;
        }
        .content {
            height: 7cm;
        }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
        }
        .footer {
            border-top: 0.5px solid gray;
            padding-left: 10px
        }
        .tgl {
            font-size: 12px;
            margin-bottom: -15px
        }
        .owner {
            font-size: 12px;
        }
        .label {
            font-size: 12px;
            margin-top: 7px;
            margin-bottom: -15px;
        }
        .note {
            font-size: 12px;
            font-weight: 200
        }
        .text {
            font-size: 18px;
            color: #040
        }
        .code {
            font-size: 14px;
            margin-top: -5px
        }
        .infomation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 20px;
            padding-right: 20px;
        }
        .info-label {
            font-size: 16px;
            font-weight: 400
        }
        .pengirim {
            font-size: 14px;
            font-weight: bold;
            margin-top: -5px;
        }
        .penerima {
            font-size: 14px;
            font-weight: bold;
            margin-top: -5px;
        }
        .phone {
            font-size: 14px;
            font-weight: 200;
            margin-top: -15px;
        }
        .address {
            font-size: 14px;
            font-weight: 200;
            margin-top: -15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <img src="{{ asset('img/ekspedisi/'). '/'. $ekspedisi }}" alt="" style="width: 100px; height: 50px;">
            <div>
                <h5 class="tgl">Tanggal Cetak: {{ $date }}</h5>
                <h5 class="owner">Di Cetak oleh Owner</h5>
            </div>
        </div>
        <div class="content">
            <div class="content-header">
                <img src="{{ asset('img/reseller/'). '/'. $logo_pengirim }}" alt="" style="width: 100px; height: 50px;">
                <div style="width: 5cm; text-align: center">
                    <h1 class="text">Label Pengiriman</h1>
                    <h5 class="code">S0212021-0078</h5>
                </div>
            </div>
            <div class="infomation">
                <div style="width: 50%">
                    <h1 class="info-label">Infomasi Pengirim</h1>
                    <h5 class="pengirim">{{ $nama_pengirim }}</h5>
                    <h5 class="phone">{{ $no_pengirim }}</h5>
                    <h5 class="address">{{ $alamat_pengirim }}</h5>
                </div>
                <div style="width: 50%">
                    <h1 class="info-label">Infomasi Penerima</h1>
                    <h5 class="pengirim">{{ $nama_penerima }}</h5>
                    <h5 class="phone">{{ $no_penerima }}</h5>
                    <h5 class="address">{{ $alamat_penerima }}</h5>
                </div>
            </div>
        </div>
        <div class="footer">
            <h5 class="label">Catatan: </h5>
            <h5 class="note">{{ $catatan }}</h5>
        </div>
    </div>
</body>
</html>