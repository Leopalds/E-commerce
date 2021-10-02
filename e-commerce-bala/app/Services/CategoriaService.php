<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaService 
{

    public function validar(Request $request)
    {
        $validador =  Validator::make($request->all(), [
            'nome' => 'required',
        ], [
            'required' => 'Esse campo é obrigatório.'
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