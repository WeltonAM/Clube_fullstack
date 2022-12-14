<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Database\Query\Connection;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index()
    {
        // $post = Post::with('user')->get();

        // return view('site.home', ['title' => 'Home', 'posts' => $post]);

        $connection = Connection::open();
        $users = $connection->query('select * from users')->fetchAll();

        dd($users);
    }
}
