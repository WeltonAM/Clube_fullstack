<?php

require 'app/interfaces/CheckoutInterface.php';
require 'app/classes/Checkout.php';
require 'app/classes/Pagseguro.php';
require 'app/classes/Paypal.php';

use app\interfaces\CheckoutInterface;

use app\classes\Checkout;
use app\classes\Pagseguro;
use app\classes\Paypal;


$checkout = new Checkout(new Paypal);
var_dump($checkout->payment());