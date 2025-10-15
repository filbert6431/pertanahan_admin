<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});


route::get ('/form input', [admin_controller::class, 'forminput']);
route::post('/tampilan', [admin_controller::class, 'hasil_inputan'])->name('tampilan');

Route::get('/auth/form_login',[\App\Http\Controllers\AuthController::class, 'index'])
->name('halaman-login');

route::post('/auth/proses-login', [\App\Http\Controllers\AuthController::class, 'login'])
->name('login-siap');
