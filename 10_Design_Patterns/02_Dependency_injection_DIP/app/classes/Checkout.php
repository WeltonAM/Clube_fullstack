<?php

namespace app\classes;

use app\interfaces\CheckoutInterface;

class Checkout
{
    private $payment;

    public function __construct(CheckoutInterface $payment) // dependency injection
    {
        $this->payment = $payment; // dependency inversion principal
    }

    public function payment()
    {
        $this->payment->shipping();
        return $this->payment->pay();
    }
}