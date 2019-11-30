function b_img_pro(class1){
  $('.big_img_pro').removeClass('active_img_pro');
  $('.'+class1).addClass('active_img_pro');
}

function Explain_active(class1 , class2){
  $('.Explain_ul li').removeClass('Explain_active');
  $('.'+class1).addClass('Explain_active');
  if (class2 == '.Explain_Explain') {
    $('.showExplain').css('display' , 'none');
    $('.showExplain_line').css('display' , 'none');
    $('.Explain_specs').css('display' , 'block');
    $('.Explain_question').css('display' , 'block');
    $('.Explain_specs_line').css('display' , 'block');
    $('.Explain_question_line').css('display' , 'block');
  }else{
    $('.showExplain').css('display' , 'block');
    $('.showExplain_line').css('display' , 'block');
    var divData=$(class2).html();
    $('.showExplain').html(divData);
    $('.Explain_specs').css('display' , 'block');
    $('.Explain_question').css('display' , 'block');
    $('.Explain_specs_line').css('display' , 'block');
    $('.Explain_question_line').css('display' , 'block');
    $(class2).css('display' , 'none')
    $(class2 + '_line').css('display' , 'none')
  }
}
  //نمایش فرم نظر دادن
 function nazar_pro(){
   var h= $('.ersal_nazar_pro').offset();
   var fixedDiv= $('.fixed').outerHeight();
   var hTop=h.top-fixedDiv-12;
   window.scrollTo(0 ,hTop);
 }


 function sabt_nazar_pro(id,name) {
   var mobail=$('#mobail_pro_nazar').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_nazar_pro',
     data: {
          pro_id: id ,
          name:$('#name_pro_nazar').val(),
          mobail:mobail,
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
   var mobail=$('#mobail_pro_questions').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_question_pro',
     data: {
          pro_id: id ,
          name:$('#name_pro_questions').val(),
          mobail:mobail,
          email:$('#email_pro_questions').val(),
          question:$('#question_pro_questions').val(),
          amniat:$('#amniat_pro_questions').val(),
          },
     success:function(data){
       $('#question_pro').empty();
       document.getElementById("form_question_pro").reset();
       $('#end_question_pro').modal('show');
       $("#end_question_pro").on('hide.bs.modal', function () {
       window.location.href  = "/product/" + id + "/" + name;
     });
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('form_question_pro');
         $('#question_pro').empty();
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#question_pro').append('<div id="alarm_red">'+error['name']+'</div>');
            $('#name_data_buyer').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#question_pro').append('<div id="alarm_red">'+error['mobail']+'</div>');
         }else if(error['email']){
            $('#question_pro').append('<div id="alarm_red">'+error['email']+'</div>');
            $('#codepost_data_buyer').css("border-color" , "#c30909");
         }else if(error['question']){
            $('#question_pro').append('<div id="alarm_red">'+error['question']+'</div>');
            $('#address_data_buyer').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#question_pro').append('<div id="alarm_red">'+error['amniat']+'</div>');
            $('#amniat_data_buyer').css("border-color" , "#c30909");
         }
     }
   });
 }
 //ذخیره آی دی سوال جهت ثبت پاسخ
 function question_id(id) {
   $.cookie("question", id);
 }
 function sabt_answer_pro(id,name) {
   var mobail=$('#mobail_pro_answer').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_answer_pro',
     data: {
          question_id:$.cookie("question"),
          pro_id: id ,
          name:$('#name_pro_answer').val(),
          mobail:mobail,
          email:$('#email_pro_answer').val(),
          answer:$('#answer_pro_answer').val(),
          amniat:$('#amniat_pro_answer').val(),
          },
     success:function(data){
       $('#alarm_pro_answer').empty();
       document.getElementById("form_answer_pro").reset();
       $('#pro_question_answer').modal('hide');
       $('#end_answer_pro').modal('show');
       $("#end_answer_pro").on('hide.bs.modal', function () {
         $.removeCookie("question");
         window.location.href  = "/product/" + id + "/" + name;
     });
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('form_nazar_pro');
         $('#alarm_pro_answer').empty();
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#alarm_pro_answer').append('<div id="alarm_red">'+error['name']+'</div>');
            $('#name_data_buyer').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#alarm_pro_answer').append('<div id="alarm_red">'+error['mobail']+'</div>');
         }else if(error['email']){
            $('#alarm_pro_answer').append('<div id="alarm_red">'+error['email']+'</div>');
            $('#codepost_data_buyer').css("border-color" , "#c30909");
         }else if(error['answer']){
            $('#alarm_pro_answer').append('<div id="alarm_red">'+error['answer']+'</div>');
            $('#address_data_buyer').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#alarm_pro_answer').append('<div id="alarm_red">'+error['amniat']+'</div>');
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
