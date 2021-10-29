<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $produtos = Produto::all()->take(3);
        
        return response()->view('paginas.publico.home', compact('produtos'));
    }

    public function contato()
    {
        return response()->view('paginas.publico.contato');
    }

    public function quemSomos()
    {
        return response()->view('paginas.publico.quemsomos');
    }
}
