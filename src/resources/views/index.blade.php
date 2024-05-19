@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
<!-- タブ -->
<ul class="tabs">
  <li class="active">商品一覧</li>
  <li><a href="{{ route('favorites') }}">マイリスト</a></li>
</ul>

<!-- 商品一覧 -->
<div id="tab-content-all" class="tab-content">
  <ul>
    @foreach ($items as $item)
    <div class="item">
      <h2>{{ $item->name }}</h2>
      <p>価格: {{ $item->price }}円</p>
      <p>商品の状態: {{ $item->condition }}</p>
      <p>説明: {{ $item->description }}</p>
      <a href="{{ route('items.show', $item->id) }}">詳細を見る</a>
    </div>
    @endforeach
  </ul>
</div>
@endsection