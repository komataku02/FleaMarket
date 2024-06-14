@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('payment.updateMethod') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="payment-method">支払い方法</label>
      <div>
        <input type="radio" id="credit-card" name="payment_method" value="credit_card" {{ session('payment_method') == 'credit_card' ? 'checked' : '' }}>
        <label for="credit-card">クレジットカード</label>
      </div>
      <div>
        <input type="radio" id="bank-transfer" name="payment_method" value="bank_transfer" {{ session('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
        <label for="bank-transfer">銀行口座引き落とし</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
  </form>
</div>
@endsection