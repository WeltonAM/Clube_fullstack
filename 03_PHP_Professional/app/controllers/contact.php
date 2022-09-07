<?php

namespace app\controllers;

use stdClass;

class Contact
{
    public function index()
    {
        return [
            'view' => 'contact',
            'data' => ['title' => 'Contact'],
        ];
    }

    public function store()
    {        
        $sent = send([
           'fromName' => 'Juliana',
           'fromEmail' => 'jujuhta@gmail.br',
           'toName' => 'Me',
           'toEmail' => 'jujuhta@email.br',
           'subject' => 'Assunto teste',
           'message' => 'Mensagem teste',
           'template' => 'contact',
        ]);

        var_dump($sent);
        die();
    }
}