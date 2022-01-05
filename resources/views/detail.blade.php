@extends('layouts.header')
<style>
  .content {
    display: flex;
    gap: 0 8%;
    height: 80vh;
    width: 100%;
  }

  /* ----------shop---------- */

  .shop-detail {
    height: 100%;
    width: 50%;
  }

  .shop-name {
    margin: 30px 0;
    font-size: 30px;
    font-weight: bold;
  }

  .shop-img {
    width: 100%;
    height: 60%;
  }

  .shop-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .tag {
    margin: 30px 0;
  }

  .shop-content {
    font-size: 18px;
    line-height: 35px;
  }

  /* ----------reserve---------- */
  .reserve-form {
    height: 100%;
    width: 50%;
    background-color: #2f60ff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 2px 2px 4px gray;
  }

  .reserve-content {
    padding: 50px 40px;
    height: 92%;
  }

  .reserve-content>* {
    display: block;
    width: 50%;
    height: 40px;
    border: none;
    border-radius: 5px;
    margin-bottom: 20px
  }

  .form-title {
    font-size: 30px;
    font-weight: bold;
    color: #ffffff;
  }

  .reserve-confirm {
    height: 200px;
    width: 100%;
    background-color: #6f91ff;
    border-radius: 10px;
    padding: 20px 40px;
  }

  .reserve-confirm table {
    color: #ffffff;
    width: 50%;
    height: 100%;
    text-align: left;
  }

  .reserve-footer button {
    border: none;
    background-color: #003cff;
    color: #ffffff;
    height: 8%;
    width: 100%;
    cursor: pointer;
    font-size: 18px;
  }

</style>
@section('title', '店舗詳細')

@section('content')
  <div class="shop-detail">
    <p class="shop-name">{{ $shop_detail->name }}</p>
    <div class="shop-img">
      <img src="{{ $shop_detail->img_url }}" alt="">
    </div>
    <div class="tag">
      <span class="area-tag">#{{ $shop_detail->area->getAreaName() }}</span>
      <span class="genre-tag">#{{ $shop_detail->genre->getGenreName() }}</span>
    </div>
    <p class="shop-content">{{ $shop_detail->content }}</p>
  </div>
  <form class="reserve-form" action="{{ route('reserve') }}" method="POST">
    @csrf
    <div class="reserve-content">
      <p class="form-title">予約</p>
      <input type="date" name="date" id="date">
      <select name="time" id="time">
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
        <option value="20:00">20:00</option>
        <option value="21:00">21:00</option>
        <option value="22:00">22:00</option>
      </select>
      <select name="number" id="number">
        <option value="1">1人</option>
        <option value="2">2人</option>
        <option value="3">3人</option>
        <option value="4">4人</option>
        <option value="5">5人</option>
        <option value="6">6人</option>
        <option value="7">7人</option>
        <option value="8">8人</option>
        <option value="9">9人</option>
        <option value="10">10人</option>
      </select>
      <div class="reserve-confirm">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $shop_detail->name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td id="reserveDate"></td>
          </tr>
          <tr>
            <th>Time</th>
            <td id="reserveTime"></td>
          </tr>
          <tr>
            <th>Number</th>
            <td id="reserveNumber"></td>
          </tr>
        </table>
      </div>
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="hidden" name="shop_id" value="{{ $shop_detail->id }}">
    </div>
    <div class="reserve-footer">
      <button type="submit">予約する</button>
    </div>
  </form>
@endsection
<script>
  // 予約フォームの日付欄に今日の日付を初期値として表示
  window.onload = function() {
    var date = new Date()
    var year = date.getFullYear()
    var month = date.getMonth() + 1
    var day = date.getDate()

    var toTwoDigits = function(num, digit) {
      num += ''
      if (num.length < digit) {
        num = '0' + num
      }
      return num
    }

    var yyyy = toTwoDigits(year, 4)
    var mm = toTwoDigits(month, 2)
    var dd = toTwoDigits(day, 2)
    var ymd = yyyy + "-" + mm + "-" + dd;

    document.getElementById("date").value = ymd;

    // 予約フォームの入力値を確認フォームに出力
    var date = document.getElementById('date');
    var reserveDate = document.getElementById('reserveDate');
    reserveDate.textContent = date.value;
    date.addEventListener('change', () => {
      reserveDate.textContent = date.value;
    });

    var time = document.getElementById('time');
    var reserveTime = document.getElementById('reserveTime');
    reserveTime.textContent = time.value;
    time.addEventListener('change', () => {
      reserveTime.textContent = time.value;
    });

    var number = document.getElementById('number');
    var reserveNumber = document.getElementById('reserveNumber');
    reserveNumber.textContent = number.value + "人";
    number.addEventListener('change', () => {
      reserveNumber.textContent = number.value + "人";
    });
  }
</script>
