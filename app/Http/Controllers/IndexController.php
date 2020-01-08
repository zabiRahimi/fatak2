<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Post;
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
  public function __construct(Request $request)
  {
    //این مقادیر موقتی هستند ، جهت پر شدن خودکار پست بعد از این که برنامه بر روی سرور قرار گرفت پس از اولین اجرا باید این مقادیر کمنت شوند
    $checkPost=Post::get();
    if(empty($checkPost[0]->id)){
      for ($i=1; $i <7 ; $i++) {
        switch ($i) {
          case '1':$stamp='sefarshi';$javar='هم استان';
          $g500=1000;$g1000=2000;$g2000=3000;$g3000=null;$g4000=null;$g5000=null;$g6000=null;$g7000=null;$g8000=null;$g9000=null;$g10000=null;$g11000=null;$g12000=null;$g13000=null;$g14000=null;$g15000=null;$g16000=null;$g17000=null;$g18000=null;$g19000=null;$g20000=null;$g21000=null;$g22000=null;$g23000=null;$g24000=null;$g25000=null;$g26000=null;$g27000=null;$g28000=null;$g29000=null;$g30000=null;$g31000=null;$g32000=null;$g33000=null;$g34000=null;$g35000=null;$g36000=null;$g37000=null;$g38000=null;$g39000=null;$g40000=null;break;
          case '2':$stamp='sefarshi';$javar='غیر استان';$g500=2500;$g1000=3500;$g2000=4500;$g3000=null;$g4000=null;$g5000=null;$g6000=null;$g7000=null;$g8000=null;$g9000=null;$g10000=null;$g11000=null;$g12000=null;$g13000=null;$g14000=null;$g15000=null;$g16000=null;$g17000=null;$g18000=null;$g19000=null;$g20000=null;$g21000=null;$g22000=null;$g23000=null;$g24000=null;$g25000=null;$g26000=null;$g27000=null;$g28000=null;$g29000=null;$g30000=null;$g31000=null;$g32000=null;$g33000=null;$g34000=null;$g35000=null;$g36000=null;$g37000=null;$g38000=null;$g39000=null;$g40000=null;break;

          case '3':$stamp='amanat';$javar='هم استان';$g500=null;$g1000=null;$g2000=null;$g3000=null;$g4000=null;$g5000=null;$g6000=8000;$g7000=9000;
          $g8000=9700;$g9000=10700;$g10000=111500;$g11000=12300;$g12000=13200;$g13000=14100;$g14000=15000;$g15000=15800;$g16000=16700;$g17000=17600;$g18000=18500;$g19000=19400;$g20000=20200;$g21000=21000;$g22000=21900;
          $g23000=22900;$g24000=23700;$g25000=24600;$g26000=25500;$g27000=26300;$g28000=27200;$g29000=28000;$g30000=28900;$g31000=30000;$g32000=30700;$g33000=31500;$g34000=32500;$g35000=33500;$g36000=34500;$g37000=35000;
          $g38000=36000;$g39000=36800;$g40000=37700;break;
          case '4':$stamp='amanat';$javar='غیر استان';$g500=null;$g1000=null;$g2000=null;$g3000=null;$g4000=null;$g5000=9800;$g6000=10700;$g7000=11500;$g8000=12500;
          $g9000=13300;$g10000=14200;$g11000=15000;$g12000=16000;$g13000=16800;$g14000=17700;$g15000=18500;$g16000=19500;$g17000=20300;$g18000=21100;$g19000=22000;$g20000=23000;$g21000=23800;$g22000=24600;$g23000=25500;
          $g24000=26500;$g25000=27500;$g26000=28100;$g27000=29000;$g28000=29900;$g29000=31000;$g30000=31600;$g31000=32500;$g32000=33500;$g33000=34200;$g34000=35100;$g35000=36000;$g36000=36900;$g37000=37800;$g38000=38700;
          $g39000=40000;$g40000=40500;break;
          case '5':$stamp='pishtaz';$javar='هم استان';$g500=6200;$g1000=7900;$g2000=10100;$g3000=12500;$g4000=14800;$g5000=17000;$g6000=19500;$g7000=21700;$g8000=24000;$g9000=null;$g10000=null;$g11000=null;$g12000=null;$g13000=null;$g14000=null;$g15000=null;$g16000=null;$g17000=null;$g18000=null;$g19000=null;$g20000=null;$g21000=null;$g22000=null;$g23000=null;$g24000=null;$g25000=null;$g26000=null;$g27000=null;$g28000=null;$g29000=null;$g30000=null;$g31000=null;$g32000=null;$g33000=null;$g34000=null;$g35000=null;$g36000=null;$g37000=null;$g38000=null;$g39000=null;$g40000=null;break;
          case '6':$stamp='pishtaz';$javar='غیر استان';$g500=7500;$g1000=9500;$g2000=12200;$g3000=14500;$g4000=16800;$g5000=19200;$g6000=21500;$g7000=24800;$g8000=26000;$g9000=null;$g10000=null;$g11000=null;$g12000=null;$g13000=null;$g14000=null;$g15000=null;$g16000=null;$g17000=null;$g18000=null;$g19000=null;$g20000=null;$g21000=null;$g22000=null;$g23000=null;$g24000=null;$g25000=null;$g26000=null;$g27000=null;$g28000=null;$g29000=null;$g30000=null;$g31000=null;$g32000=null;$g33000=null;$g34000=null;$g35000=null;$g36000=null;$g37000=null;$g38000=null;$g39000=null;$g40000=null;break;
        }
        $save=new Post();
        $save->stamp=$stamp;
        $save->javar=$javar;
        $save->g500=$g500;$save->g1000=$g1000;$save->g2000=$g2000;$save->g3000=$g3000;$save->g4000=$g4000;$save->g5000=$g5000;$save->g6000=$g6000;$save->g7000=$g7000;$save->g8000=$g8000;$save->g9000=$g9000;$save->g10000=$g10000;$save->g11000=$g11000;$save->g12000=$g12000;
        $save->g13000=$g13000;$save->g14000=$g14000;$save->g15000=$g15000;$save->g16000=$g16000;$save->g17000=$g17000;$save->g18000=$g18000;$save->g19000=$g19000;$save->g20000=$g20000;$save->g21000=$g21000;$save->g22000=$g22000;$save->g23000=$g23000;$save->g24000=$g24000;$save->g25000=$g25000;
        $save->g26000=$g26000;$save->g27000=$g27000;$save->g28000=$g28000;$save->g29000=$g29000;$save->g30000=$g30000;$save->g31000=$g31000;$save->g32000=$g32000;$save->g33000=$g33000;$save->g34000=$g34000;$save->g35000=$g35000;$save->g36000=$g36000;$save->g37000=$g37000;$save->g38000=$g38000;
        $save->g39000=$g39000;$save->g40000=$g40000;
        $save->save();
      }
    }
  }
    public function show(Request $request){
      $ch=$request->ch;
      $pro=Pro::where('show' , 1)->where('typePro' , 'ثابت')->get();
      $pro_pic=PicturePro::get();
      $pro_nazar=NazarPro::get();
      $count=Pro::where('show' , 1)->count();
      $check=$request->cookie('check_log');
      if(!empty($request->cookie('numProSabad'))){$arraySabad=unserialize($request->cookie('numProSabad'));$numProSabad=$arraySabad['numPro'];}else{$numProSabad=0;}
      return view('welcome', compact('ch','pro' , 'pro_pic', 'pro_nazar' , 'count' , 'numProSabad','check'  ));
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
      $dateD1=$date1->yesterday()->format('Y/n/j');
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
        Cookie::queue('ch_buy',$channel_id,0);
      }
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
