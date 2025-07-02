@extends('layouts.login')

@section('title', 'Login Toko Sembako')

@section('content')
<style>
    .login-wrapper {
        max-width: 450px;
        margin: 80px auto;
        background: #fff0f5;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(255, 105, 180, 0.2);
        animation: fadeIn 1s ease-in-out;
    }

    .login-wrapper h2 {
        text-align: center;
        color: #d63384;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-login {
        background-color: #ff69b4;
        border: none;
        width: 100%;
        padding: 10px;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        transition: background-color 0.3s;
    }

    .btn-login:hover {
        background-color: #d63384;
    }

    .login-error {
        background-color: #ffe0e6;
        color: #b02a52;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 15px;
        text-align: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="login-wrapper">
    <h2>🔐 Login Toko Sembako</h2>

    @if(session('error'))
        <div class="login-error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">👤 Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">🔑 Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-login mt-3">Masuk</button>
    </form>
</div>
@endsection
