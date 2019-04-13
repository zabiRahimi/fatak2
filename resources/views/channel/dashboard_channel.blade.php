@extends('channel.layout')
@section('title')
  داشبورد
@endsection
@section('content')
<div class="dashChHead">
  <div class="dashChHead1">
    <span class="dashChHead1_1">داشبورد </span>
    <span class="dashChHead1_2">ذبیح اله رحیمی</span>
  </div>
  <div class="dashChHead2"><a href="www.fatak.ir">fatak.ir</a></div>
</div>
<ul class="ul_line dashChUl">
  <li>تکمیل اطلاعات</li>
  <li>ویرایش</li>
  <li class="dashChLiBt">
    <button type="button" class="btn dashChBt" name="button"onclick="show_menu_small('dashCh_scroll')">
      <i class="fas fa-bars"></i>
      <span>منو</span>
    </button>
  </li>

  <li> <i class='fas fa-sign-out-alt'></i> خروج</li>
</ul>
{{-- /* ******************* ساخت منو کنار باز شونده جهت موبایل***************** */ --}}
<div class="menu_small_1 dashCh_small_1" onclick="hide_menu_small('dashCh_scroll')">
{{-- این دایو صرفا جهت فیکست بودن مودال می باشد و همچنین اعمال اوپتکی می باشد این دایو لازم است --}}
</div>
<div class="menu_small_2 dashCh_small_2">
  <div class="close_menu_small" >
    <span><i class="fas fa-ellipsis-v"></i> منو</span> <button  onclick="hide_menu_small('dashCh_scroll')"><span aria-hidden="true">&times;</span></button>
  </div>
  <ul class="menu_small_ul">
    <a href="#"><li class="modal_hide"><span><i class="fas fa-pen-square"></i> تکمیل اطلاعات</span> </li></a>
    <li class="modal_hide" onclick=""><span><i class='fas fa-edit'></i> ویرایش اطلاعات</span> </li>
    <li class="modal_hide" onclick=""><span><i class="far fa-bell"></i> هشدارها و اخبار</span> </li>
    <li class="modal_hide" onclick=""><span><i class="fas fa-project-diagram"></i> کد و آدرس مربوط به من</span> </li>
    <li class="modal_hide" onclick=""><span><span><i class='far fa-eye'></i> بازدیدهای شبکه من</span> </li>
    <li class="modal_hide" onclick=""><span><span><i class='fas fa-eye'></i> بازدیدهای کل شبکه ها</span> </li>
    <li class="modal_hide" onclick=""><span><i class='fas fa-dollar-sign'></i> ارزش ریالی بازدید من</span> </li>
    <li class="modal_hide" onclick=""><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
    <li class="modal_hide" onclick="hide_menu_small('dashCh_scroll');"><span><i class="fas fa-compass"></i> راهنما</span> </li>
  </ul>
</div>
{{-- end menu small --}}
<div class="dashChContent">
  <div class="dashCh_R">
    <ul class="ul_right dashCh_RUl">
      <li class="modal_hide" onclick=""><span><i class="far fa-bell"></i> هشدارها و اخبار</span> </li>
      <li class="modal_hide" onclick=""><span><i class="fas fa-project-diagram"></i> کد و آدرس مربوط به من</span> </li>
      <li class="modal_hide" onclick=""><span><i class='far fa-eye'></i> بازدیدهای شبکه من</span> </li>
      <li class="modal_hide" onclick=""><span><i class='fas fa-eye'></i> بازدیدهای کل شبکه ها</span> </li>
      <li class="modal_hide" onclick=""><span><i class='fas fa-dollar-sign'></i> ارزش ریالی بازدید من</span> </li>
      <li class="modal_hide" onclick=""><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
      <li class="modal_hide" onclick="hide_menu_small('dashCh_scroll');"><span><i class="fas fa-compass"></i> راهنما</span> </li>
    </ul>
  </div>
  <div class="dashCh_L">
    dsfs
  </div>
</div>
<div class="dashChFooter">

</div>
@endsection
