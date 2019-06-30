@extends('shop.layoutDashShop')
@section('title')
  مشاهده سفارش
@endsection
@section('dash_content')

    <div class="dashTitrSh">
      مشاهده سفارش
      <a href="/newOrderShop"><button type="button" class="btn newOrderOneBut" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      <div class="orderDiv orderName">
        <div class="orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderName2">{{$newOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderDate">
        <div class="orderDivZ0 orderDate1">تاریخ ثبت <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderDate2">{{$newOrderOne->date_ad}}</div>
      </div>
      <div class="orderDiv orderSquad">
        <div class="orderDivZ0 orderSquad1">دسته محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderSquad2">{{$newOrderOne->squad}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$newOrderOne->num}} {{$newOrderOne->vahed}} </div>
      </div>
      <div class="orderDiv2 orderDis">
        <div class="orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ2 orderDis2">{{$newOrderOne->dis}}</div>
      </div>
      <div class="orderOk">
        {{-- <a href="#"><button type="button" class="btn btn-primary btn-block">  ثبت فروش این محصول </button></a> --}}
        چنانچه قادر به تهیه  و فروش این محصول و یا مشابه این محصول هستید ،  یکی از گزینه
        های زیر را انتخاب نمایید .
      </div>
      <div class="order_div_g1">
        <button type="button"onclick="div_active('order_div_stock')">این محصول را قبلا به عنوان <span>محصول ثابت</span> ثبت کرده ام</button>
      </div>
      <div class="order_div_stock orderDivH">
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sProSStock" value="" placeholder="نام محصول ثابت">
          <button type="button" onclick="searchProSStock()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sIdSStock" value="" placeholder="کد محصول ثابت">
          <button type="button" onclick=""><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivSPSS" id="ajax_searchProSStock">

        </div>
      </div>
      <div class="order_div_g1"onclick="div_active('order_div_unStock')">
        <button type="button">این محصول را قبلا به عنوان <span>محصول غیر ثابت</span> ثبت کرده ام </button>
      </div>
      <div class="order_div_unStock orderDivH">
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sProSUnStock" value="" placeholder="نام محصول غیر ثابت">
          <button type="button" onclick="searchProSUnStock({{$newOrderOne->id}})"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sIdSUnStock" value="" placeholder="کد محصول غیر ثابت">
          <button type="button" onclick="searchIdSUnStock('',{{$newOrderOne->id}})"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivSPSS" id="ajax_searchProSUnStock">

        </div>
      </div>
      <div class="order_div_g1"onclick="div_active('order_div_new')">
        <button type="button">ثبت محصول جدید</button>
      </div>


      <div class="order_div_new orderDivH ">
      <form class="form form_orderSabtSh" id="form_orderSabtSh" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i> ثبت محصول </div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div id="ajax_orderSabtSh"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="stamp_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_orderSabtSh"></i> نوع محصول</label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderSabtShD1">
               <label for="stamp_orderSabtSh1" class="control-label pull-right "> اصل محصول</label>
               <input type="radio" name="stamp_orderSabtSh" id="stamp_orderSabtSh1" value="1">
             </div>
             <div class="div_form_radio2 stamp_orderSabtShD2">
               <label for="stamp_orderSabtSh2" class="control-label pull-right "> مشابه محصول</label>
               <input type="radio" name="stamp_orderSabtSh" id="stamp_orderSabtSh2" value="2">
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="name_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mname_orderSabtSh"></i> نام محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="maker_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmaker_orderSabtSh"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="brand_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mbrand_orderSabtSh"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="model_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmodel_orderSabtSh"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="price_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت محصول (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="price_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا</label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_orderSabtSh" name="" >
             <option value="">انتخاب کنید</option>
             <option value="عدد">عدد</option>
             <option value="بسته">بسته</option>
             <option value="کارتن">کارتن</option>
             <option value="گونی">گونی</option>
             <option value="گرم">گرم</option>
             <option value="کیلو گرم">کیلو گرم</option>
             <option value="جین">جین</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label for="num_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mnum_orderSabtSh"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_orderSabtSh"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="vazn_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvazn_orderSabtSh"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_orderSabtSh"placeholder="در صورت نیاز ..."></div>
       </div>
       <div class="form-group">
         <label for="stamp_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_orderSabtSh"></i> ابعاد محصول</label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderSabtShD1">
               <label for="dimension_orderSabtSh1" class="control-label pull-right "> بزرگتر از 100 cm</label>
               <input type="radio" name="dimension_orderSabtSh" id="dimension_orderSabtSh1" value="2">
             </div>
             <div class="div_form_radio2 stamp_orderSabtShD2">
               <label for="dimension_orderSabtSh2" class="control-label pull-right ">کوچکتر از 100 cm </label>
               <input type="radio" name="dimension_orderSabtSh" id="dimension_orderSabtSh2" value="1">
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="vaznPost_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MvaznPost_orderSabtSh"></i> وزن پستی محصول (گرم)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="pakat_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mpakat_orderSabtSh"></i>  هزینه بسته بندی (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_orderSabtSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateMake_orderSabtSh"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateExpiration_orderSabtSh"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="term_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mterm_orderSabtSh"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class=" placeholder" id="term_orderSabtSh"placeholder="اختیاری ..."></textarea>
         </div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img1_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg1_orderSabtSh"></i> عکس 1 <span id="Iimg1_orderSabtSh"></span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg1" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg1_orderSabtSh"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img2_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 2 <span id="Iimg2_orderSabtSh"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg2" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg2_orderSabtSh"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img3_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 3 <span id="Iimg3_orderSabtSh"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg3" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg3_orderSabtSh"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img4_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 4 <span id="Iimg4_orderSabtSh"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg4" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg4_orderSabtSh"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img5_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 5 <span id="Iimg5_orderSabtSh"></span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg5" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg5_orderSabtSh"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img6_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 6 <span id="Iimg6_orderSabtSh"></span> </label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg6" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg6_orderSabtSh"></div>
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success" onclick="proShop({{$newOrderOne->id}})" >ثبت</button>
       </div>
     </form>
     </div>
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">محصول شما با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
   {{--  --}}
   <div class="modal fade" id="Mstamp_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           مشابه محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mname_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           نام محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmaker_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         maker
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mbrand_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است .
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmodel_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          مدل
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mprice_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          قیمت
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvahed_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           واحد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mnum_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          تعداد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvazn_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MvaznPost_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن پستی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mpakat_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          بسته بندی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mdis_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           توضیح محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateMake_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ تولید
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateExpiration_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ انقضا
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mterm_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           شرایط نگهداری
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg1_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 1
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg0_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 0
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   {{-- مودال عکس اول --}}
   <div class="modal fade" id="MAddProImg1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body ">
           <div class="titr_modal_img_addpro">
              آپلود عکس اول
           </div>
           <div class="" id="imgAddPro1"></div>
           <div class="proAddImg1">
             <form class="dropzone form_img_add_pro" id="proAddImg1" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
               {{ csrf_field() }}


                 <div class="dz-message ">
                     <div class="col-xs-8">
                         <div class="message ">
                             <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                         </div>
                     </div>
                 </div>
             </form>
           </div>

         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro1','Aimg1_orderSabtSh','Iimg1_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس اول-->
   {{-- مودال عکس دوم --}}
   <div class="modal fade" id="MAddProImg2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header ">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="titr_modal_img_addpro">
               آپلود عکس دوم
           </div>
           <div class="" id="imgAddPro2"></div>
           <form class="dropzone form_img_add_pro" id="proAddImg2" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro2','Aimg2_orderSabtSh','Iimg2_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس دوم-->
   {{-- مودال عکس سوم--}}
   <div class="modal fade" id="MAddProImg3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header ">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="titr_modal_img_addpro">
             آپلود عکس سوم
           </div>
           <div class="" id="imgAddPro3"></div>
           <form class="dropzone form_img_add_pro" id="proAddImg3" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro3','Aimg3_orderSabtSh','Iimg3_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس سوم-->
   {{--  مودال عکس چهارم --}}
   <div class="modal fade" id="MAddProImg4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header modal_h_login_header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="titr_modal_img_addpro">
             آپلود عکس چهارم
           </div>
           <div class="" id="imgAddPro4"></div>
           <form class="dropzone form_img_add_pro" id="proAddImg4" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro4','Aimg4_orderSabtSh','Iimg4_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس چهارم-->
   {{--  مودال عکس  پنجم --}}
   <div class="modal fade" id="MAddProImg5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header modal_h_login_header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="titr_modal_img_addpro">
             آپلود عکس پنچم
           </div>
           <div class="" id="imgAddPro5"></div>
           <form class="dropzone form_img_add_pro" id="proAddImg5" action="/uplodImgProSh"   enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro5','Aimg5_orderSabtSh','Iimg5_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس پنحم-->
   {{--   مودال عکس ششم --}}
   <div class="modal fade" id="MAddProImg6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="titr_modal_img_addpro">
             آپلود عکس ششم
           </div>
           <div class="" id="imgAddPro6"></div>
           <form class="dropzone form_img_add_pro" id="proAddImg6" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgAddPro6','Aimg6_orderSabtSh','Iimg6_orderSabtSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal  عکس ششم -->
   {{--
    توجه توجه توجه
    مودالهای عکس صفحه
    shop\searchProSUnStock.blade.php
    --}}
   {{-- مودال عکس اول --}}
   <div class="modal fade" id="MPSUSProImg1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      <div class="modal-body "><div class="titr_modal_img_addpro">  آپلود عکس اول</div>
        <div class="ajax_form_modal" id="imgPSUSPro1"></div>
        <div class="proPSUSImg1"><form class="dropzone form_img_add_pro" id="proPSUSImg1" action="/uplodImgProSh"enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message "><div class="col-xs-8"><div class="message "><div class="message">
          @if ($img->pic_b1)
            <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
          @else
            <p>جهت آپلود عکس این کادر را کلیک کنید</p>
          @endif  </div></div></div></form></div></div>
        <div class="footer_modal_img_add_pro">
        <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
        <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro1','Aimg1_orderPSUS','Iimg1_orderPSUS')">حذف عکس</button>
  </div></div></div></div><!--end modal عکس اول-->
   {{-- مودال عکس دوم --}}
   <div class="modal fade" id="MPSUSProImg2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header "><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro"> آپلود عکس دوم</div>
    <div class="ajax_form_modal" id="imgPSUSPro2"></div><form class="dropzone form_img_add_pro" id="proPSUSImg2" action="/uplodImgProSh" enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8">@if ($img->pic_b1)
  <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
@else
  <p>جهت آپلود عکس این کادر را کلیک کنید</p>
@endif</div></div></div></form></div>
    <div class="footer_modal_img_add_pro">
    <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
    <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro2','Aimg2_orderPSUS','Iimg2_orderPSUS')">حذف عکس</button>
    </div></div></div></div><!--end modal عکس دوم-->
   {{-- مودال عکس سوم--}}
   <div class="modal fade" id="MPSUSProImg3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header "><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button> </div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro"> آپلود عکس سوم</div>
        <div class="ajax_form_modal" id="imgPSUSPro3"></div><form class="dropzone form_img_add_pro" id="proPSUSImg3" action="/uplodImgProSh"    enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8">@if ($img->pic_b1)
  <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
@else
  <p>جهت آپلود عکس این کادر را کلیک کنید</p>
@endif</div></div></div></form></div>
        <div class="footer_modal_img_add_pro">
        <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
        <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro3','Aimg3_orderPSUS','Iimg3_orderPSUS')">حذف عکس</button>
    </div></div></div></div><!--end modal عکس سوم-->
   {{--  مودال عکس چهارم --}}
   <div class="modal fade" id="MPSUSProImg4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header modal_h_login_header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro"> آپلود عکس چهارم</div>
     <div class="ajax_form_modal" id="imgPSUSPro4"></div><form class="dropzone form_img_add_pro" id="proPSUSImg4" action="/uplodImgProSh"    enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8">@if ($img->pic_b1)
  <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
@else
  <p>جهت آپلود عکس این کادر را کلیک کنید</p>
@endif</div></div> </div></form></div>
     <div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro4','Aimg4_orderPSUS','Iimg4_orderPSUS')">حذف عکس</button>
   </div></div></div></div><!--end modal عکس چهارم-->
   {{--  مودال عکس  پنجم --}}
   <div class="modal fade" id="MPSUSProImg5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header modal_h_login_header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro"> آپلود عکس پنچم</div>
      <div class="ajax_form_modal" id="imgPSUSPro5"></div><form class="dropzone form_img_add_pro" id="proPSUSImg5" action="/uplodImgProSh"   enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8">@if ($img->pic_b1)
  <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
@else
  <p>جهت آپلود عکس این کادر را کلیک کنید</p>
@endif</div></div></div></form></div>
      <div class="footer_modal_img_add_pro">
      <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro5','Aimg5_orderPSUS','Iimg5_orderPSUS')">حذف عکس</button>
   </div></div></div></div><!--end modal عکس پنحم-->
   {{--   مودال عکس ششم --}}
   <div class="modal fade" id="MPSUSProImg6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro">   آپلود عکس ششم</div>
    <div class="ajax_form_modal" id="imgPSUSPro6"></div><form class="dropzone form_img_add_pro" id="proPSUSImg6" action="/uplodImgProSh"    enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message">
      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
      @if ($img->pic_b1)
        <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
      @else
        <p>جهت آپلود عکس این کادر را کلیک کنید</p>
      @endif
    </div></div></div></form></div>
    <div class="footer_modal_img_add_pro">
    <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
    <button type="button" class="btn btn-warning" onclick="del_img('imgPSUSPro6','Aimg6_orderPSUS','Iimg6_orderPSUS')">حذف عکس</button>
  </div></div></div></div><!--end modal  عکس ششم -->
@endsection
