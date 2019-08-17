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
use App\Http\Requests\SaveCodeOrderAdmin;
use App\Http\Requests\SaveRahgiryCodeAd;

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
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;

    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.order_proStockFatak.order_proStockFatak' , compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount'));
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
  public function orderOneNewPStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    return view('management.order_proStockFatak.orderOneNewPStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
  public function orderAghdamNSF(Request $request)
  {
    $buy_id=$request->buy_id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Buy::find($buy_id);
    $save->stage=3;
    $save->date_up=$date;
    $save->save();
  }
  public function delBuyOrderNSF(Request $request)
  {
    $buy_id=$request->buy_id;
    $del=Buy::find($buy_id);
    $del->delete();
  }
  // محصولات در دست اقدام
  public function proceedOrderStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',3)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    return view('management.order_proStockFatak.proceedOrderStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

  }
  public function proceedOneOrderStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    return view('management.order_proStockFatak.proceedOneOrderStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
  public function backOrderNSF(Request $request)
  {
    $buy_id=$request->buy_id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Buy::find($buy_id);
    $save->stage=2;
    $save->date_up=$date;
    $save->save();
  }
  //ثبت ارسالی ها
  public function orderErsalSabtStockF(SaveCodeOrderAdmin $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    if(!empty($request->buy_id)){
      $buy_id=$request->buy_id;
      $buy=Buy::find($buy_id);
      if (empty($buy->pro_id)) {
        return response()->json(['errors' => ['no_order' => [ ]]],422 );

      }elseif($buy->stage==2){
        //جدید
        return response()->json(['errors' => ['orderNew' => [ ]]],422 );
      }
      elseif($buy->stage==4){
        //ارسالی
        return response()->json(['errors' => ['ordersabt' => [ ]]],422 );
      }
      elseif($buy->stage==5){
        //تحویلی
        return response()->json(['errors' => ['orderEnd' => [ ]]],422 );
      }
      elseif($buy->stage==6){
        //مرجوعی
        return response()->json(['errors' => ['orderback' => [ ]]],422 );
      }
      elseif($buy->stage==7){
        //مرجوعی تسویه شده
        return response()->json(['errors' => ['orderbackEnd' => [ ]]],422 );
      }

      $pro=Pro::find($buy->pro_id);
      $shop=Shop::find($buy->shop_id);

    }
    return view('management.order_proStockFatak.orderErsalSabtStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
  }
  public function sabtCodeRahgiryNSF(SaveRahgiryCodeAd $request)
  {
    $buy_id=$request->buy_id;
    $code_rahgiry=$request->code_rahgiry;
    $datePost=$request->datePost;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Buy::find($buy_id);
    $save->date_up=$date;
    $save->code_rahgiry=$code_rahgiry;
    $save->date_post=$datePost;
    $save->stage=4;
    $save->save();
  }
  public function orderErsalShowAllStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',4)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    return view('management.order_proStockFatak.orderErsalShowAllStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
  public function orderErsalShowOneStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    return view('management.order_proStockFatak.orderErsalShowOneStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
}//end class
