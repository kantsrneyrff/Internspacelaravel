<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmAgendamentoController;
use App\Http\Controllers\ConfirmPresencController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\ListagensController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\PerfilController;
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
 Route::get('/teste', [GraficoController::class, 'grafico'])->name('teste');


Route::prefix('esqSenha')->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('perfil-index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authentication'])->name('login-authentication');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::prefix('painel')->group(function () {
        Route::get('/', [PainelController::class, 'index'])->name('painel-index');
        Route::get('/dados', [PainelController::class, 'grafico'])->name('painel-dados');
        Route::get('/historicoAluno', [AgendamentoController::class, 'histAluno'])->name('agendamentos-histAluno');
        Route::get('/confirmPresenca', [ConfirmPresencController::class, 'index'])->name('confirmPresenca-index')->middleware('can:orientador-access');
        Route::post('/aprovado', [ConfirmPresencController::class, 'updatePresente'])->where('id', '[0-9]+')->name('confirmPresenca-updatePresente');
        Route::post('/recusado', [ConfirmPresencController::class, 'updateAusente'])->where('id', '[0-9]+')->name('confirmPresenca-updateAusente');
        
        
        Route::prefix('usuarios')->group(function () {
            Route::get('/', [UsuarioController::class, 'index'])->name('usuarios-index')->middleware('can:admin-access');
            Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios-create')->middleware('can:admin-access');
            Route::post('/', [UsuarioController::class, 'store'])->name('usuarios-store')->middleware('can:admin-access');
            Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->where('id', '[0-9]+')->name('usuarios-edit')->middleware('can:admin-access');
            Route::put('/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuarios-update')->middleware('can:admin-access');
            Route::put('/senha/{id}', [UsuarioController::class, 'updateSenha'])->where('id', '[0-9]+')->name('usuarios-updateSenha')->middleware('can:admin-access');
            Route::delete('/{id}', [UsuarioController::class, 'destroy'])->where('id', '[0-9]+')->name('usuarios-destroy')->middleware('can:admin-access');
            Route::get('/listUsers', [UsuarioController::class, 'listUsers'])->name('usuarios-listUser')->middleware('can:orientador-access');
           
           
        });

        Route::prefix('agendamentos')->group(function () {
            Route::get('/', [AgendamentoController::class, 'index'])->name('agendamentos-index');
            Route::get('/create', [AgendamentoController::class, 'create'])->name('agendamentos-create');
            Route::post('/', [AgendamentoController::class, 'store'])->name('agendamentos-store');
            Route::get('/{id}/edit', [AgendamentoController::class, 'edit'])->where('id', '[0-9]+')->name('agendamentos-edit');
            Route::put('/{id}', [AgendamentoController::class, 'update'])->where('id', '[0-9]+')->name('agendamentos-update');
            Route::delete('/{id}', [AgendamentoController::class, 'destroy'])->where('id', '[0-9]+')->name('agendamentos-destroy');
            
            Route::get('/confirmAgedamentos', [ConfirmAgendamentoController::class, 'index'])->name('confirmAgendamentos-index');
            Route::post('/aprovado', [ConfirmAgendamentoController::class, 'updateAprovado'])->where('id', '[0-9]+')->name('agendamentos-updateAprovado');
            Route::post('/recusado', [ConfirmAgendamentoController::class, 'updateRecusado'])->where('id', '[0-9]+')->name('agendamentos-updateRecusado');
        });
        

        Route::prefix('perfil')->group(function () {
            Route::get('/', [PerfilController::class, 'index'])->name('perfil-index');
        });

        Route::prefix('parametros')->group(function () {
            Route::get('/{tab?}/{id?}', [ParametroController::class, 'createOrEdit'])->name('parametros-createOrEdit');

            Route::post('/local/{id?}', [ParametroController::class, 'storeOrUpdateLocal'])->name('parametrosLocal-storeOrUpdate');
            Route::post('/setor/{id?}', [ParametroController::class, 'storeOrUpdateSetor'])->name('parametrosSetor-storeOrUpdate');
            Route::post('/periodo/{id?}', [ParametroController::class, 'storeOrUpdatePeriodo'])->name('parametrosPeriodo-storeOrUpdate');
            Route::delete('/local/{id}', [ParametroController::class, 'destroyLocal'])->where('id', '[0-9]+')->name('parametrosLocal-destroy');
            Route::delete('/setor/{id}', [ParametroController::class, 'destroySetor'])->where('id', '[0-9]+')->name('parametrosSetor-destroy');
            Route::delete('/periodo/{id}', [ParametroController::class, 'destroyPeriodo'])->where('id', '[0-9]+')->name('parametrosPeriodo-destroy');
        });
    });
});
