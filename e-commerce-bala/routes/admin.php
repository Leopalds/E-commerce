<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
    
    Route::view('', 'paginas.admin.dashboard')->name('dashboard');

    Route::get('/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    /*
    Route::resource('users', UserController::class)
        ->names([
            'index' => 'admin.users.index',
            'show' => 'admin.users.show',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy'
        ])->parameters([
            'users' => 'id'
        ]);
    */
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