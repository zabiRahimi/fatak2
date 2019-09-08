@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارش محصولات موجود فاتک
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   خریدهای جدید (فاتک)
  </div>
  <div class="div_body">
    @if (empty($buyOrder[0]['id']))
      <div class="alert alert-danger">
        محصولی خریداری نشده است .
      </div>
    @else

    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderBuyUnSF1">نام محصول</div>
        <div class="divRow3 orderBuyUnSF2">تعداد</div>
        <div class="divRow3 orderBuyUnSF3">کد محصول</div>
        <div class="divRow3 orderBuyUnSF4">کد خرید</div>
        <div class="divRow3 orderBuyUnSF5">تاریخ</div>
        <div class="divRow3 orderBuyUnSF6">خریدار</div>
        <div class="divRow3 orderBuyUnSF7">استان خریدار</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($buyOrder as $buyOrders)
        @php
        $r++;
        $pro2=$proShop->find($buyOrders->proShop_id);
        $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;

        @endphp
        <div class="divRow2 pointer {{$classBg}} " onclick="window.location='/orderOneBuyUnStockF/{{$buyOrders->id}}'">
          <div class="divRow3 rowNumber ">{{$r}}</div>
          <div class="divRow3 orderBuyUnSF1 orderBuyUnSF1_2">{{$pro2->name}}</div>
          <div class="divRow3 orderBuyUnSF2">{{$buyOrders->num_pro}} {{$pro2->vahed}}</div>
          <div class="divRow3 orderBuyUnSF3 orderBuyUnSF3_2">{{$pro2->id}}</div>
          <div class="divRow3 orderBuyUnSF4 orderBuyUnSF4_2">{{$buyOrders->id}}</div>
          <div class="divRow3 orderBuyUnSF5">{{str_replace('-', '/',$buyOrders->date_up )}}</div>
          <div class="divRow3 orderBuyUnSF6">{{$buyOrders->name}} </div>
          <div class="divRow3 orderBuyUnSF7">{{$buyOrders->ostan}}</div>
        </div>
      @endforeach
    </div>
    @endif
  </div>


@endsection
