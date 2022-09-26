<?php

session_start();

use app\classes\Cart;
use app\classes\CartProducts;

require '../vendor/autoload.php';

$cartProducts = new CartProducts(new Cart);

var_dump($cartProducts->products());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h2>Cart | <a href="/">Home</a></h2>
    <hr>
    
    <div id="container">


    </div>
</body>
</html>