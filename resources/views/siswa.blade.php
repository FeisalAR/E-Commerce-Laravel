<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/all.css') }} " />
    <title>Listing Siswa</title>
</head>
<body>
    <div class="text-center">
        Belajar PHP. Halaman dari Controller. <br>
    <a class="btn btn-primary" href="{{url('/siswa/create')}}">Tambah Data</a>
    </div>

    <table class="table table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Golongan Darah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_siswa as $siswa)
                <tr>
                    <td>{{$siswa->nama_siswa}}</td>
                    <td>{{$siswa->jenkel}}</td>
                    <td>{{$siswa->goldar}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
