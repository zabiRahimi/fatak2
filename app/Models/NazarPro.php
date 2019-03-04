<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NazarPro extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
  public function pro()
    {
        return $this->belongsTo('App\Models\Pro');
    }
}
