{{-- all_edit_pro.css --}}
@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: سفارشات
@endsection
@section('show_pro')
  <div class="div_titr">
   نمایش سفارشات
  </div>
  <div class="div_body">
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderBuyR2">نام محصول</div>
        <div class="divRow3 orderBuyR3">تعداد</div>
        <div class="divRow3 orderBuyR4">کد سفارش</div>
        <div class="divRow3 orderBuyR5">فروشگاه</div>
        <div class="divRow3 orderBuyR6">تاریخ</div>
        <div class="divRow3 orderBuyR7">مشاهده</div>
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
          <div class="divRow3 orderBuyR3">{{$buys->num_pro}} {{$pro2->vahed}}</div>
          <div class="divRow3 orderBuyR4">{{$buys->id}}</div>
          <a href="/showShopPro/{{$shop2->id}}/orderBuy"><div class="divRow3 orderBuyR5">{{$shop2->shop}}</div></a>
          <div class="divRow3 orderBuyR6">{{$buys->date}} </div>
          <a href="/orderBuyOne/{{$buys->id}}"><div class="divRow3 orderBuyR7">مشاهده</div></a>

        </div>
      @endforeach
    </div>
  </div>
@endsection
