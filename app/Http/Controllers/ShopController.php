<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Shop;

class ShopController extends Controller
{
  public function index()
  {
    $shops = Shop::all();
    return view('index', ['shops' => $shops]);
  }

  public function search(Request $request)
  {
    unset($request['_token']);

    if ($request->area_id == null) {
      if ($request->genre_id == null) {
        // 全エリア・全ジャンルで検索
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")->get();
      } else {
        // 全エリア・ジャンル指定で検索
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")
          ->where('genre_id', $request->genre_id)
          ->get();
      }
    } else {
      if ($request->genre_id == null) {
        // エリア指定・全ジャンルで検索
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")
          ->where('area_id', $request->area_id)
          ->get();
      } else {
        // エリア・ジャンルどちらも指定して検索
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")
          ->where('area_id', $request->area_id)
          ->where('genre_id', $request->genre_id)
          ->get();
      }
    }
    return view('index', ['shops' => $shops]);
  }

  public function detail($shop_id)
  {
    $shop_detail = Shop::find($shop_id);
    return view('detail', ['shop_detail' => $shop_detail]);
  }
}
