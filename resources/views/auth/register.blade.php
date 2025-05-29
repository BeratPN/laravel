@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Kayıt Ol</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">İsim</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-posta</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Şifre</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Şifreyi Doğrula</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" class="submit-button">
                Kayıt Ol
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">
                Zaten hesabınız var mı? Giriş Yapın
            </a>
        </div>
    </form>
</div>
@endsection