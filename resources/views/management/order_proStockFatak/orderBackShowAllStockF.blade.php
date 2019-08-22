{{-- all_edit_pro.css --}}
@extends('management.order_proStockFatak.layoutOrder_proStockFatak')
 @section('title')
  مدیریت :: سفارشات مرجوعی
@endsection
@section('show_stockFatak')
  <div class="div_titr">
   نمایش سفارشات مرجوعی
  </div>
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 orderBSF1 ">نام محصول</div>
      <div class="divRow3 orderBSF2 ">کد سفارش</div>
      <div class="divRow3 orderBSF3 ">کد رهگیری برگشتی</div>
      <div class="divRow3 orderBSF4">تاریخ</div>
      <div class="divRow3 orderBSF5">نام خریدار</div>
      <div class="divRow3 orderBSF6">استان خریدار</div>

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
      <div class="divRow2  {{$classBg}} orderBSF_R " onclick="window.location='/orderBackShowOneStockF/{{$buys->id}}'">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 orderBSF1 orderBSF1_2 ">{{$pro2->name}}</div>
        <div class="divRow3 orderBSF2 orderBSF2_2">{{$buys->id}}</div>
        <div class="divRow3 orderBSF3 orderBSF3_2">{{$backPro2->code_rahgiry}}</div>
        <div class="divRow3 orderBSF4">{{$backPro2->date_post}}</div>
        <div class="divRow3 orderBSF5">{{$buys->name}} </div>
        <div class="divRow3 orderBSF6">{{$buys->ostan}}</div>

      </div>
    @endforeach
  </div>

@endsection
