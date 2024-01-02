<?php

use App\Http\Controllers\MundoEmRotasController;
use App\Http\Controllers\loginRegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\AtividadesadminController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Models\Atividade;
use Illuminate\Support\Facades\Auth;


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
Route::get('/adminhome', [MundoEmRotasController::class, 'adminhome'])->middleware('admin');
Route::get('/login', [MundoEmRotasController::class, 'login'])->name('login');
Route::get('/perfil', [MundoEmRotasController::class, 'perfil']);
Route::get('/login_forget_password', [MundoEmRotasController::class, 'login_forget_password']);
Route::get('/atividade', [MundoEmRotasController::class, 'atividade']);
Route::get('/purchase', [MundoEmRotasController::class, 'purchase']);
Route::get('/criaratividade', [MundoEmRotasController::class, 'criaratividade'])->middleware('admin');
Route::get('/reservas', [MundoEmRotasController::class, 'reservas']);

Route::post('/login', [loginRegisterController::class, 'processLogin']);
Route::post('/register', [loginRegisterController::class, 'register']);
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::post('/logout', [loginRegisterController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);


Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/perfil', [LoginRegisterController::class, 'perfil'])->middleware('auth')->name('perfil');
Route::get('/editar_perfil', [loginRegisterController::class, 'editarPerfil'])->name('editar_perfil');
Route::post('/perfil/atualizar', [loginRegisterController::class, 'atualizarPerfil'])->name('perfil.atualizar');

Route::get('/home', [AtividadesController::class, 'index']);
Route::get('/adminhome', [AtividadesadminController::class, 'index'])->middleware('admin');
Route::get('/atividades/{id}', [AtividadesController::class, 'showAtividade']);

Route::get('/purchase/{atividadeId}', [purchaseController::class, 'showPurchasePage']);

Route::get('/reservas', [ReservaController::class, 'showReservas']);


Route::get('/search', [searchController::class, 'search']);

Route::post('/criaratividade', [atividadesadminController::class, 'criarAtividade']);


Route::get('/editaratividade/{id}', [AtividadesadminController::class, 'editarAtividade']);
Route::post('/atualizaratividade/{id}', [AtividadesadminController::class, 'atualizarAtividade']);


Route::post('/adicionar-remover-favorito/{atividadeId}', [AtividadesController::class, 'adicionarAosFavoritos']);


Route::get('/favoritos', [AtividadesController::class, 'favoritos'])->middleware('auth')->name('favoritos');

Route::post('/atividades/{atividadeId}/comentarios', [AtividadesController::class, 'adicionarComentario'])->middleware('auth');


