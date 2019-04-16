@extends('channel.layout')
@section('content')
<div class="dashChHead">
  <div class="dashChHead1">
    <span class="dashChHead1_1">داشبورد </span>
    <span class="dashChHead1_2">ذبیح اله رحیمی</span>
  </div>
  <div class="dashChHead2"><a href="www.fatak.ir">fatak.ir</a></div>
</div>
<ul class="ul_line dashChUl">
  <a href="/dashboard_channel" class="apjax"><li>صفحه نخست</li></a>
  <a href="/perfectDaCh" class="apjax"><li>تکمیل اطلاعات</li></a>
  <a href="/editDaCh"><li>ویرایش</li></a>
  <a class="dashChABt">
    <li>
      <button type="button" class="btn dashChBt" name="button"onclick="show_menu_small('dashCh_scroll')">
        <i class="fas fa-bars"></i>
        <span>منو</span>
      </button>
    </li>
  </a>

  <a href="#"><li> <i class='fas fa-sign-out-alt'></i> خروج</li></a>
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
    <a href="/dashboard_channel" class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="far fa-window-maximize"></i> صفحه نخست</span></li></a>
    <a href="/perfectDaCh"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="fas fa-pen-square"></i> تکمیل اطلاعات</span> </li></a>
    <a href="/editDaCh"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class='fas fa-edit'></i> ویرایش اطلاعات</span> </li></a>
    <a href="/warnCh"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="far fa-bell"></i> هشدارها و اخبار</span> </li></a>
    <a href="/urlChMy"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="fas fa-project-diagram"></i> کد و آدرس مربوط به من</span> </li></a>
    <a href="/viewChMy"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class='far fa-eye'></i> بازدیدهای شبکه من</span> </li></a>
    <a href="/viewChAll"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class='fas fa-eye'></i> بازدیدهای کل شبکه ها</span> </li></a>
    <a href="/incomeChMy"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class='fas fa-dollar-sign'></i> ارزش ریالی بازدید من</span> </li></a>
    <a href="/ghanonCh"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li></a>
    <a href="/rahnamaCh"class="apjax" onclick="hide_menu_small('dashCh_scroll');"><li class="modal_hide"><span><i class="fas fa-compass"></i> راهنما</span> </li></a>
  </ul>
</div>
{{-- end menu small --}}
<div class="dashChContent">
  <div class="dashCh_R">
    <ul class="ul_right dashCh_RUl">
      <a href="/warnCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="far fa-bell"></i> هشدارها و اخبار</span> </li></a>
      <a href="/urlChMy"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-project-diagram"></i> کد و آدرس مربوط به من</span> </li></a>
      <a href="/viewChMy"class="apjax"><li class="modal_hide" onclick=""><span><i class='far fa-eye'></i> بازدیدهای شبکه من</span> </li></a>
      <a href="/viewChAll"class="apjax"><li class="modal_hide" onclick=""><span><i class='fas fa-eye'></i> بازدیدهای کل شبکه ها</span> </li></a>
      <a href="/incomeChMy"class="apjax"><li class="modal_hide" onclick=""><span><i class='fas fa-dollar-sign'></i> ارزش ریالی بازدید من</span> </li></a>
      <a href="/ghanonCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li></a>
      <a href="/rahnamaCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-compass"></i> راهنما</span> </li></a>
    </ul>
  </div>
  <div class="dashCh_L" id="dashPjax">

    @yield('dash_content')

  </div>
</div>
<div class="dashChFooter">

</div>
@endsection
