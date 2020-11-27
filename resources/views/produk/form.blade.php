<?php

use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Controllers;

?>

<h1>Form Produk</h1>

<form action="{{ url('produk') }}" method="POST">
    @csrf

    Jenis Produk :
    <select name="jenis_produk">
        <option>- Pilih Jenis Produk -</option>
        <option value="Makanan Ringan">Makanan Ringan</option>
        <option value="Makanan Berat">Makanan Berat</option>
        <option value="Minuman">Minuman</option>
    </select>
    <br>
    Nama Produk : <input type="text" name="nama_produk"><br>
    Jumlah Stok : <input type="number" name="jumlah_stok"><br>
    Harga Barang : <input type="number" name="harga_barang"><br>
    <input type="submit" value="Simpan">

</form>
