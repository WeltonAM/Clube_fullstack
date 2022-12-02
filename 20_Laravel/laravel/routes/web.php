<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// working with routes

// Route::prefix('blog')->group(function(){
//     Route::get('/', function(){
//         dd('blog');
//     });

//     Route::get('/post/{slug}', function($slug){
//         dd($slug);
//     });
// });

// Route::get('/user/{name}/{age}', function ($user, $age) {
//     return view('welcome');
// })->where(['name' => '[a-z]+'. 'age' => '[0-9]+']);
// ->whereAlpha('name')->whereNumber('age');

// Route::get('/', [HomeController::class, 'index']);
