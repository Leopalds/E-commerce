
<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProdutoController;

Route::redirect('/home', '/', 301);
Route::get('/hash', function () {
    echo Hash::make('123');
});

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
