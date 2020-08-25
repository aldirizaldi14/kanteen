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

Route::get('/', function () {
    return view('monitor1');
});

Route::get('/monitor2', function () {
    return view('monitor2');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, //
]);

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/karyawan', 'HomeController@karyawan');
Route::get('/jadwal', 'HomeController@jadwal');
Route::get('/makanan', 'HomeController@makanan');
Route::get('/data', 'HomeController@data');
