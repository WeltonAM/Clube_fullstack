<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' =>'required|confirmed',
            'password_confirmation' =>'required',
        ]);

        $user->password = bcrypt($validated['password']);
        $updated = $user->save();

        if($updated){
            Session::flash('password_success', 'Password updated successfully');
            return view('home');
        } else {
            Session::flash('password_error', 'Something went wrong');
        }

        return back();
    }
}
