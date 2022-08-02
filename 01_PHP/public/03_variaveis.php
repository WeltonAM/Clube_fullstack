<?php

$string = 'Juliana';
$number = 12;

$myName = 'Camel';
$my_name = 'Snake ';

$case = 'Juliana';
$myCase = &$case; // aponta para o mesmo ponto na memória
$myCase = 'Karla';

echo gettype($number);


// // string
// echo gettype("Juliana");

// // numbers - integers, float, double
// echo gettype("123");
// echo gettype("1.2");


// // booleans
// echo gettype(true);
// echo gettype(false);


// // arrays
// echo gettype([1, 2, 3]);


// //object
// class Person {

// }

// echo gettype(new Person);


// // null
// echo gettype(null);