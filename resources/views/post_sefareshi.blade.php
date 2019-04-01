<?php
namespace App\resource\wiews\post_sefareshi;
use Cookie;

Cookie::queue('add_city',$city);//جهت نمایش شهر در فاکتور خرید
$ostan_id_buyer=$id_ostan;//خریدار
$city_id_buyer=$id_city;

//قیمت پست سفارشی هم شهری
$price_1_sefareshi=[
  '250'=>'1820','500'=>'2120','1000'=>'2520','2000'=>'3320',
  '3000'=>'4320','4000'=>'5320','5000'=>'6320','6000'=>'7320',
  '7000'=>'8320','8000'=>'9320','9000'=>'10320','10000'=>'11320',
  '11000'=>'12320','12000'=>'13320','13000'=>'14320','14000'=>'15320',
  '15000'=>'16320','16000'=>'17320','17000'=>'18320','18000'=>'19320',
  '19000'=>'20320','20000'=>'21320','21000'=>'22320','22000'=>'23320',
  '23000'=>'24320','24000'=>'25320','25000'=>'26320'
];
//قیمت پست سفارشی هم استانی
$price_2_sefareshi=[
  '250'=>'1920','500'=>'2320','1000'=>'2820','2000'=>'3620',
  '3000'=>'4820','4000'=>'6020','5000'=>'7220','6000'=>'8420',
  '7000'=>'9620','8000'=>'10820','9000'=>'12020','10000'=>'13220',
  '11000'=>'14420','12000'=>'15620','13000'=>'16820','14000'=>'18020',
  '15000'=>'19220','16000'=>'20420','17000'=>'21620','18000'=>'22820',
  '19000'=>'24020','20000'=>'25220','21000'=>'26420','22000'=>'27620',
  '23000'=>'28820','24000'=>'30020','25000'=>'31220'
];
// قیمت سفارشی هم جوار
$price_3_sefareshi=[
  '250'=>'2020','24500'=>'2420','1000'=>'2920','2000'=>'3720',
  '3000'=>'5020','4000'=>'6320','5000'=>'7620','6000'=>'8920',
  '7000'=>'10220','8000'=>'11520','9000'=>'12820','10000'=>'14120',
  '11000'=>'16720','12000'=>'18020','13000'=>'19320','14000'=>'20620',
  '15000'=>'15420','16000'=>'21920','17000'=>'23320','18000'=>'24520',
  '19000'=>'26820','20000'=>'27120','21000'=>'28420','22000'=>'29720',
  '23000'=>'31020','24000'=>'32320','25000'=>'33620'
];
// قیمت پشتاز استان غیر هم جوار
$price_4_sefareshi=[
  '250'=>'2220','500'=>'2620','1000'=>'3220','2000'=>'4120',
  '3000'=>'5620','4000'=>'7120','5000'=>'8620','6000'=>'10120',
  '7000'=>'11620','8000'=>'13120','9000'=>'14620','10000'=>'16120',
  '11000'=>'17620','12000'=>'19120','13000'=>'20620','14000'=>'22120',
  '15000'=>'23620','16000'=>'25120','17000'=>'26620','18000'=>'28120',
  '19000'=>'29620','20000'=>'31120','21000'=>'32620','22000'=>'34120',
  '23000'=>'35620','24000'=>'37120','25000'=>'38620'
];
  //بدست آوردن آرایه استانهای همجوار و همچنین ذخیره استان خریدار جهت فاکتور خرید
switch ($ostan_id_buyer) {
  case '1':$javar_id=[5,14,25];Cookie::queue('add_ostan','اردبیل');break;
  case '2':$javar_id=[9,10,15,17,19,23,26,28,31];Cookie::queue('add_ostan','اصفهان');break;
  case '3':$javar_id=[8,18,27,28];Cookie::queue('add_ostan','البرز');break;
  case '4':$javar_id=[13,22,26];Cookie::queue('add_ostan','ایلام');break;
  case '5':$javar_id=[1,6,14];Cookie::queue('add_ostan','آذربایجان شرقی');break;
  case '6':$javar_id=[5,14,20];Cookie::queue('add_ostan','آذربایجان غربی');break;
  case '7':$javar_id=[13,17,21,23];Cookie::queue('add_ostan','بوشهر');break;
  case '8':$javar_id=[3,15,19,27,28];Cookie::queue('add_ostan','تهران');break;
  case '9':$javar_id=[2,13,23,26];Cookie::queue('add_ostan','چهارمحال بختیاری');break;
  case '10':$javar_id=[2,11,15,16,21];Cookie::queue('add_ostan','خراسان جنوبی');break;
  case '11':$javar_id=[10,12,15];Cookie::queue('add_ostan','خراسان رضوی');break;
  case '12':$javar_id=[11,15,24];Cookie::queue('add_ostan','خراسان شمالی');break;
  case '13':$javar_id=[4,7,9,23,26];Cookie::queue('add_ostan','خوزستان');break;
  case '14':$javar_id=[1,6,15,18,20,25,30];Cookie::queue('add_ostan','زنجان');break;
  case '15':$javar_id=[2,8,10,11,12,19,24,27];Cookie::queue('add_ostan','سمنان');break;
  case '16':$javar_id=[10,21,29];Cookie::queue('add_ostan','سیستان و بلوچستان');break;
  case '17':$javar_id=[2,7,21,23,29,31];Cookie::queue('add_ostan','فارس');break;
  case '18':$javar_id=[3,14,25,27,28,30];Cookie::queue('add_ostan','قزوین');break;
  case '19':$javar_id=[2,8,15,27];Cookie::queue('add_ostan','قم');break;
  case '20':$javar_id=[6,14,22,30];Cookie::queue('add_ostan','کردستان');break;
  case '21':$javar_id=[10,16,17,29,31];Cookie::queue('add_ostan','کرمان');break;
  case '22':$javar_id=[4,20,26,30];Cookie::queue('add_ostan','کرمانشاه');break;
  case '23':$javar_id=[2,7,9,13,17];Cookie::queue('add_ostan','کهگیلویه و بویراحمد');break;
  case '24':$javar_id=[2,15,27];Cookie::queue('add_ostan','گلستان');break;
  case '25':$javar_id=[1,14,18,27];Cookie::queue('add_ostan','گیلان');break;
  case '26':$javar_id=[2,4,9,13,22,28,30];Cookie::queue('add_ostan','لرستان');break;
  case '27':$javar_id=[3,8,15,18,24,25];Cookie::queue('add_ostan','مازندران');break;
  case '28':$javar_id=[2,3,8,18,19,26,30];Cookie::queue('add_ostan','مرکزی');break;
  case '29':$javar_id=[7,16,17,21];Cookie::queue('add_ostan','هرمزگان');break;
  case '30':$javar_id=[14,18,20,22,26,28];Cookie::queue('add_ostan','همدان');break;
  case '31':$javar_id=[2,10,17,21];Cookie::queue('add_ostan','یزد');break;
}
foreach (unserialize(Cookie::get('ids')) as $id1) {
  $gram=Cookie::get('vazn' . $id1);
  $ostan_id_seller=Cookie::get('ostan' . $id1);
  $city_id_seller=Cookie::get('city' . $id1);
  foreach ($javar_id as $javar) {
    //استان همجوار
    if($javar==$ostan_id_seller ){$hamjavar="ok";break;}
   }
  if($city_id_buyer==$city_id_seller){$num_javar=1;}
  elseif($ostan_id_seller==$ostan_id_buyer){$num_javar=2;}
  elseif(!empty($hamjavar) and $hamjavar=='ok'){$num_javar=3;}
  else{$num_javar=4;}
  switch($gram){
    case $gram<251:$gram=250;break;
    case $gram<501:$gram=500;break;
    case $gram<1001:$gram=1000;break;
    case $gram<2001:$gram=2000;break;
    case $gram<3001:$gram=3000;break;
    case $gram<4001:$gram=4000;break;
    case $gram<5001:$gram=5000;break;
    case $gram<6001:$gram=6000;break;
    case $gram<7001:$gram=7000;break;
    case $gram<8001:$gram=8000;break;
    case $gram<9001:$gram=9000;break;
    case $gram<10001:$gram=10000;break;
    case $gram<11001:$gram=11000;break;
    case $gram<12001:$gram=12000;break;
    case $gram<13001:$gram=13000;break;
    case $gram<14001:$gram=14000;break;
    case $gram<15001:$gram=15000;break;
    case $gram<16001:$gram=16000;break;
    case $gram<17001:$gram=17000;break;
    case $gram<18001:$gram=18000;break;
    case $gram<19001:$gram=19000;break;
    case $gram<20001:$gram=20000;break;
    case $gram<21001:$gram=21000;break;
    case $gram<22001:$gram=22000;break;
    case $gram<23001:$gram=23000;break;
    case $gram<24001:$gram=24000;break;
    case $gram<25001:$gram=25000;break;
    }
    if($num_javar==1){
      $price_post= $price_1_sefareshi[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_sefareshi_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==2){
      $price_post= $price_2_sefareshi[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_sefareshi_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==3){
      $price_post= $price_3_sefareshi[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_sefareshi_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==4){
      $price_post= $price_4_sefareshi[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_sefareshi_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }

 }
 $price_post3=array_sum($price_post2);
 Cookie::queue('post_sefareshi',$price_post3);
  echo number_format(array_sum($price_post2))  ;

?>
