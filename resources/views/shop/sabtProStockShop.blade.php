@extends('shop.layoutDashShop')
@section('title')
  ثبت محصول ثابت
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
      ثبت محصول ثابت
    </div>
    <div class="dashLBodySh">
      <form class="form form_proPSS" id="form_proPSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول جدید  (ثابت)</div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_proPSS"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="name_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mname_proPSS"></i> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_proPSS"></div>
       </div>
       <div class="form-group">
         <label for="maker_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mmaker_proPSS"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="brand_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mbrand_proPSS"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="model_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mmodel_proPSS"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="price_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mprice_proPSS"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="price_proPSS"></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_proPSS" name="" >
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
         <label for="num_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mnum_proPSS"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_proPSS"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="vazn_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mvazn_proPSS"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_proPSS"placeholder="در صورت نیاز ..."></div>
       </div>
       <div class="form-group">
         <label for="dimension_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS" data-toggle="modal" data-target="#Mdimension_proPSS"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 dimension_proPSSD1">
               <label for="dimension_proPSS1" class="control-label pull-right "> بزرگتر از 100 cm</label>
               <input type="radio" name="dimension_proPSS" id="dimension_proPSS1" value="2">
             </div>
             <div class="div_form_radio2 dimension_proPSSD2">
               <label for="dimension_proPSS2" class="control-label pull-right ">کوچکتر از 100 cm </label>
               <input type="radio" name="dimension_proPSS" id="dimension_proPSS2" value="1">
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="vaznPost_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#MvaznPost_proPSS"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_proPSS"></div>
       </div>
       <div class="form-group">
         <label for="pakat_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mpakat_proPSS"></i>  هزینه بسته بندی (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_proPSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mdis_proPSS"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_proPSS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#MdateMake_proPSS"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_proPSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#MdateExpiration_proPSS"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_proPSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="term_proPSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_proPSS"data-toggle="modal" data-target="#Mterm_proPSS"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class=" placeholder" id="term_proPSS"placeholder="اختیاری ..."></textarea>
         </div>
       </div>
       <div class="tImgForm">
         بارگذاری عکس محصول <i class="fas fa-star star_form"></i>
       </div>
       <div class="imgForm" >
         <div class="loader loaderImg " >{{-- loaderAjax --}}
           <div class="opacityC opacityImg"></div>{{-- opacityAjax --}}
           <div class="spinner-border text-primary spinnerC spinnerImg" >.</div>{{-- spinnerAjax --}}
         </div>
         <div class="btnImgForm" onclick="setDropzone()">
           <i class='fas fa-camera'></i>
         </div>
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success"onclick="savePro('','not','ثابت','name_proPSS','maker_proPSS','brand_proPSS','model_proPSS','price_proPSS','not','vahed_proPSS','num_proPSS','vazn_proPSS','dimension_proPSS','vaznPost_proPSS','pakat_proPSS','dis_proPSS','not','dateMake_proPSS','dateExpiration_proPSS','term_proPSS',
         'ajax_proPSS','form_proPSS','/sabtProStockShop')" >ثبت</button>
       </div></form>
    </div>
  @endif
  <!-- Modal موفق بودن ثبت محصول-->
  <div class="modal fade" id="end_orderSabtSh"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog"role="document"><div class="modal-content"><div class="modal-body modal_ok">
     <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
     <div class="modal_ok2">محصول شما با موفقیت ثبت شد .</div></div><div class=" modal_ok3">
     <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
  </div></div></div></div><!--end modal پایان موفقیت ثبت .-->
  <div class="modal fade" id="MDropzone"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
  <div class="modal-body modal_body_h_login "><div class="titr_modal_img_addpro">آپلود عکس</div><div class="ajax_form_modal addIdAjax warningDropzone"></div>
  <form  class="dropzone form_img_add_pro addIdForm" action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div>
  <div class="footer_modal_img_add_pro ajaxFooter"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div></div></div> </div><!--end modal  عکس -->
@endsection
