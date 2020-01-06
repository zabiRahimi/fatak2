function b_img_pro(class1){
  $('.big_img_pro').removeClass('active_img_pro');
  $(class1).addClass('active_img_pro');
}

function Explain_active(class1 , class2){
  $('.Explain_ul li').removeClass('Explain_active');
  $('.'+class1).addClass('Explain_active');
  if (class2 == '.Explain_Explain') {
    $('.showExplain').css('display' , 'none');
    $('.showExplain_line').css('display' , 'none');
    $('.Explain_specs').css('display' , 'block');
    $('.Explain_question').css('display' , 'block');
    $('.Explain_nazar').css('display' , 'block');
    $('.Explain_specs_line').css('display' , 'block');
    $('.Explain_question_line').css('display' , 'block');
    $('.Explain_nazar_line').css('display' , 'block');
  }else{
    $('.showExplain').css('display' , 'block');
    $('.showExplain_line').css('display' , 'block');
    const divData=$(class2).html();
    $('.showExplain').html(divData);
    $('.Explain_specs').css('display' , 'block');
    $('.Explain_question').css('display' , 'block');
    $('.Explain_nazar').css('display' , 'block');
    $('.Explain_specs_line').css('display' , 'block');
    $('.Explain_question_line').css('display' , 'block');
    $('.Explain_nazar_line').css('display' , 'block');
    $(class2).css('display' , 'none')
    $(`${class2}_line`).css('display' , 'none')
  }
}
 function sabtNazarStock(pro_id,name) {
   let mobail=$('#mobailNazarStock').val();const check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabtNazarStock',
     data: {
          pro_id ,
          name:$('#nameNazarStock').val(),
          mobail,
          email:$('#emailNazarStock').val(),
          nazar:$('#nazarNazarStock').val(),
          amniat:$('#amniatNazarStock').val(),
          },
     success:function(data){
       $('#formNazarAjaxStock').empty();
       $('#formNazarStock').trigger('reset');//del form
       Swal.fire({
            html:`<div class="alert alert-success alertClass">  ممنون !! نظر شما ثبت شد  </div>`,
            type:'success',
            showCloseButton: true,
            confirmButtonText:"متوجه شدم !!" ,
            confirmButtonColor:'#0d6394',
            customClass: {
            // container: 'containerClass',  header: 'header-class', title: 'title-class',image: 'image-class',
            popup: 'popupClass',
            icon: 'iconClass',
            content:'contentClass',
            confirmButton: 'confirmButtonClass',
            cancelButton: 'cancelButtonClass',
            actions: 'actionsClass',
                        }
       }).then(() => { window.location.href  = `/product/${pro_id}/${name}`;});//end swal

     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('.formNazarStock');
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#formNazarAjaxStock').html(`<div class="alert alert-danger">${error['name']}</div>`);
            $('#nameNazarStock').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#formNazarAjaxStock').html(`<div class="alert alert-danger">${error['mobail']}</div>`);
            $('#mobailNazarStock').css("border-color" , "#c30909");

         }else if(error['email']){
            $('#formNazarAjaxStock').html(`<div class="alert alert-danger">${error['email']}</div>`);
            $('#emailNazarStock').css("border-color" , "#c30909");
         }else if(error['nazar']){
            $('#formNazarAjaxStock').html(`<div class="alert alert-danger">${error['nazar']}</div>`);
            $('#nazarNazarStock').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#formNazarAjaxStock').html(`<div class="alert alert-danger">${error['amniat']}</div>`);
            $('#amniatNazarStock').css("border-color" , "#c30909");
         }
     }
   });
 }
 function sabtQuestionStock(pro_id,name) {
   let mobail=$('#mobailQuestionsStock').val();const check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabtQuestionStock',
     data: {
          pro_id ,
          name:$('#nameQuestionsStock').val(),
          mobail,
          email:$('#emailQuestionsStock').val(),
          question:$('#questionQuestionsStock').val(),
          amniat:$('#amniatQuestionsStock').val(),
          },
     success:function(data){
       $('#formQuestionAjaxStock').empty();
       $('#formQuestionStock').trigger('reset');//del form
       $('#form_sabtOrder').trigger('reset');
       Swal.fire({
            html:`<div class="alert alert-success alertClass" > ممنون !! پرسش شما ثبت شد . </div>`,
            type:'success',
            showCloseButton: true,
            confirmButtonText:"متوجه شدم !!" ,
            confirmButtonColor:'#0d6394',
            customClass: {
            // container: 'containerClass',  header: 'header-class', title: 'title-class',image: 'image-class',
            popup: 'popupClass',
            icon: 'iconClass',
            content:'contentClass',
            confirmButton: 'confirmButtonClass',
            cancelButton: 'cancelButtonClass',
            actions: 'actionsClass',
                        }
       }).then(() => { window.location.href  = `/product/${pro_id}/${name}`;});//end swal
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
         scroll_form('.formQuestionStock');
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#formQuestionAjaxStock').html(`<div class="alert alert-danger">${error['name']}</div>`);
            $('#nameQuestionsStock').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#formQuestionAjaxStock').html(`<div class="alert alert-danger">${error['mobail']}</div>`);
            $('#mobailQuestionsStock').css("border-color" , "#c30909");
         }else if(error['email']){
            $('#formQuestionAjaxStock').html(`<div class="alert alert-danger">${error['email']}</div>`);
            $('#emailQuestionsStock').css("border-color" , "#c30909");
         }else if(error['question']){
            $('#formQuestionAjaxStock').html(`<div class="alert alert-danger">${error['question']}</div>`);
            $('#questionQuestionsStock').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#formQuestionAjaxStock').html(`<div class="alert alert-danger">${error['amniat']}</div>`);
            $('#amniatQuestionsStock').css("border-color" , "#c30909");
         }
     }
   });
 }
 //ذخیره آی دی سوال جهت ثبت پاسخ
 function question_id(id) {
   $.cookie("question", id);
 }
 // ثبت پاسخ به سوال در محصول ثابت
 function sabtAnswerStock(pro_id,name) {
   let mobail=$('#mobailAnswerStock').val();const check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'post',
     url:'/sabt_answer_pro',
     data: {
          question_id:$.cookie("question"),
          pro_id ,
          name:$('#nameAnswerStock').val(),
          mobail,
          email:$('#emailAnswerStock').val(),
          answer:$('#answerAnswerStock').val(),
          amniat:$('#amniatAnswerStock').val(),
          },
     success:function(data){
       $('#formAnswerAjaxStock').empty();
       $('#formAnswerStock').trigger('reset');//del form
       $('#modalAnswerStock').modal('hide');
       Swal.fire({
            html:'<div class="alert alert-success alertClass" >ممنون !! پاسخ شما ثبت شد . </div>',
            type:'success',
            showCloseButton: true,
            confirmButtonText:"متوجه شدم !!" ,
            confirmButtonColor:'#0d6394',
            customClass: {
            // container: 'containerClass',  header: 'header-class', title: 'title-class',image: 'image-class',
            popup: 'popupClass',
            icon: 'iconClass',
            content:'contentClass',
            confirmButton: 'confirmButtonClass',
            cancelButton: 'cancelButtonClass',
            actions: 'actionsClass',
                        }
       }).then(() => { $.removeCookie("question"); window.location.href  = `/product/${pro_id}/${name}`;});//end swal
     },
     error: function(xhr) {
         var errors = xhr.responseJSON;
         var error=errors.errors;
          $('#modalAnswerStock').scrollTop(0);
         $('.form-control').css("border-color" , "#fff");
         captcha();
          if(error['name']){
            $('#formAnswerAjaxStock').html(`<div class="alert alert-danger">${error['name']}</div>`);
            $('#nameAnswerStock').css("border-color" , "#c30909");
         }else if(error['mobail']){
            $('#formAnswerAjaxStock').html(`<div class="alert alert-danger">${error['mobail']}</div>`);
            $('#mobailAnswerStock').css("border-color" , "#c30909");
         }else if(error['email']){
            $('#formAnswerAjaxStock').html(`<div class="alert alert-danger">${error['email']}</div>`);
            $('#emailAnswerStock').css("border-color" , "#c30909");
         }else if(error['answer']){
            $('#formAnswerAjaxStock').html(`<div class="alert alert-danger">${error['answer']}</div>`);
            $('#answerAnswerStock').css("border-color" , "#c30909");
         }else if(error['amniat']){
            $('#formAnswerAjaxStock').html(`<div class="alert alert-danger">${error['amniat']}</div>`);
            $('#amniatAnswerStock').css("border-color" , "#c30909");
         }
     }
   });
 }
// دستور زیر الزانی است . جهت پاک کردن محتوای فرم هنگامی که از مودال خارج می شویم
 $("#modalAnswerStock").on('hide.bs.modal', function () {
   $('#formAnswerStock').trigger('reset');//del form
   $('#formAnswerAjaxStock').html('');
   $('.form-control').css("border-color" , "#fff");
});
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
       Swal.fire({
            html:'<div class="alert alert-success alertClass" >محصول با موفقیت به سبد خرید اضافه شد !!</div>',
            type:'success',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText:"مشاهده سبد خرید" ,
            cancelButtonText:"خرید محصول دیگر" ,
            cancelButtonColor:'#0d6394',
            customClass: {
            // container: 'containerClass',  header: 'header-class', title: 'title-class',image: 'image-class',
            popup: 'popupClass',
            closeButton: 'closeButtonClass',
            icon: 'iconClass',
            content:'contentClass',
            confirmButton: 'confirmButtonClass',
            cancelButton: 'cancelButtonClass',
            actions: 'actionsClass',
            footer:'footerClass',
                        }
       }).then((result) => {if (result.value) { window.location.href=`/show_sabad_pro`;}});//end swal
     },
     error:function(){}
   });
}
