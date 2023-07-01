<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Home */
Route::get('/', [HomeController::class,'home'])->name('Home.home');

/* RegLog */
Route::get('/login',[HomeController::class,'login'])->name('RegLog.login');
Route::get('/register',[HomeController::class,'registro'])->name('RegLog.register');
Route::post('/register',[CuentaController::class,'store'])->name('cuentas.store');
Route::post('/registerA',[CuentaController::class,'storeAdmin'])->name('cuentas.storeAdmin');
Route::post('/cuenta/login',[CuentaController::class,'autenticar'])->name('cuentas.autenticar');
Route::get('/cuenta/logout',[CuentaController::class,'logout'])->name('cuentas.logout');


/* Subir Foto */
Route::get('/subir', [UploadController::class,'subirImg'])->name('Home.subirImg');
Route::post('/subir',[UploadController::class,'storeImg'])->name('imagenes.store');

/* Admin */
Route::get('/gestion', [AdminController::class,'gestion'])->name('Admin.gestionCuentas');
Route::get('/banear/{imagen}', [AdminController::class,'banear'])->name('Admin.banear');
Route::put('/banear/{imagen}',[AdminController::class,'ban'])->name('Admin.ban');

/* Artista */
Route::get('/artista/{cuenta}', [ArtistController::class,'photos'])->name('Artist.photos');
Route::get('/artista/{cuenta}/ban', [ArtistController::class,'bans'])->name('Artist.baneadas');
Route::delete('/eliminar/{imagen}', [ArtistController::class,'delete'])->name('Artist.delete');


/* Variables */





