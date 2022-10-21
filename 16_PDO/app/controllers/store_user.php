<?php

use app\models\User;
use app\classes\Validation;
use app\models\Transaction;

$validation = new Validation;
$validate = $validation->validate($_POST);

$transaction = new Transaction;

$transaction->transactions(function() use($transaction, $validate){
    $transaction->user->insert($validate);
    
    $transaction->post->insert([
        'title' => 'teste',
        'user' => 78,
        'descriprion' => 'description teste'
    ]);
});

// $user = new User;
// $user->insert($validate);

// if($user){
//     header('location:/');
// }