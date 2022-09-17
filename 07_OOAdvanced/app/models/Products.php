<?php

namespace app\models;

class Products extends Model
{
    public $table = 'products';

    public function allProductWithDiscount()
    {
        return 'discount';
    }
}