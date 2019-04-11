function show_channel_menu_login(){
  $('body').addClass('hide_overflow');
  $('.menu_channel_login_1').addClass('show_channel_menu_login_1');
  $('.menu_channel_login_2').addClass('show_channel_menu_login_2');
}
function hide_channel_menu_login(){
  $('body').removeClass('hide_overflow');
  $('.menu_channel_login_1').removeClass('show_channel_menu_login_1');
  $('.menu_channel_login_2').removeClass('show_channel_menu_login_2');
}
// نمایش و عدم نمایش فرمهای ورود و ثبت نام
function show_form_channel_log(clases) {
  $('.channel_sabt_log_log').css('display', 'block');
   $('.channel_sabt_log_log2' ).css('display', 'none');
  $('.'+clases).css('display', 'block');
}
