<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProShop;
use App\Http\Requests\Save_order1;
use App\Http\Requests\Save_mobail;
use App\Http\Requests\Save_searchOrderSave;


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
    // $cookie=$request->cookie('checkLogShop');
    // if(!empty($cookie)){
    // $this->middleware(function ($request, $next){
    // $id = $request->cookie('checkLogShop');
    // $this->id=$id;
    // $user=Shop::find($id);
    // $this->stage=$user->stage;
    // return $next($request);
    //   });
      // }
  }
    public function sabtOrder(Request $request)
    {
      return view('order.sabtOrder');
    }
    public function sabtOrderSave(Save_order1 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=new Order();
      $save->name=$request->namePro;
      $save->squad=$request->squad;
      $save->vahed=$request->vahedPro;
      $save->num=$request->numPro;
      $save->dis=$request->dis;
      $save->mobail=$request->mobail;
      $save->ostan=$request->ostan;
      $save->city=$request->city;
      $save->date_ad=$date;
      $save->date_up=$date;
      $save->stage=1;
      $save->show=1;
      $save->Save();
      return $save->id;
    }
    public function searchOrder(Request $request)
    {
      return view('order.searchOrder');
    }
    public function mobailSearchOrder(Save_mobail $request)
    {
      $mobail=$request->mobail;
      $pro=Order::where('mobail', $mobail)->get();
      if(empty($pro[0]->id)){
        return response()->json(['errors' => ['no_mobail' => ['با این شماره موبایل تا کنون محصولی سفارش داده نشده است ، لطفا شماره موبایلی که هنگام سفارش محصول ثبت کردید را وارد کنید .']]], 422);

      }

    return view('order.proList',compact('pro'));

    }
    public function searchOrderSave(Save_searchOrderSave $request)
    {
      $id=$request->id;
      return $id;
    }
    public function showOrder(Request $request)
    {
      $order_id=$request->order_id;
      $pro=ProShop::where('order_id' , $order_id)->get();
      return view('order.showOrder',compact('pro'));
    }
}
