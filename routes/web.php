<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\AuthController;
use App\http\Controllers\PageController;
Route::get('/', function () {
    return view('welcome');
});


route::get ('/form input', [admin_controller::class, 'forminput']);
route::post('/tampilan', [admin_controller::class, 'hasil_inputan'])->name('tampilan');

Route::get('/auth/form_login',[\App\Http\Controllers\AuthController::class, 'index'])
->name('halaman-login');

route::post('/auth/proses-login', [\App\Http\Controllers\AuthController::class, 'login'])
->name('login-siap');


// halaman utama
Route::get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');

// halaman sidebar
Route::get('/table', [PageController::class, 'table'])->name('table');
Route::get('/chart', [PageController::class, 'chart'])->name('chart');
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::get('/signup', [PageController::class, 'signup'])->name('signup');
Route::get('/blank', [PageController::class, 'blank'])->name('blank');
Route::get('/404', [PageController::class, 'error404'])->name('404');

// route form
route::resource('/admin', AdminController::class);
route::resource('/persil', PageController::class);
route::resource('/warga', PageController::class);
