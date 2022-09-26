<?php

session_start();

require '../vendor/autoload.php';

use app\classes\Cart;

$quantity = filter_input(INPUT_GET, 'qty', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$cart = new Cart;
$cart->quantity($id, $quantity);

header("Location:cart.php");