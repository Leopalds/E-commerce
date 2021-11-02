<?php

namespace App\Services\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoValidador 
{

    public function validar(Request $request)
    {
        $validador =  Validator::make($request->all(), [
            'nome' => 'required|string',
            'descricao' => 'required',
            'preco' => 'required|integer|min:0',
            'quantidade' => 'required|integer|min:0'
        ], [
            'required' => 'Esse campo é obrigatório.',
        ]);

        if ($validador->fails()) {
            return [
                'success' => false,
                'erros' => $validador->errors()
            ];
        }  

        return [
            'success' => true,
            'dados' => $validador->validated()
        ];
    }
}