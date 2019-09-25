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
use App\Models\Order;
use App\Models\Channel;
use App\Models\Ch_view;//بازدیدها و خریدهای شبکه
use App\Models\Income;
use App\Models\Buy;
use App\Models\BuyOrder;
use App\Models\Shop;
use App\Models\Pro;
use App\Models\ProShop;
use App\Models\Picture_shop;
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
use App\Http\Requests\Save_proShop;
use App\Http\Requests\Save_editProShop;
class OrderUnStockFatakAdminController extends Controller
{
  public $id ,$nameModir,$access,$orderNewCount,$orderSabtCount,$orderBuyCount,$orderAgdamCount,$orderPostCount,$orderDeliverCount,$orderbackCount,$orderbackEndCount;
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
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->formatJalaliDate();
    $date30=$dateA->subDay(30)->formatJalaliDate();
    $proShop=proShop::where('shop_id',1)->get();
    $order=Order::where('stage',1)->whereBetween('date_up', [$date30 , $dateB])->get();
    $orderNum=0;
    foreach ($order as $value) {
      $checkOrder=$proShop->where('order_id',$value->id)->first();
      if($checkOrder){continue;}
      $orderNum++;
    }
    $this->orderNewCount=$orderNum;
    $this->orderSabtCount=ProShop::where('shop_id',1)->where('stage' , 1)->count();//محصول ثبت شده
    $this->orderBuyCount=BuyOrder::where('shop_id' , 1)->where('stage',2)->count();//در دست اقدام
    $this->orderAgdamCount=Buy::where('stage',3)->where('shop_id' , 1)->count();//در دست اقدام
    $this->orderPostCount=Buy::where('stage',4)->where('shop_id' , 1)->count();//ارسال شده
    $this->orderDeliverCount=Buy::where('stage',5)->where('shop_id' , 1)->count();//تحویل گرفته شده
    $this->orderbackCount=Buy::where('stage',6)->where('shop_id' , 1)->count();//مرجوعی
    $this->orderbackEndCount=Buy::where('stage',7)->where('shop_id' , 1)->count();//مرجوعی تسویه شده
    return $next($request);
      });
      }
  }
  public function show(Request $request){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->format('Y/n/j');
    $dateC=$dateA->yesterday()->format('Y/n/j');
    $v=$dateA->subDay(30)->format('Y/n/j');
    return view('management.order_proUnStockFatak.order_proUnStockFatak' , compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','v'));
  }
  public function orderNewPUnStockF(Request $request)
  {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $dateA=new Verta();//تاریخ جلالی
      global $today;$today=$dateA->format('Y/n/j');
      global $yesterday;$yesterday=$dateA->yesterday()->format('Y/n/j');
      global $month;$month=$dateA->subDay(30)->format('Y/n/j');
      $order_id=$request->order_id;
      $mapId = ($order_id) ? 'سفارش با کد'.' '.$order_id : null ;
      global $proS;$proS=$request->cookie('proSCONPUSF');
      $mapPro = ($proS) ? 'محصول' . ' ' . $proS : 'همه محصولات' ;
      global $dateDay;$dateDay=$request->cookie('dateSCONPUSF');
      global $date1;$date1=$request->cookie('date1SCONPUSF');
      global $date2;$date2=$request->cookie('date2SCONPUSF');
      switch ($dateDay) {
        case 'all':$mapDate='همه تاریخ ها';break;
        case 'today':$mapDate='سفارشات امروز';break;
        case 'yesterday':$mapDate='سفارشات دیروز';break;
        case 'fromDAte':$mapDate='سفارشات از تاریخ ' . $date1 . ' تا ' . $date2;break;
        default:$mapDate='سفارشات 30 روز اخیر';break;
      }
      $odtanAndCity=$request->cookie('ostanAndCityOkSCONPUSF');
      global $ostan;$ostan=$request->cookie('ostanSCONPUSF');
      $mapOstan = ($ostan) ? 'استان'. ' ' . $ostan : 'همه استان' ;
      global $city;$city=$request->cookie('citySCONPUSF');
      $mapCity= ($city) ? 'شهر' . ' ' . $city : 'همه شهرها' ;
      if(!empty($order_id)){
        $newOrder=Order::where('id' , $order_id)->get();
        $notRecord='ok';
      }
      elseif(!empty($proS) or !empty($dateDay) or !empty($odtanAndCity)){
        $notRecord='ok';
        $newOrder=Order::where(function($query){
          global $proS;global $dateDay;global $today;global $yesterday;global $month;global $date1;global $date2;global $ostan;global $city;
         if(!empty($proS) ){$query->where( 'name' ,"like", "%$proS%");}
         if($dateDay=='today' ){$query->where( 'date_up' , $today);}
         if($dateDay=='yesterday' ){$query->where( 'date_up' , $yesterday);}
         if($dateDay=='month' ){$query->whereBetween('date_up' , [$month,$today]);}
         if(empty($dateDay)){$query->whereBetween('date_up' , [$month,$today]);}
         if($dateDay=='fromDAte' ){$query->whereBetween('date_up' , [$date1,$date2]);}
         if(!empty($ostan)){$query->where('ostan' ,"like", "%$ostan%");}
         if(!empty($city)){$query->where('city' ,"like", "%$city%");}
       })->orderby('date_up', 'DESC')->get();
      }
      else{
        $newOrder=Order::whereBetween('date_up' , [$month,$today])->orderby('date_up', 'DESC')->get();
        $notRecord='no';
      }
      $proShop=ProShop::get();
    return view('management.order_proUnStockFatak.orderNewPUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','newOrder','mapId','mapPro','mapDate','mapOstan','mapCity','notRecord','proShop'));
  }
  public function pro_searchUSF(Request $request)
  {
    $this->validate($request, ['nameCookie'=>'required|alpha_num','pro' => 'required',]);
    Cookie::queue($request->nameCookie, $request->pro);
  }
  public function allPro_searchUSF(Request $request)
  {
    $this->validate($request, ['nameCookie'=>'required|alpha_num',]);
    Cookie::queue($request->nameCookie, '',time() - 3600);
  }
  public function date_searchUSF(Request $request)
  {
    $this->validate($request, ['nameCookie'=>'required|alpha_num','day' => 'required',]);
    Cookie::queue($request->nameCookie, $request->day);
  }
  // از تاریخ تا تاریخ
  public function fromDAte_searchUSF(Request $request)
  {
    $this->validate($request, ['nameCookie'=>'required|alpha_num','nameCookieD1'=>'required|alpha_num','nameCookieD2'=>'required|alpha_num','date1' => 'required|jdate:Y/m/d','date2' => 'required|jdate:Y/m/d',]);
    Cookie::queue($request->nameCookie, 'fromDAte');
    Cookie::queue($request->nameCookieD1, $request->date1);
    Cookie::queue($request->nameCookieD2, $request->date2);
  }
  public function ostan_searchNPUF(Request $request)
  {
    $this->validate($request, ['osatn' => 'required|farsi','city' => 'nullable|farsi',]);
    Cookie::queue('ostanAndCityOkSCONPUSF', 'ok');
    Cookie::queue('ostanSCONPUSF', $request->osatn);
    Cookie::queue('citySCONPUSF', $request->city);
  }
  public function AllOstan_searchNPUF(Request $request)
  {
    Cookie::queue('ostanAndCityOkSCONPUSF', '',time() - 3600);
    Cookie::queue('ostanSCONPUSF','',time() - 3600);
    Cookie::queue('citySCONPUSF','',time() - 3600);
  }
  public function AllCiyt_searchNPUF(Request $request)
  {
    Cookie::queue('citySCONPUSF', '',time() - 3600);
  }
  public function orderOneNewPUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $order_id=$request->order_id;
    $order=Order::find($order_id);
    return view('management.order_proUnStockFatak.orderOneNewPUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','order'));
  }
  public function saveOrderNPUF(Save_proShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $pro=new ProShop();
    $pro->order_id=$request->id ;
    $pro->shop_id=1 ;
    $pro->stamp = $request->stamp ;
    $pro->name = $request->namePro ;
    $pro->maker = $request->maker ;
    $pro->brand = $request->brand ;
    $pro->model = $request->model ;
    $pro->price = $request->price ;
    $pro->vahed = $request->vahed ;
    $pro->num =(empty($request->num)) ? 1 : $request->num;
    $pro->vazn = $request->vazn ;
    $pro->vaznPost = $request->vaznPost ;
    $pro->dimension = $request->dimension ;
    $pro->pakat = $request->pakat ;
    $pro->dis = $request->dis ;
    $pro->dateMake = $request->dateMake ;
    $pro->dateExpiration = $request->dateExpiration ;
    $pro->term = $request->term ;
    $pro->date_ad = $date ;
    $pro->date_up = $date ;
    $pro->stage = 1 ;
    $pro->show = 1 ;
    $pro-> save();
     // اضافه کردن عکسهای محصول
    $picture=new Picture_shop();
    $picture->pro_shop_id =$pro->id;
    $picture->pic_b1 =  $request->img1 ;
    $picture->pic_b2 =  $request->img2 ;
    $picture->pic_b3 =  $request->img3 ;
    $picture->pic_b4 =  $request->img4 ;
    $picture->pic_b5 =  $request->img5 ;
    $picture->pic_b6 =  $request->img6 ;
    $picture->pic_s1 =  $request->img1 ;
    $picture->pic_s2 =  $request->img2 ;
    $picture->pic_s3 =  $request->img3 ;
    $picture->pic_s4 =  $request->img4 ;
    $picture->pic_s5 =  $request->img5 ;
    $picture->pic_s6 =  $request->img6 ;
    $picture->show = 1;
    $picture->save();
  }
  public function orderSabtPUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $dateA=new Verta();//تاریخ جلالی
    global $today;$today=$dateA->format('Y/n/j');
    global $yesterday;$yesterday=$dateA->yesterday()->format('Y/n/j');
    global $month;$month=$dateA->subDay(30)->format('Y/n/j');
    $order_id=$request->order_id;
    $stamp=$request->stamp;
    $mapId =  null ;
    $mapId =  null ;
    global $proS;$proS=$request->cookie('proSCOSPUSF');
    $mapPro = ($proS) ? 'محصول' . ' ' . $proS : 'همه محصولات' ;
    global $dateDay;$dateDay=$request->cookie('dateSCOSPUSF');
    global $date1;$date1=$request->cookie('date1SCOSPUSF');
    global $date2;$date2=$request->cookie('date2SCOSPUSF');
    switch ($dateDay) {
      case 'all':$mapDate='همه تاریخ ها';break;
      case 'today':$mapDate='محصولات ثبت شده امروز';break;
      case 'yesterday':$mapDate='محصولات ثبت شده دیروز';break;
      case 'fromDAte':$mapDate='محصولات ثبت شده از تاریخ ' . $date1. ' تا ' . $date2;break;
      default:$mapDate='همه تاریخ ها';break;
    }
    if(!empty($order_id) and $stamp==1 ){
      $proShop=proShop::where('id' , $order_id)->where('shop_id',1)->where('stage',1)->get();
      $notRecord='ok';
      $mapId =  'محصول با کد'.' '.$order_id ;
    }
    elseif(!empty($order_id) and $stamp==2){
      $proShop=proShop::where('order_id' , $order_id)->where('shop_id',1)->where('stage',1)->get();
      $notRecord='ok';
      $mapId = 'سفارش با کد'.' '.$order_id ;
    }
    elseif(!empty($proS) or !empty($dateDay) or !empty($odtanAndCity)){
      $notRecord='ok';
      $proShop= proShop::where('shop_id',1)->where('stage',1)->where(function($query){
        global $proS;global $dateDay;global $today;global $yesterday;global $month;global $date1;global $date2;
       if(!empty($proS) ){$query->where( 'name' ,"like", "%$proS%");}
       if($dateDay=='today' ){$query->where( 'date_up' , $today);}
       if($dateDay=='yesterday' ){$query->where( 'date_up' , $yesterday);}
       if($dateDay=='month' ){$query->whereBetween('date_up' , [$month,$today]);}
       if($dateDay=='fromDAte' ){$query->whereBetween('date_up' , [$date1,$date2]);}
     })->orderby('date_up', 'DESC')->get();
    }
    else{
      $proShop=proShop::where('shop_id',1)->where('stage',1)->orderby('date_up', 'DESC')->get();
      $notRecord='no';
    }
    $order=Order::get();
  return view('management.order_proUnStockFatak.orderSabtPUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','proShop','order','mapPro','mapId','mapDate','notRecord'));
  }
  public function orderOneSabtPUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $pro_id=$request->pro_id;
    $proShop=ProShop::find($pro_id);
    $order=Order::find($proShop->order_id);
    $picture_shops=Picture_shop::where('pro_shop_id',$proShop->id)->first();
    return view('management.order_proUnStockFatak.orderOneSabtPUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','proShop','order','picture_shops'));
  }
  public function editOrderSPUF(Save_proShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $pro=ProShop::find($request->pro_id);
    $pro->order_id=$request->id ;
    $pro->shop_id=1 ;
    $pro->stamp = $request->stamp ;
    $pro->name = $request->namePro ;
    $pro->maker = $request->maker ;
    $pro->brand = $request->brand ;
    $pro->model = $request->model ;
    $pro->price = $request->price ;
    $pro->vahed = $request->vahed ;
    $pro->num =(empty($request->num)) ? 1 : $request->num;
    $pro->vazn = $request->vazn ;
    $pro->vaznPost = $request->vaznPost ;
    $pro->dimension = $request->dimension ;
    $pro->pakat = $request->pakat ;
    $pro->dis = $request->dis ;
    $pro->dateMake = $request->dateMake ;
    $pro->dateExpiration = $request->dateExpiration ;
    $pro->term = $request->term ;
    $pro->date_ad = $date ;
    $pro->date_up = $date ;
    $pro->stage = 1 ;
    $pro->show = 1 ;
    $pro-> save();
     // اضافه کردن عکسهای محصول
    $picture=Picture_shop::where('pro_shop_id',$pro->id)->first();
    $picture->pro_shop_id =$pro->id;
    $picture->pic_b1 =  $request->img1 ;
    $picture->pic_b2 =  $request->img2 ;
    $picture->pic_b3 =  $request->img3 ;
    $picture->pic_b4 =  $request->img4 ;
    $picture->pic_b5 =  $request->img5 ;
    $picture->pic_b6 =  $request->img6 ;
    $picture->pic_s1 =  $request->img1 ;
    $picture->pic_s2 =  $request->img2 ;
    $picture->pic_s3 =  $request->img3 ;
    $picture->pic_s4 =  $request->img4 ;
    $picture->pic_s5 =  $request->img5 ;
    $picture->pic_s6 =  $request->img6 ;
    $picture->show = 1;
    $picture->save();
    return $pro->id;
  }
  public function orderBuyUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buyOrder=BuyOrder::where('stage',2)->where('shop_id' , 1)->get();
    $proShop=ProShop::get();
    return view('management.order_proUnStockFatak.orderBuyUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buyOrder','proShop'));
  }
  public function orderOneBuyUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $buy_id=$request->buy_id;
    $buyOrder=BuyOrder::find($buy_id);
    $proShop=ProShop::find($buyOrder->proShop_id);
    return view('management.order_proUnStockFatak.orderOneBuyUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buyOrder','proShop'));
  }
  public function proceedOrderUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderSabtCount=$this->orderSabtCount;$orderBuyCount=$this->orderBuyCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $dateA=new Verta();//تاریخ جلالی
    global $today;$today=$dateA->format('Y/n/j');
    global $yesterday;$yesterday=$dateA->yesterday()->format('Y/n/j');
    global $month;$month=$dateA->subDay(30)->format('Y/n/j');
    $order_id=$request->order_id;
    $stamp=$request->stamp;
    $mapId =  null ;
    $mapId =  null ;
    global $proS;$proS=$request->cookie('proSCOSPUSF');
    $mapPro = ($proS) ? 'محصول' . ' ' . $proS : 'همه محصولات' ;
    global $dateDay;$dateDay=$request->cookie('dateSCOSPUSF');
    global $date1;$date1=$request->cookie('date1SCOSPUSF');
    global $date2;$date2=$request->cookie('date2SCOSPUSF');
    switch ($dateDay) {
      case 'all':$mapDate='همه تاریخ ها';break;
      case 'today':$mapDate='محصولات ثبت شده امروز';break;
      case 'yesterday':$mapDate='محصولات ثبت شده دیروز';break;
      case 'fromDAte':$mapDate='محصولات ثبت شده از تاریخ ' . $date1. ' تا ' . $date2;break;
      default:$mapDate='همه تاریخ ها';break;
    }
    if(!empty($order_id) and $stamp==1 ){
      $buyOrder=BuyOrder::where('id' , $order_id)->where('stage',3)->where('shop_id' , 1)->get();
      $notRecord='ok';
      $mapId =  'محصول با کد'.' '.$order_id ;
    }
    elseif(!empty($order_id) and $stamp==2){
      $buyOrder=BuyOrder::where('id' , $order_id)->where('stage',3)->where('shop_id' , 1)->get();
      $proShop=proShop::where('order_id' , $order_id)->where('shop_id',1)->where('stage',1)->get();
      $notRecord='ok';
      $mapId = 'سفارش با کد'.' '.$order_id ;
    }
    elseif(!empty($proS) or !empty($dateDay) or !empty($odtanAndCity)){
      $notRecord='ok';
      $proShop= proShop::where('shop_id',1)->where('stage',1)->where(function($query){
        global $proS;global $dateDay;global $today;global $yesterday;global $month;global $date1;global $date2;
       if(!empty($proS) ){$query->where( 'name' ,"like", "%$proS%");}
       if($dateDay=='today' ){$query->where( 'date_up' , $today);}
       if($dateDay=='yesterday' ){$query->where( 'date_up' , $yesterday);}
       if($dateDay=='month' ){$query->whereBetween('date_up' , [$month,$today]);}
       if($dateDay=='fromDAte' ){$query->whereBetween('date_up' , [$date1,$date2]);}
     })->orderby('date_up', 'DESC')->get();
    }
    else{
      $buyOrder=BuyOrder::where('stage',3)->where('shop_id' , 1)->get();
      $notRecord='no';
    }
    $proShop=proShop::get();
  return view('management.order_proUnStockFatak.proceedOrderUnStockF', compact('id','nameModir','access','orderNewCount','orderSabtCount','orderBuyCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','proShop','buyOrder','mapPro','mapId','mapDate','notRecord'));
  }
}//end class
