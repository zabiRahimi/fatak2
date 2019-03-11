<!-- header.css -->
{{-- @php

	use App\Models\Menu;
  $menu=Menu::whereSub_menuAndShow(0 ,1)->get();
@endphp --}}

<ul id="ul_menu" class="ul_line ul_menu" >
	<a href="/"><li ><span> صفحه اصلی</span> </li></a>
  <li class="" ><span> مدیریت کانال و گروه</span> </li>
  <li class="" ><span> مدیریت فروشندگان </span> </li>
  <li class="" data-toggle="modal" data-target="#modal_ghanon"><span> قوانین و مقررات</span> </li>
  <li class="" data-toggle="modal" data-target="#modal_shekait" ><span> شکایت</span> </li>
  <li class="" ><span> راهنما</span>
    <img src="../../img_site/sort1.png" style="vertical-align:sub;"/>
    <ul>
      <li>راهنمای استفاده از سایت</li>
      <li>راهنمای خرید محصول</li>
      <li>راهنمای سفارش محصول جدید</li>
    </ul>
  </li>
</ul>

 <!--****************** modals ***************/-->

{{-- مودال های منو در فایل مودال_منو می باشد modal_menu --}}
