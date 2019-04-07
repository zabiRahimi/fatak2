<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Pro;
use App\Models\Shop;
use App\Models\Buy;
use App\Http\Requests\Save_data_buyer;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
class SabadController extends Controller
{
  // اضافه کردن کالا به سبد خرید
  public function add_pro_sabad (Request $request ){
    $id=$request->id;
    $nameCookei='addpro'. $id;
    if(empty($request->cookie($nameCookei))){
      if (empty($request->cookie('id_pros'))) {
        $idPro=[$id];
        Cookie::queue('id_pros', serialize($idPro));
      } else {
        $idPro=unserialize($request->cookie('id_pros'));
        $idPro[]=$id;
        Cookie::queue('id_pros', serialize($idPro));
      }
      Cookie::queue($nameCookei, 'hast');
      if(empty($request->cookie('numpro'))){
        Cookie::queue('numpro', 1);
        $num=1;
      }else{
        $numadd=$request->cookie('numpro')+1;
        Cookie::queue('numpro', $numadd);
        $num=$request->cookie('numpro')+1 ;
      }
      return $num;
    }
  }
  //مشاهده سبد خرید
  public function show_sabad_pro(Request $request){
    if (!empty($request->del_id)) {
      $nameCookei='addpro'. $request->del_id;
      Cookie::queue($nameCookei, '' , time() - 3600);
      Cookie::queue('vazn' . $request->del_id , '', time() - 3600);
      Cookie::queue('pakat' . $request->del_id , '', time() - 3600);
      $id_pros=unserialize($request->cookie('id_pros'));
      if(count($id_pros)==1) {
        Cookie::queue('id_pros', '', time() - 3600);
        Cookie::queue('numpro', '', time() - 3600);
      }else{
        foreach ($id_pros as $key) {
          if($key==$request->del_id){
            continue;
          }
          $val[]=$key;
          Cookie::queue('id_pros', serialize($val));
          Cookie::queue('vazn' . $key, '', time() - 3600);
          Cookie::queue('pakat' . $key, '', time() - 3600);
        }
      $num_pro=$request->cookie('numpro');
      $num_pro--;
      Cookie::queue('numpro', $num_pro);
      }
      return redirect('/show_sabad_pro');
    }
    $show_sabad_pro=Pro::get();
    $id_pros=unserialize($request->cookie('id_pros'));
      //جهت اسلایدر محصولات
    if(!empty($request->cookie('numpro'))){$num_pro=$request->cookie('numpro');}else{$num_pro=0;}
    $shop=Shop::get();
    $check=$request->cookie('check_log');
    return view('pro.show_sabad_pro', compact('show_sabad_pro','id_pros','shop','num_pro','check'));
  }
  //کم یا زیاد کردن تعدادخرید یک محصول
  public function num_pro_sabad_add(Request $request){
    $vazn_id='vazn' . $request->id;
    $gram_post=$request->gram_post;
    $old_gram=$request->cookie($vazn_id);
    $num=$request->num;
    $pakat=$request->pakat;
    $pakat_id='pakat' . $request->id;
    $old_pakat=$request->cookie($pakat_id);
    if ($request->add_cut=='add') {
      $num++;
      //جهت تنظیم وزن یک محصول
      $new_gram=$old_gram+$gram_post;
      $new_pakat=$old_pakat+$pakat;
      Cookie::queue($vazn_id, $new_gram);//استفاده در فایلهای پست پیشتاز و ویژه
      Cookie::queue($pakat_id, $new_pakat);
    } else {
      $num--;
      //جهت تنظیم وزن یک محصول
      $new_gram=$old_gram-$gram_post;
      $new_pakat=$old_pakat-$pakat;
      Cookie::queue($vazn_id, $new_gram);//استفاده در فایلهای پست پیشتاز و ویژه
      Cookie::queue($pakat_id, $new_pakat);
    }
  //ذخیره تعداد محصول خریداری  شده
  $num_id='num' . $request->id;
  Cookie::queue($num_id, $num);
  return $num;
 }
 //مجموع قیمت جدید برای محصولی که کاربر مبادرت به خرید بیشتر از یک کالا نموده
   public function new_price(Request $request){
     $num=$request->num;
     $vahed_price=$request->vahed_price;
     $new_price=number_format($num*$vahed_price);
     return $new_price;
   }
 //مجموعه قیمت همه کالاهای داخل سبد
   public function new_all_price(Request $request){
     $vahed_price=$request->vahed_price;
     $old_all_price=str_replace (',' ,'',$request->old_all_price);
     if ($request->add_cut=='add') {
       $total=$old_all_price+$vahed_price;}
     else{
       $total=$old_all_price-$vahed_price;
     }
     $new_all_price=number_format($total);
     return $new_all_price;
   }
   //مجموع وزن پستی در سبد خرید
   public function sum_gram_post(Request $request){
     $gram_post=$request->gram_post;
     $old_gram=$request->old_gram;
     if ($request->add_cut=='add') {
       $total=$old_gram+$gram_post;}
     else{
       $total=$old_gram-$gram_post;
     }
    return $total;
   }
   public function post_pishtaz(Request $request){
     $id_city=$request->id_city;
     $id_ostan=$request->id_ostan;
     return view('post_pishtaz', compact('id_city' , 'id_ostan' ));
     }
   public function post_sefareshi(Request $request){
       $id_ostan=$request->id_ostan;
       $id_city=$request->id_city;
       $city=$request->city;
       return view('post_sefareshi', compact('id_ostan' , 'id_city' , 'city'));
       }
  //هزینه نهایی در سبد خرید
   public function end_price_all(Request $request){
        $price_pros=str_replace (',' ,'',$request->price_pros);
        $price_post=str_replace (',' ,'',$request->price_post);
        Cookie::queue('model_post', $request->model_post);
        $all=$price_pros+$price_post;
        return number_format($all);
       }
       //مشاهده فاکتور خرید و ثبت اطلاعات پستی خریدار
   public function show_factor_buy(Request $request){
         $id_pros=unserialize($request->cookie('id_pros'));
         $num_pro=$request->cookie('numpro');
         $factor_buy=$request->cookie('factor_buy');
         if(!empty($id_pros)and!empty($factor_buy)){
         Cookie::queue('factor_buy','',time() - 3600);
         $show_sabad_pro=Pro::get();
         $check=$request->cookie('check_log');
         return view('pro.factor_buy', compact('id_pros','num_pro','show_sabad_pro','check'));
       }else{
         return redirect('/');
       }
       }
  //ذخیره اطلاعات خریدار
   public function save_data_buyer(Save_data_buyer $request){
     $name=$request->name;
     $mobail=$request->mobail;
     if(preg_match('/^[0-9]{10}$/', $mobail)){$mobail=0 . $mobail;}
     $tel=$request->tel;
     $email=$request->email;
     $ostan=$request->ostan;
     $city=$request->city;
     $codepost=$request->codepost;
     $address=$request->address;
     $post=$request->cookie('model_post2');
     $show_pro=Pro::get();
     $date1=new Verta();//تاریخ جلالی
     $date=$date1->format('Y/n/j');
     $sabad=unserialize($request->cookie('id_pros'));
     foreach ( $sabad as $value) {
       $value2=Pro::find($value);
       $name_pro[]=$value2->name;
       Cookie::queue('end_name_pro', serialize($name_pro));
       $seller=$value2->seller;
             $num_id='num' . $value;
              $num_pro=$request->cookie($num_id);
             $shop=Shop::where('shop' ,$seller)->first();
             $shop_id=$shop->id;
             $other_pro=1;//هنوز حل نشده
             if ($post=='سفارشی') {
               $price_post=$request->cookie('price_sefareshi_one' . $value);
             } else {
               $price_post=$request->cookie('price_pishtaz_one' . $value);
              }
            $scot=0;
            $paywork=1000*$num_pro;
            $all_price=$num_pro*$value2->price;
            $amount=$all_price+$price_post+$paywork+$scot;
     $add=new Buy();
     $add->name=$name;
     $add->mobail=$mobail;
     $add->tel=$tel;
     $add->email=$email;
     $add->ostan=$ostan;
     $add->city=$city;
     $add->codepost=$codepost;
     $add->address=$address;
     $add->post=$post;
     $add->pro_id=$value;
     $add->num_pro=$num_pro;
     $add->shop_id=$shop_id;
     $add->other_pro=$other_pro;
     $add->price_post=$price_post;
     $add->scot=$scot;
     $add->paywork=$paywork;
     $add->amount=$amount;
     $add->date=$date;
     $add->stage=0;
     $add-> save();
   }
   if($add-> save()==true){
     Cookie::queue('numpro', '', time() - 3600);
     Cookie::queue('id_pros', '', time() - 3600);
     Cookie::queue('model_post', '', time() - 3600);
   }
  }
  //ثبت نهایی خرید و پرداخت آنلاین
   public function end_buy(Request $request){
        return view('pro.end_buy');
      }
  public function pardakht(Request $request){
        $pro=$request->pro;
        return $pro;
      }
  public function create_cookie(Request $request){
            $name_cookie=$request->name_cookie;
            Cookie::queue($name_cookie, 'ok');
          }
}//end class
