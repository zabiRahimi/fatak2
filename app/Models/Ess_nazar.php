<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ess_nazar extends Model
{
  public $timestamps = false;
  protected $guarded=['id' , 'essay_id'];
  public function essay()
    {
        return $this->belongsTo('App\Models\Essay');
    }
}
