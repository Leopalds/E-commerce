<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CarrinhoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $carrinho = Cart::content();
        
        return response()->view('pages.carrinho', compact('carrinho', 'produtos'));
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

    public function destroy(int $id)
    {
        Cart::remove($id);

        return response()->json([
            'success' => true
        ]);
    }
}
