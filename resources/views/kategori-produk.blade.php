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
    <table class="table table table-striped" style="max-width:30%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Diskon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $row)
                <tr>
                    <td>{{$row->id_kategori}}</td>
                    <td>{{$row->nama_kategori}}</td>
                    <td>{{$row->diskon*100}}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>