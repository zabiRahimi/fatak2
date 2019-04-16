@extends('channel.dashChLayout')
@section('title')
  ویرایش اطلاعات
@endsection
@section('dash_content')
  <form class="form form_editDaCh" id="form_edit_data" action="" method="post">
   <div class="form_titr"><i class="fas fa-info-circle"></i>ویرایش اطلاعات</div>
   <div id="ajax_channellog"></div>
   {{ csrf_field() }}
   <div class="form-group">
     <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> نام و نام خانوادگی</label>
     <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  کد ملی</label>
     <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> موبایل</label>
     <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  ایمیل</label>
     <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <div class="formGroupCity">
       <label for="ostan_perfectDaCh" class="control-label pull-right labelCity"><i class="fas fa-map-marker i_form"></i> استان</label>
       <div class="div_formCity">
         <select class="" name="" id="ostan_perfectDaCh">
           <option value="aval" onclick="show_city('no')" selected>انتخاب استان</option>
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
       <label for="city_perfectDaCh" class="control-label pull-right labelCity"><i class="fas fa-map-marker-alt i_form"></i> شهر</label>
       <div class="div_formCity">
         <select class="ajax_sabad_city" id="city_perfectDaCh" name="">
           @include('show_city2')
         </select>
       </div>
     </div>

   </div>
   <div class="form-group">
     <label for="address_perfectDaCh" class="control-label pull-right  "><i class="fas fa-home i_form"></i> آدرس </label>
     <div class="div_formTextarea">
       <textarea name="name" id="address_perfectDaCh"></textarea>
     </div>
   </div>
   <div class="form-group">
     <label for="accountNumber_perfectDaCh" class="control-label pull-right "><i class="fas fa-money-check-alt i_form"></i> شماره حساب بانکی</label>
     <div class="div_form"><input type="text" class="form-control" id="accountNumber_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="cart_perfectDaCh" class="control-label pull-right "><i class="fas fa-money-check i_form"></i> شماره کارت بانکی</label>
     <div class="div_form"><input type="text" class="form-control" id="cart_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="master_perfectDaCh" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام صاحب حساب</label>
     <div class="div_form"><input type="text" class="form-control" id="master_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <label for="bank_perfectDaCh" class="control-label pull-right "><i class="fas fa-database i_form"></i> نام بانک</label>
     <div class="div_form"><input type="text" class="form-control" id="bank_perfectDaCh"></div>
   </div>
   <div class="form-group form_btn">
     <button type="button" class="btn btn-success" onclick="login_channel()" >ثبت</button>
   </div>
 </form>
 <div class="line_editCh"></div>

 <form class="form form_editDaCh" id="form_edit_data" action="" method="post">
  <div class="form_titr"><i class="fas fa-info-circle"></i>تغییر رمز</div>
  <div id="ajax_channellog"></div>
  {{ csrf_field() }}

  <div class="form-group">
    <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> رمز فعلی</label>
    <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
  </div>
  <div class="form-group">
    <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> رمز جدید</label>
    <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
  </div>

  <div class="form-group form_btn">
    <button type="button" class="btn btn-success" onclick="login_channel()" >تغییر رمز</button>
  </div>
</form>
@endsection
