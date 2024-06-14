@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>マイページ</h1>
      @if (optional(Auth::user()->profile)->profile_image_path)
      <img src="{{ Storage::url(Auth::user()->profile->profile_image_path) }}" alt="プロフィール画像" class="mr-3" width="50">
      @endif
      <p>ようこそ、{{ $user->name }}さん</p> <!-- ユーザー名を表示 -->
      <p><a href="{{ route('profile.edit') }}">プロフィールを編集</a></p> <!-- プロフィール編集のリンク -->
    </div>
  </div>
  <ul class="tabs">
    <li class="active">出品した商品</li>
    <li><a href="{{ route('mypage.purchased_items') }}">購入した商品</a></li>
  </ul>
  <ul>
    @foreach($items as $item)
    <li>{{ $item->name }} - 価格: {{ $item->price }}円
      <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-secondary">編集</a>
    </li>
    @endforeach
  </ul>
</div>
@endsection