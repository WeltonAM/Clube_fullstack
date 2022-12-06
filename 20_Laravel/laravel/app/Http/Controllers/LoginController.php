<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        dd('login');
    }

    public function store(Request $request)
    {
        dd($request->input('email'));
    }
}
