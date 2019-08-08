{{-- all_edit_pro.css --}}
@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: سفارشات مرجوعی تسویه شده
@endsection
@section('show_pro')
  <div class="all_edit_pro">
   نمایش سفارشات مرجوعی تسویه شده
  </div>
  {{-- <div class="all_edit_pro1">
    <div class="all_edit_pro1_0 all_edit_pro1_1"><div class="div1" >کل محصولات</div><div class="div2">{{count($pro)}} </div> <div class="div3">عدد</div>  </div>
    <div class="all_edit_pro1_0 all_edit_pro1_2"><div class="div1">محصولات فعال</div><div class="div2">{{count($pro->where('show' , 1))}} </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_3"><div class="div1">محصولات غیر فعال</div><div class="div2">{{count($pro->where('show' , '!=' , 1))}} </div> <div class="div3">عدد</div> </div>
    {{-- <div class="all_edit_pro1_0 all_edit_pro1_4"><div class="div1">محصولات پر فروش</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div>
    <div class="all_edit_pro1_0 all_edit_pro1_5"><div class="div1" >محصولات پر بازدید</div><div class="div2">57896 </div> <div class="div3">عدد</div> </div> --}}
  {{-- </div> --}}


  <div class="divRow">
    <div class="divRow2">
      <div class="all_edit_pro2_1_0 orderBuyR1"><i class="fas fa-certificate"></i></div>
      <div class="all_edit_pro2_1_0 orderBuyR2">نام محصول</div>
      <div class="all_edit_pro2_1_0 orderErsalR3">کد سفارش</div>
      <div class="all_edit_pro2_1_0 orderErsalR4">فروشگاه</div>
      <div class="all_edit_pro2_1_0 orderErsalR5">کد رهگیری برگشتی</div>
      <div class="all_edit_pro2_1_0 orderErsalR6">تاریخ</div>
      <div class="all_edit_pro2_1_0 orderErsalR7">مشاهده</div>

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
      <div class="divRow2 all_edit_pro3 {{$classBg}} ">
        <div class="all_edit_pro2_1_0 orderBuyR1 ">{{$r}}</div>
        <div class="all_edit_pro2_1_0 orderBuyR2 ">{{$pro2->name}}</div>
        <div class="all_edit_pro2_1_0 orderErsalR3">{{$buys->id}}</div>
        <a href="/showShopPro/{{$shop2->id}}/orderErsalShowAll"><div class="all_edit_pro2_1_0 orderErsalR4">{{$shop2->shop}}</div></a>
        <div class="all_edit_pro2_1_0 orderErsalR5">{{$backPro2->code_rahgiry}}</div>
        <div class="all_edit_pro2_1_0 orderErsalR6">{{$backPro2->date_post}} </div>
        <a href="/orderBackEndShowOne/{{$buys->id}}"><div class="all_edit_pro2_1_0 orderErsalR7">مشاهده</div></a>

      </div>
    @endforeach
  </div>

@endsection
