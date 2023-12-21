<?php

use App\Http\Controllers\MundoEmRotasController;
use App\Http\Controllers\loginRegisterController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Models\Atividade;


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



Route::get('/', function () {
    return redirect('/home');
});

Route::get('/welcome', [MundoEmRotasController::class, 'welcome']);
Route::get('/home', [MundoEmRotasController::class, 'home']);
Route::get('/login', [MundoEmRotasController::class, 'login']);
Route::get('/perfil', [MundoEmRotasController::class, 'perfil']);
Route::get('/login_forget_password', [MundoEmRotasController::class, 'login_forget_password']);
Route::get('/atividade', [MundoEmRotasController::class, 'atividade']);
Route::get('/purchase', [MundoEmRotasController::class, 'purchase']);

Route::post('/login', [loginRegisterController::class, 'processLogin']);
Route::post('/register', [loginRegisterController::class, 'register']);
Route::post('/logout', [loginRegisterController::class, 'logout'])->name('logout');

Route::get('/perfil', [LoginRegisterController::class, 'perfil'])->middleware('auth');
Route::get('/editar_perfil', [loginRegisterController::class, 'editarPerfil'])->name('editar_perfil');
Route::post('/perfil/atualizar', [loginRegisterController::class, 'atualizarPerfil'])->name('perfil.atualizar');

Route::get('/home', [AtividadesController::class, 'index']);

Route::get('/reservas', [ReservaController::class, 'showReservas']);
