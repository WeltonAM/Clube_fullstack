<?php 


// setcookie('name', 'Juliana', time() + 2 * 24 * 60 * 60);

session_start();

require '02_session.php';

$_SESSION['name'] = 'Karla';