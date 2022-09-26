<?php

namespace core;

use app\classes\Uri;
use app\exceptions\ControllerNotExistException;

class Controller
{
    private $controller;
    private $namespace;

    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin',
    ];

    private $uri;

    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load()
    {
        if($this->isHome()){
            return $this->controllerHome();
        }

        return $this->controllerNotHome();
    }

    private function controllerHome()
    {
        if(!$this->controllerExist('HomeController')){
            throw new ControllerNotExistException("This page doesn't exist");
        }
        
        return $this->instanciateController();
    }

    private function controllerNotHome()
    {
        $controller = $this->getControllerNotHome();
        
        if(!$this->controllerExist($controller)){
            throw new ControllerNotExistException("This page doesn't exist");
        }

        return $this->instanciateController();
    }

    private function getControllerNotHome()
    {
        if(substr_count($this->uri, '/') > 1){
            list($controller) = array_values(array_filter(explode('/', $this->uri)));
            return ucfirst($controller).'Controller';
        }

        return ucfirst(ltrim($this->uri, '/')).'Controller';
    }

    private function isHome()
    {
        return ($this->uri == '/');
    }

    private function controllerExist($controller)
    {
        $controllerExist = false;

        foreach($this->folders as $folder){
            if(class_exists($folder.'\\'.$controller)){
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
            }
        }

        return $controllerExist;
    }

    private function instanciateController()
    {
        $controller = $this->namespace.'\\'.$this->controller;
        
        return new $controller;
    }
}