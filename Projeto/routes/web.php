<?php

use App\Http\Controllers\MundoEmRotasController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [MundoEmRotasController::class, 'register']);