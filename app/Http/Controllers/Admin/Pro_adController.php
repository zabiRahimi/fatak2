<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Imgpro;
use App\Models\Pro;
use App\Models\PicturePro;
use App\Http\Requests\Save_add_pro_admin;//نکته مهم چون فایلهای کنترلر ادمین در یک پوشه مجزا هست برای کار کردن فرم درخواست باید فایل فرم درخواست را یوز کنیم
class Pro_adController extends Controller
{
  public function show(Request $request){
    // $show_img=Imgpro::where('show' , 1)->get();
    // return view('management.pro_admin.pro_admin' , compact('show_img'));

    return view('management.pro_admin.pro_admin');
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
public function save_add_pro1(Save_add_pro_admin $request){

  $old_price = (empty($request->old_price)) ? 0 : $request->old_price ;
  $pro=new Pro();
  $pro->name = $request->name ;
  $pro->dis = $request->dis ;
  $pro->price = $request->price ;

  $pro->old_price = $old_price ;
  $pro->gram = $request->gram ;
  $pro->gram_post = $request->gram_post ;
  $pro->pakat_price = $request->pakat_price ;
  $pro->views =1 ;
  $pro->seller = $request->seller ;
  $pro->show = 1;
  $pro-> save();

   //اضافه کردن عکسهای محصول
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
}
