@extends('management.modiranAdmin')
@section('title')
  مدیریت :: پروفایل
@endsection
@section('contentModir')


<div class="CDBMTitr">
  پروفایل من
</div>
<form class="formAdmin" action="" id="edit_modir_form2"  method="post">
  {{ csrf_field() }}
  <div class="ajax_form_admin" id="ajax_FAM_e2"></div>

  <div class="form-group textAll">
    <label for="name_modir_admin_e" class="control-label pull-right  ">نام و نام خانوادگی</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="name_modir_admin_e2" value="{{$modir->name}}"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="mobail_modir_admin" class="control-label pull-right  "> موبایل </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="mobail_modir_admin_e2" value="{{$modir->mobail}}" ></div>
  </div>
  <div class="form-group textAll">
    <label for="karbary_modir_admin_e" class="control-label pull-right  ">نام کاربری</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="karbary_modir_admin_e2" value="{{$modir->karbary}}"></div>
  </div>
  <div class="form-group  textAll">
    <label  class="control-label pull-right  ">سمت </label>
    <div class="div_data_buyer"><input type="text" class="form-control"
      value="
      @php
        switch ($modir->access) {
          case 1:echo 'مدیر عامل';break;
          case 2:echo 'مدیر';break;
          case 3:echo 'ناظر';break;
          case 4:echo 'ویرایشگر';break;
          case 5:echo 'نویسنده';break;
        }
      @endphp
      " disabled></div>

  </div>
  <div class="form-group textAll">
    <label  class="control-label pull-right  ">تاریخ ثبت نام</label>
    <div class="div_data_buyer"><input type="text" class="form-control" value="{{$modir->created_at}}"  disabled></div>
  </div>
  <div class="form-group textAll">
    <label  class="control-label pull-right  ">آخرین ویرایش</label>
    <div class="div_data_buyer"><input type="text" class="form-control" value="{{$modir->updated_at}}" disabled></div>
  </div>
  <div class="aivSabtForm">
    <button type="button" class="btn btn-success"onclick="editModirManeg2({{$modir->id}})">ثبت تغییرات</button>
  </div>

</form>
<div class="CDBMTitr">
  تغییر رمز
</div>
<form class="formAdmin" action="" id="editPas_modir_form2"  method="post">
  {{ csrf_field() }}
  <div class="ajax_form_admin" id="ajax_FAM_e_pas2"></div>

  <div class="form-group textAll">
    <label for="pas_modir_admin_e" class="control-label pull-right  ">رمز فعلی</label>
    <div class="div_data_buyer"><input type="text" class="form-control "  id="pas1_modir_admin_e2"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="pas_modir_admin_e" class="control-label pull-right  ">رمز جدید</label>
    <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="pas2_modir_admin_e2" placeholder="به لاتین .. بیشتر از 6 حرف"; ></div>
  </div>
  <div class="aivSabtForm">
    <button type="button" class="btn btn-success"onclick="editPasModirManeg2({{$modir->id}})">تغییر رمز</button>
  </div>

</form>
@endsection
