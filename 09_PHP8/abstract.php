<?php

interface AppleFactoryInterface
{
    public function ipad();
    public function mac();
}

class AppleFactory implements AppleFactoryInterface
{
    public function ipad()
    {
        return new Ipad;
    }
    public function mac()
    {
        return new Mac;
    }
}

interface AppleInterface
{
    public function create();
}

class Ipad implements AppleInterface
{
    public function create()
    {
        return 'Making an ipad';
    }
}

class Mac implements AppleInterface
{
    public function create()
    {
        return 'Making an mac';
    }
}

class CreateApple
{
    public function create($apple)
    {
        var_dump($apple->ipad()->create()).PHP_EOL;
        var_dump($apple->mac()->create());
    }   
}

$apple = new CreateApple;
$apple->create(new AppleFactory);