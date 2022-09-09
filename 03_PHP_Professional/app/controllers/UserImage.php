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
            where('clienteId', $auth->id);

            $photoUser = execute(isFetchAll:false);

            if($photoUser){
                $updated = update('photos', [
                    'path' => $path,
                ], [
                    'clienteId' => $auth->id,
                ]);
                @unlink($photoUser->path);
            }else {
                $updated = create('photos', [
                    'clienteId' => $auth->id,
                    'path' => $path,
                ]);
            }

            $auth->path = $path;

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
