@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h1>商品一覧</h1>
<ul>
  @foreach ($items as $item)
  <div class="item">
    <h2>{{ $item->name }}</h2>
    <p>価格: {{ $item->price }}円</p>
    <p>カテゴリ: {{ $item->category }}</p>
    <p>商品の状態: {{ $item->condition }}</p>
    <p>説明: {{ $item->description }}</p>
    <a href="{{ $item->detail_link }}">詳細を見る</a>
  </div>
  @endforeach
</ul>
@endsection