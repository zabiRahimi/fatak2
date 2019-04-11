<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\channel;
use Cookie;
use App\Http\Requests\Save_sabt_channel_1;
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
}
