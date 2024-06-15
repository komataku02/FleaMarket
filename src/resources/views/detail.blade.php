@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
@endsection

@section('content')
<div class="container">
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @elseif (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif

  <div class="card mb-3">
    <div class="card-header">
      {{ $item->name }}
    </div>
    <div class="card-body">
      <p>商品説明: {{ $item->description }}</p>
      <p>価格: {{ $item->price }}円</p>
      <p>カテゴリー: {{ $item->category }}</p>
      <p>商品の状態: {{ $item->condition }}</p>
      <form action="{{ route('cart.add', $item->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">カートに入れる</button>
      </form>

      @auth
      @php
      $isFavorited = Auth::user()->favorites()->where('item_id', $item->id)->exists();
      @endphp
      @if ($isFavorited)
      <form action="{{ route('items.unfavorite', $item->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">お気に入りから削除する</button>
      </form>
      @else
      <form action="{{ route('items.favorite', $item->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-primary">お気に入りに追加する</button>
      </form>
      @endif
      @endauth
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-header">コメント</div>
    <div class="card-body">
      <div class="chat-box" style="max-height: 300px; overflow-y: scroll;">
        @foreach($item->comments as $comment)
        <div class="mb-2 d-flex align-items-center">
          @if ($comment->user->profile && $comment->user->profile->profile_image_path)
          <img src="{{ Storage::url($comment->user->profile->profile_image_path) }}" alt="プロフィール画像" class="mr-2" style="width: 24px; height: 24px; border-radius: 50%;">
          @endif
          <strong>{{ $comment->user->name }}</strong> {{ $comment->comment }}

          @if(Auth::id() === $comment->user_id)
          <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ml-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">削除</button>
          </form>
          @endif
        </div>
        @endforeach
      </div>

      @auth
      <form action="{{ route('comments.store', $item->id) }}" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
          <p>商品へのコメント</p>
          <textarea name="comment" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">コメント送信</button>
      </form>
      @endauth

      @guest
      <p>コメントするには<a href="{{ route('login') }}">ログイン</a>が必要です。</p>
      @endguest
    </div>
  </div>
</div>
@endsection