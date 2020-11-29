<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/all.css') }} " />
    <title>Kategori Kelas</title>
</head>
<body>
    <div class="text-center">
        Belajar PHP. Halaman dari Controller. <br>
    <a class="btn btn-primary" href="{{url('/kategori-kelas/create')}}">Tambah Data</a>
    </div>

    <table class="table table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori Kelas</th>
                <th>Spesialisasi</th>
                <th>Kapasitas Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori_kelas as $kelas)
                <tr>
                    <td>{{$kelas->id_kategori_kelas}}</td>
                    <td>{{$kelas->nama_kategori_kelas}}</td>
                    <td>{{$kelas->spesialisasi}}</td>
                    <td>{{$kelas->kapasitas_kelas}} Siswa</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
