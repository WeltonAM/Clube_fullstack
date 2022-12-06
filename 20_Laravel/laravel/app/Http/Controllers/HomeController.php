<?php

namespace app\Http\Controllers;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        return view('welcome');
    }
}
