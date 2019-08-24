{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: سفارشات
@endsection
@section('show_stockSaier')
  <div class="div_titr">
   نمایش سفارشات
  </div>
  <div class="div_body">
    @if (empty($buy[0]['id']))
      <div class="alert alert-danger">
        محصولی خریداری نشده است .
      </div>
    @else
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderNewPSS1">نام محصول</div>
        <div class="divRow3 orderNewPSS2">تعداد</div>
        <div class="divRow3 orderNewPSS3">کد سفارش</div>
        <div class="divRow3 orderNewPSS4">فروشگاه</div>
        <div class="divRow3 orderNewPSS5">تاریخ</div>
        <div class="divRow3 orderNewPSS6">مشاهده</div>
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
          <div class="divRow3 orderNewPSS1 orderNewPSS1_2 ">{{$pro2->name}}</div>
          <div class="divRow3 orderNewPSS2">{{$buys->num_pro}} {{$pro2->vahed}}</div>
          <div class="divRow3 orderNewPSS3 orderNewPSS3_2">{{$buys->id}}</div>
          <a href="/showShopProStockS/{{$shop2->id}}/orderNewPStockS"><div class="divRow3 orderNewPSS4">{{$shop2->shop}}</div></a>
          <div class="divRow3 orderNewPSS5">{{$buys->date}} </div>
          <a href="/orderOneNewPStockS/{{$buys->id}}"><div class="divRow3 orderNewPSS6">مشاهده</div></a>

        </div>
      @endforeach
    </div>
  @endif
  </div>
@endsection
