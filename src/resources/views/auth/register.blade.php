@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="register-top">
    <h1>会員登録</h1>
  </div>
  <div class="register-container">
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="register-form">
        <label for="name">ユーザー名</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <div>{{ $message }}</div>
        @enderror
      </div>

      <div class="register-form">
        <label for="email">メールアドレス</label>
        <input id="email" type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <div>{{ $message }}</div>
        @enderror
      </div>

      <div class="register-form">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password">
        @error('password')
        <div>{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="password-confirm">確認用パスワード</label>
        <input id="password-confirm" type="password" name="password_confirmation">
      </div>

      <button type="submit">登録</button>

      <div class="register-btm">
        <a href="/login">ログインはこちら</a>
      </div>

    </form>
  </div>
</div>
@endsection