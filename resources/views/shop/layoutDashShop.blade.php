@extends('shop.layoutShop')
@section('content')
<div class="dashShHead">
  <div class="dashShHead1">
    <span class="dashShHead1_1">داشبورد </span>
    <span class="dashShHead1_2">{{$seller}}</span>
  </div>
  <div class="dashShHead2"><a href="www.fatak.ir">fatak.ir</a></div>
</div>
<ul class="ul_line dashShUl">
  <a href="/dashboard_shop" class="apjax"><li>صفحه نخست</li></a>
  <a href="/perfectDaShop" class="apjax"><li>تکمیل اطلاعات</li></a>
  <a href="/editDaShop"class="apjax"><li>ویرایش اطلاعات</li></a>
  <a class="dashShABt">
    <li>
      <button type="button" class="btn dashShBt" name="button"onclick="show_menu_small('dashSh_scroll')">
        <i class="fas fa-bars"></i>
        <span>منو</span>
      </button>
    </li>
  </a>

  <a href="/logoutShop"><li> <i class='fas fa-sign-out-alt'></i> خروج</li></a>
</ul>
{{-- /* ******************* ساخت منو کنار باز شونده جهت موبایل***************** */ --}}
<div class="menu_small_1 dashSh_small_1" onclick="hide_menu_small('dashSh_scroll')">
{{-- این دایو صرفا جهت فیکست بودن مودال می باشد و همچنین اعمال اوپتکی می باشد این دایو لازم است --}}
</div>
<div class="menu_small_2 dashSh_small_2">
  <div class="close_menu_small" >
    <span><i class="fas fa-ellipsis-v"></i> منو</span> <button  onclick="hide_menu_small('dashSh_scroll')"><span aria-hidden="true">&times;</span></button>
  </div>
  <ul class="menu_small_ul">
    <a href="/dashboard_shop" class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="far fa-window-maximize"></i> صفحه نخست</span></li></a>
    <a href="/perfectDaShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="fas fa-pen-square"></i> تکمیل اطلاعات</span> </li></a>
    <a href="/editDaShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class='fas fa-edit'></i> ویرایش اطلاعات</span> </li></a>
    <a href="/warningShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="far fa-bell"></i> هشدارها و اخبار</span> </li></span> <span class="badgeShopMob badegW">0</span></a>
    <a href="/newOrderShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="fas fa-bolt"></i> سفارشات جدید</span> </li></span><span class="badgeShopMob">{{$orderNum}}</span></a>
    <a href="/oldOrderShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="fas fa-file-invoice"></i> سفارشات ثبت شده</span></li></span> <span class="badgeShopMob">{{$oldOrderNum}}</span></a>
    <a href="/buyProShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="fas fa-check-circle"></i> محصولات خریداری شده</span> </li></span><span class="badgeShopMob badegM">{{$buyOrderNum}}</span></a>
    <a href="/sabtErsalShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="far fa-calendar-plus"></i> ثبت ارسال شده ها</span> </li></a>
    <a href="/editErsalShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="far fa-edit"></i> ویرایش ارسال شده ها</span> </li></a>
    <a href="/pigiryErsalShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="fas fa-search-location"></i> پیگیری ارسال شده ها</span> </li></a>
    <a href="/payShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="fas fa-calendar-check"></i> پرداخت شده ها</span> </li></span><span class="badgeShopMob">{{$payOrderNum}}</span></a>
    <a href="/backErsalShop"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><span class="liMM"><li class="modal_hide "><span class=""><i class="fas fa-reply-all"></i> محصولات مرجوعی</span> </li></span><span class="badgeShopMob badegB">{{$backOrderNum}}</span></a>
    <a href="/societyCh"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="fas fa-handshake"></i>نحوه مشارکت</span> </li></a>
    <a href="/ghanonCh"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li></a>
    <a href="/rahnamaCh"class="apjax" onclick="hide_menu_small('dashSh_scroll');"><li class="modal_hide "><span class=""><i class="fas fa-compass"></i> راهنما</span> </li></a>
  </ul>
</div>
{{-- end menu small --}}
<div class="dashShContent">
  <div class="dashSh_R">
    <ul class="ul_right dashSh_RUl">
      <a href="/warningShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="far fa-bell"></i> هشدارها و اخبار</span> <span class="badgeShop badegW">0</span></li></a>
      <a href="/sabtProStockShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-calendar-plus"></i>ثبت محصولات ثابت</span> </li></a>
      <a href="/showProStockShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-circle"></i>محصولات ثابت</span> <span class="badgeShop"></span></li></a>
      <a href="/sabtProUnStockShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-calendar-plus"></i>ثبت محصول غیر ثابت</span> </li></a>
      <a href="/showProUnStockShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="far fa-circle"></i>محصولات غیر ثابت </span> <span class="badgeShop"></span></li></a>
      <a href="/newOrderShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-bolt"></i> سفارشات جدید</span> <span class="badgeShop">{{$orderNum}}</span></li></a>
      <a href="/oldOrderShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-file-invoice"></i> سفارشات ثبت شده </span> <span class="badgeShop">{{$oldOrderNum}}</span></li></a>
      <a href="/buyProShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-check-circle"></i> محصولات خریداری شده</span> <span class="badgeShop badegM">{{$buyOrderNum}}</span></li></a>
      <a href="/sabtErsalShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="far fa-calendar-plus"></i> ثبت ارسال شده ها</span> </li></a>
      <a href="/editErsalShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="far fa-edit"></i> ویرایش ارسال شده ها</span> </li></a>
      <a href="/pigiryErsalShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-search-location"></i> پیگیری ارسال شده ها</span> </li></a>
      <a href="/payShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-calendar-check"></i> پرداخت شده ها</span> <span class="badgeShop">{{$payOrderNum}}</span></li></a>
      <a href="/backErsalShop"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-reply-all"></i> محصولات مرجوعی</span> <span class="badgeShop badegB">{{$backOrderNum}}</span></li></a>
      <a href="/societyCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-handshake"></i>نحوه مشارکت</span> </li></a>
      <a href="/ghanonCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li></a>
      <a href="/rahnamaCh"class="apjax"><li class="modal_hide" onclick=""><span><i class="fas fa-compass"></i> راهنما</span> </li></a>
    </ul>
  </div>
  <div class="dashSh_L" id="dashPjax">

    @yield('dash_content')

  </div>
</div>
<div class="dashShFooter">

</div>
@endsection
