@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: ویرایش مدیران
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      مدیران
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        <a  class="a_pjax_pro1" onclick="adModirManeg()"><span class="titrCBR">اضافه کردن مدیر</span> </a>
        <a href="/add_pro" class="apjaxpro"><span class="titrCBR">ویرایش مدیر</span> </a><!-- نکته : بجهت نمایش ادیتور کد از پی جکس استفاده نشده است -->
        <a href="/all_edit_pro" class="apjaxpro"><span class="titrCBR">عملکرد مدیر</span> </a>
        <a href="#" class="apjaxpro"><span class="titrCBR">تعداد مدیر</span></a>
      </div>
      <div class="contentDash2_body_l" id="ajaxModirManeg">

        lk

      </div>
    </div>
  </div>

@endsection
