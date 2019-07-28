<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use Cookie;
use DB;
use App\Models\Admin\Management;
use App\Models\Admin\Imgpro;
use App\Models\Pro;
use App\Models\PicturePro;
use App\Models\Order;
use App\Models\Buy;
use App\Models\Shop;

use App\Http\Requests\Save_add_pro_admin;//نکته مهم چون فایلهای کنترلر ادمین در یک پوشه مجزا هست برای کار کردن فرم درخواست باید فایل فرم درخواست را یوز کنیم
use App\Http\Requests\Save_edit_pro_admin;
class Pro_adController extends Controller
{
  public $id ,$nameModir,$access ;
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
    return $next($request);
      });
      }
  }
  public function show(Request $request){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $show_img=Imgpro::where('show' , 1)->get();
    return view('management.pro_admin.pro_admin' , compact('id','nameModir','access','show_img'));
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
  return view('management.pro_admin.add_pro_admin',compact('id','nameModir','access'));
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
  $pro=pro::get();
  return view('management.pro_admin.all_edit_pro_admin', compact('id','nameModir','access','pro'));
}
public function edit_pro(Request $request ,$id2){
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $pro=pro::find($id2);
  $img=PicturePro::where('pro_id' , $id2)->first();
  return view('management.pro_admin.one_edit_pro_admin', compact('id','nameModir','access','pro' , 'img'));

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
  $buy=Buy::where('stage',2)->get();
  $pro=Pro::get();
  $shop=Shop::get();
  return view('management.pro_admin.orderBuy', compact('id','nameModir','access','buy','pro','shop'));

}
public function orderBuyOne(Request $request)
{
  $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
  $id_pro=$request->id_pro;
  $buy=Buy::find($id_pro);
  $pro=Pro::find($buy->pro_id);
  $shop=Shop::find($buy->shop_id);
  return view('management.pro_admin.orderBuyOne', compact('id','nameModir','access','buy','pro','shop'));
}
}//end class
