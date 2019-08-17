@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: سفارش محصولات موجود
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      سفارش محصول موجود
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        <a href="/order_proStockFatak" class=""><span class="titrCBR">مدیریت سفارش محصولات </span> </a>
        <a href="/orderNewPStockF" class=""><span class="titrCBR">خرید های جدید</span> </a>
        <a href="/proceedOrderStockF" class=""><span class="titrCBR">خریدهای در حال آماده سازی</span> </a>

        {{-- <ul class="ul_pro_r">
          <a href="#" class="a_pjax_pro1"> <li onclick="show_div('pro_all')">مدیریت محصولات</li></a>
          <a href="/add_pro" > <li>اضافه کردن محصول</li></a><!-- نکته : بجهت نمایش ادیتور کد از پی جکس استفاده نشده است -->
          <a href="/all_edit_pro" class="apjaxpro"><li >ویرایش محصولات</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('order_pro')">محصولات سفارش شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ثبت شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ارسال شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات تحویل داده شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">محصولات ارجاع شده</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('add_pro')">مرجوعی تسویه شده</li></a>
        </ul> --}}
      </div>
      <div class="contentDash2_body_l" id="pjax_pro">

        @yield('show_stockFatak')
      </div>
    </div>
  </div>

@endsection
