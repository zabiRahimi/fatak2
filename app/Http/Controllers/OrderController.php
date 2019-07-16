<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProShop;
use App\Models\Shop;
use App\Models\StampPost;
use App\Models\Picture_shop;
use App\Models\Post;
use App\Models\BuyOrder;
use App\Http\Requests\Save_order1;
use App\Http\Requests\Save_mobail;
use App\Http\Requests\Save_searchOrderSave;
use App\Http\Requests\Save_data_buyer;
use Cookie;
use DB;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
class OrderController extends Controller
{
  public $stage;
  public $id;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    // $cookie=$request->cookie('checkLogShop');
    // if(!empty($cookie)){
    // $this->middleware(function ($request, $next){
    // $id = $request->cookie('checkLogShop');
    // $this->id=$id;
    // $user=Shop::find($id);
    // $this->stage=$user->stage;
    // return $next($request);
    //   });
      // }
  }
    public function sabtOrder(Request $request)
    {
      return view('order.sabtOrder');
    }
    public function sabtOrderSave(Save_order1 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=new Order();
      $save->name=$request->namePro;
      $save->squad=$request->squad;
      $save->vahed=$request->vahedPro;
      $save->num=$request->numPro;
      $save->dis=$request->dis;
      $save->mobail=$request->mobail;
      $save->ostan=$request->ostan;
      $save->city=$request->city;
      $save->date_ad=$date;
      $save->date_up=$date;
      $save->stage=1;
      $save->show=1;
      $save->Save();
      return $save->id;
    }
    public function searchOrder(Request $request)
    {
      return view('order.searchOrder');
    }
    public function mobailSearchOrder(Save_mobail $request)
    {
      $mobail=$request->mobail;
      $pro=Order::where('mobail', $mobail)->get();
      if(empty($pro[0]->id)){
        return response()->json(['errors' => ['no_mobail' => ['با این شماره موبایل تا کنون محصولی سفارش داده نشده است ، لطفا شماره موبایلی که هنگام سفارش محصول ثبت کردید را وارد کنید .']]], 422);

      }

    return view('order.proList',compact('pro'));

    }
    public function searchOrderSave(Save_searchOrderSave $request)
    {
      $id=$request->id;
      return $id;
    }
    public function showOrder(Request $request)
    {
      $order_id=$request->order_id;
      $pro=ProShop::where('order_id' , $order_id)->get();
      $pro_count=ProShop::where('order_id' , $order_id)->count();
      $shop_count=ProShop::where('order_id' , $order_id)->distinct()->count('shop_id');

      $img=Picture_shop::first();
      $shop=Shop::first();
      return view('order.showOrder',compact('pro','img','shop','pro_count','shop_count'));
    }
    public function showOneOrder(Request $request)
    {
      $id=$request->id;
      $show_pro=ProShop::find($id);


      $pic_pro=Picture_shop::where('pro_shop_id',$id)->first();
      $shop=Shop::find($show_pro->shop_id);
      return view('order.showOneOrder',compact('show_pro','pic_pro','shop'));
    }
    public function showSabadOrder(Request $request)
    {
      $id=$request->id;
      $show_pro=ProShop::find($id);
      $stampPost=StampPost::where('pro_id',$id)->first();
      $shop=Shop::find($show_pro->shop_id);
      $order=Order::find($show_pro->order_id);
      $gram=$show_pro->vaznPost;
      switch($gram){
        case $gram<501:$gram='g500';break;
        case $gram<1001:$gram='g1000';break;
        case $gram<2001:$gram='g2000';break;
        case $gram<3001:$gram='g3000';break;
        case $gram<4001:$gram='g4000';break;
        case $gram<5001:$gram='g5000';break;
        case $gram<6001:$gram='g6000';break;
        case $gram<7001:$gram='g7000';break;
        case $gram<8001:$gram='g8000';break;
        case $gram<9001:$gram='g9000';break;
        case $gram<10001:$gram='g10000';break;
        case $gram<11001:$gram='g11000';break;
        case $gram<12001:$gram='g12000';break;
        case $gram<13001:$gram='g13000';break;
        case $gram<14001:$gram='g14000';break;
        case $gram<15001:$gram='g15000';break;
        case $gram<16001:$gram='g16000';break;
        case $gram<17001:$gram='g17000';break;
        case $gram<18001:$gram='g18000';break;
        case $gram<19001:$gram='g19000';break;
        case $gram<20001:$gram='g20000';break;
        case $gram<21001:$gram='g21000';break;
        case $gram<22001:$gram='g22000';break;
        case $gram<23001:$gram='g23000';break;
        case $gram<24001:$gram='g24000';break;
        case $gram<25001:$gram='g25000';break;
        case $gram<26001:$gram='g26000';break;
        case $gram<27001:$gram='g27000';break;
        case $gram<28001:$gram='g28000';break;
        case $gram<29001:$gram='g29000';break;
        case $gram<30001:$gram='g30000';break;
        case $gram<31001:$gram='g31000';break;
        case $gram<32001:$gram='g32000';break;
        case $gram<33001:$gram='g33000';break;
        case $gram<34001:$gram='g34000';break;
        case $gram<35001:$gram='g35000';break;
        case $gram<36001:$gram='g36000';break;
        case $gram<37001:$gram='g37000';break;
        case $gram<38001:$gram='g38000';break;
        case $gram<39001:$gram='g39000';break;
        case $gram<40001:$gram='g40000';break;
        default:$gram='not';
        }
      if ($shop->ostan == $order->ostan) {
        // هم استانی
        if ($show_pro->vaznPost <= 2000) {
          // سفارشی
          $sefarshi=Post::find(1);
        }

          // امانت
          $amanat=Post::find(3);


        // پیشتاز
        $pishtaz=Post::find(5);

      }
      else{
        // غیر استان
        if ($show_pro->vaznPost <= 2000) {
          // سفارشی
          $sefarshi=Post::find(2);

        }

          // امانت
          $amanat=Post::find(4);


        // پیشتاز
        $pishtaz=Post::find(6);


      }
      if($gram != 'not'){
        $priceSefarshi=$sefarshi->$gram + $show_pro->pakat;
        $priceAmanat=$sefarshi->$gram + $show_pro->pakat;

        $pricePishtaz=$pishtaz->$gram + $show_pro->pakat;
      }else{$priceSefarshi=0;$pricePishtaz=0;}
      Cookie::queue('priceAmanat', $priceAmanat);
      Cookie::queue('priceSefarshi', $priceSefarshi);
      Cookie::queue('pricePishtaz', $pricePishtaz);
      return view('order.showSabadOrder',compact('show_pro','shop','stampPost','priceSefarshi','priceAmanat','pricePishtaz'));
    }
    public function end_price_all()  {}
    //حساب کردن قیمت پست کالا هنگامی که کاربر مبادرت به خرید بیش از یک کالا می نمایید .
    public function pricePostOrder(Request $request)
    {
      $id=$request->id;
      $num=$request->num;
      $num2=$request->num;
      $num3=$request->num;
      $show_pro=ProShop::find($id);
      $shop=Shop::find($show_pro->shop_id);
      $order=Order::find($show_pro->order_id);

      do {
        // code...
        $i=$num ;
      for ($i; $i > 0 ; $i--) {
        // $priceSefarshi=$i;
        $gram=$i * $show_pro->vaznPost;
        $gramCheck=$i * $show_pro->vaznPost;
        switch($gram){
          case $gram<501:$gram='g500';break;
          case $gram<1001:$gram='g1000';break;
          case $gram<2001:$gram='g2000';break;
          case $gram<3001:$gram='g3000';break;
          case $gram<4001:$gram='g4000';break;
          case $gram<5001:$gram='g5000';break;
          case $gram<6001:$gram='g6000';break;
          case $gram<7001:$gram='g7000';break;
          case $gram<8001:$gram='g8000';break;
          case $gram<9001:$gram='g9000';break;
          case $gram<10001:$gram='g10000';break;
          case $gram<11001:$gram='g11000';break;
          case $gram<12001:$gram='g12000';break;
          case $gram<13001:$gram='g13000';break;
          case $gram<14001:$gram='g14000';break;
          case $gram<15001:$gram='g15000';break;
          case $gram<16001:$gram='g16000';break;
          case $gram<17001:$gram='g17000';break;
          case $gram<18001:$gram='g18000';break;
          case $gram<19001:$gram='g19000';break;
          case $gram<20001:$gram='g20000';break;
          case $gram<21001:$gram='g21000';break;
          case $gram<22001:$gram='g22000';break;
          case $gram<23001:$gram='g23000';break;
          case $gram<24001:$gram='g24000';break;
          case $gram<25001:$gram='g25000';break;
          case $gram<26001:$gram='g26000';break;
          case $gram<27001:$gram='g27000';break;
          case $gram<28001:$gram='g28000';break;
          case $gram<29001:$gram='g29000';break;
          case $gram<30001:$gram='g30000';break;
          case $gram<31001:$gram='g31000';break;
          case $gram<32001:$gram='g32000';break;
          case $gram<33001:$gram='g33000';break;
          case $gram<34001:$gram='g34000';break;
          case $gram<35001:$gram='g35000';break;
          case $gram<36001:$gram='g36000';break;
          case $gram<37001:$gram='g37000';break;
          case $gram<38001:$gram='g38000';break;
          case $gram<39001:$gram='g39000';break;
          case $gram<40001:$gram='g40000';break;
          default:$gram='not';
          }
        if($gramCheck <= 2000){
          if ($shop->ostan == $order->ostan) {
            // هم استانی
              $sefarshi=Post::find(1);
              $priceSefarshi1[]=$sefarshi->$gram + $show_pro->pakat;
              break;
          }
          else{
            // غیر استان
              $sefarshi=Post::find(2);
              $priceSefarshi1[]=$sefarshi->$gram + $show_pro->pakat;
              break;
          }
        }
        else {
          continue;
        }

      }
      $num-=$i;
    } while ($num > 0);
    do {
      $i2=$num2 ;
    for ($i2; $i2 > 0 ; $i2--) {
      // $priceSefarshi=$i;
      $gram=$i2 * $show_pro->vaznPost;
      $gramCheck2=$i2 * $show_pro->vaznPost;
      switch($gram){
        case $gram<501:$gram='g500';break;
        case $gram<1001:$gram='g1000';break;
        case $gram<2001:$gram='g2000';break;
        case $gram<3001:$gram='g3000';break;
        case $gram<4001:$gram='g4000';break;
        case $gram<5001:$gram='g5000';break;
        case $gram<6001:$gram='g6000';break;
        case $gram<7001:$gram='g7000';break;
        case $gram<8001:$gram='g8000';break;
        case $gram<9001:$gram='g9000';break;
        case $gram<10001:$gram='g10000';break;
        case $gram<11001:$gram='g11000';break;
        case $gram<12001:$gram='g12000';break;
        case $gram<13001:$gram='g13000';break;
        case $gram<14001:$gram='g14000';break;
        case $gram<15001:$gram='g15000';break;
        case $gram<16001:$gram='g16000';break;
        case $gram<17001:$gram='g17000';break;
        case $gram<18001:$gram='g18000';break;
        case $gram<19001:$gram='g19000';break;
        case $gram<20001:$gram='g20000';break;
        case $gram<21001:$gram='g21000';break;
        case $gram<22001:$gram='g22000';break;
        case $gram<23001:$gram='g23000';break;
        case $gram<24001:$gram='g24000';break;
        case $gram<25001:$gram='g25000';break;
        case $gram<26001:$gram='g26000';break;
        case $gram<27001:$gram='g27000';break;
        case $gram<28001:$gram='g28000';break;
        case $gram<29001:$gram='g29000';break;
        case $gram<30001:$gram='g30000';break;
        case $gram<31001:$gram='g31000';break;
        case $gram<32001:$gram='g32000';break;
        case $gram<33001:$gram='g33000';break;
        case $gram<34001:$gram='g34000';break;
        case $gram<35001:$gram='g35000';break;
        case $gram<36001:$gram='g36000';break;
        case $gram<37001:$gram='g37000';break;
        case $gram<38001:$gram='g38000';break;
        case $gram<39001:$gram='g39000';break;
        case $gram<40001:$gram='g40000';break;
        default:$gram='not';
        }
      if($gramCheck2 <= 40000){
        if ($shop->ostan == $order->ostan) {
          // هم استانی
            $amanat=Post::find(3);
            $priceAmanat1[]=$amanat->$gram + $show_pro->pakat;
            break;
        }
        else{
          // غیر استان
            $amanat=Post::find(4);
            $priceAmanat1[]=$amanat->$gram + $show_pro->pakat;
            break;
        }
      }
      else {
        continue;
      }

    }
    $num2-=$i2;
  } while ($num2 > 0);
    // pishtaz
    do {
      $i3=$num3 ;
    for ($i3; $i3 > 0 ; $i3--) {
      // $priceSefarshi=$i;
      $gram=$i3 * $show_pro->vaznPost;
      $gramCheck3=$i3 * $show_pro->vaznPost;
      switch($gram){
        case $gram<501:$gram='g500';break;
        case $gram<1001:$gram='g1000';break;
        case $gram<2001:$gram='g2000';break;
        case $gram<3001:$gram='g3000';break;
        case $gram<4001:$gram='g4000';break;
        case $gram<5001:$gram='g5000';break;
        case $gram<6001:$gram='g6000';break;
        case $gram<7001:$gram='g7000';break;
        case $gram<8001:$gram='g8000';break;
        case $gram<9001:$gram='g9000';break;
        case $gram<10001:$gram='g10000';break;
        case $gram<11001:$gram='g11000';break;
        case $gram<12001:$gram='g12000';break;
        case $gram<13001:$gram='g13000';break;
        case $gram<14001:$gram='g14000';break;
        case $gram<15001:$gram='g15000';break;
        case $gram<16001:$gram='g16000';break;
        case $gram<17001:$gram='g17000';break;
        case $gram<18001:$gram='g18000';break;
        case $gram<19001:$gram='g19000';break;
        case $gram<20001:$gram='g20000';break;
        case $gram<21001:$gram='g21000';break;
        case $gram<22001:$gram='g22000';break;
        case $gram<23001:$gram='g23000';break;
        case $gram<24001:$gram='g24000';break;
        case $gram<25001:$gram='g25000';break;
        case $gram<26001:$gram='g26000';break;
        case $gram<27001:$gram='g27000';break;
        case $gram<28001:$gram='g28000';break;
        case $gram<29001:$gram='g29000';break;
        case $gram<30001:$gram='g30000';break;
        case $gram<31001:$gram='g31000';break;
        case $gram<32001:$gram='g32000';break;
        case $gram<33001:$gram='g33000';break;
        case $gram<34001:$gram='g34000';break;
        case $gram<35001:$gram='g35000';break;
        case $gram<36001:$gram='g36000';break;
        case $gram<37001:$gram='g37000';break;
        case $gram<38001:$gram='g38000';break;
        case $gram<39001:$gram='g39000';break;
        case $gram<40001:$gram='g40000';break;
        default:$gram='not';
        }
      if($gramCheck3 <= 8000){
        if ($shop->ostan == $order->ostan) {
          // هم استانی
            $pishtaz=Post::find(5);
            $pricePishtaz1[]=$pishtaz->$gram + $show_pro->pakat;
            break;
        }
        else{
          // غیر استان
            $pishtaz=Post::find(6);
            $pricePishtaz1[]=$pishtaz->$gram + $show_pro->pakat;
            break;
        }
      }
      else {
        continue;
      }

    }
    $num3-=$i3;
  } while ($num3 > 0);
      // $show_pro=ProShop::find($id);
      // $stampPost=StampPost::where('pro_id',$id)->first();
      // $shop=Shop::find($show_pro->shop_id);
      // $order=Order::find($show_pro->order_id);
      // $gram=$show_pro->vaznPost;
      // if($gram <= 8000){
      //   $gram_pistaz=$gram * $num;
      //   if ($gram_pistaz > 8000) {
      //
      //   }
      // }
      // $gram= $gram * $num;
      // switch($gram){
      //   case $gram<501:$gram='g500';break;
      //   case $gram<1001:$gram='g1000';break;
      //   case $gram<2001:$gram='g2000';break;
      //   case $gram<3001:$gram='g3000';break;
      //   case $gram<4001:$gram='g4000';break;
      //   case $gram<5001:$gram='g5000';break;
      //   case $gram<6001:$gram='g6000';break;
      //   case $gram<7001:$gram='g7000';break;
      //   case $gram<8001:$gram='g8000';break;
      //   case $gram<9001:$gram='g9000';break;
      //   case $gram<10001:$gram='g10000';break;
      //   case $gram<11001:$gram='g11000';break;
      //   case $gram<12001:$gram='g12000';break;
      //   case $gram<13001:$gram='g13000';break;
      //   case $gram<14001:$gram='g14000';break;
      //   case $gram<15001:$gram='g15000';break;
      //   case $gram<16001:$gram='g16000';break;
      //   case $gram<17001:$gram='g17000';break;
      //   case $gram<18001:$gram='g18000';break;
      //   case $gram<19001:$gram='g19000';break;
      //   case $gram<20001:$gram='g20000';break;
      //   case $gram<21001:$gram='g21000';break;
      //   case $gram<22001:$gram='g22000';break;
      //   case $gram<23001:$gram='g23000';break;
      //   case $gram<24001:$gram='g24000';break;
      //   case $gram<25001:$gram='g25000';break;
      //   case $gram<26001:$gram='g26000';break;
      //   case $gram<27001:$gram='g27000';break;
      //   case $gram<28001:$gram='g28000';break;
      //   case $gram<29001:$gram='g29000';break;
      //   case $gram<30001:$gram='g30000';break;
      //   case $gram<31001:$gram='g31000';break;
      //   case $gram<32001:$gram='g32000';break;
      //   case $gram<33001:$gram='g33000';break;
      //   case $gram<34001:$gram='g34000';break;
      //   case $gram<35001:$gram='g35000';break;
      //   case $gram<36001:$gram='g36000';break;
      //   case $gram<37001:$gram='g37000';break;
      //   case $gram<38001:$gram='g38000';break;
      //   case $gram<39001:$gram='g39000';break;
      //   case $gram<40001:$gram='g40000';break;
      //   default:$gram='not';
      //   }
      // if ($shop->ostan == $order->ostan) {
      //   // هم استانی
      //   if ($show_pro->vaznPost <= 2000) {
      //     // سفارشی
      //     $sefarshi=Post::find(1);
      //   }
      //   else{
      //     // امانت
      //     $sefarshi=Post::find(3);
      //   }
      //   // پیشتاز
      //   $pishtaz=Post::find(5);
      // }
      // else{
      //   // غیر استان
      //   if ($show_pro->vaznPost <= 2000) {
      //     // سفارشی
      //     $sefarshi=Post::find(2);
      //   }
      //   else{
      //     // امانت
      //     $sefarshi=Post::find(4);
      //   }
      //   // پیشتاز
      //   $pishtaz=Post::find(6);
      // }
      // if($gram != 'not'){
      //   $priceSefarshi=$sefarshi->$gram + $show_pro->pakat;
      //   $pricePishtaz=$pishtaz->$gram + $show_pro->pakat;
      // }else{$priceSefarshi=0;$pricePishtaz=0;}
      $priceSefarshi=array_sum($priceSefarshi1);
      $priceAmanat=array_sum($priceAmanat1);
      $pricePishtaz=array_sum($pricePishtaz1);
      Cookie::queue('priceSefarshi', $priceSefarshi);
      Cookie::queue('priceAmanat', $priceAmanat);
      // Cookie::queue('pricePishtaz', '' , time() - 3600 );

      Cookie::queue('pricePishtaz', $pricePishtaz);
      // $pricePishtaz=0;
      $data=[$priceSefarshi,$priceAmanat,$pricePishtaz];
      return $data;
    }
    public function factor_order(Request $request)
    {
      $id=$request->id;
      $num=$request->num;
      $post=$request->post;

      $pro_shop=ProShop::find($id);
      $shop=Shop::find($pro_shop->shop_id);
      $order=Order::find($pro_shop->order_id);
      $price=$num * $pro_shop->price;
      $postName=StampPost::where('order_id',$pro_shop->order_id)->where('shop_id',$pro_shop->shop_id)->where('pro_id',$pro_shop->id)->first();
      switch ($post) {
        case 1:$post2='پست امانت';$price_post=$request->cookie('priceAmanat'); break;
        case 2:$post2='پست سفارشی';$price_post=$request->cookie('priceSefarshi'); break;
        case 3:$post2='پست پیشتاز';$price_post=$request->cookie('pricePishtaz'); break;
        case 'public1':$post2=$postName->public1;$price_post=0;break;
        case 'public2':$post2=$postName->public2;$price_post=0; break;
        case 'public3':$post2=$postName->public3;$price_post=0; break;
        case 'public4':$post2=$postName->public4;$price_post=0; break;
        case 'public5':$post2=$postName->public5;$price_post=0; break;
        case 'public6':$post2=$postName->public6;$price_post=0; break;
        case 'company1':$post2=$postName->company1;$price_post=0; break;
        case 'company2':$post2=$postName->company2;$price_post=0; break;
        case 'company3':$post2=$postName->company3;$price_post=0; break;
        case 'company4':$post2=$postName->company4;$price_post=0; break;
        case 'company5':$post2=$postName->company5;$price_post=0; break;
        case 'company6':$post2=$postName->company6;$price_post=0; break;

      }
      $payWork=($price + $price_post) * 2 / 100 + 2000;
      $allPrice= $price + $price_post + $payWork;
      Cookie::queue('postOrder', $post2);
      Cookie::queue('pricePostOrder', $price_post);
      Cookie::queue('numProOrder', $num);

    // $r=540;
      return view('order.factor_order',compact('id','post','shop','order','num','pro_shop','price','post2','price_post','payWork','allPrice'));
    }
    //ذخیره اطلاعات خریدار
public function save_data_buyer2(Save_data_buyer $request){
    $num_pro=$request->cookie('numProOrder');
    $pricePost=$request->cookie('pricePostOrder');
    $proShop_id=$request->id;
    $proShop=ProShop::find($proShop_id);
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $scot=0;
    $priceAll=$num_pro * $proShop->price;
    $paywork=($priceAll + $pricePost) * 2 /100 + 2000;
    $amount=$priceAll + $pricePost + $paywork;
    if(empty($num_pro) or empty($pricePost)){
      return 12;
    }
    $add=new BuyOrder();
    $add->order_id=$proShop->order_id;
    $add->proShop_id=$proShop_id;
    $add->shop_id=$proShop->shop_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;//
    $add->tel=$request->tel;//
    $add->email=$request->email;//
    $add->ostan=$request->ostan;//
    $add->city=$request->city;//
    $add->codepost=$request->codepost;//
    $add->address=$request->address;//
    $add->post=$request->cookie('postOrder');
    $add->num_pro=$num_pro;
    $add->dis=$request->dis;
    $add->price_post=$pricePost;
    $add->scot=$scot;
    $add->paywork=$paywork;
    $add->amount=$amount;
    $add->date=$date;
    $add->stage=0;
    $add-> save();
    if(!empty($add->id)){
      Cookie::queue('amountOrder', $amount );
      Cookie::queue('proOrder', $proShop->name);
      Cookie::queue('buyOrder_id', $add->id);
      Cookie::queue('proShop_id', $proShop->id);
      Cookie::queue('postOrder', '' , time() - 3600);
      Cookie::queue('pricePostOrder', '' , time() - 3600);
      Cookie::queue('numProOrder', '' , time() - 3600);
    }
}
public function payBuyOrder(Request $request)
{
  $amount=$request->cookie('amountOrder');
  $proOrder=$request->cookie('proOrder');
  $buyOrder_id=$request->cookie('buyOrder_id');
  $proShop_id=$request->cookie('proShop_id');
  return view('order.payBuyOrder',compact('amount','proOrder','buyOrder_id','proShop_id'));
}
  }//end class
