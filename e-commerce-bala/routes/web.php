<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/home', '/admin', 301);

Route::view('/', 'pages.home')->name('home');

Route::view('/produtos', 'pages.produto.produto-lista')->name('produtos');
Route::view('/produtos/{id}', 'pages.produto.produto-individual')->name('produtos-individual');
Route::view('/contato', 'pages.contato')->name('contato');
Route::view('/quemsomos', 'pages.quemsomos')->name('quemsomos');

Route::prefix('/admin')->group(function () {
    
    Route::view('', 'admin.dashboard');
    Route::prefix('/produtos')->group(function () {
        Route::get('', [ProdutoController::class, 'index'])->name('admin.produtos.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('admin.produtos.create');
        Route::get('/{id}', [ProdutoController::class, 'show'])->name('admin.produtos.show');
        Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->name('admin.produtos.edit');
        Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('admin.produtos.destroy');
    
        Route::post('/{id}', [ProdutoController::class, 'update'])->name('admin.produtos.update');
        Route::post('', [ProdutoController::class, 'store'])->name('admin.produtos.store');
    });
});

