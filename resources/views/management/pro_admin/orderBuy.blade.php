{{-- all_edit_pro.css --}}
@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: سفارشات
@endsection
@section('show_pro')
  <div class="all_edit_pro">
   نمایش سفارشات
  </div>
  {{-- <div class="all_edit_pro1">
    <div class="all_edit_pro1_0 all_edit_pro1_1"><div class="div1" >کل محصولات</div><div class="div2">{{count($pro)}} </div> <div class="div3">عدد</div>  </div>
    <div class="all_edit_pro1_0 all_edit_pro1_2"><div class="div1">محصولات فعال</div><div class="div2">{{count($pro->where('show' , 1))}} </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_3"><div class="div1">محصولات غیر فعال</div><div class="div2">{{count($pro->where('show' , '!=' , 1))}} </div> <div class="div3">عدد</div> </div>
    {{-- <div class="all_edit_pro1_0 all_edit_pro1_4"><div class="div1">محصولات پر فروش</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_5"><div class="div1" >محصولات پر بازدید</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div> --}}
  {{-- </div> --}}


  <div class="all_edit_pro2">
    <div class="all_edit_pro2_1">
      <div class="all_edit_pro2_1_0 orderBuyR1"><i class="fas fa-certificate"></i></div>
      <div class="all_edit_pro2_1_0 orderBuyR2">نام محصول</div>
      <div class="all_edit_pro2_1_0 orderBuyR3">تعداد</div>
      <div class="all_edit_pro2_1_0 orderBuyR4">فروشگاه</div>
      <div class="all_edit_pro2_1_0 orderBuyR5">تاریخ</div>
      <div class="all_edit_pro2_1_0 orderBuyR6">مشاهده</div>

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
      <div class="all_edit_pro2_1 all_edit_pro3 {{$classBg}} ">
        <div class="all_edit_pro2_1_0 orderBuyR1 ">{{$r}}</div>
        <div class="all_edit_pro2_1_0 orderBuyR2 ">{{$pro2->name}}</div>
        <div class="all_edit_pro2_1_0 orderBuyR3">{{$buys->num_pro}} {{$pro2->vahed}}</div>
        <a href="/showShopPro/{{$shop2->id}}"><div class="all_edit_pro2_1_0 orderBuyR4">{{$shop2->shop}}</div></a>
        <div class="all_edit_pro2_1_0 orderBuyR5">{{$buys->date}} </div>
        <a href="/orderBuyOne/{{$buys->id}}"><div class="all_edit_pro2_1_0 orderBuyR6">مشاهده</div></a>

      </div>
    @endforeach
  </div>

@endsection
