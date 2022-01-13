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
            'preco' => 'required|numeric|gt:0',
            'quantidade' => 'required|numeric|gte:0'
        ], [
            'required' => 'Esse campo é obrigatório.',
            'gt' => ':attribute precisa ser maior do que zero.',
            'gte' => ':attribute nao pode ser negativo.'
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