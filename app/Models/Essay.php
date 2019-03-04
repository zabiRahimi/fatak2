<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
      use Searchable;
      public $timestamps = false;
//       protected $guarded=['id' , 'created_at'];
//       public function ess_seo_similar()
//     {
//         return $this->hasOne('App\Models\Ess_seo_similar');
//     }
//     public function ess_seo_tag()
//   {
//       return $this->hasOne('App\Models\Ess_seo_tag');
//   }
//   public function ess_nazar()
// {
//     return $this->hasMany('App\Models\Ess_nazar');
// }
}
