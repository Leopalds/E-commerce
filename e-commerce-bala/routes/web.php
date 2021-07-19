<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'home')->name('home');

Route::view('/produtos', 'produto.produto-lista')->name('produtos');
Route::view('/produtos/individual', 'produto.produto-individual')->name('produtos-individual');
Route::view('/contato', 'contato')->name('contato');
Route::view('/quemsomos', 'quemsomos')->name('quemsomos');
