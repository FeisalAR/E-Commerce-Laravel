<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/all.css') }} " />
    <title>Listing Produk</title>
</head>
<body>
    <div class="text-center">
Belajar PHP. Halaman dari Controller. <br>
    <a class="btn btn-primary" href="{{url('/produk/create')}}"><i class="nav-icon fas fa-plus"></i>Tambah Data</a>
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


    <table class="table table-striped" style="max-width:350%;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah Stok</th>
                <th>Harga Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($produk as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->jenis_produk}}</td>
                <td>{{$row->nama_produk}}</td>
                <td>{{$row->jumlah_stok}}</td>
                <td>@format_uang($row->harga_barang)</td>
            <td>
                <a href="{{ url('/produk/' . $row->id . '/edit')}}"><i class="nav-icon fas fa-edit"></i>Edit</a> |
            <form action="{{url('produk', $row->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete">
            </form>
            </td>
            </tr>
        @endforeach
        </tbody>


    </table>
</body>

</html>
