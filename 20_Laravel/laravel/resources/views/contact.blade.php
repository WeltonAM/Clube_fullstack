@extends('master', ['title' => 'Contact'])

@section('content')

@if (session()->has('mail_success'))
    <p class="alert alert-success">{{ session()->get('mail_success') }}</p>
@elseif (session()->has('mail_error'))
<p class="alert alert-success">{{ session()->get('mail_success') }}</p>
@endif

<div class="log_card">
    <h2>Contact us</h2>

    <form action="{{ route('contact') }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="subject" placeholder="Subject">
        <textarea style="resize: none; margin-top: 5px;" name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

@endsection
