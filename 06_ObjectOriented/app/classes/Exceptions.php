<?php

class Controller
{
    public function make(){
        if(!$this->controllerExist()){
            throw new Exception("Error Processing Request", 1);
        }
        return 'controller';
    }

    public function controllerExist(){
        return false;
    }
}

try {
    $controller = new Controller;
    $controller->make();
} catch (\Exception $e) {
    var_dump($e->getLine());
}