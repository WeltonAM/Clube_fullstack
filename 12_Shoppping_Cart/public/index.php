<?php

session_start();

use app\classes\Cart;

require '../vendor/autoload.php';

$products = require '../app/helpers/products.php';

$cart = new Cart;

$productsInCart = $cart->cart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Cart</title>
</head>
<body>
    <div id="container">
        <h3>Cart: <?php echo count($productsInCart); ?> | 
        <a href="cart.php">Go to Cart</a>
        </h3>
        <ul>

            <?php foreach($products as $index => $product): ?>
                <li>
                    <?php echo $product['name'] ?> |
                    R$ <?php echo number_format($product['price'],2,',','.') ?> 
                    <a href="add.php?id=<?php echo $index ?>">Add to cart</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>