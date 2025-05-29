@extends('layouts.app')

@section('content')
<div class="form-container" style="max-width: 600px;">
    <h2>Panelim</h2>
    <p>Merhaba, {{ Auth::user()->name }}!</p>
    <p>Bu sayfa sadece giriş yapmış kullanıcılar tarafından görülebilir.</p>
    <p>E-posta adresiniz: {{ Auth::user()->email }}</p>
</div>
@endsection