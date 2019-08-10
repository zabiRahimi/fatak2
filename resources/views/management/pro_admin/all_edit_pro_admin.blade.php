@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: نمایش محصولات
@endsection
@section('show_pro')
  <div class="div_titr">
   نمایش محصولات
  </div>
  <div class="div_body">
    <div class="div_titr div_input">
      <div class="all_edit_pro1_0 all_edit_pro1_1"><div class="divE1" >کل محصولات</div><div class="divE2">{{count($pro)}} </div> <div class="divE3">عدد</div>  </div>
      <div class="all_edit_pro1_0 all_edit_pro1_2"><div class="divE1">محصولات فعال</div><div class="divE2">{{count($pro->where('show' , 1))}} </div> <div class="divE3">عدد</div> </div>
      <div class="all_edit_pro1_0 all_edit_pro1_3"><div class="divE1">محصولات غیر فعال</div><div class="divE2">{{count($pro->where('show' , '!=' , 1))}} </div> <div class="divE3">عدد</div> </div>
      {{-- <div class="all_edit_pro1_0 all_edit_pro1_4"><div class="div1">محصولات پر فروش</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div>
      <div class="all_edit_pro1_0 all_edit_pro1_5"><div class="div1" >محصولات پر بازدید</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div> --}}
    </div>


    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 all_edit_pro_name">نام محصول</div>
        <div class="divRow3 all_edit_pro_seller">فروشنده</div>
        <div class="divRow3 all_edit_pro_price">قیمت</div>
        <div class="divRow3 all_edit_pro_froosh">تعداد فروش</div>
        <div class="divRow3 all_edit_pro_did">تعداد بازدید</div>
        <div class="divRow3 all_edit_pro_show">نمایش</div>
        <div class="divRow3 all_edit_pro_edit">ویرایش</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($pro as $pros)
        @php
        $r++;
        $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
        @endphp
        <div class="divRow2  {{$classBg}}">
          <div class="divRow3 rowNumber ">{{$r}}</div>
          <div class="divRow3 all_edit_pro_name all_edit_pro_name2">{{$pros->name}}</div>
          <a href="#"><div class="divRow3 all_edit_pro_seller">{{$pros->seller}}</div></a>
          <div class="divRow3 all_edit_pro_price"><span class="spanRow1">{{number_format($pros->price)}}</span> <span class="spanRow2">تومان</span> </div>
          <div class="divRow3 all_edit_pro_froosh"><span class="spanRow1">{{number_format($pros->views)}}</span> <span class="spanRow2">فروش</span></div>
          <div class="divRow3 all_edit_pro_did"><span class="spanRow1">{{number_format($pros->views . 45666)}}</span> <span class="spanRow2">بازدید</span></div>
          <div class="divRow3 all_edit_pro_show"> @if ($pros->show==1) <span class="span_ok">فعال</span> @else <span class="span_no">غیر فعال</span> @endif </div>
          <a href="/edit_pro/{{$pros->id}}"><div class="divRow3 all_edit_pro_edit">ویرایش</div></a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
