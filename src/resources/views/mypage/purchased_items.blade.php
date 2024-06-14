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
      <p>ようこそ、{{ Auth::user()->name }}さん</p>
      <p><a href="{{ route('profile.edit') }}">プロフィールを編集</a></p>
    </div>
  </div>
  <ul class="tabs">
    <li><a href="{{ route('mypage.index') }}">出品した商品</a></li>
    <li class="active">購入した商品</li>
  </ul>
  <ul>
    @if($purchaseHistories->isEmpty())
    <p>購入履歴がありません。</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>商品名</th>
          <th>金額</th>
          <th>購入日</th>
          <th>支払い方法</th>
        </tr>
      </thead>
      <tbody>
        @foreach($purchaseHistories as $history)
        <tr>
          <td>{{ $history->item->name }}</td>
          <td>{{ $history->amount }}円</td>
          <td>{{ $history->created_at->format('Y-m-d H:i') }}</td>
          <td>{{ $history->payment_method }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </ul>
</div>
@endsection