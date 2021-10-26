<?php

namespace App\Http\Controllers\Publico;

use App\Mail\Contato;
use Illuminate\Http\Request;
use App\Services\ContatoService;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $contatoService;

    public function __construct(ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }

    public function enviar(Request $request)
    {
        $validador = $this->contatoService->validar($request);

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
