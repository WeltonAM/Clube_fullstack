<?php

abstract class Bank
{
    abstract public function deposit($value); 
}

class Itau extends Bank
{
    private $fee = 0.6;

    public function deposit($value)
    {
        return "Depositing $ {$value} with fee: {$this->fee}";
    }
}

class Bradesco extends Bank
{
    private $fee = 1;

    public function deposit($value)
    {
        return "Depositing $ {$value} with fee: {$this->fee}";
    }
}

$itau = new Itau;
echo $itau->deposit(100).PHP_EOL;

$bradesco = new Bradesco;
echo $bradesco->deposit(100).PHP_EOL;