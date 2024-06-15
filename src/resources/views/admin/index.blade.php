@extends('layouts.app')

@section('content')
<div class="container">
  <h1>管理者ダッシュボード</h1>
  <ul>
    <li><a href="{{ route('admin.users') }}">ユーザー管理</a></li>
    <li><a href="{{ route('admin.items') }}">商品管理</a></li>
    <li><a href="{{ route('admin.payments') }}">支払い管理</a></li>
    <li><a href="{{ route('admin.emailForm') }}" class="btn btn-primary">メール送信フォーム</a></li>
  </ul>
</div>
@endsection