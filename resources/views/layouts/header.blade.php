<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>@yield('title')</title>
  <style>
    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }

    body {
      background-color: #f1f1f1;
      padding: 0 100px 50px 100px;
      margin: 0;
    }

    .header-title {
      color: #2f60ff;
      font-weight: bold;
      font-size: 30px;
      font-family: "Hiragino Sans", "ヒラギノ角ゴシック";
      display: block;
      height: 30px;
      position: relative;
      top: 36px;
      left: 15px;
    }

    /* ---------- モーダルウィンドウ部分 ---------- */

    .rese-header {
      display: flex;
      margin: 0 0 40px 0;
      height: 75px;
    }

    .header-nav {
      position: absolute;
      height: 100vh;
      width: 100%;
      left: -100%;
      background-color: #f1f1f1e0;
      transition: 0.5s;
      text-align: center;
      z-index: 1;
    }

    .header-nav ul {
      padding-top: 80px;
    }

    .header-nav ul li {
      list-style-type: none;
      margin-top: 50px;
    }

    .header-nav a {
      text-decoration: none;
      color: #2f60ff;
      font-size: 30px;
      font-weight: bold;
    }

    .menu {
      background-color: #2f60ff;
      border-radius: 5px;
      box-shadow: 2px 2px 4px gray;
      display: block;
      width: 40px;
      height: 40px;
      cursor: pointer;
      position: relative;
      top: 30px;
      z-index: 2;
    }

    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 2px;
      background-color: #ffffff;
      position: absolute;
      transition: 0.5s;
    }

    .menu__line--top {
      width: 30%;
      top: 10px;
      left: 10px;
    }

    .menu__line--middle {
      width: 50%;
      top: 19px;
      left: 10px;
    }

    .menu__line--bottom {
      width: 20%;
      bottom: 10px;
      left: 10px;
    }

    .menu.open span:nth-of-type(1) {
      width: 50%;
      top: 19px;
      transform: rotate(45deg);
    }

    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }

    .menu.open span:nth-of-type(3) {
      width: 50%;
      top: 19px;
      transform: rotate(-45deg);
    }

    .in {
      transform: translateX(100%);
    }

  </style>
</head>

<body>
  <div class="rese-header">
    <nav class="header-nav" id="header-nav">
      @if (Auth::check())
        <ul>
          <li>
            <form action="{{ route('index') }}" name="index" method="GET">
              @csrf
              <a href="javascript:index.submit()">HOME</a>
            </form>
          </li>
          <li>
            <form action="{{ route('logout') }}" name="logout" method="POST">
              @csrf
              <a href="javascript:logout.submit()">Logout</a>
            </form>
          </li>
          <li>
            <form action="{{ route('mypage') }}" name="mypage" method="GET">
              @csrf
              <a href="javascript:mypage.submit()">Mypage</a>
            </form>
          </li>
        </ul>
      @else
        <ul>
          <li>
            <form action="{{ route('index') }}" name="index" method="GET">
              @csrf
              <a href="javascript:index.submit()">HOME</a>
            </form>
          </li>
          <li>
            <form action="{{ route('register') }}" name="register" method="GET">
              @csrf
              <a href="javascript:register.submit()">Registration</a>
            </form>
          </li>
          <li>
            <form action="{{ route('showLogin') }}" name="showLogin" method="GET">
              @csrf
              <a href="javascript:showLogin.submit()">Login</a>
            </form>
          </li>
        </ul>
      @endif
    </nav>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <div class="header-title">Rese</div>
    <div class="search">
      @yield('search')
    </div>
  </div>
  <div class="content">
    @yield('content')
  </div>
</body>
<script>
  const menuLogo = document.getElementById("menu");
  const navBack = document.getElementById("header-nav");
  menuLogo.addEventListener('click', () => {
    menuLogo.classList.toggle('open');
    navBack.classList.toggle('in');
  });
  navBack.addEventListener('click', (e) => {
    if (e.target.tagName != "A") {
      menuLogo.classList.toggle('open');
      navBack.classList.toggle('in');
    }
  });
</script>

</html>
