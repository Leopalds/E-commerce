<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProdutoService;
use Illuminate\Support\Facades\DB;
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

        DB::beginTransaction();
        $produto = Produto::create($dadosValidados);
        
        if ($request->hasFile('imagem')) {
            $images = $this->salvarImagens($request->file('imagem'), $produto);

            if ($images['success'] === false) {
                $response = [
                    'success' => false,
                    'erro_img' => $images['erro']
                ];
                return response()->json($response);
            }
        }

        if (!is_null($request->categoria)) {
            $produto->categorias()->sync($request->categoria);
        }
        DB::commit();

        $response = [
            'success' => true,
        ];

        return response()->json($response);
    }

    public function salvarImagens(array $imagens, Produto $produto)
    {
        if (count($imagens) > 3) {
            return [
                'success' => false,
                'erro' => 'Um produto pode ter no máximo 3 imagens!'
            ];
        }

        foreach($imagens as $imagem) {
            $nome = $imagem->getClientOriginalName();
            $extensao = $imagem->extension();
            $tamanho = $imagem->getSize();

            $produto->imagens()->create([
                'nome' => $nome,
                'tamanho' => $tamanho,
                'extensao' => $extensao
            ]);

            $imagem->storeAs('img/produto', $nome, 'public');
        }

        return [
            'success' => true
        ];
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

        if ($request->hasFile('imagem')) {
            $images = $this->atualizarImagens($request->file('imagem'), $produto);

            if ($images['success'] === false) {
                $response = [
                    'success' => false,
                    'erro_img' => $images['erro']
                ];
                return response()->json($response);
            }
        }

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

    public function atualizarImagens(array $imagens, Produto $produto)
    {
        if (count($imagens) > 3) {
            return [
                'success' => false,
                'erro' => 'Um produto pode ter no máximo 3 imagens!'
            ];
        }

        foreach($imagens as $imagem) {
            $nome = $imagem->getClientOriginalName();
            $extensao = $imagem->extension();
            $tamanho = $imagem->getSize();

            $produto->imagens()->create([
                'nome' => $nome,
                'tamanho' => $tamanho,
                'extensao' => $extensao
            ]);

            $imagem->storeAs('img/produto', $nome, 'public');
        }

        return [
            'success' => true
        ];
    }


    public function destroy(int $id)
    {
        $produto = Produto::find($id);

        $produto->categorias()->detach();
        $produto->imagens()->delete();
        $produto->delete();

        $response = [
            'success' => true
        ];

        return $response;
    }
}
