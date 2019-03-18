@extends('management.layout_admin')
@section('title')
  مدیریت :: محصولات
@endsection
@section('content')
  <div class="pro_ad">
    <div class="pro_ad_titr">
      <h5>مدیریت محصولات</h5>
    </div>
    <div class="pro_ad_body">
      <div class="pro_ad_body_r">
        <ul class="ul_pro_r">
          <a href="#" class="a_pjax_pro1"> <li onclick="show_div('pro_all')">مدیریت محصولات</li></a>
          <a href="/add_pro" > <li>اضافه کردن محصول</li></a><!-- نکته : بجهت نمایش ادیتور کد از پی جکس استفاده نشده است -->
          <a href="/all_edit_pro" class="apjaxpro"><li >ویرایش محصولات</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('order_pro')">محصولات سفارش شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ثبت شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ارسال شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات تحویل داده شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ارجاع شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">مرجوعی تسویه شده</li></a>
        </ul>
      </div>
      <div class="pro_ad_body_l" id="pjax_pro">
        
        @yield('show_pro')

      </div>
    </div>
  </div>

@endsection
