<?php

abstract class Creator
{
    abstract public function make();
}

class FactoryOne extends Creator
{
    public function make()
    {
        return new ConcreteOne();
    }
}

class FactoryTwo extends Creator
{
    public function make()
    {
        return new ConcreteTwo();
    }
}

interface ConcreteInterface
{
    public function something();
}

class ConcreteOne implements ConcreteInterface
{
    public function something()
    {
        return 'Concrete 1';
    }
}

class ConcreteTwo implements ConcreteInterface
{
    public function something()
    {
        return 'Concrete 2';
    }
}

$factory = new FactoryOne;
$instance = $factory->make();
var_dump($instance);