function b_img_pro(class1){
  $('.big_img_pro').removeClass('active_img_pro');
  $('.'+class1).addClass('active_img_pro');
}

function pro7_active(class1 , class2){
  $('.ul_pro7_1 li').removeClass('pro7_active');
  $('.'+class1).addClass('pro7_active');
  $('.show_pro8_0').removeClass('pro8_active');
  $('.'+class2).addClass('pro8_active');
  var h_mavad = $('.mavad_pro').outerHeight();
  var h_term = $('.term_pro').outerHeight();
  var h_bake = $('.bake_pro').outerHeight();
  $('.mavad_pro1').css("line-height",h_mavad +"px");
  $('.term_pro1').css("line-height",h_term +"px");
  $('.bake_pro1').css("line-height",h_bake +"px");
}
  //نمایش فرم نظر دادن
 function nazar_pro(){
   var h= $('.ersal_nazar_pro').offset();
   var fixedDiv= $('.fixed').outerHeight();
   var hTop=h.top-fixedDiv-12;
   window.scrollTo(0 ,hTop);
 }


 function sabt_nazar_pro(id,name) {
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_nazar_pro',
     data: {
          pro_id: id ,
          name:$('#name_pro_nazar').val(),
          mobail:$('#mobail_pro_nazar').val(),
          email:$('#email_pro_nazar').val(),
          nazar:$('#nazar_pro_nazar').val(),
          amniat:$('#amniat_pro_nazar').val(),
          },
     success:function(data){
       $('#alarm_pro_nazar').empty();
       document.getElementById("form_nazar_pro").reset();
       $('#end_nazar_pro').modal('show');
       $("#end_nazar_pro").on('hide.bs.modal', function () {
       window.location.href  = "/product/" + id + "/" + name;
     });
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('form_nazar_pro');
         $('#alarm_pro_nazar').empty();
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['name']+'</div>');
            $('#name_data_buyer').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['mobail']+'</div>');
         }else if(error['email']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['email']+'</div>');
            $('#codepost_data_buyer').css("border-color" , "#c30909");
         }else if(error['nazar']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['nazar']+'</div>');
            $('#address_data_buyer').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['amniat']+'</div>');
            $('#amniat_data_buyer').css("border-color" , "#c30909");
         }
     }
   });
 }
 function sabt_question_pro(id,name) {
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_question_pro',
     data: {
          pro_id: id ,
          name:$('#name_pro_nazar').val(),
          mobail:$('#mobail_pro_nazar').val(),
          email:$('#email_pro_nazar').val(),
          nazar:$('#nazar_pro_nazar').val(),
          amniat:$('#amniat_pro_nazar').val(),
          },
     success:function(data){
       $('#alarm_pro_nazar').empty();
       document.getElementById("form_nazar_pro").reset();
       $('#end_nazar_pro').modal('show');
       $("#end_nazar_pro").on('hide.bs.modal', function () {
       window.location.href  = "/product/" + id + "/" + name;
     });
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('form_nazar_pro');
         $('#alarm_pro_nazar').empty();
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['name']+'</div>');
            $('#name_data_buyer').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['mobail']+'</div>');
         }else if(error['email']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['email']+'</div>');
            $('#codepost_data_buyer').css("border-color" , "#c30909");
         }else if(error['nazar']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['nazar']+'</div>');
            $('#address_data_buyer').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['amniat']+'</div>');
            $('#amniat_data_buyer').css("border-color" , "#c30909");
         }
     }
   });
 }
 function sabt_pasokh(id,name) {
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_pasokh',
     data: {
          pro_id: id ,
          name:$('#name_pro_nazar').val(),
          mobail:$('#mobail_pro_nazar').val(),
          email:$('#email_pro_nazar').val(),
          nazar:$('#nazar_pro_nazar').val(),
          amniat:$('#amniat_pro_nazar').val(),
          },
     success:function(data){
       $('#alarm_pro_nazar').empty();
       document.getElementById("form_nazar_pro").reset();
       $('#end_nazar_pro').modal('show');
       $("#end_nazar_pro").on('hide.bs.modal', function () {
       window.location.href  = "/product/" + id + "/" + name;
     });
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('form_nazar_pro');
         $('#alarm_pro_nazar').empty();
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['name']+'</div>');
            $('#name_data_buyer').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['mobail']+'</div>');
         }else if(error['email']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['email']+'</div>');
            $('#codepost_data_buyer').css("border-color" , "#c30909");
         }else if(error['nazar']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['nazar']+'</div>');
            $('#address_data_buyer').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#alarm_pro_nazar').append('<div id="alarm_red">'+error['amniat']+'</div>');
            $('#amniat_data_buyer').css("border-color" , "#c30909");
         }
     }
   });
 }
// اضافه کردن کالا به سبد خرید
function add_pro_sabad(id){
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'put',
     url:'../../add_pro_sabad',
     data: {
          id: id ,
          },
     success:function(data){
       if(data){
         $('#sabad').html(data);
       }
         $('#pro_add_sabad').modal('show');
     },
     error:function(){alert(56)}
   });
}
