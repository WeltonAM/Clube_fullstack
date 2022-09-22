<?php

class CarFactory
{
    public function make(string $class): CarFactoryInterface
    {
        $className = ucfirst($class);

        if(!class_exists($className)){
            throw new Exception("The class doesn't exist.");
        }
        
        $class = new $className;
        
        if(!$class instanceof CarFactoryInterface){
            throw new Exception("The class is not CarFactoryInterface.");
        }

        return $class;

        // switch($type){
        //     case 'bmw':
        //         return new BMW;
        //         break;
        //     case 'honda':
        //         return new Honda;
        //         break;
        //     case 'ford':
        //         return new Ford;
        //         break;
        //     default:
        //         throw new Exception("Class doesn't exist.");
        // }
    }
}

interface CarFactoryInterface
{
    public function drive();
}

class BMW implements CarFactoryInterface
{
    public function drive(){
        return 'drive bmw';
    }
    
}

class Honda implements CarFactoryInterface
{
    public function drive(){
        return 'drive honda';
    }
    
}

class Ford implements CarFactoryInterface
{
    public function drive(){
        return 'drive ford';
    }

}

$carFactory = new CarFactory();
$carInstance = $carFactory->make('bmw');
var_dump($carInstance->drive());