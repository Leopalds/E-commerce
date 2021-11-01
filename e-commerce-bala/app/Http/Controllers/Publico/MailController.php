<?php

namespace App\Http\Controllers\Publico;

use App\Mail\Contato;
use Illuminate\Http\Request;
use App\Services\ContatoValidador;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $contatoValidador;

    public function __construct(ContatoValidador $contatoValidador)
    {
        $this->contatoValidador = $contatoValidador;
    }

    public function enviar(Request $request)
    {
        $validador = $this->contatoValidador->validar($request);

        if (!$validador['success']) {
            $erros = $validador;
            return response()->json($erros);
        }

        $dadosValidador = $validador['dados'];

        Mail::to(
            'joaovitorsouzacoura@gmail.com'
            )->send(new Contato(
                $dadosValidador['email'],
                $dadosValidador['name'],
                $dadosValidador['assunto'],
                $dadosValidador['telefone'],
                $dadosValidador['mensagem']
            ));

        return response()->json([
            'success' => true
        ]);
    }
}
