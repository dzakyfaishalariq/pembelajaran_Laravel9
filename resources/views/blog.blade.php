@extends('layouts.main')
@section('contentSaya')
    @foreach($posts as $post)
        <div class="card mb-4">
            <h2>
                <a href="/blog/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
            </h2>
            <p>By. <a href="#">{{ $post->user->name }}</a> category : <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}</p>
            <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Lanjut Baca...</a>
        </div>
    @endforeach
@endsection
