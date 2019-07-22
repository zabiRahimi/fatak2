<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Encryption\Encrypter;

use App\Http\Controllers\Controller;
use App\Models\Admin\Management;

use App\Http\Requests\Save_login_manage;
use Cookie;
use DB;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
  public $stage;
  public $id;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    // $cookie=$request->cookie('checkLogManeg');
    // if(!empty($cookie)){
    // $this->middleware(function ($request, $next){
    // $id = $request->cookie('checkLogManeg');
    // $this->id=$id;
    // $user=Channel::find($id);
    // $this->stage=$user->stage;
    // return $next($request);
    //   });
    //   }
  }

  public function page_login(Request $request)
  {
    return view('management.page_login');
  }

  public function loginManage(Save_login_manage $request ){
    Cookie::queue('checkLogManeg', 12);//موقتی می باشد .
    // $nameKarbary=$request->nameKarbary;
    // $pas=$request->pas;
    // $add=Management::where('karbary',$nameKarbary)->first();
    // if(!empty($add)){
    //   if (Hash::check($pas, $add['pas']))
    //   {
    //     $id=$add['id'];
    //     Cookie::queue('check_log_channel', $id);
    //   }else{
    //     return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
    //   }
    // }
    //   else{
    //     return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
    //   }
  }
  public function logoutManeg(){
    Cookie::queue('checkLogManeg', '',time() - 3600);
    return redirect('/');
  }
    public function dashbordAdmin(Request $request){
      return view('management.dashbordAdmin');
    }
}
