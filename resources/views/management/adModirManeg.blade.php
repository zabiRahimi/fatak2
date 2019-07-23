@extends('management.modiranAdmin')
@section('title')
  اضافه کردن مدیر
@endsection
@section('contentModir')


<div class="CDBMTitr">
  اضافه کردن مدیر
</div>
<form class="formAdmin" action="" id="add_modir_form"  method="post">
  {{ csrf_field() }}
  <div class="ajax_form_admin" id="ajax_FAM_a"></div>

  <div class="form-group textAll">
    <label for="_addpro1_admin" class="control-label pull-right  ">نام و نام خانوادگی</label>
    <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="name_modir_admin" placeholder="به فارسی ..."  ></div>
  </div>
  <div class="form-group textAll">
    <label for="mobail_modir_admin" class="control-label pull-right  "> موبایل </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="mobail_modir_admin"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="karbary_modir_admin" class="control-label pull-right  ">نام کاربری</label>
    <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="karbary_modir_admin" placeholder="به لاتین ..بیش از 6 کارکتر"></div>
  </div>
  <div class="form-group textAll">
    <label for="pas_modir_admin" class="control-label pull-right  "> رمز عبور</label>
    <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="pas_modir_admin" placeholder="به لاتین ..بیش از 6 کارکتر"></div>
  </div>
  <div class="form-group  textAll">
    <label for="pas_modir_admin" class="control-label pull-right  ">سطح دسترسی </label>
    <select class="form-control" name="" id="access_modir_admin">
      <option value="">انتخاب کنید</option>
      <option value="100">100 گرم</option>
      <option value="200">200 گرم</option>
      <option value="300">300 گرم</option>
      <option value="400">400 گرم</option>
      <option value="500">500 گرم</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
    </select>
  </div>
  <div class="form-group  textAll">
    <label  class="control-label pull-right  "> فعالیت </label>
    <div class="divRadio">
      <label class="labelRadio_R">
        <span >فعال</span>
        <input type="radio"id="show_modir_admin" name="show_modir1" value="1">
      </label>
      <label class="labelRadio_L">
        <span >غیر فعال</span>
        <input type="radio"id="show_modir_admin2" name="show_modir1" value="2">
      </label>
    </div>

  </div>
  <div class="aivSabtForm">
    <button type="button" class="btn btn-success"onclick="modirAdminSabt()">ثبت مدیر</button>
  </div>

</form>
@endsection
