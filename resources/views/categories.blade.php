@extends('layouts.main')
@section('contentSaya')
    <h1 class="mb-5">Post categories</h1>
    @foreach($categories as $category)
        <div class="card mb-4">
            <ul>
                <li>
                    <h2>
                        <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                    </h2>
                </li>
            </ul>
        </div>
    @endforeach
@endsection