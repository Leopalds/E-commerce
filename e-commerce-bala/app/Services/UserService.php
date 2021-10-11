<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserService 
{

    public function validar($dados)
    {
        $validador =  Validator::make($dados, [
            'name' => 'required|string',
            'email' => 'required|unique:users,email|email|sometimes',
            'password' => 'required|sometimes',
        ], [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'unique' => ':attribute já existe'
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