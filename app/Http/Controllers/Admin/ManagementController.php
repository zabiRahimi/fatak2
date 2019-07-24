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
  public $id ,$nameModir,$access ;
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

  public function page_login(Request $request)
  {
    return view('management.page_login');
  }

  public function loginManage(Save_login_manage $request ){
    $nameKarbary=$request->nameKarbary;
    $pas=$request->pas;
    $add=Management::where('karbary',$nameKarbary)->where('show', 1)->first();
    if(!empty($add)){
      if (Hash::check($pas, $add['pas']))
      {
        $id=$add['id'];
        Cookie::queue('checkLogManeg', $id);

      }else{
        return response()->json(['errors' => ['no_karbar' => ['اطلاعات اشتباه است .']]], 422);
      }
    }
      else{
        return response()->json(['errors' => ['no_karbar' => ['اطلاعات اشتباه است .']]], 422);
      }
  }
  public function logoutManeg(){
    Cookie::queue('checkLogManeg', '',time() - 3600);
    // return redirect('/');
    return redirect('/logoutManeg');
  }
  public function dashbordAdmin(Request $request){
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      return view('management.dashbordAdmin',compact('id','nameModir','access'));
    }
  public function adModirManegOne(Request $request)
  {
    return view('management.adModirManegOne');
  }

}//end class
