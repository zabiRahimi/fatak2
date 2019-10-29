
// var height=$('.setSpinner').innerHeight();//جهت نماد انتظار
// alert(height)
// var height2=$('.spinnerAll').innerHeight();//جهت نماد انتظار
// $('.opacityAll').css('height',height);//جهت نماد انتظار
// $('.spinnerAll').css('margin-top',height/2-height2/2);//جهت نماد انتظار
// $.ajax({
//   beforeSend: function() {
//     alert(45)
//      var height=$('.setSpinner').innerHeight();//جهت نماد انتظار
//     var height2=$('.spinnerAll').innerHeight();//جهت نماد انتظار
//      $('.opacityAll').css('height',height);//جهت نماد انتظار
//     $('.spinnerAll').css('margin-top',height/2-height2/2);//جهت نماد انتظار
//     $('.loaderAll').show();
//   },
//   complete: function(){
//      $('.loaderAll').hide();
//   },
// success:function(){
// },
// });
function setDropzone() {
$('#MDropzone').modal('show');
}
Dropzone.autoDiscover = false;
    $(".addIdForm").dropzone({
      parallelUploads: 2,
      acceptedFiles:".png , .jpg , .jpeg",
      maxFilesize: 3,
    error:function(file){
      this.removeFile(this.files[0]);
      $(".warningDropzone").html('<div class="alert alert-danger">خطا : عکس آپلود نشد<br>شما نمی توانید برای هر محصول بیشتر از 6 عکس آپلود کنید . <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
      $("#MDropzone").on('hide.bs.modal', function () {
      $(".warningDropzone").html('');
      });
    },
    success:function(file , response){
      this.removeFile(this.files[0]);
      $('#MDropzone').modal('hide');
      var imgClass = 'c'+new Date().valueOf();//استفاده از تایم استمپ
      $(".btnImgForm").after(`<div class="divImgP ` + imgClass + `"><i class="fas fa-times iDElImg" onclick="delimg2(null,null,null,'`+response+`' ,'`+imgClass +`')" ></i><img src="/img_shop/`+ response +`" alt=""style="margin:2px;" width="90" height="90"></div>`);
    },
  });
// نمایش و عدم نمایش فرمهای ورود و ثبت نام
function show_form_shop_log(clases) {
  $('.shop_sabt_log_log').css('display', 'block');
   $('.shop_sabt_log_log2' ).css('display', 'none');
   $('.shop_ghanon_society_log3').css('display', 'none');
  $('.'+clases).css('display', 'block');
}
function spinner() {
  $.ajax({
    beforeSend: function() {
      var height=$('.setSpinner').innerHeight();//جهت نماد انتظار
      var height2=window.innerHeight;//جهت نماد انتظار
      var hScroll= $(window).scrollTop();
      $('.opacityAll').css('height',height);//جهت نماد انتظار
      $('.spinnerAll').css('top',height2/2 + hScroll);//جهت نماد انتظار
      $('.loaderAll').show();
    },
    complete: function(){
       $('.loaderAll').hide();
    },
  })

}
function div_active(class1,setTop,proDel,idDel,ajaxDel,formH){
  /*setTop
  **موقع مقدار دهی یه پارامتر باید همون موقع آیدی و یا کلاس بودن پارمتر را مشخص کرد
  */
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../deleteCookieNamePic',//مربوط به پاک کردن کوکی عکسها
    success:function(){
      $(".loader").hide();
    },
    });
  $(".imgForm").html('<div class="loader loaderImg " ><div class="opacityC opacityImg"></div><div class="spinner-border text-primary spinnerC spinnerImg" >.</div></div><div class="btnImgForm" onclick="setDropzone()"><i class="fas fa-camera"></i></div>');
  $('.orderDivH').removeClass('orderDivSh');
  $(proDel).val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
  $(idDel).val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
  $(ajaxDel).html('');
  $('.'+class1).addClass('orderDivSh');
  if (class1=='divStockOOUS' || class1=='divUnStockOOUS'|| class1=='divNewOOUS') {
    $(formH).hide();
  } else {
    $(formH).show();
  }
  var hTop=$(setTop).offset().top;
  $('html, body').animate({scrollTop : hTop - 5},500);
}
// function divActiveOOOUNSS(class1) {
//   $('.orderDivH').removeClass('orderDivSh');
//   // $('#sProSUnStock').val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
//   // $('#sIdSUnStock').val('');//خالی کردن این پوت جستجوی محصول غیر ثابت
//   // $('#ajax_searchProSUnStock').html('');
//   $('.'+class1).addClass('orderDivSh');
//     var hTop=$(setTop).offset().top;
//     $('html, body').animate({scrollTop : hTop - 5},500);
// }
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
      setTimeout(function () {
        $('#end_shoplog').modal('hide');
      }, 1500)
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
  function delimg2(img_id,cell_imgB,cell_imgS,nameImg,imgClass) {
    var okDel = confirm("آیا می خواهید عکس حذف شود ؟");
    if (okDel == true) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../delimg2',
      data: {
            img_id:img_id,
            cell_imgB:cell_imgB,
            cell_imgS:cell_imgS,
            nameImg:nameImg,
           },
           beforeSend: function() {
              var height=$('.imgForm').innerHeight();//جهت نماد انتظار
             var height2=$('.spinnerImg').innerHeight();//جهت نماد انتظار
              $('.opacityImg').css('height',height);//جهت نماد انتظار
             $('.spinnerImg').css('margin-top',height/2-height2/2);//جهت نماد انتظار
             $('.loaderImg').show();
           },
           complete: function(){
              $('.loaderImg').hide();
           },
      success:function(){
        $('.'+imgClass).css('display' , 'none');
      },
      error: function(xhr) {}  });
      }
  }
function proShop(order_id,stamp,namePro,maker,brand,model,price,priceFOrder,vahed,num,vazn,dimension,vaznPost,pakat,dis,disSeller,dateMake,dateExpiration,term,idAjax,classForm,url){
        if (priceFOrder != 'not') {var priceFOrder2 = $('#'+priceFOrder).val()}else{var priceFOrder2=null;}
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $.ajax({
          type:'post',
          url:'../../proShop',
          data: {
                order_id:order_id,
                stamp:$('input[type=radio][name='+stamp+']:checked').val(),
                namePro:$('#'+namePro).val(),
                maker:$('#'+maker).val(),
                brand:$('#'+brand).val(),
                model:$('#'+model).val(),
                price:$('#'+price).val(),
                priceFOrder:priceFOrder2,
                vahed:$('#'+vahed).val(),
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
                // img1:$('#'+img1).html(),
                // img2:$('#'+img2).html(),
                // img3:$('#'+img3).html(),
                // img4:$('#'+img4).html(),
                // img5:$('#'+img5).html(),
                // img6:$('#'+img6).html(),
               },
          success:function(){
            $('#'+idAjax).empty();
            $('#end_orderSabtSh').modal('show');
            $("#end_orderSabtSh").on('hide.bs.modal', function () {
              if (order_id) {
                window.location.href  = "/"+url+"/"+order_id;
              } else {
                window.location.href  = "/"+url;
              }
            });
          },
          error: function(xhr) {
            var errors = xhr.responseJSON;
            var error=errors.errors;
            $('#'+idAjax).empty();
            scroll_form(classForm);
            if(error['stamp']){
               $('#'+idAjax).html('<div class="alert alert-danger">نوع محصول را انتخاب کنید</div>');
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
            else if(error['dimension']){
               $('#'+idAjax).html('<div class="alert alert-danger">'+error['dimension']+'</div>');
            }
            else if(error['vaznPost']){
               $('#'+idAjax).html('<div class="alert alert-danger">'+error['vaznPost']+'</div>');
            }
            else if(error['pakat']){
               $('#'+idAjax).html('<div class="alert alert-danger">'+error['pakat']+'</div>');
            }
             }  });
      }
//هنگام حذف محصول بررسی می کند که محصول به مشتری پیشنهاد شده است یا اینکه این محصول خریداری شده است یا نه ؟
function del_proShopCheckOffer(checkOffer,pro_id){
  if(checkOffer){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({type:'post',url:'../checkDel_proShop',
      data: {
            pro_id:pro_id,
           },
      success:function(data){
        if (data==0) {
          var data2='<span><b>توجه !!</b> شما این محصول را به ' + checkOffer + ' مشتری معرفی کرده اید! آیا هنوز می خواهید این محصول را حذف کنید ؟</span>'
          $('.alertCheckDlePro1').html(data2);
          $('#del_pro2').modal('show');
        } else {
          var data3='<span><b>توجه !!</b> '+ data +' نفر این محصول را خریداری کرده اند ! شما نمی توانید این محصول را از این صفحه حذف کنید .</span>'
          $('.alertCheckDlePro1').html(data3);
          $('.alertCheckDlePro2').html('  <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>');

          $('#del_pro2').modal('show');
        }
      },
      error: function(xhr) {}  });
  }
  else{
    $('#del_pro1').modal('show');
  }
}
//حذف محصول هنگامی که به مشتری معرفی نشده و یا فروخته نشده است .
function del_proShop1(pro_id,img_id,url,buyAOfferCheck){
/**
***buyAOfferCheck
*این پارامتر نوع محصول از لحاظ اینکه محصول فروخنه شده ٰ، پیشنهاد شده و غیرو را مشخص می کند
*مقدار 1 محصول نه فروخته شده و نه پشنهاد شده است
*مقدار 2 محصول فقط پشنهاد شده
*مقدار 3 محصول فروخته شده
*/
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../del_proShop1',
    data: {
      pro_id:pro_id,
      img_id:img_id,
      buyAOfferCheck:buyAOfferCheck,
         },
    success:function(){
      window.location.href='/' + url;
    },
    error: function(xhr) {
       }  });
}
function del_offerProShop(pro_id,order_id,url) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'/del_offerProShop',
    data: {
      pro_id:pro_id,
      order_id:order_id,
         },
    success:function(){
        var data2='<div class="<div class="modal_ok1"><i class="far fa-check-circle"></i></div><div class="modal_ok2">حذف پیشنهاد محصول به مشتری با موفقیت انجام شد</div>'
        $('.alertCheckDlePro1').html(data2);
        $('.alertCheckDlePro2').html('  <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>');
        $('#del_OfferPro').modal('show');
        $("#del_OfferPro").on('hide.bs.modal', function () {
            window.location.href  = "/"+url;
        });
    },
    error: function(xhr) {
       }  });
}
function editProShopUnStock(pro_id,order_id,img_id,stamp,namePro,maker,brand,model,price,priceFOrder,vahed,num,vazn,dimension,vaznPost,pakat,dis,disSeller,dateMake,dateExpiration,term,idAjax,classForm,url,checkInset,checkAddOrEditStamp) {
            /*
            **checkInset
            **هنگامی که این پارامتر مقدار دهی شده باشد متد کنترل چک می کند که محصول جاری به سفارش جاری قبلا معرفی شده یا خیر
            **در ادامه نحوه مقدار دهی در صفحات ذکر شده
            **showProOneUnStockShop = null , searchProSUnStock = 1 , oldOrderOneUnStockShop -> in form (form_orderEditOOUSS) = null
            ******
            **checkAddOrEditStamp
            **این پارمتر هنگامی مقدار دهی می شود که میخواهیم محصولی را به سفارشی معرفی کنیم یا اینکه محصول معرفی شده را ویرایش کنیم
            ××در واقع این پارامتر اجازه ایجاد رکورد جدید و یا ویرایش رکورد موجود در جدول استمپ پرو اوردرز را می دهد ، مقدار دهی پارامتر در صفحات در ادامه ذکر شده است
            ** showProOneUnStockShop = null ,searchProSUnStock = 1 ,  oldOrderOneUnStockShop -> in form (form_orderEditOOUSS) = 2
            */
            if (priceFOrder != 'not') {var priceFOrder = $('#'+priceFOrder).val()}else{var priceFOrder=null;}
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
                    priceFOrder:priceFOrder,
                    vahed:$('#'+vahed).val(),
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
                    checkInset:checkInset,
                    checkAddOrEditStamp:checkAddOrEditStamp,
                   },
              success:function(data){
                $('#'+idAjax).empty();
                $('#end_orderSabtSh').modal('show');
                $("#end_orderSabtSh").on('hide.bs.modal', function () {
                if (checkAddOrEditStamp==null) {
                  window.location.href  = "/"+url+"/"+pro_id;
                } else {
                  if (checkAddOrEditStamp==1) {
                    window.location.href  = "/"+url+"/"+order_id;
                  } else {
                    window.location.href  = "/"+url+"/"+order_id+"/"+pro_id;
                  }
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
                     $('#'+idAjax).html('<div class="alert alert-danger">لطفا نوع محصول را انتخاب کنید</div>');
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
/*
**پیشنهاد محصولات دیگر در صفحه
**oldOrderOneUnStockShop
*/
function showAddOffer() {
  $("#ulOOUSS2").toggle();
  $(".ulOOUSS_i1").toggle();
  $(".ulOOUSS_i2").toggle();
  var check=$('.ulOOUSS').attr('data-radius');
  if(check=='r1'){
    $(".ulOOUSS li").css('border-radius','4px 4px 0 0');
    $('.ulOOUSS').attr('data-radius' , 'r2');
  }else{
    $(".ulOOUSS li").css('border-radius','4px');
    $('.ulOOUSS').attr('data-radius' , 'r1');
  }
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
// function allOldOrderShop() {
//   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
//   $.ajax({
//     type:'post',
//     url:'../../allOldOrderShop',
//     success:function(data){
//       window.location.href  = "/oldOrderShop";
//     },
//   });
//  }
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
  var year1=$('#year1_payShop').val();var check =/^[0-9]{2}$/;if(check.test(year1)){if(year1>16){year1 = 13 + year1;}else{year1 = 14 + year1;}}
  var day2=$('#day2_payShop').val();var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#month2_payShop').val();var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#year2_payShop').val();var check =/^[0-9]{2}$/;if(check.test(year2)){if(year2>16){year2 = 13 + year2;}else{year2 = 14 + year2;}}

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
  var year1=$('#year1_backShop').val();var check =/^[0-9]{2}$/;if(check.test(year1)){if(year1>16){year1 = 13 + year1;}else{year1 = 14 + year1;}}
  var day2=$('#day2_backShop').val();var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#month2_backShop').val();var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#year2_backShop').val();var check =/^[0-9]{2}$/;if(check.test(year2)){if(year2>16){year2 = 13 + year2;}else{year2 = 14 + year2;}}

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
function searchProSUnStock(order_id,url) {
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
        url:url,
           },
      success:function(data){

         $('#ajax_searchProSUnStock').html(data);
         var hTop=$('#ajax_searchProSUnStock').offset().top;
         $('html, body').animate({scrollTop : hTop - 5},800);
        // window.location.href  = "/newOrderShop/"+sortdate;
      },
       });
  }
  else{alert('نام محصول را وارد کنید .')}

}
function searchIdSUnStock(id,order_id,url) {
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
        url:url,
           },
      success:function(data){
         $('#ajax_searchProSUnStock').html(data);
         var hTop=$('#ajax_searchProSUnStock').offset().top;
         $('html, body').animate({scrollTop : hTop - 5},500);
        // window.location.href  = "/newOrderShop/"+sortdate;
      },
       });
  }
  else{alert('کد محصول را وارد کنید .')}

}
function id_searchC(input , url , stamp) {
    var id=$('#'+input).val();
    if(id){
        if(stamp){window.location='/'+ url + '/' + id + '/' + stamp ;}
        else{window.location='/'+ url + '/' + id ;}
    } else{
        if(stamp==1){alert('لطفا کد محصول را وارد کنید .')}
        else if(stamp==2){ alert('لطفا کد سفارش را وارد کنید .') }
        else{ alert('لطفا کد سفارش را وارد کنید .') }
      }
  }
function pro_searchC(nameCookieCheck,nameCookie ,check, pro , id , url , stamp) {
    if (id) {var id = $('#'+id).val()}else{var id=null;}
    if (pro) {var pro = $('#'+pro).val()}else{var pro=null;}
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'/pro_searchC',
      data: {
            nameCookieCheck:nameCookieCheck,
            nameCookie:nameCookie,
            check:check,
            pro:pro,
            id:id,
           },
      success:function(){
        window.location.href  = "/" + url;
      },
      error : function(xhr){
        if (stamp==1) {
          alert('نام محصول را وارد کنید .')
        }
        else if(stamp==2) {
          alert('کد محصول را وارد کنید .')
        }
        else if(stamp==3) {
          alert('نام سفارش را وراد کنید .')
        }
        else if(stamp==4) {
          alert('کد سفارش را وارد کنید .')
        }
      },
      });
  }
  // function allpro_searchC(nameCookie , url) {
  //   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  //   $.ajax({
  //     type:'post',
  //     url:'/allPro_searchC',
  //     data: {
  //           nameCookie:nameCookie,
  //          },
  //     success:function(){
  //       window.location.href  = "/"+url;
  //     }
  //     });
  // }
function date_searchC(nameCookie,day,url) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../date_searchC',
      data: {
            nameCookie:nameCookie,
            day:day,
           },
      success:function(){
        window.location.href  = "/" + url;
      },
      error : function(xhr){
      },
      });
  }
function fromDAte_searchC(nameCookie,nameCookieD1,nameCookieD2,url,id_day1,id_month1,id_year1,id_day2,id_month2,id_year2) {
    var day1=$('#'+id_day1).val();
    var month1=$('#'+id_month1).val();
    var year1=$('#'+id_year1).val();var check =/^[0-9]{2}$/;if(check.test(year1)){if(year1>16){year1 = 13 + year1;}else{year1 = 14 + year1;}}
    var day2=$('#'+id_day2).val();
    var month2=$('#'+id_month2).val();
    var year2=$('#'+id_year2).val();var check =/^[0-9]{2}$/;if(check.test(year2)){if(year2>16){year2 = 13 + year2;}else{year2 = 14 + year2;}}
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../fromDAte_searchC',
      data: {
        nameCookie:nameCookie,
        nameCookieD1:nameCookieD1,
        nameCookieD2:nameCookieD2,
        day1:day1,
        month1:month1,
        year1:year1,
        day2:day2,
        month2:month2,
        year2:year2,
           },
      success:function(){
        window.location.href  = "/"+ url;
      },
      error : function(xhr){
        alert('بازه زمانی را صحیح وارد کنید .')
      },
      });
  }
function ostan_searchC(nameCookieOstanAndCity,nameCookieOstan,nameCookieCity,url,osatn,city) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../ostan_searchC',
      data: {
        nameCookieOstanAndCity:nameCookieOstanAndCity,
        nameCookieOstan:nameCookieOstan,
        nameCookieCity:nameCookieCity,
        osatn:$('#' + osatn).val(),
        city:$('#' + city).val(),
           },
      success:function(){
        window.location.href  = "/" + url;
      },
      error : function(xhr){
        alert('استان را وارد کنید .')
      },
      });
  }
function AllOstan_searchC(nameCookieOstanAndCity,nameCookieOstan,nameCookieCity,url){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'/AllOstan_searchC',
      data: {
        nameCookieOstanAndCity:nameCookieOstanAndCity,
        nameCookieOstan:nameCookieOstan,
        nameCookieCity:nameCookieCity,
           },
      success:function(){
        window.location.href  = "/" + url;
      },
      error : function(xhr){
      },
      });
  }
function AllCity_searchC(nameCookieCity , url) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../AllCity_searchC',
      data: {
        nameCookieCity:nameCookieCity,
           },
      success:function(){
        window.location.href  = "/" + url;
      },
      error : function(xhr){
      },
      });
  }
