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

Route::get('/', 'MonitroController@monitor1');


Route::get('/monitor2', 'MonitroController@monitor2');


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/karyawan', 'HomeController@karyawan');
Route::get('/karyawan/plus', 'HomeController@karyawanplus');
Route::post('/karyawan/simpan', 'HomeController@karyawansimpan');
Route::get('/karyawan/minus', 'HomeController@karyawanminus');
Route::get('/karyawan/alter', 'HomeController@karyawanalter');

Route::get('/jadwal', 'HomeController@jadwal');
Route::get('/jadwal/plus', 'HomeController@jadwalplus');
Route::get('/jadwal/minus', 'HomeController@jadwalminus');
Route::post('/jadwal/simpan', 'HomeController@jadwalsimpan');

Route::get('/makanan', 'HomeController@makanan');
Route::get('/makanan/plus', 'HomeController@makananplus');
Route::get('/makanan/minus/{id}', 'HomeController@makananminus');
Route::get('/makanan/alter/{id}', 'HomeController@makananalter');
Route::post('/makanan/alter/simpan', 'HomeController@makananalters');
Route::post('/makanan/simpan', 'HomeController@makanansimpan');

Route::get('/data', 'HomeController@data');
