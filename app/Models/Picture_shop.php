<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture_shop extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
  public function proShop()
  {
      return $this->belongsTo('App\Models\ProShop');
  }
}
