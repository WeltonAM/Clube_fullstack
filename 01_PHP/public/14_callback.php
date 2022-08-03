<?php 

// function teste($name)
// {
//     return "Olá, meu nome é {$name}";
// }

// function teste2($fn)
// {
    // if(is_callable($fn)){
    // return $fn('Juliana');
//    }
// }

// echo teste2('teste');

// ----------------------
// function teste($name)
// {
//     return "Olá, {$name}";
// }

// echo call_user_func('teste', 'Karla'); // uma callback, e sua maneira de passar parâmetro


// ----------------------
// class User 
// {
//     public function teste($name)
//     {
//         return "Olá, {$name}";
//     }
// }

// $user = new User; // caso esteja em uma função STATIC não precisa instanciar nova classe

// echo call_user_func([$user, 'teste'], 'Flor');


// ----------------------
// class User
// {
//     public function __invoke()
//     {
//         return 'Aqui o teste';
//     }
// }

// $user = new User;

// function teste($fn)
// {
//     return $fn();
// }

// echo teste($user);



//----------------------------

$user = function($name)
{
    return 'teste ' . $name;
};

function teste($fn)
{
    return call_user_func($fn, 'Juliana');
}

echo teste($user);