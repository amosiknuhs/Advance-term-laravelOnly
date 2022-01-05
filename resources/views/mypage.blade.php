@extends('layouts.header')
<style>
  .user-name {
    font-size: 30px;
    font-weight: bold;
  }

  .mypage-content {
    display: flex;
    gap: 0 8%;
    width: 100%;
  }

  /* ----------タイトル---------- */

  .mypage-title {
    display: flex;
    gap: 0 8%;
    width: 100%;
  }

  .reserve-title-container {
    width: 45%;
  }

  .favorite-title-container {
    width: 55%;
  }

  .reserve-title,
  .favorite-title {
    font-size: 25px;
    font-weight: bold;
    line-height: 100px;
  }

  .reserve-message,
  .favorite-message {
    margin-left: 30px;
    font-weight: bold;
  }

  /* ----------予約状況---------- */

  .reserve-content {
    height: 100%;
    width: 45%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px 0;
  }

  .reserve-card {
    height: 300px;
    width: 85%;
    background-color: #2f60ff;
    border-radius: 10px;
    overflow: hidden;
    padding: 30px;
    box-shadow: 2px 2px 4px gray;
  }

  .reserve-header {
    display: flex;
    justify-content: space-between;
    height: 70px;
  }

  .reserve-delete {
    padding: 0;
    border: none;
    background: transparent;
    cursor: pointer;
    height: 30px;
    width: 30px;
  }

  .reserve-name {
    color: #ffffff;
    font-size: 20px;
    line-height: 30px;
  }

  .reserve-name::before {
    content: "";
    background-image: url("{{ asset('img/clock.svg') }}");
    display: inline-block;
    height: 35px;
    width: 35px;
    vertical-align: middle;
    background-size: contain;
    margin-right: 50px;
  }

  .reserve-confirm table {
    color: #ffffff;
    width: 80%;
    height: 70%;
    text-align: left;
    font-size: 18px;
  }

  /* ----------お気に入り店舗---------- */

  .favorite-content {
    height: 100%;
    width: 55%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px 0;
  }

  .favorite-card {
    background-color: #ffffff;
    width: 370px;
    height: 340px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 2px 2px 4px gray;
  }

  .card-img {
    width: 100%;
    height: 50%;
  }

  .card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .card-content {
    padding: 20px;
  }

  .shop-name {
    margin: 5px 0;
    font-size: 22px;
    font-weight: bold;
  }

  .tag {
    margin: 10px 0;
    font-size: small;
  }

  .card-footer {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
  }

  .detail {
    border: none;
    background-color: #2f60ff;
    color: #ffffff;
    padding: 7px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

  .favorite {
    display: inline-block;
    padding: 0;
    border: none;
    background: transparent;
    cursor: pointer;
    width: 35px;
    background-image: url("{{ asset('img/heart2.svg') }}");
    background-repeat: no-repeat;
  }

</style>
@section('title', 'マイページ')

@section('content')
  <p class="user-name">{{ Auth::user()->name }}さん</p>
  <div class="mypage-title">
    <div class="reserve-title-container">
      <span class="reserve-title">予約状況</span>
      @if (session('reserve_delete'))
        <span class="reserve-message">{{ session('reserve_delete') }}</span>
      @endif
    </div>
    <div class="favorite-title-container">
      <span class="favorite-title">お気に入り店舗</span>
      @if (session('favorite_delete'))
        <span class="favorite-message">{{ session('favorite_delete') }}</span>
      @endif
    </div>
  </div>
  <div class="mypage-content">
    <div class="reserve-content">
      @foreach ($reserves as $reserve)
        <div class="reserve-card">
          <form action="{{ route('delete') }}" method="POST" class="reserve-header">
            @csrf
            <input type="hidden" name="id" value="{{ $reserve->id }}">
            <p class="reserve-name">予約{{ $reserve->id }}</p>
            <button type="submit" class="reserve-delete"><img src="{{ asset('img/delete.svg') }}" alt=""></button>
          </form>
          <div class="reserve-confirm">
            <table>
              <tr>
                <th>Shop</th>
                <td>{{ $reserve->shop->getShopName() }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ $reserve->date }}</td>
              </tr>
              <tr>
                <th>Time</th>
                <td>{{ $reserve->time->format('G:i') }}</td>
              </tr>
              <tr>
                <th>Number</th>
                <td>{{ $reserve->number }}</td>
              </tr>
            </table>
          </div>
        </div>
      @endforeach
    </div>
    <div class="favorite-content">
      @foreach ($favorites as $favorite)
        <form method="POST">
          @csrf
          <div class="favorite-card">
            <div class="card-img">
              <img src="{{ $favorite->shop->getShopImg() }}" alt="">
            </div>
            <div class="card-content">
              <p class="shop-name">{{ $favorite->shop->getShopName() }}</p>
              <div class="tag">
                <span class="area-tag">#{{ $favorite->shop->area->getAreaName() }}</span>
                <span class="genre-tag">#{{ $favorite->shop->genre->getGenreName() }}</span>
              </div>
              <input type="hidden" name="id" value="{{ $favorite->id }}">
              <div class="card-footer">
                <button type="submit" class="detail" formaction="/detail/{{ $favorite->shop_id }}">詳しく見る</button>
                <button type="submit" class="favorite" formaction="{{ route('unfavorite') }}" name="page" value="mypage"></button>
              </div>
            </div>
          </div>
        </form>
      @endforeach
    </div>
  </div>
@endsection
