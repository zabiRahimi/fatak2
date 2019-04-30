
// نمایش و عدم نمایش فرمهای ورود و ثبت نام
function show_form_shop_log(clases) {
  $('.shop_sabt_log_log').css('display', 'block');
   $('.shop_sabt_log_log2' ).css('display', 'none');
   $('.shop_ghanon_society_log3').css('display', 'none');
  $('.'+clases).css('display', 'block');
}
// ثبت ابتدایی تامین کننده
function sabtShop_1(){
  var mobail=$('#mobail_shopsabt1').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabtShop_1',
    data: {
          seller:$('#seller_shopsabt1').val(),
          mobail:mobail,
          pas:$('#pas_shopsabt1').val(),
          amniat:$('#amniat_shopsabt1').val(),
         },
    success:function(data){
      $('#ajax_shopsabt1').empty();
      document.getElementById("form_shopsabt1").reset();
      $('#end_shopsabt1').modal('show');
      $("#end_shopsabt1").on('hide.bs.modal', function () {
      window.location.href  = "/pageloginShop";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_shopsabt1');
        $('#ajax_shopsabt1').empty();
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_shopsabt1').val('');
         if(error['seller']){
           $('#ajax_shopsabt1').append('<div id="alarm_red">'+error['seller']+'</div>');
           $('#name_shopsabt12').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_shopsabt1').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_shopsabt1').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_shopsabt1').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {

           $('#ajax_shopsabt1').modal('show');
        }}});}

// لاگین کردن تامین کننده
function loginShop(){
  var mobail=$('#mobail_shoplog').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../loginShop',
    data: {
          mobail:mobail,
          pas:$('#pas_shoplog').val(),
          amniat:$('#amniat_shoplog').val(),
         },
    success:function(data){
      $('#ajax_shoplog').empty();
      document.getElementById("form_shoplog").reset();
      captcha();
      $('#end_shoplog').modal('show');
      $("#end_shoplog").on('hide.bs.modal', function () {
      window.location.href  = "/dashboard_shop";
      });
    },
    error: function(xhr) {
      $('#ok_edit_user').modal('show');
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_shoplog');
        $('#ajax_shoplog').empty();
        $('#amniat_shoplog').val('');
        $('.form-control').css("border-color" , "#fff");
        captcha();
        $('#amniat_shoplog').val('');
        if(error['mobail']){
           $('#ajax_shoplog').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_shoplog').append('<div id="alarm_red">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_shoplog').append('<div id="alarm_red">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['no_karbar']){
           $('#ajax_shoplog').append('<div id="alarm_red">'+error['no_karbar']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {

           $('#ajax_shoplog').modal('show');
        }}});}

// perfect_data.php
function sabtShop_2(){
  var tel=$('#tel_perfectDaSh').val();var check =/^[0-9]{10}$/;if(check.test(tel)){tel = 0 + tel;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../sabtShop_2',
    data: {
          shop:$('#shop_perfectDaSh').val(),
          codemly:$('#codemly_perfectDaSh').val(),
          ostan:$('#ostan_perfectDaSh').val(),
          city:$('#city_perfectDaSh').val(),
          address:$('#address_perfectDaSh').val(),
          codepost:$('#codepost_perfectDaSh').val(),
          tel:tel,
          email:$('#email_perfectDaSh').val(),
          accountNumber:$('#accountNumber_perfectDaSh').val(),
          cart:$('#cart_perfectDaSh').val(),
          master:$('#master_perfectDaSh').val(),
          bank:$('#bank_perfectDaSh').val(),
          allowGhanon:$('#allowGhanon_perfectDaSh:checked').val(),
         },
    success:function(data){
      $('#ajax_perfectDaSh').empty();
      document.getElementById("form_perfectDaSh").reset();
      $('#end_perfectDaSh').modal('show');
      $("#end_perfectDaSh").on('hide.bs.modal', function () {
      window.location.href  = "/editDaShop";
      });
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_perfectDaSh');
        $('#ajax_perfectDaSh').empty();
        $('.form-control').css("border-color" , "#fff");
        if(error['shop']){
          $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['shop']+'<br>'+'نامی برای فروشگاه مجازی خود انتخاب کنید .'+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['codemly']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['codemly']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['ostan']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['tel']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['tel']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['email']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+error['bank']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['allowGhanon']){
           $('#ajax_perfectDaSh').append('<div id="alarm_red">'+'گزینه "قوانین را خوانده و می پذیرم" را انتخاب کنید . '+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else {
           $('#ajax_perfectDaSh').modal('show');
        }}});}
// edit_data.php
function editDaShopSave(id){
  var mobail=$('#mobail_editDaShop').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  var tel=$('#tel_editDaShop').val();var check =/^[0-9]{10}$/;if(check.test(tel)){tel = 0 + tel;}

  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../editDaShopSave',
    data: {
          id:id,
          shop:$('#shop_editDaShop').val(),
          seller:$('#seller_editDaShop').val(),
          codemly:$('#codemly_editDaShop').val(),
          mobail:mobail,
          tel:tel,
          email:$('#email_editDaShop').val(),
          ostan:$('#ostan_editDaShop').val(),
          city:$('#city_editDaShop').val(),
          address:$('#address_editDaShop').val(),
          codepost:$('#codepost_editDaShop').val(),
          accountNumber:$('#accountNumber_editDaShop').val(),
          cart:$('#cart_editDaShop').val(),
          master:$('#master_editDaShop').val(),
          bank:$('#bank_editDaShop').val(),
         },
    success:function(){
      $('#ajax_editDaShop').empty();
      $('#end_editDaShop').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_editDaShop');
        $('#ajax_editDaShop').empty();
        $('.form-control').css("border-color" , "#fff");
        if(error['shop']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['shop']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['seller']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['seller']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codemly']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['codemly']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
         else if(error['mobail']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['mobail']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['tel']){
          $('#ajax_editDaShop').append('<div id="alarm_red">'+error['tel']+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['email']){
          $('#ajax_editDaShop').append('<div id="alarm_red">'+error['email']+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['ostan']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_editDaShop').append('<div id="alarm_red">'+error['bank']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }  }  });}
function editPasDaShop(id){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../editPasDaShop',
    data: {
          id:id,
          pasOld:$('#pasOld_editPasDaShop').val(),
          pasNew:$('#pasNew_editPasDaShop').val(),
         },
    success:function(){
      $('#ajax_editPasDaShop').empty();
      document.getElementById("form_editPasDaShop").reset();
      $('#end_editPasDaShop').modal('show');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        scroll_form('form_editPasDaShop');
        $('#ajax_editPasDaShop').empty();
        $('.form-control').css("border-color" , "#fff");
        if(error['pasOld']){
           $('#ajax_editPasDaShop').append('<div id="alarm_red">'+error['pasOld']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pasNew']){
           $('#ajax_editPasDaShop').append('<div id="alarm_red">'+error['pasNew']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }

        else if(error['no_pas']){
           $('#ajax_editPasDaShop').append('<div id="alarm_red">'+error['no_pas']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }  }  });}
