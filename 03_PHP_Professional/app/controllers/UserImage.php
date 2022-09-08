<?php

namespace app\controllers;

class UserImage
{
    public function store()
    {
        try {
            upload(640, 480, 'assets/img');
        } catch (\Exception $e) {
            setMessageAndRedirect('upload_error', $e->getMessage(), '/user/edit/profile');
        }
    }
}
