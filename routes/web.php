<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PainelController;
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
        Route::prefix('clientes')->group(function () {
            Route::get('/', [ClienteController::class, 'index'])->name('clientes-index');
            Route::get('/create', [ClienteController::class, 'create'])->name('clientes-create');
            Route::post('/', [ClienteController::class, 'store'])->name('clientes-store');
            Route::get('/{id}/edit', [ClienteController::class, 'edit'])->where('id', '[0-9]+')->name('clientes-edit');
            Route::put('/{id}', [ClienteController::class, 'update'])->where('id', '[0-9]+')->name('clientes-update');
            Route::delete('/{id}', [ClienteController::class, 'destroy'])->where('id', '[0-9]+')->name('clientes-destroy');
        });
    });
});
