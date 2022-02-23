<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function index()
    {
        return view('layout.login');
    }
    public function dashboard()
    {
        $role = Session::get('user_role');
        if ($role == null) {
            return view('layout.login');
        } else {
            return view('layout.dashboard');
        }
    }
    public function reset()
    {
        return view('layout.reset');
    }

    public function postLogin(Request $request)
    {   // Validate the form data
        // $this->validate($request, [
        //     'user_name' => 'required',
        //     'user_password' => 'required'
        // ]);

        // if (Auth::guard('admin')->attempt(['user_name' => $request->user_name, 'password' => $request->user_password])) {
        //     Session::put('id', Auth::guard('admin')->user()->id);
        //     Session::put('user_name', Auth::guard('admin')->user()->user_name);
        //     Session::put('user_pengguna', Auth::guard('admin')->user()->user_pengguna);
        //     Session::put('user_email', Auth::guard('admin')->user()->user_email);
        //     Session::put('user_status', Auth::guard('admin')->user()->user_status);
        //     Session::put('user_role', Auth::guard('admin')->user()->user_role);
        //     return redirect()->intended('/');
        // } else {

        //     return redirect()->intended('/auth')->with('status', 'Gagal Login! User atau Password salah! ');
        // }
        $this->validate($request, [
            'user_name' => 'required',
            'user_password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['user_name' => $request->user_name, 'password' => $request->user_password])) {
            Session::put('id', Auth::guard('admin')->user()->id);
            Session::put('user_name', Auth::guard('admin')->user()->user_name);
            Session::put('user_pengguna', Auth::guard('admin')->user()->user_pengguna);
            Session::put('user_email', Auth::guard('admin')->user()->user_email);
            Session::put('user_status', Auth::guard('admin')->user()->user_status);
            Session::put('user_role', Auth::guard('admin')->user()->user_role);
            return response()->json([
                'success' => true
            ], 200);
        }
    }
    public function postReset()
    {
        $nick = request('user_name');

        $pass = $this->randomPassword();
        $enc = bcrypt($pass);
        $user = User::where('user_name', $nick)->get()->first();
        $user->password = $enc;
        $user->save();
        $data = array(
            'email' => $user->user_email,
            'user_pengguna' => $user->user_pengguna,
            'password' => $pass,

        );

        $sendMail = new MailController;
        $sendMail->reset($data);
        return redirect()->back()->with('status', 'Password User Berhasil Di Reset');
    }
    public function logout()
    {
        Session::flush();
        // return view('layout.login');
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
