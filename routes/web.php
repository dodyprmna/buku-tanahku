<?php

use App\Livewire\Home;
use App\Livewire\Peminjaman\Index as IndexPeminjaman;
use App\Livewire\Peminjaman\Create as CreatePeminjaman;
use App\Livewire\Peminjaman\Edit as EditPeminjaman;
use App\Livewire\Permission\Index as IndexPermission;
use App\Livewire\Permission\Index as CreatePermission;
use App\Livewire\Role\Index as IndexRole;
use App\Livewire\Role\Permission as PermissionRole;
use App\Livewire\User\Index as IndexUser;
use App\Livewire\HariLibur\Index as IndexHariLibur;
use App\Livewire\Auth\Login;
use App\Livewire\HariLibur\Index;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/peminjaman', IndexPeminjaman::class)->name('peminjaman_buku_tanah')->middleware('permission:Read Peminjaman');
    Route::get('/peminjaman/create', CreatePeminjaman::class)->name('create_peminjaman_buku_tanah')->middleware('permission:Create Peminjaman');
    Route::get('/peminjaman/{id}/edit', EditPeminjaman::class)->name('peminjaman.edit');
    Route::get('/permission', IndexPermission::class)->name('permission');
    Route::get('/permission/create', CreatePermission::class)->name('create_permission');
    Route::get('/role', IndexRole::class)->name('role');
    Route::get('/role/{id}/setPermission', PermissionRole::class)->name('permission_role');
    Route::get('/user', IndexUser::class)->name('user');
    Route::get('/hari_libur', Index::class)->name('hari_libur');
});
