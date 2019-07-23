<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use App\Models\Admin\Management;

use App\Http\Requests\Save_login_manage;
use Cookie;
use DB;
use Illuminate\Support\Facades\Hash;
class ModirAdminController extends Controller
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

  public function modiranAdmin(Request $request)
  {
    return view('management.modiranAdmin');
  }
  public function adModirManeg(Request $request)
  {
    return view('management.adModirManeg');
  }
  
}//end class
