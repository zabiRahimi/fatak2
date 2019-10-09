@extends('shop.layoutDashShop')
@section('title')
  مشاهده و ویرایش سفارش
@endsection
@section('dash_content')

    <div class="dashTitrSh">
    مشاهده و ویرایش سفارش
      <a href="/oldOrderShop"><button type="button" class="btn btnBack" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      <div class="orderDivTitr">
        مشخصات سفارش خریدار
      </div>
      <div class="orderDiv orderName">
        <div class="orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderName2">{{$oldOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderDate">
        <div class="orderDivZ0 orderDate1">تاریخ ثبت <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderDate2">{{Verta($oldOrderOne->date_ad)->format('y/m/d')}}</div>
      </div>
      <div class="orderDiv orderSquad">
        <div class="orderDivZ0 orderSquad1">دسته محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderSquad2">{{$oldOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->num}} {{$oldOrderOne->vahed}} </div>
      </div>
      <div class="orderDiv2 orderDis">
        <div class="orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ2 orderDis2">{{$oldOrderOne->dis}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">استان مشتری <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->ostan}} </div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">شهر مشتری <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->city}}</div>
      </div>
      <div class="orderLine"></div>
      <form class="form form_orderEditSh" id="form_orderEditSh" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i> مشخصات محصول شما</div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div id="ajax_orderEditSh"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="stamp_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh" data-toggle="modal" data-target="#Mstamp_orderEditSh"></i> نوع محصول</label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderEditShD1">
               <label for="stamp_orderEditSh1" class="control-label pull-right "> اصل محصول</label>
               <input type="radio" name="stamp_orderEditSh" id="stamp_orderEditSh1" value="1" @if ($stampProOrder->stamp==1) checked @endif>
             </div>
             <div class="div_form_radio2 stamp_orderEditShD2">
               <label for="stamp_orderEditSh2" class="control-label pull-right "> مشابه محصول</label>
               <input type="radio" name="stamp_orderEditSh" id="stamp_orderEditSh2" value="2" @if ($stampProOrder->stamp==2) checked @endif>
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="name_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mname_orderEditSh"></i> نام محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_orderEditSh" value="{{$proShopOne->name}}"></div>
       </div>
       <div class="form-group">
         <label for="maker_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmaker_orderEditSh"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->maker}}"></div>
       </div>
       <div class="form-group">
         <label for="brand_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mbrand_orderEditSh"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->brand}}"></div>
       </div>
       <div class="form-group">
         <label for="model_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmodel_orderEditSh"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->model}}"></div>
       </div>
       <div class="form-group">
         <label for="price_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mprice_orderEditSh"></i> قیمت محصول (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="price_orderEditSh" value="{{$proShopOne->price}}"></div>
                          {{-- number_format($proShopOne->price) --}}
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا</label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_orderEditSh" name="" >
             <option value="">انتخاب کنید</option>
             <option value="عدد"  @if ($proShopOne->vahed=='عدد') selected @endif >عدد</option>
             <option value="بسته" @if ($proShopOne->vahed=='بسته') selected @endif >بسته</option>
             <option value="کارتن" @if ($proShopOne->vahed=='کارتن') selected @endif>کارتن</option>
             <option value="گونی" @if ($proShopOne->vahed=='گونی') selected @endif>گونی</option>
             <option value="گرم" @if ($proShopOne->vahed=='گرم') selected @endif>گرم</option>
             <option value="کیلو گرم" @if ($proShopOne->vahed=='کیلو گرم') selected @endif>کیلو گرم</option>
             <option value="جین" @if ($proShopOne->vahed=='جین') selected @endif>جین</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label for="num_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mnum_orderEditSh"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_orderEditSh"min="1" placeholder="اختیاری ..."value="{{$proShopOne->num}}"></div>
       </div>
       <div class="form-group">
         <label for="vazn_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvazn_orderEditSh"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_orderEditSh"placeholder="در صورت نیاز ..."value="{{$proShopOne->vazn}}"></div>
       </div>
       <div class="form-group">
         <label for="vaznPost_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MvaznPost_orderEditSh"></i> وزن پستی محصول (گرم)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_orderEditSh"value="{{$proShopOne->vaznPost}}"></div>
       </div>
       <div class="form-group">
         <label for="pakat_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mpakat_orderEditSh"></i> هزینه بسته بندی (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="pakat_orderEditSh"placeholder="اختیاری ... به تومان"value="{{$proShopOne->pakat}}"></div>
       </div>
       <div class="form-group">
         <label for="dis_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mdis_orderEditSh"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_orderEditSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShopOne->dis}}</textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateMake_orderEditSh"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_orderEditSh"placeholder="اختیاری ..."value="{{$proShopOne->dateMake}}"></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateExpiration_orderEditSh"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_orderEditSh"placeholder="اختیاری ..."value="{{$proShopOne->dateExpiration}}"></div>
       </div>
       <div class="form-group">
         <label for="term_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mterm_orderEditSh"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="term_orderEditSh"placeholder="اختیاری ...">{{$proShopOne->term}}</textarea>
         </div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img1_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg1_orderEditSh"></i> عکس 1 <span id="Iimg1_orderEditSh">@if($proImg->pic_b1)<img src="/img_shop/{{$proImg->pic_b1}}"width="40"height="30">@endif</span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg1" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg1_orderEditSh">{{$proImg->pic_b1}}</div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img2_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg0_orderEditSh"></i> عکس 2 <span id="Iimg2_orderEditSh">@if($proImg->pic_b2)<img src="/img_shop/{{$proImg->pic_b2}}"width="40"height="30">@endif</span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg2" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg2_orderEditSh">{{$proImg->pic_b2}}</div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img3_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg0_orderEditSh"></i> عکس 3 <span id="Iimg3_orderEditSh">@if ($proImg->pic_b3)<img src="/img_shop/{{$proImg->pic_b3}}"width="40"height="30">@endif </span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg3" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg3_orderEditSh">{{$proImg->pic_b3}}</div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img4_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg0_orderEditSh"></i> عکس 4 <span id="Iimg4_orderEditSh">@if ($proImg->pic_b4)<img src="/img_shop/{{$proImg->pic_b4}}"width="40"height="30"> @endif </span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg4" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg4_orderEditSh">{{$proImg->pic_b4}}</div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img5_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg0_orderEditSh"></i> عکس 5 <span id="Iimg5_orderEditSh">@if ($proImg->pic_b5)<img src="/img_shop/{{$proImg->pic_b5}}"width="40"height="30"> @endif </span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg5" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg5_orderEditSh">{{$proImg->pic_b5}}</div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img6_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mimg0_orderEditSh"></i> عکس 6 <span id="Iimg6_orderEditSh"> @if ($proImg->pic_b6)<img src="/img_shop/{{$proImg->pic_b6}}"width="40"height="30"> @endif </span> </label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg6" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg6_orderEditSh">{{$proImg->pic_b6}}</div>
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success" onclick="editProShopUnStock({{$proShopOne->id}},{{$oldOrderOne->id}},{{$proImg->id}},'stamp_orderEditSh','name_orderEditSh','maker_orderEditSh','brand_orderEditSh','model_orderEditSh','price_orderEditSh','not','vahed_orderEditSh','num_orderEditSh','vazn_orderEditSh','dimension_orderEditSh','vaznPost_orderEditSh','pakat_orderEditSh','dis_orderEditSh','not','dateMake_orderEditSh','dateExpiration_orderEditSh','term_orderEditSh','Aimg1_orderEditSh','Aimg2_orderEditSh','Aimg3_orderEditSh','Aimg4_orderEditSh','Aimg5_orderEditSh','Aimg6_orderEditSh',
         'ajax_orderEditSh','form_orderEditSh','oldOrderOneUnStockShop','',null,1)" >ثبت تغییرات</button>
       </div>
     </form>
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تغییرات با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
   {{--  --}}
   <div class="modal fade" id="Mstamp_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           مشابه محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mname_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           نام محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmaker_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         maker
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mbrand_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است .
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmodel_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          مدل
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mprice_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          قیمت
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvahed_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           واحد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mnum_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          تعداد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvazn_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MvaznPost_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن پستی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mpakat_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          بسته بندی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mdis_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           توضیح محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateMake_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ تولید
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateExpiration_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ انقضا
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mterm_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           شرایط نگهداری
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg1_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 1
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg0_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
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
           <div class="ajax_form_modal" id="imgEditPro1"></div>
           <div class="proEditImg1">
             <form class="dropzone form_img_add_pro" id="proEditImg1" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
               {{ csrf_field() }}


                 <div class="dz-message ">
                     <div class="col-xs-8">
                         <div class="message ">
                            @if ($proImg->pic_b1)<img src="../../img_shop/{{$proImg->pic_b1}}" width="110" height="100" alt="">@endif<p>جهت آپلود عکس این کادر را کلیک کنید</p>
                         </div>
                     </div>
                 </div>
             </form>
           </div>

         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro1','Aimg1_orderEditSh','Iimg1_orderEditSh')">حذف عکس</button>
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
           <div class="ajax_form_modal" id="imgEditPro2"></div>
           <form class="dropzone form_img_add_pro" id="proEditImg2" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($proImg->pic_b2)
                         <img src="../../img_shop/{{$proImg->pic_b2}}" width="110" height="100" alt="">
                       @endif
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro2','Aimg2_orderEditSh','Iimg2_orderEditSh')">حذف عکس</button>
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
           <div class="ajax_form_modal" id="imgEditPro3"></div>
           <form class="dropzone form_img_add_pro" id="proEditImg3" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($proImg->pic_b3)
                         <img src="../../img_shop/{{$proImg->pic_b3}}" width="110" height="100" alt="">
                       @endif
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro3','Aimg3_orderEditSh','Iimg3_orderEditSh')">حذف عکس</button>
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
           <div class="ajax_form_modal" id="imgEditPro4"></div>
           <form class="dropzone form_img_add_pro" id="proEditImg4" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($proImg->pic_b4)
                         <img src="../../img_shop/{{$proImg->pic_b4}}" width="110" height="100" alt="">
                       @endif
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro4','Aimg4_orderEditSh','Iimg4_orderEditSh')">حذف عکس</button>
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
           <div class="ajax_form_modal" id="imgEditPro5"></div>
           <form class="dropzone form_img_add_pro" id="proEditImg5" action="/uplodImgProSh"   enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($proImg->pic_b5)
                         <img src="../../img_shop/{{$proImg->pic_b5}}" width="110" height="100" alt="">
                       @endif
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro5','Aimg5_orderEditSh','Iimg5_orderEditSh')">حذف عکس</button>
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
           <div class="ajax_form_modal" id="imgEditPro6"></div>
           <form class="dropzone form_img_add_pro" id="proEditImg6" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($proImg->pic_b6)
                         <img src="../../img_shop/{{$proImg->pic_b6}}" width="110" height="100" alt="">
                       @endif
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-warning" onclick="del_img('imgEditPro6','Aimg6_orderEditSh','Iimg6_orderEditSh')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal  عکس ششم -->
@endsection
