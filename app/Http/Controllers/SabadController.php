<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\QuestionPro;
use App\Models\AnswerPro;
use App\Models\City;
use App\Models\Shop;
use App\Models\Post_pishtaz;
use App\Models\Post_sefareshi;
use App\Models\Buy;
use App\Http\Requests\Save_data_buyer;
use Validator;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
class SabadController extends Controller
{
  // اضافه کردن کالا به سبد خرید
  public function add_pro_sabad (Request $request ){
    $id=$request->id;
    $sabad_pro=[];
    $only_pro='only_pro' . $id;//جهت عدم اضافه کردن محصول اضافه شده
    if ($request->session()->has($only_pro)) {
      return $request->session()->get('num_pro');
    }else{
        $request->session()->put($only_pro , 'ok');
    if ($request->session()->has('sabad_pro2')) {
    $request->session()->push('sabad_pro2', $id);
    $val=$request->session()->get('sabad_pro2');
    $request->session()->put('sabad_pro2', $val);
     }else{
       $request->session()->put('sabad_pro2', [$id]);
       $request->session()->put('only_pro' . $id,[$id]);
     }
    if ($request->session()->has('num_pro')) {
    $num_pro=$request->session()->get('num_pro');
    $num_pro++;
    $request->session()->put('num_pro', $num_pro++);
     }else{
       $request->session()->put('num_pro', 1);
       $num_pro=$request->session()->get('num_pro');
     }
     return $request->session()->get('num_pro');
      }
  }
  //مشاهده سبد خرید
  public function show_sabad_pro(Request $request){
    if (!empty($request->del_id)) {
      if(count($request->session()->get('sabad_pro2'))==1) {
        $request->session()->forget('sabad_pro2');
        $request->session()->forget('num_pro');
        $request->session()->forget('only_pro' . $request->del_id);
        $request->session()->forget('vazn' . $request->del_id);
        $request->session()->forget('pakat' . $request->del_id);
      }else{
        foreach ($request->session()->get('sabad_pro2') as $key) {
          if($key==$request->del_id){
            $request->session()->forget('only_pro' . $key);
            $request->session()->forget('vazn' . $key);
            $request->session()->forget('pakat' . $key);
            continue;
          }
          $val[]=$key;
          $request->session()->put('sabad_pro2', $val);
          $request->session()->forget('vazn' . $key);
          $request->session()->forget('pakat' . $key);
        }
      $num_pro=$request->session()->get('num_pro');
      $num_pro--;
      $request->session()->put('num_pro', $num_pro++);
      }
    }
    $show_sabad_pro=Pro::get();
      //جهت اسلایدر محصولات
    $pro=Pro::where('show' , 1)->get();
    $count=Pro::where('show' , 1)->count();
    $pro_nazar=NazarPro::get();
    $pro_pic=PicturePro::get();
    $ostan=City::where('sub_ostan' , 0)->get();
    $shop=Shop::get();
    return view('pro.show_sabad_pro', compact('show_sabad_pro','pro' ,  'count' , 'pro_nazar', 'pro_pic','ostan','shop'));
  }
  //کم یا زیاد کردن تعدادخرید یک محصول
  public function num_pro_sabad_add(Request $request){
    $vazn_id='vazn' . $request->id;
    $gram_post=$request->gram_post;
    $old_gram=$request->session()->get($vazn_id);
    $num=$request->num;
    $pakat=$request->pakat;
    $pakat_id='pakat' . $request->id;
    $old_pakat=$request->session()->get($pakat_id);
    if ($request->add_cut=='add') {
      $num++;
      //جهت تنظیم وزن یک محصول
      $new_gram=$old_gram+$gram_post;
      $new_pakat=$old_pakat+$pakat;
      $request->session()->put($vazn_id, $new_gram);
      $request->session()->put($pakat_id, $new_pakat);
    } else {
      $num--;
      //جهت تنظیم وزن یک محصول
      $new_gram=$old_gram-$gram_post;
      $new_pakat=$old_pakat-$pakat;
      $request->session()->put($vazn_id, $new_gram);
      $request->session()->put($pakat_id, $new_pakat);
    }
  //ذخیره تعداد محصول خریداری  شده
  $num_id='num' . $request->id;
  $request->session()->put($num_id, $num);
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
   public function show_city(Request $request){
     $id=$request->id;
     $show_ostan_factor=City::find($id);
     $request->session()->put('add_ostan', $show_ostan_factor->city);
     $show_city=City::where('sub_ostan' , $id)->get();
    return view('show_city', compact('show_city'));
    }
   public function post_pishtaz(Request $request){
      $id=$request->id;
      $hamjavar=City::get();
      $post_pishtaz=Post_pishtaz::get();
      return view('post_pishtaz', compact('id' , 'hamjavar','post_pishtaz'));
     }
   public function post_sefareshi(Request $request){
       $id=$request->id;
       $city=$request->city;
       $hamjavar=City::get();
       $post_sefareshi=Post_sefareshi::get();
       return view('post_sefareshi', compact('id' , 'city', 'hamjavar','post_sefareshi'));
      }
  //هزینه نهایی در سبد خرید
   public function end_price_all(Request $request){
        $price_pros=str_replace (',' ,'',$request->price_pros);
        $price_post=str_replace (',' ,'',$request->price_post);
        $request->session()->put('model_post', $request->model_post);
        $all=$price_pros+$price_post;
        return number_format($all);
       }
       //مشاهده فاکتور خرید و ثبت اطلاعات پستی خریدار
   public function show_factor_buy(Request $request){

         $show_sabad_pro=Pro::get();
           //جهت اسلایدر محصولات
         $pro=Pro::where('show' , 1)->get();
         $count=Pro::where('show' , 1)->count();
         $pro_nazar=NazarPro::get();
         $pro_pic=PicturePro::get();
         $ostan=City::where('sub_ostan' , 0)->get();
         $shop=Shop::get();
         return view('pro.factor_buy', compact('show_sabad_pro','pro' ,  'count' , 'pro_nazar', 'pro_pic','ostan','shop'));
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
     $post=$request->session()->get('model_post2');
     $show_pro=Pro::get();
     $date1=new Verta();//تاریخ جلالی
     $date=$date1->format('Y/n/j');
     $dabad=$request->session()->get('sabad_pro2');

     foreach ( $dabad as $value) {
       $value2=Pro::find($value);
       $name_pro[]=$value2->name;
       $request->session()->put('end_name_pro' , $name_pro);
       $seller=$value2->seller;
             $num_id='num' . $value;
              $num_pro=$request->session()->get($num_id);
             $shop=Shop::where('shop' ,$seller)->first();
             $shop_id=$shop->id;
             $other_pro=1;//هنوز حل نشده
             if ($post=='سفارشی') {
               $price_post=$request->session()->get('price_sefareshi_one' . $value);
             } else {
               $price_post=$request->session()->get('price_pishtaz_one' . $value);
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
    }
  //ثبت نهایی خرید و پرداخت آنلاین
   public function end_buy(Request $request){

        return view('pro.end_buy');
      }
  public function pardakht(Request $request){
        $pro=$request->pro;
        return $pro;
      }
}//end class
