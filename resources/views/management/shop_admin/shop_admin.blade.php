@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: فروشگاها
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      فروشگاها
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        <a href="/shop_admin" class=""><span class="titrCBR">مدیریت فروشگاها</span> </a>
        <a href="/all_edit_shop" class=""><span class="titrCBR">ویرایش فروشگاها</span> </a>
        <a href="/all_act_shop" class=""><span class="titrCBR">کارکرد فروشگاها</span> </a>
        <a href="/all_rank_shop" class=""><span class="titrCBR">رتبه فروشگاها</span> </a>
        <a href="/all_newOrderSA" class=""><span class="titrCBR">سفارشهای جدید</span> </a>

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

        @yield('show_shop')

      </div>
    </div>
  </div>

@endsection
