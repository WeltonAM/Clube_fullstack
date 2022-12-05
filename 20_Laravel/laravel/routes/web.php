<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
})->name(('home'));


## Redirect ways

Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('/login', function(){
    // return redirect('/')->withInput()->with('message', 'Error');
    return back();
});

Route::get('/test', function () {
    return redirect('/');
});

Route::get('/test1', function () {
    return redirect()->action([ProductController::class, 'edit'], ['id' => 2]);
});

Route::get('/test2', function () {
    return redirect()->away('http://google.com');
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
