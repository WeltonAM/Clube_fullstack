<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $post = Post::with('user')->get();

        return view('site.home', ['title' => 'Home', 'posts' => $post]);
    }
}
