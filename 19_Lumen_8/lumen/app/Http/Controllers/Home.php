<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Database\Query\Select;
use Illuminate\Http\Request;
use Database\Query\Connection;
use Database\Query\QueryBuilder;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    private $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder;
    }

    public function index()
    {
        // $post = Post::with('user')->get();

        $users = $this->queryBuilder->select()
        ->table('users')
        ->create([
            'firstName' => 'Juju',
            'lastName' => 'Juju',
            'email' => 'juju@hgta.com',
            'password' => '123',
        ])
        ->execute(new Select);

        dd($users);
        
        return view('site.home', ['title' => 'Home', 'users' => $users]);
    }
}
