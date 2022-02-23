<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Mail\sendMail;
use App\Prodi;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;
use Session;
use Throwable;

class DosenController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        } elseif ($role != 'Admin') {
            abort(403);
        } else {
            $listDosen = Dosen::all();
            $listProdi = Prodi::all();
            return view('konten.dosen.list', compact('listDosen', 'listProdi'));
        }
    }
    public function trash()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        }
        $listDosen = Dosen::all();
        $listProdi = Prodi::all();

        return view('konten.dosen.trash', compact('listDosen', 'listProdi'));
    }
    public function add()
    {
        try {
            if (request('dosen_jabatan') == 'Dosen') {
                Dosen::create([
                    'dosen_nidn' => request('dosen_nidn'),
                    'dosen_nama' => request('dosen_nama'),
                    'dosen_email' => request('dosen_email'),
                    'dosen_jabatan' => request('dosen_jabatan'),
                    'prodi_id' => request('prodi_id')
                ]);

                return redirect('dosen')->with('status', 'Data Dosen Berhasil Ditambah');
            } else {
                $pass = $this->randomPassword();


                Dosen::create([
                    'dosen_nidn' => request('dosen_nidn'),
                    'dosen_nama' => request('dosen_nama'),
                    'dosen_email' => request('dosen_email'),
                    'dosen_jabatan' => request('dosen_jabatan'),
                    'prodi_id' => request('prodi_id')
                ]);
                $query = DB::table('dosens')->orderBy('id');
                $last = $query->reorder('id', 'desc')->get()->first();
                User::create([
                    'id' => $last->id,
                    'user_name' => request('dosen_nidn'),
                    'user_pengguna' => request('dosen_nama'),
                    'password' => bcrypt($pass),
                    'user_email' => request('dosen_email'),
                    'user_role' => request('dosen_jabatan')

                ]);
                $data = array(
                    'email' => request('dosen_email'),
                    'user_name' => request('dosen_nidn'),
                    'user_pengguna' => request('dosen_nama'),
                    'password' => $pass,

                );
                $sendMail = new MailController;
                $sendMail->sendMail($data);
                return redirect('dosen')->with('status', 'Data Dosen Berhasil Ditambah');
            }
        } catch (Throwable $e) {
            report($e);
            return redirect('dosen')->with('error', 'Data Dosen Gagal Ditambah, NIDN Dosen sudah ada');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $pass = $this->randomPassword();
            if (request('dosen_jabatan') == 'Dosen') {
                $this->validate($request, [
                    'id' => 'required',
                    'dosen_nidn' => 'required',
                    'dosen_nama' => 'required',
                    'dosen_email' => 'required',
                    'dosen_jabatan' => 'required'
                ]);
                $dosen = Dosen::find($id);
                $dosen->update($request->all());
                return redirect('dosen')->with('status', 'Data Dosen Berhasil Diubah');
            } else {
                $nidn = request('dosen_nidn');
                $c = User::where('user_name', $nidn)->get()->count();
                if ($c == 0) {
                    User::create([
                        'user_name' => request('dosen_nidn'),
                        'user_pengguna' => request('dosen_nama'),
                        'password' => bcrypt($pass),
                        'user_email' => request('dosen_email'),
                        'user_role' => request('dosen_jabatan')

                    ]);
                    $this->validate($request, [
                        'id' => 'required',
                        'dosen_nidn' => 'required',
                        'dosen_nama' => 'required',
                        'dosen_email' => 'required',
                        'dosen_jabatan' => 'required'
                    ]);
                    $dosen = Dosen::find($id);
                    $dosen->update($request->all());
                    return redirect('dosen')->with('status', 'Data Dosen Berhasil Diubah');
                } else {
                    $row = $this->getbyid($nidn);
                    $user = User::find($row->id);
                    $user->user_name = request('dosen_nidn');
                    $user->user_pengguna = request('dosen_nama');
                    $user->user_email = request('dosen_email');
                    $user->user_role = request('dosen_jabatan');
                    $user->save();

                    $this->validate($request, [
                        'id' => 'required',
                        'dosen_nidn' => 'required',
                        'dosen_nama' => 'required',
                        'dosen_email' => 'required',
                        'dosen_jabatan' => 'required'
                    ]);
                    $dosen = Dosen::find($id);
                    $dosen->update($request->all());
                    return redirect('dosen')->with('status', 'Data Dosen Berhasil Diubah');
                }
            }
        } catch (Throwable $e) {
            report($e);
            return redirect('dosen')->with('error', 'Data Dosen Gagal Diupdate');
        }
    }
    public function hapus(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'dosen_status' => 'required'
        ]);
        $dosen = Dosen::find($id);
        $dosen->update($request->all());
        return redirect('dosen')->with('status', 'Data Dosen Berhasil Hapus');
    }
    public function restore(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'dosen_status' => 'required'
        ]);
        $dosen = Dosen::find($id);
        $dosen->update($request->all());
        return redirect('dosen')->with('status', 'Data Dosen Berhasil Restore');
    }
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    public function getbyid($id)
    {

        $surat = DB::table('users')
            ->where('user_name', $id)
            ->first();
        return $surat;
    }
}
