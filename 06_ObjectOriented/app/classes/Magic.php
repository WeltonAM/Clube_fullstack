<?php

class ShoppingCart
{
    private $get = [];
    private $product;

    public function __set($name, $value){
        if(property_exists($this, $name)){
            $this->get[$name][] = $value;
        } 
        throw new Exception("Prop already exists", 1);
    }

    public function __get($name){
        var_dump($this->get[$name]);
    }
}

$shoppingCart = new ShoppingCart;
$shoppingCart->product = 'TV screen'; // call the SET
echo $shoppingCart->product; // call the GET