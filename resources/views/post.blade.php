@extends('layouts.main')

@section('contentSaya')
    <article>
        <h2>{{ $post->title }}</h2>
        <p>By. <a href="#">{{ $post->user->name }}</a> category : <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {!! $post->body !!}
    </article>
    <a href="/blog" class=" btn bg-danger">kembali</a>
@endsection