<?php

namespace App\Http\Controllers;

use App\Events\CreatedUser;
use Error;
use Exception;
use App\Models\User;
use Mockery\Expectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'lastName' => 'nullable',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        event(new CreatedUser($validated));


        try {
            $saved = (new User())->insert($validated);
            if($saved){
                Session::flash('success', 'User created.');
                event(new CreatedUser($validated));
            }

            return view('/login');
        } catch (\Exception $e) {
            Session::flash('error', $e->errorInfo[2]);
            return back();
        }

    }
}
