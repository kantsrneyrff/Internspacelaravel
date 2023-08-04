<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authentication'])->name('login-authentication');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('painel')->group(function () {
        Route::get('/', [PainelController::class, 'index'])->name('painel-index');
        Route::prefix('usuarios')->group(function () {
            Route::get('/', [UsuarioController::class, 'index'])->name('usuarios-index');
            Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios-create');
            Route::post('/', [UsuarioController::class, 'store'])->name('usuarios-store');
            Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->where('id', '[0-9]+')->name('usuarios-edit');
            Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuarios-update');
            Route::delete('/{id}', [UsuarioController::class, 'destroy'])->where('id', '[0-9]+')->name('usuarios-destroy');
        });
    });
});
