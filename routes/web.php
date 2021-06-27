<?php

use Illuminate\Support\Facades\App;
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
    return view('index');
});

Route::post('/login', 'App\Http\Controllers\loginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('logout');
Route::post('/daftar', 'App\Http\Controllers\loginController@daftar')->name('daftar');

Route::group(['middleware' => ['auth', 'Cekrole:admin']], function () {
    Route::get('/user', 'App\Http\Controllers\adminController@user')->name('user');
    Route::get('/user/{id}', 'App\Http\Controllers\adminController@pembeli')->name('pembeli');
    Route::get('/admin', 'App\Http\Controllers\adminController@admin')->name('admin');
    Route::get('/barang', 'App\Http\Controllers\adminController@barang')->name('barang');
    Route::get('/barang/pria', 'App\Http\Controllers\adminController@pria')->name('pria');
    Route::get('/barang/wanita', 'App\Http\Controllers\adminController@wanita')->name('wanita');
    Route::get('/barang/anak', 'App\Http\Controllers\adminController@anak')->name('anak');
    Route::get('/barang/couple', 'App\Http\Controllers\adminController@couple')->name('couple');
    Route::get('/barang/aksesoris', 'App\Http\Controllers\adminController@aksesoris')->name('aksesoris');
    Route::post('/barang/tambahProduk', 'App\Http\Controllers\adminController@tambah_barang')->name('tambah_barang');
    Route::get('/transaksi', 'App\Http\Controllers\adminController@transaksi')->name('transaksi');
    Route::get('/laporan', 'App\Http\Controllers\adminController@laporan')->name('laporan');
    Route::post('/laporan/laporan_bulanan', 'App\Http\Controllers\adminController@laporan_bulanan')->name('laporan_bulanan');
    Route::get('/barang/edit', 'App\Http\Controllers\adminController@edit_barang')->name('edit_barang');
    Route::get('/barang/hapus/{id}', 'App\Http\Controllers\adminController@hapus_barang')->name('hapus_barang');
    Route::get('/admin/hapus/{id}', 'App\Http\Controllers\adminController@hapus_admin')->name('hapus_admin');
    Route::post('/admin/tambah', 'App\Http\Controllers\adminController@tambah_admin')->name('tambah_admin');
    Route::get('/transaksi/detail/{id}', 'App\Http\Controllers\adminController@data_barang')->name('detail_barang');
    Route::get('/transaksi/kirim/{id}', 'App\Http\Controllers\adminController@kirim')->name('kirim');
});


Route::group(['middleware' => ['auth', 'Cekrole:user']], function () {
    Route::get('/home', 'App\Http\Controllers\userController@home')->name('home');
    Route::get('/kategori/pria', 'App\Http\Controllers\userController@pria')->name('pria');
    Route::get('/kategori/wanita', 'App\Http\Controllers\userController@wanita')->name('wanita');
    Route::get('/kategori/anak', 'App\Http\Controllers\userController@anak')->name('anak');
    Route::get('/kategori/couple', 'App\Http\Controllers\userController@couple')->name('couple');
    Route::get('/kategori/aksesoris', 'App\Http\Controllers\userController@aksesoris')->name('aksesoris');
    Route::get('/keranjang', 'App\Http\Controllers\userController@keranjang')->name('keranjang');
    Route::get('/pesan/{id}', 'App\Http\Controllers\userController@pesan')->name('pesan');
    Route::post('/keranjang/update', 'App\Http\Controllers\userController@update_keranjang')->name('update_keranjang');
    Route::get('/keranjang/hapus/{id}', 'App\Http\Controllers\userController@delete_keranjang')->name('hapus_keranjang');
    Route::post('/keranjang/beli', 'App\Http\Controllers\userController@tambah_transaksi')->name('beli');
    Route::get('/pembelian', 'App\Http\Controllers\userController@pembelian')->name('pembelian');
    Route::get('/pembelian/selesai/{id}', 'App\Http\Controllers\userController@selesai')->name('selesai');
    Route::get('/akun', 'App\Http\Controllers\userController@akun')->name('akun');
    Route::get('/akun/edit', 'App\Http\Controllers\userController@akun_edit')->name('akun_edit');
    Route::get('/pencarian', 'App\Http\Controllers\userController@cari')->name('cari');
});
