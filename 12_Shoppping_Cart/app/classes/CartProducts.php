<?php

namespace app\classes;
use app\database\models\Read;
use app\interfaces\CartInterface;

class CartProducts
{
    public function __construct(private CartInterface $cartInterface)
    {
    }

    public function products()
    {
        $productsInCart = $this->cartInterface->cart();

        // $productsInDataBase = require '../app/helpers/products.php';
        $productsInDataBase = (new Read)->all('products');

        $products = [];
        $total = 0;

        foreach($productsInCart as $productId => $quantity){
            $product = [...array_filter($productsInDataBase, fn($product) => (int)$product->id === $productId)];

            $product = $productsInDataBase[$productId];
            $products[] = [
                'id' => $productId,
                'product' => $product[0]->name,
                'price' => $product[0]->price,
                'qtz' => $quantity,
                'subtotal' => $quantity * $product[0]->price,
            ];

            $total += $quantity * $product[0]->price;
        }

        return [
            'products' => $products,
            'total' => $total,
        ];
    }
}