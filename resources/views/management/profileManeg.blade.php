@extends('management.layoutDashAdmin')
@section('title')
  مدیریت :: پروفایل
@endsection
@section('contentDash')
  <div class="contentDash2">
    <div class="contentDash2_titr">
      پروفایل
    </div>
    <div class="contentDash2_body">
      <div class="contentDash2_body_r">
        {{-- <a href="/adModirManeg" class="a_pjax_pro1" onclick=""><span class="titrCBR">اضافه کردن مدیر</span> </a> --}}
      </div>
      <div class="contentDash2_body_l" id="ajaxModirManeg">

        @yield('contentModir')

      </div>
    </div>
  </div>

@endsection
