
<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProdutoController;

Route::middleware(['auth'])->group(function () {
    Route::resource('carrinho', CarrinhoController::class)
        ->except([
            'edit',
            'create',
            'show'
        ])->parameters([
            'carrinho' => 'rowId'
        ]);
});

Route::post('/mail/enviar', [MailController::class, 'enviar'])->name('mail.enviar');

Route::view('/', 'pages.home')->name('home');

Route::view('/contato', 'pages.contato')->name('contato');
Route::view('/quemsomos', 'pages.quemsomos')->name('quemsomos');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');


require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
