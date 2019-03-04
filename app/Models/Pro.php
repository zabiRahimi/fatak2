<?php

namespace App\models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
  use Searchable;
  public $timestamps = false;
  protected $guarded = ['id'];
  public function picturepro()
    {
        return $this->hasOne('App\Models\PicturePro');
    }
  public function nazarpro()
     {
         return $this->hasMany('App\Models\NazarPro');
     }
  public function questionpro()
      {
          return $this->hasMany('App\Models\QuestionPro');
      }
}
