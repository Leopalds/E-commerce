<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Services\CategoriaService;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    private $service;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->service = $categoriaService;
    }

    public function index()
    {
        $categorias = Categoria::all();

        return response()->view('admin.categorias.categorias_index', compact('categorias'));
    }

    public function create()
    {
        return response()->view('admin.categorias.categorias_create');

    }

    public function store(Request $request)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        Categoria::create($dadosValidados);

        $response = [
            'success' => true
        ];

        return response()->json($response);
    }

    public function edit(int $id)
    {
        $categoria = Categoria::find($id);

        return response()->view('admin.categorias.categorias_edit', compact('categoria'));
    }

    public function update(Request $request, int $id)
    {
        $validador = $this->service->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        $produto = Categoria::find($id);

        $produto->nome = $dadosValidados['nome'];

        $produto->save();

        $response = [
            'success' => true, 
            'dados' => [
                'nome' => $produto->nome,
            ],
        ];

        return response()->json($response);
    }

    public function destroy(int $id)
    {
        Categoria::destroy($id);

        $response = [
            'success' => true
        ];

        return $response;
    }
}
