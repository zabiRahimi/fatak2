@extends('management.order_proStockFatak.layoutOrder_proStockFatak')
 @section('title')
  مدیریت :: محصولات در حال اقدام
@endsection
@section('show_stockFatak')

<div class="div_titr">
 محصولات در دست اقدام
</div>
<div class="div_body">
  @if (empty($buy[0]['id']))
    <div class="alert alert-danger">
      خریدی در دست اقدام نیست .
    </div>
  @else
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderNewPSF2">نام محصول</div>
      <div class="divRow3 orderNewPSF3">تعداد</div>
      <div class="divRow3 orderNewPSF4">کد سفارش</div>
      <div class="divRow3 orderNewPSF5">تاریخ</div>
      <div class="divRow3 orderNewPSF6">خریدار</div>
      <div class="divRow3 orderNewPSF7">استان خریدار</div>

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
      <div class="divRow2 orderNewPSF_R {{$classBg}} " onclick="window.location='/proceedOneOrderStockF/{{$buys->id}}'">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderNewPSF2 orderNewPSF2_2">{{$pro2->name}}</div>
        <div class="divRow3 orderNewPSF3">{{$buys->num_pro}} {{$pro2->vahed}}</div>
        <div class="divRow3 orderNewPSF4 orderNewPSF4_2">{{$buys->id}}</div>
        <div class="divRow3 orderNewPSF5">{{$buys->date}}</div>
        <div class="divRow3 orderNewPSF6">{{$buys->name}} </div>
        <div class="divRow3 orderNewPSF7">{{$buys->ostan}}</div>
      </div>
    @endforeach
  </div>
 @endif
</div>

@endsection
