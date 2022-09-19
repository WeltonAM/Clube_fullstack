<?php

class Product
{
    private $priceProduct;
    private $discountProduct = 10;

    public function setPriceProduct($priceProduct)
    {
        if(is_numeric($priceProduct) AND $priceProduct > 0)
        {
            $this->priceProduct = $priceProduct - $this->discountProduct;
        } else {
            throw new Exception("Value in not a number.");
        }
    }

    public function getPriceProduct()
    {
        return $this->priceProduct;
    }
}

try {
    $product = new Product;
    $product->setPriceProduct(20);
    echo $product->getPriceProduct();
} catch (\Exception $e) {
    var_dump($e->getMessage);
}

