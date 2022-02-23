<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Prodi;
use Session;


class UserController extends Controller
{
    public function index()
    {
        $role = Session::get('user_role');
        if ($role == 'Admin') {
            $listUser = user::all();
            $listProdi = prodi::all();
            return view('konten.user.list', compact('listUser'));
        } elseif ($role == null) {
            return view('layout.login');
        } else {
            abort(403);
        }
    }
    public function trash()
    {
        $role = Session::get('user_role');
        if ($role == 'Admin') {
            $listUser = user::all();
            $listProdi = prodi::all();
            return view('konten.user.trash', compact('listUser'));
        } elseif ($role == null) {
            return view('layout.login');
        } else {
            abort(403);
        }
    }
    public function reset(Request $request, $id)
    {
        $pass = $this->randomPassword();
        $this->validate($request, [
            'id' => 'required',
            'password' => bcrypt($pass),
        ]);
        $user = User::find($id);
        $user->update($request->all());
        $data = array(
            'email' => $user->user_email,
            'user_pengguna' => $user->user_pengguna,
            'password' => $pass,

        );

        $sendMail = new MailController;
        $sendMail->reset($data);
        return redirect('user')->with('status', 'Password User Berhasil Di Reset');
    }
    public function restore(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'user_status' => 'required'
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect('user')->with('status', 'Data User Berhasil Restore');
    }
    public function hapus(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required',
            'user_status' => 'required'
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect('user')->with('status', 'Data User Berhasil Dihapus');
    }
    public function updatePassword(Request $request, $id)
    {
        $pass = $request->password;
        $user = User::find($id);
        $user->password = bcrypt($pass);
        $user->save();
        $data = array(
            'email' => $user->user_email,
            'user_pengguna' => $user->user_pengguna,
            'password' => $pass,

        );
        $sendMail = new MailController;
        $sendMail->reset($data);
        Session::flush();
        return redirect('/auth');
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
}
