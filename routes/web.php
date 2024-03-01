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
    return view('auth.login');
});
Route::get('/aturan', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('kategori', 'KategoriController@index')->name('kategori.index');
Route::get('kategori/create', 'KategoriController@create')->name('kategori.create');
Route::post('kategori', 'KategoriController@store')->name('kategori.store');
Route::get('kategori/{kategori_id}/edit', 'KategoriController@edit')->name('kategori.edit');
Route::post('kategori/{kategori_id}', 'KategoriController@update')->name('kategori.update');
Route::delete('kategori/{kategori_id}', 'KategoriController@destroy')->name('kategori.destroy');

Route::get('penerbit', 'PenerbitController@index')->name('penerbit.index');
Route::get('penerbit/create', 'PenerbitController@create')->name('penerbit.create');
Route::post('penerbit', 'PenerbitController@store')->name('penerbit.store');
Route::get('penerbit/{penerbit_id}/edit', 'PenerbitController@edit')->name('penerbit.edit');
Route::post('penerbit/{penerbit_id}', 'PenerbitController@update')->name('penerbit.update');
Route::delete('penerbit/{id}', 'PenerbitController@destroy')->name('penerbit.destroy');

Route::get('/buku', 'BukuController@index')->name('buku.index');
Route::get('buku/create', 'BukuController@create')->name('buku.create');
Route::post('buku', 'BukuController@store')->name('buku.store');
Route::get('buku/{buku_id}/edit', 'BukuController@edit')->name('buku.edit');
Route::get('buku/{buku_id}/show', 'BukuController@show')->name('buku.show');
Route::post('buku/{buku_id}', 'BukuController@update')->name('buku.update');
Route::delete('buku/{id}', 'BukuController@destroy')->name('buku.destroy');

Route::get('/peminjaman', 'PeminjamanController@index')->name('peminjaman.index');
Route::get('/peminjamanAdmin', 'PeminjamanController@admin')->name('peminjaman.admin');
Route::get('/peminjaman/create', 'PeminjamanController@create')->name('peminjaman.create');
Route::post('/peminjaman/store/{peminjaman_id}', 'PeminjamanController@store')->name('peminjaman.store');
Route::get('/peminjaman/{peminjaman_id}/edit', 'PeminjamanController@edit')->name('peminjaman.edit');
Route::post('/peminjaman/{peminjaman_id}', 'PeminjamanController@update')->name('peminjaman.update');
Route::delete('/peminjaman/{peminjaman_id}/delete', 'PeminjamanController@destroy')->name('peminjaman.destroy');
Route::get('/tanggal', 'PeminjamanController@tanggal')->name('tanggal');
Route::get('/cetak-laporan', 'PeminjamanController@peminjamanLaporanpdf')->name('cetak-laporan');

