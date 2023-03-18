<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterControllers;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('', function () {
//     return view('/login');
// });


 
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registers', [RegisterControllers::class, 'index']);
Route::post('/registers', [RegisterControllers::class, 'store']);

Route::get('/main', function () {
    return view('layouts.main');
});


Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/submit', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('registerSubmit');

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/submit', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginSubmit');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// berkas
Route::get('/berkas', [App\Http\Controllers\ApiBerkasController::class, 'showBerkas'])->name('showBerkas');
Route::post('/berkas/submit', [App\Http\Controllers\ApiBerkasController::class, 'berkas'])->name('berkasSubmit');

// berkas
Route::get('/pengumuman', [App\Http\Controllers\ApiPengumumganController::class, 'showPengumuman'])->name('showPengumuman');
Route::get('/pengumuman/detail/{id}', [App\Http\Controllers\ApiPengumumganController::class, 'showDetail'])->name('showDetail');
Route::get('/pengumuman/detail/{file_pdf}', [App\Http\Controllers\ApiPengumumganController::class, 'pengumumanDownload']);