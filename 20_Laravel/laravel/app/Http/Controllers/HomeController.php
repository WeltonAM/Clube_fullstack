<?php

namespace app\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    public function index()
    {
        if(cache()->has('users')){
            $users = cache()->get('users');
        } else {
            $users = User::limit(10)->get();
            // create if not exists
            cache()->put('users', $users, now()->addMinute(10));
        }

        // doesn't create if exists
        // cache()->add('users', $users, 10);

        $user = auth()->user();
        return view('home')->with('user', $user);
    }
}
