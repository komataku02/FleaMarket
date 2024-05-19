@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
@endsection

@section('content')
<div class="category__alert">
  @if (session('message'))
  <div class="category__alert--success">
    {{ session('message') }}
  </div>
  @endif
  <div class="container">
    <div class="card-header">{{ $item->name }}</div>

    <div class="card-body">
      <p>商品説明: {{ $item->description }}</p>
      <p>価格: {{ $item->price }}円</p>
      <p>カテゴリー: {{ $item->category }}</p>
      <p>商品の状態: {{ $item->condition }}</p>
      @if ($item->favorites()->where('user_id', auth()->id())->exists())
      <form action="{{ route('items.unfavorite', $item->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn-unfavorite">お気に入り解除</button>
      </form>
      @else
      <form action="{{ route('items.favorite', $item->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn-favorite">お気に入り追加</button>
      </form>
      @endif

      <a href="{{ route('comments.show', $item->id) }}" class="btn-comment">コメントを見る</a>
    </div>
  </div>
</div>
@endsection