<?php

namespace App\Http\Controllers;

use App\Models\AdminLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLogController extends Controller
{
    public function index()
    {
        $users = AdminLog::all();
        
        return view('adminLog');
    }
}
