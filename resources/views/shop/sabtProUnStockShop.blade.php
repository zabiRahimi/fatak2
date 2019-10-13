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
      <form class="form form_proPUSS" id="form_proPUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول جدید  (غیر ثابت)</div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_proPUSS"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="name_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mname_proPUSS"></i> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_proPUSS"></div>
       </div>
       <div class="form-group">
         <label for="maker_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mmaker_proPUSS"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="brand_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mbrand_proPUSS"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="model_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mmodel_proPUSS"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="price_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mprice_proPUSS"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="price_proPUSS"></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_proPUSS" name="" >
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
         <label for="num_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mnum_proPUSS"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_proPUSS"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="vazn_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mvazn_proPUSS"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_proPUSS"placeholder="در صورت نیاز ..."></div>
       </div>
       <div class="form-group">
         <label for="dimension_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS" data-toggle="modal" data-target="#Mdimension_proPUSS"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 dimension_proPUSSD1">
               <label for="dimension_proPUSS1" class="control-label pull-right "> بزرگتر از 100 cm</label>
               <input type="radio" name="dimension_proPUSS" id="dimension_proPUSS1" value="2">
             </div>
             <div class="div_form_radio2 dimension_proPUSSD2">
               <label for="dimension_proPUSS2" class="control-label pull-right ">کوچکتر از 100 cm </label>
               <input type="radio" name="dimension_proPUSS" id="dimension_proPUSS2" value="1">
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="vaznPost_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#MvaznPost_proPUSS"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_proPUSS"></div>
       </div>
       <div class="form-group">
         <label for="pakat_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mpakat_proPUSS"></i>  هزینه بسته بندی (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mdis_proPUSS"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_proPUSS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#MdateMake_proPUSS"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_proPUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#MdateExpiration_proPUSS"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_proPUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="term_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mterm_proPUSS"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class=" placeholder" id="term_proPUSS"placeholder="اختیاری ..."></textarea>
         </div>
       </div>
       <div class="tImgForm">
         بارگذاری عکس محصول
       </div>
       <div class="imgForm" >

         <div class="btnImgForm" onclick="setDropzone('kkk')">
           <i class='fas fa-camera'></i>
         </div>
       </div>
       {{-- <div class="form-group add_pro_form1_1">
         <label for="img1_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg1_proPUSS"></i> عکس 1 <span id="Iimg1_proPUSS"></span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPUSSProImg1" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg1_proPUSS"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img2_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg0_proPUSS"></i> عکس 2 <span id="Iimg2_proPUSS"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPUSSProImg2" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg2_proPUSS"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img3_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg0_proPUSS"></i> عکس 3 <span id="Iimg3_proPUSS"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPUSSProImg3" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg3_proPUSS"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img4_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg0_proPUSS"></i> عکس 4 <span id="Iimg4_proPUSS"></span></label>
        <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPUSSProImg4" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg4_proPUSS"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img5_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg0_proPUSS"></i> عکس 5 <span id="Iimg5_proPUSS"></span></label>
         <div class="div_form"><input type="button" name="" class="form-control btn btn-info" onclick="setDropzone('proPUSSImg6')" value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg5_proPUSS"></div>
       </div>
       <div class="form-group add_pro_form1_1">
         <label for="img6_proPUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPUSS"data-toggle="modal" data-target="#Mimg0_proPUSS"></i> عکس 6 <span id="Iimg6_proPUSS"></span> </label>
         <div class="div_form"><input type="button" onclick="setDropzone('proPUSSImg6')" class="form-control btn btn-info"   value="انتخاب کنید"></div>
         <div class="imgHidden" id="Aimg6_proPUSS"></div>
       </div> --}}
       <div class="form-group form_btn">
         {{-- <button type="button" class="btn btn-success"onclick="proShop('','not','name_proPUSS','maker_proPUSS','brand_proPUSS','model_proPUSS','price_proPUSS','not','vahed_proPUSS','num_proPUSS','vazn_proPUSS','dimension_proPUSS','vaznPost_proPUSS','pakat_proPUSS','dis_proPUSS','not','dateMake_proPUSS','dateExpiration_proPUSS','term_proPUSS','Aimg1_proPUSS','Aimg2_proPUSS','Aimg3_proPUSS','Aimg4_proPUSS','Aimg5_proPUSS','Aimg6_proPUSS',
         'ajax_proPUSS','form_proPUSS','sabtProUnStockShop')" >ثبت</button> --}}
         <button type="button" class="btn btn-success"onclick="proShop('','not','name_proPUSS','maker_proPUSS','brand_proPUSS','model_proPUSS','price_proPUSS','not','vahed_proPUSS','num_proPUSS','vazn_proPUSS','dimension_proPUSS','vaznPost_proPUSS','pakat_proPUSS','dis_proPUSS','not','dateMake_proPUSS','dateExpiration_proPUSS','term_proPUSS',
         'ajax_proPUSS','form_proPUSS','sabtProUnStockShop')" >ثبت</button>
       </div></form>
    </div>
  @endif
  <!-- Modal موفق بودن ثبت محصول-->
  <div class="modal fade" id="end_orderSabtSh"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog"role="document"><div class="modal-content"><div class="modal-body modal_ok">
     <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
     <div class="modal_ok2">محصول شما با موفقیت ثبت شد .</div></div><div class=" modal_ok3">
     <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
  </div></div></div></div><!--end modal پایان موفقیت ثبت .-->
@endsection
{{-- مودال عکس اول --}}
<div class="modal fade"id="MPUSSProImg1"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="titr_modal_img_addpro">آپلود عکس اول</div>
   <div class="ajax_form_modal"id="imgPUSSPro1"></div><div class="proPUSSImg1">
   <form class="dropzone form_img_add_pro" id="proPUSSImg1"action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}<div class="dz-message "><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div></div><div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro1','Aimg1_proPUSS','Iimg1_proPUSS')">حذف عکس</button>
 </div></div></div></div><!--end modal عکس اول-->
{{-- مودال عکس دوم --}}
<div class="modal fade" id="MPUSSProImg2"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog modal-lg modal-xl"role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro"> آپلود عکس دوم</div>
   <div class="ajax_form_modal" id="imgPUSSPro2"></div>
   <form class="dropzone form_img_add_pro" id="proPUSSImg2"action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{csrf_field()}}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div><div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning"data-dismiss="modal"  aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro2','Aimg2_proPUSS','Iimg2_proPUSS')">حذف عکس</button>
</div></div></div></div><!--end modal عکس دوم-->
{{-- مودال عکس سوم--}}
<div class="modal fade"id="MPUSSProImg3"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog modal-lg modal-xl"role="document"><div class="modal-content"><div class="modal-header"><button type="button"class="close modal_h_img_add_pro"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro">آپلود عکس سوم</div>
   <div class="ajax_form_modal" id="imgPUSSPro3"></div>
   <form class="dropzone form_img_add_pro" id="proPUSSImg3" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div><div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro3','Aimg3_proPUSS','Iimg3_proPUSS')">حذف عکس</button>
</div></div></div></div><!--end modal عکس سوم-->
{{--  مودال عکس چهارم --}}
<div class="modal fade"id="MPUSSProImg4"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog modal-lg modal-xl"role="document"><div class="modal-content"><div class="modal-header modal_h_login_header"><button type="button"class="close modal_h_img_add_pro"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro">آپلود عکس چهارم</div>
   <div class="ajax_form_modal" id="imgPUSSPro4"></div>
   <form class="dropzone form_img_add_pro" id="proPUSSImg4" action="/uplodImgProSh"enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div><div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning"data-dismiss="modal"aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro4','Aimg4_proPUSS','Iimg4_proPUSS')">حذف عکس</button>
 </div></div></div></div><!--end modal عکس چهارم-->
{{--  مودال عکس  پنجم --}}
<div class="modal fade"id="MPUSSProImg5"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog modal-lg modal-xl"role="document"><div class="modal-content"><div class="modal-header modal_h_login_header"><button type="button"class="close modal_h_img_add_pro"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body modal_body_h_login"><div class="titr_modal_img_addpro">آپلود عکس پنچم</div>
   <div class="ajax_form_modal" id="imgPUSSPro5"></div>
   <form class="dropzone form_img_add_pro" id="proPUSSImg5"action="/uplodImgProSh"enctype="multipart/form-data" method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div><div class="footer_modal_img_add_pro">
     <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
     <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro5','Aimg5_proPUSS','Iimg5_proPUSS')">حذف عکس</button>
</div></div></div></div><!--end modal عکس پنحم-->
{{--   مودال عکس ششم --}}
<div class="modal fade" id="MPUSSProImg6"  data-ajaxImg="imgPUSSPro6"data-formImg="proPUSSImg6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
<div class="modal-body modal_body_h_login ">

       <div class="titr_modal_img_addpro">آپلود عکس ششم</div>
       {{-- imgPUSSPro6 --}}
       <div class="ajax_form_modal addIdAjax" id=""></div>
       {{-- proPUSSImg6 --}}
       <form  class="form_img_add_pro addIdForm "id="" action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}
         <div class="dz-message">
           <div class="col-xs-8">
             <div class="message">
               <p>جهت آپلود عکس این کادر را کلیک کنید</p>
             </div>
           </div>
          </div>
       </form>

 </div>
 <div class="footer_modal_img_add_pro ajaxFooter">
       <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
       <button type="button" class="btn btn-warning" onclick="del_img('imgPUSSPro6','Aimg6_proPUSS','Iimg6_proPUSS')">حذف عکس</button>
 </div>
</div></div> </div><!--end modal  عکس ششم -->
