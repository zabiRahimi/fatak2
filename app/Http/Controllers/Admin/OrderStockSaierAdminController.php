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
use App\Models\Admin\BackPro;

use App\Http\Requests\Save_editDaChSave;
use App\Http\Requests\SaveEdit2_ChannelAdmin;
use App\Http\Requests\Save_modirEditPas_admin;
use App\Http\Requests\SaveCodeOrderAdmin;
use App\Http\Requests\SaveRahgiryCodeAd;
use App\Http\Requests\SaveEditRahgiryCodeAd;
use App\Http\Requests\SaveEditStageOrderAdmin;
use App\Http\Requests\SaveOrderBackSave;
use App\Http\Requests\SaveOrderBackEdit;

class OrderStockSaierAdminController extends Controller
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
      $this->orderNewCount=Buy::where('stage',2)->where('shop_id' , '!=' , 1)->count();//سفارشات جدید
      $this->orderAgdamCount=Buy::where('stage',3)->where('shop_id' , '!=' , 1)->count();//در دست اقدام
      $this->orderPostCount=Buy::where('stage',4)->where('shop_id' , '!=' , 1)->count();//ارسال شده
      $this->orderDeliverCount=Buy::where('stage',5)->where('shop_id' , '!=' , 1)->count();//تحویل گرفته شده
      $this->orderbackCount=Buy::where('stage',6)->where('shop_id' , '!=' , 1)->count();//مرجوعی
      $this->orderbackEndCount=Buy::where('stage',7)->where('shop_id' , '!=' , 1)->count();//مرجوعی تسویه شده
      return $next($request);
        });
        }
    }
    public function show(Request $request){
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;

      // $show_img=Imgpro::where('show' , 1)->get();
      return view('management.order_proStockSaier.order_proStockSaier' , compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount'));
    }
    public function orderNewPStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy=Buy::where('stage',2)->where('shop_id' , '!=', 1)->get();
      $pro=Pro::get();
      $shop=Shop::get();
      return view('management.order_proStockSaier.orderNewPStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

    }
    public function orderOneNewPStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy_id=$request->buy_id;
      $buy=Buy::find($buy_id);
      $pro=Pro::find($buy->pro_id);
      $shop=Shop::find($buy->shop_id);
      return view('management.order_proStockSaier.orderOneNewPStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
    }
    public function showShopProStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $page=$request->page;
      $shop_id=$request->shop_id;
      $shop=Shop::find($shop_id);
      return view('management.order_proStockSaier.showShopProStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','shop','page'));
    }
    // public function delBuyOrderNSS(Request $request)
    // {
    //   $buy_id=$request->buy_id;
    //   $del=Buy::find($buy_id);
    //   $del->delete();
    // }
    // محصولات در دست اقدام
    public function proceedOrderStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy=Buy::where('stage',3)->where('shop_id' , '!=' , 1)->get();
      $pro=Pro::get();
      $shop=Shop::get();

      return view('management.order_proStockSaier.proceedOrderStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

    }
    public function proceedOrderOneStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy_id=$request->buy_id;
      $buy=Buy::find($buy_id);
      $pro=Pro::find($buy->pro_id);
      $shop=Shop::find($buy->shop_id);
      return view('management.order_proStockSaier.proceedOrderOneStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
    }
    public function backOrderNSS(Request $request)
    {
      $buy_id=$request->buy_id;
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=Buy::find($buy_id);
      $save->stage=2;
      $save->date_up=$date;
      $save->save();
    }
    public function orderErsalShowAllStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy=Buy::where('stage',4)->where('shop_id' , '!=' , 1)->get();
      $pro=Pro::get();
      $shop=Shop::get();
      return view('management.order_proStockSaier.orderErsalShowAllStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
    }
    public function orderErsalShowOneStockS(Request $request)
    {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $buy_id=$request->buy_id;
      $buy=Buy::find($buy_id);
      $pro=Pro::find($buy->pro_id);
      $shop=Shop::find($buy->shop_id);
      return view('management.order_proStockSaier.orderErsalShowOneStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
    }
    public function editStageOrderNSS(SaveEditStageOrderAdmin $request)
    {
      $buy_id=$request->buy_id;
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=Buy::find($buy_id);
      $save->date_up=$date;
      $save->code_rahgiry=$request->code_rahgiry;
      $save->date_post=$request->date_post;
      $save->stage=$request->stage;
      $save->save();
    }
    public function orderSabtEndStockS(Request $request){
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
        elseif($buy->stage==3){
          //در دست اقدام
          return response()->json(['errors' => ['orderAghdam' => [ ]]],422 );
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
      return view('management.order_proStockSaier.orderSabtEndStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
    }
  public function orderSabtEndShowAllStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',5)->where('shop_id' , '!=' , 1)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    return view('management.order_proStockSaier.orderSabtEndShowAllStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
  public function orderSabtEndShowOneStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    return view('management.order_proStockSaier.orderSabtEndShowOneStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
  }
  // ثبت سفارش مرجوعی
  public function orderBackSabtStockS(Request $request)
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
      elseif($buy->stage==3){
        //در دست اقدام
        return response()->json(['errors' => ['orderAghdam' => [ ]]],422 );
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
    return view('management.order_proStockSaier.orderBackSabtStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
  }
  public function orderBackSaveStockS(SaveOrderBackSave $request)
  {
    $buy_id=$request->buy_id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=new BackPro();
    $add->buy_id=$buy_id;
    $add->pro_id=$request->pro_id;
    $add->shop_id=$request->shop_id;
    $add->code_rahgiry=$request->code_rahgiry;
    $add->date_post=$request->date_post;
    $add->price_post=$request->price_post;
    $add->buyer_dis=$request->buyer_dis;
    $add->technician_dis=$request->technician_dis;
    $add->pay_buyer=$request->pay_buyer;
    $add->date_ad=$date;
    $add->date_up=$date;
    $add->stage=1;
    $add->show=1;
    $add->save();
    $add2=Buy::find($buy_id);
    $add2->backPro_id=$add->id;
    $add2->date_up=$date;
    $add2->stage=6;
    $add2->save();

  }
  public function orderBackShowAllStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',6)->where('shop_id' , '!=' , 1)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    $backPro=BackPro::get();
    return view('management.order_proStockSaier.orderBackShowAllStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop','backPro'));
  }
  public function orderBackShowOneStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    $backPro=BackPro::find($buy->backPro_id);
    return view('management.order_proStockSaier.orderBackShowOneStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop','backPro'));
  }
  // ویرایش اطلاعات سفارش مرجوعی
  public function orderBackEditStockS(SaveOrderBackEdit $request)
  {
    $backPro_id=$request->backPro_id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=BackPro::find($backPro_id);
    $add->code_rahgiry=$request->code_rahgiry;
    $add->date_post=$request->date_post;
    $add->price_post=$request->price_post;
    $add->buyer_dis=$request->buyer_dis;
    $add->technician_dis=$request->technician_dis;
    $add->pay_buyer=$request->pay_buyer;
    $add->date_up=$date;
    $add->save();
  }
  public function delOrderBackStockS(Request $request)
  {
    if ($request->backPro_id) {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $del=BackPro::find($request->backPro_id);
      $del->delete();
      if($request->delBuy!='ok'){
      $edit=Buy::find($request->buy_id);
      $edit->backPro_id=NULL;
      $edit->date_up=$date;
      $edit->stage=4;
      $edit->save();
      }else{
      $edit=Buy::find($request->buy_id);
      $edit->delete();
     }
    }
  }
  public function orderBackEndShowAllStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy=Buy::where('stage',7)->where('shop_id' , '!=' , 1)->get();
    $pro=Pro::get();
    $shop=Shop::get();
    $backPro=BackPro::get();
    return view('management.order_proStockSaier.orderBackEndShowAllStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop','backPro'));
  }
  public function orderBackEndShowOneStockS(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buy=Buy::find($buy_id);
    $pro=Pro::find($buy->pro_id);
    $shop=Shop::find($buy->shop_id);
    $backPro=BackPro::find($buy->backPro_id);
    return view('management.order_proStockSaier.orderBackEndShowOneStockS', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop','backPro'));
  }
}// end class
