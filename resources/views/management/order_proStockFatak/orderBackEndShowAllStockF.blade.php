{{-- all_edit_pro.css --}}
@extends('management.order_proStockFatak.layoutOrder_proStockFatak')
 @section('title')
  مدیریت :: سفارشات مرجوعی تسویه شده
@endsection
@section('show_stockFatak')
  <div class="div_titr">
   نمایش سفارشات مرجوعی تسویه شده
  </div>
  <div class="div_body">
  @if (empty($buy[0]['id']))
    <div class="alert alert-danger">
      مرجوعی تسویه شده ای موجود نیست .
    </div>
  @else
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderBESFR1">نام محصول</div>
      <div class="divRow3 orderBESFR2">کد سفارش</div>
      <div class="divRow3 orderBESFR3">کد رهگیری برگشتی</div>
      <div class="divRow3 orderBESFR4">تاریخ</div>
      <div class="divRow3 orderBESFR5">خریدار</div>
      <div class="divRow3 orderBESFR6">مبلغ پرداختی </div>


    </div>
    @php
      $r=0;
    @endphp
    @foreach ($buy as $buys)
      @php
      $r++;
      $pro2=$pro->find($buys->pro_id);
      $backPro2=$backPro->find($buys->backPro_id);
      $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;

      @endphp
      <div class="divRow2  {{$classBg}} orderBESFR_R "onclick="window.location='/orderBackEndShowOneStockF/{{$buys->id}}'">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderBESFR1 orderBESFR1_2">{{$pro2->name}}</div>
        <div class="divRow3 orderBESFR2 orderBESFR2_2">{{$buys->id}}</div>
        <div class="divRow3 orderBESFR3 orderBESFR3_3">{{$backPro2->code_rahgiry}}</div>
        <div class="divRow3 orderBESFR4">{{$backPro2->date_post}} </div>
        <div class="divRow3 orderBESFR5">{{$buys->name}}</div>
        <div class="divRow3 orderBESFR6"><span class="spanRow1">{{number_format(13569840)}}</span><span class="spanRow2">تومان</span> </div>

      </div>
    @endforeach
  </div>
@endif
</div>
@endsection
