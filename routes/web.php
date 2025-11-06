<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\WargaController;

Route::get('/',[authController::class, 'index'])->name('login-siap');

route::get ('/form input', [AdminController::class, 'forminput']);
route::post('/tampilan', [AdminController::class, 'hasil_inputan'])->name('tampilan');

// show login form (uses admin/login view)
Route::get('/auth/form_login', [authController::class, 'index'])->name('halaman-login');

// process login (posts to this route)
Route::post('/auth/proses-login', [authController::class, 'login'])->name('login-siap');

// logout for this simple flow
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


// halaman utama
Route::get('/dashboard', function () {
    return view('Pages.index');
})->name('dashboard');

// halaman sidebar

// route form
Route::resource('admin', AdminController::class);
Route::resource('persil', PersilController::class);
Route::resource('warga', WargaController::class);

// untuk mengakses login pergi ke pertanahan_admin/auth/form_login
