<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use App\DSuratMasuk;
use App\Dosen;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Storage;
use LengthException;

class SuratMasukController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listSurat = SuratMasuk::all();
        $listDosen = Dosen::all();
        $listDetail = DSuratMasuk::all();
        return view('konten.suratMasuk.list', compact('listSurat', 'listDosen', 'listDetail'));
    }
    public function postSuratMasuk(Request $request)
    {
        try {
            $sm = new SuratMasuk();
            $sm->sm_kode = $request->input('sm_kode');
            $sm->sm_keterangan = $request->input('sm_keterangan');
            $sm->sm_tgl = now();
            if ($request->hasFile('sm_upload')) {
                $file = $request->file('sm_upload');
                $extension = $file->getClientOriginalExtension();
                $filename = time()  . '.' . $extension;
                $file->move('uploads/suratMasuk', $filename);
                $sm->sm_upload = $filename;
            } else {
                $sm->sm_upload = '';
            }
            $sm->save();


            if ($request->input('sm_dosen')[0] === "all") {
                $ids = SuratMasuk::where('sm_kode', $sm->sm_kode)->first();
                $dosens = Dosen::all();
                foreach ($dosens as $d) {
                    $dsm = new DSuratMasuk();
                    $dsm->sm_id = $ids->id;
                    $dsm->sm_dosen = $request->input('sm_dosen');
                    $dsm->sm_dosen = $d->id;
                    $dsm->save();
                    $data = array(
                        'nama' => $d->dosen_nama,
                        'kode' => $sm->sm_kode,
                        'email' => $d->dosen_email,
                        'keterangan' => $sm->sm_keterangan,
                        'user_pengguna' => $d->dosen_nama,
                        'upload' => $sm->sm_upload,
                    );
                    $sendMail = new MailController;
                    $sendMail->suratMasuk($data);
                }
                return redirect('surat-masuk')->with('status', 'Data Surat Masuk Berhasil Dikirimkan');
               
            } else {
                $dosen = $request->input('sm_dosen');
                for ($i = 0; $i < count($dosen); $i++) {
                    $ids = SuratMasuk::where('sm_kode', $sm->sm_kode)->first();
                    $dsm = new DSuratMasuk();
                    $dsm->sm_id = $ids->id;
                    $dsm->sm_dosen = $request->input('sm_dosen')[$i];
                    $dsm->save();
                    $dn = Dosen::where('id', $dsm->sm_dosen)->first();
                    $data = array(
                        'nama' => $dn->dosen_nama,
                        'kode' => $sm->sm_kode,
                        'email' => $dn->dosen_email,
                        'keterangan' => $sm->sm_keterangan,
                        'user_pengguna' => $dn->dosen_nama,
                        'upload' => $sm->sm_upload,
                    );
                    $sendMail = new MailController;
                    $sendMail->suratMasuk($data);
                }
                return redirect('surat-masuk')->with('status', 'Data Surat Masuk Berhasil Dikirimkan');
            }
        } catch (Throwable $e) {
            report($e);
            return redirect('surat-masuk')->with('error', 'Data Surat Masuk Gagal Ditambah, Kode Surat Masuk Sudah Ada');
        }
    }
    public function getby($whe, $table, $id)
    {

        $data = DB::table($table)
            ->where($whe, $id)
            ->first();
        return $data;
    }
}
