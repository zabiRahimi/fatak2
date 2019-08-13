@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: شبکه های اجتماعی
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      شبکه اجتماعی
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        <a href="/channel_admin" class=""><span class="titrCBR">مدیریت شبکه های اجتماعی</span> </a>
        <a href="/all_edit_channel" class=""><span class="titrCBR">ویرایش شبکه های اجتماعی</span> </a>
        <a href="/all_act_channel" class=""><span class="titrCBR">کارکرد شبکه های اجتماعی</span> </a>
        <a href="/all_rank_channel" class=""><span class="titrCBR">رتبه شبکه های اجتماعی</span> </a>

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

        @yield('show_channel')

      </div>
    </div>
  </div>

@endsection
