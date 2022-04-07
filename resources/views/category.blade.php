{{-- @dd($posts) --}}
@extends('layouts.main')
@section('container')

<h1>Category: {{ $category->name }}</h1>

@foreach ($posts as $post)
<article class="mb-5 mt-2">
    {{-- <h1>Category : {{ $post->category->name }}</h1> --}}
    <h2>
        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
    </h2>
    By. <a href="authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>
    <p>{{ $post->excerpt }}</p>
</article>    
@endforeach

@endsection