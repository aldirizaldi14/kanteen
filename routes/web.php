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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

Route::get('/', 'MonitroController@monitor1');
Route::get('/monitor0', 'MonitroController@monitor0');
Route::get('/monitor2', 'MonitroController@monitor2');
Route::get('/monitor3', 'MonitroController@monitor3');

Route::get('/refresh/{id}', 'UserController@refresh')->middleware('can:isUser');
Route::get('/datashift', 'UserController@datashift')->middleware('can:isUser');
Route::get('/datashifte/{id}', 'UserController@datashifte')->middleware('can:isUser');
Route::post('/datashiftes', 'UserController@datashiftes')->middleware('can:isUser');
Route::get('/datashift/{id}', 'UserController@detailshift')->middleware('can:isUser');
Route::get('/datashiftm/{id}', 'UserController@datashiftm')->middleware('can:isUser');
Route::get('/settingshift', 'UserController@settingshift')->middleware('can:isUser');
Route::get('/settingshift/go/{id}', 'UserController@settinggo')->middleware('can:isUser');
Route::post('/settingshift/goes', 'UserController@settinggoes')->middleware('can:isUser');
Route::post('/settingshift/simpan', 'UserController@settingsimpan')->middleware('can:isUser');

Route::get('/marah/{param1}/{param2}/{param3}', 'UserController@marahparam')->middleware('can:isUser');

Route::get('/changepassword', 'UserController@password')->middleware('can:isUser');
Route::post('/passchange', 'UserController@changepassword')->middleware('can:isUser');

Route::get('/userpass/{id}', 'UserController@userpass')->middleware('can:isUser');
Route::post('/userchangepass', 'UserController@userchangepass')->middleware('can:isUser');

Route::get('/user', 'UserController@user')->middleware('can:isUser');
Route::get('/userminus/{id}', 'UserController@userhapus')->middleware('can:isUser');
Route::post('/usersimpan', 'UserController@usersimpan')->middleware('can:isUser');

// JSON 
Route::post('data1-json', 'MonitroController@select1')->name('data1-json.data1');

// Route AJAX
Route::get('/server_side/scripts/{id}', 'MonitroController@ajax');
Route::get('/server_side/count/{id}/{param}', 'MonitroController@count');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('can:isUser');

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

Route::get('/upload/{id}', 'UploadController@view')->middleware('can:isAdmin');

Route::post('/excel/settingshift', 'UploadController@settingshift')->middleware('can:isAdmin');
Route::post('/excel/uploadkaryawan', 'UploadController@uploadkaryawan')->middleware('can:isAdmin');
Route::post('/excel/uploadmakanan', 'UploadController@uploadmakanan')->middleware('can:isAdmin');
Route::post('/excel/uploadmenu', 'UploadController@uploadmenu')->middleware('can:isAdmin');