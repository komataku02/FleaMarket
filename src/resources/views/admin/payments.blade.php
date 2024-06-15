@extends('layouts.app')

@section('content')
<div class="container">
  <h1>支払い管理</h1>
  <a class="back-btn" href="{{ route('admin.index') }}">
    back</a>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>ユーザーID</th>
        <th>商品ID</th>
        <th>支払い金額</th>
        <th>支払い方法</th>
        <th>購入日</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($payments as $payment)
      <tr>
        <td>{{ $payment->id }}</td>
        <td>{{ $payment->user_id }}</td>
        <td>{{ $payment->item_id }}</td>
        <td>{{ $payment->amount }}</td>
        <td>{{ $payment->payment_method }}</td>
        <td>{{ $payment->created_at }}</td>
        @endforeach
    </tbody>
  </table>
</div>
@endsection