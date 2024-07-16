<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index');
    Route::get('panel/dashboard', 'dashboard');
    Route::get('panel/artikel', 'artikel');
    Route::get('panel/artikeltambah', 'artikeltambah');
    Route::post('panel/artikeltambahsimpan', 'artikeltambahsimpan');
    Route::get('panel/artikeledit/{id}', 'artikeledit');
    Route::post('panel/artikeleditsimpan/{id}', 'artikeleditsimpan');
    Route::get('panel/artikelhapus/{id}', 'artikelhapus');

    Route::get('panel/kategori', 'kategori');
    Route::get('panel/kategoritambah', 'kategoritambah');
    Route::post('panel/kategoritambahsimpan', 'kategoritambahsimpan');
    Route::get('panel/kategoriedit/{id}', 'kategoriedit');
    Route::post('panel/kategorieditsimpan/{id}', 'kategorieditsimpan');
    Route::get('panel/kategorihapus/{id}', 'kategorihapus');

    Route::get('panel/tag', 'tag');
    Route::get('panel/tagtambah', 'tagtambah');
    Route::post('panel/tagtambahsimpan', 'tagtambahsimpan');
    Route::get('panel/tagedit/{id}', 'tagedit');
    Route::post('panel/tageditsimpan/{id}', 'tageditsimpan');
    Route::get('panel/taghapus/{id}', 'taghapus');

    Route::get('panel/profil', 'profil');
    Route::get('panel/profiledit', 'profiledit');
    Route::post('panel/profileditsimpan', 'profileditsimpan');

    Route::get('panel/logout', 'logout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('kegiatandaftar', 'kegiatandaftar');
    Route::post('kegiatandaftarcari', 'kegiatandaftarcari');
    Route::get('kegiatandetail/{id}', 'kegiatandetail');
    Route::get('pembangunandaftar', 'pembangunandaftar');
    Route::post('pembangunandaftarcari', 'pembangunandaftarcari');
    Route::get('pembangunandetail/{id}', 'pembangunandetail');
    Route::get('tentang', 'tentang');
    Route::get('daftar', 'daftar');
    Route::post('daftarsimpan', 'daftarsimpan');
    Route::get('kontak', 'kontak');
    Route::post('kontaksimpan', 'kontaksimpan');
    Route::get('profiledit', 'profiledit');
    Route::get('loginakun', 'login');
    Route::post('logincek', 'logincek');

    Route::get('inventarisdaftar', 'inventarisdaftar');
    Route::post('inventarisdaftarcari', 'inventarisdaftarcari');
    Route::get('inventarisdetail/{id}', 'inventarisdetail');

    Route::get('keuangandaftar', 'keuangandaftar');
    Route::post('keuangandaftarcari', 'keuangandaftarcari');
    Route::get('keuangandetail/{id}', 'keuangandetail');

    Route::get('artikel', 'artikel');
    Route::get('artikeldetail/{id}', 'artikeldetail');
    Route::get('artikeldaftarcari', 'artikeldaftarcari');
    Route::post('komentartambah/{id}', 'komentartambah');

    Route::get('kategori', 'kategori');
    Route::get('kategoridetail/{id}', 'kategoridetail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
