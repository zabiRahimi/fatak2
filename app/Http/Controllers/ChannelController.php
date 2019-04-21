<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\channel;
use Cookie;
use Illuminate\Contracts\Encryption\Encrypter;
use App\Http\Requests\Save_sabt_channel_1;
use App\Http\Requests\Save_sabt_channel_2;
use App\Http\Requests\Save_login_channel;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;

class ChannelController extends Controller
{
    public $stage;
    public $id;
    public function __construct(Encrypter $encrypter ,Request $request)
    {
      $cookie=$request->cookie('check_log_channel');
      if(!empty($cookie)){
      $this->middleware(function ($request, $next){
      $id = $request->cookie('check_log_channel');
      $this->id=$id;
      $user=Channel::find($id);
      $this->stage=$user->stage;
      return $next($request);
        });
        }
    }

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
      $save->stage=1;
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
      $stage=$this->stage;
      return view('channel.dashboardCh' , compact('user','stage'));
    }
    public function perfect_data(Request $request)
    {
      $stage=$this->stage;
      return view('channel.perfect_data' , compact('stage'));
    }

    public function sabt_channel_2(Save_sabt_channel_2 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $id=$request->cookie('check_log_channel');
      $save=channel::find($id);
      $save->codemly=$request->codemly;
      $save->ostan=$request->ostan;
      $save->city=$request->city;
      $save->address=$request->address;
      // $save->codepost=$request->codepost;
      $save->accountNumber=$request->accountNumber;
      $save->cart=$request->cart;
      $save->master=$request->master;
      $save->bank=$request->bank;
      $save->date_up=$date;
      $save->stage=2;
      $save->save();
    }
    public function edit_data(Request $request)
    {
      $user=Channel::find($this->id);
      $stage=$this->stage;
      return view('channel.edit_data' , compact('stage' , 'user'));
    }
    public function warnCh(Request $request)
    {
      return view('channel.warnCh');
    }
    public function urlChMy(Request $request)
    {
      $stage=$this->stage;
      return view('channel.urlChMy', compact('stage'));
    }
    public function viewChMy(Request $request)
    {
      $stage=$this->stage;
      return view('channel.viewChMy', compact('stage'));
    }
    public function viewChAll(Request $request)
    {
      $stage=$this->stage;
      return view('channel.viewChAll', compact('stage'));
    }
    public function incomeChMy(Request $request)
    {
      $stage=$this->stage;
      return view('channel.incomeChMy', compact('stage'));
    }
    public function ghanonCh(Request $request)
    {
      return view('channel.ghanonCh');
    }
    public function rahnamaCh(Request $request)
    {
      return view('channel.rahnamaCh');
    }
}
