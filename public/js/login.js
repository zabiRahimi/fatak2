function register(){
  var mobail=$('#mobail_register').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../register',
    data: {
          name:$('#name_register').val(),
          karbary:$('#karbary_register').val(),
          pas:$('#pas_register').val(),
          mobail:mobail,
          email:$('#email_register').val(),
          amniat:$('#amniat_register').val(),
         },
    success:function(data){
      $('#ajax_register').empty();
      $('#form_register').trigger('reset');//پاک کردن فرم
      $('#modal_h_sabtname').modal('hide');
      $('#end_register').modal('show');
    },
    error: function(xhr) {

        var errors = xhr.responseJSON;

        var error=errors.errors;
        $('.modal').scrollTop(0);
        $('#ajax_register').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_register').val('');
         if(error['name']){
           $('#ajax_register').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['karbary']){
           $('#ajax_register').append('<div id="alarm_red">'+error['karbary']+'</div>');
           $('#tel_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_register').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_register').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
           $('#ajax_register').append('<div id="alarm_red">'+error['email']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_register').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {
           $('#ajax_register').modal('show');
        }
    }
  });
}

function login_user(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../login_user',
    data: {
         karbary:$('#karbary_login_user').val(),
         pas:$('#pas_login_user').val(),
         amniat:$('#amniat_login_user').val(),
         },
    success:function(data){
      $('#ajax_login_user').empty();
      $('#form_h_login_pro').trigger('reset');//پاک کردن فرم
      $('#modal_h_login').modal('hide');
      $('#ok_login').modal('show');
      $("#ok_login").on('hide.bs.modal', function () {
      window.location.href  = "/";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        $('.modal').scrollTop(0);
        $('#ajax_login_user').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_login_user').val('');
         if(error['karbary']){
           $('#ajax_login_user').append('<div id="alarm_red">'+error['karbary']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }else if(error['pas']){
           $('#ajax_login_user').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#mobail_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_login_user').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['no_karbar']){
           $('#ajax_login_user').append('<div id="alarm_red">'+error['no_karbar']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }}});}
function edit_register(id){
  var mobail=$('#mobail_register').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../edit_register',
    data: {
        id:id,
         name:$('#name_register').val(),
         karbary:$('#karbary_register').val(),
         mobail:mobail,
         email:$('#email_register').val(),
         },
    success:function(data){
      $('#ajax_edit_register').empty();
      $('#ok_edit_user').modal('show');
      $("#ok_edit_user").on('hide.bs.modal', function () {
      window.location.href  = "/dashboard_user";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        $('#ajax_edit_register').empty();
        $('.form-control').css("border-color" , "#fff");
         if(error['name']){
           $('#ajax_edit_register').append('<div id="alarm_red">'+error['name']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['karbary']){
           $('#ajax_edit_register').append('<div id="alarm_red">'+error['karbary']+'</div>');
           $('#tel_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_edit_register').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
           $('#ajax_edit_register').append('<div id="alarm_red">'+error['email']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }}});}
// این دستور الزامی است . جهت پاک کردن فرمهای ورود ، فراموشی رمز و فرم ثبت نام هنگام خروج از مودال
  $(".modal").on('hide.bs.modal', function () {
    $('.form_h_login_pro').trigger('reset');// del form
    $('#form_register').trigger('reset');// del form
  });
