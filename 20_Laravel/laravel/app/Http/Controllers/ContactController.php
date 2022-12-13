<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to('wa@gmail.com')->send(new Contact($validated));

        if(count(Mail::failures()) <= 0){
            return back()->with('mail_success', 'Email send successfully.');
        }
        return back()->with('mail_error', 'Something went wrong to send email.');

    }


}
