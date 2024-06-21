<?php

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

Route::get('/','HomeController@index');
Route::get('index/', function () {
    return view('layouts/index');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('kelas/', 'KelasController@index')->middleware('admin');
    Route::get('kelas/{id}', 'KelasController@show')->middleware('admin');
    Route::get('siswa/', 'SiswaController@index')->middleware('admin');
    Route::get('siswa/pdf', 'SiswaController@pdf')->middleware('admin');
    Route::get('akun','AuthController@lists')->middleware('admin');
    Route::get('guru','GuruController@index')->middleware('admin');
});

Route::get('/absensi/', 'AbsensiController@index');
Route::get('/absensi/{id}', 'AbsensiController@show');
Route::post('/absensi/','AbsensiController@create');

Route::post('/kelas/', 'KelasController@create');
Route::put('/kelas/', 'KelasController@update');
Route::delete('/kelas/delete/{id}', 'KelasController@delete');

Route::get('/siswa/{id}', 'SiswaController@show');
Route::post('/siswa/', 'SiswaController@create');
Route::put('/siswa/', 'SiswaController@update');
Route::delete('/siswa/delete/{id}', 'SiswaController@delete');
Route::post('/siswa/search/', 'SiswaController@search');

Route::get('/guru/', 'GuruController@index');
Route::get('/guru/{id}', 'GuruController@show');
Route::post('/guru/','GuruController@create');
Route::put('/guru/', 'GuruController@update');
Route::delete('/guru/delete/{id}', 'GuruController@delete');
Route::post('/guru/search/', 'GuruController@search');

Route::get('/admin/rekap/','RekapController@index');
Route::get('/admin/rekap/{table}','RekapController@show');
Route::post('/rekap/pribadipdf/','RekapController@pdf');
Route::get('/rekap/kelas/{id}','RekapController@rekap');
Route::post('/rekap/hitung','RekapController@hitung');

Route::post('/siswakelas/', 'SiswaKelasController@create')->middleware('admin');
Route::get('/siswakelas/{id}', 'SiswaKelasController@add')->middleware('admin');
Route::delete('/siswakelas/delete/{id}', 'SiswaKelasController@delete')->middleware('admin');


Route::get('register','AuthController@daftar');
Route::post('register','AuthController@prosesDaftar');

Route::post('/akun/','AuthController@create');
Route::put('/akun/', 'AuthController@update');
Route::delete('akun/delete/{id}','AuthController@delete');

Route::prefix('u')->group(function(){
    Route::get('dashboard','UserController@index')->middleware('logged');
});

Route::get('logout','AuthController@logout');
Route::get('admin', 'AuthController@showForm');
Route::get('piket', 'AuthController@showForm');
Route::get('login', 'AuthController@showForm');
Route::post('login', 'AuthController@login');

Route::get('panduan',function(){
    return view('panduan/panduan');
});