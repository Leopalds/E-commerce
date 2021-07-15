<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layout.main');

Route::view('/produtos', 'produto.produto-lista');

Route::view('/', 'home')->name('home');
Route::view('/contato', 'contato')->name('contato');
Route::view('/quemsomos', 'quemsomos')->name('quemsomos');
