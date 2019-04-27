
// نمایش و عدم نمایش فرمهای ورود و ثبت نام
function show_form_channel_log(clases) {
  $('.channel_sabt_log_log').css('display', 'block');
   $('.channel_sabt_log_log2' ).css('display', 'none');
   $('.channel_ghanon_society_log3').css('display', 'none');
  $('.'+clases).css('display', 'block');
}
// ثبت ابتدایی شبکه اجتماعی
function sabt_channel_1(){
  var mobail=$('#mobail_channelsabt1').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabt_channel_1',
    data: {
          name:$('#name_channelsabt1').val(),
          mobail:mobail,
          email:$('#email_channelsabt1').val(),
          pas:$('#pas_channelsabt1').val(),
          amniat:$('#amniat_channelsabt1').val(),
         },
    success:function(data){
      $('#ajax_channelsabt1').empty();
      document.getElementById("form_channelsabt1").reset();
      $('#end_channelsabt1').modal('show');
      $("#end_channelsabt1").on('hide.bs.modal', function () {
      window.location.href  = "/page_login";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_channelsabt1');
        $('#ajax_channelsabt1').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_channelsabt1').val('');
         if(error['name']){
           $('#ajax_channelsabt1').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#name_channelsabt12').css("border-color" , "#c30909");
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
        }}});}

// لاگین کردن شبکه اجتماعی
function login_channel(){
  var mobail=$('#mobail_channellog').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'get',
    url:'../login_channel',
    data: {
          mobail:mobail,
          pas:$('#pas_channellog').val(),
          amniat:$('#amniat_channellog').val(),
         },
    success:function(data){
      $('#ajax_channellog').empty();
      document.getElementById("form_channellog").reset();
      captcha();
      $('#end_channellog').modal('show');
      $("#end_channellog").on('hide.bs.modal', function () {
      window.location.href  = "/dashboard_channel";
      });
    },
    error: function(xhr) {
      $('#ok_edit_user').modal('show');
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_channellog');
        $('#ajax_channellog').empty();
        $('#amniat_channellog').val('');
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_channellog').val('');
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
        }}});}

// perfect_data.php
function sabt_channel_2(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabt_channel_2',
    data: {
          codemly:$('#codemly_perfectDaCh').val(),
          ostan:$('#ostan_perfectDaCh').val(),
          city:$('#city_perfectDaCh').val(),
          address:$('#address_perfectDaCh').val(),
          codepost:$('#codepost_perfectDaCh').val(),
          accountNumber:$('#accountNumber_perfectDaCh').val(),
          cart:$('#cart_perfectDaCh').val(),
          master:$('#master_perfectDaCh').val(),
          bank:$('#bank_perfectDaCh').val(),
          allowGhanon:$('#allowGhanon_perfectDaCh:checked').val(),
         },
    success:function(data){
      $('#ajax_perfectDaCh').empty();
      document.getElementById("form_perfectDaCh").reset();
      $('#end_perfectDaCh').modal('show');
      $("#end_perfectDaCh").on('hide.bs.modal', function () {
      window.location.href  = "/urlChMy";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_perfectDaCh');
        $('#ajax_perfectDaCh').empty();
        $('.form-control').css("border-color" , "#fff");
         if(error['codemly']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['codemly']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['ostan']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+error['bank']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['allowGhanon']){
           $('#ajax_perfectDaCh').append('<div id="alarm_red">'+'گزینه "قوانین را خوانده و می پذیرم" را انتخاب کنید . '+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {
           $('#ajax_perfectDaCh').modal('show');
        }}});}
// edit_data.php
function editDaChSave(id){
  var mobail=$('#mobail_editDaCh').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../editDaChSave',
    data: {
          id:id,
          name:$('#name_editDaCh').val(),
          codemly:$('#codemly_editDaCh').val(),
          mobail:mobail,
          email:$('#email_editDaCh').val(),
          ostan:$('#ostan_editDaCh').val(),
          city:$('#city_editDaCh').val(),
          address:$('#address_editDaCh').val(),
          codepost:$('#codepost_editDaCh').val(),
          accountNumber:$('#accountNumber_editDaCh').val(),
          cart:$('#cart_editDaCh').val(),
          master:$('#master_editDaCh').val(),
          bank:$('#bank_editDaCh').val(),
         },
    success:function(){
      $('#ajax_editDaCh').empty();
      $('#end_editDaCh').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_editDaCh');
        $('#ajax_editDaCh').empty();
        $('.form-control').css("border-color" , "#fff");
        if(error['name']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codemly']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['codemly']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
         else if(error['mobail']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
          $('#ajax_editDaCh').append('<div id="alarm_red">'+error['email']+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['ostan']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_editDaCh').append('<div id="alarm_red">'+error['bank']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {
           $('#ajax_editDaCh').modal('show');
        }  }  });}
function editPasDaCh(id){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../editPasDaCh',
    data: {
          id:id,
          pasOld:$('#pasOld_editPasDaCh').val(),
          pasNew:$('#pasNew_editPasDaCh').val(),
         },
    success:function(){
      $('#ajax_editPasDaCh').empty();
      document.getElementById("form_editPasDaCh").reset();
      $('#end_editPasDaCh').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_editPasDaCh');
        $('#ajax_editPasDaCh').empty();
        $('.form-control').css("border-color" , "#fff");
        if(error['pasOld']){
           $('#ajax_editPasDaCh').append('<div id="alarm_red">'+error['pasOld']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pasNew']){
           $('#ajax_editPasDaCh').append('<div id="alarm_red">'+error['pasNew']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }

        else if(error['no_pas']){
           $('#ajax_editPasDaCh').append('<div id="alarm_red">'+error['no_pas']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }  }  });}
