<?php

  $ostan_id_buyer=$id;//خریدار
  $hamjavar;//آیدی استانهای همجوار
  foreach (Session::get('ids') as $id1) {

    $gram=Session::get('vazn' . $id1);
    $ostan_id_seller=Session::get('ostan' . $id1);
  if($ostan_id_seller==$ostan_id_buyer){$id_javar=2;}
  else{
    foreach ($hamjavar->where('id' , $ostan_id_seller ) as $javar) {
      if($javar->ham_javar1 == $ostan_id_buyer or $javar->ham_javar2 == $ostan_id_buyer or $javar->ham_javar3 == $ostan_id_buyer or $javar->ham_javar4 == $ostan_id_buyer or $javar->ham_javar5 == $ostan_id_buyer or $javar->ham_javar6 == $ostan_id_buyer or $javar->ham_javar7 == $ostan_id_buyer or $javar->ham_javar8 == $ostan_id_buyer
       or $javar->ham_javar9 == $ostan_id_buyer ){
         $id_javar=3;
       }
       else{ $id_javar=4;}
    }
  }

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
$gram_end=$gram . 'g';
foreach ($post_pishtaz->where('id' , $id_javar ) as $post) {
$price_post= $post->$gram_end + Session::get('pakat' . $id1) ;
$price_post2[]=$price_post;
Session::put('price_pishtaz_one' . $id1 , $price_post);//جهت ذخیره قیمت پست یک محصول در دیتابیس
}
}
Session::put('post_pishtaz' ,array_sum($price_post2) );
echo number_format(array_sum($price_post2))  ;
?>
