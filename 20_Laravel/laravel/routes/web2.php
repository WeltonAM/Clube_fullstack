<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminLogController;
use App\Http\Controllers\PasswordController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('throttle:3');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');

// Sign up
Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::put('/password/{user}', [PasswordController::class, 'update'])->name('password.update')->middleware('auth');
Route::get('/user/texts/{user}', [UserController::class, 'show'])->name('user.texts')->middleware('auth');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

// Email
Route::get('/contact', [ContactController::class, 'index'])->name('contact')->middleware('auth');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('auth');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts')->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

// AdminLog
Route::get('/adminlog', [AdminLogController::class, 'index'])->name('adminLog')->middleware('auth');

## >> Protected routes ----------##--------------------------------##-------------
// Route::prefix('admin')->middleware('auth')->group(function(){
//     Route::get('/', [AdminController::class, 'index'])->name('admin.home')->withoutMiddleware(('auth'));
//     Route::get('/clients', [ClientController::class, 'index'])->name('admin.clients');
// });

## >> Resource special methods --##--------------------------------##-------------
// Route::resource('/user', UserController::class)->names([
//     'create' => 'create.user',
// ])->only('index', 'show', 'create');

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
