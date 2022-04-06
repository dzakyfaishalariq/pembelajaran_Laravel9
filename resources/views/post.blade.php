@extends('layouts.main')

@section('contentSaya')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-5">{{ $post->title }}</h1>
                <p>By. <a href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a> category : <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class=" img-fluid" alt="{{ $post->category->name }}">
                <article class=" my-3 fs-5">
                    {!! $post->body !!}
                </article>
                <a href="/blog" class=" btn bg-danger">kembali</a>
            </div>
        </div>
    </div>
@endsection