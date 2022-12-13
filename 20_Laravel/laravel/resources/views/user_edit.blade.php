@extends('master', ['title' => 'Edit user'])

@section('content')

@if (session()->has('update_success'))
    <x-alert key="success" :message="session()->get('update_success')" />
@elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('update_error')" />
@endif

@if (session()->has('password_success'))
    <x-alert key="success" :message="session()->get('password_success')" />
@elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('password_error')" />
@endif


<div class="log_card">
    <div class="log_logo">
        <p>Edit user</p>
        <img src="/assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" alt="">
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('put')

        <input type="text" name="firstName" value="{{ $user->firstName }}">
        <input type="text" name="lastName" value="{{ $user->lastName }}">
        <input type="email" name="email" value="{{ $user->email }}">


        <x-Button>
            Update
        </x-Button>

    </form>
    {{ $errors->first('firstName') }}
    {{ $errors->first('email') }}

    <hr>

    <form action="{{ route('password.update', $user->id) }}" method="post">
        @csrf
        @method('put')

        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">

        <x-Button>
            Update
        </x-Button>
        {{ $errors->first('password') }}

    </form>
</div>

@endsection
