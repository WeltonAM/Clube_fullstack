<?php

namespace app\classes;
use app\interfaces\CartInterface;

class CartProducts
{
    public function __construct(private CartInterface $cartInterface)
    {
    }

    public function products()
    {
        $productsInCart = $this->cartInterface->cart();

        $productsInDataBase = require '../app/helpers/products.php';

        $products = [];
        $total = 0;

        foreach($productsInCart as $productId => $quantity){
            $product = $productsInDataBase[$productId];
            $products[] = [
                'id' => $productId,
                'product' => $product['name'],
                'price' => $product['price'],
                'qtd' => $quantity,
                'subtotal' => $quantity * $product['price'],
            ];

            $total += $quantity * $product['price'];
        }

        return [
            'products' => $products,
            'total' => $total,
        ];
    }
}