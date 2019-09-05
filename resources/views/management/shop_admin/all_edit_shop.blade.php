@extends('management.shop_admin.shop_admin')
 @section('title')
  مدیریت :: نمایش فروشگاها
@endsection
@section('show_shop')
  <div class="div_titr">
   نمایش فروشگاها
  </div>
  <div class="div_titr div_input">
    <div class="all_edit_shop1_0 all_edit_shop1_1"><div class="divAES1" >کل فروشگاه</div><div class="divAES2">{{count($shop)}}12525 </div> <div class="divAES3">عدد</div>  </div>
    <div class="all_edit_shop1_0 all_edit_shop1_2"><div class="divAES1">فروشگاه فعال</div><div class="divAES2">{{count($shop->where('show' , 1))}} </div> <div class="divAES3">عدد</div> </div>
    <div class="all_edit_shop1_0 all_edit_shop1_3"><div class="divAES1">فروشگاه غیر فعال</div><div class="divAES2">{{count($shop->where('show' , '!=' , 1))}} </div> <div class="divAES3">عدد</div> </div>
  </div>

<div class="div_body">
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 aESA_shop">نام فروشگاه</div>
      <div class="divRow3 aESA_seller">صاحب فروشگاه</div>
      {{-- <div class="divRow3 all_edit_pro_seller"></div> --}}
      <div class="divRow3 aESA_code">کد</div>
      <div class="divRow3 aESA_date">تاریخ ثبت</div>
      <div class="divRow3 aESA_sale">تعداد فروش</div>
      <div class="divRow3 aESA_data">اطلاعات</div>
      <div class="divRow3 aESA_show">نمایش</div>

    </div>
    @php
      $r=0;
    @endphp
    @foreach ($shop as $shops)
      @php
      $r++;
      $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
      @endphp
      @php
        $countViwe=$ch_view->where('shop_id', $shops->id)->count();
        $countBuy=$ch_view->where('shop_id', $shops->id)->where('lot_ch' ,'!=',null)->count();
      @endphp
      <div class="divRow2 {{$classBg}} pointer " onclick="window.location='/showOne_shopAdmin/{{$shops->id}}'">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 aESA_shop aESA_shop2">{{$shops->shop}}</div>
        <div class="divRow3 aESA_seller aESA_seller2">{{$shops->seller}}</div>
        <div class="divRow3 aESA_code"><span class="spanRow1">{{number_format($shops->id)}}</span></div>
        <div class="divRow3 aESA_date">{{$shops->date_ad}}</div>
        <div class="divRow3 aESA_sale"><span class="spanRow1">{{number_format($countBuy)}}</span> <span class="spanRow2">خرید</span></div>
        <div class="divRow3 aESA_data">@if ($shops->stage==1) <span class="span_no">ناقص</span> @else <span class="span_ok">کامل</span> @endif</div>

        <div class="divRow3 aESA_show"> @if ($shops->show==1) <span class="span_ok">فعال</span> @else <span class="span_no">غیر فعال</span> @endif </div>
        {{-- <a href="/showOne_shopAdmin/{{$shops->id}}"><div class="divRow3 aESA_edit">ویرایش</div></a> --}}

      </div>
    @endforeach
  </div>
</div>


@endsection
