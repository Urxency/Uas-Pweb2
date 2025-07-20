@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #b57de4, #a6c1ee);
        min-height: 100vh;
        margin: 0;
    }

    .register-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .brand {
        font-size: 2rem;
        font-weight: bold;
        color: white;
        margin-bottom: 1rem;
    }

    .tagline {
        font-size: 1.2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .card {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .btn-primary {
        background-color: #8e44ad;
        border-color: #8e44ad;
    }

    .btn-primary:hover {
        background-color: #732d91;
    }

    a {
        color: #8e44ad;
    }
</style>

<div class="register-container">
    <div class="brand">ResepKos</div>
    <div class="tagline">Daftar di Sini!</div>

    <div class="card">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name">Nama</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Alamat Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm">Konfirmasi Kata Sandi</label>
                <input id="password-confirm" type="password"
                       class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Daftar</button>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</div>
@endsection