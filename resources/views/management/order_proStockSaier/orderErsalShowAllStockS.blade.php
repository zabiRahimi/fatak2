{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: سفارشات ارسال شده
@endsection
@section('show_pro')
  <div class="div_titr">
   نمایش سفارشات ارسالی
  </div>
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderBuyR2">نام محصول</div>
      <div class="divRow3 orderErsalR3">کد سفارش</div>
      <div class="divRow3 orderErsalR4">فروشگاه</div>
      <div class="divRow3 orderErsalR5">کد رهگیری</div>
      <div class="divRow3 orderErsalR6">تاریخ</div>
      <div class="divRow3 orderErsalR7">مشاهده</div>

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
      <div class="divRow2 all_edit_pro3 {{$classBg}} ">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderBuyR2 ">{{$pro2->name}}</div>
        <div class="divRow3 orderErsalR3">{{$buys->id}}</div>
        <a href="/showShopPro/{{$shop2->id}}/orderErsalShowAll"><div class="divRow3 orderErsalR4">{{$shop2->shop}}</div></a>
        <div class="divRow3 orderErsalR5">{{$buys->code_rahgiry}}</div>
        <div class="divRow3 orderErsalR6">{{$buys->date_post}} </div>
        <a href="/orderErsalShowOne/{{$buys->id}}"><div class="divRow3 orderErsalR7">مشاهده</div></a>

      </div>
    @endforeach
  </div>

@endsection
