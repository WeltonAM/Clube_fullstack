<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $search = request()->input('s');
        if($search){
            $posts = Post::where('title','like',"%{$search}%")->orWhere('content','like',"%{$search}%")->paginate(12);
        } else {
            $posts = Post::paginate(12);
        }

        return view('post')->with('posts', $posts);
    }

    public function show(Post $post)
    {
        return view('post')->with('post', $post);
    }
}
