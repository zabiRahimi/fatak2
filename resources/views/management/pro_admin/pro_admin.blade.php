@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: محصولات
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      محصولات
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        <a href="/pro_admin" class=""><span class="titrCBR">مدیریت محصولات</span> </a>
        <a href="/add_pro" class=""><span class="titrCBR">اضافه کردن محصول</span> </a><!-- نکته : بجهت نمایش ادیتور کد از پی جکس استفاده نشده است -->
        <a href="/all_edit_pro" class=""><span class="titrCBR">ویرایش محصولات</span> </a>
        <a href="/orderBuy" class=""><span class="titrCBR">محصولات سفارش شده</span><span class="badgeCBR">{{$orderNewCount}}</span> </a>
        <a href="/proceedPro" class=""><span class="titrCBR">محصولات در حال اقدام</span><span class="badgeCBR">{{$orderAgdamCount}}</span> </a>
        <a href="/orderErsalSabt" class=""><span class="titrCBR">ثبت محصول ارسال شده</span> </a>
        <a href="/orderErsalShowAll" class=""><span class="titrCBR">محصولات ارسال شده</span><span class="badgeCBR">{{$orderPostCount}}</span> </a>
        <a href="/orderSabtEnd" class=""><span class="titrCBR">ثبت محصول تحویلی</span> </a>
        <a href="/orderSabtEndShowAll" class=""><span class="titrCBR">محصولات تحویلی</span><span class="badgeCBR">{{$orderDeliverCount}}</span> </a>
        <a href="/orderBackSabt" class=""><span class="titrCBR">ثبت محصول مرجوعی</span> </a>
        <a href="/orderBackShowAll" class=""><span class="titrCBR">محصولات مرجوعی</span><span class="badgeCBR">{{$orderbackCount}}</span> </a>
        {{-- <a href="#" class=""><span class="titrCBR">ثبت مرجوعی تسویه شده</span> </a> --}}
        <a href="/orderBackEndShowAll" class=""><span class="titrCBR">مرجوعی تسویه شده</span><span class="badgeCBR">{{$orderbackEndCount}}</span> </a>
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

        @yield('show_pro')

      </div>
    </div>
  </div>

@endsection
