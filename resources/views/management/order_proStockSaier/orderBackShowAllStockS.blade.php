{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: سفارشات مرجوعی
@endsection
@section('show_stockSaier')
  <div class="div_titr">
   نمایش سفارشات مرجوعی
  </div>
  <div class="div_body">
    @if (empty($buy[0]['id']))
      <div class="alert alert-danger">
        سفارش مرجوعی موجود نیست .
      </div>
    @else
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderErsalPSS1">نام محصول</div>
      <div class="divRow3 orderErsalPSS2">کد سفارش</div>
      <div class="divRow3 orderErsalPSS3">فروشگاه</div>
      <div class="divRow3 orderErsalPSS4">کد رهگیری برگشتی</div>
      <div class="divRow3 orderErsalPSS5">تاریخ</div>
      <div class="divRow3 orderErsalPSS6">مشاهده</div>

    </div>
    @php
      $r=0;
    @endphp
    @foreach ($buy as $buys)
      @php
      $r++;
      $pro2=$pro->find($buys->pro_id);
      $shop2=$shop->find($buys->shop_id);
      $backPro2=$backPro->find($buys->backPro_id);
      $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;

      @endphp
      <div class="divRow2 {{$classBg}} ">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderErsalPSS1 orderErsalPSS1_2 ">{{$pro2->name}}</div>
        <div class="divRow3 orderErsalPSS2 orderErsalPSS2_2">{{$buys->id}}</div>
        <a href="/showShopProStockS/{{$shop2->id}}/orderBackShowAllStockS"><div class="divRow3 orderErsalPSS3">{{$shop2->shop}}</div></a>
        <div class="divRow3 orderErsalPSS4 orderErsalPSS4_2">{{$backPro2->code_rahgiry}}</div>
        <div class="divRow3 orderErsalPSS5">{{$backPro2->date_post}} </div>
        <a href="/orderBackShowOneStockS/{{$buys->id}}"><div class="divRow3 orderErsalPSS6">مشاهده</div></a>

      </div>
    @endforeach
  </div>
@endif
</div>
@endsection
