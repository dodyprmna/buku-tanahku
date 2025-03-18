<?php

use App\Livewire\Home;
use App\Livewire\Peminjaman\Create;
use App\Livewire\Peminjaman\Index;
use App\Livewire\PeminjamanBukuTanah;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', Home::class)->name('home');
Route::get('/peminjaman', Index::class)->name('peminjaman_buku_tanah');
Route::get('/peminjaman/create', Create::class)->name('create_peminjaman_buku_tanah');
