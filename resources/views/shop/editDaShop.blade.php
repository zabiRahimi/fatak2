@extends('shop.layoutDashShop')
@section('title')
  ویرایش اطلاعات
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
  <form class="form form_editDaShop" id="form_edit_data" action="" method="post">
   <div class="form_titr"><i class="fas fa-info-circle"></i>ویرایش اطلاعات</div>
   <div id="ajax_editDaShop"></div>
   {{ csrf_field() }}
   <div class="form-group">
     <label for="shop_editDaShop" class="control-label pull-right "><i class="fas fa-tag i_form"></i> نام فروشگاه</label>
     <div class="div_form"><input type="text" class="form-control" id="shop_editDaShop" value="{{$user->shop}}"></div>
   </div>
   <div class="form-group">
     <label for="seller_editDaShop" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی</label>
     <div class="div_form"><input type="text" class="form-control" id="seller_editDaShop" value="{{$user->seller}}"></div>
   </div>
   <div class="form-group">
     <label for="codemly_editDaShop" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  کد ملی</label>
     <div class="div_form"><input type="text" class="form-control" id="codemly_editDaShop" value="{{$user->codemly}}"></div>
   </div>
   <div class="form-group">
     <label for="mobail_editDaShop" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
     <div class="div_form"><input type="text" class="form-control" id="mobail_editDaShop" value="{{$user->mobail}}"></div>
   </div>
   <div class="form-group">
     <label for="tel_editDaShop" class="control-label pull-right "><i class="fas fa-phone i_form"></i> تلفن</label>
     <div class="div_form"><input type="text" class="form-control" id="tel_editDaShop" value="{{$user->tel}}"></div>
   </div>
   <div class="form-group">
     <label for="email_editDaShop" class="control-label pull-right "><i class="fas fa-at i_form"></i>  ایمیل</label>
     <div class="div_form"><input type="text" class="form-control" id="email_editDaShop" value="{{$user->email}}"></div>
   </div>
   <div class="form-group">
     <div class="formGroupCity">
       <label for="ostan_editDaShop" class="control-label pull-right labelCity"><i class="fas fa-map-marker i_form"></i> استان</label>
       <div class="div_formCity">
         <select class="ostan" name="" id="ostan_editDaShop">

           <option value="اردبیل" onclick="show_city('ostan1')" @if ($user->ostan=='اردبیل') selected @endif>اردبیل</option>
           <option value="اصفهان" onclick="show_city('ostan2')" @if ($user->ostan=='اصفهان') selected @endif>اصفهان</option>
           <option value="البرز" onclick="show_city('ostan3')" @if ($user->ostan=='البرز') selected @endif>البرز</option>
           <option value="ایلام" onclick="show_city('ostan4')" @if ($user->ostan=='ایلام') selected @endif>ایلام</option>
           <option value="آذربایجان شرقی" onclick="show_city('ostan5')" @if ($user->ostan=='آذربایجان شرقی') selected @endif>آذربایجان شرقی</option>
           <option value="آذربایجان غربی" onclick="show_city('ostan6')" @if ($user->ostan=='آذربایجان غربی') selected @endif>آذربایجان غربی</option>
           <option value="بوشهر" onclick="show_city('ostan7')" @if ($user->ostan=='بوشهر') selected @endif>بوشهر</option>
           <option value="تهران" onclick="show_city('ostan8')" @if ($user->ostan=='تهران') selected @endif>تهران</option>
           <option value="چهار محال بختیاری" onclick="show_city('ostan9')" @if ($user->ostan=='چهار محال بختیاری') selected @endif>چهار محال بختیاری</option>
           <option value="خراسان جنوبی" onclick="show_city('ostan10')" @if ($user->ostan=='خراسان جنوبی') selected @endif>خراسان جنوبی</option>
           <option value="خراسان رضوی" onclick="show_city('ostan11')" @if ($user->ostan=='خراسان رضوی') selected @endif>خراسان رضوی</option>
           <option value="خراسان شمالی" onclick="show_city('ostan12')" @if ($user->ostan=='خراسان شمالی') selected @endif>خراسان شمالی</option>
           <option value="خوزستان" onclick="show_city('ostan13')" @if ($user->ostan=='خوزستان') selected @endif>خوزستان</option>
           <option value="زنجان" onclick="show_city('ostan14')" @if ($user->ostan=='زنجان') selected @endif>زنجان</option>
           <option value="سمنان" onclick="show_city('ostan15')" @if ($user->ostan=='سمنان') selected @endif>سمنان</option>
           <option value="سیستان و بلوچستان" onclick="show_city('ostan16')" @if ($user->ostan=='سیستان و بلوچستان') selected @endif>سیستان و بلوچستان</option>
           <option value="فارس" onclick="show_city('ostan17')" @if ($user->ostan=='فارس') selected @endif>فارس</option>
           <option value="قزوین" onclick="show_city('ostan18')" @if ($user->ostan=='قزوین') selected @endif>قزوین</option>
           <option value="قم" onclick="show_city('ostan19')" @if ($user->ostan=='قم') selected @endif>قم</option>
           <option value="کردستان" onclick="show_city('ostan20')" @if ($user->ostan=='کردستان') selected @endif>کردستان</option>
           <option value="کرمان" onclick="show_city('ostan21')" @if ($user->ostan=='کرمان') selected @endif>کرمان</option>
           <option value="کرمانشاه" onclick="show_city('ostan22')" @if ($user->ostan=='کرمانشاه') selected @endif>کرمانشاه</option>
           <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23')" @if ($user->ostan=='کهگیلویه و بویراحمد') selected @endif>کهگیلویه و بویراحمد</option>
           <option value="گلستان" onclick="show_city('ostan24')" @if ($user->ostan=='گلستان') selected @endif>گلستان</option>
           <option value="گیلان" onclick="show_city('ostan25')" @if ($user->ostan=='گیلان') selected @endif>گیلان</option>
           <option value="لرستان" onclick="show_city('ostan26')" @if ($user->ostan=='لرستان') selected @endif>لرستان</option>
           <option value="مازندران" onclick="show_city('ostan27')" @if ($user->ostan=='مازندران') selected @endif>مازندران</option>
           <option value="مرکزی" onclick="show_city('ostan28')" @if ($user->ostan=='مرکزی') selected @endif>مرکزی</option>
           <option value="هرمزگان" onclick="show_city('ostan29')" @if ($user->ostan=='هرمزگان') selected @endif>هرمزگان</option>
           <option value="همدان" onclick="show_city('ostan30')" @if ($user->ostan=='همدان') selected @endif>همدان</option>
           <option value="یزد" onclick="show_city('ostan31')" @if ($user->ostan=='یزد') selected @endif>یزد</option>
         </select>
       </div>
     </div>
     <div class="formGroupCity">
       <label for="city_editDaShop" class="control-label pull-right labelCity"><i class="fas fa-map-marker-alt i_form"></i> شهر</label>
       <div class="div_formCity">
         @php
           $city=$user->city;
         @endphp
         <select class="ajax_sabad_city" id="city_editDaShop" onclick="show_city_edit()">

           @include('show_city2')

         </select>
       </div>
     </div>

   </div>
   <div class="form-group">
     <label for="address_editDaShop" class="control-label pull-right  "><i class="fas fa-home i_form"></i> آدرس </label>
     <div class="div_formTextarea">
       <textarea name="name" id="address_editDaShop">{{$user->address}}</textarea>
     </div>
   </div>
   <div class="form-group">
     <label for="codepost_editDaShop" class="control-label pull-right "><i class="far fa-address-card i_form"></i>کد پستی</label>
     <div class="div_form"><input type="text" class="form-control" id="codepost_editDaShop" value="{{$user->codepost}}"></div>
   </div>
   <div class="form-group">
     <label for="accountNumber_editDaShop" class="control-label pull-right "><i class="fas fa-money-check-alt i_form"></i> شماره حساب بانکی</label>
     <div class="div_form"><input type="text" class="form-control" id="accountNumber_editDaShop" value="{{$user->accountNumber}}"></div>
   </div>
   <div class="form-group">
     <label for="cart_editDaShop" class="control-label pull-right "><i class="fas fa-money-check i_form"></i> شماره کارت بانکی</label>
     <div class="div_form"><input type="text" class="form-control" id="cart_editDaShop" value="{{$user->cart}}"></div>
   </div>
   <div class="form-group">
     <label for="master_editDaShop" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام صاحب حساب</label>
     <div class="div_form"><input type="text" class="form-control" id="master_editDaShop" value="{{$user->master}}"></div>
   </div>
   <div class="form-group">
     <label for="bank_editDaShop" class="control-label pull-right "><i class="fas fa-database i_form"></i> نام بانک</label>
     <div class="div_form"><input type="text" class="form-control" id="bank_editDaShop" value="{{$user->bank}}"></div>
   </div>
   <div class="form-group form_btn">
     <button type="button" class="btn btn-success" onclick="editDaShopSave({{$user->id}})" >ثبت</button>
   </div>
 </form>
 <div class="line_editCh"></div>

 <form class="form form_editPasDaShop" id="form_editPasDaShop" action="" method="post">
  <div class="form_titr"><i class="fas fa-info-circle"></i>تغییر رمز</div>
  <div id="ajax_editPasDaShop"></div>
  {{ csrf_field() }}

  <div class="form-group">
    <label for="pasOld_editPasDaShop" class="control-label pull-right "><i class="fas fa-unlock i_form"></i> رمز فعلی</label>
    <div class="div_form"><input type="text" class="form-control" id="pasOld_editPasDaShop"></div>
  </div>
  <div class="form-group">
    <label for="pasNew_editPasDaShop" class="control-label pull-right "><i class="fas fa-unlock-alt i_form"></i> رمز جدید</label>
    <div class="div_form"><input type="text" class="form-control" id="pasNew_editPasDaShop"></div>
  </div>

  <div class="form-group form_btn">
    <button type="button" class="btn btn-success" onclick="editPasDaShop({{$user->id}})" >تغییر رمز</button>
  </div>
</form>
@endif
<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_editDaShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">تغییرات با موفقیت انجام شد .</div>
      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->
<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_editPasDaShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">رمز جدید با موفقیت ثبت شد .</div>
      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->
@endsection
