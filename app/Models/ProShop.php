<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProShop extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
  public function picture_shop()
    {
        return $this->hasOne('App\Models\Picture_shop');
    }
}
