@extends('layouts.main')
@section('contentSaya')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
        <!--if nya blade dan hitung isi postsnya dengan count()-->
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/blog">
                    <!--Digunakan untuk menyisipkan pencarian category-->
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
                        <button class="btn btn-outline-danger" type="submit">Klik</button>
                    </div>
                </form>
            </div>
        </div>
        @if ($posts->count())
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="isu">
                <div class="card-body text-center">
                <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}" class=" text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>By. <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration">{{ $posts[0]->user->name }}</a> category : <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p>
                <p>{{ $posts[0]->excerpt }}</p>
                <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Lanjut Baca...</a>    
            </div>
            </div>
    <div class="container">
        <div class="row">
            @foreach($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class=" position-absolute bg-dark px-3 py-2 text-white" style=" background-color: rgba(0,0,0,0.7) "><a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration">{{ $post->user->name }}</a> category : <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Lanjut baca ...</a>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
        <p class = "text-center fs-4">Tidak ada post</p>
    @endif
    <!--menambahkan next page dengan bootsterp-->
    <div class = " d-flex justify-content-end">
        {{ $posts->links() }} 
    </div>
@endsection
