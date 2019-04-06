

  <div class="row div_h0 ">
    <div class="col-5 col-sm-2  div_h1 "> <h2 class="h2_h"> <span class="fatak1">فروشگاه</span> <span class="fatak2">اینترنتی</span> <span class="fatak3">فاتک</span></h2>
      <ul class="ul_line  ul_xm_h d-block d-sm-none">
        @if (empty(cookie('check_log')))
          <li data-toggle="modal" data-target="#modal_h_login"><a ><i class="fas fa-sign-in-alt"></i> &nbsp;ورود </a></li>
          <li data-toggle="modal" data-target="#modal_h_sabtname"><a ><i class="fas fa-user-plus"></i> &nbsp;ثبت نام</a></li>
        @else
          <li ><a ><i class="fas fa-angle-down"></i> zabi  </a>
            <ul>
              <li>پرفایل</li>
              <li>خروج</li>
            </ul>
          </li>

        @endif

     </ul>
    </div>

    <div class="col-2 col-sm-8  div_h2">
      <div class="row div_h3">
          <div class="d-none d-sm-block col-sm-5 text-right div_h4">
@php

@endphp
                   @if (empty($check))
                     <ul class="ul_line ul_h1 ">
                       <li data-toggle="modal" data-target="#modal_h_login"><a ><i class="fas fa-sign-in-alt"></i> &nbsp;ورود </a></li>
                       <li data-toggle="modal" data-target="#modal_h_sabtname"><a ><i class="fas fa-user-plus"></i> &nbsp;ثبت نام</a></li>
                     </ul>
                   @else
                     <ul class="ul_log">
                       <li class="li_log1"><i class="fas fa-angle-down"></i> zabi_rahimi1360
                         <ul class="ul_log1">
                           <a href="/dashboard_user"><li class="li_log2"><i class="fas fa-id-badge"></i> پروفایل</li></a>
                           <a href="/logout_user"><li class="li_log3"><i class="fas fa-sign-out-alt"></i> خروج</li></a>
                         </ul>
                       </li>
                     </ul>
                   @endif

           </div>
          <div class="col-sm-2 text-center div_h5" > <img src="\img_site\alla1.png" alt="به نام خدا" > </div>
          <div class="d-none d-sm-block col-sm-5 text-left bg div_h6">
                 <ul class="ul_line ul_h1 ">
                    <li data-toggle="modal" data-target="#about_we"><a ><i class="fas fa-info-circle"></i> &nbsp;درباره ما </a></li>
                    <li data-toggle="modal" data-target="#contact_we"><a ><i class="fas fa-phone"></i> &nbsp;تماس با ما</a></li>
                </ul>
          </div>
      </div>

    </div>

    <div class="col-5 col-sm-2 text-left div_h7"><h2 class="h2_h2">fa<span class="fatak4">t</span>ak.ir</h2>
      <ul class="ul_line  ul_xm_h d-block d-sm-none">
        <li data-toggle="modal" data-target="#about_we"><a ><i class="fas fa-info-circle"></i> &nbsp;درباره ما </a></li>
        <li data-toggle="modal" data-target="#contact_we"><a ><i class="fas fa-phone"></i> &nbsp;تماس با ما</a></li>
      </ul>
    </div>
  </div>


  {{-- جستجو سبد خرید پرچم --}}
<div class="" id="fixed">


  <div class="row div_h8">
      <div class="col-5 col-sm-2 col-md-3 div_h9 text-center">
        <img class="d-none d-sm-block" src="\img_site\iran.png" alt="ایران" >
        <div class="d-block d-sm-none div_menu_sm" onclick="show_menu_mobail()">
          <i class="fas fa-bars"></i>
            <div class="span_menu">منو</div>

        </div>

      </div>

      <div class="d-none d-sm-block col-sm-6 col-md-6 div_h10 ">
      <div class="input-group">
          <div class="input-group-prepend">

            <div  class="input-group-text search" id="btnGroupAddon" onclick="search_empty($('#search_big').val())"><i class="fas fa-search"></i></div>
          </div>
          <input type="text" dir="rtl" name="search" class="form-control " id="search_big" placeholder="جستجو ..." aria-label="Input group example" aria-describedby="btnGroupAddon">
      </div>
     </div>
      <div class="col-7 col-sm-4 col-md-3 div_h11 ">
        <div class="sabad" data-toggle="tooltip" data-placement="bottom" title="مشاهده سبد خرید">
          <a href="/show_sabad_pro" class="a_pjax">
          <span class="sabad_s1"><i class="fas fa-cart-plus"></i></span>
          <span class="sabad_s2">سبد خرید</span>
          <span class=" sabad_s3" id="sabad">
            {{$num_pro}}
        </span>
        </a>
        </div>
      </div>
  </div>
  <div class=" div_h12">
    <div class="  div_h10 div_h13">
      <div class="input-group">
    <div class="input-group-prepend">
    <div class="input-group-text search" id="btnGroupAddon" onclick="search_empty($('#search_small').val())"><i class="fas fa-search"></i></div>
    </div>
    <input type="text" dir="rtl" class="form-control" id="search_small" placeholder="جستجو ..." aria-label="Input group example" aria-describedby="btnGroupAddon">
  </div>

    </div>
    <div class="div_h14   div_h9 ">
    <img class="" src="\img_site\iran.png" alt="ایران" >
   </div>
  </div>

  {{-- منو --}}
<nav>
  <div class="d-none d-sm-block div_h15">
    @include('layout.menu')
  </div>

</nav>
</div>
{{-- مودالهای فایل منو --}}
@include('layout.modal_menu')
<div class="modal_menu_mobail">
  @include('layout.menu_mobail')
</div>
{{-- اسلایدر --}}
<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img_site/1.jpg "  alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img_site/2.jpg " alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img_site/3.jpg " alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev slider_prev_next" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next slider_prev_next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
{{-- *************************************** modals ***************************************** --}}
<!-- Modal ورود-->
<div class="modal fade" id="modal_h_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <h5 class="modal-title modal_h_login_label" id="exampleModalLabel"><i class="fas fa-sign-in-alt"></i> ورود</h5>
        <button type="button" class="close modal_h_login_label_2" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">

         <form class="form_h_login_pro" action="" method="post">
          <div id="ajax_login_user"></div>
          <div class="form-group">
            <label for="karbary_login_user" class="control-label pull-right  "><i class="fas fa-user-circle i_namekarbary_sabt"></i>  نام کاربری </label>
            <div class="div_h_login"><input type="text" class="form-control" id="karbary_login_user" placeholder=""></div>
          </div>
          <div class="form-group">
            <label for="pas_login_user" class="control-label pull-right  "><i class="fas fa-key i_pas_sabt"></i> رمز عبور </label>
            <div class="div_h_login"><input type="text" class="form-control" id="pas_login_user" placeholder=""></div>
          </div>
          <div class="form-group" >
            <label for="amniat_login_user" class="control-label pull-right "><i class="fas fa-shield-alt i_amniat_sabt"></i> کد امنیتی </label>
            <div class="div_h_login"><input type="text" class="form-control tel" id="amniat_login_user" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
          </div>
          <div class="captcha_h_login_form">
            <span class="captcha4">{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
          </div>
        </form>
      </div>
      <div class=" modal-footer-h-login">
        <button type="button" class="btn btn-primary modal-footer-pro-login1" onclick="login_user()">ثبت</button>
        <button type="button" class="btn btn-secondary modal-footer-pro-login2" data-dismiss="modal">خروج</button>
      </div>
      <div class="Forget_h_login" onclick="$('#modal_h_login').modal('hide').hide(function(){$('#modal_h_forget').modal('show')}) ">رمز عبور و یا نام کاربری را فراموش کرده ام !!</div>
      <div class="new_sabt_h_login"  onclick="$('#modal_h_login').modal('hide').hide(function(){$('#modal_h_sabtname').modal('show')}) "  >تا کنون ثبت نام نکرده ام</div>
    </div>
  </div>
</div><!--end modal ورود-->
<!-- Modal موفق بودن لاگین-->
<div class="modal fade" id="ok_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header end_register_header">
        <h5 class="modal-title end_register_label" id="exampleModalLabel"><i class="fas fa-user-plus"></i> پایان ثبت نام</h5>
        <button type="button" class="close end_register_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_end_register">
        <div class="modal_body_end_register_1">45</div>
        <div class="modal_body_end_register_2">خوش آمدید .</div>
      </div>
      <div class=" end_register_footer">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>

      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت لاگین-->
<!-- Modal فراموشی رمز-->
<div class="modal fade" id="modal_h_forget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <h5 class="modal-title modal_h_login_label" id="exampleModalLabel"><i class="fas fa-directions"></i> بازیابی رمز و نام کاربری</h5>
        <button type="button" class="close modal_h_login_label_2"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        {{-- <div class="form-group ban">
          <label for="name_pro_question" class="control-label pull-right  ">نام </label>
          <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="name_pro_question" ></div>
        </div> --}}
         <form class="form_h_login_pro" action="" method="post">
          <div id="pasohk_pro"></div>
          <div class="form-group">
            <label for="name_pro_h_login" class="control-label pull-right  "><i class="fas fa-at i_pas_sabt"></i> ایمیل </label>
            <div class="div_h_login"><input type="text" class="form-control" id="name_pro_question" placeholder=""></div>
          </div>
          <div class="form-group" >
            <label for="amniat_pro_question" class="control-label pull-right "><i class="fas fa-shield-alt i_amniat_sabt"></i> کد امنیتی </label>
            <div class="div_h_login"><input type="text" class="form-control tel" id="amniat_pro_question" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
          </div>
          <div class="captcha_h_login_form">
            <span class="captcha4">{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
          </div>
        </form>
      </div>
      <div class=" modal-footer-h-login">
        <button type="button" class="btn btn-primary modal-footer-pro-login1">ثبت</button>
        <button type="button" class="btn btn-secondary modal-footer-pro-login2" data-dismiss="modal">خروج</button>
      </div>
    </div>
  </div>
</div><!--end modal فراموشی رمز و...-->
<!-- Modal ثبت نام-->
<div class="modal fade" id="modal_h_sabtname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_sabtname_header">
        <h5 class="modal-title modal_h_sabtname_label" id="exampleModalLabel"><i class="fas fa-user-plus"></i> ثبت نام</h5>
        <button type="button" class="close modal_h_sabtname_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_sabtname">
        {{-- <div class="form-group ban">
          <label for="name_pro_question" class="control-label pull-right  ">نام </label>
          <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="name_pro_question" ></div>
        </div> --}}
         <form class="form_h_sabtname_pro form_register" id="form_register" action="" method="post">
          <div class="form_h_sabtname_pro1"><i class="fas fa-info-circle"></i> ایمیل و موبایل شما منتشر نمی شود</div>
          <div id="ajax_register"></div>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name_register" class="control-label pull-right  "><i class="fas fa-user-tie i_name_sabt"></i> نام و نام خانوادگی </label>
            <div class="div_h_sabtname"><input type="text" class="form-control" id="name_register" placeholder="به فارسی ..." ></div>
          </div>
          <div class="form-group">
            <label for="karbary_register" class="control-label pull-right  "><i class="fas fa-user-circle i_namekarbary_sabt"></i>  نام کاربری </label>
            <div class="div_h_sabtname"><input type="text" class="form-control" id="karbary_register" placeholder="به لاتین ..."></div>
          </div>
          <div class="form-group">
            <label for="pas_register" class="control-label pull-right  "><i class="fas fa-key i_pas_sabt"></i> رمز عبور </label>
            <div class="div_h_sabtname"><input type="text" class="form-control" id="pas_register" placeholder="به لاتین ..."></div>
          </div>
          <div class="form-group">
            <label for="mobail_register" class="control-label pull-right "><i class="fas fa-mobile-alt i_mobail_sabt"></i> موبایل</label>
            <div class="div_h_sabtname"><input type="text" class="form-control" id="mobail_register"></div>
          </div>
          <div class="form-group">
            <label for="email_register" class="control-label pull-right "><i class="fas fa-at i_email_sabt"></i> ایمیل</label>
            <div class="div_h_sabtname"><input type="text" class="form-control" id="email_register"></div>
          </div>

          <div class="form-group" >
            <label for="amniat_register" class="control-label pull-right "><i class="fas fa-shield-alt i_amniat_sabt"></i> کد امنیتی </label>
            <div class="div_h_sabtname"><input type="text" class="form-control tel" id="amniat_register" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
          </div>
          <div class="captcha_h_sabtname_form">
            <span class="captcha4">{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
          </div>
        </form>
      </div>
      <div class=" modal-footer-h-sabtname">
        <button type="button" class="btn btn-primary modal-footer-pro-question1" onclick="register();">ثبت</button>
        <button type="button" class="btn btn-secondary modal-footer-pro-question2" data-dismiss="modal">خروج</button>
      </div>
    </div>
  </div>
</div><!--end modal ثبت نام-->
<!-- Modal موفق بودن ثبت نام-->
<div class="modal fade" id="end_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header end_register_header">
        <h5 class="modal-title end_register_label" id="exampleModalLabel"><i class="fas fa-user-plus"></i> پایان ثبت نام</h5>
        <button type="button" class="close end_register_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_end_register">
        <div class="modal_body_end_register_1">45</div>
        <div class="modal_body_end_register_2">تبریک !! ثبت نام با موفقیت انجام شد .</div>
      </div>
      <div class=" end_register_footer">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>

      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت نام-->
<!-- Modal درباره ما-->
<div class="modal fade bd-example-modal-lg" id="about_we" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
      <div class="modal-header modal_h_sabtname_header">
        <h5 class="modal-title modal_h_sabtname_label" id="exampleModalLabel"><i class="fab fa-superpowers"></i> درباره ما</h5>
        <button type="button" class="close modal_h_sabtname_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_about">
        <div class="label_about">
          <div class="label2_about"><i class="fas fa-tag"></i> نام فروشگاه</div>
          <div class="label3_about"> فاتک</div>
        </div>
        <div class="label_about">
          <div class="label2_about"><i class="fas fa-globe"></i> آدرس اینترنتی</div>
          <div class="label3_about tahoma"><a href="www.fatak.ir">www.fatak.ir</a> </div>
        </div>
        <div class="matn_about">
        <div class="matn_about1">اهداف و انگیزه راه اندازی فروشگاه :</div>
        <div class="matn_about2">
          با رشد سریع زیر ساختهای اینترنت و افزایش روز افزون کاربران اینترنتی در چند سال اخیر
                            شاهد پدیدار شدن فروشگاههای مجازی و عرضه انواع کالا و خدمات توسط این فروشگاهها هستیم.
                            مدیران مربوطه با خلاقیت و الگو برداری مناسب از فروشگاههای مجازی بزرگ و معروف جهان توانسته اند
                            با شناسایی نیازهای کاربران اینترنت ، خدمات مناسبی به مشتریان عرضه کنند.
                            اما همچنین کمبودهای زیادی احساس می شود که با رفع آن می توان گامی در رفاه و آسایش و رفع نیازهای کاربران
                            برداشت.<br />
                            فروشگاههای موجود با همه وسعت و امکانات مناسب تنها می توانند بخش کوچکی از کالاها و خدمات را به مشتریان عرضه کنند.
                            به طوری که مشتری گاها زمان زیادی برای پیدا کردن کالای خود در اینترنت و فروشگاهها سپری می کند و در آخر نیز به مطلوب
                            خود نمی رسد. ما برای بر طرف کردن این مشکل ، سیستمی را طراحی کرده ایم که کاربر با صرف
                            زمان کم (در حد یک دقیقه) و ثبت سفارش خود ، تهیه کالای خود را با فراغت و آسودگی خیال به ما بسپارد
                            . ما نیز با بهره گیری از توان و خلاقیت گروه خلاق خود و تسلط و شناخت بر بازارهای بزرگ
                            در سدد تهیه سفارش مشتریان به نحوه احسنت و در کمترین زمان خواهیم بود.

        </div>
      </div>
      <div class="matn_about">
        <div class="matn_about1">چه نوع کالاهای را پوشش می دهیم؟</div>
        <div class="matn_about2">
          پذیرش سفارش انواع کالاها و محصولات را در دستور کار خود داریم . بغیر از کالاهایی که عرضه و فروش آن
                           طبق قوانین کشور مجاز نمی باشد. البته سفارش کالاهایی که برای عرضه نیاز به داشتن مجوز خاص می باشد را
                           نمی پذیریم ، مگر اینکه مجوز لازم را کسب نماییم.
       </div>
      </div>
      <div class="matn_about">
        <div class="matn_about1">چگونه بر بازارهای بزرگ کشور احاطه داریم؟</div>
        <div class="matn_about2">
           دفتر مرگزی فروشگاه در شهر زیبا و امن ارسنجان می باشد . ولی برای دسترسی به
           فروشگاهها و بازارها ،  در شهر های بزرگ کارگروههای را تشکیل داده ایم . و با بستن قرارداد با
           مراکز بزرگ و معتبر عرضه کالا بر این مهم نیز فایق آمده ایم.
           البته نا گفته نماند با توجه به تازگی ایده و عمر کم فروشگاه ، با مشکلات عدیده ای مواجه هستیم
           که با رشد فروشگاه و تسلط بیشتر بر اوضاع و با یاری خداوند و همراهی شما عزیزان رفته رفته موانع را کنار خواهیم زد
           تا هر چه بهتر پاسخگوی مشتریان خود باشیم
        </div>
      </div>
      <div class="matn_about">
        <div class="matn_about1">معنای فاتک چیست و چرا از این نام استفاده می کنیم ؟</div>
        <div class="matn_about2">
          ریشه اسم فاتک اوستایی می باشد. تلفظ اسم علامت کسره زیر حرف ت می باشد(fatek) .
                     		 که ما کسره را به فتحه تغییر داده ایم (fatak)
                             . معنی کلمه فاتک یعنی شجاع و دلیر و به کسی می گویند که به هرچه همت کند انجام می دهد.
                             از این کلمه استفاده کرده ایم که هم نوشتن آن آسان می باشد و هم کلمه تازه ای هست که کمتر از آن استفاده شده است
                             . و دلیل دیگر آن این هست که تیم و گروه فروشگاه با سرلوحه قرار دادن معنی این کلمه تمام همت خود را به کار بگیرند که به اهداف
                             مورد نظر دست پیدا کنند .
        </div>
      </div>
      <div class="froosh_about">
        شما هم می توانید شریک و فروشنده ما باشید ، به ما بپیوندید ...
      </div>
      <div class="froosh_about">
        با ما از شبکه اجتماعی خود کسب درآمد کنید ...
      </div>
    </div>
      <div class=" modal-footer-h-sabtname">
        <button type="button" class="btn btn-secondary modal-footer-pro-question2" data-dismiss="modal">خروج</button>
      </div>
    </div>

  </div>

</div><!--end modal درباره ما-->
<!-- Modal تماس با م-->
<div class="modal fade bd-example-modal-lg" id="contact_we" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_sabtname_header">
        <h5 class="modal-title modal_h_sabtname_label" id="exampleModalLabel"><i class="fas fa-phone-square"></i> تماس با ما</h5>
        <button type="button" class="close modal_h_sabtname_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_contact">
        <div class="label_contact">
          <div class="label2_contact"><i class="fas fa-tag"></i> نام فروشگاه</div>
          <div class="label3_contact"> فاتک</div>
        </div>
        <div class="label_contact">
          <div class="label2_contact"><i class="fas fa-globe"></i> آدرس اینترنتی</div>
          <div class="label3_contact tahoma"><a href="www.fatak.ir">www.fatak.ir</a> </div>
        </div>
        <div class="label_contact">
          <div class="label2_contact"><i class="fas fa-user-tag"></i> مدیر مسئول</div>
          <div class="label3_contact"> ذبیح اله رحیمی</div>
        </div>

        <div class="label_contact">
          <div class="label2_contact"><i class="fas fa-phone"></i> تلفن</div>
          <div class="label3_contact number"> 07143528935</div>
        </div>
        <div class="label_contact">
          <div class="label2_contact"><i class="fas fa-mobile"></i> موبایل</div>
          <div class="label3_contact number"> 09178023733</div>
        </div>
      <div class="label_contact">
        <div class="label2_contact"><i class="fas fa-envelope"></i> کد پستی</div>
        <div class="label3_contact number">7376276384 </div>
      </div>
      <div class="label_contact label_contact_address">
        <div class="label2_contact label2_contact_address"><i class="fas fa-address-card"></i> آدرس</div>
        <div class="label3_contact label3_contact_address"> فارس ، ارسنجان ، خیابان طالقانی  </div>
      </div>
      <div class="label_contact label_contact_email">
        <div class="label2_contact label2_contact_email"><i class="fas fa-at"></i> ایمیل</div>
        <div class="label3_contact label3_contact_email tahoma"> rahimi.z1360@gmail.com</div>
      </div>
      <div class="froosh_contact">
        شما هم می توانید شریک و فروشنده ما باشید ، به ما بپیوندید ...
      </div>
      <div class="froosh_contact">
        با ما از شبکه اجتماعی خود کسب درآمد کنید ...
      </div>
      </div>
      <div class=" modal-footer-h-sabtname">
        <button type="button" class="btn btn-secondary modal-footer-pro-question2" data-dismiss="modal">خروج</button>
      </div>
    </div>
  </div>
</div><!--end modal تماس با ما-->
