@extends('master', ['title' => 'Edit user'])

@section('content')

@if (session()->has('update_success'))
    <x-alert key="success" :message="session()->get('update_success')" />
@elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('update_error')" />
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
</div>

@endsection
