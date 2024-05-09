@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__alert">
  @if(session('message'))
  <div class="login__alert--success">
    {{ session('message') }}
  </div>
  @endif
</div>
<div class="container">
  <div class="login-top">
    <h1>ログイン</h1>
  </div>

  <div class="login-container">
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="login-form">
        <label for="email">メールアドレス</label>
        <input id="email" type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <div>{{ $message }}</div>
        @enderror
      </div>

      <div class="login-form">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password">
        @error('password')
        <div>{{ $message }}</div>
        @enderror
      </div>

      <button type="submit">ログイン</button>

      <div class="login-btm">
        <a href="/register">会員登録はこちら</a>
      </div>
    </form>
  </div>
</div>
@endsection