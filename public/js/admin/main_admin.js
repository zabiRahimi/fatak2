
//تنظیم اسکرول فرمها پس از ایجاد خطا و نمایش خطا به کاربر
function scroll_form_admin(class_form){
  var h= $('.'+class_form).offset();
  var hTop=h.top-12;
  window.scrollTo(0 ,hTop);
}
function captcha(){
  $.ajax({
    type:'GET',
    url:'/refreshcaptcha',
    success:function(data){
      $(".captcha4").html(data.captcha);
    }
  });
}

function loginManage() {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../loginManage",
      method: 'post',
      data: {
          nameKarbary:$('#name_manage_log').val(),
          pas: $('#pas_manage_log').val(),
          amniat: $('#amniat_manage_log').val(),

      },
      success: function(data) {

        document.getElementById("loginFormManage").reset();
        $('.ajaxLoginManage').html('');
        window.location="/dashbordAdmin";
          },
      error: function(xhr) {
        captcha();
        $('.ajaxLoginManage').html('<div class="alert alert-danger">اطلاعات ورودی اشتباه هستند .</div>');
      }
}, "json");
}
function adModirManeg() {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../adModirManeg",
      method: 'post',

      success: function(data) {

        $('#ajaxModirManeg').html(data);
          },

}, "json");
}
