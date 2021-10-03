<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::redirect('/home', '/', 301);

Route::view('/', 'pages.home')->name('home');

Route::view('/produtos', 'pages.produto.produto-lista')->name('produtos');
Route::view('/produtos/{id}', 'pages.produto.produto-individual')->name('produtos-individual');
Route::view('/contato', 'pages.contato')->name('contato');
Route::view('/quemsomos', 'pages.quemsomos')->name('quemsomos');

Route::prefix('/admin')->group(function () {
    
    Route::view('', 'admin.dashboard');

    Route::resource('produtos', ProdutoController::class)
        ->names([
        'index' => 'admin.produtos.index',
        'show' => 'admin.produtos.show',
        'create' => 'admin.produtos.create',
        'store' => 'admin.produtos.store',
        'edit' => 'admin.produtos.edit',
        'update' => 'admin.produtos.update',
        'destroy' => 'admin.produtos.destroy'
        ]
    )->parameters([
        'produtos' => 'id'
    ]);

    Route::resource('categorias', CategoriaController::class)
        ->except([
            'show'
        ]
    )->names([
        'index' => 'admin.categorias.index',
        'create' => 'admin.categorias.create',
        'store' => 'admin.categorias.store',
        'edit' => 'admin.categorias.edit',
        'update' => 'admin.categorias.update',
        'destroy' => 'admin.categorias.destroy'
        ]
    )->parameters([
        'categorias' => 'id'
        ]
    );
});


Auth::routes(
    ['register' => false],
);
Route::redirect('/register', '/login', 301);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
