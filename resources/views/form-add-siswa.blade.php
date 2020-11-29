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
    <title>Add Siswa</title>
</head>
<body>
    <div class="container">
        <h1>Form Input Siswa</h1>

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

<form action="{{ url('siswa') }}" method="POST">
    @csrf
    <div class="form-group">
        Nama Siswa : <input type="text" class="form-control" name="nama_siswa" value="{{old('nama_siswa')}}">
    </div>
    <div class="form-group">
        Golongan Darah:
    <select multiple class="form-control" name="goldar">
        <option>- Pilih Golongan Darah -</option>
        <option value="A" {{old('goldar') == "A" ? "selected" : ""}}>A</option>
        <option value="B" {{old('goldar') == "B" ? "selected" : ""}}>B</option>
        <option value="AB" {{old('goldar') == "AB" ? "selected" : ""}}>AB</option>
        <option value="O" {{old('goldar') == "O" ? "selected" : ""}}>O</option>
    </select>
    </div>
    Jenis Kelamin:
    <div class="form-check">
  <input class="form-check-input" type="radio" name="jenkel" id="exampleRadios1" value="Laki-laki" {{old('jenkel') == "Laki-laki" ? "checked" : ""}}>
  <label class="form-check-label" for="exampleRadios1">
    Laki-laki
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jenkel" id="exampleRadios2" value="Perempuan" {{old('jenkel') == "Perempuan" ? "checked" : ""}}>
  <label class="form-check-label mb-3" for="exampleRadios2">
    Perempuan
  </label>
</div>
    <input type="submit" class="btn btn-primary" value="Simpan">

</form>
    </div>
</body>
</html>

