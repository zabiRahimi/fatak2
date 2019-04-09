<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\Shekait;
use App\Http\Requests\Save_sabt_shekait;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
class IndexController extends Controller
{
    public function show(Request $request){
      $pro=Pro::where('show' , 1)->get();
      $pro_pic=PicturePro::get();
      $pro_nazar=NazarPro::get();
      $count=Pro::where('show' , 1)->count();
      $check=$request->cookie('check_log');
      if(!empty($request->cookie('numpro'))){$num_pro=$request->cookie('numpro');}else{$num_pro=0;}
      return view('welcome', compact('pro' , 'pro_pic', 'pro_nazar' , 'count' , 'num_pro','check'  ));
    }
    public function show_ajax(Request $request){
      if(empty($request->page)){$page=1;}else{$page=$request->page;}
      $take=3;
      $num=$request->page*$take-$take;
      $pro=Pro::where('show' , 1)->orderBy('id', 'desc')->skip($num)->take($take)->get();
      $count=Pro::where('show' , 1)->count();
      return view('pro_ajax', compact('pro','count','page','take'));
    }
    public function sabt_shekait(Save_sabt_shekait $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $add=new Shekait();
      $add->name=$request->name;
      $add->mobail=$request->mobail;
      $add->email=$request->email;
      $add->shekait=$request->shekait;
      $add->date=$date;
      $add->show=1;
      $add-> save();
    }
}
