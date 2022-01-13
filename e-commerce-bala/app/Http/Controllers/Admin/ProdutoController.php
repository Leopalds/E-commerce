<?php
namespace App\Http\Controllers\Admin;


use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ImagemGerenciador;
use App\Services\Validadores\ProdutoValidador;
use Spatie\QueryBuilder\QueryBuilder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Spatie\QueryBuilder\AllowedFilter;

class ProdutoController extends Controller
{
    private $produtoValidador;
    private $imagemGerenciador;
    private $carrinho;

    public function __construct(ProdutoValidador $produtoValidador, ImagemGerenciador $imagemGerenciador, Cart $carrinho)
    {
        $this->produtoValidador = $produtoValidador;
        $this->imagemGerenciador = $imagemGerenciador;
        $this->carrinho = $carrinho;
    }

    public function index()
    {
        $produtos = QueryBuilder::for(Produto::class)
            ->allowedFilters([
                AllowedFilter::scope('baixo_estoque')
            ])
            ->paginate(5)
            ->withQueryString();

       
        return response()->view('paginas.admin.produtos.produtos_index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();

        return response()->view('paginas.admin.produtos.produtos_create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validador = $this->produtoValidador->validar($request);
        
        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }
        
        $dadosValidados = $validador['dados'];
        DB::beginTransaction();
        $produto = Produto::create($dadosValidados);
        
        if ($request->hasFile('imagem')) {
            $images = $this->imagemGerenciador->salvar($request->file('imagem'), $produto);

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

    public function show(int $id)
    {
        $produto = Produto::find($id);
        return response()->view('paginas.admin.produtos.produtos_show', compact('produto'));
    }

    public function edit(int $id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return response()->view('paginas.admin.produtos.produtos_edit', compact('produto', 'categorias'));

    }

    public function update(Request $request, int $id)
    {
        
        $validador = $this->produtoValidador->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidados = $validador['dados'];

        $produto = Produto::find($id);

        if ($request->hasFile('imagem')) {
            $images = $this->imagemGerenciador->salvar($request->file('imagem'), $produto);

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
        $produto->quantidade = $dadosValidados['quantidade'];

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
        
        $this->excluirItemDoCarrinho($id);

        $produto->categorias()->detach();
        $produto->imagens()->detach();
        $produto->delete();

        $response = [
            'success' => true
        ];

        return $response;
    }

    private function excluirItemDoCarrinho($id)
    {
        foreach($this->carrinho::content() as $itemCarrinho) {
            if ($id == $itemCarrinho->id) {
                Cart::remove($itemCarrinho->rowId);                
            }
        }
    }
}
