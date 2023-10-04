<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (!isset($data['nome'])) {
                // O usuário não preencheu o campo nome
                return redirect()->back()->with('error', 'O campo nome é obrigatório.');
            }

            $to = "internspace@internspace.com.br";
            $subject = "Contato de " . $data['nome'];
            $body = "Nome: " . $data['nome'] . "\r\n" .
                "Email: " . $data['email'] . "\r\n" .
                "Telefone: " . $data['telefone'] . "\r\n" .
                "Mensagem: " . $data['mensagem'] . "\r\n";

            $header = "From:internspace@internspace.com.br" . "\r\n" . "Reply-To:internspace@internspace.com.br" . "\r\n" . "X=Mailer:PHP/" . phpversion();
            mail($to, $subject, $body, $header);

            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
        }

        return view('home');
    }
}
