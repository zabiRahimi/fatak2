<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Order;
use App\Models\ProShop;
use App\Models\Picture_shop;
use App\Models\BuyOrder;
use App\Models\PayShop;
use App\Models\BackErsalShop;
use App\Models\StampProOrder;

use App\Http\Requests\Save_shop_1;
use App\Http\Requests\Save_shop_2;
use App\Http\Requests\Save_loginShop;
use App\Http\Requests\Save_editShop;
use App\Http\Requests\Save_editPasShop;
use App\Http\Requests\Save_proShop;
use App\Http\Requests\Save_editProShop;
use App\Http\Requests\Save_sabtCodeSh;
use App\Http\Requests\Save_sabtCodeRahgirySh;
use App\Http\Requests\Save_editCodeRahgirySh;
use App\Http\Requests\Save_searchDateShop;
use App\Http\Requests\Save_searchAdvancedShop;
use App\Http\Requests\Save_codeOldOrderShop;
use App\Http\Requests\Save_nameOldOrderShop;
use App\Http\Requests\Save_codeBuyProShop;
use App\Http\Requests\Save_nameBuyProShop;
use App\Http\Requests\Save_namePayShop;
use Cookie;
use DB;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
class ShopController extends Controller
{
  public $stage;
  public $id;
  public $seller;//نام فروشنده
  public $orderNum , $oldOrderNum , $buyOrderNum , $payOrderNum , $backOrderNum;

  public function __construct(Encrypter $encrypter ,Request $request)
  {
    $cookie=$request->cookie('checkLogShop');
    if(!empty($cookie)){
    $this->middleware(function ($request, $next){
    $id = $request->cookie('checkLogShop');
    $this->id=$id;
    $user=Shop::find($id);
    $this->stage=$user->stage;
    $this->seller=$user->seller;
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->timestamp;
    $date30=$dateA->subDay(30);
    $date30=$date30->timestamp;
    $order=Order::where('stage',1)->whereBetween('date_up', [$date30 , $dateB])->get();
    $orderNum=0;
    foreach ($order as $value) {
      $checkOrder=StampProOrder::where('order_id',$value->id)->where('shop_id',$id)->first();
      if($checkOrder){continue;}
      $orderNum++;
    }
    $this->orderNum=$orderNum;
    $this->oldOrderNum=ProShop::where('shop_id',$id)->count();
    $this->buyOrderNum=ProShop::where('shop_id',$id)->count();
    $this->payOrderNum=ProShop::where('shop_id',$id)->whereBetween('date_up', [$date30 , $dateB])->count();
    $this->backOrderNum=ProShop::where('shop_id',$id)->count();
    return $next($request);
      });
      }
  }
  public function pageloginShop(Request $request)
  {
    return view('shop.pageloginShop');
  }
  public function sabtShop_1(Save_shop_1 $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=new Shop();
    $save->seller=$request->seller;
    $save->mobail=$request->mobail;
    $save->pas=Hash::make($request->pas);
    $save->date_ad=$date;
    $save->date_up=$date;
    $save->stage=1;
    $save->show=1;
    $save->save();
  }
  public function loginShop(Save_loginShop $request ){
    $mobail=$request->mobail;
    $pas=$request->pas;
    $add=Shop::where('mobail',$mobail)->first();
    if(!empty($add)){
      if (Hash::check($pas, $add['pas']))
      {
        $id=$add['id'];
        Cookie::queue('checkLogShop', $id);
      }else{
        return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
      }
    }
      else{
        return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
      }
  }
  public function logoutShop(){
    Cookie::queue('checkLogShop', '',time() - 3600);
    return redirect('/');
  }
  public function dashboard_shop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    return view('shop.dashboard_shop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum'));
  }
  public function perfectDaShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    return view('shop.perfectDaShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum'));
  }
  public function sabtShop_2(Save_shop_2 $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $id=$this->id;
    $save=Shop::find($id);
    $save->shop=$request->shop;
    $save->codemly=$request->codemly;
    $save->ostan=$request->ostan;
    $save->city=$request->city;
    $save->address=$request->address;
    $save->codepost=$request->codepost;
    $save->tel=$request->tel;
    $save->email=$request->email;
    $save->accountNumber=$request->accountNumber;
    $save->cart=$request->cart;
    $save->master=$request->master;
    $save->bank=$request->bank;
    $save->date_up=$date;
    $save->stage=2;
    $save->save();
  }
  public function editDaShop(Request $request)
  {
    $user=Shop::find($this->id);
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    return view('shop.editDaShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','user'));
  }
  public function editDaShopSave(Save_editShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Shop::find($this->id);
    $save->shop=$request->shop;
    $save->seller=$request->seller;
    $save->mobail=$request->mobail;
    $save->tel=$request->tel;
    $save->email=$request->email;
    $save->codemly=$request->codemly;
    $save->ostan=$request->ostan;
    $save->city=$request->city;
    $save->address=$request->address;
    $save->codepost=$request->codepost;
    $save->accountNumber=$request->accountNumber;
    $save->cart=$request->cart;
    $save->master=$request->master;
    $save->bank=$request->bank;
    $save->date_up=$date;
    $save->save();
  }
  public function editPasDaShop(Save_editPasShop $request)
  {
    $pas=$request->pasOld;
    $add=Shop::find($this->id);
      if (Hash::check($pas, $add['pas']))
      {
        $add->pas=Hash::make($request->pasNew);
        $add->save();
      }else{
        return response()->json(['errors' => ['no_pas' => ['رمز فعلی اشتباه است .']]], 422);
      }
  }
  public function warningShop(Request $request)
  {
    $id=$this->id;$stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    return view('shop.warningShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum'));
  }
  public function newOrderShop(Request $request)
  {
    global $ostanSeSh;$ostanSeSh=$request->cookie('osatnShop');$search_ostanA =$ostanSeSh;
    global $citySeSh;$citySeSh=$request->cookie('cityShop');$search_cityA =$citySeSh;
    global $proShop2;$proShop2=$request->cookie('proShop');$search_proA =$proShop2;
    $dateA=new Verta();//تاریخ جلالی
    $today=$dateA->today();$today=$today->timestamp;
    $yesterday=$dateA->yesterday();$yesterday=$yesterday->timestamp;
    $dateNew=$dateA->timestamp;
    $dateB=$dateA->timestamp;
    $dateC = $dateA->yesterday()->timestamp;
    $date30=$dateA->subDay(30);$date30=$date30->timestamp;
    $id=$this->id;$stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $date=$request->date;
    $date1=(integer)$request->cookie('date1');
    $date2=(integer)$request->cookie('date2');
    $sortDate=$request->cookie('sortdate');
    if ($date=='today' or $sortDate=='today') {
       $newOrder=Order::where('stage',1)->whereBetween('date_up', [$today, $dateNew])->where(function($query){
      global $ostanSeSh;global $citySeSh;global $proShop2;
        if(!empty($ostanSeSh) && $ostanSeSh!=='allOstan' ){$query->where('ostan', $ostanSeSh);}
        if(!empty($citySeSh) && $citySeSh != 'allCity' ){$query->where('city', $citySeSh);}
        if(!empty($proShop2) ){$query->where( 'name' ,"like", "%$proShop2%");}
      })->orderby('date_up', 'DESC')->get();
      $search_order='سفارشات امروز';
    }
    elseif ($date=='yesterday' or $sortDate=='yesterday') {
      $newOrder=Order::where('stage',1)->whereBetween('date_up', [$yesterday, $today -1])->where(function($query){
        global $ostanSeSh;global $citySeSh;global $proShop2;
        if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
        if(!empty($citySeSh) && $citySeSh != 'allCity' ){$query->where('city', $citySeSh);}
        if(!empty($proShop2) ){$query->where( 'name' ,"like", "%$proShop2%");}
      })->orderby('date_up', 'DESC')->get();
      $search_order='سفارشات دیروز';
    }
    elseif ($date=='slicing' or $sortDate=='slicing') {
      if (!empty($date1) && !empty($date2)) {
        $newOrder=Order::where('stage',1)->whereBetween('date_up', [$date1, $date2])->where(function($query){
          global $ostanSeSh;global $citySeSh;global $proShop2;
          if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
          if(!empty($citySeSh) && $citySeSh != 'allCity' ){$query->where('city', $citySeSh);}
          if(!empty($proShop2) ){$query->where( 'name' ,"like", "%$proShop2%");}
        })->orderby('date_up', 'DESC')->get();
      }
    }
    else {
      $newOrder=Order::where('stage',1)->whereBetween('date_up', [$date30 , $dateB])->where(function($query){
        global $ostanSeSh;global $citySeSh;global $proShop2;
        if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
        if(!empty($citySeSh) && $citySeSh != 'allCity' ){$query->where('city', $citySeSh);}
        if(!empty($proShop2) ){$query->where( 'name' ,"like", "%$proShop2%");}
      })->orderby('date_up', 'DESC')->get();
      $search_order='سفارشات 30 روز اخیر';
    }
    if(!empty($search_ostanA)&& $search_ostanA!='allOstan'){$search_ostan='استان '.$search_ostanA;}else { $search_ostan='همه استانها' ;  }
    if(!empty($search_cityA)&& $search_cityA!='allCity'){$search_city='شهر '.$search_cityA;}else { $search_city='همه شهرها' ;  }
    if(!empty($search_proA)){$search_pro='محصول '.$search_proA;}else { $search_pro='همه محصولات' ;  }
    $city=$search_cityA;
    $stampProOrder=StampProOrder::where('shop_id',$id)->get();
    return view('shop.newOrderShop',compact('stage','seller','orderNum','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','newOrder','stampProOrder','search_order','date1','date2','sortDate','search_ostan','search_city','search_pro','search_proA','search_ostanA','city'));
  }
  public function searchSortDateShop(Request $request)
  {
    $sortDate=$request->sortdate;
    Cookie::queue('sortdate', $sortDate);
  }
  public function searchShop(Save_searchDateShop $request)
  {
    $day1=$request->day1;$month1=$request->month1;$year1=$request->year1;
    $day2=$request->day2;$month2=$request->month2;$year2=$request->year2;
    $date1=Verta::createJalali($year1,$month1,$day1,0,0,0);$date1=$date1->timestamp;
    $date2=Verta::createJalali($year2,$month2,$day2,23,59,59);$date2=$date2->timestamp ;
    Cookie::queue('date1', $date1);
    Cookie::queue('date2', $date2);
    Cookie::queue('sortdate', 'slicing');
  }
  public function searchAdvancedShop(Save_searchAdvancedShop $request)
  {
    $ostan=$request->ostan;
    $city=$request->city;
    $pro=$request->pro;
    $date1=$request->date1;
    $date2=$request->date2;
    Cookie::queue('osatnShop', $ostan);
    Cookie::queue('cityShop', $city);
    Cookie::queue('proShop', $pro);
    if (!empty($date1)) {
      Cookie::queue('date1', $date1);
    }
    if (!empty($date2)) {
      Cookie::queue('date2', $date2);
    }
  }
  public function newOrderShopOne(Request $request)
  {
    $id=$request->id;$stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $newOrderOne=Order::find($id);
    return view('shop.newOrderShopOne',compact('shop_id','stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','newOrderOne'));
  }
  public function proShop(Save_proShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $order_id=$request->order_id;
    $pro=new ProShop();
    $pro->shop_id=$this->id ;
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
    $pro->show = 1 ;
    $pro-> save();
    $picture=new Picture_shop();// اضافه کردن عکسهای محصول
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
    if(!empty($order_id)){//اضافه کردن آیدی محصول به رکورد سفارش مشتری
      $order=Order::find($order_id);
      $id_proShop=  json_decode($order->id_proShop);
      $id_proShop[]=$pro->id;
      $order->id_proShop=json_encode($id_proShop);
      $order->save();
      $stampProOrder=new StampProOrder();//اضافه کردن رکوردهای stampProOrder
      $stampProOrder->order_id=$request->order_id;
      $stampProOrder->proShop_id=$pro->id;
      $stampProOrder->shop_id=$this->id;
      $stampProOrder->stamp=$request->stamp;
      $stampProOrder->price=$request->priceFOrder;
      $stampProOrder->disSeller=$request->disSeller;
      $stampProOrder->date_ad=$date;
      $stampProOrder->date_up=$date;
      $stampProOrder->show=1;
      $stampProOrder->save();
    }
  }
  public function buyProShop(Request $request)
  {
    $id=$this->id;$stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $codeBuyProSh=$request->cookie('codeBuyProShC');
    $nameBuyProSh=$request->cookie('nameBuyProShC');
    if (!empty($codeBuyProSh)) {
      $proShop=proShop::where('order_id' , $codeBuyProSh)->where('shop_id',$id)->where('stage',2)->get();
      $search= 'کد فروش ' . $codeBuyProSh;
      $noRecord='code';
    }
    elseif (!empty($nameBuyProSh)) {
      $proShop=proShop::where('shop_id',$id)->where( 'name' ,"like", "%$nameBuyProSh%")->where('stage',2)->get();
      $search= 'محصول ' . $nameBuyProSh;
      $noRecord='name';
    }
    else {
      $proShop=proShop::where('shop_id',$id)->where('stage',2)->get();
      $search= 'همه محصولات';
      $noRecord='all';
    }
    return view('shop.buyProShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','proShop','search','noRecord'));
  }
  public function codeBuyProShop(Save_codeBuyProShop $request)
  {
    $code=$request->code;
    Cookie::queue('codeBuyProShC', $code);
  }
  public function nameBuyProShop(Save_nameBuyProShop $request)
  {
    $namePro=$request->namePro;
    Cookie::queue('nameBuyProShC', $namePro);
    Cookie::queue('codeBuyProShC', '');
  }
  public function allBuyProShop()
  {
    Cookie::queue('nameBuyProShC', '');
    Cookie::queue('codeBuyProShC', '');
  }
  public function buyProShopOne(Request $request)
  {
    $buyer_id=$request->buyer_id;$pro_id=$request->pro_id;
    $buyer=BuyOrder::find($buyer_id);
    $pro=ProShop::find($pro_id);
    return view('shop.buyProShopOne',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','buyer','pro'));
  }
  public function uplodImgProSh(Request $request){
    //اعتبار سنجی
    //نکته مهم : سایز عکسها در لاراول کیلو بایت می باشد اما در دراپ زون برحسب مگا بایت است . دقت شود
    $this->validate($request, [
          'file' => 'required|file|image|mimes:jpeg,jpg,png|max:1000',
      ]);
    $file=$request->file('file');
    $name= time() . $file->getClientOriginalName();
    $file->move('img_shop' , $name);
    return "$name";
  }
  public function del_imgShop(Request $request)
  {
    $this->validate($request, ['nameImg' => 'required|imgName','id_img' => 'nullable|numeric','cell_imgB' => 'required_with:id_img|alpha_dash','cell_imgS' => 'required_with:id_img|alpha_dash']);
    $nameImg=$request->nameImg;
    $checkFile = 'img_shop/' . $nameImg;// get file path from table
    if(file_exists($checkFile)) // make sure it exits inside the folder
    {
      unlink($checkFile); // delete file/image
      if(!empty($request->id_img)){
        $cell_imgB=$request->cell_imgB;
        $cell_imgS=$request->cell_imgS;
        $delCellImg=Picture_shop::find($request->id_img);
        $delCellImg->$cell_imgB=null;
        $delCellImg->$cell_imgS=null;
        $delCellImg->save();
      }
    }
  }
  public function oldOrderShop(Request $request)
  {
    $id=$this->id;$stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $codeOldOrSh=$request->cookie('codeOldOrShC');
    $nameOldOrSh=$request->cookie('nameOldOrShC');
    if (!empty($codeOldOrSh)) {
      $proShop=proShop::where('order_id' , $codeOldOrSh)->where('shop_id',$id)->where('stage',1)->get();
      $search= 'کد فروش ' . $codeOldOrSh;
      $noRecord='code';
    }
    elseif (!empty($nameOldOrSh)) {
      $proShop=proShop::where('shop_id',$id)->where( 'name' ,"like", "%$nameOldOrSh%")->where('stage',1)->get();
      $search= 'محصول ' . $nameOldOrSh;
      $noRecord='name';
    }
    else {
      $proShop=proShop::where('shop_id',$id)->where('stage',1)->get();
      $search= 'همه محصولات';
      $noRecord='all';
    }
    return view('shop.oldOrderShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','proShop','search','noRecord'));
  }
  public function codeOldOrderShop(Save_codeOldOrderShop $request)
  {
    $code=$request->code;
    Cookie::queue('codeOldOrShC', $code);
  }
  public function nameOldOrderShop(Save_nameOldOrderShop $request)
  {
    $namePro=$request->namePro;
    Cookie::queue('nameOldOrShC', $namePro);
    Cookie::queue('codeOldOrShC', '');
  }
  public function allOldOrderShop()
  {
    Cookie::queue('nameOldOrShC', '');
    Cookie::queue('codeOldOrShC', '');
  }
  public function oldOrderShopOne(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $id_order=$request->id1;$id_proShop=$request->id2;
    $oldOrderOne=Order::find($id_order);
    $proShopOne=proShop::find($id_proShop);
    $proImg=Picture_shop::where('pro_shop_id', $id_proShop)->first();
    return view('shop.oldOrderShopOne',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','oldOrderOne','proShopOne','proImg','id_order','id_proShop'));
  }
  public function editProShopUnStock(Save_editProShop $request)
  {
    $checkAddPro=StampProOrder::where('order_id', $request->order_id)->where('proShop_id', $request->pro_id)->where('shop_id', $this->id)->first();
    if(!empty($checkAddPro)){
      return response()->json(['errors' => ['checkPro' => ['']]], 422);
    }
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $pro=ProShop::find($request->pro_id);
    $pro->name = $request->namePro ;
    $pro->maker = $request->maker ;
    $pro->brand = $request->brand ;
    $pro->model = $request->model ;
    $pro->price = $request->price ;
    $pro->vahed = $request->vahed ;
    $pro->num =(empty($request->num)) ? 1 : $request->num;
    $pro->vazn = $request->vazn ;
    $pro->vaznPost = $request->vaznPost ;
    $pro->pakat = $request->pakat ;
    $pro->dis = $request->dis ;
    $pro->dateMake = $request->dateMake ;
    $pro->dateExpiration = $request->dateExpiration ;
    $pro->term = $request->term ;
    $pro->date_up = $date ;
    $pro-> save();
    //  // اضافه کردن عکسهای محصول
    $picture=Picture_shop::find($request->img_id);
    $picture->pic_b1 =  $request->img1 ;
    $picture->pic_b2 =  $request->img2;
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
    $picture->save();
    //اضافه کردن رکوردهای stampProOrder
    if ($request->newPro==1) {
      $stampProOrder=new StampProOrder();
      $stampProOrder->order_id=$request->order_id;
      $stampProOrder->proShop_id=$request->pro_id;
      $stampProOrder->shop_id=$this->id;
      $stampProOrder->date_ad=$date;

    } else {
      $stampProOrder=StampProOrder::where('order_id',$request->order_id )->first();
    }
    $stampProOrder->stamp=$request->stamp;
    $stampProOrder->price=$request->priceFOrder;
    $stampProOrder->disSeller=$request->disSeller;
    $stampProOrder->date_up=$date;
    $stampProOrder->show=1;
    $stampProOrder->save();
    // //اضافه کردن این محصول به رکورد سفارش مشتری
    $order=Order::find($request->order_id);
    $id_proShop=json_decode($order->id_proShop);
    $id_proShop[]=$request->pro_id;
    $order->id_proShop=json_encode($id_proShop);
    $order->save();
  }
  public function sabtErsalShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $order_id=$request->order_id;
    $proShop=proShop::where('order_id',$order_id)->where('stage',2)->first();
    if ($proShop) {
      $buyer=BuyOrder::where('id',$proShop->buyer_id)->first();
    }
    return view('shop.sabtErsalShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','order_id','proShop','buyer'));
  }
  public function sabtCodeSh(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('order_id',$code)->where('stage',2)->first();
    if (!$proShop) {
      $proShop2=proShop::where('order_id',$code)->where('stage',3)->first();
      if($proShop2){
        return response()->json(['errors' => ['codePro' => ['کد رهگیری این محصول قبلا ثبت شده است .']]], 422);
      }
      return response()->json(['errors' => ['codePro' => ['کد محصول اشتباه است .']]], 422);
    }
    return $code;
  }
  public function sabtCodeRahgirySh(Save_sabtCodeRahgirySh $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=ProShop::find($request->id);
    $add->codeRahgiry=$request->codeRahgiry;
    $add->date_up=$date;
    $add->stage=3;
    $add->save();
  }
  public function editErsalShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $order_id=$request->order_id;
    $proShop=proShop::where('stage',3)->get();
    $proShop2=proShop::where('order_id',$order_id)->where('stage',3)->first();
    if ($proShop2) {
      $buyer=BuyOrder::where('id',$proShop2->buyer_id)->first();
    }
    return view('shop.editErsalShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','order_id','proShop','proShop2','buyer'));
  }
  public function editCodeSh(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('order_id',$code)->where('stage',3)->first();
    if (!$proShop) {
      $proShop2=proShop::where('order_id',$code)->where('stage',2)->first();
      if($proShop2){
        return response()->json(['errors' => ['codePro' => ['کد رهگیری این محصول تاکنون ثبت نشده است . جهت ثبت کد به صفحه ثبت ارسال شده ها بروید .']]], 422);
      }
      return response()->json(['errors' => ['codePro' => ['کد محصول اشتباه است .']]], 422);
    }
    return $code;
  }
  public function editCodeRahgirySh(Save_editCodeRahgirySh $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=ProShop::find($request->id);
    $add->codeRahgiry=$request->codeRahgiry;
    $add->date_up=$date;
    $add->stage=3;
    $add->save();
  }
  public function pigiryErsalShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    return view('shop.pigiryErsalShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum'));
  }
  public function backErsalShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $order_id=$request->order_id;
    $codeOkBackShop=$request->cookie('codeOkBackShop');
    $nameBackShop=$request->cookie('nameBackShop');
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->format('Y/n/j');
    $dateC=$dateA->yesterday()->format('Y/n/j');
    $date30=$dateA->subDay(30)->format('Y/n/j');
    $date1=$request->cookie('date1BackShop');
    $date2=$request->cookie('date2BackShop');
    if(!empty($nameBackShop)){
      if (!empty($date1)&&!empty($date2)) {
        $proShop=ProShop::where( 'name' ,"like", "%$nameBackShop%")->whereBetween('date_up', [$date1, $date2])->where('stage','6')->get();
        $sortDate='slicing';
        $erorrBackShop='در بازه زمانی مورد نظر این محصول ارجاع نشده است .';
      }
      else {
        $proShop=ProShop::where( 'name' ,"like", "%$nameBackShop%")->whereBetween('date_up', [$date30,$dateB])->where('stage','6')->get();
        $sortDate='مرجوعی های 30 روز اخیر';
        $erorrBackShop='طی 30 روز اخیر این محصول ارجاع نشده است .';
      }
      $search_pro='محصول ' . $nameBackShop;
    }
    else{
      if (!empty($date1)&&!empty($date2)) {
        $proShop=ProShop::whereBetween('date_up', [$date1, $date2])->where('stage','6')->get();
        $sortDate='slicing';
        $erorrBackShop='در بازه مورد نظر ارجاعی صورت نگرفته است .';
       }
      else {
        $proShop=ProShop::whereBetween('date_up', [$date30,$dateB])->where('stage','6')->get();
        $sortDate='مرجوعی های 30 روز اخیر';
        $erorrBackShop='طی 30 روز اخیر ارجاعی صورت نگرفته است .';
      }
      $search_pro='همه محصولات';
    }
    $backShop=BackErsalShop::first();
    if ($order_id) {
      $proShop2=ProShop::where('order_id',$order_id)->where('stage','6')->first();
      $backShop2=BackErsalShop::where('order_id',$order_id)->first();
      $buy=BuyOrder::where('order_id',$order_id)->first();
    }
    return view('shop.backErsalShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','proShop','backShop','order_id','proShop2','backShop2','buy','search_pro','sortDate','date1','date2','erorrBackShop'));
  }
  // 30 روزه
  public function SearchAllDateBackShop()
  {
    Cookie::queue('date1BackShop', '',time() - 3600);
    Cookie::queue('date2BackShop', '',time() - 3600);
  }
  public function SearchDateSortBackShop(Save_searchDateShop $request)
  {
    $date1=$request->date1;
    $date2=$request->date2;
    Cookie::queue('date1BackShop', $date1);
    Cookie::queue('date2BackShop', $date2);
  }
  public function SearchNameBackShop(Save_namePayShop $request)
  {
    $namePro=$request->namePro;
    Cookie::queue('nameBackShop', $namePro);
  }
  public function SearchAllNameBackShop()
  {
    Cookie::queue('nameBackShop', '',time() - 3600);
  }
  public function SearchBackShop(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('order_id',$code)->where('stage',6)->first();
    if (!$proShop) {
      $proShop3=proShop::where('order_id',$code)->where('stage',4)->first();
      if($proShop3){
        return response()->json(['errors' => ['codePro' => ['مبلغ این محصول پرداخت شده است ، جهت پیگیری به صفحه پرداخت ها بروید .']]], 422);
      }
      return response()->json(['errors' => ['codePro' => ['محصولی با این کد تا کنون ارجاع نشده است .']]], 422);
    }
    Cookie::queue('codeOkBackShop', 'ok');
    return $code;
  }
  public function payShop(Request $request)
  {
    $stage=$this->stage;$seller=$this->seller;$orderNum=$this->orderNum;$oldOrderNum=$this->oldOrderNum;$buyOrderNum=$this->buyOrderNum;$payOrderNum=$this->payOrderNum;$backOrderNum=$this->backOrderNum;
    $order_id=$request->order_id;
    $codeOkPayShop=$request->cookie('codeOkPayShop');
    $namePayShop=$request->cookie('namePayShop');
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->format('Y/n/j');
    $dateC=$dateA->yesterday()->format('Y/n/j');
    $date30=$dateA->subDay(30)->format('Y/n/j');
    $date1=$request->cookie('date1PayShop');
    $date2=$request->cookie('date2PayShop');
    if(!empty($namePayShop)){
      if (!empty($date1)&&!empty($date2)) {
        $proShop=ProShop::where( 'name' ,"like", "%$namePayShop%")->whereBetween('date_up', [$date1, $date2])->where('stage','4')->get();
        $sortDate='slicing';
        $erorrPayShop='در بازه زمانی مورد نظر برای این محصول پرداختی انجام نشده است .';
      }
      else {
        $proShop=ProShop::where( 'name' ,"like", "%$namePayShop%")->whereBetween('date_up', [$date30,$dateB])->where('stage','4')->get();
        $sortDate='پرداخت های 30 روز اخیر';
        $erorrPayShop='در 30 روز اخیر برای این محصول پرداختی انجام نشده است .';
      }
      $search_pro='محصول ' . $namePayShop;
    }
    else{
      if (!empty($date1)&&!empty($date2)) {
        $proShop=ProShop::whereBetween('date_up', [$date1, $date2])->where('stage','4')->get();
        $sortDate='slicing';
        $erorrPayShop='در بازه زمانی مورد نظر پرداختی انجام نشده است .';
       }
      else {
        $proShop=ProShop::whereBetween('date_up', [$date30,$dateB])->where('stage','4')->get();
        $sortDate='پرداخت های 30 روز اخیر';
        $erorrPayShop='طی 30 روز اخیر پرداختی انجام نشده است .';
      }
      $search_pro='همه محصولات';
    }
    $payShop=PayShop::first();
    if ($order_id) {
      $proShop2=ProShop::where('order_id',$order_id)->where('stage','4')->first();
    }
    return view('shop.payShop',compact('stage','seller','orderNum','oldOrderNum','buyOrderNum','payOrderNum','backOrderNum','proShop','payShop','order_id','proShop2','search_pro','sortDate','date1','date2','erorrPayShop'));
  }
  public function SearchNamePayShop(Save_namePayShop $request)
  {
    $namePro=$request->namePro;
    Cookie::queue('namePayShop', $namePro);
  }
  public function SearchAllNamePayShop()
  {
    Cookie::queue('namePayShop', '',time() - 3600);
  }
  public function SearchDateSortPayShop(Save_searchDateShop $request)
  {
    $date1=$request->date1;
    $date2=$request->date2;
    Cookie::queue('date1PayShop', $date1);
    Cookie::queue('date2PayShop', $date2);
  }
  // 30 روزه
  public function SearchAllDatePayShop()
  {
    Cookie::queue('date1PayShop', '',time() - 3600);
    Cookie::queue('date2PayShop', '',time() - 3600);
  }
  public function SearchPayShop(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('order_id',$code)->where('stage',4)->first();
    if (!$proShop) {
      $proShop2=proShop::where('order_id',$code)->where('stage',3)->first();
      $proShop3=proShop::where('order_id',$code)->where('stage',6)->first();
      if($proShop2){
        return response()->json(['errors' => ['codePro' => ['مبلغ این محصول تا کنون پرداخت نشده است .']]], 422);
      }
      if($proShop3){
        return response()->json(['errors' => ['codePro' => ['این کالا برگشت خورده است ، جهت پیگیری به صفحه محصولات مرجوعی بروید .']]], 422);
      }
      return response()->json(['errors' => ['codePro' => ['کد محصول اشتباه است .']]], 422);
    }
    Cookie::queue('codeOkPayShop', 'ok');
    return $code;
  }
  public function searchProSStock(Request $request)
  {
    return view('shop.searchProSStock');
  }
public function searchProSUnStock(Request $request)
{
  $id=$this->id;
  $this->validate($request, [
        'pro' => 'required|alpha_dash',
        'order_id' => 'required|numeric',
    ]);
  $pro=$request->pro;
  $order_id=$request->order_id;
  $proShop=proShop::where('shop_id',$id)->where('show',1)->where( 'name' ,"like", "%$pro%")->get();
  $stampProOrder=StampProOrder::where('order_id' , $order_id)->where('shop_id' , $id)->get();
  $check=1;
  return view('shop.searchProSUnStock',compact('proShop','check','order_id','stampProOrder'));
}
public function searchIdSUnStock(Request $request)
{
  $id=$this->id;
  $this->validate($request, ['pro_id' => 'required|numeric','order_id' => 'required|numeric',]);
  $pro_id=$request->pro_id;
  $order_id=$request->order_id;
  $checkPro=StampProOrder::where('order_id', $order_id)->where('proShop_id', $pro_id)->where('shop_id', $id)->first();
  if (!empty($checkPro)) {
    $checkPro2='no';
  } else {
    $proShop=proShop::where('id',$pro_id)->where('shop_id',$id)->where('show',1)->first();
    if (!empty($proShop->id)) {$picture_shop=Picture_shop::where('pro_shop_id', $proShop->id)->first();}
  }
  $check=2;
  return view('shop.searchProSUnStock',compact('proShop','check','checkPro2','picture_shop','order_id'));
}
}//end class
