<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/all.css') }} " />
    <title>Kategori Produk</title>
</head>
<body>
    <div class="text-center">
Belajar PHP. Halaman dari Controller. <br>
    <a class="btn btn-primary" href="{{url('/kategori-produk/create')}}"><i class="nav-icon fas fa-plus"></i>Tambah Data</a>
    </div>
     @if(session('success'))
        <div class="alert alert-message alert-success">
            {{session('success')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-message alert-danger">
            {{session('error')}}
        </div>
    @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Perhatian!</strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>

            </div>
        @endif
    <table class="table table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $row)
                <tr>
                    <td>{{$row->id_kategori}}</td>
                    <td>{{$row->nama_kategori}}</td>
                    <td>{{$row->diskon*100}}%</td>
                    <td><a href="{{ url('/kategori-produk/' . $row->id_kategori . '/edit')}}"><i class="nav-icon fas fa-edit"></i>Edit</a>
                        <form action="{{url('kategori-produk', $row->id_kategori)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Delete">
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
