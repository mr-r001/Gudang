
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />
    <style>
        @page {
            size: legal landscape;
        }
        
        table,
        div,
        span {
            font-size: 12px;
        }
    </style>

    <title>Labul Intel</title>
</head>

<body  >
    <section class="sheet padding-10mm">
    <u><span>Kejaksaan Negeri Pagar Alam </span></u>
        <u><span class="ml-auto" style="position: absolute;right: 30px;top: 40px;">L.IN.25</span></u> <br />
        <br />
        <h5 class="text-center mt-4" style="font-weight: 100; font-size: 14px">RAHASIA</h5>
        <h5 class="text-center py-3">
            LAPORAN BULANAN <br /> PEMBINAAN MASYARAKAT TATA HUKUM<br /> BULAN {{ $month }} TAHUN {{ $year }}
        </h5>
        <br />

        <div class="tabel-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table">
                    <tr class="text-center text-wrap" style="width: 8rem">
                        <th>No</th>
                        <th>DIREKTORAT/KEJATI/KEJARI/CABJARI</th>
                        <th>PESERTA</th>
                        <th>WAKTU DAN TEMPAT</th>
                        <th>MATERI</th>
                        <th>JUMLAH PESERTA</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr height="5px" class="text-center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                </thead>
                @if (count($data) > 0)
                    @php
                        $no = 1
                    @endphp
                    @foreach ($data as $item )
                    <tbody>
                        <tr height="40px" align="center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->direktorat }}</td>
                            <td>{{ $item->peserta }}</td>
                            <td>{{ $item->waktu }} dan {{ $item->tempat }}</td>
                            <td>{{ $item->materi }}</td>
                            <td>{{ $item->jumlah_peserta }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    </tbody>
                    @endforeach     
                @else
                    <tbody>
                        <tr align="center">
                            <td colspan="15">N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>

        <div class="container float-right">
            <div class="row">
                <div class="col-md-7 offset-md-7 mt-5 text-center">Pagar Alam, {{ $today }}</div>
                <br>
                <div class="col-md-7 offset-md-7 text-center">{{ $atas_nama }}</div>
            </div>
            <div class="row">
                <div class="col-md-7 offset-md-7 mb-5 text-center">{{ $jabatan }}</div>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-8 text-center">{{ $nama }}</div>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-8 text-center">{{ $nip }}</div>
            </div>
        </div>
        <h5 class="text-center mt-4" style="font-weight: 100; font-size: 14px">RAHASIA</h5>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>

</body>

</html>