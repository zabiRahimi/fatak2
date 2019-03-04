<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerPro extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];
  public function questionpro()
    {
        return $this->belongsTo('App\Models\QuestionPro');
    }
}
