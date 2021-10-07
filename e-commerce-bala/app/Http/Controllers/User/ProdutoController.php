<?php
namespace App\Http\Controllers\User;


use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Services\ProdutoService;
use App\Http\Controllers\Controller;


class ProdutoController extends Controller
{
    private $service;

    public function __construct(ProdutoService $produtoService)
    {
        $this->service = $produtoService;
    }

    public function index()
    {
        $produtos = Produto::all();
        return response()->view('pages.produto.produto-lista', compact('produtos'));
    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()->view('pages.produto.produto-individual', compact('produto'));
    }
}