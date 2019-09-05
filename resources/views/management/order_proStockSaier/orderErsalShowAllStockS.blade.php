{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: سفارشات ارسال شده
@endsection
@section('show_stockSaier')
  <div class="div_titr">
   نمایش سفارشات ارسالی
  </div>
  <div class="div_body">
  @if (empty($buy[0]['id']))
    <div class="alert alert-danger">
      سفارش ارسال شده ای موجود نیست .
    </div>
  @else
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderErsalPSS1">نام محصول</div>
      <div class="divRow3 orderErsalPSS2 ">کد سفارش</div>
      <div class="divRow3 orderErsalPSS3 ">فروشگاه</div>
      <div class="divRow3 orderErsalPSS4 ">کد رهگیری</div>
      <div class="divRow3 orderErsalPSS5">تاریخ</div>
      <div class="divRow3 orderErsalPSS6 ">مشاهده</div>

    </div>
    @php
      $r=0;
    @endphp
    @foreach ($buy as $buys)
      @php
      $r++;
      $pro2=$pro->find($buys->pro_id);
      $shop2=$shop->find($buys->shop_id);
      $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
      @endphp
      <div class="divRow2 {{$classBg}} ">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderErsalPSS1 orderErsalPSS1_2">{{$pro2->name}}</div>
        <div class="divRow3 orderErsalPSS2 orderErsalPSS2_2">{{$buys->id}}</div>
        <a href="/showShopPro/{{$shop2->id}}/orderErsalShowAll"><div class="divRow3 orderErsalPSS3 ">{{$shop2->shop}}</div></a>
        <div class="divRow3 orderErsalPSS4 orderErsalPSS4_2">{{$buys->code_rahgiry}}</div>
        <div class="divRow3 orderErsalPSS5">{{$buys->date_post}} </div>
        <a href="/orderErsalShowOneStockS/{{$buys->id}}"><div class="divRow3 orderErsalPSS6 orderErsalPSS6_2">مشاهده</div></a>

      </div>
    @endforeach
  </div>
@endif
</div>
@endsection
