<?php

namespace App\Services\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContatoValidador 
{

    public function validar(Request $request)
    {
        $validador =  Validator::make($request->all(), [
            'name' => 'required|string',
            'mensagem' => 'required|string|max:255',
            'assunto' => 'required|string|max:100',
            'email' => 'required|email|string',
            'telefone' => 'required|string|'
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