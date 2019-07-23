@extends('management.modiranAdmin')
@section('title')
  اضافه کردن مدیر
@endsection
@section('contentModir')


<div class="CDBMTitr">
  اضافه کردن مدیر
</div>
<form class="add_pro_form1" action="" id="add_pro_form1"  method="post">
  {{ csrf_field() }}
  <div class="ajax_formaddpro1_admin" id="ajax_formaddpro1_admin"></div>

  <div class="form-group textAll">
    <label for="_addpro1_admin" class="control-label pull-right  ">نام و نام خانوادگی</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="name_addpro1_admin"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="seller_addpro1_admin" class="control-label pull-right  "> موبایل </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="name_addpro1_admin"  ></div>
  </div>
  <div class="form-group textAll">
    <label for="price_addpro1_admin" class="control-label pull-right  ">نام کاربری</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="price_addpro1_admin"></div>
  </div>
  <div class="form-group textAll">
    <label for="priceold_addpro1_admin" class="control-label pull-right  "> رمز عبور</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="priceold_addpro1_admin"></div>
  </div>
  <div class="form-group  textAll">
    <label for="vazn_addpro1_admin" class="control-label pull-right  ">سطح دسترسی </label>
    <select class="form-control" name="" id="vazn_addpro1_admin">
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
    <label for="show_addpro1_admin" class="control-label pull-right  "> فعالیت </label>
    <div class="div_show_addprou">
      <div class="div_show_addpro_1">
        <label for="show_addpro">فعال</label>
        <input type="radio" class="" id="show_addpro" name="show1" value="1">
      </div>
      <div class="div_show_addpro_2">
        <label for="show_addpro_2">غیر فعال</label>
        <input type="radio" class="" id="show_addpro_2" name="show1" value="2">
      </div>

    </div>

  </div>
  <div class="sabt_form_addPro">
    <button type="button" class="btn btn-success"
    onclick="save_add_pro1()">
     ثبت مدیر
    </button>
  </div>

</form>
@endsection
