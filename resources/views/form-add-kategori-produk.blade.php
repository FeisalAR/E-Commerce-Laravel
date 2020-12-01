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
    <title>Add Kategori Produk</title>
</head>
<body>
    <div class="container">
        <h1>Form Kategori Produk</h1>

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

<form action="{{ url('kategori-produk', @$kategori_produk->id_kategori) }}" method="POST">
    @csrf
    @if(!empty($kategori_produk))
        @method('PATCH')
    @endif
    <div class="form-group">
        Nama Kategori : <input type="text" class="form-control" name="nama_kategori" value="{{old('nama_kategori', @$kategori_produk->nama_kategori)}}">
    </div>

    <div class="form-group">
        Diskon : <input class="form-control" type="number" name="diskon"  value="{{old('diskon', @$kategori_produk->diskon)}}">
    </div>
    <input type="submit" class="btn btn-primary" value="Simpan">
</form>
    </div>
</body>
</html>

