<?php

namespace app\interface;

interface CheckoutInterface
{
    public function shipping();

    public function pay();
}