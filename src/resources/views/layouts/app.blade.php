<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        COACHTECH
      </a>

      <!-- ログイン、会員登録画面の場合のみ表示 -->
      @if (!request()->is('login') && !request()->is('register') && !Auth::check())
      <form action="{{ route('login') }}" method="GET">
        <input type="text" name="keyword" placeholder="なにかお探しですか？">
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">会員登録</a>
        <a href="{{ route('items.create')}}">出品する</a>
      </form>
      @endif

      <!-- ログインしている場合のみ表示 -->
      @auth
      <form action="{{ route('login') }}" method="GET">
        <input type="text" name="keyword" placeholder="なにかお探しですか？">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        <a href="">マイページ</a>
        <a href="{{ route('items.create')}}">出品する</a>
      </form>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @endauth
    </div>
  </header>
  <main>
    @yield('content')
  </main>
</body>

</html>