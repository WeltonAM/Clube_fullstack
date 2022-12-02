<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index()
    {

        return view('site.login', ['title' => 'Login']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if(!$user){
            return response()->json(['message' => 'Email or password invalid'], 401);
        }
        
        if(!password_verify($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Email or password invalid'], 401);
        }
        
        $_SESSION['userId'] = $user->id;
        return response()->json(['message' => 'Logged'], 200);
    }
}
