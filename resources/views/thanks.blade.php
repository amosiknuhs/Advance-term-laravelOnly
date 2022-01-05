@extends('layouts.header')
<style>
  .content {
    display: flex;
    justify-content: center;
  }

  .thanks-message {
    background-color: #ffffff;
    box-shadow: 2px 2px 4px gray;
    border-radius: 5px;
    width: 500px;
    height: 350px;
    display: flex;
    align-items: center;
    flex-flow: column;
    justify-content: center;
    gap: 50px;
  }

  .thanks-message p {
    font-size: 25px;
  }

  .thanks-message button {
    border: none;
    background-color: #2f60ff;
    color: #ffffff;
    padding: 7px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

</style>
@section('title', '登録完了')

@section('content')
  <form class="thanks-message" action="{{ route('showLogin') }}" method="GET">
    <p>会員登録ありがとうございます</p>
    <button type="submit">ログインする</button>
  </form>

@endsection
