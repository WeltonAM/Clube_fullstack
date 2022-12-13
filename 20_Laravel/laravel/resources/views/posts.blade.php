@extends('master', ['title' => 'Users'])

@section('content')

<div class="card">
    <h2>List of posts</h2>
    
    <ul style="list-style:none">
        @foreach ($users->posts as $post)
        <li>
            <h4>
                {{ $post->title }}
            </h4>
            
            <p>
                {{ $post->content }}
            </p>
        </li>
        @endforeach
    </ul>
    
    @forelse ($posts as $tag)
        <a href="">{{ $tag->name }}</a>
    @empty
        
    @endforelse

    <hr>

    <div id="creator">
        <small>Created by:</small>
        <p id="author">
            {{ $users->firstName }} {{ $users->lastName }}
        </p>
        <p id="author-email">
            {{ $users->email}}
        </p>

    </div>

</div>

@endsection
