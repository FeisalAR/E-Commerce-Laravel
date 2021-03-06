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





    public function createKategoriProduk()
    {
        return view('form-add-kategori-produk');
    }

    public function storeKategoriProduk(Request $request)
    {
        $rule = [
            'nama_kategori' => 'required',
            'diskon'  => 'required|numeric|between:0,99.99',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kategori_produk')->insert($input);
        if ($status) {
            return redirect('/kategori-produk')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kategori-produk/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function cetakKategoriProduk()
    {
        $data['kategori'] = DB::table('t_kategori_produk')
            ->orderBy('nama_kategori', 'ASC')
            ->get();
        return view('kategori-produk', $data);
    }

    public function editKategoriProduk($id_kategori){
        $data['kategori_produk'] = DB::table('t_kategori_produk')->where('id_kategori', $id_kategori)->first();
        return view('form-add-kategori-produk', $data);
    }

    public function updateKategoriProduk(Request $request, $id_kategori){
        $rule = [
            'nama_kategori' => 'required',
            'diskon'  => 'required|numeric|between:0,99.99',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_kategori_produk')->where('id_kategori', $id_kategori)->update($input);
        if ($status) {
            return redirect('/kategori-produk')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/kategori-produk/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroyKategori($id_kategori)
    {
        $status = DB::table('t_kategori_produk')->where('id_kategori', $id_kategori)->delete();
        if ($status) {
            return redirect('/kategori-produk')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/kategori-produk/create')->with('error', 'Data gagal dihapus');
        }
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
        unset($input['_method']);
        $status = DB::table('t_produk')->where('id', $id)->update($input);
        if ($status) {
            return redirect('/produk')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/produk/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($id)
    {
        $status = DB::table('t_produk')->where('id', $id)->delete();
        if ($status) {
            return redirect('/produk')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/produk/create')->with('error', 'Data gagal dihapus');
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
