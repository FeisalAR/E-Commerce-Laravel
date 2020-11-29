<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data['produk'] = DB::table('t_produk')
            ->orderBy('nama_produk')
            ->get();

        return view('produk', $data);
    }

    public function create()
    {
        return view('produk.form');
    }

    public function store(Request $request)
    {
        $rule = [
            'jenis_produk' => 'required',
            'nama_produk'  => 'required|string',
            'jumlah_stok'  => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_produk')->insert($input);
        if ($status) {
            return redirect('/produk')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/produk/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function cetakKategoriProduk()
    {
        $data['kategori'] = DB::table('t_kategori_produk')
            ->orderBy('diskon', 'DESC')
            ->get();
        return view('kategori-produk', $data);
    }

    //Module 5 - Update & Delete
    public function edit(Request $request, $id){
        $data['produk'] = DB::table('t_produk')->find($id);
        return view('produk.form', $data);
    }

    public function update(Request $request, $id){
        $rule = [
            'jenis_produk' => 'required',
            'nama_produk'  => 'required|string',
            'jumlah_stok'  => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_produk')->where('id', $id)->update($input);
        if ($status) {
            return redirect('/produk')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/produk/create')->with('error', 'Data gagal diubah');
        }
    }

    // public function checkout(){
    //     $data['nama'] = "Feisal A.";
    //     return view('checkout', $data);
    // }

    // public function login(){
    //     return view('login');
    // }

    // public function registrasi(){
    //     return view('registrasi');
    // }

        // public function cetakKategoriProduk(){
    //     $data['kategori'] = DB::table('t_kategori_produk')
    //     ->where('diskon', '>', '.5')
    //     ->get();
    //     return view('kategori-produk', $data);
    // }

    // public function cetakKategoriProduk(){
    //     $data['kategori'] = DB::table('t_kategori_produk')
    //     ->orderBy('nama_kategori')
    //     ->get();
    //     return view('kategori-produk', $data);
    // }

    // public function cetakKategoriProduk(){
    //     $data['kategori'] = DB::table('t_kategori_produk')
    //     ->where('nama_kategori', 'LIKE', 'A%')
    //     ->get();
    //     return view('kategori-produk', $data);
    // }
}
