$(document).ready(function(){
  //لوگوی انتظار
  var w_doc =  $(document).width();
  var left_doc =( w_doc - 250)/2;
  $('.gif_loding').css("left", left_doc + "px");
  $(window).resize(function(){
    var w_doc2 =  $(document).width();
    var left_doc2 =( w_doc2 - 250)/2;
    $('.gif_loding').css("left", left_doc2 + "px");});
});//end ready

function captcha(){
  $.ajax({
    type:'GET',
    url:'../refreshcaptcha',
    success:function(data){
      $(".captcha4").html(data.captcha);
    }
  });
}

//تنظیم اسکرول فرمها پس از ایجاد خطا و نمایش خطا به کاربر
function scroll_form(class_form){
  var h= $('.'+class_form).offset();
  var fixedDiv= $('.fixed').outerHeight();
  var hTop=h.top-fixedDiv-12;
  window.scrollTo(0 ,hTop);
}
