<?php

namespace app\core;

class Twig
{
    private $twig;
    private $functions = [];

    public function loadTwig()
    {
        $this->twig = new \Twig_Environment($this->loadView(), [
            'debug' => true,
            // 'cache' => '/cache',
            'auto_reload' => true,
        ]);

        return $this->twig;
    }

    private function loadView()
    {
        return new \Twig_loader_Filesystem('../app/views');
    }
}