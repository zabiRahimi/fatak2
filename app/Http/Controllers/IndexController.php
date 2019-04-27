<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\Shekait;
use App\Models\Check_ip;
use App\Models\Ch_view;
use App\Http\Requests\Save_sabt_shekait;
use App\Http\Requests\Save_bazdidCh;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
class IndexController extends Controller
{
    public function show(Request $request){
      $ch=$request->ch;
      $pro=Pro::where('show' , 1)->get();
      $pro_pic=PicturePro::get();
      $pro_nazar=NazarPro::get();
      $count=Pro::where('show' , 1)->count();
      $check=$request->cookie('check_log');
      if(!empty($request->cookie('numpro'))){$num_pro=$request->cookie('numpro');}else{$num_pro=0;}
      return view('welcome', compact('ch','pro' , 'pro_pic', 'pro_nazar' , 'count' , 'num_pro','check'  ));
    }
    public function show_ajax(Request $request){
      if(empty($request->page)){$page=1;}else{$page=$request->page;}
      $take=3;
      $num=$request->page*$take-$take;
      $pro=Pro::where('show' , 1)->orderBy('id', 'desc')->skip($num)->take($take)->get();
      $count=Pro::where('show' , 1)->count();
      return view('pro_ajax', compact('pro','count','page','take'));
    }
    // ثبت بازدید از شبکه اجتماعی
    public function bazdidCh(Save_bazdidCh $request)
    {
      $ip=\Request::ip();
      $channel_id=$request->id;
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      //دیروز
      $dateD1=$date1->subDay()->format('Y/n/j');
      //پریروز
      $dateD2=$date1->subDays(2)->format('Y/n/j');
      $check_ip=Check_ip::where('ip',$ip)->where('date' , $date)->first();
      if(empty($check_ip)){
        $check_ip=Check_ip::where('ip',$ip)->where('date' , $dateD2)->first();
      }
      if(empty($check_ip)){
        $check_ip=Check_ip::where('ip',$ip)->where('date' , $dateD1)->first();
      }
      if(empty($request->cookie('ch')) && !$check_ip){

        $save_ch=new Ch_view();
        $save_ch->channel_id=$channel_id;
        $save_ch->date=$date;
        $save_ch->show=1;
        $save_ch->save();
        $save_ip=new Check_ip();
        $save_ip->channel_id=$channel_id;
        $save_ip->ip=$ip;
        $save_ip->date=$date;
        $save_ip->show=1;
        $save_ip->save();
        Cookie::queue('ch',$channel_id ,259200);
        Cookie::queue('ch_buy',$channel_id);

      }

      if(empty($request->cookie('ch_buy'))){return 'not';}
        else{return $request->cookie('ch');}

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
