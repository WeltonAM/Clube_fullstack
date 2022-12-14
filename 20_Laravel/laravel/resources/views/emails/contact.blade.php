{{-- <p>Hello,</p>

<p>You recieved a emial from {{ $user['name'] }}</p>

<p>{{ $user['message'] }}</p> --}}

@component('mail::message')
# Contact

Hello,
    You recieved a email from {{ $user['email'] }}.

{{ $user['message'] }}

@component('mail::button', ['url' => $url])
Visit my site
@endcomponent

@endcomponent
