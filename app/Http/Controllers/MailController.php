<?php

namespace App\Http\Controllers;

use App\Mail\registrasi;
use App\Mail\reset;
use App\Mail\sendMail;
use App\Mail\suratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($data)
    {
        $email = $data['email'];
        $details = [
            'title' => 'Selamat Anda Berhasil Membuat Akun Pada Sistem Informasi Arsip',
            'url' => 'http://localhost:8000/auth',
            'username' => $data['user_name'],
            'pengguna' => $data['user_pengguna'],
            'pass' => $data['password'],
            'email' => $data['email']

        ];
        Mail::to($email)->send(new registrasi($details));
    }
    public function suratMasuk($data)
    {
        $email = $data['email'];
        $details = [
            'title' => $data['keterangan'],
            'pengguna' => $data['user_pengguna'],
            'upload' => $data['upload'],
            'kode' => $data['kode'],
            'nama' => $data['nama'],

        ];
        Mail::to($email)->send(new suratMasuk($details));
    }
    public function reset($data)
    {
        $email = $data['email'];
        $details = [
            'title' => 'Password Akun Anda Berhasil di Reset',
            'url' => 'http://localhost:8000/auth',
            'pengguna' => $data['user_pengguna'],
            'pass' => $data['password']

        ];
        Mail::to($email)->send(new reset($details));
    }
}
