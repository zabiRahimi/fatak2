<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
class IndexController extends Controller
{
    public function show(Request $request){


      $pro=Pro::where('show' , 1)->get();
      $pro_pic=PicturePro::get();
      $pro_nazar=NazarPro::get();
      $count=Pro::where('show' , 1)->count();

      return view('welcome', compact('pro' , 'pro_pic', 'pro_nazar' , 'count'   ));
    }
    public function show_card(Request $request){



      $pro=Pro::where('show' , 1)->get();

      $count=Pro::where('show' , 1)->count();
      return view('card', compact('pro' ,  'count' ));
    }
    public function show_ajax(Request $request){
      if(empty($request->page)){$page=1;}else{$page=$request->page;}
      $take=3;
      $num=$request->page*$take-$take;
      $pro=Pro::where('show' , 1)->orderBy('id', 'desc')->skip($num)->take($take)->get();
      $count=Pro::where('show' , 1)->count();
      return view('pro_ajax', compact('pro','count','page','take'));
    }
}
