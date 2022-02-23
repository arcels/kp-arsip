<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Prodi;
use Throwable;

class ProdiController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        } elseif ($role != 'Admin') {
            abort(403);
        } else {
            $listProdi = Prodi::all();
            return view('konten.prodi.list', compact('listProdi'));
        }
    }
    public function trash()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listProdi = Prodi::all();
        return view('konten.prodi.trash', compact('listProdi'));
    }
    public function add()
    {
        try {
            Prodi::create([
                'prodi_kode' => request('prodi_kode'),
                'prodi_nama' => request('prodi_nama')
            ]);
            return redirect('prodi')->with('status', 'Data Prodi Berhasil Ditambah');
        } catch (Throwable $e) {
            report($e);
            return redirect('prodi')->with('error', 'Data Prodi Gagal Ditambah, Kode Prodi sudah ada !');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'prodi_kode' => 'required',
                'prodi_nama' => 'required'
            ]);
            $prodi = Prodi::find($id);
            $prodi->update($request->all());
            return redirect('prodi')->with('status', 'Data Prodi Berhasil Diubah');
        } catch (Throwable $e) {
            report($e);
            return redirect('prodi')->with('error', 'Data Prodi Gagal Diupdate !');
        }
    }
    public function hapus(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'prodi_status' => 'required'
        ]);
        $prodi = Prodi::find($id);
        $prodi->update($request->all());
        return redirect('prodi')->with('status', 'Data Prodi Berhasil Hapus');
    }
    public function restore(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'prodi_status' => 'required'
        ]);
        $prodi = Prodi::find($id);
        $prodi->update($request->all());
        return redirect('prodi')->with('status', 'Data Prodi Berhasil Restore');
    }
}
