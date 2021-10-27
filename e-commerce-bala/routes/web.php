
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publico\MailController;
use App\Http\Controllers\Publico\FreteController;
use App\Http\Controllers\Publico\CarrinhoController;
use App\Http\Controllers\Publico\CheckoutController;
use App\Http\Controllers\Publico\ProdutoController;

Route::middleware(['auth'])->group(function () {
    Route::resource('carrinho', CarrinhoController::class)
        ->except([
            'edit',
            'create',
            'show'
        ])->parameters([
            'carrinho' => 'rowId'
        ]);

    Route::prefix('/checkout')->group(function () {
        Route::post('', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('', [CheckoutController::class, 'index'])->name('checkout.index');
    });
});


Route::view('/', 'paginas.publico.home')->name('home');
Route::post('/frete', [FreteController::class, 'store'])->name('frete.store');
Route::view('/contato', 'paginas.publico.contato')->name('contato');
Route::post('/mail/enviar', [MailController::class, 'enviar'])->name('mail.enviar');
Route::view('/quemsomos', 'paginas.publico.quemsomos')->name('quemsomos');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
