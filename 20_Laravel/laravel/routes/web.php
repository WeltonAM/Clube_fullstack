<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.post');

Route::get('/signup', [SignUpController::class, 'index']);

## >> Protected routes ----------##--------------------------------##-------------
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.home')->withoutMiddleware(('auth'));
    Route::get('/clients', [ClientController::class, 'index'])->name('admin.clients');
});

## >> Resource special methods --##--------------------------------##-------------
Route::resource('/user', UserController::class)->names([
    'create' => 'create.user',
])->only('index', 'show', 'create');

## >> Redirect ways -------------##--------------------------------##-------------
// Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

// Route::post('/login', function(){
//     // return redirect('/')->withInput()->with('message', 'Error');
//     return back();
// });

// Route::get('/test', function () {
//     return redirect('/');
// });

// Route::get('/test1', function () {
//     return redirect()->action([ProductController::class, 'edit'], ['id' => 2]);
// });

// Route::get('/test2', function () {
//     return redirect()->away('http://google.com');
// });

## >> Named routes ---------------##--------------------------------##------------
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

## Working with routes ---------##--------------------------------##--------------
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
