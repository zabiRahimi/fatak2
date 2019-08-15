@extends('management.channel_admin.channel_admin')
 @section('title')
  مدیریت :: نمایش شبکه ها
@endsection
@section('show_channel')
  <div class="div_titr">
   نمایش شبکه های اجتماعی
  </div>
  <div class="div_titr div_input">
    <div class="all_edit_cha1_0 all_edit_cha1_1"><div class="divAEC1" >کل شبکه ها</div><div class="divAEC2">{{count($channel)}}12525 </div> <div class="divAEC3">عدد</div>  </div>
    <div class="all_edit_cha1_0 all_edit_cha1_2"><div class="divAEC1">شبکه های فعال</div><div class="divAEC2">{{count($channel->where('show' , 1))}} </div> <div class="divAEC3">عدد</div> </div>
    <div class="all_edit_cha1_0 all_edit_cha1_3"><div class="divAEC1">شبکه غیر فعال</div><div class="divAEC2">{{count($channel->where('show' , '!=' , 1))}} </div> <div class="divAEC3">عدد</div> </div>
  </div>

<div class="div_body">
  <div class="divRow">
    <div class="divRow2">
      <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
      <div class="divRow3 aECA_name">صاحب شبکه</div>
      {{-- <div class="divRow3 all_edit_pro_seller"></div> --}}
      <div class="divRow3 aECA_code">کد</div>
      <div class="divRow3 aECA_date">تاریخ ثبت</div>
      <div class="divRow3 aECA_buy">تعداد خرید</div>
      <div class="divRow3 aECA_bazdid">تعداد بازدید</div>
      <div class="divRow3 aECA_data">اطلاعات</div>

      <div class="divRow3 aECA_show">نمایش</div>
      <div class="divRow3 aECA_edit">ویرایش</div>

    </div>
    @php
      $r=0;
    @endphp
    @foreach ($channel as $channels)
      @php
      $r++;
      $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
      @endphp
      @php
        $countViwe=$ch_view->where('channel_id', $channels->id)->count();
        $countBuy=$ch_view->where('channel_id', $channels->id)->where('lot_ch' ,'!=',null)->count();
      @endphp
      <div class="divRow2 {{$classBg}}">
        <div class="divRow3 rowNumber ">{{$r}}</div>
        <div class="divRow3 aECA_name aECA_name2">{{$channels->name}}</div>
        <div class="divRow3 aECA_code"><span class="spanRow1">{{number_format($channels->id)}}</span></div>
        <div class="divRow3 aECA_date">{{$channels->date_ad}}</div>
        <div class="divRow3 aECA_buy"><span class="spanRow1">{{number_format($countBuy)}}</span> <span class="spanRow2">خرید</span></div>
        <div class="divRow3 aECA_bazdid"><span class="spanRow1">{{number_format($countViwe)}}</span> <span class="spanRow2">بازدید</span></div>
        <div class="divRow3 aECA_data">@if ($channels->stage==1) <span class="span_no">ناقص</span> @else <span class="span_ok">کامل</span> @endif</div>

        <div class="divRow3 aECA_show"> @if ($channels->show==1) <span class="span_ok">فعال</span> @else <span class="span_no">غیر فعال</span> @endif </div>
        <a href="/showOne_ChannelAdmin/{{$channels->id}}"><div class="divRow3 aECA_edit">ویرایش</div></a>

      </div>
    @endforeach
  </div>
</div>


@endsection
