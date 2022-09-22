<?php

namespace app\classes;

use app\interfaces\CheckoutInterface;

class Pagseguro implements CheckoutInterface
{
    public function pay()
    {
        return 'payment with Pagseguro';
    }

    public function shipping()
    {
        return 'Shipping with Pagseguro';
    }
}