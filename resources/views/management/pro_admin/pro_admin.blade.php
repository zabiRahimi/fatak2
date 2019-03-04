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
          <li onclick="show_div('pro_all')">مدیریت محصولات</li>
          <li onclick="show_div('add_pro')">اضافه کردن محصول</li>
          <li onclick="show_div('edit_pro')">ویرایش محصولات</li>
          <li onclick="show_div('order_pro')">محصولات سفارش شده</li>
          <li onclick="show_div('add_pro')">محصولات ثبت شده</li>
          <li onclick="show_div('add_pro')">محصولات ارسال شده</li>
          <li onclick="show_div('add_pro')">محصولات تحویل داده شده</li>
          <li onclick="show_div('add_pro')">محصولات ارجاع شده</li>
          <li onclick="show_div('add_pro')">مرجوعی تسویه شده</li>
        </ul>
      </div>
      <div class="pro_ad_body_l" >
        <div class="pro_ad_body_l_0 div_activ" id="pro_all">
          pro_all
        </div>
        <div class="pro_ad_body_l_0 div_none" id="add_pro">
          @include('management.pro_admin.add_pro_admin')
        </div>
        <div class="pro_ad_body_l_0 div_none" id="edit_pro">
          pro_edit
        </div>
        <div class="pro_ad_body_l_0 div_none" id="order_pro">
          pro_order
        </div>
      </div>
    </div>
  </div>
@endsection
