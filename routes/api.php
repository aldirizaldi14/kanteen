<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/86b19a0013a70a10e5c46bfd2b0b8504/{id}', 'MonitroController@ikan');
Route::get('/bffa783a022fe2d98692014dda6d7a4c/{id}', 'MonitroController@ayam');
Route::get('/53a976d2265fa15658eec491822c7389/{id}', 'MonitroController@daging');
