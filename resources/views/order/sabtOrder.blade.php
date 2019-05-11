@extends('order.layoutOrder')
@section('title')
 ثبت سفارش
@endsection
@section('content')
  <div class="sabtOrder">
    <div class="sabtOrder_1">ثبت سفارش محصول</div>
    <div class="sabtOrder_2">به نام خدا</div>
    <div class="sabtOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line sabtOrderUl ">
    <li>صفحه اصلی</li>
    <li>نحوه فعالیت</li>
    <li>قوانین و مقررات</li>
  </ul>
  <div class="sabtOrder3">
    <form class="form form_sabtOrder" id="form_sabtOrder" action="" method="post">
     <div class="form_titr"><i class="fas fa-info-circle"></i>سفارش محصول</div>
     <div id="ajax_sabtOrder"></div>
     {{ csrf_field() }}
     <div class="form-group">
       <label for="namePro_sabtOrder" class="control-label pull-right "><i class="fas fa-tag i_form"></i>نام محصول</label>
       <div class="div_form"><input type="text" class="form-control" id="namePro_sabtOrder" ></div>
     </div>
     <div class="form-group">
       <label for="squad_sabtOrder" class="control-label pull-right "><i class="fas fa-clipboard-list i_form"></i> دسته محصول (اختیاری)</label>
       <div class="div_form">
         <select class="select squad_sabtOrder" id="squad_sabtOrder" name="" >
           <option value="">انتخاب کنید</option>
           <option value="آشپزی و شیرینی پزی">آشپزی و شیرینی پزی</option>
           <option value="کتاب و نوشت افزار">کتاب و نوشت افزار</option>
           <option value="لوازم خودرو">لوازم خودرو</option>
           <option value="اسباب منزل">اسباب منزل</option>
           <option value="موبایل">موبایل</option>
         </select>
       </div>
     </div>
     <div class="form-group">
       <label for="vahed_sabtOrder" class="control-label pull-right "><i class="fas fa-clipboard-list i_form"></i> واحد شمارش کالا</label>
       <div class="div_form">
         <select class="select squad_sabtOrder" id="vahed_sabtOrder" name="" >
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
       <label for="num_sabtOrder" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> تعداد خرید</label>
       <div class="div_form"><input type="number" class="form-control" id="num_sabtOrder" value="1" min="1" max="15"></div>
     </div>
     <div class="form-group">
       <label for="dis_sabtOrder" class="control-label pull-right "><i class="far fa-clipboard i_form"></i> توضیح درباره محصول</label>
       <div class="div_formTextarea">
         <textarea name="name"id="dis_sabtOrder"placeholder="اختیاری ... "></textarea>
       </div>
     </div>
     <div class="form-group">
       <label for="mobail_sabtOrder" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
       <div class="div_form"><input type="text" class="form-control" id="mobail_sabtOrder"></div>
     </div>
     <div class="form-group">
       <div class="formGroupCity">
         <label for="ostan_sabtOrder" class="control-label pull-right labelCity"><i class="fas fa-map-marker i_form"></i> استان</label>
         <div class="div_formCity">
           <select class="" name="" id="ostan_sabtOrder">
             <option value="" onclick="show_city('no')" selected>انتخاب استان</option>
             <option value="اردبیل" onclick="show_city('ostan1')">اردبیل</option>
             <option value="اصفهان" onclick="show_city('ostan2')">اصفهان</option>
             <option value="البرز" onclick="show_city('ostan3')">البرز</option>
             <option value="ایلام" onclick="show_city('ostan4')">ایلام</option>
             <option value="آذربایجان شرقی" onclick="show_city('ostan5')">آذربایجان شرقی</option>
             <option value="آذربایجان غربی" onclick="show_city('ostan6')">آذربایجان غربی</option>
             <option value="بوشهر" onclick="show_city('ostan7')">بوشهر</option>
             <option value="تهران" onclick="show_city('ostan8')">تهران</option>
             <option value="چهار محال بختیاری" onclick="show_city('ostan9')">چهار محال بختیاری</option>
             <option value="خراسان جنوبی" onclick="show_city('ostan10')">خراسان جنوبی</option>
             <option value="خراسان رضوی" onclick="show_city('ostan11')">خراسان رضوی</option>
             <option value="خراسان شمالی" onclick="show_city('ostan12')">خراسان شمالی</option>
             <option value="خوزستان" onclick="show_city('ostan13')">خوزستان</option>
             <option value="زنجان" onclick="show_city('ostan14')">زنجان</option>
             <option value="سمنان" onclick="show_city('ostan15')">سمنان</option>
             <option value="سیستان و بلوچستان" onclick="show_city('ostan16')">سیستان و بلوچستان</option>
             <option value="فارس" onclick="show_city('ostan17')">فارس</option>
             <option value="قزوین" onclick="show_city('ostan18')">قزوین</option>
             <option value="قم" onclick="show_city('ostan19')">قم</option>
             <option value="کردستان" onclick="show_city('ostan20')">کردستان</option>
             <option value="کرمان" onclick="show_city('ostan21')">کرمان</option>
             <option value="کرمانشاه" onclick="show_city('ostan22')">کرمانشاه</option>
             <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23')">کهگیلویه و بویراحمد</option>
             <option value="گلستان" onclick="show_city('ostan24')">گلستان</option>
             <option value="گیلان" onclick="show_city('ostan25')">گیلان</option>
             <option value="لرستان" onclick="show_city('ostan26')">لرستان</option>
             <option value="مازندران" onclick="show_city('ostan27')">مازندران</option>
             <option value="مرکزی" onclick="show_city('ostan28')">مرکزی</option>
             <option value="هرمزگان" onclick="show_city('ostan29')">هرمزگان</option>
             <option value="همدان" onclick="show_city('ostan30')">همدان</option>
             <option value="یزد" onclick="show_city('ostan31')">یزد</option>
           </select>
         </div>
       </div>
       <div class="formGroupCity">
         <label for="city_sabtOrder" class="control-label pull-right labelCity"><i class="fas fa-map-marker-alt i_form"></i> شهر</label>
         <div class="div_formCity">
           <select class="ajax_sabad_city" id="city_sabtOrder" name="">
             @include('show_city2')
           </select>
         </div>
       </div>
     </div>
     <div class="form-group" >
       <label for="amniat_sabtOrder" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
       <div class="div_form"><input type="text" class="form-control tel" id="amniat_sabtOrder" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
     </div>
     <div class="captcha_form">
       <span class="captcha4">{!! captcha_img() !!}</span>
       <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
     </div>
     <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="sabtOrderSave()" >ثبت</button>
     </div>
   </form>
  </div>



<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">سفارش شما با موفقیت ثبت شد .</div>
        <div class="modal_ok2">
          <p>
            کد پیگیری سفارش شما <span class="idOrder">12</span> است .
            <br>
            شما جهت پیگیری و خرید سفارش خود به این کد نیاز دارید ، این کد را یادداشت نمایید .
          </p>
        </div>


      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->

@endsection
