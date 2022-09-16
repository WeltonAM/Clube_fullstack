<?php

require "vendor/autoload.php";

namespace app\classes;

class Head
{
    public function create(){
        return "Creating the head";
    }
}

class Hand
{
    public function hand(){
        return "Creating the hand";
    }
}

class Person
{
    private $head;
    private $hand;

    public function __construct(){
        $this->head = new Head; // composition example
    }

    public function create(Hand $hand){
        $this->head->create();
        $hand->create(); // aggregation example
    }
}

$person = new Person;
$person->create(new Hand);