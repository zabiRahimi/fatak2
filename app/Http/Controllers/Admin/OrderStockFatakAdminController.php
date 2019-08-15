<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
use Cookie;
use DB;
use App\Models\Admin\Management;
use App\Models\Channel;
use App\Models\Ch_view;//بازدیدها و خریدهای شبکه
use App\Models\Income;
use App\Models\Buy;
use App\Models\Shop;
use App\Models\Pro;
use App\Http\Requests\Save_editDaChSave;
use App\Http\Requests\SaveEdit2_ChannelAdmin;
use App\Http\Requests\Save_modirEditPas_admin;
class OrderStockFatakAdminController extends Controller
{
  public $id ,$nameModir,$access,$orderNewCount,$orderAgdamCount,$orderPostCount,$orderDeliverCount,$orderbackCount,$orderbackEndCount;
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
    $this->orderNewCount=Buy::where('stage',2)->count();//سفارشات جدید
    $this->orderAgdamCount=Buy::where('stage',3)->count();//در دست اقدام
    $this->orderPostCount=Buy::where('stage',4)->count();//ارسال شده
    $this->orderDeliverCount=Buy::where('stage',5)->count();//تحویل گرفته شده
    $this->orderbackCount=Buy::where('stage',6)->count();//مرجوعی
    $this->orderbackEndCount=Buy::where('stage',7)->count();//مرجوعی تسویه شده
    return $next($request);
      });
      }
  }
  public function show(Request $request){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.order_proStockFatak.order_proStockFatak' , compact('id','nameModir','access'));
  }
  public function orderNewPStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',2)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    return view('management.order_proStockFatak.orderNewPStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

  }
  public function orderBuyOne(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $id_buy=$request->id_buy;
    $buy=Buy::find($id_buy);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    return view('management.pro_admin.orderBuyOne', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
}
