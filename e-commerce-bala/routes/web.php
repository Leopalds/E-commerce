
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProdutoController;

Route::redirect('/home', '/', 301);


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
