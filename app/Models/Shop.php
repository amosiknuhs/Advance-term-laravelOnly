<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  public function area()
  {
    return $this->belongsTo('App\Models\Area');
  }

  public function genre()
  {
    return $this->belongsTo('App\Models\Genre');
  }

  public function favorites()
  {
    $user_id = Auth::id();
    return $this->hasMany('App\Models\Favorite')->where('user_id', $user_id);
  }

  public function getShopName()
  {
    return $this->name;
  }

  public function getShopImg()
  {
    return $this->img_url;
  }
}
