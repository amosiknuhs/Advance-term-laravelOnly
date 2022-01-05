<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
  public function favorite(Request $request)
  {
    $favorite = $request->all();
    unset($favorite['_token']);
    Favorite::create($favorite);
    return back();
  }

  public function unfavorite(Request $request)
  {
    $page = $request->get('page');
    if ($page == 'index') {
      Favorite::where('user_id', $request->user_id)
        ->where('shop_id', $request->shop_id)
        ->delete();
      return back();
    } elseif ($page == 'mypage') {
      Favorite::find($request->id)->delete();
      return back()->with('favorite_delete', '※お気に入りを解除しました');
    }
  }
}
