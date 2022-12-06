<?php

namespace app\Http\Controllers;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    public function index()
    {
        return view('home', [
            'title' => 'Home',
        ]);
    }
}
