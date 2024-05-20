@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('payment.store') }}" method="POST" id="payment-form">
    @csrf
    <!-- カード情報の入力欄 -->
    <div class="form-group">
      <label for="card-element">カード情報</label>
      <!-- ここにStripeのカードエレメントが挿入されます -->
      <div id="card-element" class="form-control">
        <!-- Stripe Elementが表示されます -->
      </div>
    </div>

    <!-- エラーメッセージ表示欄 -->
    <div id="card-errors" role="alert" class="text-danger"></div>

    <!-- 支払いボタン -->
    <button type="submit" class="mt-3 btn btn-primary">支払い</button>
  </form>
</div>

<!-- StripeのJavaScriptライブラリを読み込み -->
<script src="https://js.stripe.com/v3/"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Stripeの公開キーを設定
    const stripePublicKey = "{{ config('services.stripe.public') }}";
    console.log("Stripe Public Key:", stripePublicKey); // ここで公開キーをコンソールに出力
    const stripe = Stripe(stripePublicKey);
    const elements = stripe.elements();

    // カードエレメントのスタイル設定
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

    // カードエレメントのインスタンスを作成
    var card = elements.create('card', {
      style: style
    });

    // カードエレメントを`card-element` <div>に追加
    card.mount('#card-element');

    // カードエレメントのリアルタイム検証エラーを処理
    card.on('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // フォーム送信時の処理
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // エラーが発生した場合、エラーメッセージを表示
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // トークンをサーバーに送信
          stripeTokenHandler(result.token);
        }
      });
    });

    // フォームにStripeトークンを追加して送信
    function stripeTokenHandler(token) {
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // フォームを送信
      form.submit();
    }
  });
</script>
@endsection