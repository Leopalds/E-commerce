<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProdutoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Validator;

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

        return response()->view('admin.produtos.produtos_index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();

        return response()->view('admin.produtos.produtos_create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        $produto = Produto::create($dadosValidados);

        if (!is_null($request->categoria)) {
            $produto->categorias()->sync($request->categoria);
        }

        $response = [
            'success' => true,
        ];

        return response()->json($response);
    }

    public function show(int $id)
    {
        $produto = Produto::find($id);

        return response()->view('admin.produtos.produtos_show', compact('produto'));
    }

    public function edit(int $id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return response()->view('admin.produtos.produtos_edit', compact('produto', 'categorias'));

    }

    public function update(Request $request, int $id)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        $produto = Produto::find($id);

        $produto->nome = $dadosValidados['nome'];
        $produto->descricao = $dadosValidados['descricao'];
        $produto->preco = $dadosValidados['preco'];

        $produto->save();

        if (!is_null($request->categoria)) {
            $produto->categorias()->sync($request->categoria);
        } else {
            $produto->categorias()->detach();
        }

        $response = [
            'success' => true, 
            'dados' => [
                'nome' => $produto->nome,
                'descricao' => $produto->descricao,
                'preco' => $produto->preco
            ],
        ];

        return response()->json($response);
    }


    public function destroy(int $id)
    {
        $produto = Produto::find($id);
        $produto->categorias()->detach();

        $produto->delete();

        $response = [
            'success' => true
        ];

        return $response;
    }
}
