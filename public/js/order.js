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
      document.getElementById("form_sabtOrder").reset();
      $('.idOrder').html(data);
      $('#end_sabtOrder').modal('show');
      $("#end_sabtOrder").on('hide.bs.modal', function () {
      window.location.href  = "/";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_sabtOrder');
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
