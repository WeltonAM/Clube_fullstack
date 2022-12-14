@extends('site.master')

@section('content')
    <h2>Users</h2>

    <ul>
        @foreach ($users['rows'] as $user)
        <li>
            {{ $user }} 
            
            {{-- <a href="/post/{{ $post->slug }}">
                <small>{{ $post->user->firstName }}</small>
            </a> --}}
        </li>
        @endforeach
    </ul>

    {!! $users['links'] !!}

@endsection
