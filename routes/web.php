<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\WargaController;

Route::get('/',[AuthController::class, 'index'])->name('login-siap');

route::get ('/form input', [AdminController::class, 'forminput']);
route::post('/tampilan', [AdminController::class, 'hasil_inputan'])->name('tampilan');

// show login form (uses admin/login view)
Route::get('/auth/form_login', [AuthController::class, 'index'])->name('halaman-login');

// process login (posts to this route)
Route::post('/auth/proses-login', [AuthController::class, 'login'])->name('login-siap');

// logout for this simple flow
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/auth/register-akun', function () {
    return view('pages.signup');
})->name('signup');

// halaman utama
Route::get('/dashboard', function () {
    return view('pages.index');
})->name('dashboard');

// halaman sidebar

//badge
Route::put('/warga/{id}/status', [WargaController::class, 'updateStatus'])->name('warga.updateStatus');
Route::put('/persil/{id}/status', [PersilController::class, 'updateStatus'])->name('Persil.updateStatus');
Route::put('/Admin/{id}/status', [adminController::class, 'updateStatus'])->name('Admin.updateStatus');

// route form
Route::resource('auth',AuthController::class);
Route::resource('admin', AdminController::class);
Route::resource('persil', PersilController::class);
Route::resource('warga', WargaController::class);
Route::resource('pages', PageController::class);
// untuk mengakses login pergi ke pertanahan_admin/auth/form_login
