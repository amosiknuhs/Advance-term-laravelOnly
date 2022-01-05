<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
  public function mypage()
  {
    $reserves = Reserve::where('user_id', Auth::id())->get();
    $favorites = Favorite::where('user_id', Auth::id())->get();
    return view('mypage', ['reserves' => $reserves, 'favorites' => $favorites]);
  }
}
