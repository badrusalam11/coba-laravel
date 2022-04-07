@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            
            <h2>
                {{ $post->title}}
            </h2>
            <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            {{-- <h5>By : {{ $post->author }}</h5> --}}
            @if ($post->image)
            <div style="overflow: hidden; max-height: 350px">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top image-fluid" alt="{{ $post->category->name }}">   
            </div>
           @else
                   <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top image-fluid" alt="{{ $post->category->name }}">
           @endif

            
            <article class="my-3 fs-5 text-justify">
                {!! $post->body !!}
            </article>    
            <a href="/posts" class="text-decoration-none">←Back to post</a>
        </div>
    </div>
</div>

@endsection


