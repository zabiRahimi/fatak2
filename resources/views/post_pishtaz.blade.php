<?php

  namespace App\resource\wiews\post_pishtaz;
  use Cookie;

  $ostan_id_buyer=$id_ostan;//خریدار
  $city_id_buyer=$id_city;


  // $hamjavar;//آیدی استانهای همجوار

  //قیمت پست پیشتاز هم شهری
  $price_1_pishtaz=[
    '250'=>'5330','500'=>'6230','1000'=>'7430','2000'=>'9630',
    '3000'=>'11630','4000'=>'13630','5000'=>'15630','6000'=>'17630',
    '7000'=>'19630','8000'=>'21630','9000'=>'23630','10000'=>'25630',
    '11000'=>'27630','12000'=>'29630','13000'=>'31630','14000'=>'33630',
    '15000'=>'35630','16000'=>'37630','17000'=>'39630','18000'=>'41630',
    '19000'=>'43630','20000'=>'45630','21000'=>'47630','22000'=>'51630',
    '23000'=>'630','24000'=>'630','25000'=>'630'
  ];
  //قیمت پست پیشتاز هم استانی
  $price_2_pishtaz=[
    '250'=>'5530','500'=>'6530','1000'=>'7830','2000'=>'10130',
    '3000'=>'12230','4000'=>'14330','5000'=>'16430','6000'=>'18530',
    '7000'=>'20630','8000'=>'22730','9000'=>'24830','10000'=>'26930',
    '11000'=>'29030','12000'=>'31130','13000'=>'53230','14000'=>'37330',
    '15000'=>'39430','16000'=>'41530','17000'=>'43630','18000'=>'45730',
    '19000'=>'47830','20000'=>'49930','21000'=>'52030','22000'=>'54130',
    '23000'=>'56230','24000'=>'30','25000'=>'30'
  ];
  // قیمت پیشتاز هم جوار
  $price_3_pishtaz=[
    '250'=>'5730','500'=>'7230','1000'=>'8130','2000'=>'10430',
    '3000'=>'12630','4000'=>'14830','5000'=>'17030','6000'=>'19230',
    '7000'=>'21430','8000'=>'23630','9000'=>'25830','10000'=>'28030',
    '11000'=>'30230','12000'=>'32430','13000'=>'34630','14000'=>'36830',
    '15000'=>'39030','16000'=>'41230','17000'=>'43430','18000'=>'45630',
    '19000'=>'47830','20000'=>'50030','21000'=>'52230','22000'=>'54430',
    '23000'=>'56630','24000'=>'30','25000'=>'30'
  ];
  // قیمت پشتاز استان غیر هم جوار
  $price_4_pishtaz=[
    '250'=>'7130','500'=>'8530','1000'=>'10530','2000'=>'13830',
    '3000'=>'16730','4000'=>'19630','5000'=>'22530','6000'=>'25430',
    '7000'=>'28330','8000'=>'31230','9000'=>'34130','10000'=>'37030',
    '11000'=>'39930','12000'=>'42830','13000'=>'45730','14000'=>'48630',
    '15000'=>'51530','16000'=>'54430','17000'=>'57330','18000'=>'60230',
    '19000'=>'63130','20000'=>'66030','21000'=>'68930','22000'=>'71830',
    '23000'=>'74730','24000'=>'30','25000'=>'30'
  ];
    //بدست آوردن آرایه استانهای همجوار
  switch ($ostan_id_buyer) {
    case '1':$javar_id=[5,14,25];break;
    case '2':$javar_id=[9,10,15,17,19,23,26,28,31];break;
    case '3':$javar_id=[8,18,27,28];break;
    case '4':$javar_id=[13,22,26];break;
    case '5':$javar_id=[1,6,14];break;
    case '6':$javar_id=[5,14,20];break;
    case '7':$javar_id=[13,17,21,23];break;
    case '8':$javar_id=[3,15,19,27,28];break;
    case '9':$javar_id=[2,13,23,26];break;
    case '10':$javar_id=[2,11,15,16,21];break;
    case '11':$javar_id=[10,12,15];break;
    case '12':$javar_id=[11,15,24];break;
    case '13':$javar_id=[4,7,9,23,26];break;
    case '14':$javar_id=[1,6,15,18,20,25,30];break;
    case '15':$javar_id=[2,8,10,11,12,19,24,27];break;
    case '16':$javar_id=[10,21,29];break;
    case '17':$javar_id=[2,7,21,23,29,31];break;
    case '18':$javar_id=[3,14,25,27,28,30];break;
    case '19':$javar_id=[2,8,15,27];break;
    case '20':$javar_id=[6,14,22,30];break;
    case '21':$javar_id=[10,16,17,29,31];break;
    case '22':$javar_id=[4,20,26,30];break;
    case '23':$javar_id=[2,7,9,13,17];break;
    case '24':$javar_id=[2,15,27];break;
    case '25':$javar_id=[1,14,18,27];break;
    case '26':$javar_id=[2,4,9,13,22,28,30];break;
    case '27':$javar_id=[3,8,15,18,24,25];break;
    case '28':$javar_id=[2,3,8,18,19,26,30];break;
    case '29':$javar_id=[7,16,17,21];break;
    case '30':$javar_id=[14,18,20,22,26,28];break;
    case '31':$javar_id=[2,10,17,21];break;
  }

  foreach (unserialize(Cookie::get('ids')) as $id1) {

    $gram=Cookie::get('vazn' . $id1);
     $ostan_id_seller=Cookie::get('ostan' . $id1);
     $city_id_seller=Cookie::get('city' . $id1);
    foreach ($javar_id as $javar) {
      //استان همجوار
      if($javar==$ostan_id_seller ){ $hamjavar="ok";break;}
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
      $price_post= $price_1_pishtaz[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_pishtaz_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==2){
      $price_post= $price_2_pishtaz[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_pishtaz_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==3){
      $price_post= $price_3_pishtaz[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_pishtaz_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
    elseif($num_javar==4){
      $price_post= $price_4_pishtaz[$gram] + Cookie::get('pakat' . $id1) ;
      Cookie::queue('price_pishtaz_one' . $id1,$price_post);
      $price_post2[]=$price_post;
    }
  }
  //Session::put('post_pishtaz' ,array_sum($price_post2) );
  Cookie::queue('post_pishtaz',array_sum($price_post2));
   echo number_format(array_sum($price_post2))  ;
?>
