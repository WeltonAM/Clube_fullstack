<?php

$cookie = $_COOKIE['name'];
if (isset($cookie)) {
    echo $cookie;
} else{
    echo 'Cookie não existe';
}
