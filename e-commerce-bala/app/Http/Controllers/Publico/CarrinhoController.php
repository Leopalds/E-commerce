<?php

namespace App\Http\Controllers\Publico;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CarrinhoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $carrinho = Cart::content();
        $valorTotal = Cart::priceTotal(2, '.', '');
        
        return response()
            ->view(
                'paginas.publico.carrinho', 
                compact('carrinho', 'produtos', 'valorTotal')
            );
    }

    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);

        Cart::add(
            $produto->id,
            $produto->nome,
            $request->quantidade,
            $produto->preco,
        );

        return redirect(route('carrinho.index'));
    }

    public function update(Request $request, string $rowId)
    {
        $itemAtualizado = Cart::update($rowId, $request->quantidade);
        $novoTotal = Cart::priceTotal(2, '.', '');

        return [
            'success' => true, 
            'dados' => $novoTotal,
            'id' => $rowId
        ];
    }

    public function destroy(string $rowId)
    {
        Cart::remove($rowId);

        return response()->json([
            'success' => true
        ]);
    }
}
