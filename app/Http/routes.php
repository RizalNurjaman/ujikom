<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('/golongan', 'Cgolongan');
Route::resource('/jabatan', 'Cjabatan');
Route::resource('/kategoriLembur', 'CkategoriLembur');
Route::resource('/lemburPegawai', 'ClemburPegawai');
Route::resource('/pegawai', 'Cpegawai');
Route::resource('/penggajian', 'Cpenggajian');
Route::resource('/tunjangan', 'Ctunjangan');
Route::resource('/tunjanganPegawai', 'ClemburPegawai');
