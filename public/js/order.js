function sabtOrderSave(){
  var mobail=$('#mobail_sabtOrder').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabtOrderSave',
    data: {
          namePro:$('#namePro_sabtOrder').val(),
          squad:$('#squad_sabtOrder').val(),
          vahedPro:$('#vahed_sabtOrder').val(),
          numPro:$('#num_sabtOrder').val(),
          dis:$('#dis_sabtOrder').val(),
          mobail:mobail,
          ostan:$('#ostan_sabtOrder').val(),
          city:$('#city_sabtOrder').val(),
          amniat:$('#amniat_sabtOrder').val(),
         },
    success:function(data){
      $('#ajax_sabtOrder').empty();
      $('#form_sabtOrder').trigger('reset');
      $('.idOrder').html(data);
      $('#end_sabtOrder').modal('show');
      $("#end_sabtOrder").on('hide.bs.modal', function () {
      window.location.href  = "/";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('.form_sabtOrder');
        $('#ajax_sabtOrder').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_sabtOrder').val('');
         if(error['namePro']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['namePro']+'</div>');
           $('#name_sabtOrder2').css("border-color" , "#c30909");
        }
        else if(error['squad']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['squad']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['vahedPro']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['vahedPro']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['numPro']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['numPro']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['dis']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['dis']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['ostan']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['ostan']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['city']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_sabtOrder').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {

           $('#ajax_sabtOrder').modal('show');
        }}});}
function mobailSearchOrder() {
  var mobail=$('#mobail_searchOrder').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../mobailSearchOrder',
    data: {
          mobail:mobail,
         },
    success:function(data){
      $('#ajax_searchOrder').empty();
      $('#pro_searchOrder').html(data);
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;

         if(error['mobail']){
           $('#ajax_searchOrder').html('<div id="alarm_red">'+error['mobail']+'</div>');

        }
      else if(error['no_mobail']){
          $('#ajax_searchOrder').html('<div id="alarm_red">'+error['no_mobail']+'</div>');

       }
           // $('#error_mobailOrder').modal('show');
        }});
}
function searchOrderSave() {
  var mobail=$('#mobail_searchOrder').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../searchOrderSave',
    data: {
          mobail:mobail,
          id:$('#pro_searchOrder').val(),
          amniat:$('#amniat_searchOrder').val(),
         },
    success:function(data){
      window.location.href ="/showOrder/" + data;
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        captcha();
         if(error['mobail']){
           $('#ajax_searchOrder').html('<div id="alarm_red">'+error['mobail']+'</div>');
        }
        else if(error['id_pro']){
          $('#ajax_searchOrder').html('<div id="alarm_red">لطفا نام محصول را انتخاب کنید .</div>');

        }
        else if (error['amniat']) {

          $('#ajax_searchOrder').html('<div id="alarm_red">'+error['amniat']+'</div>');
        }

        }});
}
