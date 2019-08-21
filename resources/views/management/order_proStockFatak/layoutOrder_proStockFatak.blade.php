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
        <a href="/orderNewPStockF" class=""><span class="titrCBR">سفارشات جدید</span><span class="badgeCBR">{{$orderNewCount}}</span> </a>
        <a href="/proceedOrderStockF" class=""><span class="titrCBR">سفارشات در حال اقدام</span><span class="badgeCBR">{{$orderAgdamCount}}</span> </a>
        <a href="/orderErsalSabtStockF" class=""><span class="titrCBR">ثبت سفارش ارسال شده</span> </a>
        <a href="/orderErsalShowAllStockF" class=""><span class="titrCBR">سفارشات ارسال شده</span><span class="badgeCBR">{{$orderPostCount}}</span> </a>
        <a href="/orderSabtEndStockF" class=""><span class="titrCBR">ثبت سفارش تحویلی</span> </a>
        <a href="/orderSabtEndShowAllStockF" class=""><span class="titrCBR">سفارشات تحویلی</span><span class="badgeCBR">{{$orderDeliverCount}}</span> </a>
        <a href="/orderBackSabtStockF" class=""><span class="titrCBR">ثبت سفارش مرجوعی</span> </a>
        <a href="/orderBackShowAllStockF" class=""><span class="titrCBR">سفارشات مرجوعی</span><span class="badgeCBR">{{$orderbackCount}}</span> </a>
        {{-- <a href="#" class=""><span class="titrCBR">ثبت مرجوعی تسویه شده</span> </a> --}}
        <a href="/orderBackEndShowAllStockF" class=""><span class="titrCBR">مرجوعی تسویه شده</span><span class="badgeCBR">{{$orderbackEndCount}}</span> </a>
      </div>
      <div class="contentDash2_body_l" id="pjax_pro">

        @yield('show_stockFatak')
      </div>
    </div>
  </div>

@endsection
