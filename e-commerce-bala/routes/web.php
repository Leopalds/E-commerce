<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layout.main');

Route::view('/produtos', 'produto.produto-lista');
