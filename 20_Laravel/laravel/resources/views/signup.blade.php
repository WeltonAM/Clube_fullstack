@extends('loginLayout', ['title' => 'Sign up'])

@section('content')

<div class="log_card">
    <div class="log_logo">
        <p>Sign up</p>
        <img src="assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" alt="">
    </div>
    <form action="{{ route('signup.store') }}" method="post">
        @csrf
        <input type="text" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">
        <input type="text" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">

        <x-Button>
            Sign up
        </x-Button>

    </form>
</div>

@endsection
