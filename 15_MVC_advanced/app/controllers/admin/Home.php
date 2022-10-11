<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;

class Home implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master;

    public function index(array $args)
    {
        $this->data = [
            'title' => 'Admin',
        ];

        $this->master = 'admin/index.php';

        $this->view = 'admin/home.php';
    }

    public function edit(array $args)
    {

    }

    public function show(array $args)
    {

    }

    public function update(array $args)
    {

    }

    public function store()
    {

    }

    public function destroy(array $args)
    {

    }
}