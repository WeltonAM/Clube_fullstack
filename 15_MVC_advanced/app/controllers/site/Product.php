<?php

namespace app\controllers\site;

class Product
{
    public array $data = [];
    public string $view;
    public string $master = 'index.php';

    public function index()
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Edit'
        ];
    }

    public function edit(array $args)
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Edit'
        ];
    }
}