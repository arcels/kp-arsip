<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/auth', 'LoginController@postLogin')->name('login');
Route::get('/auth', 'LoginController@index');
Route::get('/reset', 'LoginController@reset');
Route::post('/reset','LoginController@postReset')->name('reset');

// Route::get('logout', function () {
//     session()->forget();
//     return redirect('auth');
// });
Route::get('/logout','LoginController@logout');


Route::get('/', 'LoginController@dashboard')->name('/');


//prodi start
Route::get('/prodi', 'ProdiController@index')->name('prodi.index');
Route::get('/prodi/trash', 'ProdiController@trash')->name('prodi.trash');
Route::post('/prodi/add', 'ProdiController@add');
Route::post('/prodi/edit/{id}', 'ProdiController@edit');
Route::post('/prodi/hapus/{id}', 'ProdiController@hapus');
Route::post('/prodi/restore/{id}', 'ProdiController@restore');

// dosen start
Route::get('/dosen', 'DosenController@index')->name('dosen.index');
Route::get('/dosen/trash', 'DosenController@trash')->name('dosen.trash');
Route::post('/dosen/add', 'DosenController@add');
Route::post('/dosen/edit/{id}', 'DosenController@edit');
Route::post('/dosen/hapus/{id}', 'DosenController@hapus');
Route::post('/dosen/restore/{id}', 'DosenController@restore');

// user start
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/trash', 'UserController@trash')->name('user.trash');
Route::post('/user/hapus/{id}', 'UserController@hapus');
Route::post('/user/restore/{id}', 'UserController@restore');
Route::post('/user/reset/{id}', 'UserController@reset');
Route::post('/updatePassword/{id}', 'UserController@updatePassword');

// login start
// Route::get('/admin', 'UserController@index')->middleware('auth:admin');

// surat masuk
Route::get('/surat-masuk', 'SuratMasukController@index')->name('surat-masuk');
Route::post('/surat-masuk', 'SuratMasukController@postSuratMasuk')->name('post-sm');
// surat keluar
Route::get('/surat-keluar', 'SuratKeluarController@index')->name('sk.index');
Route::get('/surat-keluar/custom', 'SuratKeluarController@custom');
Route::post('/surat-keluar', 'SuratKeluarController@pilih');
Route::post('/surat-keluar/edit/{id}', 'SuratKeluarController@edit');
Route::post('/surat-keluar/kp/surat', 'SuratKeluarController@kp');
Route::post('/surat-keluar/ska/surat', 'SuratKeluarController@ska');
Route::post('/surat-keluar/m/surat', 'SuratKeluarController@m');
Route::post('/surat-keluar/custom/surat', 'SuratKeluarController@custom');

// kategori surat
Route::get('/kategori', 'KategoriSuratController@index')->name('kategori.index');
Route::post('/kategori/add', 'KategoriSuratController@add');
Route::get('/kategori/trash', 'KategoriSuratController@trash')->name('kategori.trash');
Route::post('/kategori/hapus{id}', 'KategoriSuratController@hapus');
Route::post('/kategori/edit{id}', 'KategoriSuratController@edit');
Route::post('/kategori/restore{id}', 'KategoriSuratController@restore');

//pdf
Route::post('/cetak-pdf/{id}', 'PdfController@cetak');
