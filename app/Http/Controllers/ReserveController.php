<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class ReserveController extends Controller
{
  public function reserve(Request $request)
  {
    $reserve = $request->all();
    unset($reserve['_token']);
    Reserve::create($reserve);
    return redirect()->route('done');
  }

  public function done()
  {
    return view('done');
  }

  public function delete(Request $request)
  {
    Reserve::find($request->id)->delete();
    return back()->with('reserve_delete', '※予約を削除しました');
  }
}
