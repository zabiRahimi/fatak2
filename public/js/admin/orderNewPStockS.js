
function orderAghdamNSS(id) {//اقدام تهیه و ارسال سفارش موجود فروشگاه فاتک
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../orderAghdamNSS/' + id,
    data: {

         },
    success:function(){
      $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات موفق بود .</div>');
      $('#orderModalPro').modal('show');
      $("#orderModalPro").on('hide.bs.modal', function () {
      window.location.href  = "/orderNewPStockS";
      });

    },
    error : function(xhr){
      $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
      $('#orderModalPro').modal('show');
    },
    });
  }
function delBuyOrderNSS(id , page) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../delBuyOrderNSS/' + id,
      data: {

           },
      success:function(){
        $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات حذف با موفقیت انجام شد .</div>');
        $('#orderModalPro').modal('show');
        $("#orderModalPro").on('hide.bs.modal', function () {
        window.location.href  = "/" + page;
        });

      },
      error : function(xhr){
        $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
        $('#orderModalPro').modal('show');
      },
      });
    }
function backOrderNSS(id, page) {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      $.ajax({
        type:'post',
        url:'../../backOrderNSS/' + id,
        data: {

             },
        success:function(){
          $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات موفق بود .</div>');
          $('#orderModalPro').modal('show');
          $("#orderModalPro").on('hide.bs.modal', function () {
          window.location.href  = "/" + page;
          });

        },
        error : function(xhr){
          $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
          $('#orderModalPro').modal('show');
        },
        });
      }


//   //تغییر  stage رکورد جهت رفتن به مراحل مختلف
// buy_id , stage , code_rahgiry , date_post  , page
function editStageOrderNSS (buy_id, stage, code_rahgiry, date_post  , page){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../editStageOrderNSS',
    data: {
      stage:stage,
      code_rahgiry:code_rahgiry ,
      date_post:date_post,
      buy_id:buy_id,
         },
    success:function(){
      $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات با موفقیت انجام شد .</div>');
      $('#orderModalPro').modal('show');
      $("#orderModalPro").on('hide.bs.modal', function () {
      window.location.href  = "/" + page;
    });
  }
});
}
function orderSabtEndStockS() {
  buy_id =$('#code_ersalOrder').val(),
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'get',
    url:'../../orderSabtEndStockS/' + buy_id ,
    success:function(sd){
      window.location.href  = "/orderSabtEndStockS/" + buy_id;
    },
    error : function(xhr){
      var errors = xhr.responseJSON;var error=errors.errors;
      if(error['buy_id']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">کد سفارش به صورت عددی می باشد .</div>');
      }
      else if (error['no_order']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد موجود نیست .</div>');
      }
      else if(error['orderNew']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این کد مربوط به یک سفارش جدید است .</div>');
      }
      else if(error['orderEnd']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش قبلا به عنوان سفارش تحویلی ثبت شده است . پیگیری کنید . </div>');
      }
      else if(error['orderAghdam']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد در دست اقدام است .</div>');
      }
      else if(error['orderback']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش ، مرجوعی است .</div>');
      }
      else if(error['orderbackEnd']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش ، مرجوعی تسویه شده است . </div>');
      }
    },
    });
}
function orderBackSabtStockS() {
  buy_id =$('#code_ersalOrder').val(),
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'get',
    url:'../../orderBackSabtStockS/' + buy_id ,
    success:function(sd){
      window.location.href  = "/orderBackSabtStockS/" + buy_id;
    },
    error : function(xhr){
      var errors = xhr.responseJSON;var error=errors.errors;
      if(error['buy_id']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">کد سفارش به صورت عددی می باشد .</div>');
      }
      else if (error['no_order']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد موجود نیست .</div>');
      }
      else if(error['orderNew']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این کد مربوط به یک سفارش جدید است .</div>');
      }
      else if(error['orderEnd']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد قبلا به عنوان سفارش تحویلی ثبت شده است . </div>');
      }
      else if(error['orderAghdam']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد در دست اقدام است .</div>');
      }
      else if(error['orderback']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد قبلا به عنوان سفارش مرجوعی ثبت شده است . پیگیری کنید .</div>');
      }
      else if(error['orderbackEnd']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش ، مرجوعی تسویه شده است . </div>');
      }
    },
    });
}
// //ثبت اطلاعات محصول مرجوعی
function orderBackSaveStockS(buy_id,pro_id,shop_id) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../orderBackSaveStockS' ,
    data: {
      buy_id:buy_id,
      pro_id:pro_id,
      shop_id:shop_id,
      code_rahgiry:$('#codeRahgiryBack').val() ,
      date_post:$('#datePostBack').val(),
      price_post:$('#pricePostBack').val(),
      buyer_dis:$('#buyerDisBack').val(),
      technician_dis:$('#technicianDisBack').val(),
      pay_buyer:$('#payBuyerBack').val(),
         },
    success:function(sd){
      $('#ajax_sabtOrderBack').html('');
      $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات با موفقیت انجام شد .</div>');
      $('#orderModalPro').modal('show');
      $("#orderModalPro").on('hide.bs.modal', function () {
      window.location.href  = "/orderBackSabtStockS";
      });
    },
    error : function(xhr){
      var errors = xhr.responseJSON;var error=errors.errors;
      scroll_form_admin('form_sabtOrderBack_admin');
      if(error['code_rahgiry']) {
          $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">کد رهگیری را صحیح و به عدد وارد کنید</div>');
      }
      else if (error['date_post']) {
          $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">تاریخ پست برگشتی را صحیح وارد کنید .</div>');
      }
      else if(error['price_post']) {
          $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">مبلغ پست برگشتی را به عدد وارد کنید .</div>');
      }
      else if(error['technician_dis']) {
          $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">توضیح کارشناس را وارد کنید .</div>');
      }
      else if(error['pay_buyer']) {
          $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">مبلغ پرداختی به مشتری را به عدد وارد کنید .</div>');
      }
    },
    });
}
// function orderBackEditStockS(backPro_id) {
//   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
//   $.ajax({
//     type:'post',
//     url:'../../orderBackEditStockS' ,
//     data: {
//       backPro_id:backPro_id,
//       code_rahgiry:$('#codeRahgiryBack').val() ,
//       date_post:$('#datePostBack').val(),
//       price_post:$('#pricePostBack').val(),
//       buyer_dis:$('#buyerDisBack').val(),
//       technician_dis:$('#technicianDisBack').val(),
//       pay_buyer:$('#payBuyerBack').val(),
//          },
//     success:function(sd){
//       $('#ajax_sabtOrderBack').html('<div class="alert alert-success">عملیات با موفقیت انجام شد .</div>');
//       scroll_form_admin('form_sabtOrderBack_admin');
//     },
//     error : function(xhr){
//       var errors = xhr.responseJSON;var error=errors.errors;
//       scroll_form_admin('form_sabtOrderBack_admin');
//       if(error['code_rahgiry']) {
//           $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">کد رهگیری را صحیح و به عدد وارد کنید</div>');
//       }
//       else if (error['date_post']) {
//           $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">تاریخ پست برگشتی را صحیح وارد کنید .</div>');
//       }
//       else if(error['price_post']) {
//           $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">مبلغ پست برگشتی را به عدد وارد کنید .</div>');
//       }
//       else if(error['technician_dis']) {
//           $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">توضیح کارشناس را وارد کنید .</div>');
//       }
//       else if(error['pay_buyer']) {
//           $('#ajax_sabtOrderBack').html('<div class="alert alert-danger">مبلغ پرداختی به مشتری را به عدد وارد کنید .</div>');
//       }
//     },
//     });
// }
// //پاک کردن اطلاعات سفارش مرجوعی
// function delOrderBackStockS(buy_id , backPro_id , delBuy,page) {
//   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
//   $.ajax({
//     type:'post',
//     url:'../../delOrderBackStockS/' + buy_id + '/' + backPro_id + '/'+delBuy,
//     data: {
//          },
//     success:function(sd){
//       $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات با موفقیت انجام شد .</div>');
//       $('#orderModalPro').modal('show');
//       $("#orderModalPro").on('hide.bs.modal', function () {
//       window.location.href  = "/"+page;
//       });
//     },
//     error : function(xhr){
//
//     },
//     });
// }
