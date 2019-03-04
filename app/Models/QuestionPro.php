<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPro extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
  public function pro()
    {
        return $this->belongsTo('App\Models\Pro');
    }
  public function answerpro()
   {
       return $this->hasMany('App\Models\AnswerPro');
   }
}
