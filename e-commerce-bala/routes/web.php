
<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProdutoController;

Route::redirect('/home', '/', 301);
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho', [CarrinhoController::class, 'store'])->name('carrinho.store');
Route::delete('/carrinho/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');

Route::view('/', 'pages.home')->name('home');

Route::view('/contato', 'pages.contato')->name('contato');
Route::view('/quemsomos', 'pages.quemsomos')->name('quemsomos');

Route::resource('produtos', ProdutoController::class)
    ->only([
        'index',
        'show'
    ])->parameters([
        'produtos' => 'id'
    ]);


require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
