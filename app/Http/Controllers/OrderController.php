<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Save_editPasShop;
use Cookie;
use DB;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
class OrderController extends Controller
{
  public $stage;
  public $id;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    $cookie=$request->cookie('checkLogShop');
    if(!empty($cookie)){
    $this->middleware(function ($request, $next){
    $id = $request->cookie('checkLogShop');
    $this->id=$id;
    $user=Shop::find($id);
    $this->stage=$user->stage;
    return $next($request);
      });
      }
  }
    public function sabtOrder(Request $request)
    {
      return view('order.sabtOrder');
    }
}
