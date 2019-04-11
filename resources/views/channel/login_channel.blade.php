@extends('channel.layout')
@section('title')
  ورود-ثبت نام
@endsection
@section('content')
  <div class="channel_log">
    <div class="channel_log1">شبکه اجتماعی</div>
    <div class="channel_log2">با ما باشید</div>
    <div class="channel_log3"><a href="www.fatak.ir">fatak.ir</a></div>
  </div>
  <ul class="ul_line channel_log_ul">
    <a href="/"></a>  <li>صفحه اصلی</li></a>
    <li>نحوه کسب درآمد از شبکه اجتماعی</li>
    <li>قوانین و مقررات</li>
  </ul>
    {{-- منو موبایل --}}
    <div class="chanel_menu_log">
      <button type="button" class="btn" name="button"onclick="show_channel_menu_login()">
        <i class="fas fa-bars"></i>
        <span>منو</span>
      </button>
    </div>
    <div class="menu_channel_login_1" onclick="hide_channel_menu_login()">
    {{-- این دایو صرفا جهت فیکست بودن مودال می باشد و همچنین اعمال اوپتکی می باشد این دایو لازم است --}}
    </div>
    <div class="menu_channel_login_2">
      <div class="close_menu_channel_login" >
        <span><i class="fas fa-ellipsis-v"></i> منو</span> <button  onclick="hide_channel_menu_login()"><span aria-hidden="true">&times;</span></button>
      </div>
      <ul class="menu_channel_login_ul">
        <a href="/"><li class="modal_hide"><span><i class="far fa-window-maximize"></i> صفحه اصلی</span> </li></a>
        <li class="modal_hide" onclick="modal_sub_show()"><span><i class="fas fa-comments"></i> نحوه کسب درآمد از شبکه اجتماعی</span> </li>
        <li class="modal_hide" onclick="modal_sub_show()"><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
        <li class="modal_hide" onclick="modal_sub_show() ;hide_channel_menu_login(); $('#modal_ghanon').modal('show')"><span><i class="fas fa-compass"></i> راهنما</span> </li>
      </ul>
    </div>
    {{-- //دکمه های ورود و ثبت نام --}}
    <div class="channel_btn_log">
      <div class="channel_btn_log1"><button type="button" class="btn" name="button" onclick="show_form_channel_log('channel_log_log')">ورود</button></div>
      <div class="channel_btn_log2"><button type="button" class="btn" name="button" onclick="show_form_channel_log('channel_sabt_log')">ثبت نام</button></div>
    </div>
    {{-- فرمهای ورود و ثبت نام --}}
    <div class="channel_sabt_log_log">
      <div class="channel_log_log channel_sabt_log_log2">
        <form class="form form_register" id="form_register" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ورود</div>
         <div id="ajax_register"></div>
         {{ csrf_field() }}

         <div class="form-group">
           <label for="mobail_register" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_register"></div>
         </div>
         <div class="form-group">
           <label for="pas_register" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_register" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_register" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_register" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="" >ثبت</button>
         </div>
       </form>
      </div>

      <div class="channel_sabt_log channel_sabt_log_log2">
        <form class="form form_channelsabt1" id="form_channelsabt1" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت شبکه اجتماعی</div>
         <div id="ajax_channelsabt1"></div>
         {{ csrf_field() }}
         <div class="form-group">
           <label for="name_channelsabt1" class="control-label pull-right  "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی </label>
           <div class="div_form"><input type="text" class="form-control" id="name_channelsabt1" placeholder="به فارسی ..." ></div>
         </div>
         <div class="form-group">
           <label for="mobail_channelsabt1" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_channelsabt1"></div>
         </div>
         <div class="form-group">
           <label for="email_channelsabt1" class="control-label pull-right "><i class="fas fa-at i_form"></i>ایمیل (اختیاری)</label>
           <div class="div_form"><input type="text" class="form-control" id="email_channelsabt1"></div>
         </div>
         <div class="form-group">
           <label for="pas_channelsabt1" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_channelsabt1" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_channelsabt1" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_channelsabt1" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="sabt_channel_1()" >ثبت</button>
         </div>
       </form>
      </div>
    </div>
    {{-- لوگوهای شبکه اجتماعی --}}
    <div class="channel_logo_log">
      <span>
        <span>
          <img src="img_site/sorush-farsgraphic.png" alt="" >
          <img src="img_site/instagram-farsgraphic.png" alt="" >
          <img src="img_site/whatsapp.png" alt="" >
          <img src="img_site/telegram-farsgraphic.png" alt="" >
          <img src="img_site/google_fatak.png" alt="" >
          <img src="img_site/bisphone-farsgraphic.png" alt="" >
          <img src="img_site/Bale-Logo-LimooGraphic.png" alt="" >
        </span>
        <span></span>
      </span>
    </div>
    {{-- دیدگاهای مدیران --}}
    <div class="channel_did_log">
      <span class="channel_did_log1"></span>
      <span class="channel_did_log2">دیدگاه مدیران</span>
    </div>
@endsection
