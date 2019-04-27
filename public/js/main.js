$(document).ready(function(){
  //لوگوی انتظار
  var w_doc =  $(document).width();
  var left_doc =( w_doc - 250)/2;
  $('.gif_loding').css("left", left_doc + "px");
  $(window).resize(function(){
    var w_doc2 =  $(document).width();
    var left_doc2 =( w_doc2 - 250)/2;
    $('.gif_loding').css("left", left_doc2 + "px");});
    //ثبت بازدید شبکه اجتماعی
    var ch=$('.getid').html();
    if(ch){
      $('#modal_bazdidCh').modal('show');

    }
});//end ready
function bazdidCh() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../bazdidCh',
    data: {
         id:$('.getid').html(),
         amniat:$('#amniat_getchLabel').val(),
         },
    success:function(data){

    },
    error: function(xhr) {
      $('#modal_bazdidCh').modal('hide');
    }
  });
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
//تنظیم اسکرول فرمها پس از ایجاد خطا و نمایش خطا به کاربر
function scroll_form(class_form){
  var h= $('.'+class_form).offset();
  var fixedDiv= $('.fixed').outerHeight();
  if(fixedDiv){
  var hTop=h.top-fixedDiv-12;
  } else{
  var hTop=h.top-12;
  }
  window.scrollTo(0 ,hTop);
}
function sabt_shekait(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'/sabt_shekait',
    data: {
         name:$('#name_shekait').val(),
         mobail:$('#mobail_shekait').val(),
         email:$('#email_shekait').val(),
         shekait:$('#shekait_shekait').val(),
         amniat:$('#amniat_shekait').val(),
         },
    success:function(data){
      $('#alarm_shekait').empty();
      document.getElementById("form_shekait").reset();
      $('#modal_shekait').modal('hide');
      $('#end_shekait').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;

        $('#alarm_shekait').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
         if(error['name']){
           $('#alarm_shekait').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }else if(error['mobail']){
           $('#alarm_shekait').append('<div id="alarm_red">'+error['mobail']+'</div>');
        }else if(error['email']){
           $('#alarm_shekait').append('<div id="alarm_red">'+error['email']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }else if(error['shekait']){
           $('#alarm_shekait').append('<div id="alarm_red">'+error['shekait']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }else if(error['amniat']){
           $('#alarm_shekait').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
    }
  });
}
/* ******************* ساخت منو کنار باز شونده جهت موبایل***************** */
function show_menu_small(clases){
  $('body').addClass(clases);
  $('.menu_small_1').addClass('show_menu_small_1');
  $('.menu_small_2').addClass('show_menu_small_2');
}
function hide_menu_small(clases){
  $('body').removeClass(clases);
  $('.menu_small_1').removeClass('show_menu_small_1');
  $('.menu_small_2').removeClass('show_menu_small_2');
}
