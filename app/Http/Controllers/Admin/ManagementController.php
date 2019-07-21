<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\Encrypter;

use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
  public $stage;
  public $id;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    $cookie=$request->cookie('checkLogManeg');
    if(!empty($cookie)){
    $this->middleware(function ($request, $next){
    $id = $request->cookie('checkLogManeg');
    $this->id=$id;
    $user=Channel::find($id);
    $this->stage=$user->stage;
    return $next($request);
      });
      }
  }

  public function page_login(Request $request)
  {
    return view('management.page_login');
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
  public function loginManage(Save_login_manage $request ){
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
  public function logoutManeg(){
    Cookie::queue('checkLogManeg', '',time() - 3600);
    return redirect('/');
  }
    public function show(Request $request){
      return view('management.admin');
    }
}
