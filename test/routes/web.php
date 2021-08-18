<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/storeUsuario', [UserController::class, 'storeUsuario'])->name('storeUsuario');
Route::get('/updateUsuario/{id}', [UserController::class, 'updateUsuario'])->name('updateUsuario');
Route::get('/updateUsuarioPassword/{id}', [UserController::class, 'updateUsuarioPassword'])->name('updateUsuarioPassword');
//Route::resource('user', UserController::class);
