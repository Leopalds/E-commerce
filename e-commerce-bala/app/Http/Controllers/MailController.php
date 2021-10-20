<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class MailController extends Controller
{
    public $mailer;

    public function __construct(PHPMailer $phpMailer)
    {
        $this->mailer = $phpMailer;
        //$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
    }

    public function enviar(Request $request)
    {
        $this->preparecao();

        $this->mailer->setFrom($request->email);
        $this->mailer->addReplyTo('joaovitorsouzacoura@gmail.com');
        $this->mailer->addAddress('joaovitorsouzacoura@gmail.com', 'joao');

        $this->mailer->isHTML(true);
        $this->mailer->Subject = 'Assunto do email';
        $this->mailer->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';

        if (!$this->mailer->send()) {

            return $this->mailer->ErrorInfo;
        }

        return 'Ok';
    }

    private function preparecao()
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Username = 'joaovitorsouzacoura@gmail.com';
        $this->mailer->Password = 'ig88tc14c3por2d2';
        $this->mailer->Port = 587;
    }
}
