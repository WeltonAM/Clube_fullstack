<?php

namespace app\controllers;

class UserImage
{
    public function store()
    {
        try {
            $path = upload(640, 480, 'assets/img');

            $auth = user();

            read('photos');
            where('userId', $auth->clienteID);

            $photoUser = execute(isFatchAll:false);

            if($photoUser){
                $updated = update('photos', [
                    'path' => $path,
                ], [
                    'userId' => $auth->clienteID,
                ]);
                @unlink($photoUser->path);
            }else {
                $updated = create('photos', [
                    'userId' => $auth->clienteID,
                    'path' => $path,
                ]);
            }

            if($updated){
                setMessageAndRedirect('upload_success', 'Imagem carregada com sucesso!', '/user/edit/profile');
                return;
            }

            setMessageAndRedirect('upload_error', 'Ocorreu um erro ao fazer o upload.', '/user/edit/profile');
            
        } catch (\Exception $e) {
            setMessageAndRedirect('upload_error', $e->getMessage(), '/user/edit/profile');
        }
    }
}
