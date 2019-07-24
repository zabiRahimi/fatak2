@extends('management.modiranAdmin')
@section('title')
  مدیریت :: ویرایش مدیر
@endsection
@section('contentModir')


<div class="CDBMTitr">
  ویرایش مدیر
</div>
<form class="formAdmin" action="" id="edit_modir_form"  method="post">
  {{ csrf_field() }}
  <div class="ajax_form_admin" id="ajax_FAM_e"></div>

  <div class="form-group textAll">
    <label for="name_modir_admin_e" class="control-label pull-right  ">نام و نام خانوادگی</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="name_modir_admin_e" value="{{$modir->name}}"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="mobail_modir_admin" class="control-label pull-right  "> موبایل </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="mobail_modir_admin_e" value="{{$modir->mobail}}" ></div>
  </div>
  <div class="form-group textAll">
    <label for="karbary_modir_admin_e" class="control-label pull-right  ">نام کاربری</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="karbary_modir_admin_e" value="{{$modir->karbary}}"></div>
  </div>
  <div class="form-group  textAll">
    <label  class="control-label pull-right  ">سطح دسترسی </label>
    <select class="form-control" name="" id="access_modir_admin_e">
      <option value="1" @if ($modir->access==1) selected @endif>مدیر عامل</option>
      <option value="2" @if ($modir->access==2) selected @endif>مدیر</option>
      <option value="3" @if ($modir->access==3) selected @endif>حسابدار</option>
      <option value="4" @if ($modir->access==4) selected @endif>ناظر</option>
      <option value="5" @if ($modir->access==5) selected @endif>ویرایشگر</option>
      <option value="6" @if ($modir->access==6) selected @endif>نویسنده A</option>
      <option value="7" @if ($modir->access==7) selected @endif>نویسنده B</option>
      <option value="8" @if ($modir->access==8) selected @endif>نویسنده C</option>
    </select>
  </div>
  <div class="form-group textAll">
    <label  class="control-label pull-right  ">تاریخ ثبت نام</label>
    <div class="div_data_buyer"><input type="text" class="form-control" value="{{$modir->created_at}}"  disabled></div>
  </div>
  <div class="form-group textAll">
    <label  class="control-label pull-right  ">آخرین ویرایش</label>
    <div class="div_data_buyer"><input type="text" class="form-control" value="{{$modir->updated_at}}" disabled></div>
  </div>
  <div class="form-group  textAll">
    <label  class="control-label pull-right  "> فعالیت </label>
    <div class="divRadio">
      <label class="labelRadio_R">
        <span >فعال</span>
        <input type="radio"id="show_modir_admin_e" @if ($modir->show==1)checked @endif name="show_modir1" value="1">
      </label>
      <label class="labelRadio_L">
        <span >غیر فعال</span>
        <input type="radio"id="show_modir_admin2_e" @if ($modir->show==2)checked @endif  name="show_modir1" value="2">
      </label>
    </div>

  </div>
  <div class="aivSabtForm">
    <button type="button" class="btn btn-success"onclick="editModirManeg({{$modir->id}})">ثبت تغییرات</button>
  </div>

</form>
<div class="CDBMTitr">
  تغییر رمز
</div>
<form class="formAdmin" action="" id="editPas_modir_form"  method="post">
  {{ csrf_field() }}
  <div class="ajax_form_admin" id="ajax_FAM_e_pas"></div>

  <div class="form-group textAll">
    <label for="pas_modir_admin_e" class="control-label pull-right  ">رمز جدید</label>
    <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="pas_modir_admin_e"  ></div>
  </div>
  <div class="aivSabtForm">
    <button type="button" class="btn btn-success"onclick="editPasModirManeg({{$modir->id}})">تغییر رمز</button>
  </div>

</form>
@endsection
