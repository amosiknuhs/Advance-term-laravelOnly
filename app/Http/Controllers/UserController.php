<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function register()
  {
    return view('register');
  }

  public function create(RegisterRequest $request)
  {
    $password = Hash::make($request->get('password'));
    $request->merge(['password' => $password]);
    $user_data = $request->all();
    unset($user_data['_token']);
    User::create($user_data);
    return redirect()->route('thanks');
  }

  public function thanks()
  {
    return view('thanks');
  }
}
