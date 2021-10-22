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
        $ordenamento = $this->ordenar($request);

        if ($ordenamento['success']) {
            $produtos = $ordenamento['dados'];
            return response()->view('pages.produto.produto-lista', compact('produtos'));
        }

        $produtos = Produto::paginate(4);
        return response()->view('pages.produto.produto-lista', compact('produtos'));

    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()->view('pages.produto.produto-individual', compact('produto'));
    }
    
    public function buscar(Request $request)
    {
        $parametro = $request->q;

        $ordenamento = $this->ordenar($request);

        if ($ordenamento['success']) {
            $produtos = $ordenamento['dados'];
            return response()->view('pages.produto.produto-lista', compact('produtos'));
        }

        $produtos = Produto::where('nome', 'LIKE', '%' . $parametro . '%')
        ->paginate(4)
        ->withQueryString();

        $produtos->appends(['q' => $parametro]);

        return response()->view('pages.produto.produto-lista', compact('produtos', 'parametro'));
    }

    private function ordenar(Request $request)
    {
        if ($request->has(['q'])) {
            $atributo = $request->q;
        } else {
            $atributo = '';
        }

        if(!$request->has(['ordenamento', 'tipo'])) {
            return [
                'success' => false
            ];
        }

        $ordenamento = $request->get('ordenamento');
        $tipo = $request->get('tipo');

        $produtos = Produto::where('nome', 'LIKE', '%' . $atributo . '%')
            ->orderBy($ordenamento, $tipo)
            ->paginate(4)
            ->withQueryString();

        return [
            'success' => true,
            'dados' => $produtos
        ];
    }
}