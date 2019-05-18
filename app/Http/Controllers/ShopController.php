<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Order;
use App\Models\ProShop;
use App\Models\Picture_shop;

use App\Http\Requests\Save_shop_1;
use App\Http\Requests\Save_shop_2;
use App\Http\Requests\Save_loginShop;
use App\Http\Requests\Save_editShop;
use App\Http\Requests\Save_editPasShop;
use App\Http\Requests\Save_proShop;

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
    $stage=$this->stage;
    $id=$this->id;
    $proShop=proShop::where('shop_id',$id)->get();
    $newOrder=Order::where('stage',1)->get();
    return view('shop.newOrderShop',compact('stage','newOrder','proShop'));
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
    return view('shop.oldOrderShopOne',compact('stage','oldOrderOne','proShopOne'));
  }
}
