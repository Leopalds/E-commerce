<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function produtos()
    {
        return view('admin.produtos.index');
    }
    public function categorias()
    {
        return view('admin.categorias.index');
    }
    public function usuarios()
    {
        return view('admin.usuarios.index');
    }
}
