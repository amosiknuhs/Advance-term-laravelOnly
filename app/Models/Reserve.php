<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  protected $fillable = [
    'user_id',
    'shop_id',
    'date',
    'time',
    'number',
    'created_at',
    'updated_at',
  ];

  protected $dates = [
    'time'
  ];

  public function shop()
  {
    return $this->belongsTo('App\Models\Shop');
  }
}
