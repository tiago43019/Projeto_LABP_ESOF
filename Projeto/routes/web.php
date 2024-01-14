<?php

use App\Http\Controllers\MundoEmRotasController;
use App\Http\Controllers\loginRegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AtividadesController;
use App\Http\Controllers\AtividadesadminController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\stripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\GerirUsersController;



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

// Return views
Route::get('/welcome', [MundoEmRotasController::class, 'welcome']);
Route::get('/home', [MundoEmRotasController::class, 'home']);
Route::get('/adminhome', [MundoEmRotasController::class, 'adminhome'])->middleware('admin');
Route::get('/gerirusers', [MundoEmRotasController::class, 'gerirusers'])->middleware('admin');
Route::get('/login', [MundoEmRotasController::class, 'login'])->name('login');
Route::get('/perfil', [MundoEmRotasController::class, 'perfil']);
Route::get('/login_forget_password', [MundoEmRotasController::class, 'login_forget_password']);
Route::get('/atividade', [MundoEmRotasController::class, 'atividade']);
Route::get('/purchase', [MundoEmRotasController::class, 'purchase']);
Route::get('/criaratividade', [MundoEmRotasController::class, 'criaratividade'])->middleware('auth');
Route::get('/reservas', [MundoEmRotasController::class, 'reservas']);

// Login, Register, Logout, Forgot Password, Reset Password
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


// Ver perfil, editar perfil, atualizar perfil
Route::get('/perfil', [LoginRegisterController::class, 'perfil'])->middleware('auth')->name('perfil')->middleware('auth');
Route::get('/editar_perfil', [loginRegisterController::class, 'editarPerfil'])->name('editar_perfil')->middleware('auth');
Route::post('/perfil/atualizar', [loginRegisterController::class, 'atualizarPerfil'])->name('perfil.atualizar')->middleware('auth');

// Mostrar atividades(home), mostrar atividade, adicionar aos favoritos, ver favoritos, remover dos favoritos, adicionar comentario, eliminar comentario
Route::get('/home', [AtividadesController::class, 'index']);
Route::get('/adminhome', [AtividadesadminController::class, 'index'])->middleware('admin');
Route::get('/atividades/{id}', [AtividadesController::class, 'showAtividade']);
Route::post('/adicionar-remover-favorito/{atividadeId}', [AtividadesController::class, 'adicionarAosFavoritos'])->middleware('auth');
Route::get('/favoritos', [AtividadesController::class, 'favoritos'])->middleware('auth')->name('favoritos');
Route::post('/atividades/{atividadeId}/comentarios', [AtividadesController::class, 'adicionarComentario'])->middleware('auth');
Route::delete('/atividades/comentario/{comentarioId}/eliminar', [AtividadesController::class, 'eliminarComentario'])->middleware('auth');

// Reservar atividade
Route::get('/purchase/{atividadeId}', [stripeController::class, 'purchase'])->name('purchase')->middleware('auth');
Route::post('/checkout', [stripeController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/success', [stripeController::class, 'success'])->name('success')->middleware('auth');

// Ver reservas
Route::get('/reservas', [ReservaController::class, 'showReservas'])->middleware('auth');

// Search bar para pesquisar atividades
Route::get('/search', [searchController::class, 'search']);

// Criar atividade, editar atividade, atualizar atividade, gerir atividades, eliminar atividade
Route::post('/criaratividade', [AtividadesController::class, 'criarAtividade'])-> middleware('auth');
Route::get('/editaratividade/{id}', [AtividadesController::class, 'editarAtividade'])-> middleware('auth');
Route::post('/atualizaratividade/{id}', [AtividadesController::class, 'atualizarAtividade'])-> middleware('auth');
Route::get('/geriratividades', [AtividadesController::class, 'gerirAtividades'])-> middleware('auth');
Route::delete('/atividades/{id}', [AtividadesController::class, 'eliminarAtividade'])-> middleware('auth');

// Gerar pdf da Atividade e pdf do recibo da reserva
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);
Route::get('/download-recibo/{reservaId}', [PDFController::class,'downloadRecibo'])->middleware('auth');

// Gerir users(admin), eliminar users(admin)
Route::get('/gerirusers', [GerirUsersController::class, 'listarUsers'])->name('gerirusers')->middleware('admin');
Route::delete('/gerirusers/{user}', [GerirUsersController::class, 'destroy'])->name('gerirusersdelete')->middleware('admin');
