@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        height: 100vh;
        background: linear-gradient(135deg, #c084fc, #a78bfa);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .auth-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 400px;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .auth-header h1 {
        color: #6b21a8;
        margin-bottom: 5px;
    }

    .auth-header p {
        color: #4b5563;
        font-size: 14px;
    }

    .btn-purple {
        background-color: #9333ea;
        color: white;
        border: none;
    }

    .btn-purple:hover {
        background-color: #7e22ce;
    }
</style>

<div class="auth-card">
    <div class="auth-header">
        <h1>ResepKos</h1>
        <p>Temukan Resep Ala Anak Kos di Sini!</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <div class="d-grid mb-2">
            <button type="submit" class="btn btn-purple">Login</button>
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-purple-600" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
            <br>
            <a class="text-decoration-none text-purple-600" href="{{ route('register') }}">Belum punya akun? Daftar di sini</a>
        </div>
    </form>
</div>
@endsection