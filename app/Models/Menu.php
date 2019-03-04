<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $fillable = [
      'title', 'sub_menu', 'hast_sub_menu','show',
  ];
  public $timestamps = false;
}
