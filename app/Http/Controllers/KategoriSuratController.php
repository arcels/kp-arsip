<?php

namespace App\Http\Controllers;

use Session;
use App\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listKategori = KategoriSurat::all();
        return view('konten.kategori.list', compact('listKategori'));
    }
    public function trash()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listKategori = KategoriSurat::all();
        return view('konten.kategori.trash', compact('listKategori'));
    }
    public function add()
    {
        KategoriSurat::create([
            'ks_kode' => request('ks_kode'),
            'ks_keterangan' => request('ks_keterangan')
        ]);
        return redirect('kategori')->with('status', 'Data Kategori Surat Berhasil Ditambah');
    }
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'ks_kode' => 'required',
            'ks_keterangan' => 'required'
        ]);
        $ks = KategoriSurat::find($id);
        $ks->update($request->all());
        return redirect('kategori')->with('status', 'Data Kategori Berhasil Diubah');
    }
    public function hapus(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'ks_status' => 'required',
        ]);
        $ks = KategoriSurat::find($id);
        $ks->update($request->all());
        return redirect('kategori')->with('status', 'Data Kategori Berhasil Dihapus');
    }
    public function restore(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'ks_status' => 'required',
        ]);
        $ks = KategoriSurat::find($id);
        $ks->update($request->all());
        return redirect('kategori')->with('status', 'Data Kategori Berhasil Direstore');
    }
}
