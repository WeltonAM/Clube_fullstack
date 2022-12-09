<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Mockery\Expectation;

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

        try {
            $saved = (new User())->insert($validated);
            session()->flash('success', 'User created.');
            return view('/login');
        } catch (\Exception $e) {
            session()->flash('error', $e->errorInfo[2]);
            return back();
        }

    }
}
