<?php

class Person {
    private $data = [];

    public function data(int|string $data): ?self
    {
        array_push($this->data, $data);
        return null;
    }

    public function info(){
        var_dump($this->data);
    }
}

$juliana = new Person;
$juliana->data('Karla')?->info();
echo $juliana::class;