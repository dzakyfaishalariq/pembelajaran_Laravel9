@extends('layouts.main')
@section('contentSaya')
    <h1 class="mb-5">Post category : {{ $category }}</h1>
    @foreach($posts as $post)
        <div class="card mb-4">
            <h2>
                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <p>{{ $post->excerpt }}</p>
        </div>
    @endforeach
@endsection