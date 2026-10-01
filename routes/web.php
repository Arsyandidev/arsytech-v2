<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\SolusiController;
use Illuminate\Support\Facades\Route;

Route::middleware('track')->group(function () {
    Route::view('/', 'pages.home')->name('home');
    Route::view('/tentang', 'pages.tentang')->name('tentang');

    Route::get('/solusi', [SolusiController::class, 'index'])->name('solusi.index');
    Route::get('/solusi/{solusi}', [SolusiController::class, 'show'])->name('solusi.show');

    Route::get('/industri', [IndustriController::class, 'index'])->name('industri.index');
    Route::get('/industri/{industri}', [IndustriController::class, 'redirect'])->name('industri.show');

    Route::view('/faq', 'pages.faq')->name('faq');
    Route::view('/kontak', 'pages.kontak')->name('kontak');
    Route::post('/kontak', [KonsultasiController::class, 'store'])->name('kontak.kirim');
    Route::view('/kebijakan-privasi', 'pages.kebijakan-privasi')->name('kebijakan-privasi');
    Route::view('/syarat-ketentuan', 'pages.syarat-ketentuan')->name('syarat-ketentuan');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/{gallery:slug}', [GaleriController::class, 'show'])->name('galeri.show');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', Dashboard\OverviewController::class)->name('index');

    Route::post('blog/gambar', [Dashboard\PostController::class, 'uploadImage'])->name('blog.gambar');
    Route::resource('blog', Dashboard\PostController::class)->except('show')->parameters(['blog' => 'post']);

    Route::resource('galeri', Dashboard\GalleryController::class)->except('show')->parameters(['galeri' => 'gallery']);
    Route::post('galeri/{gallery}/foto', [Dashboard\GalleryPhotoController::class, 'store'])->name('galeri.foto.store');
    Route::patch('galeri/{gallery}/foto/urutan', [Dashboard\GalleryPhotoController::class, 'reorder'])->name('galeri.foto.urutan');
    Route::patch('foto/{photo}', [Dashboard\GalleryPhotoController::class, 'update'])->name('foto.update');
    Route::delete('foto/{photo}', [Dashboard\GalleryPhotoController::class, 'destroy'])->name('foto.destroy');

    Route::get('akun', [Dashboard\AccountController::class, 'edit'])->name('akun');
    Route::put('akun', [Dashboard\AccountController::class, 'update'])->name('akun.update');
});
