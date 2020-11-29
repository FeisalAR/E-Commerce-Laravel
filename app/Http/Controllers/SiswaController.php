<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
 public function kategoriKelas()
 {
   $data['kategori_kelas'] = DB::table('t_kategori_kelas')
            ->orderBy('nama_kategori_kelas')
            ->get();

        return view('kategori-kelas', $data);
 }
 public function createKelas()
    {
        return view('form-add-kategori');
    }

    public function storeKelas(Request $request)
    {
        $rule = [
            'nama_kategori_kelas' => 'required',
            'kapasitas_kelas'  => 'required|min:5',
            'spesialisasi'  => 'required|numeric',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kategori_kelas')->insert($input);
        if ($status) {
            return redirect('/kategori-kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kategori-kelas/createKelas')->with('error', 'Data gagal ditambahkan');
        }
    }






    public function cetakSiswa()
    {
    $data['data_siswa'] = DB::table('t_siswa')
                ->orderBy('nama_siswa')
                ->get();

            return view('siswa', $data);
    }
    public function createSiswa()
    {
        return view('form-add-siswa');
    }

    public function storeSiswa(Request $request)
    {
        $rule = [
            'nama_siswa' => 'required|alpha',
            'jenkel'  => 'required',
            'goldar'  => 'required',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa/createSiswa')->with('error', 'Data gagal ditambahkan');
        }
    }
}

