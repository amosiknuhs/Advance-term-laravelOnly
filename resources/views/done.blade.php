@extends('layouts.header')
<style>
  .content {
    display: flex;
    justify-content: center;
  }

  .done-message {
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

  .done-message p {
    font-size: 25px;
  }

  .done-message button {
    border: none;
    background-color: #2f60ff;
    color: #ffffff;
    padding: 7px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

</style>
@section('title', '予約完了')

@section('content')
  <div class="done-message">
    <p>ご予約ありがとうございます</p>
    <form action="{{ route('index') }}" method="GET">
      <button type="submit" name="action" value="back">HOMEへ戻る</button>
    </form>
  </div>

@endsection
