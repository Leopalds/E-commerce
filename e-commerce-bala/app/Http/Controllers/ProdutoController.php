<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();

        return response()->view('admin.produtos_index', compact('produtos'));
    }

    public function create()
    {
        return response()->view('admin.produtos_create');

    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $descricao = $request->descricao;
        $preco = $request->preco;

        Produto::create([
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco
        ]);

        $response = [
            'success' => true
        ];

        return response()->json($response);
    }

    public function show(Produto $produto)
    {
        //
    }

    public function edit(int $id)
    {
        $produto = Produto::find($id);

        return response()->view('admin.produtos_edit', compact('produto'));

    }

    public function update(Request $request, int $id)
    {
        $produto = Produto::find($id);

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;

        $produto->save();

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
        Produto::destroy($id);

        $response = [
            'success' => true
        ];

        return $response;
    }
}
