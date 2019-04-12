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
// ثبت ابتدایی شبکه اجتماعی
function sabt_channel_1(){

  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabt_channel_1',
    data: {
          name:$('#name_channelsabt1').val(),
          mobail:$('#mobail_channelsabt1').val(),
          email:$('#email_channelsabt1').val(),
          pas:$('#pas_channelsabt1').val(),
          amniat:$('#amniat_channelsabt1').val(),
         },
    success:function(data){
      $('#ajax_channelsabt1').empty();
      document.getElementById("form_channelsabt1").reset();
      $('#end_channelsabt1').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_channelsabt1');
        $('#ajax_channelsabt1').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();

         if(error['name']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['email']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {

           $('#ajax_channelsabt1').modal('show');
        }

    }
  });

}

// لاگین کردن شبکه اجتماعی
function login_channel(){

  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'get',
    url:'../login_channel',
    data: {
          mobail:$('#mobail_channellog').val(),
          pas:$('#pas_channellog').val(),
          amniat:$('#amniat_channellog').val(),
         },
    success:function(data){
      $('#ajax_channellog').empty();
      document.getElementById("form_channellog").reset();
      $('#end_channellog').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_channellog');
        $('#ajax_channellog').empty();
        $('#amniat_channellog').val('');
        $('.form-control').css("border-color" , "#fff");
        captcha();


        if(error['mobail']){
           $('#ajax_channellog').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_channellog').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_channellog').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['no_karbar']){
           $('#ajax_channellog').append('<div id="alarm_red">'+error['no_karbar']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {

           $('#ajax_channellog').modal('show');
        }

    }
  });

}
