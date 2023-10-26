<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use \App\Http\Controllers\CarrinhoController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserController;
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

Route::resource("produtos",ProdutoController::class);
Route::resource("users",UserController::class);

Route::get('/',[
   SiteController::class, 'index'
])->name('site.index');

Route::get('/produto/{slug}',[
    SiteController::class, 'details'
])->name('site.details');


Route::get('/categoria/{id}', [
    SiteController::class, 'categoria'
])->name('site.categoria');


Route::get('/carrinho', [
    CarrinhoController::class, 'carrinhoLista'
])->name('site.carrinho');


Route::post('/carrinho', [
    CarrinhoController::class, 'adicionaCarrinho'
])->name('site.addcarrinho');


Route::post('/remover', [
    CarrinhoController::class, 'removecarrinho'
])->name('site.removecarrinho');

Route::post('/atualizar', [
    CarrinhoController::class, 'atualizacarrinho'
])->name('site.atualizacarrinho');

Route::get('/limparcarrinho', [
    CarrinhoController::class, 'limparcarrinho'
])->name('site.limparcarrinho');


Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');



Route::get('/admin/dashboard', [
    DashboardController::class, 'index'
])->name('admin.dashboard')->middleware('auth');

