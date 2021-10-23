<?php
namespace App\Http\Controllers\User;


use App\Models\Produto;
use App\Models\Categoria;
use App\Services\Buscador;
use Illuminate\Http\Request;
use App\Services\ProdutoService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {
        $categorias = Categoria::all();
        
        
        $produtos = QueryBuilder::for(Produto::class)
        ->allowedFilters(['nome'])
        ->allowedSorts(['preco'])
        ->paginate(4)
        ->withQueryString();
        
        if ($request->has('categoria')) {
            $categoria = Categoria::find($request->get('categoria'));
            $produtos = $categoria->produtos()->paginate(4);
        }

        return response()
            ->view(
                'pages.produto.produto-lista', 
                compact('produtos', 'categorias')
            );

    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()
            ->view(
                'pages.produto.produto-individual', 
                compact('produto')
            );
    }
}