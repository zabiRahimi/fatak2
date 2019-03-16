@extends('management.layout_admin')
@section('title')
  مدیریت :: محصولات
@endsection
@section('content')
  <div class="pro_ad">
    <div class="pro_ad_titr">
      <h5>مدیریت محصولات</h5>
    </div>
    <div class="pro_ad_body">
      <div class="pro_ad_body_r">
        <ul class="ul_pro_r">
          <a href="#" class="a_pjax_pro1"> <li onclick="show_div('pro_all')">مدیریت محصولات</li></a>
          <a href="" class="a_pjax_pro1"> <li onclick="show_div('add_pro')">اضافه کردن محصول</li></a>
          <a href="/all_edit_pro" class="apjaxpro"> <li >ویرایش محصولات</li></a>
          <a href="#" class="apjaxpro"> <li on/click="show_div('order_pro')">محصولات سفارش شده</li></a>
          <a href="#" class="a_pjax_pro1"> <li on/click="show_div('add_pro')">محصولات ثبت شده</li></a>
          <a href="#" class="a_pjax_pro1"> <li on/click="show_div('add_pro')">محصولات ارسال شده</li></a>
          <a href="#" class="a_pjax_pro1"> <li on/click="show_div('add_pro')">محصولات تحویل داده شده</li></a>
          <a href="#" class="a_pjax_pro"> <li on/click="show_div('add_pro')">محصولات ارجاع شده</li></a>
          <a href="#" class="a_pjax_pro"> <li on/click="show_div('add_pro')">مرجوعی تسویه شده</li></a>
        </ul>
      </div>
      <div class="pro_ad_body_l" id="pjaxpro">

        {{-- <div class="pro_ad_body_l_0 div_activ" id="pro_all">
          pro_all
        </div>
        <div class="pro_ad_body_l_0 div_none" id="add_pro">
          @include('management.pro_admin.add_pro_admin')
        </div>
        <div class="pro_ad_body_l_0 div_none" id="edit_pro">
          @include('management.pro_admin.all_edit_pro_admin')
        </div>
        <div class="pro_ad_body_l_0 div_none" id="order_pro">
          pro_order
        </div> --}}
      </div>
    </div>
  </div>
@endsection
