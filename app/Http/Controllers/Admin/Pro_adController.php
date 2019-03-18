<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Imgpro;
use App\Models\Pro;
use App\Models\PicturePro;
use App\Http\Requests\Save_add_pro_admin;//نکته مهم چون فایلهای کنترلر ادمین در یک پوشه مجزا هست برای کار کردن فرم درخواست باید فایل فرم درخواست را یوز کنیم
use App\Http\Requests\Save_edit_pro_admin;
class Pro_adController extends Controller
{
  public function show(Request $request){
    $show_img=Imgpro::where('show' , 1)->get();
    return view('management.pro_admin.pro_admin' , compact('show_img'));
  }
public function uplod_img_pro(Request $request){
  //اعتبار سنجی
  //نکته مهم : سایز عکسها در لاراول کیلو بایت می باشد اما در دراپ زون برحسب ما بایت است . دقت شود
  //مگا بایت
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
  return view('management.pro_admin.add_pro_admin');
}
public function save_add_pro1(Save_add_pro_admin $request){

  $old_price = (empty($request->old_price)) ? NULL : $request->old_price ;
  $mavad=json_encode($request->mavad);
  $pro=new Pro();
  $pro->name = $request->name ;
  $pro->dis = $request->dis ;
  $pro->price = $request->price ;
  $pro->old_price = $old_price ;
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
public function edit_pro(Request $request ,$id){
  $pro=pro::find($id);
  $img=PicturePro::where('pro_id' , $id)->first();
  return view('management.pro_admin.one_edit_pro_admin', compact('pro' , 'img'));

}
public function save_edit_pro1(Save_edit_pro_admin $request){

  $old_price = (empty($request->old_price)) ? NULL : $request->old_price ;
  $mavad=json_encode($request->mavad);
  $id=$request->id;
  $edit=pro::find($id);

  $edit->name = $request->name ;
  $edit->dis = $request->dis ;
  $edit->price = $request->price ;
  $edit->old_price = $old_price ;
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
public function all_edit_pro(Request $request ){
  $pro=pro::get();
  return view('management.pro_admin.all_edit_pro_admin', compact('pro'));
}
}
