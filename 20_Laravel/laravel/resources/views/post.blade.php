@extends('master', ['title' => 'Users'])

@section('content')

<div class="card">
    <h2>List of posts</h2>
    
    <ul style="list-style:none">

        @forelse ($posts as $post)
        <li>
            <a style="text-decoration: none;">
                {{ $post->title }}
            </a>
        </li>
        @empty
            <p>Didn't find. Search again.</p>
        @endforelse
    </ul>
    
    {{ $posts->appends(['s' => request()->query('s')])->links() }}

</div>

@endsection
