<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\channel;
use Cookie;
use App\Http\Requests\Save_sabt_channel_1;
use App\Http\Requests\Save_login_channel;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;

class ChannelController extends Controller
{
    public function page_login(Request $request)
    {
      return view('channel.login_channel');
    }
    public function sabt_channel_1(Save_sabt_channel_1 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=new Channel();
      $save->name=$request->name;
      $save->mobail=$request->mobail;
      $save->email=$request->email;
      $save->pas=Hash::make($request->pas);
      $save->date_ad=$date;
      $save->date_up=$date;
      $save->show=1;
      $save->save();
    }
    public function login_channel(Save_login_channel $request ){
      $mobail=$request->mobail;
      $pas=$request->pas;
      $add=Channel::where('mobail',$mobail)->first();
      if(!empty($add)){
        if (Hash::check($pas, $add['pas']))
        {
          $id=$add['id'];
          Cookie::queue('check_log_channel', $id);
        }else{
          return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
        }
      }
        else{
          return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
        }
    }
    public function dashboard_channel(Request $request){
      $id=$request->cookie('check_log_channel');
      $user=Channel::find($id);
      return view('channel.dashboardCh' , compact('user'));
    }
    public function perfect_data(Request $request)
    {
      return view('channel.perfect_data');
    }
}
