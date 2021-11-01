<?php
namespace App\Http\Controllers\Publico;


use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                'paginas.publico.produto.produto_index', 
                compact('produtos', 'categorias')
            );

    }

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()
            ->view(
                'paginas.publico.produto.produto_show', 
                compact('produto')
            );
    }
}