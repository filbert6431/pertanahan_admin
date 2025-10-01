<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
Route::get('/', function () {
    return view('welcome');
});


route::get ('/form input', [admin_controller::class, 'forminput']);
route::post('/tampilan', [admin_controller::class, 'hasil_inputan']);
