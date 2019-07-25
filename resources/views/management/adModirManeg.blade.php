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
      <option value="no">انتخاب کنید</option>
      <option value="1">مدیر عامل</option>
      <option value="2">مدیر</option>
      <option value="3">ناظر</option>
      <option value="4">ویرایشگر</option>
      <option value="5">نویسنده</option>

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
