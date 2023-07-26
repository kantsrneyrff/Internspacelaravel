<?php

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/painel', function () {
    return view('painel');
});

Route::get('/cadastroAgendamento', function () {
    return view('cadastroAgendamento');
});

Route::get('/cadastroUsuario', function () {
    return view('cadastroUsuario');
});
Route::get('/confirmarAgendamento', function () {
    return view('confirmarAgendamento');
});

Route::get('/historicoAgendamento', function () {
    return view('historicoAgendamento');
});
Route::get('/painelAdm', function () {
    return view('painelAdm');
});
Route::get('/painelOrientador', function () {
    return view('painelOrientador');
});
Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/pesquisarUsuario', function () {
    return view('pesquisarUsuario');
});