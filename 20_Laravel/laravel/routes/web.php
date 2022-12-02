<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


## name routes

// Route::get('/contact', function () {
//     dd('Not redirected');
// })->name('contact');

// Route::get('/test', function () {
//     echo ('Redirected');
//     return redirect()->route('contact');
// });

// Route::name('admin.')->prefix('admin')->group(function(){
//     Route::get('/', function(){
//     });

//     Route::get('/create', function(){
//         dd('create admin');
//     })->name('create');

//     Route::get('/update', function(){
//         dd('update admin');
//     })->name('update');
// });


## working with routes

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
