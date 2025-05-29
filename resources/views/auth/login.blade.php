@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Giriş Yap</h2>

    @if (session('status'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-posta</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Şifre</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" class="submit-button">
                Giriş Yap
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">
                Hesabınız yok mu? Kayıt Olun
            </a>
        </div>
    </form>
</div>
@endsection