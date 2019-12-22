@extends('shop.layoutDashShop')
@section('title')
  مشاهده محصول غیر ثابت
@endsection
@section('dash_content')
    <div class="dashTitrSh">
    مشاهده محصول غیر ثابت
      <a href="/showProUnStockShop"><button type="button" class="btn btn-info btnBack" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      @if ($numShowOrder)
        <div class="alert alert-warning">
          <strong>توجه :</strong> شما این محصول را در حال حاضر به {{$numShowOrder}} مشتری معرفی کرده اید .
        </div>
      @endif

      <div class="  ">
      <form class="form form_editSPOUSS" id="form_editSPOUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ویرایش محصول غیر ثابت </div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_editSPOUSS"></div>
       {{ csrf_field() }}

       <div class="form-group">
         <label for="name_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mname_editSPOUSS"></i> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$pro->name}}" id="name_editSPOUSS"></div>
       </div>
       <div class="form-group">
         <label for="maker_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mmaker_editSPOUSS"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$pro->maker}}"  id="maker_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="brand_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mbrand_editSPOUSS"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$pro->brand}}" id="brand_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="model_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mmodel_editSPOUSS"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$pro->model}}"  id="model_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="price_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mprice_editSPOUSS"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" value="{{$pro->price}}" id="price_editSPOUSS"></div>
       </div>
       {{-- <div class="form-group">
         <label for="priceFOrder_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mprice_editSPOUSS"></i> قیمت برای این سفارش</label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$pro->}}" id="priceFOrder_editSPOUSS"placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
       </div> --}}
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_editSPOUSS" name="" >
             <option value="">انتخاب کنید</option>
             <option @if ($pro->vahed=='عدد') selected @endif value="عدد">عدد</option>
             <option @if ($pro->vahed=='بسته') selected @endif value="بسته">بسته</option>
             <option @if ($pro->vahed=='کارتن') selected @endif value="کارتن">کارتن</option>
             <option @if ($pro->vahed=='گونی') selected @endif value="گونی">گونی</option>
             <option @if ($pro->vahed=='گرم') selected @endif value="گرم">گرم</option>
             <option @if ($pro->vahed=='کیلو گرم') selected @endif value="کیلو گرم">کیلو گرم</option>
             <option @if ($pro->vahed=='جین') selected @endif value="جین">جین</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label for="num_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mnum_editSPOUSS"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" value="{{$pro->num}}" id="num_editSPOUSS"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="vazn_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mvazn_editSPOUSS"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$pro->vazn}}"  id="vazn_editSPOUSS"placeholder="در صورت نیاز ..."></div>
       </div>
       <div class="form-group">
         <label for="dimension_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS" data-toggle="modal" data-target="#Mdimension_editSPOUSS"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 dimension_editSPOUSSD1">
               <label for="dimension_editSPOUSS1" class="control-label pull-right "> بزرگتر از 100 cm</label>
               <input type="radio" name="dimension_editSPOUSS"@if ($pro->dimension==2) checked @endif id="dimension_editSPOUSS1" value="2">
             </div>
             <div class="div_form_radio2 stamp_editSPOUSSD2">
               <label for="dimension_editSPOUSS2" class="control-label pull-right ">کوچکتر از 100 cm </label>
               <input type="radio" name="dimension_editSPOUSS"@if ($pro->dimension==1) checked @endif id="dimension_editSPOUSS2" value="1">
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="vaznPost_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#MvaznPost_editSPOUSS"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$pro->vaznPost}}" id="vaznPost_editSPOUSS"></div>
       </div>
       <div class="form-group">
         <label for="pakat_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mpakat_editSPOUSS"></i>  هزینه بسته بندی (تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder_price" value="{{$pro->pakat}}" id="pakat_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_editSPOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mdis_editSPOUSS"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_editSPOUSS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$pro->dis}} </textarea>
         </div>
       </div>
       {{-- <div class="form-group">
         <label for="disSeller_editSPOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mdis_editSPOUSS"></i>توضیح برای این سفارش</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_editSPOUSS"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید .">{{$pro->}} </textarea>
         </div>
       </div> --}}
       <div class="form-group">
         <label for="dateMake_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#MdateMake_editSPOUSS"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$pro->dateMake}}"  id="dateMake_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_editSPOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#MdateExpiration_editSPOUSS"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$pro->dateExpiration}}" id="dateExpiration_editSPOUSS"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="term_editSPOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_editSPOUSS"data-toggle="modal" data-target="#Mterm_editSPOUSS"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class=" placeholder" id="term_editSPOUSS"placeholder="اختیاری ...">{{$pro->term}}</textarea>
         </div>
       </div>

       <div class="tImgForm">
         بارگذاری عکس محصول
       </div>

       <div class="imgForm" >{{-- fatheAjax--}}
         <div class="loader loaderImg " >{{-- loaderAjax --}}
           <div class="opacityC opacityImg"></div>{{-- opacityAjax --}}
           <div class="spinner-border text-primary spinnerC spinnerImg" >.</div>{{-- spinnerAjax --}}
         </div>
         <div class="btnImgForm" onclick="setDropzone()">
           <i class='fas fa-camera'></i>
         </div>
         @php
           $rr=1;
           @endphp

         @for ($r=1;$r<7; $r++ )
           {{-- {{$rr}} --}}
           @continue(empty($imgPro['pic_b'.$r]))
           @php
             $imgClass='imgClass'.$r;
             $celImgB='pic_b'.$r;
             $celImgS='pic_s'.$r;
           @endphp
           <div class="divImgP {{$imgClass}}" >
             <i class='fas fa-times iDElImg' onclick="delimg2({{$imgPro['id']}},'{{$celImgB}}','{{$celImgS}}','{{$imgPro[$celImgB]}}','{{$imgClass}}')" ></i>
             <img  src="/img_pro/{{$imgPro[$celImgB]}}" alt="" width="90" height="90">

           </div>
           @php
             $rr++
           @endphp
         @endfor
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success"onclick="editPro({{$pro->id}},null,{{$imgPro->id}},'stamp_editSPOUSS','name_editSPOUSS','maker_editSPOUSS','brand_editSPOUSS','model_editSPOUSS','price_editSPOUSS','not','vahed_editSPOUSS','num_editSPOUSS','vazn_editSPOUSS','dimension_editSPOUSS','vaznPost_editSPOUSS','pakat_editSPOUSS','dis_editSPOUSS','not','dateMake_editSPOUSS','dateExpiration_editSPOUSS','term_editSPOUSS',
         'ajax_editSPOUSS','.form_editSPOUSS','/showProOneUnStockShop/{{$pro->id}}',null,null)" >ثبت تغییرات</button>
           <button type="button"class="btn btn-danger orderAghdamP2"onclick="del_proShopCheckOffer({{$numShowOrder}},{{$pro->id}})">حذف محصول</button>
       </div></form></div></div>
   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderSabtSh"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true"><div class="modal-dialog"role="document"><div class="modal-content"><div class="modal-body modal_ok">
      <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
      <div class="modal_ok2">ویرایش محصول با موفقیت ثبت شد.</div></div><div class=" modal_ok3">
      <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
   </div></div></div></div><!--end modal پایان موفقیت ثبت .-->
   {{--  --}}
   <!-- حذف محصول هنگامی که پیشنهاد نشده و فروخته نشده-->
   <div class="modal fade" id="del_pro1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-body orderAghdamModal2 ">
           <span><b>توجه !!</b> آیا می خواهید این محصول را حذف کنید ؟ </span>
         </div>
         <div class="orderAghdamModal3">
             <button type="button" class="btn btn-primary"onclick="del_pro({{$pro->id}},{{$imgPro->id}},'showProUnStockShop',1)" data-dismiss="modal"  aria-label="Close">بله</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
         </div>
       </div>
     </div>
   </div><!--end modal  -->
   {{-- حذف محصولی که به مشتری پیشهاد داده شده است  --}}
   <div class="modal fade" id="del_pro2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-body orderAghdamModal2 alertCheckDlePro1">
           <span><b>توجه !!</b> آیا می خواهید این سفارش را حذف کنید ؟ </span>
         </div>
         <div class="orderAghdamModal3 alertCheckDlePro2">
             <button type="button" class="btn btn-primary"onclick="del_pro({{$pro->id}},{{$imgPro->id}},'showProUnStockShop',2)" data-dismiss="modal"  aria-label="Close">بله</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
         </div>
       </div>
     </div>
   </div><!--end modal  -->
   <div class="modal fade" id="MDropzone"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-header">
     <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <div class="modal-body modal_body_h_login ">
          <div class="titr_modal_img_addpro">آپلود عکس</div>
          <div class="ajax_form_modal addIdAjax warningDropzone"></div>
          <form  class="dropzone form_img_add_pro addIdForm" action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}
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
    </div>
  </div></div> </div><!--end modal  عکس -->
   {{--  --}}
   <div class="modal fade" id="Mstamp_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           مشابه محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mname_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           نام محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmaker_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         maker
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mbrand_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است .
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmodel_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          مدل
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mprice_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          قیمت
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvahed_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           واحد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mnum_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          تعداد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvazn_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MvaznPost_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن پستی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mpakat_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          بسته بندی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mdis_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           توضیح محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateMake_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ تولید
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateExpiration_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ انقضا
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mterm_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           شرایط نگهداری
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg1_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 1
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg0_editSPOUSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 0
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->

@endsection
