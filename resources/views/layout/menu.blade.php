<!-- header.css -->
{{-- @php

	use App\Models\Menu;
  $menu=Menu::whereSub_menuAndShow(0 ,1)->get();
@endphp --}}

<ul id="ul_menu" class="ul_line ul_menu" >
	<a href="/"><li ><span> صفحه اصلی</span> </li></a>
	<li  onclick=""><span> مدیریت کانال و گروه</span> </li>
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


  {{-- @foreach ($menu as  $value)

			<a
			< ? php
					switch ($value['id']) {
						case '1': echo 'href="/" ';break;
						case '4':echo 'data-toggle="modal" data-target="#modal_ghanon"';	break;
            case '5' :echo 'data-toggle="modal" data-target="#modal_shekait"'; break;
					}
     ?>
			>
      <li  >
      {{$value['title']}}
		      @if ($value['hast_sub_menu']==1)
		        <img src="../../img_site/sort1.png" style="vertical-align:sub;"/>
		        <ul>
							@php
								$sub_menu=Menu::where('sub_menu' ,'=' , $value['id'])->where('show' , 1)->get();
							@endphp
		          @foreach ($sub_menu as  $sub_value)
		            <li> <a href="#">{{$sub_value['title']}}</a> </li>
		          @endforeach
		        </ul>
		      @endif
          </li>
      </a>

  @endforeach --}}
</ul>

 <!--****************** modals ***************/-->

{{-- مودال های منو در فایل مودال_منو می باشد modal_menu --}}
