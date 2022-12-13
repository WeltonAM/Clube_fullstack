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
        return view('home');
    }
}
