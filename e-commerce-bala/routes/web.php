
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publico\MailController;
use App\Http\Controllers\Publico\FreteController;
use App\Http\Controllers\Publico\CarrinhoController;
use App\Http\Controllers\Publico\CheckoutController;
use App\Http\Controllers\Publico\HomeController;
use App\Http\Controllers\Publico\ProdutoController;

Route::middleware(['auth', 'admin'])->group(function () {
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contato', [HomeController::class, 'contato'])->name('contato');
Route::get('/quemsomos', [HomeController::class, 'quemSomos'])->name('quemsomos');

Route::post('/frete', [FreteController::class, 'store'])->name('frete.store');

Route::post('/mail/enviar', [MailController::class, 'enviar'])->name('mail.enviar');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
