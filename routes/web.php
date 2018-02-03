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

Route::get('/', function () {
    return view('user.home');
});
Route::resource('user/kategori','KategoriController',['except'=>'show']);
Route::resource('user/subkategori1','Subkategori1Controller',['except'=>'show']);
Route::post('user/subkategori2/selectajax','Subkategori2Controller@selectajax' );
Route::post('user/subkategori2/selectajax2','Subkategori2Controller@selectajax2' );
Route::resource('user/subkategori2','Subkategori2Controller',['except'=>'show']);
Route::resource('user/barang','BarangController');
