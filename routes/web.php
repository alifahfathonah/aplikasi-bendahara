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
    return view('dashboard');
})->middleware('auth');
Route::resource('/transaksi', 'transaksiController')->middleware('auth');
Route::resource('/siswa', 'SiswaController')->middleware('auth');
Route::post('/siswa/import_excel', 'SiswaController@import_excel')->middleware('auth');
Route::resource('/kategori', 'KategoriController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
