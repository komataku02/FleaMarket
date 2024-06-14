@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">価格: {{ $price }}円</p>
      <p class="card-text">支払い方法:
        @if (session('payment_method'))
        @if (session('payment_method') == 'credit_card')
        クレジットカード
        @elseif (session('payment_method') == 'bank_transfer')
        口座振替
        @endif
        @else
        クレジットカード
        @endif
        <a href="{{ route('payment.method', ['itemId' => $item->id, 'price' => $price]) }}">変更する</a>
      </p>
      <p class="card-text">配送先:
        @if (session('address'))
        {{ session('address.postal_code') }}, {{ session('address.address') }}, {{ session('address.building_name') }}
        @else
        未設定
        @endif
        <a href="{{ route('address.edit', ['itemId' => $item->id, 'price' => $price]) }}">変更する</a>
      </p>
    </div>
  </div>

  <h3>注文確認</h3>
  <p>商品代金: {{ $price }}円</p>
  <p>支払金額: {{ $price }}円</p>
  <p>支払い方法:
    @if (session('payment_method'))
    @if (session('payment_method') == 'credit_card')
    クレジットカード
    @elseif (session('payment_method') == 'bank_transfer')
    口座振替
    @endif
    @else
    クレジットカード
    @endif
  </p>

  <form action="{{ route('payment.store', ['itemId' => $item->id]) }}" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="payment_method" value="{{ session('payment_method') ?? 'credit_card' }}">
    @if (!session('payment_method') || session('payment_method') == 'credit_card')
    <div id="credit-card-form" class="payment-method-form">
      <div class="form-group">
        <label for="card-element">カード情報</label>
        <div id="card-element" class="form-control">
          <!-- Stripe Element will be inserted here -->
        </div>
      </div>
      <div id="card-errors" role="alert" class="text-danger"></div>
    </div>
    @elseif (session('payment_method') == 'bank_transfer')
    <div id="bank-transfer-form" class="payment-method-form">
      <div class="form-group">
        <label for="bank-account-number">口座番号</label>
        <input type="text" id="bank-account-number" name="bank_account_number" class="form-control">
      </div>
      <div class="form-group">
        <label for="bank-routing-number">支店コード</label>
        <input type="text" id="bank-routing-number" name="bank_routing_number" class="form-control">
      </div>
    </div>
    @endif

    <button type="submit" class="mt-3 btn btn-primary">支払い</button>
  </form>
</div>

<!-- Stripe's JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const stripePublicKey = "{{ config('services.stripe.public') }}";
    const stripe = Stripe(stripePublicKey);
    const elements = stripe.elements();

    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    var card = elements.create('card', {
      style: style
    });
    card.mount('#card-element');

    card.on('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      var selectedPaymentMethod = "{{ session('payment_method') ?? 'credit_card' }}";
      if (selectedPaymentMethod === 'credit_card') {
        stripe.createToken(card).then(function(result) {
          if (result.error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            stripeTokenHandler(result.token);
          }
        });
      } else {
        form.submit();
      }
    });

    function stripeTokenHandler(token) {
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      form.submit();
    }
  });
</script>
@endsection