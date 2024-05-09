@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">

@endsection

@section('content')
<div class="container">
  <div class="card-header">{{ $item->name }}</div>

  <div class="card-body">
    <p>商品説明: {{ $item->description }}</p>
    <p>価格: {{ $item->price }}円</p>
    <p>カテゴリー: {{ $item->category }}</p>
    <p>商品の状態: {{ $item->condition }}</p>
    @auth
    <form action="{{ route('items.toggleFavorite', $item) }}" method="POST">
      @csrf
      <button type="submit">{{ $item->is_favorite ? 'お気に入り済み' : 'お気に入りに追加' }}</button>
    </form>
    @endauth
  </div>
</div>

@endsection