<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Cookie;
use DB;
use App\Models\Admin\Management;
use App\Models\Admin\Imgpro;
use App\Models\Pro;
use App\Models\PicturePro;
use App\Models\Order;
use App\Models\Buy;
use App\Models\Shop;
use App\Models\Admin\BackPro;

use App\Http\Requests\Save_add_pro_admin;//نکته مهم چون فایلهای کنترلر ادمین در یک پوشه مجزا هست برای کار کردن فرم درخواست باید فایل فرم درخواست را یوز کنیم
use App\Http\Requests\Save_edit_pro_admin;
use App\Http\Requests\SaveCodeOrderAdmin;
use App\Http\Requests\SaveRahgiryCodeAd;
use App\Http\Requests\SaveEditRahgiryCodeAd;
use App\Http\Requests\SaveEditStageOrderAdmin;
use App\Http\Requests\SaveOrderBackSave;
use App\Http\Requests\SaveOrderBackEdit;
class Pro_adController extends Controller
{
  public $id ,$nameModir,$access,$orderNewCount,$orderAgdamCount,$orderPostCount,$orderDeliverCount,$orderbackCount,$orderbackEndCount ;
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
    $show_img=Imgpro::where('show' , 1)->get();
    return view('management.pro_admin.pro_admin' , compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','show_img'));
  }
public function uplod_img_pro(Request $request){
  //اعتبار سنجی
  //نکته مهم : سایز عکسها در لاراول کیلو بایت می باشد اما در دراپ زون برحسب مگا بایت است . دقت شود
  $this->validate($request, [
        'file' => 'required|mimes:jpeg,jpg,png|max:3000',

    ]);
 $file=$request->file('file');

  $name= time() . $file->getClientOriginalName();
  $file->move('img_pro' , $name);
  //ذخیره نام عکس در جدول imgpros جهت نمایش هنگام آپلود عکس
  $imagpros=new Imgpro();
  $imagpros->name=$name;
  $imagpros->show=1;
  $imagpros-> save();
  return "$name";

}
public function add_pro(){
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  return view('management.pro_admin.add_pro_admin',compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount'));
}
public function save_add_pro1(Save_add_pro_admin $request){

  $old_price = (empty($request->old_price)) ? NULL : $request->old_price ;
  $mavad=json_encode($request->mavad);
  $pro=new Pro();
  $pro->name = $request->name ;
  $pro->vahed = $request->vahed ;
  $pro->dis = $request->dis ;
  $pro->price = $request->price ;
  $pro->old_price = $old_price ;
  $pro->dimension_stamp = $request->dimension_stamp;
  $pro->gram = $request->gram ;
  $pro->gram_post = $request->gram_post ;
  $pro->pakat_price = $request->pakat_price ;
  $pro->mavad = $mavad ;
  $pro->date_m = $request->date_m ;
  $pro->date_n = $request->date_n ;
  $pro->dimension = $request->dimension ;
  $pro->sponsor = $request->sponsor ;
  $pro->term = $request->term ;
  $pro->bake = $request->bake ;
  $pro->made = $request->made ;
  $pro->model = $request->model ;

  $pro->views =1 ;
  $pro->seller = $request->seller ;
  $pro->show =  $request->show ;
  $pro-> save();

   // اضافه کردن عکسهای محصول
  $picture=new PicturePro();
  $picture->pro_id =$pro->id;
  $picture->pic_b1=$request->img1 ;
  $picture->pic_s1=$request->img1 ;
  $picture->pic_b2 = (empty($request->img2)) ? NULL : $request->img2 ;
  $picture->pic_b3 = (empty($request->img3)) ? NULL : $request->img3 ;
  $picture->pic_b4 = (empty($request->img4)) ? NULL : $request->img4 ;
  $picture->pic_b5 = (empty($request->img5)) ? NULL : $request->img5 ;
  $picture->pic_b6 = (empty($request->img6)) ? NULL : $request->img6 ;

  $picture->pic_s2 = (empty($request->img2)) ? NULL : $request->img2 ;
  $picture->pic_s3 = (empty($request->img3)) ? NULL : $request->img3 ;
  $picture->pic_s4 = (empty($request->img4)) ? NULL : $request->img4 ;
  $picture->pic_s5 = (empty($request->img5)) ? NULL : $request->img5 ;
  $picture->pic_s6 = (empty($request->img6)) ? NULL : $request->img6 ;
  $picture->show = 1;

  // $pro->picture_pros()->save($picture);
  $picture->save();

}
public function all_edit_pro(Request $request ){
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $pro=pro::get();
  return view('management.pro_admin.all_edit_pro_admin', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','pro'));
}
public function edit_pro(Request $request ,$id2){
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $pro=pro::find($id2);
  $img=PicturePro::where('pro_id' , $id2)->first();
  return view('management.pro_admin.one_edit_pro_admin', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','pro' , 'img'));

}
public function save_edit_pro1(Save_edit_pro_admin $request){

  $old_price = (empty($request->old_price)) ? NULL : $request->old_price ;
  $mavad=json_encode($request->mavad);
  $id=$request->id;
  $edit=pro::find($id);

  $edit->name = $request->name ;
  $edit->vahed = $request->vahed ;
  $edit->dis = $request->dis ;
  $edit->price = $request->price ;
  $edit->old_price = $old_price ;
  $edit->dimension_stamp = $request->dimension_stamp;
  $edit->gram = $request->gram ;
  $edit->gram_post = $request->gram_post ;
  $edit->pakat_price = $request->pakat_price ;
  $edit->mavad = $mavad ;
  $edit->date_m = $request->date_m ;
  $edit->date_n = $request->date_n ;
  $edit->dimension = $request->dimension ;
  $edit->sponsor = $request->sponsor ;
  $edit->term = $request->term ;
  $edit->bake = $request->bake ;
  $edit->made = $request->made ;
  $edit->model = $request->model ;

  $edit->views =1 ;
  $edit->seller = $request->seller ;
  $edit->show = $request->show;
  $edit-> save();

  //  //اضافه کردن عکسهای محصول
  $picture=PicturePro::where('pro_id' , $id)->first();
  $picture->pro_id =$id;
  $picture->pic_b1=$request->img1 ;
  $picture->pic_s1=$request->img1 ;
  $picture->pic_b2 = (empty($request->img2)) ? NULL : $request->img2 ;
  $picture->pic_b3 = (empty($request->img3)) ? NULL : $request->img3 ;
  $picture->pic_b4 = (empty($request->img4)) ? NULL : $request->img4 ;
  $picture->pic_b5 = (empty($request->img5)) ? NULL : $request->img5 ;
  $picture->pic_b6 = (empty($request->img6)) ? NULL : $request->img6 ;

  $picture->pic_s2 = (empty($request->img2)) ? NULL : $request->img2 ;
  $picture->pic_s3 = (empty($request->img3)) ? NULL : $request->img3 ;
  $picture->pic_s4 = (empty($request->img4)) ? NULL : $request->img4 ;
  $picture->pic_s5 = (empty($request->img5)) ? NULL : $request->img5 ;
  $picture->pic_s6 = (empty($request->img6)) ? NULL : $request->img6 ;
  $picture->show = 1;
  $picture->save();

}
public function del_imgProAdmin(Request $request)
{}
//نمایش سفرشات خریداری شده
public function orderBuy(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy=Buy::where('stage',2)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.orderBuy', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

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
public function showShopPro(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $page=$request->page;
  $shop_id=$request->shop_id;
  $shop=Shop::find($shop_id);
  return view('management.pro_admin.showShopPro', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','shop','page'));
}
public function orderAghdam(Request $request)
{
  $buy_id=$request->buy_id;
  $date1=new Verta();//تاریخ جلالی
  $date=$date1->format('Y/n/j');
  $save=Buy::find($buy_id);
  $save->stage=3;
  $save->date_up=$date;
  $save->save();
}
// محصولات در دست اقدام
public function proceedPro(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy=Buy::where('stage',3)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.proceedPro', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));

}
public function proceedProOne(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $id_buy=$request->id_buy;
  $buy=Buy::find($id_buy);
  $pro=Pro::find($buy->pro_id);
  $shop=Shop::find($buy->shop_id);
  return view('management.pro_admin.proceedProOne', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
public function delBuyOrderA(Request $request)
{
  $buy_id=$request->buy_id;
  $del=Buy::find($buy_id);
  $del->delete();
}
public function backOrderBuy(Request $request)
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
public function orderErsalSabt(SaveCodeOrderAdmin $request)
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
  return view('management.pro_admin.orderErsalSabt', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
}
public function sabtCodeRahgiryAdmin(SaveRahgiryCodeAd $request)
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
public function editCodeRahgiryAdmin(SaveEditRahgiryCodeAd $request)
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
  $save->save();
}
public function orderErsalShowAll(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy=Buy::where('stage',4)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.orderErsalShowAll', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
public function orderErsalShowOne(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $id_buy=$request->id_buy;
  $buy=Buy::find($id_buy);
  $pro=Pro::find($buy->pro_id);
  $shop=Shop::find($buy->shop_id);
  return view('management.pro_admin.orderErsalShowOne', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
public function editStageOrderAdmin(SaveEditStageOrderAdmin $request)
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
public function orderSabtEnd(Request $request)
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
  return view('management.pro_admin.orderSabtEnd', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
}
public function orderSabtEndShowAll(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy=Buy::where('stage',5)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.orderSabtEndShowAll', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
public function orderSabtEndShowOne(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $id_buy=$request->id_buy;
  $buy=Buy::find($id_buy);
  $pro=Pro::find($buy->pro_id);
  $shop=Shop::find($buy->shop_id);
  return view('management.pro_admin.orderSabtEndShowOne', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
// ثبت سفارش مرجوعی
public function orderBackSabt(Request $request)
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
  return view('management.pro_admin.orderBackSabt', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy_id','buy','pro','shop'));
}
public function orderBackSave(SaveOrderBackSave $request)
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
public function orderBackShowAll(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy=Buy::where('stage',6)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.orderBackShowAll', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop'));
}
public function orderBackShowOne(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $orderNewCount=$this->orderNewCount;$orderAgdamCount=$this->orderAgdamCount;$orderPostCount=$this->orderPostCount;$orderDeliverCount=$this->orderDeliverCount;$orderbackCount=$this->orderbackCount;$orderbackEndCount=$this->orderbackEndCount;
  $buy_id=$request->buy_id;
  $buy=Buy::find($buy_id);
  $pro=Pro::find($buy->pro_id);
  $shop=Shop::find($buy->shop_id);
  $backPro=BackPro::find($buy->backPro_id);
  return view('management.pro_admin.orderBackShowOne', compact('id','nameModir','access','orderNewCount','orderAgdamCount','orderPostCount','orderDeliverCount','orderbackCount','orderbackEndCount','buy','pro','shop','backPro'));
}
// ویرایش اطلاعات سفارش مرجوعی
public function orderBackEdit(SaveOrderBackEdit $request)
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
}//end class
