<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contato extends Mailable
{
    use Queueable, SerializesModels;

    private $remetente;
    public $nomeCompleto;
    public $assunto;
    public $telefone;
    public $mensagem;
    
    public function __construct($remetente, $nomeCompleto, $assunto, $telefone, $mensagem)
    {
        $this->remetente = $remetente;
        $this->nomeCompleto = $nomeCompleto;
        $this->assunto = $assunto;
        $this->telefone = $telefone;
        $this->mensagem = $mensagem;
    }

    
    public function build()
    {
        return $this->from($this->remetente)
            ->subject($this->assunto)
            ->view('emails.contato');
    }
}
