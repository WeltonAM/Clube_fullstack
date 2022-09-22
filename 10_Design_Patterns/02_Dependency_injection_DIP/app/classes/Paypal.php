<?php

namespace app\classes;

use app\interfaces\CheckoutInterface;

class Paypal implements CheckoutInterface
{
    public function pay()
    {
        return 'Payment with Paypal';
    }
    
    public function shipping()
    {
        return 'Shipping with Paypal';
    }
}