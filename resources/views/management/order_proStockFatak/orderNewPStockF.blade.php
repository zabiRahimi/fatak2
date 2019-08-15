@extends('management.order_proStockFatak.layoutOrder_proStockFatak')
 @section('title')
  مدیریت :: سفارش محصولات موجود فاتک
@endsection
@section('show_stockFatak')
  <div class="div_titr">
   خریدهای جدید (فاتک)
  </div>
  <div class="div_body">
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderBuyR2">نام محصول</div>
        <div class="divRow3 orderBuyR3">تعداد</div>
        <div class="divRow3 orderBuyR4">کد سفارش</div>
        <div class="divRow3 orderBuyR5">تاریخ</div>
        <div class="divRow3 orderBuyR6">خریدار</div>
        <div class="divRow3 orderBuyR7">استان خریدار</div>
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
          <div class="divRow3 orderBuyR5">{{$buys->date}}</div>
          <div class="divRow3 orderBuyR6">{{$buys->name}} </div>
          <div class="divRow3 orderBuyR7">{{$buys->ostan}}</div>

        </div>
      @endforeach
    </div>
  </div>


@endsection
