<?php

session_start();

use app\classes\Cart;
use app\classes\CartProducts;

require '../vendor/autoload.php';

$cartProducts = new CartProducts(new Cart);
$products = $cartProducts->products();

// (new Cart)->clear();

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
    <h2>Cart | <a href="/">Home</a></h2>
    <hr>
    
    <div id="container">
        <?php if(count($products) <= 0): ?>
            <h3>Cart empty</h3>
        <?php else: ?>
            <ul>
                <?php foreach($products['products'] as $product): ?>
                    <li class="cart-product">
                        <?php echo $product['product']; ?>
                        <form action="quantity.php" method="get">
                            <input type="text" name="qty" value="<?php echo $product['qty']; ?>" id="cart-input-qty">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        </form> x R$ <?php echo number_format($product['price'],2,',','.'); ?> | <?php echo number_format($product['subtotal'],2,',','.'); ?>
                        | <a href="remove.php?id=<?php echo $product['id']?>" id="cart-remove">Remove</a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div id="cart-total-clear">
                    <span id="cart-total">Total: R$ <?php echo number_format($products['total'],2,',','.') ?></span>

                    <span id="cart-clear">
                        <a href="clear.php">Clear cart</a>
                    </span>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>