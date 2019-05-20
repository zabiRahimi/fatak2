
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

  // newOrderShopOne.php
  Dropzone.options.proAddImg1 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro1").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      //آرگومان اول یک شی است
      //آرکومان دوم مقدار بازگشتی از کنترلر است
      $("#imgAddPro1").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg1_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');
      $("#Aimg1_orderSabtSh").html( response );
    },}
  Dropzone.options.proAddImg2 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro2").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro2").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg2_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg2_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg3 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro3").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro3").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg3_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg3_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg4 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro4").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro4").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg4_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg4_orderSabtSh").html( response );
  },}
  Dropzone.options.proAddImg5 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro5").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro5").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg5_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg5_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg6 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro6").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro6").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg6_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg6_orderSabtSh").html( response );
    },  }

  function del_img(ajax , div , i) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../del_imgShop',
      data: {

           },
      success:function(){
        $("#"+ ajax).html('<div id="alarm_red"> عکس حذف شد . </div>');
        $("#"+ div).html('');
        $("#"+ i).html( '' );
      },  });}

  function proShop(id) {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $.ajax({
          type:'post',
          url:'../proShop',
          data: {
                id:id,
                stamp:$('input[type=radio][name=stamp_orderSabtSh]:checked').val(),
                namePro:$('#name_orderSabtSh').val(),
                maker:$('#maker_orderSabtSh').val(),
                brand:$('#brand_orderSabtSh').val(),
                model:$('#model_orderSabtSh').val(),
                price:$('#price_orderSabtSh').val(),
                vahed:$('#vahed_orderSabtSh').val(),
                num:$('#num_orderSabtSh').val(),
                vazn:$('#vazn_orderSabtSh').val(),
                vaznPost:$('#vaznPost_orderSabtSh').val(),
                pakat:$('#pakat_orderSabtSh').val(),
                dis:$('#dis_orderSabtSh').val(),
                dateMake:$('#dateMake_orderSabtSh').val(),
                dateExpiration:$('#dateExpiration_orderSabtSh').val(),
                term:$('#term_orderSabtSh').val(),
                img1:$('#Aimg1_orderSabtSh').html(),
                img2:$('#Aimg2_orderSabtSh').html(),
                img3:$('#Aimg3_orderSabtSh').html(),
                img4:$('#Aimg4_orderSabtSh').html(),
                img5:$('#Aimg5_orderSabtSh').html(),
                img6:$('#Aimg6_orderSabtSh').html(),
               },
          success:function(){
            $('#ajax_orderSabtSh').empty();
            document.getElementById("form_orderSabtSh").reset();
            $('#end_orderSabtSh').modal('show');
          },
          error: function(xhr) {
              var errors = xhr.responseJSON;
              var error=errors.errors;
              scroll_form('form_orderSabtSh');
              $('#ajax_orderSabtSh').empty();
              if(error['stamp']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['stamp']+'</div>');
              }
              else if(error['namePro']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['namePro']+'</div>');
              }
              else if(error['price']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['price']+'</div>');
              }
              else if(error['vahed']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['vahed']+'</div>');
              }
              else if(error['vazn']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['vazn']+'</div>');
              }
              else if(error['vaznPost']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['vaznPost']+'</div>');
              }
              else if(error['pakat']){
                 $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['pakat']+'</div>');
              }
             }  });
      }

// oldOrderShopOne.php
Dropzone.options.proEditImg1 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
   error:function(){
    $("#imgEditPro1").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است
    $("#imgEditPro1").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg1_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg1_orderEditSh").html( response );
  },}
Dropzone.options.proEditImg2 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro2").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro2").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg2_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg2_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg3 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro3").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro3").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg3_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg3_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg4 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro4").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro4").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg4_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg4_orderEditSh").html( response );
},}
Dropzone.options.proEditImg5 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro5").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro5").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg5_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg5_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg6 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro6").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro6").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg6_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg6_orderEditSh").html( response );
  },  }
  function editProShop(id,id_img,id_order,id_proShop) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
              type:'post',
              url:'../../editProShop',
              data: {
                    id:id,
                    id_img:id_img,
                    stamp:$('input[type=radio][name=stamp_orderEditSh]:checked').val(),
                    namePro:$('#name_orderEditSh').val(),
                    maker:$('#maker_orderEditSh').val(),
                    brand:$('#brand_orderEditSh').val(),
                    model:$('#model_orderEditSh').val(),
                    price:$('#price_orderEditSh').val(),
                    vahed:$('#vahed_orderEditSh').val(),
                    num:$('#num_orderEditSh').val(),
                    vazn:$('#vazn_orderEditSh').val(),
                    vaznPost:$('#vaznPost_orderEditSh').val(),
                    pakat:$('#pakat_orderEditSh').val(),
                    dis:$('#dis_orderEditSh').val(),
                    dateMake:$('#dateMake_orderEditSh').val(),
                    dateExpiration:$('#dateExpiration_orderEditSh').val(),
                    term:$('#term_orderEditSh').val(),
                    img1:$('#Aimg1_orderEditSh').html(),
                    img2:$('#Aimg2_orderEditSh').html(),
                    img3:$('#Aimg3_orderEditSh').html(),
                    img4:$('#Aimg4_orderEditSh').html(),
                    img5:$('#Aimg5_orderEditSh').html(),
                    img6:$('#Aimg6_orderEditSh').html(),
                   },
              success:function(){
                $('#ajax_orderEditSh').empty();
                document.getElementById("form_orderEditSh").reset();
                $('#end_orderEditSh').modal('show');
                $("#end_orderEditSh").on('hide.bs.modal', function () {
                window.location.href  = "/oldOrderShopOne/"+id_order+"/"+id_proShop;
                });
              },
              error: function(xhr) {
                  var errors = xhr.responseJSON;
                  var error=errors.errors;
                  scroll_form('form_orderEditSh');
                  $('#ajax_orderEditSh').empty();
                  if(error['stamp']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['stamp']+'</div>');
                  }
                  else if(error['namePro']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['namePro']+'</div>');
                  }
                  else if(error['price']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['price']+'</div>');
                  }
                  else if(error['vahed']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['vahed']+'</div>');
                  }
                  else if(error['vazn']){
                     $('#ajax_orderSabtSh').append('<div id="alarm_red">'+error['vazn']+'</div>');
                  }
                  else if(error['vaznPost']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['vaznPost']+'</div>');
                  }
                  else if(error['pakat']){
                     $('#ajax_orderEditSh').append('<div id="alarm_red">'+error['pakat']+'</div>');
                  }
                 }  });
          }
