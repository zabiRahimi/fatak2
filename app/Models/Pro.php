<?php

namespace App\models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
  // نکته دستور زیر بطور موقت کامنت شده که مربوط به الیگولیا می باشد باید آیدی و رمز عبور آلگولیا در فایل env اضافه شود
  // use Searchable;
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
