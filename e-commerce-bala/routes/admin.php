<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdutoController;

Route::prefix('/admin')->middleware(['auth'])->group(function () {
    
    Route::view('', 'admin.dashboard')->name('dashboard');

    Route::resource('produtos', ProdutoController::class)
        ->names([
        'index' => 'admin.produtos.index',
        'show' => 'admin.produtos.show',
        'create' => 'admin.produtos.create',
        'store' => 'admin.produtos.store',
        'edit' => 'admin.produtos.edit',
        'update' => 'admin.produtos.update',
        'destroy' => 'admin.produtos.destroy'
        ]
    )->parameters([
        'produtos' => 'id'
    ]);


    Route::resource('categorias', CategoriaController::class)
        ->except([
            'show'
        ]
    )->names([
        'index' => 'admin.categorias.index',
        'create' => 'admin.categorias.create',
        'store' => 'admin.categorias.store',
        'edit' => 'admin.categorias.edit',
        'update' => 'admin.categorias.update',
        'destroy' => 'admin.categorias.destroy'
        ]
    )->parameters([
        'categorias' => 'id'
        ]
    );
});