@extends('shop.layoutDashShop')
@section('title')
  ثبت محصول غیر ثابت
@endsection
@section('dash_content')
  @if ($stage==1)
    <div class="NoperfectDaSh">
      <span>توجه :</span>
      <br>
      <p>
        شما تاکنون اطلاعات هویتی خود را تکمیل نکرده اید . جهت تکمیل اطلاعات به صفحه
        <a href="/editDaShop" class="apjax">تکمیل اطلاعات</a>  وارد شوید .
      </p>
      <br>
      <a href="/perfectDaShop" class="apjax"><button type="button" class="btn btn-info">تکمیل اطلاعات</button> </a>
    </div>
  @else
    <div class="dashTitrSh">
      ثبت محصول غیر ثابت
    </div>
    <div class="dashLBodySh">
      <form class="form form_orderSabtSh" id="form_orderSabtSh" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول جدید </div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_orderSabtSh"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="name_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mname_orderSabtSh"></i> نام محصول <i class="fas fa-star star_form"></i></label>
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
         <label for="price_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="price_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
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
         <label for="dimension_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mdimension_orderSabtSh"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 dimension_orderSabtShD1">
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
         <label for="vaznPost_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MvaznPost_orderSabtSh"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
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
         <button type="button" class="btn btn-success"onclick="proShop('','stamp_orderSabtSh','name_orderSabtSh','maker_orderSabtSh','brand_orderSabtSh','model_orderSabtSh','price_orderSabtSh','priceFOrder_orderSabtSh','vahed_orderSabtSh','num_orderSabtSh','vazn_orderSabtSh','dimension_orderSabtSh','vaznPost_orderSabtSh','pakat_orderSabtSh','dis_orderSabtSh','disSeller_orderSabtSh','dateMake_orderSabtSh','dateExpiration_orderSabtSh','term_orderSabtSh','Aimg1_orderSabtSh','Aimg2_orderSabtSh','Aimg3_orderSabtSh','Aimg4_orderSabtSh','Aimg5_orderSabtSh','Aimg6_orderSabtSh',
         'ajax_orderSabtSh','form_orderSabtSh','newOrderShopOne')" >ثبت</button>
       </div></form>

    </div>
  @endif
   <!-- Modal موفق بودن ثبت ابتدایی کانال-->
   <div class="modal fade" id="end_perfectDaSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تکمیل اطلاعات انجام شد . شما هم اکنون می توانید سفارشهای مشتریان را مشاهده کنید  .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->

@endsection
