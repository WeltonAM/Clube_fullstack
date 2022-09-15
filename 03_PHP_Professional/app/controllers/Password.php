<?php

namespace app\controllers;

class Password
{
    public function update($args){
        if (!isset($args['user']) || $args['user'] !== user()->id){
            return redirect('/');
        }

        $validated = validate([
            'senha' => 'required|confirmed',
            'senha_confirmada' => 'require'
        ], checkCsrf:true);

        
        if(!$validated){
            return redirect('/user/edit/profile');
        }

        $updated = update('clientes', [
            'senha' => $validated['senha']
        ], ['id' => user()->id]);

        if($updated){
            $user = user();
            $sent = send([
                'fromName' =>  '',
                'fromEmail' => '',
                'toName' => $user->nomecompleto,
                'toEmail' => $user->email,
                'subject' => 'Senha alterada',
                'message' => 'Senha alterada com sucesso',
                'template' => 'password'
            ]);

            if($sent){
                return setMessageAndRedirect('password_success', 'Senha auterada com sucesso', '/user/edit/profile');
            }
    
            return setMessageAndRedirect('password_error', 'Ocorreu um erro ao atualizar a senha.', '/user/edit/profile');
        }
    }


}