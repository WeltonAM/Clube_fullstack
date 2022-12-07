<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'nickName' => 'nullable',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validated){
            return view('/login');
        }
    }
}
