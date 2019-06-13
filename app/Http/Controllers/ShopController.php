<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Order;
use App\Models\ProShop;
use App\Models\Picture_shop;
use App\Models\Buy;
use App\Models\PayShop;


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

use Cookie;
use DB;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
class ShopController extends Controller
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
    $stage=$this->stage;
    return view('shop.dashboard_shop',compact('stage'));

  }
  public function perfectDaShop(Request $request)
  {
    $stage=$this->stage;
    return view('shop.perfectDaShop',compact('stage'));
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
    $stage=$this->stage;
    return view('shop.editDaShop',compact('stage','user'));
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

  public function newOrderShop(Request $request)
  {
    $GLOBALS['ostanSeSh']  =$request->cookie('osatnShop');
    $search_ostanA =$request->cookie('osatnShop');
    $dateA=new Verta();//تاریخ جلالی
    $dateB=$dateA->format('Y/n/j');
    $dateC=$dateA->subDay()->format('Y/n/j');
    $stage=$this->stage;
    $id=$this->id;
    $date=$request->date;
    $date1=$request->cookie('date1');
    $date2=$request->cookie('date2');

    $sortDate=$request->cookie('sortdate');
    if ($date=='today' or $sortDate=='today') {
      $newOrder=Order::where('stage',1)->where('date_up',$dateB)->where(function($query){
        $ostanSeSh=$GLOBALS['ostanSeSh'];
        if(!empty($ostanSeSh) && $ostanSeSh!=='allOstan' ){$query->where('ostan', $ostanSeSh);}
      })->orderby('date_up', 'DESC')->get();
      $search_order='سفارشات امروز';
    }
    elseif ($date=='yesterday' or $sortDate=='yesterday') {

      $newOrder=Order::where('stage',1)->where('date_up' , $dateC)->where(function($query){
        $ostanSeSh=$GLOBALS['ostanSeSh'];
        if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
      })->orderby('date_up', 'DESC')->get();
      // Cookie::queue('sortdate', $date);
      $search_order='سفارشات دیروز';


    }
    elseif ($date=='slicing' or $sortDate=='slicing') {

      if (!empty($date1) && !empty($date2)) {
        $newOrder=Order::where('stage',1)->whereBetween('date_up', [$date1, $date2])->where(function($query){
          $ostanSeSh=$GLOBALS['ostanSeSh'];
          if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
        })->orderby('date_up', 'DESC')->get();
        // Cookie::queue('sortdate', $date);
        $search_order='سفارشات از تاریخ' . $date1 . 'تا' . $date2;

      }
        // $newOrder=Order::where('stage',1)->get();

    }
    else {
      $newOrder=Order::where('stage',1)->where(function($query){
        $ostanSeSh=$GLOBALS['ostanSeSh'];
        if(!empty($ostanSeSh) && $ostanSeSh != 'allOstan' ){$query->where('ostan', $ostanSeSh);}
      })->where('name' ,"like", '%نار%')->orderby('date_up', 'DESC')->get();
      // Cookie::queue('sortdate', 'all');
      $search_order='سفارشات یک ماه اخیر';

    }
    if(!empty($search_ostanA)&& $search_ostanA!='allOstan'){$search_ostan='استان '.$search_ostanA;}else { $search_ostan='همه استانها' ;  }
    $proShop=proShop::where('shop_id',$id)->get();
    return view('shop.newOrderShop',compact('stage','newOrder','proShop','search_order','sortDate','search_ostan'));
  }
public function searchSortDateShop(Request $request)
{
  $sortDate=$request->sortdate;
  Cookie::queue('sortdate', $sortDate);

}
public function searchShop(Save_searchDateShop $request)
{
  $date1=$request->date1;
  $date2=$request->date2;
  Cookie::queue('date1', $date1);
  Cookie::queue('date2', $date2);
  Cookie::queue('sortdate', 'slicing');

}
public function searchOstanShop(Request $request)
{
  $ostan=$request->ostan;
  Cookie::queue('osatnShop', $ostan);

}
  public function newOrderShopOne(Request $request)
  {
    $stage=$this->stage;
    $id=$request->id;
    $newOrderOne=Order::find($id);
    return view('shop.newOrderShopOne',compact('stage','newOrderOne'));
  }
  public function proShop(Save_proShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $pro=new ProShop();
    $pro->order_id=$request->id ;
    $pro->shop_id=$this->id ;
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
    // $pro->picture_pros()->save($picture);
    $picture->save();
  }
  public function buyProShop(Request $request)
  {
    $stage=$this->stage;
    $id=$this->id;
    $proShop=proShop::where('shop_id',$id)->where('stage',2)->get();
    return view('shop.buyProShop',compact('stage','proShop'));
  }
  public function buyProShopOne(Request $request)
  {
    $buyer_id=$request->buyer_id;
    $pro_id=$request->pro_id;
    $buyer=Buy::find($buyer_id);
    $pro=ProShop::find($pro_id);
    return view('shop.buyProShopOne',compact('stage','buyer','pro'));

  }

  public function uplodImgProSh(Request $request){
    //اعتبار سنجی
    //نکته مهم : سایز عکسها در لاراول کیلو بایت می باشد اما در دراپ زون برحسب مگا بایت است . دقت شود
    $this->validate($request, [
          'file' => 'required|mimes:jpeg,jpg,png|max:3000',
      ]);
   $file=$request->file('file');
    $name= time() . $file->getClientOriginalName();
    $file->move('img_shop' , $name);

    return "$name";

  }
  public function del_imgShop(Request $request)
  {}
  public function oldOrderShop(Request $request)
  {
    $stage=$this->stage;
    $id=$this->id;
    $proShop=proShop::where('shop_id',$id)->where('stage',1)->get();

    // $oldOrderOne=Order::find($id);
    return view('shop.oldOrderShop',compact('stage','proShop'));
  }
  public function oldOrderShopOne(Request $request)
  {
    $id_order=$request->id1;
    $id_proShop=$request->id2;
    $stage=$this->stage;
    $oldOrderOne=Order::find($id_order);
    $proShopOne=proShop::find($id_proShop);
    $proImg=Picture_shop::where('pro_shop_id', $id_proShop)->first();
    return view('shop.oldOrderShopOne',compact('stage','oldOrderOne','proShopOne','proImg','id_order','id_proShop'));
  }

  public function editProShop(Save_editProShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $pro=ProShop::find($request->id);

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
    $pro->pakat = $request->pakat ;
    $pro->dis = $request->dis ;
    $pro->dateMake = $request->dateMake ;
    $pro->dateExpiration = $request->dateExpiration ;
    $pro->term = $request->term ;
    $pro->date_up = $date ;
    $pro-> save();

     // اضافه کردن عکسهای محصول
    $picture=Picture_shop::find($request->id_img);
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

    // $pro->picture_pros()->save($picture);
    $picture->save();
  }
  public function sabtErsalShop(Request $request)
  {
    $stage=$this->stage;
    // $id=$this->id;
    $idPro=$request->idPro;
    $proShop=proShop::where('id',$idPro)->where('stage',2)->first();
    if ($proShop) {
      $buyer=Buy::where('id',$proShop->buyer_id)->first();
    }
    return view('shop.sabtErsalShop',compact('stage','idPro','proShop','buyer'));
  }
  public function sabtCodeSh(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('id',$code)->where('stage',2)->first();
    if (!$proShop) {
      $proShop2=proShop::where('id',$code)->where('stage',3)->first();

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
    $stage=$this->stage;
    $idPro=$request->idPro;
    $proShop=proShop::where('stage',3)->get();
    $proShop2=proShop::where('id',$idPro)->first();
    if ($proShop2) {
      $buyer=Buy::where('id',$proShop2->buyer_id)->first();
    }
    return view('shop.editErsalShop',compact('stage','idPro','proShop','proShop2','buyer'));

  }
  public function editCodeSh(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('id',$code)->where('stage',3)->first();
    if (!$proShop) {
      $proShop2=proShop::where('id',$code)->where('stage',2)->first();

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
    $stage=$this->stage;
    return view('shop.pigiryErsalShop',compact('stage'));
  }
  public function backErsalShop(Request $request)
  {
    $stage=$this->stage;
    return view('shop.backErsalShop',compact('stage'));
  }
  public function payShop(Request $request)
  {
    $stage=$this->stage;
    $idPro=$request->idPro;
    $proShop=ProShop::where('stage','4')->get();
    $payShop=PayShop::first();
    if ($idPro) {
      $proShop2=ProShop::where('id',$idPro)->where('stage','4')->first();

    }
    return view('shop.payShop',compact('stage','proShop','payShop','idPro','proShop2'));
  }
  public function SearchPayShop(Save_sabtCodeSh $request)
  {
    $code=$request->codePro;
    $proShop=proShop::where('id',$code)->where('stage',4)->first();
    if (!$proShop) {
      $proShop2=proShop::where('id',$code)->where('stage',3)->first();
      $proShop3=proShop::where('id',$code)->where('stage',6)->first();

      if($proShop2){
        return response()->json(['errors' => ['codePro' => ['مبلغ این محصول تا کنون پرداخت نشده است .']]], 422);

      }
      if($proShop3){
        return response()->json(['errors' => ['codePro' => ['این کالا برگشت خورده است ، جهت پیگیری به صفحه محصولات مرجوعی بروید .']]], 422);

      }
      return response()->json(['errors' => ['codePro' => ['کد محصول اشتباه است .']]], 422);

    }
    return $code;
  }

}
