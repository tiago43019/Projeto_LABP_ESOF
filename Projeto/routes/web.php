<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login', function () {
    return view('layouts.login');
})-> name('login');

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/login_forget_password', function () {
    return view('layouts.login_forget_password');
});

Route::get('/atividade', function () {
    return view('layouts.atividade');
});

Route::get('/atividade', function () {
    return view('atividade');
});