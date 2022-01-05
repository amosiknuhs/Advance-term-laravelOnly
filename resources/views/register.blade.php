@extends('layouts.header')
<style>
  .content {
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .login-content {
    background-color: #ffffff;
    box-shadow: 2px 2px 4px gray;
    border-radius: 5px;
    width: 500px;
    height: 350px;
    overflow: hidden;
  }

  .login-title {
    height: 80px;
    background-color: #2f60ff;
    font-size: 25px;
    font-weight: bold;
    color: #ffffff;
    display: flex;
    align-items: center;
    padding-left: 30px;
  }

  .login-form {
    padding: 20px 40px;
  }

  .login-form input {
    width: 89%;
    height: 35px;
    margin-left: 10px;
    border: none;
    outline: 0;
    border-bottom: 1px solid #d1d5db;
  }

  .name-form::before {
    content: "";
    background-image: url("{{ asset('img/person.svg') }}");
    display: inline-block;
    height: 35px;
    width: 35px;
    vertical-align: middle;
    background-size: contain;
  }

  .email-form::before {
    content: "";
    background-image: url("{{ asset('img/email.svg') }}");
    display: inline-block;
    height: 35px;
    width: 35px;
    vertical-align: middle;
    background-size: contain;
  }

  .pass-form::before {
    content: "";
    background-image: url("{{ asset('img/lock.svg') }}");
    display: inline-block;
    height: 35px;
    width: 35px;
    vertical-align: middle;
    background-size: contain;
  }

  .login-form button {
    display: block;
    border: none;
    background-color: #2f60ff;
    color: #ffffff;
    padding: 7px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin: 15px 0 0 auto;
  }

  .name-error,
  .email-error,
  .pass-error {
    height: 20px;
  }

  .error-message {
    color: red;
    display: inline-block;
    padding-left: 50px;
  }

</style>
@section('title', '会員登録')

@section('content')
  <div class="login-content">
    <div class="login-title">
      <p>Register</p>
    </div>
    <div class="login-form">
      <form action="{{ route('create') }}" method="POST">
        @csrf
        <div class="name-form"><input type="text" name='name' id='name' placeholder="Username" value="{{ old('name') }}"></div>
        <div class="name-error">
          @error('name')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="email-form"><input type="text" name='email' id='email' placeholder="Email" value="{{ old('email') }}"></div>
        <div class="email-error">
          @error('email')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="pass-form"><input type="password" name='password' id='password' placeholder="Password"></div>
        <div class="pass-error">
          @error('password')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit">登録</button>
      </form>
    </div>
  </div>
@endsection
