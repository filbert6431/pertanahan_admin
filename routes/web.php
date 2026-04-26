<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenPersilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\PetaPersilController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\SengketaPersilController;


//login
Route::get('/',[AuthController::class, 'index'])->name('login-siap');

// show login form (uses user/login view)
Route::get('/auth/form_login', [AuthController::class, 'index'])->name('halaman-login');
Route::get('/login', [AuthController::class, 'index'])->name('login');


// // UAS
// Route::get('{id}', [PageController::class, 'bilangan_prima'])->name('bilangan_prima');
// Route::post('/halaman/{id}', [PageController::class, 'tampilan_halaman'])->name('halaman_ujian');
// //

// process login (posts to this route)
Route::post('/auth/proses-login', [AuthController::class, 'login'])->name('login-siap');

// logout for this simple flow
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
route::get('/Identitas', function() {
    return view('pages.identitas_pengembang');
})->name('identitas');

Route::get('/auth/register-akun', function () {
    return view('pages.signup');
})->name('signup');

Route::post('/auth/register-akun', [AuthController::class, 'signup'])
->name('signup.store');


// halaman utama
Route::group(['middleware'=>['checkislogin']],function(){
    Route::group(['middleware'=>['checkrole:admin']],function(){
		// List Route yang ingin diterapkan


Route::get ('/form input', [UserController::class, 'forminput']);
Route::post('/tampilan', [UserController::class, 'hasil_inputan'])->name('tampilan');

Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');

// halaman sidebar

//badge
Route::put('/warga/{id}/status', [WargaController::class, 'updateStatus'])->name('warga.updateStatus');
Route::put('/persil/{id}/status', [PersilController::class, 'updateStatus'])->name('Persil.updateStatus');
Route::put('/user/{id}/status', [UserController::class, 'updateStatus'])->name('user.updateStatus');

// route form
Route::resource('auth',AuthController::class);
Route::resource('user', UserController::class);
Route::resource('persil', PersilController::class);
Route::resource('warga', WargaController::class);
Route::resource('pages', PageController::class);
// untuk mengakses login pergi ke pertanahan_User/auth/form_login



Route::post('/multiupload/store', [MultipleUploadController::class, 'store'])->name('multiupload.store');

Route::get('/multiupload/{table}/{id}', [MultipleUploadController::class, 'showFiles'])->name('multiupload.show');

Route::delete('/multiupload/{id}', [MultipleUploadController::class, 'destroy'])->name('multiupload.destroy');

// Dokumen Persil
Route::get('/persil/{persil_id}/dokumen', [DokumenPersilController::class, 'index'])->name('dokpersil.index');
Route::get('/persil/{persil_id}/dokumen/create', [DokumenPersilController::class, 'create'])->name('dokpersil.create');
Route::post('/persil/dokumen/store', [DokumenPersilController::class, 'store'])->name('dokpersil.store');
Route::delete('/dokumen-persil/{dokumen_id}',
    [DokumenPersilController::class, 'destroy']
)->name('dokumen_persil.destroy');
Route::get(
    '/dokumen-persil/show/{dokumen_id}',
    [DokumenPersilController::class, 'show']
)->name('dokpersil.show');


// sengketa persil
Route::get('/persil/{persil_id}/sengketa', [SengketaPersilController::class, 'index'])->name('sengketa_persil.index');
Route::get('/persil/{persil_id}/sengketa/create', [SengketaPersilController::class, 'create'])->name('sengketa_persil.create');
Route::post('/persil/sengketa/store', [SengketaPersilController::class, 'store'])->name('sengketa_persil.store');
Route::delete('/sengketa-persil/{sengketa_id}',
    [SengketaPersilController::class, 'destroy']
)->name('sengketa_persil.destroy');
Route::post('/sengketa-persil/{id}/edit', [SengketaPersilController::class, 'edit'])->name('sengketa_persil.edit');
Route::get(
    '/sengketa-persil/show/{sengketa_id}',
    [SengketaPersilController::class, 'show']
)->name('sengketa_persil.show');


// peta persil
Route::get('/peta-persil/{persil_id}', [PetaPersilController::class, 'index'])->name('peta_persil.index');
Route::get('/peta-persil/create/{persil_id}', [PetaPersilController::class, 'create'])->name('peta_persil.create'); // <- INI HARUS ADA {persil_id}
Route::post('/peta-persil/store', [PetaPersilController::class, 'store'])->name('peta_persil.store');
Route::get('/peta-persil/show/{peta_id}', [PetaPersilController::class, 'show'])->name('peta_persil.show');
Route::get('/peta-persil/edit/{peta_id}', [PetaPersilController::class, 'edit'])->name('peta_persil.edit');
Route::put('/peta-persil/update/{peta_id}', [PetaPersilController::class, 'update'])->name('peta_persil.update');
Route::delete('/peta-persil/destroy/{peta_id}', [PetaPersilController::class, 'destroy'])->name('peta_persil.destroy');


});
});

