<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function create(ContatoRequest $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $text = $request->input('text');

        $to = "faleconosco@charmejoias.com.br";
        $subject = "Contato: " . $nome . " IntenSpace";
        $body = "Nome: " . $nome . "<br>" .
            "E-mail: " . $email . "<br>".
            "Telefone: " . $tel . "<br>".
            "Mensagem: " . $text . "<br>";

        $header = "From:contato@internspace.com.br" . "\r\n" . "Reply-To:contato@internspace.com.br" . "\r\n" . "X=Mailer:PHP/" . phpversion();
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to, $subject, $body, $header);
    }
}
