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
        <a href="/order_proStockSaier" class=""><span class="titrCBR">مدیریت سفارش محصولات </span> </a>
        <a href="/orderNewPStockS" class=""><span class="titrCBR">سفارشات جدید</span><span class="badgeCBR">{{$orderNewCount}}</span> </a>
        <a href="/proceedOrderStockS" class=""><span class="titrCBR">سفارشات در حال اقدام</span><span class="badgeCBR">{{$orderAgdamCount}}</span> </a>
        <a href="/orderErsalSabtStockS" class=""><span class="titrCBR">ثبت سفارش ارسال شده</span> </a>
        <a href="/orderErsalShowAllStockS" class=""><span class="titrCBR">سفارشات ارسال شده</span><span class="badgeCBR">{{$orderPostCount}}</span> </a>
        <a href="/orderSabtEndStockS" class=""><span class="titrCBR">ثبت سفارش تحویلی</span> </a>
        <a href="/orderSabtEndShowAllStockS" class=""><span class="titrCBR">سفارشات تحویلی</span><span class="badgeCBR">{{$orderDeliverCount}}</span> </a>
        <a href="/orderBackSabtStockS" class=""><span class="titrCBR">ثبت سفارش مرجوعی</span> </a>
        <a href="/orderBackShowAllStockS" class=""><span class="titrCBR">سفارشات مرجوعی</span><span class="badgeCBR">{{$orderbackCount}}</span> </a>
        {{-- <a href="#" class=""><span class="titrCBR">ثبت مرجوعی تسویه شده</span> </a> --}}
        <a href="/orderBackEndShowAllStockS" class=""><span class="titrCBR">مرجوعی تسویه شده</span><span class="badgeCBR">{{$orderbackEndCount}}</span> </a>
      </div>
      <div class="contentDash2_body_l" id="pjax_pro">

        @yield('show_stockSaier')
      </div>
    </div>
  </div>

@endsection
