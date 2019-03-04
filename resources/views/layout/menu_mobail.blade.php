<div class="menu_mobail_1" onclick="hide_menu_mobail()">
{{-- این دایو صرفا جهت فیکست بودن مودال می باشد و همچنین اعمال اوپتکی می باشد این دایو لازم است --}}
</div>
<div class="menu_mobail_2">

<div class="close_menu_mobail" >
  <span><i class="fas fa-ellipsis-v"></i> منو</span> <button  onclick="hide_menu_mobail()"><span aria-hidden="true">&times;</span></button>
</div>
<ul class="menu_mobail_ul">
  <a href="/"><li class="modal_hide"><span><i class="far fa-window-maximize"></i> صفحه اصلی</span> </li></a>
  <li class="modal_hide" onclick="modal_sub_show()"><span><i class="fas fa-comments"></i> مدیریت کانال و گروه</span> </li>
  <li class="modal_hide" onclick="modal_sub_show()"><span><i class="fas fa-user-tag"></i> مدیریت فروشندگان </span> </li>
  <li class="modal_hide" onclick="modal_sub_show() ;hide_menu_mobail(); $('#modal_ghanon').modal('show')"><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
  <li class="modal_hide" onclick="modal_sub_show(); hide_menu_mobail(); $('#modal_shekait').modal('show')" ><span><i class="fas fa-gavel"></i> شکایت</span> </li>
  <li class="modal_hide rahnama_m" onclick="modal_sub_show('rahnama_m')"><span><i class="fas fa-compass"></i> راهنما</span>
    <img src="../../img_site/sort1.png" />
    <ul>
      <li>راهنمای استفاده از سایت</li>
      <li>راهنمای خرید محصول</li>
      <li>راهنمای سفارش محصول جدید</li>
    </ul>
  </li>
  <li class="modal_hide" onclick="modal_sub_show();hide_menu_mobail(); $('#modal_h_login').modal('show')"><span><i class="fas fa-sign-in-alt"></i> ورود</span> </li>
  <li class="modal_hide" onclick="modal_sub_show();hide_menu_mobail(); $('#modal_h_sabtname').modal('show')"><span><i class="fas fa-user-plus"></i> ثبت نام</span> </li>
  <li class="modal_hide" onclick="modal_sub_show();hide_menu_mobail(); $('#about_we').modal('show')"><span><i class="fas fa-info-circle"></i> درباره ما</span> </li>
  <li class="modal_hide" onclick="modal_sub_show();hide_menu_mobail(); $('#contact_we').modal('show')"><span><i class="fas fa-phone"></i> تماس با ما</span> </li>
</ul>

</div>
