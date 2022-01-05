@extends('layouts.header')
<style>
  .search {
    margin: 0 0 0 auto;
  }

  .search-box {
    height: 55px;
    background-color: #ffffff;
    box-shadow: 2px 2px 4px gray;
    border-radius: 5px;
    overflow: hidden;
    margin-top: 30px;

  }

  .search-box>* {
    display: inline-block;
    border: none;
    outline: 0;
    font-size: 16px;
    vertical-align: middle;

  }

  .search-box select {
    width: 120px;
    height: 70%;
    padding-left: 10px;
  }

  .search-box select:nth-of-type(2) {
    border-left: 1px solid #dfdfdf;
  }

  .search-submit {
    background: transparent;
    cursor: pointer;
    height: 70%;
    width: 30px;
    border-left: 1px solid #dfdfdf;

  }

  .search-box input {
    width: 27vw;
    height: 100%;
  }

  button[name="submit"] {
    display: none;
  }

</style>
@section('search')
  <form class="search-box" action="{{ route('search') }}" method="GET">
    @csrf
    <select name="area_id" id="area_id">
      <option value="">All area</option>
      <option value="1">東京都</option>
      <option value="2">大阪府</option>
      <option value="3">福岡県</option>
    </select>
    <select name="genre_id" id="genre_id">
      <option value="">All genre</option>
      <option value="1">寿司</option>
      <option value="2">焼肉</option>
      <option value="3">居酒屋</option>
      <option value="4">イタリアン</option>
      <option value="5">ラーメン</option>
    </select>
    <button type="submit" class="search-submit"><img src="{{ asset('img/search.svg') }}" alt=""></button>
    <input type="text" name="name" id="name" placeholder="Search …">
  </form>
@endsection
