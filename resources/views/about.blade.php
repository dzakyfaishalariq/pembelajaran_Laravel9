@extends('layouts.main')
@section('contentSaya')
    <h1>Halaman About</h1>
    <h2>{{ $name }}</h2>
    <h2>{{ $email }}</h2>
    <img class=" img-thumbnail rounded-circle" src="{{ $gambar }}" alt="{{ $name }}" srcset="">
@endsection