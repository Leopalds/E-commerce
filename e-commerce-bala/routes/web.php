<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.home')->name('home');

Route::view('/produtos', 'pages.produto.produto-lista')->name('produtos');
Route::view('/produtos/id', 'pages.produto.produto-individual')->name('produtos-individual');
Route::view('/contato', 'pages.contato')->name('contato');
Route::view('/quemsomos', 'pages.quemsomos')->name('quemsomos');
