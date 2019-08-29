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
    $v=$dateA->subDay(30)->formatJalaliDate();
    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.order_proUnStockFatak.order_proUnStockFatak' , compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','v'));
  }
  public function orderNewPUnStockF(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
      $dateA=new Verta();//تاریخ جلالی
      $GLOBALS['today']=$dateA->format('Y/n/j');
      $GLOBALS['yesterday']=$dateA->subDay()->format('Y/n/j');
      $GLOBALS['month']=$dateA->subDay(30)->format('Y/n/j');

      $proS=$request->cookie('proSCONPUSF');$GLOBALS['proS']=$request->cookie('proSCONPUSF');
      $dateDay=$request->cookie('dateSCONPUSF');$GLOBALS['dateDay']=$request->cookie('dateSCONPUSF');
      $GLOBALS['date1']=$request->cookie('date_1_SCONPUSF');
      $GLOBALS['date2']=$request->cookie('date_2_SCONPUSF');

      $odtanAndCity=$request->cookie('ostanAndCityOkSCONPUSF');
      $GLOBALS['ostan']=$request->cookie('ostanSCONPUSF');
      $GLOBALS['city']=$request->cookie('citySCONPUSF');
      if(!empty($proS) or !empty($dateDay) or !empty($odtanAndCitys)){

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
         if($dateDay=='fromDAte' ){$query->whereBetween('date_up' , [$date1,$date2]);}
         if($ostan!='no' ){$query->where('ostan' ,"like", "%$ostan%");}
         if($city!='no' ){$query->where('city' ,"like", "%$city%");}
       })->orderby('date_up', 'DESC')->get();

      }
      else{
        // $newOrder=Order::whereBetween('date_up' , [$date30,$dateB])->get();
      $newOrder=Order::get();
      }

    return view('management.order_proUnStockFatak.orderNewPUnStockF', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','newOrder','dateDay'));

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
    $this->validate($request, ['osatn' => 'required','city' => 'required',]);
    Cookie::queue('ostanAndCityOkSCONPUSF', 'ok');
    Cookie::queue('ostanSCONPUSF', $request->osatn);
    Cookie::queue('citySCONPUSF', $request->city);
  }
}//end class
