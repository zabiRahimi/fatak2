<!-- header.css -->
{{-- @php

	use App\Models\Menu;
  $menu=Menu::whereSub_menuAndShow(0 ,1)->get();
@endphp --}}

<ul id="ul_menu" class="ul_line ul_menu" >
	<a href="/"><li ><span> صفحه اصلی</span> </li></a>
	<a href="/page_login"><li  onclick=""><span> مدیریت کانال و گروه</span> </li></a>
	<li  onclick=""><span> مدیریت فروشندگان </span> </li>
	<li  onclick=""data-toggle="modal" data-target="#modal_ghanon"><span> قوانین و مقررات</span> </li>
	<li  onclick=""data-toggle="modal" data-target="#modal_shekait" ><span> شکایت</span> </li>
	<li  onclick=""><span> راهنما</span>
		<img src="../../img_site/sort1.png" style="vertical-align:sub;"/>
		<ul>
			<li><a href="#">راهنمای استفاده از سایت</a></li>
			<li><a href="#">راهنمای خرید محصول</a></li>
			<li><a href="#">راهنمای سفارش محصول جدید</a></li>
		</ul>
	</li>
</ul>

 <!--****************** modals ***************/-->

{{-- مودال های منو در فایل مودال_منو می باشد modal_menu --}}
