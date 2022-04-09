@extends('layouts.main')
@section('contentSaya')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Registrasi From</h1>
                <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type=" text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }} {{-- digunakna untuk meletakan pesan error --}}
                    </div>
                    @enderror
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }} {{-- digunakna untuk meletakan pesan error --}}
                    </div>
                    @enderror
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }} {{-- digunakna untuk meletakan pesan error --}}
                    </div>
                    @enderror
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }} {{-- digunakna untuk meletakan pesan error --}}
                    </div>
                    @enderror
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">ke login <a href="/login">Login</a></small>
        </main>
    </div>
</div>
    
@endsection