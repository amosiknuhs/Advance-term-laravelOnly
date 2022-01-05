@extends('layouts.search')
<style>
  .content {
    display: flex;
    flex-wrap: wrap;
    justify-content: start;
    gap: 40px 40px;
  }

  .card {
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
    display: inline-block;
    border: none;
    background-color: #2f60ff;
    color: #ffffff;
    padding: 7px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

  .unfavorite {
    display: inline-block;
    padding: 0;
    border: none;
    background: transparent;
    cursor: pointer;
    width: 35px;
    background-image: url("{{ asset('img/heart1.svg') }}");
    background-repeat: no-repeat;
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
@section('title', '飲食店一覧')

@section('content')
  @foreach ($shops as $shop)
    <form method="POST">
      @csrf
      <div class="card">
        <div class="card-img">
          <img src="{{ $shop->img_url }}" alt="">
        </div>
        <div class="card-content">
          <p class="shop-name">{{ $shop->name }}</p>
          <div class="tag">
            <span class="area-tag">#{{ $shop->area->getAreaName() }}</span>
            <span class="genre-tag">#{{ $shop->genre->getGenreName() }}</span>
          </div>
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="hidden" name="shop_id" value="{{ $shop->id }}">
          <div class="card-footer">
            <button type="submit" class="detail" formaction="/detail/{{ $shop->id }}">詳しく見る</button>
            @if ($shop->favorites->isEmpty())
              <button type="submit" class="unfavorite" formaction="{{ route('favorite') }}"></button>
            @else
              <button type="submit" class="favorite" formaction="{{ route('unfavorite') }}" name="page" value="index"></button>
            @endif
          </div>
        </div>
      </div>
    </form>
  @endforeach
@endsection
