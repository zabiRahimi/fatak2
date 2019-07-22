@extends('management.layout_admin')
@section('title')
  ورود
@endsection
@section('content')
  <div class="login1">
    <div class="login2">
      <form class="loginFormManage" id="loginFormManage" method="post">
        {{ csrf_field() }}
        <div class="ajaxLoginManage"></div>
        <div class="form-group ">
          <label for="_addpro1_admin" class="control-label pull-right  ">نام کاربری</label>
          <div class="div_data_buyer"><input type="text" class="form-control"  id="name_manage_log"  ></div>
        </div>
        <div class="form-group ">
          <label for="_addpro1_admin" class="control-label pull-right  ">رمز عبور</label>
          <div class="div_data_buyer"><input type="text" class="form-control"  id="pas_manage_log"  ></div>
        </div>
        <div class="form-group" >
          <label for="amniat_channellog" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
          <div class="div_form"><input type="text" class="form-control tel" id="amniat_manage_log" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
        </div>
        <div class="captcha_form">
          <span class="captcha4">{!! captcha_img() !!}</span>
          <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
        </div>
        <div class="form-group form_btn1">

          <button type="button" class="btn btn-success" onclick="loginManage()" >ثبت</button>
        </div>
      </form>
    </div>
  </div>
@endsection
