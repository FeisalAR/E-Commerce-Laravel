<?php

use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Controllers;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} "/>
    <link rel="stylesheet" href="{{ asset('css/all.css') }} " />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Form Produk</h1>

<form action="{{ url('produk', @$produk->id) }}" method="POST">
    @csrf

    @if(!empty($produk))
        @method('PATCH')
    @endif

    <div class="form-group">
        Nama Produk : <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk', @$produk->nama_produk)}}">
    </div>
    <div class="form-group">
        Jumlah Stok : <input type="number" class="form-control" name="jumlah_stok"  value="{{old('jumlah_stok', @$produk->jumlah_stok)}}">
    </div>
    <div class="form-group">
        Harga Barang : <input type="number" class="form-control" name="harga_barang"  value="{{old('harga_barang', @$produk->harga_barang)}}">
    </div>
    <div class="form-group">
        Jenis Produk :
    <select class="form-control" name="jenis_produk">
        <option>- Pilih Jenis Produk -</option>
        <option value="Makanan Ringan" {{old('jenis_produk', @$produk->jenis_produk == "Makanan Ringan" ? "selected" : "")}}>Makanan Ringan</option>
        <option value="Makanan Berat" {{old('jenis_produk', @$produk->jenis_produk == "Makanan Berat" ? "selected" : "")}}>Makanan Berat</option>
        <option value="Minuman" {{old('jenis_produk', @$produk->jenis_produk == "Minuman" ? "selected" : "")}}>Minuman</option>
    </select>
    </div>
    <input type="submit"  class="btn btn-primary"  value="Simpan">

</form>
    </div>
</body>
</html>


