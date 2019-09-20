
// نمایش و عدم نمایش فرمهای ورود و ثبت نام
function show_form_shop_log(clases) {
  $('.shop_sabt_log_log').css('display', 'block');
   $('.shop_sabt_log_log2' ).css('display', 'none');
   $('.shop_ghanon_society_log3').css('display', 'none');
  $('.'+clases).css('display', 'block');
}
function div_active(class1){
  $('.orderDivH').removeClass('orderDivSh');
  $('#sProSUnStock').val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
  $('#sIdSUnStock').val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
  $('#ajax_searchProSUnStock').html('');
  $('.'+class1).addClass('orderDivSh');
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
           $('#ajax_shopsabt1').append('<div class="alert alert-danger">'+error['seller']+'</div>');
           $('#name_shopsabt12').css("border-color" , "#c30909");
        }
        else if(error['mobail']){
           $('#ajax_shopsabt1').append('<div class="alert alert-danger">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_shopsabt1').append('<div class="alert alert-danger">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_shopsabt1').append('<div class="alert alert-danger">'+error['amniat']+'</div>');
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
           $('#ajax_shoplog').append('<div class="alert alert-danger">'+error['mobail']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pas']){
           $('#ajax_shoplog').append('<div class="alert alert-danger">'+error['pas']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['amniat']){
           $('#ajax_shoplog').append('<div class="alert alert-danger">'+error['amniat']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['no_karbar']){
           $('#ajax_shoplog').append('<div class="alert alert-danger">'+error['no_karbar']+'</div>');
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
          $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['shop']+'<br>'+'نامی برای فروشگاه مجازی خود انتخاب کنید .'+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['codemly']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['codemly']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['ostan']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['tel']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['tel']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['email']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['email']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+error['bank']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['allowGhanon']){
           $('#ajax_perfectDaSh').append('<div class="alert alert-danger">'+'گزینه "قوانین را خوانده و می پذیرم" را انتخاب کنید . '+'</div>');
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
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['shop']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['seller']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['seller']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codemly']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['codemly']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
         else if(error['mobail']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['mobail']+'</div>');
           $('#name_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['tel']){
          $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['tel']+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['email']){
          $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['email']+'</div>');
          $('#name_data_buyer').css("border-color" , "#c30909");
       }
        else if(error['ostan']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['ostan']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['city']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['city']+'</div>');
           $('#address_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['address']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['address']+'</div>');
           $('#email_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['codepost']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['codepost']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['accountNumber']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['accountNumber']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['cart']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['cart']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['master']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['master']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['bank']){
           $('#ajax_editDaShop').append('<div class="alert alert-danger">'+error['bank']+'</div>');
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
           $('#ajax_editPasDaShop').append('<div class="alert alert-danger">'+error['pasOld']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }
        else if(error['pasNew']){
           $('#ajax_editPasDaShop').append('<div class="alert alert-danger">'+error['pasNew']+'</div>');
           $('#codepost_data_buyer').css("border-color" , "#c30909");
        }

        else if(error['no_pas']){
           $('#ajax_editPasDaShop').append('<div class="alert alert-danger">'+error['no_pas']+'</div>');
           $('#amniat_data_buyer').css("border-color" , "#c30909");
        }  }  });}

  // newOrderShopOne.php
  Dropzone.options.proAddImg1 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      //آرگومان اول یک شی است
      //آرکومان دوم مقدار بازگشتی از کنترلر است
      $("#imgAddPro1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg1_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');
      $("#Aimg1_orderSabtSh").html( response );
    },}
  Dropzone.options.proAddImg2 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg2_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg2_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg3 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg3_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg3_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg4 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg4_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg4_orderSabtSh").html( response );
  },}
  Dropzone.options.proAddImg5 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
      $("#Iimg5_orderSabtSh").html('<i class="fas fa-check Icheck"></i>');

      $("#Aimg5_orderSabtSh").html( response );
    },  }
  Dropzone.options.proAddImg6 = {
     parallelUploads: 2,
     acceptedFiles:".png , .jpg , .jpeg",
     maxFilesize: 3,
    error:function(){
      $("#imgAddPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
    },
    success:function(file , response){
      $("#imgAddPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
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
        $("#"+ ajax).html('<div class="alert alert-danger"> عکس حذف شد . </div>');
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
                dimension:$('input[type=radio][name=dimension_orderSabtSh]:checked').val(),
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
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['stamp']+'</div>');
              }
              else if(error['namePro']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['namePro']+'</div>');
              }
              else if(error['price']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['price']+'</div>');
              }
              else if(error['vahed']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['vahed']+'</div>');
              }
              else if(error['dimension']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['dimension']+'</div>');
              }
              else if(error['vazn']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['vazn']+'</div>');
              }
              else if(error['vaznPost']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['vaznPost']+'</div>');
              }
              else if(error['pakat']){
                 $('#ajax_orderSabtSh').append('<div class="alert alert-danger">'+error['pakat']+'</div>');
              }
             }  });
      }

// oldOrderShopOne.php
Dropzone.options.proEditImg1 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
   error:function(){
    $("#imgEditPro1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است
    $("#imgEditPro1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg1_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg1_orderEditSh").html( response );
  },}
Dropzone.options.proEditImg2 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg2_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg2_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg3 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg3_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg3_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg4 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg4_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg4_orderEditSh").html( response );
},}
Dropzone.options.proEditImg5 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg5_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg5_orderEditSh").html( response );
  },  }
Dropzone.options.proEditImg6 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgEditPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgEditPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg6_orderEditSh").html('<i class="fas fa-check Icheck"></i>');
    $("#Aimg6_orderEditSh").html( response );
  },  }
  function editProShopUnStock(pro_id,order_id,img_id,stamp,namePro,maker,brand,model,price,priceFOrder,vahed,num,vazn,dimension,vaznPost,pakat,dis,disSeller,dateMake,dateExpiration,term,img1,img2,img3,img4,img5,img6,idAjax,classForm,url,newPro) {
            //هنگام استفاده از این تابع برای محصولاتی که قرار است برای اولین بار به عنوان پشنهاد محصول به مشتری ارائه شود باید مقدار پارامتر newPro  1 قرار داده شود .
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
              type:'post',
              url:'../../editProShopUnStock',
              data: {
                    pro_id:pro_id,
                    order_id:order_id,
                    img_id:img_id,
                    stamp:$('input[type=radio][name='+stamp+']:checked').val(),
                    namePro:$('#'+namePro).val(),
                    maker:$('#'+maker).val(),
                    brand:$('#'+brand).val(),
                    model:$('#'+model).val(),
                    price:$('#'+price).val(),
                    priceFOrder:$('#'+priceFOrder).val(),
                    vahed:vahed,
                    num:$('#'+num).val(),
                    vazn:$('#'+vazn).val(),
                    dimension:$('input[type=radio][name='+dimension+']:checked').val(),
                    vaznPost:$('#'+vaznPost).val(),
                    pakat:$('#'+pakat).val(),
                    dis:$('#'+dis).val(),
                    disSeller:$('#'+disSeller).val(),
                    dateMake:$('#'+dateMake).val(),
                    dateExpiration:$('#'+dateExpiration).val(),
                    term:$('#'+term).val(),
                    img1:$('#'+img1).html(),
                    img2:$('#'+img2).html(),
                    img3:$('#'+img3).html(),
                    img4:$('#'+img4).html(),
                    img5:$('#'+img5).html(),
                    img6:$('#'+img6).html(),
                    newPro:newPro,
                   },
              success:function(){
                $('#'+idAjax).empty();
                // document.getElementById("form_orderEditSh").reset();
                $('#end_orderSabtSh').modal('show');
                $("#end_orderSabtSh").on('hide.bs.modal', function () {
                  if (newPro==1) {
                    window.location.href  = "/"+url+"/"+order_id;
                  } else {
                    window.location.href  = "/"+url+"/"+order_id+"/"+pro_id;
                  }
                });
              },
              error: function(xhr) {
                  var errors = xhr.responseJSON;
                  var error=errors.errors;
                  $('#'+idAjax).empty();
                  scroll_form(classForm);
                  if(error['checkPro']){
                     $('#'+idAjax).html('<div class="alert alert-danger">شما این محصول را قبلا به این مشتری پیشنهاد داده اید .</div>');
                  }
                  else if(error['stamp']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['stamp']+'</div>');
                  }
                  else if(error['namePro']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['namePro']+'</div>');
                  }
                  else if(error['price']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['price']+'</div>');
                  }
                  else if(error['vahed']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['vahed']+'</div>');
                  }
                  else if(error['vazn']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['vazn']+'</div>');
                  }
                  else if(error['vaznPost']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['vaznPost']+'</div>');
                  }
                  else if(error['pakat']){
                     $('#'+idAjax).html('<div class="alert alert-danger">'+error['pakat']+'</div>');
                  }
                 }  });
          }
  function buyOnePrintSh(content) {
    var contents = $("#"+content).html();
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({ "position": "absolute", "top": "-1000000px" });
    $("body").append(frame1);
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    frameDoc.document.open();
    //Create a new HTML document.
    frameDoc.document.write('<html><head>');
    frameDoc.document.write('</head><body>');
    //Append the external CSS file.
    frameDoc.document.write('<link href="/css/buyProShopOnePrint.css" rel="stylesheet" type="text/css" />');
    //Append the DIV contents.
    frameDoc.document.write(contents);
    frameDoc.document.write('</body></html>');
    frameDoc.document.close();
    setTimeout(function () {
        window.frames["frame1"].focus();
        window.frames["frame1"].print();
        frame1.remove();
    }, 500);
  }
  function sabtCodeSh() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
              type:'post',
              url:'../../sabtCodeSh',
              data: {
                    codePro:$('#code_sabtCodePSh').val(),
                   },
              success:function(data){
                $('#ajax_sabtCodePSh').empty();
                window.location.href  = "/sabtErsalShop/"+data;
              },
              error: function(xhr) {
                // window.location.href  = "/sabtErsalShop";

                  var errors = xhr.responseJSON;
                  var error=errors.errors;
                  scroll_form('form_sabtCodePSh');
                  $('#ajax_error_sabtCodePSh').empty();

                  if(error['codePro']){
                     $('#ajax_error_sabtCodePSh').append('<div class="alert alert-danger">'+error['codePro']+'</div>');

                  }
                  $('#error_sabtCodePSh').modal('show');
                  $("#error_sabtCodePSh").on('hide.bs.modal', function () {
                  window.location.href  = "/sabtErsalShop";
                  });

                 }  });
          }

  function sabtCodeRahgirySh(id) {
                    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                    $.ajax({
                      type:'post',
                      url:'../../sabtCodeRahgirySh',
                      data: {
                            id:id,
                            codeRahgiry:$('#codeR_sabtCodePSh').val(),
                           },
                      success:function(data){
                        $('#ajax_sabtCodeRahgirySh').empty();
                        $('#end_sabtCodeRahgirySh').modal('show');
                        $("#end_sabtCodeRahgirySh").on('hide.bs.modal', function () {
                        window.location.href  = "/sabtErsalShop";
                        });
                      },
                      error: function(xhr) {
                          var errors = xhr.responseJSON;
                          var error=errors.errors;
                          scroll_form('form_sabtCodeRahgirySh');
                          $('#ajax_sabtCodeRahgirySh').empty();
                          $('#codeR_sabtCodePSh').val('');
                          if(error['codeRahgiry']){
                             $('#ajax_sabtCodeRahgirySh').append('<div class="alert alert-danger">'+error['codeRahgiry']+'</div>');

                          }}  });
                  }
function editCodeSh() {
                      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                      $.ajax({
                      type:'post',
                      url:'../../editCodeSh',
                      data: {
                              codePro:$('#code_editCodePSh').val(),
                           },
                      success:function(data){
                                $('#ajax_sabtCodePSh').empty();
                                window.location.href  = "/editErsalShop/"+data;
                              },
                      error: function(xhr) {
                                  var errors = xhr.responseJSON;
                                  var error=errors.errors;
                                  scroll_form('form_editCodePSh');
                                  $('#ajax_error_editCodePSh').empty();
                                  if(error['codePro']){
                                     $('#ajax_error_editCodePSh').append('<div class="alert alert-danger">'+error['codePro']+'</div>');
                                  }
                                  $('#error_editCodePSh').modal('show');
                                  $("#error_editCodePSh").on('hide.bs.modal', function () {
                                  window.location.href  = "/editErsalShop";
                                  });
                                 }  });
                          }
function editCodeRahgirySh(id) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
            type:'post',
            url:'../../editCodeRahgirySh',
            data: {
            id:id,
            codeRahgiry:$('#codeR_editCodePSh').val(),
                 },
            success:function(data){
                    $('#ajax_editCodeRahgirySh').empty();
                    $('#end_editCodeRahgirySh').modal('show');
                    $("#end_editCodeRahgirySh").on('hide.bs.modal', function () {
                    window.location.href  = "/editErsalShop";
                                          });
                                    },
           error: function(xhr) {
              var errors = xhr.responseJSON;
              var error=errors.errors;
              scroll_form('form_editCodeRahgirySh');
            $('#ajax_editCodeRahgirySh').empty();
            $('#codeR_editCodePSh').val('');
            if(error['codeRahgiry']){
            $('#ajax_editCodeRahgirySh').append('<div class="alert alert-danger">'+error['codeRahgiry']+'</div>');
  }}  });
  }
function SearchPayShop() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
              type:'post',
              url:'../../SearchPayShop',
              data: {
                    codePro:$('#code_payShop').val(),
                   },
              success:function(data){
                $('#ajax_sabtCodePSh').empty();
                window.location.href  = "/payShop/"+data;
              },
              error: function(xhr) {
                // window.location.href  = "/sabtErsalShop";

                  var errors = xhr.responseJSON;
                  var error=errors.errors;

                  $('#ajax_payShop').empty();

                  if(error['codePro']){
                     $('#ajax_payShop').append('<div class="alert alert-danger">'+error['codePro']+'</div>');

                  }
                  // $('#error_sabtCodePSh').modal('show');
                  // $("#error_sabtCodePSh").on('hide.bs.modal', function () {
                  // window.location.href  = "/sabtErsalShop";
                  // });

                 }  });
          }
function searchShop() {
  var day1=$('#searchShopDay1').val();
  //var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#searchShopMonth1').val();//var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#searchShopYear1').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#searchShopDay2').val();//var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#searchShopMont2').val();//var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#searchShopYear2').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}

  var date1=year1+'/'+month1+'/'+day1;
  // var date1='1360/12/03';
  var date2=year2+'/'+month2+'/'+day2;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../searchShop',
    data: {
      date1:date1,
      date2:date2,
         },
    success:function(data){
      // $('#ajax_sabtCodePSh').empty();
      window.location.href  = "/newOrderShop/slicing";
    },
    error: function(xhr) {
      // window.location.href  = "/sabtErsalShop";

        var errors = xhr.responseJSON;
        var error=errors.errors;


       }  });
}
function searchSortDateShop(sortdate) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../searchSortDateShop',
    data: {
      sortdate:sortdate,
         },
    success:function(data){

      // $('#ajax_sabtCodePSh').empty();
      window.location.href  = "/newOrderShop/"+sortdate;
    },
     });
}
function searchAdvancedShop() {
  var day1=$('#day1_searchAdvancedShop').val();var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#month1_searchAdvancedShop').val();var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#year1_searchAdvancedShop').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#day2_searchAdvancedShop').val();var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#month2_searchAdvancedShop').val();var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#year2_searchAdvancedShop').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}
  if (day1&month1&year1){var date1=year1+'-'+month1+'-'+day1;} else {var date1=0;};
  if (day2&month2&year2){var date1=year2+'-'+month2+'-'+day2;} else {var date2=0;};
// let uu=$('#pro_searchAdvancedShop').val();
//   alert(uu)
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../searchAdvancedShop',
    data: {
      ostan:$('#ostan_searchAdvancedShop option:selected').val(),
      city:$('#city_searchAdvancedShop option:selected').val(),
      pro:$('#pro_searchAdvancedShop').val(),
      date1:date1,
      date2:date2,
         },
    success:function(data){

      // $('#ajax_sabtCodePSh').empty();
      window.location.href  = "/newOrderShop";
    },
     });
}
function codeOldOrderShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../codeOldOrderShop',
    data: {
      code:$('#code_oldOrShop').val(),
         },
    success:function(data){
      window.location.href  = "/oldOrderShop";
    },
    error: function(xhr) {

               }
     });
}
function nameOldOrderShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../nameOldOrderShop',
    data: {
      namePro:$('#name_oldOrShop').val(),
         },
    success:function(data){
      window.location.href  = "/oldOrderShop";
    },
    error: function(xhr) {

               }
     });
}
function allOldOrderShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../allOldOrderShop',
    success:function(data){
      window.location.href  = "/oldOrderShop";
    },
  });
 }
function codeBuyProShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../codeBuyProShop',
    data: {
      code:$('#code_buyProShop').val(),
         },
    success:function(data){
      window.location.href  = "/buyProShop";
    },
    error: function(xhr) {

               }
     });
}
function nameBuyProShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../nameBuyProShop',
    data: {
      namePro:$('#name_buyProShop').val(),
         },
    success:function(data){
      window.location.href  = "/buyProShop";
    },
    error: function(xhr) {

               }
     });
}
function allBuyProShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../allBuyProShop',
    success:function(data){
      window.location.href  = "/buyProShop";
    },
  });
}
function SearchNamePayShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchNamePayShop',
    data: {
      namePro:$('#name_payProShop').val(),
         },
    success:function(data){
      window.location.href  = "/payShop";
    },
    error: function(xhr) {

               }
     });
}
function SearchAllNamePayShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchAllNamePayShop',
    success:function(data){
      window.location.href  = "/payShop";
    },
     });
}
function SearchDateSortPayShop() {
  var day1=$('#day1_payShop').val();var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#month1_payShop').val();var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#year1_payShop').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#day2_payShop').val();var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#month2_payShop').val();var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#year2_payShop').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}

  var date1=year1+'-'+month1+'-'+day1;
  var date2=year2+'-'+month2+'-'+day2;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchDateSortPayShop',
    data: {
      date1:date1,
      date2:date2,
         },
    success:function(data){
      // $('#ajax_sabtCodePSh').empty();
      window.location.href  = "/payShop";
    },  });
}
function SearchAllDatePayShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchAllDatePayShop',
    success:function(data){
      window.location.href  = "/payShop";
    },  });
}
function SearchAllDateBackShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchAllDateBackShop',
    success:function(data){
      window.location.href  = "/backErsalShop";
    },  });
}
function SearchNameBackShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchNameBackShop',
    data: {
      namePro:$('#name_backProShop').val(),
         },
    success:function(data){
      window.location.href  = "/backErsalShop";
    },
    error: function(xhr) {

               }
     });
}
function SearchAllNameBackShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchAllNameBackShop',
    success:function(data){
      window.location.href  = "/backErsalShop";
    },
     });
}
function SearchBackShop() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchBackShop',
    data: {
          codePro:$('#code_backShop').val(),
         },
    success:function(data){
      window.location.href  = "/backErsalShop/"+data;
    },
    error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        $('#ajax_backShop').empty();
        if(error['codePro']){
           $('#ajax_backShop').append('<div class="alert alert-danger">'+error['codePro']+'</div>');
        }
        // $('#error_sabtCodePSh').modal('show');
        // $("#error_sabtCodePSh").on('hide.bs.modal', function () {
        // window.location.href  = "/sabtErsalShop";
        // });

       }  });
}
function SearchDateSortBackShop() {
  var day1=$('#day1_backShop').val();var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#month1_backShop').val();var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#year1_backShop').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#day2_backShop').val();var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#month2_backShop').val();var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#year2_backShop').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}

  var date1=year1+'-'+month1+'-'+day1;
  var date2=year2+'-'+month2+'-'+day2;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../SearchDateSortBackShop',
    data: {
      date1:date1,
      date2:date2,
         },
    success:function(data){
      // $('#ajax_sabtCodePSh').empty();
      window.location.href  = "/backErsalShop";
    },  });
}
function searchProSStock() {
  var pro = $('#sProSStock').val();
  if (pro) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../searchProSStock',
      data: {
        pro:pro,
           },
      success:function(data){

         $('#ajax_searchProSStock').html(data);
        // window.location.href  = "/newOrderShop/"+sortdate;
      },
       });
  }
  else{alert('نام محصول را وارد کنید .')}

}
function searchProSUnStock(order_id) {
  var pro = $('#sProSUnStock').val();
  $('#sIdSUnStock').val('');
  $('#ajax_searchProSUnStock').html('');
  if (pro) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../searchProSUnStock',
      data: {
        pro:pro,
        order_id:order_id,
           },
      success:function(data){

         $('#ajax_searchProSUnStock').html(data);
        // window.location.href  = "/newOrderShop/"+sortdate;
      },
       });
  }
  else{alert('نام محصول را وارد کنید .')}

}
function searchIdSUnStock(id,order_id) {
  if (id) {
    var pro_id =id;
  } else {
    var pro_id = $('#sIdSUnStock').val();
    $('#sProSUnStock').val('');
  }
  $('#ajax_searchProSUnStock').html('');
  if (pro_id) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../searchIdSUnStock',
      data: {
        pro_id:pro_id,
        order_id:order_id,
           },
      success:function(data){

         $('#ajax_searchProSUnStock').html(data);
        // window.location.href  = "/newOrderShop/"+sortdate;
      },
       });
  }
  else{alert('کد محصول را وارد کنید .')}

}
Dropzone.options.proPSUSImg1 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
   error:function(){
    $("#imgPSUSPro1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است
    $("#imgPSUSPro1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg1_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg1_orderPSUS").html( response );
  },}
Dropzone.options.proPSUSImg2 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgPSUSPro2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgPSUSPro2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg2_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg2_orderPSUS").html( response );
  },  }
Dropzone.options.proPSUSImg3 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgPSUSPro3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgPSUSPro3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg3_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg3_orderPSUS").html( response );
  },  }
Dropzone.options.proPSUSImg4 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgPSUSPro4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgPSUSPro4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg4_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg4_orderPSUS").html( response );
},}
Dropzone.options.proPSUSImg5 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgPSUSPro5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgPSUSPro5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg5_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg5_orderPSUS").html( response );
  },  }
Dropzone.options.proPSUSImg6 = {
   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){
    $("#imgPSUSPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    $("#imgPSUSPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#Iimg6_orderPSUS").html('<img src="/img_shop/'+ response +'" alt=""style="margin-top: 0;" width="40" height="30">');
    $("#Aimg6_orderPSUS").html( response );
  },  }
