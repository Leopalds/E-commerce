<?php
namespace App\Http\Controllers\User;


use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Services\ProdutoService;
use App\Http\Controllers\Controller;


class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $ordenamento = $request->get('ordenamento');
        $tipo = $request->get('tipo');

        if($request->has(['ordenamento', 'tipo'])) {
            $produtos = $this->ordenar($ordenamento, $tipo);
            return response()->view('pages.produto.produto-lista', compact('produtos'));
        }

        $produtos = Produto::paginate(4);
        return response()->view('pages.produto.produto-lista', compact('produtos'));
    }

    private function ordenar($ordenamento = 'nome', $tipo = 'ASC')
    {
        return Produto::orderBy($ordenamento, $tipo)->paginate(4)->withQueryString();
    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()->view('pages.produto.produto-individual', compact('produto'));
    }
}