<?php

namespace app\controllers;

use stdClass;

class Contact
{
    public function index()
    {
        return [
            'view' => 'contact',
            'data' => ['title' => 'Contact']
        ];
    }

    public function store()
    {        
        $validated = validate([
            'nomecompleto' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], persistInputs:true, checkCsrf:true);

        
        if(!$validated){
            return redirect('/contact');
        }
        
        $sent = send([
            'fromName' => $validated['nomecompleto'],
            'fromEmail' => $validated['email'],
            'toName' => $_ENV['TONAME'],
            'toEmail' => $_ENV['TOEMAIL'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'template' => 'contacts'
        ]);

        if($sent){
            return setMessageAndRedirect('contact_success', 'Enviado com sucesso', '/contact');
        }

        return setMessageAndRedirect('contact_error', 'Ocorreu um erro ao enviar o email. Tente novamente.', '/contact');
    }
}