@extends('site.master')

@section('content')
    <h2>Posts</h2>

    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="/post/{{ $post->slug }}">
                {{ $post->title }} -
                <small>{{ $post->user->firstName }}</small>
            </a>
        </li>
        @endforeach
    </ul>

@endsection
