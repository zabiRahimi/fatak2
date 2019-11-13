$(document).ready(function(){
  $('.loader').hide();//مروط لوگوی انتظار که در حالت عادی غیر فعال است .
  // //لوگوی انتظار
  // var w_doc =  $(document).width();
  // var left_doc =( w_doc - 250)/2;
  // $('.gif_loding').css("left", left_doc + "px");
  // $(window).resize(function(){
  //   var w_doc2 =  $(document).width();
  //   var left_doc2 =( w_doc2 - 250)/2;
  //   $('.gif_loding').css("left", left_doc2 + "px");});
    //ثبت بازدید شبکه اجتماعی
    var ch=$('.getid').html();
    if(ch){$('#modal_bazdidCh').modal('show');}
});//end ready
function spinner() {
  $.ajax({
    beforeSend: function() {
      $('option').hide();//جهت پنهان شدن موقتی آپشنهای تگ سلکت
      var height=$('.setSpinner').innerHeight();//جهت نماد انتظار
      var height2=window.innerHeight;//جهت نماد انتظار
      var hScroll= $(window).scrollTop();
      $('.opacityAll').css('height',height);//جهت نماد انتظار
      $('.spinnerAll').css('top',height2/2 + hScroll);//جهت نماد انتظار
      $('.loaderAll').show();

    },
    complete: function(){
       $('.loaderAll').hide();
       $('option').show();

    },
  })

}
/*
**نمایش نماد انتظار هنگامی که در خواست ایجگس داریم
*/
// function showSpinnerAjax(fatheAjax ,loaderClass,opacityClass,spinnerclass){
//   // alert(loaderClass)
//   $.ajaxSetup({
//     beforeSend: function() {
//       alert(loaderClass)
//       var height=$('.'+fatheclass).innerHeight();//جهت نماد انتظار
//       var height2=$('.'+spinnerclass).innerHeight();//جهت نماد انتظار
//       $('.'+opacityClass).css('height',height);//جهت نماد انتظار
//       $('.'+spinnerclass).css('margin-top',height/2-height2/2);//جهت نماد انتظار
//       $('.'+loaderClass).show();
//     },
//     complete: function(){
//        $('.'+loaderClass).hide();
//     },
//     success: function() {}
//   });
// }


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
      $('#modal_bazdidCh').modal('hide');
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
      $(".captcha4").html(data);
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
  var mobail=$('#mobail_shekait').val();
  var check =/^[0-9]{10}$/;
  if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'/sabt_shekait',
    data: {
         name:$('#name_shekait').val(),
         mobail:mobail,
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
// تابع فرمت کردن اعداد
function number_format(number, decimals, decPoint, thousandsSep) {
   decimals = Math.abs(decimals) || 0;
   number = parseFloat(number);

    if (!decPoint || !thousandsSep) {
        decPoint = '.';
        thousandsSep = ',';
    }

    var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
    var numbersString = decimals ? (roundedNumber.slice(0, decimals * -1) || 0) : roundedNumber;
    var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
    var formattedNumber = "";

    while (numbersString.length > 3) {
        formattedNumber += thousandsSep + numbersString.slice(-3)
        numbersString = numbersString.slice(0, -3);
    }

    if (decimals && decimalsString.length === 1) {
        while (decimalsString.length < decimals) {
            decimalsString = decimalsString + decimalsString;
        }
    }

    return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
}
