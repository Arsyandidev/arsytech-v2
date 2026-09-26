<?php

use App\Http\Controllers\IndustriController;
use App\Http\Controllers\SolusiController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');

Route::get('/solusi', [SolusiController::class, 'index'])->name('solusi.index');
Route::get('/solusi/{solusi}', [SolusiController::class, 'show'])->name('solusi.show');

Route::get('/industri', [IndustriController::class, 'index'])->name('industri.index');
Route::get('/industri/{industri}', [IndustriController::class, 'show'])->name('industri.show');

Route::view('/studi-kasus', 'pages.studi-kasus')->name('studi-kasus');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::view('/kebijakan-privasi', 'pages.kebijakan-privasi')->name('kebijakan-privasi');
Route::view('/syarat-ketentuan', 'pages.syarat-ketentuan')->name('syarat-ketentuan');
