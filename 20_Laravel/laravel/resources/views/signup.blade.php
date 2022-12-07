@extends('loginLayout', ['title' => 'Sign up'])

@section('content')

<div class="log_card">
    <div class="log_logo">
        <p>Sign up</p>
        <img src="assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" alt="">
    </div>
    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <x-Button>
            Sign up
        </x-Button>

    </form>
</div>

@endsection
