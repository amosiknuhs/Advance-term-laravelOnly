<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  protected $fillable = [
    'user_id',
    'shop_id',
    'created_at',
    'updated_at',
  ];

  public function shop()
  {
    return $this->belongsTo('App\Models\Shop');
  }
}
