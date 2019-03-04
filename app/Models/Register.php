<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;
class Register extends Model
{
  protected $fillable = [
      'name_karbary', 'pas', 'name','mobail','email','show','created_at','updated_at',
  ];
   public $timestamps = false;

}
