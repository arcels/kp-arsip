<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Prodi;
use App\SuratKeluar;
use App\KerjaPraktek;
use App\Asisten;
use App\Custom;
use App\Skaktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Session;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listDosen = Dosen::all();
        $listSK = SuratKeluar::all();
        return view('konten.suratKeluar.pilih', compact('listDosen', 'listSK', 'listKP'));
    }

    public function pilih()
    {
        $listDosen = Dosen::all();
        $listProdi = Prodi::all();
        if (request('sk_rutin') === 'kp') {
            return view('konten.suratKeluar.kerjapraktek', compact('listDosen'));
        } else if (request('sk_rutin') === 'ska') {
            return view('konten.suratKeluar.suratasisten', compact('listDosen', 'listProdi'));
        } else if (request('sk_rutin') == 'm') {
            return view('konten.suratKeluar.surataktif', compact('listDosen', 'listProdi'));
        } else if (request('sk_rutin') == 'custom') {
            return view('konten.suratKeluar.custom', compact('listDosen', 'listProdi'));
        } else {
            return redirect()->back();
        }
    }
    public function kp()
    {
        SuratKeluar::create([
            'sk_kode' => request('sk_kode'),
            'sk_title' => request('sk_title'),
            'sk_tgl' => date("Y-m-d"),
            'sk_penanggungjawab' => request('sk_penanggungjawab'),
            'sk_kepada' => request('sk_kepada'),
            'sk_upload' => '',
            'sk_status' => '0',
            'sk_kpj' => '',

        ]);
        $query = DB::table('surat_keluars')->orderBy('id');
        $last = $query->reorder('id', 'desc')->get()->first();
        $count = SuratKeluar::where('sk_kode', 'KP')->get()->count();
        KerjaPraktek::create([
            'id_sk' => $last->id,
            'kp_no' => $count,
            'kp_hal' => request('kp_hal'),
            'kp_perusahaan' => request('kp_perusahaan'),
            'kp_mahasiswa' => request('kp_mahasiswa'),
            'kp_nim' => request('kp_nim'),
            'kp_mulai' => request('kp_mulai'),
            'kp_selesai' => request('kp_selesai'),
        ]);

        return back()->with('status', 'Data Surat Keluar Berhasil Dibuat');
    }
    public function ska()
    {
        $nama = Dosen::find(request('sk_kepada'));
        SuratKeluar::create([
            'sk_kode' => request('sk_kode'),
            'sk_title' => request('sk_title'),
            'sk_tgl' => date("Y-m-d"),
            'sk_penanggungjawab' => request('sk_penanggungjawab'),
            'sk_kepada' => $nama->dosen_nama,
            'sk_upload' => '',
            'sk_status' => '0',
            'sk_kpj' => request('sk_kpj'),
        ]);
        $query = DB::table('surat_keluars')->orderBy('id');
        $last = $query->reorder('id', 'desc')->get()->first();
        $count = SuratKeluar::where('sk_kode', 'SKA')->get()->count();
        Asisten::create([
            'id_sk' => $last->id,
            'as_no' => $count,
            'as_nama' => request('as_nama'),
            'as_nim' => request('as_nim'),
            'as_prodi' => request('as_prodi'),
            'as_makul' => request('as_makul'),
            'as_semester' => request('as_semester'),
            'as_kelas' => request('as_kelas'),
            'as_tahun' => request('as_tahun'),

        ]);
        return back()->with('status', 'Data Surat Keluar Berhasil Dibuat');
    }
    public function m()
    {
        SuratKeluar::create([
            'sk_kode' => request('sk_kode'),
            'sk_title' => request('sk_title'),
            'sk_tgl' => date("Y-m-d"),
            'sk_penanggungjawab' => request('sk_penanggungjawab'),
            'sk_kepada' => request('m_mahasiswa'),
            'sk_upload' => '',
            'sk_status' => '0',
            'sk_kpj' => request('sk_kpj'),
        ]);
        $query = DB::table('surat_keluars')->orderBy('id');
        $last = $query->reorder('id', 'desc')->get()->first();
        $count = SuratKeluar::where('sk_kode', 'SKA-M')->get()->count();
        Skaktif::create([
            'id_sk' => $last->id,
            'm_no' => $count,
            'm_mahasiswa' => request('m_mahasiswa'),
            'm_nim' => request('m_nim'),
            'm_prodi' => request('m_prodi'),
            'm_keperluan' => request('m_keperluan'),
            'm_alamat' => request('m_alamat'),
            'm_tahun' => request('m_tahun'),

        ]);
        return back()->with('status', 'Data Surat Keluar Berhasil Dibuat');
    }
    public function custom()
    {
        SuratKeluar::create([
            'sk_kode' => request('sk_kode'),
            'sk_title' => request('sk_title'),
            'sk_kepada' => request('sk_kepada'),
            'sk_tgl' => date("Y-m-d"),
            'sk_penanggungjawab' => request('sk_penanggungjawab'),
            'sk_upload' => '',
            'sk_status' => '0',
            'sk_kpj' => request('sk_kpj'),
        ]);
        $query = DB::table('surat_keluars')->orderBy('id');
        $last = $query->reorder('id', 'desc')->get()->first();
        $count = SuratKeluar::where('sk_kode', request('sk_kode'))->get()->count();
        Custom::create([
            'id_sk' => $last->id,
            'c_no' => $count,
            'm_isi' => request('c_isiSurat'),
            'as_status' => '0',
        ]);
        return back()->with('status', 'Data Surat Keluar Berhasil Dibuat');
    }
    public function edit(Request $request, $id)
    {
        $sk_upload = '';
        if ($request->hasFile('sk_upload')) {
            $file = $request->file('sk_upload');
            $extension = $file->getClientOriginalExtension();
            $filename = time()  . '.' . $extension;
            $file->move('uploads/suratKeluar', $filename);
            $sk_upload = $filename;
        }
        $detail = [
            'id' => $id,
            'sk_upload' => $sk_upload,
            'sk_status' => 1,
        ];
        $sk = SuratKeluar::find($id);
        $sk->update($detail);
        return back()->with('status', 'Berkas Surat Keluar Berhasil Diupdate');
    }
}
