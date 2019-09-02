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
use App\Http\Requests\Save_proShop;
use App\Http\Requests\Save_editProShop;

class OrderUnStockFatakAdminController extends Controller
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
    $this->orderNewCount=Buy::where('stage',2)->where('shop_id' , 1)->count();//سفارشات جدید
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
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->format('Y/n/j');
    $dateC=$dateA->subDay()->format('Y/n/j');
    $v=$dateA->subDay(30)->format('Y/n/j');
    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.order_proUnStockFatak.order_proUnStockFatak' , compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','v'));
  }
  public function orderNewPUnStockF(Request $request)
  {
      $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
      $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $dateA=new Verta();//تاریخ جلالی
      $today=$dateA->format('Y/n/j');$GLOBALS['today']=$dateA->format('Y/n/j');
      $GLOBALS['yesterday']=$dateA->subDay()->format('Y/n/j');
      $month=$dateA->subDay(30)->format('Y/n/j');$GLOBALS['month']=$dateA->subDay(30)->format('Y/n/j');
      $order_id=$request->order_id;
      $mapId = ($order_id) ? 'سفارش با کد'.' '.$order_id : null ;
      $proS=$request->cookie('proSCONPUSF');$GLOBALS['proS']=$request->cookie('proSCONPUSF');
      $mapPro = ($proS) ? 'محصول' . ' ' . $proS : 'همه محصولات' ;
      $dateDay=$request->cookie('dateSCONPUSF');$GLOBALS['dateDay']=$request->cookie('dateSCONPUSF');
      $GLOBALS['date1']=$request->cookie('date_1_SCONPUSF');
      $GLOBALS['date2']=$request->cookie('date_2_SCONPUSF');
      $mapDate = ($proS) ? 'محصول' . ' ' . $proS : 'همه محصولات' ;
      switch ($dateDay) {
        case 'all':$mapDate='همه تاریخ ها';break;
        case 'today':$mapDate='سفارشات امروز';break;
        case 'yesterday':$mapDate='سفارشات دیروز';break;
        case 'fromDAte':$mapDate='سفارشات از تاریخ ' . $GLOBALS['date1'] . ' تا ' . $GLOBALS['date2'];break;
        default:$mapDate='سفارشات 30 روز اخیر';break;
      }
      $odtanAndCity=$request->cookie('ostanAndCityOkSCONPUSF');
      $GLOBALS['ostan']=$request->cookie('ostanSCONPUSF');
      $mapOstan = ($GLOBALS['ostan']) ? 'استان'. ' ' . $GLOBALS['ostan'] : 'همه استان' ;
      $GLOBALS['city']=$request->cookie('citySCONPUSF');
      $mapCity= ($GLOBALS['city']) ? 'شهر' . ' ' . $GLOBALS['city'] : 'همه شهرها' ;
      if(!empty($order_id)){
        $newOrder=Order::where('id' , $order_id)->get();
        $notRecord='ok';
      }
      elseif(!empty($proS) or !empty($dateDay) or !empty($odtanAndCity)){
        $notRecord='ok';
        $newOrder=Order::where(function($query){
          $proS=$GLOBALS['proS'];
          $dateDay=$GLOBALS['dateDay'];
          $today=$GLOBALS['today'];
          $yesterday=$GLOBALS['yesterday'];
          $month=$GLOBALS['month'];
          $date1=$GLOBALS['date1'];
          $date2=$GLOBALS['date2'];
          $ostan=$GLOBALS['ostan'];
          $city=$GLOBALS['city'];
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

    return view('management.order_proUnStockFatak.orderNewPUnStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','newOrder','mapId','mapPro','mapDate','mapOstan','mapCity','notRecord'));

  }
  public function pro_searchNPUF(Request $request)
  {
    $this->validate($request, ['pro' => 'required',]);
    Cookie::queue('proSCONPUSF', $request->pro);
  }
  public function allPro_searchNPUF(Request $request)
  {
    Cookie::queue('proSCONPUSF', '',time() - 3600);
  }
  public function date_searchNPUF(Request $request)
  {
    $this->validate($request, ['day' => 'required',]);
    Cookie::queue('dateSCONPUSF', $request->day);
  }
  // از تاریخ تا تاریخ
  public function fromDAte_searchNPUF(Request $request)
  {
    $this->validate($request, ['date1' => 'required|jdate:Y/m/d','date2' => 'required|jdate:Y/m/d',]);
    Cookie::queue('dateSCONPUSF', 'fromDAte');
    Cookie::queue('date_1_SCONPUSF', $request->date1);
    Cookie::queue('date_2_SCONPUSF', $request->date2);
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
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
    $order_id=$request->order_id;
    $order=Order::find($order_id);
    return view('management.order_proUnStockFatak.orderOneNewPUnStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','order'));
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
}//end class
