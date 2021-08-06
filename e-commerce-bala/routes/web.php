<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.main');

Route::view('/produtos', 'produto.produto-lista');

Route::view('/', 'home')->name('home');
Route::view('/contato', 'contato')->name('contato');
Route::view('/quemsomos', 'quemsomos')->name('quemsomos');

Route::view('/login', 'login')->name('login');  

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/admin/produtos', [App\Http\Controllers\HomeController::class, 'produtos'])->name('admin.produtos');
    Route::get('/admin/usuarios', [App\Http\Controllers\HomeController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/admin/categorias', [App\Http\Controllers\HomeController::class, 'categorias'])->name('admin.categorias');
});
