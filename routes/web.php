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

Route::get('/refresh/{id}', 'UserController@refresh');
Route::get('/datashift', 'UserController@datashift');
Route::get('/datashifte/{id}', 'UserController@datashifte');
Route::post('/datashiftes', 'UserController@datashiftes');
Route::get('/datashift/{id}', 'UserController@detailshift');
Route::get('/datashiftm/{id}', 'UserController@datashift');
Route::get('/settingshift', 'UserController@settingshift');
Route::get('/settingshift/go/{id}', 'UserController@settinggo');
Route::post('/settingshift/goes', 'UserController@settinggoes');
Route::post('/settingshift/simpan', 'UserController@settingsimpan');

Route::get('/marah/{param1}/{param2}/{param3}', 'UserController@marahparam');

Route::get('/changepassword', 'UserController@password');
Route::post('/passchange', 'UserController@changepassword');

Route::get('/userpass/{id}', 'UserController@userpass');
Route::post('/userchangepass', 'UserController@userchangepass');

Route::get('/user', 'UserController@user');
Route::get('/userminus/{id}', 'UserController@userhapus');
Route::post('/usersimpan', 'UserController@usersimpan');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

// Route AJAX
Route::get('/server_side/scripts/{id}', 'MonitroController@ajax');
Route::get('/server_side/count/{id}/{param}', 'MonitroController@count');

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/karyawan', 'HomeController@karyawan')->middleware('can:isAdmin');
Route::get('/karyawan/plus', 'HomeController@karyawanplus')->middleware('can:isAdmin');
Route::get('/karyawan/minus/{id}', 'HomeController@karyawanminus')->middleware('can:isAdmin');
Route::get('/karyawan/alter/{id}', 'HomeController@karyawanalter')->middleware('can:isAdmin');
Route::post('/karyawan/alter/simpan', 'HomeController@karyawanalters')->middleware('can:isAdmin');
Route::post('/karyawan/simpan', 'HomeController@karyawansimpan')->middleware('can:isAdmin');

Route::get('/jadwal', 'HomeController@jadwal')->middleware('can:isUser');
Route::get('/jadwal/alter/{id}', 'HomeController@jadwalalter')->middleware('can:isAdmin');
Route::get('/jadwal/plus', 'HomeController@jadwalplus')->middleware('can:isAdmin');
Route::get('/jadwal/minus/{id}', 'HomeController@jadwalminus')->middleware('can:isAdmin');
Route::post('/jadwal/alter/simpan', 'HomeController@jadwalalters')->middleware('can:isAdmin');
Route::post('/jadwal/simpan', 'HomeController@jadwalsimpan')->middleware('can:isAdmin');

Route::get('/departement', 'HomeController@departement')->middleware('can:isAdmin');
Route::get('/departement/alter/{id}', 'HomeController@deptalter')->middleware('can:isAdmin');
Route::get('/departement/plus', 'HomeController@deptplus')->middleware('can:isAdmin');
Route::get('/departement/minus/{id}', 'HomeController@deptminus')->middleware('can:isAdmin');
Route::post('/departement/alter/simpan', 'HomeController@deptalters')->middleware('can:isAdmin');
Route::post('/departement/simpan', 'HomeController@deptsave')->middleware('can:isAdmin');

Route::get('/makanan', 'HomeController@makanan')->middleware('can:isAdmin');
Route::get('/makanan/plus', 'HomeController@makananplus')->middleware('can:isAdmin');
Route::get('/makanan/minus/{id}', 'HomeController@makananminus')->middleware('can:isAdmin');
Route::get('/makanan/alter/{id}', 'HomeController@makananalter')->middleware('can:isAdmin');
Route::post('/makanan/alter/simpan', 'HomeController@makananalters')->middleware('can:isAdmin');
Route::post('/makanan/simpan', 'HomeController@makanansimpan')->middleware('can:isAdmin');

Route::get('/data', 'HomeController@data')->middleware('can:isAdmin');
Route::get('/datam/{id}', 'HomeController@detaildatam')->middleware('can:isAdmin');
Route::get('/detaildata/{id}', 'HomeController@dataid')->middleware('can:isAdmin');
Route::get('/data/makan', 'HomeController@datamakan')->middleware('can:isAdmin');
