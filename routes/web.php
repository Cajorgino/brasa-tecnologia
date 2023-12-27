<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FunctionsController;
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

Route::get('/', [FunctionsController::class, 'home'])->name('home');
Route::post('/mensagem', [FunctionsController::class, 'mensagem']);

Route::get('/trabalhe-conosco', [FunctionsController::class, 'trabalheConoscoView'])->name('trabalhe-conosco');
Route::post('/candidatar-se', [FunctionsController::class, 'candidatarSe']);

Route::get('/login', function () { return view('login'); })->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

Route::get('/dashboard', [FunctionsController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/mensagem/{id}', [FunctionsController::class, 'getMensagem'])->middleware('auth');
Route::get('/mensagem/delete/{id}', [FunctionsController::class, 'deleteMensagem'])->middleware('auth');
Route::post('/mensagem/enviar', [FunctionsController::class, 'sendMail'])->middleware('auth');
Route::get('/candidaturas', [FunctionsController::class, 'candidaturas'])->name('candidaturas')->middleware('auth');
Route::get('/candidaturas/delete/{id}', [FunctionsController::class, 'deleteCandidatura'])->middleware('auth');

