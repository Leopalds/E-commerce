<?php

namespace App\Services\Validadores;

use Illuminate\Support\Facades\Validator;

class UserValidador
{
    public function validar($request)
    {
        $id = $request->segment(3);

        $validador =  Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users,email,' . $id . '|email',
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