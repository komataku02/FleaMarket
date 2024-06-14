@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<div class="container">
  <h1>カート</h1>

  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if($carts->isEmpty())
  <p>カートに商品がありません。</p>
  @else
  <table class="table">
    <thead>
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>数量</th>
        <th>小計</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach($carts as $cart)
      <tr>
        <td>{{ $cart->item->name }}</td>
        <td>{{ $cart->item->price }}円</td>
        <td>{{ $cart->quantity }}</td>
        <td>{{ $cart->item->price * $cart->quantity }}円</td>
        <td>
          <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除</button>
          </form>
          <a href="{{ route('payment.show', ['itemId' => $cart->item->id, 'price' => $cart->item->price * $cart->quantity]) }}" class="btn btn-primary">購入</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-between">
    <a href="{{ route('home') }}" class="btn btn-primary">買い物を続ける</a>
  </div>
  @endif
</div>
@endsection