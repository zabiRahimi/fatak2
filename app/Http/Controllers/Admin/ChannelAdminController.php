<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Cookie;
use DB;
use App\Models\Admin\Management;
use App\Models\Channel;


class ChannelAdminController extends Controller
{
  public $id ,$nameModir,$access;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    $cookie=$request->cookie('checkLogManeg');
    if(!empty($cookie)){
    $this->middleware(function ($request, $next){
    $id = $request->cookie('checkLogManeg');
    $this->id=$id;
    $user=Management::find($id);
    $this->nameModir=$user->name;
    $this->access=$user->access;

    return $next($request);
      });
      }
  }
  public function show(Request $request){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.channel_admin.channel_admin' , compact('id','nameModir','access'));
  }
  public function all_edit_channel(Request $request ){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $channel=Channel::get();
    return view('management.channel_admin.all_edit_channel', compact('id','nameModir','access','channel'));
  }
}//end class
