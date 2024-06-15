@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<ul class="tabs">
  <li><a href="{{ route('home') }}">商品一覧</a></li>
  <li class="active">マイリスト</li>
</ul>


<div id="tab-content-favorites" class="tab-content">
  @if ($favorites)
  @if ($favorites->isEmpty())
  <p>お気に入りした商品はありません。</p>
  @else
  <ul>
    @foreach ($favorites as $favorite)
    <div class="item">
      <h2>{{ $favorite->item->name }}</h2>
      <p>価格: {{ $favorite->item->price }}円</p>
      <p>カテゴリ: {{ $favorite->item->category }}</p>
      <p>商品の状態: {{ $favorite->item->condition }}</p>
      <p>商品説明: {{ $favorite->item->description }}</p>
    </div>
    @endforeach
  </ul>
  @endif
  @endif
</div>
@endsection