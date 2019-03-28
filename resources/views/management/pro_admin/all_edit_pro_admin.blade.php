@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: نمایش محصولات
@endsection
@section('show_pro')
  <div class="all_edit_pro">
   نمایش محصولات
  </div>
  <div class="all_edit_pro1">
    <div class="all_edit_pro1_0 all_edit_pro1_1"><div class="div1" >کل محصولات</div><div class="div2">{{count($pro)}} </div> <div class="div3">عدد</div>  </div>
    <div class="all_edit_pro1_0 all_edit_pro1_2"><div class="div1">محصولات فعال</div><div class="div2">{{count($pro->where('show' , 1))}} </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_3"><div class="div1">محصولات غیر فعال</div><div class="div2">{{count($pro->where('show' , '!=' , 1))}} </div> <div class="div3">عدد</div> </div>
    {{-- <div class="all_edit_pro1_0 all_edit_pro1_4"><div class="div1">محصولات پر فروش</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_5"><div class="div1" >محصولات پر بازدید</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div> --}}
  </div>


  <div class="all_edit_pro2">
    <div class="all_edit_pro2_1">
      <div class="all_edit_pro2_1_0 all_edit_pro_name">نام محصول</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_seller">فروشنده</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_price">قیمت</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_froosh">تعداد فروش</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_did">تعداد بازدید</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_show">نمایش</div>
      <div class="all_edit_pro2_1_0 all_edit_pro_edit">ویرایش</div>

    </div>
    @foreach ($pro as $pros)
      <div class="all_edit_pro2_1 all_edit_pro3">
        <div class="all_edit_pro2_1_0 all_edit_pro_name all_edit_pro_name2">{{$pros->name}}</div>
        <a href="#"><div class="all_edit_pro2_1_0 all_edit_pro_seller">{{$pros->seller}}</div></a>
        <div class="all_edit_pro2_1_0 all_edit_pro_price"><span class="span1">{{number_format($pros->price)}}</span> <span class="span2">تومان</span> </div>
        <div class="all_edit_pro2_1_0 all_edit_pro_froosh"><span class="span1">{{number_format($pros->views)}}</span> <span class="span2">فروش</span></div>
        <div class="all_edit_pro2_1_0 all_edit_pro_did"><span class="span1">{{number_format($pros->views)}}</span> <span class="span2">بازدید</span></div>
        <div class="all_edit_pro2_1_0 all_edit_pro_show"> @if ($pros->show==1) <span class="span_ok">فعال</span> @else <span class="span_no">غیر فعال</span> @endif </div>
        <a href="/edit_pro/{{$pros->id}}"><div class="all_edit_pro2_1_0 all_edit_pro_edit">ویرایش</div></a>

      </div>
    @endforeach
  </div>

@endsection