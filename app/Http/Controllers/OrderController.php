<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\pro;
use App\Models\Shop;
use App\Models\StampPost;
use App\Models\PicturePro;
use App\Models\Post;
use App\Models\Buyer;
use App\Models\Buy;
use App\Models\StampProOrder;

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
      $date=$date1->formatJalaliDate();
      $save=new Order();
      $save->name=$request->namePro;
      $save->squad=$request->squad;
      $save->vahed=$request->vahedPro;
      $save->num=$request->numPro;
      $save->dis=$request->dis;
      $save->mobail=$request->mobail;
      $save->ostan=$request->ostan;
      $save->city=$request->city;
      $save->date_ad=time();
      $save->date_up=time();
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
      // $this->validate($request, ['order_id'=>'required|numeric']);
      // $this->validate($request, ['order_id'=>'required',]);

      $order_id=$request->order_id;
      $order=Order::find($order_id);
      if(!empty($order->id_pro) and count(json_decode($order->id_pro))>0){
      $id_pro=json_decode($order->id_pro);
      $pro=Pro::get();
      $pro_count=count($id_pro);//تعداد محصولات
      foreach ($id_pro as $value) {//تعین تعداد فروشگاه
        $idShop=pro::find($value);
        $shop_count1[]=$idShop->shop_id;
      }
      $shop_count1=array_unique($shop_count1);//حذف عناصر تکراری از آرایه
      $shop_count=count($shop_count1);//تعداد فروشنده ها

    }else{
      $pro=null;
      $pro_count=null;
      $shop_count=null;
      $id_pro=null;
    }
    $img=PicturePro::first();
    $shop=Shop::first();
    $stampProOrder=StampProOrder::where('order_id',$order_id)->get();
      return view('order.showOrder',compact('pro','img','shop','stampProOrder','order_id','pro_count','shop_count','id_pro'));
    }
    public function showOneOrder(Request $request)
    {
      $id=$request->id;
      $order_id=$request->order_id;
      $show_pro=pro::find($id);
      $pic_pro=PicturePro::where('pro_id',$id)->first();
      $stampProOrder=StampProOrder::where('order_id',$order_id)->where('pro_id',$show_pro->id)->where('shop_id',$show_pro->shop_id)->first();
      $shop=Shop::find($show_pro->shop_id);
      return view('order.showOneOrder',compact('show_pro','pic_pro','shop','order_id','stampProOrder'));
    }
    public function showSabadOrder(Request $request)
    {
      $pro_id=$request->pro_id;
      $order_id=$request->order_id;
      $show_pro=pro::find($pro_id);
      $stampPost=StampPost::where('pro_id',$pro_id)->first();
      // $stampProOrder=StampProOrder::where
      $shop=Shop::find($show_pro->shop_id);
      $order=Order::find($order_id);
      $stampProOrder=StampProOrder::where('order_id',$order_id)->where('pro_id',$pro_id)->where('shop_id',$shop->id)->first();
      // $stampProOrder2=DB::table('stamp_pro_orders')->select('*')->get();;
      $stampProOrder2=$stampProOrder ->makeHidden(['stamp','show']) -> toArray();
      $price=(!empty($stampProOrder->price)) ? $stampProOrder->price : $show_pro->price ;
      $dataPro=$show_pro->makeHidden(['typePro','maker','brand','model','price','vazn','dis','dateMake','dateExpiration','term','offerOrder','bazdid','numBuy','date_ad','date_up','seo','show']) ->toArray();
      $dataPro['price']=$price;
      $dataPro['num_buy']=1;
      $dataPro['order_id']=$order_id;

      // $arrayProChild=['pro_id'=>$pro_id,'shop_id'=>$shop->id,'num_buy'=>1,'price_pro'=>$price];

      // if ($request->cookie('dataPro')) {Cookie::queue('dataPro', '' , time() - 3600);}
      // نکته : چنانچه چند محصول باشد باید از آرایه دو بعدی اسبفاده شود
       Cookie::queue('dataPro',serialize($dataPro));
       // if ($request->cookie('dataPro')) {
       //    $arrayPro=unserialize( $request->cookie('dataPro'));
       //    $arrayPro[$pro_id]=$arrayProChild;
       //    Cookie::queue('dataPro',serialize($arrayPro));
       // }else{
       //   $arrayPro=[$pro_id=>$arrayProChild];
       //   Cookie::queue('dataPro',serialize($arrayPro));
       // }

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
        // switch ($ostan_id_buyer) {
        //   case 'اردبیل':$javar_name=['آذربایجان شرقی','زنجان','گیلان'];break;
        //   case 'اصفهان':$javar_name=['چهار محال بختیاری','خراسان جنوبی','سمنان','فارس','قم','کهگیلویه و بویراحمد','لرستان','مرکزی','یزد'];break;
        //   case 'البرز':$javar_name=['تهران','قزوین','مازندران','مرکزی'];break;
        //   case 'ایلام':$javar_name=['خوزستان','کرمانشاه','لرستان'];break;
        //   case 'آذربایجان شرقی':$javar_name=['اردبیل','آذربایجان غربی','زنجان'];break;
        //   case 'آذربایجان غربی':$javar_name=['آذربایجان شرقی','زنجان','کردستان'];break;
        //   case 'بوشهر':$javar_name=['خوزستان','فارس','هرمزگان','کهگیلویه و بویراحمد'];break;
        //   case 'تهران':$javar_name=['البرز','سمنان','قم','مازندران','مرکزی'];break;
        //   case 'چهار محال بختیاری':$javar_name=['اصفهان','خوزستان','کهگیلویه و بویراحمد','لرستان'];break;
        //   case 'خراسان جنوبی':$javar_name=['اصفهان','خراسان رضوی','سمنان','سیستان و بلوچستان','کرمان','یزد'];break;
        //   case 'خراسان رضوی':$javar_name=['خراسان جنوبی','خراسان شمالی','سمنان'];break;
        //   case 'خراسان شمالی':$javar_name=['خراسان رضوی','سمنان','گلستان'];break;
        //   case 'خوزستان':$javar_name=['ایلام','بوشهر','چهار محال بختیاری','کهگیلویه و بویراحمد','لرستان'];break;
        //   case 'زنجان':$javar_name=['اردبیل','آذربایجان غربی','آذربایجان شرقی','قزوین','کردستان','گیلان','همدان'];break;
        //   case 'سمنان':$javar_name=['اصفهان','تهران','خراسان جنوبی','خراسان رضوی','خراسان شمالی','قم','گلستان','مازندران'];break;
        //   case 'سیستان و بلوچستان':$javar_name=['خراسان جنوبی','کرمان','هرمزگان'];break;
        //   case 'فارس':$javar_name=['اصفهان','بوشهر','کرمان','کهگیلویه و بویراحمد','هرمزگان','یزد'];break;
        //   case 'قزوین':$javar_name=['البرز','زنجان','گیلان','مازندران','مرکزی','همدان'];break;
        //   case 'قم':$javar_name=['اصفهان','تهران','سمنان','مرکزی'];break;
        //   case 'کردستان':$javar_name=['آذربایجان غربی','زنجان','کرمانشاه','همدان'];break;
        //   case 'کرمان':$javar_name=['خراسان جنوبی','سیستان و بلوچستان','فارس','هرمزگان','یزد'];break;
        //   case 'کرمانشاه':$javar_name=['ایلام','کردستان','لرستان','همدان'];break;
        //   case 'کهگیلویه و بویراحمد':$javar_name=['اصفهان','بوشهر','چهار محال بختیاری','خوزستان','فارس'];break;
        //   case 'گلستان':$javar_name=['خراسان شمالی','سمنان','مازندران'];break;
        //   case 'گیلان':$javar_name=['اردبیل','زنجان','قزوین','مازندران'];break;
        //   case 'لرستان':$javar_name=['اصفهان','ایلام','چهار محال بختیاری','خوزستان','کرمانشاه','مرکزی','همدان'];break;
        //   case 'مازندران':$javar_name=['البرز','تهران','سمنان','قزوین','گلستان','گیلان'];break;
        //   case 'مرکزی':$javar_name=['اصفهان','البرز','تهران','قزوین','قم','لرستان','همدان'];break;
        //   case 'هرمزگان':$javar_name=['بوشهر','سیستان و بلوچستان','فارس','کرمان'];break;
        //   case 'همدان':$javar_name=['زنجان','قزوین','کردستان','کرمانشاه','لرستان','مرکزی'];break;
        //   case 'یزد':$javar_name=['اصفهان','خراسان جنوبی','فارس','کرمان'];break;
        // }
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
        // $priceSefarshi=12000;
        $priceAmanat=$sefarshi->$gram + $show_pro->pakat;
        // $priceAmanat=25000;
        $pricePishtaz=$pishtaz->$gram + $show_pro->pakat;
        // $pricePishtaz=80000;
      }else{$priceSefarshi=0;$pricePishtaz=0;}
      $pricePost=[1=>$priceAmanat,2=>$priceSefarshi,3=>$pricePishtaz];
      Cookie::queue('pricePost', serialize($pricePost));
      // Cookie::queue('priceAmanat', $priceAmanat);
      // Cookie::queue('priceSefarshi', $priceSefarshi);
      // Cookie::queue('pricePishtaz', $pricePishtaz);
      return view('order.showSabadOrder',compact('show_pro','price','shop','order_id','stampPost','priceSefarshi','priceAmanat','pricePishtaz','dataPro'));
    }



    public function end_price_all(Request $request)  {
      $this->validate($request, ['modelPost'=>'required|numeric']);
      Cookie::queue('modelPost', $request->modelPost);

    }
    //حساب کردن قیمت پست کالا هنگامی که کاربر مبادرت به خرید بیش از یک کالا می نمایید .
    public function pricePostOrder(Request $request)
    {
      $id=$request->id;
      $order_id=$request->order_id;
      $num=$request->num;
      $num2=$request->num;
      $num3=$request->num;
      $show_pro=pro::find($id);
      $shop=Shop::find($show_pro->shop_id);
      $order=Order::find($order_id);
      $dataPro=unserialize($request->cookie('dataPro'));
      $dataPro['num_buy']=$num;
      Cookie::queue('dataPro' , serialize($dataPro));
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
      // $show_pro=pro::find($id);
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
      // $pricePost=[$priceAmanat,$priceSefarshi,$pricePishtaz];
      $pricePost=[1=>$priceAmanat,2=>$priceSefarshi,3=>$pricePishtaz];
      Cookie::queue('pricePost', serialize($pricePost));
      // Cookie::queue('priceSefarshi', $priceSefarshi);
      // Cookie::queue('priceAmanat', $priceAmanat);
      // // Cookie::queue('pricePishtaz', '' , time() - 3600 );
      // Cookie::queue('pricePishtaz', $pricePishtaz);
      // $pricePishtaz=0;
      $data=[$priceSefarshi,$priceAmanat,$pricePishtaz];
      return $data;
    }
    public function factor_order(Request $request)
    {
      $dataPro=unserialize($request->cookie('dataPro'));
      $pricePost=unserialize($request->cookie('pricePost'));
      $modelPost=$request->cookie('modelPost');
      // $pro_shop=pro::find($id);
      $shop=Shop::find($dataPro['shop_id']);
      $order=Order::find($dataPro['order_id']);
      $price=$dataPro['num_buy'] * $dataPro['price'];
      $postName=StampPost::where('order_id',$dataPro['order_id'])->where('shop_id',$dataPro['shop_id'])->where('pro_id',$dataPro['id'])->first();

      switch ($modelPost) {
        case 1:$post2='پست امانت';$price_post=$pricePost[1]; break;
        case 2:$post2='پست سفارشی';$price_post=$pricePost[2]; break;
        case 3:$post2='پست پیشتاز';$price_post=$pricePost[3]; break;
        case 5:$post2='حضوری';$price_post=0;break;
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
      // Cookie::queue('numProOrder', $num);
      return view('order.factor_order',compact('dataPro','modelPost','shop','order','price','post2','price_post','payWork','allPrice','dataPro','pricePost'));
    }
    //ذخیره اطلاعات خریدار محصول سفارشی
public function save_data_buyerOrder(Save_data_buyer $request){
  // نکته بسیار مهم : این متد دقیقا مثل متد ذخیره اطلاعات خریدار در کنترلر سبدکنترل عمل می کند و همه چیز آن برابر می باشد و در یک جدول ذخیره می شوند پس هنگام هر گونه تغییرات باید آن متد را نیز در نظر گرفت
    // $num_pro=$request->cookie('numProOrder');
    // $pricePost=$request->cookie('pricePostOrder');
    $dataPro=unserialize($request->coolie('dataPro'));

    $pricePost=$request->cookie('pricePost');
    $pro_id=$request->pro_id;
    $order_id=$request->order_id;
    $pro=pro::find($pro_id);
    // $date1=new Verta();//تاریخ جلالی
    // $date=$date1->format('Y/n/j');
    $scot=0;
    $priceAll=$dataPro['num_buy'] * $dataPro['price'] ;
    $paywork=($priceAll + $pricePost) * 2 /100 + 2000;

    $amount=$priceAll + $pricePost + $paywork;

    try{
        DB::beginTransaction();
    $add=new Buyer();
    $add->typeBuy=$request->typeBuy;
    $add->order_id=$order_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;//
    $add->tel=$request->tel;//
    $add->email=$request->email;//
    $add->ostan=$request->ostan;//
    $add->city=$request->city;//
    $add->codepost=$request->codepost;//
    $add->address=$request->address;//
    $add->post=$request->cookie('postOrder');
    $add->price_post=$pricePost;
    $add->price_pro=$priceAll;
    $add->scot=$scot;
    $add->paywork=$paywork;
    $add->amount=$amount;
    $add->date_ad=time();
    $add->date_up=time();
    $add->stage=0;
    $add-> save();
    if(!empty($add->id)){
      Cookie::queue('amountOrder', $amount );
      Cookie::queue('proOrder', $pro->name);
      Cookie::queue('buyOrder_id', $add->id);
      Cookie::queue('pro_id', $pro->id);
      Cookie::queue('postOrder', '' , time() - 3600);
      Cookie::queue('pricePostOrder', '' , time() - 3600);
      Cookie::queue('numProOrder', '' , time() - 3600);
    }
    // $pro=pro::find($pro_id);
    $arrayPro=unserialize($request->cookie('dataPro'));
    $saveBuy=new Buy();
    $saveBuy->buyer_id=$add->id;
    $saveBuy->pro_id=$arrayPro[$pro->id]['pro_id'];
    $saveBuy->shop_id=$arrayPro[$pro->id]['shop_id'];
    $saveBuy->num_buy=$arrayPro[$pro->id]['num_buy'];
    $saveBuy->price_pro=$arrayPro[$pro->id]['price_pro'];
    // $saveBuy->buyer_id=1;
    // $saveBuy->pro_id=1;
    // $saveBuy->shop_id=2;
    // $saveBuy->num_pro=3;
    // $saveBuy->price_pro=4;
    $saveBuy->date_up=time();
    $saveBuy->stage=1;
    $saveBuy->salve();
    // if(empty($saveBuy->id)){
    //   Throw new Execption('no');
    //
    // }else{DB::commit();}
    DB::commit();
    }
    catch ( Exception  $e){
      DB::rollBack();
      return response()->json(['errors' => ['no_mobail' => ["$e"]]], 422);

    }
}
public function payBuyOrder(Request $request)
{
  $amount=$request->cookie('amountOrder');
  $proOrder=$request->cookie('proOrder');
  $buyOrder_id=$request->cookie('buyOrder_id');
  $pro_id=$request->cookie('pro_id');
  return view('order.payBuyOrder',compact('amount','proOrder','buyOrder_id','pro_id'));
}
public function delBuyOrder(Request $request)
{
  $id=$request->id;
  $del=BuyOrder::find($id);
  $del->delete();
}
  }//end class
