
function orderAghdamNSF(id) {//اقدام تهیه و ارسال سفارش موجود فروشگاه فاتک
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../orderAghdamNSF/' + id,
    data: {

         },
    success:function(){
      $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات موفق بود .</div>');
      $('#orderModalPro').modal('show');
      $("#orderModalPro").on('hide.bs.modal', function () {
      window.location.href  = "/orderNewPStockF";
      });

    },
    error : function(xhr){
      $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
      $('#orderModalPro').modal('show');
    },
    });
  }
function delBuyOrderNSF(id , page) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../delBuyOrderNSF/' + id,
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
    function backOrderNSF(id, page) {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      $.ajax({
        type:'post',
        url:'../../backOrderNSF/' + id,
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
function orderErsalSabtStockF() {
        buy_id =$('#code_ersalOrder').val(),
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $.ajax({
          type:'get',
          url:'../../orderErsalSabtStockF/' + buy_id ,
          success:function(sd){
            window.location.href  = "/orderErsalSabtStockF/" + buy_id;
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
            else if(error['ordersabt']) {
                $('#ajax_codePAA').html('<div class="alert alert-danger">کد رهگیری این سفارش ثبت شده است ، پیگیری کنید . </div>');
            }
            else if(error['orderEnd']) {
                $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش تحویل داده شده است .</div>');
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
function sabtCodeRahgiryNSF(buy_id , page) {
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
          $.ajax({
            type:'post',
            url:'../../sabtCodeRahgiryNSF',
            data: {
              code_rahgiry:$('#codeRahgiryOrder').val(),
              datePost:$('#datePostOrder').val(),
              buy_id:buy_id,
                 },
            success:function(){
              $('#ajax_codeRahgPAA').html('');
              $('#ajaxOrderModalPro').html('<div class="alert alert-success">کد رهگیری با موفقیت ثبت شد .</div>');
              $('#orderModalPro').modal('show');
              $("#orderModalPro").on('hide.bs.modal', function () {
              window.location.href  = "/" + page;
              });

            },
            error : function(xhr){
              var errors = xhr.responseJSON;var error=errors.errors;
              if(error['buy_id']) {
                  $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">مشکلی رخ داده است .</div>');
              }
              else if (error['code_rahgiry']) {
                  $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">کد رهگیری را صحیح وارد کنید .</div>');
              }
              else if (error['datePost']) {
                  $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">تاریخ پست کالا را صحیح وارد کنید .</div>');
              }
            },
            });
          }
function editCodeRahgiryNSF(buy_id , page) {
                  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                  $.ajax({
                    type:'post',
                    url:'../../editCodeRahgiryNSF',
                    data: {
                      code_rahgiry:$('#codeRahgiryOrder').val(),
                      datePost:$('#datePostOrder').val(),
                      buy_id:buy_id,
                         },
                    success:function(){
                      $('#ajax_codeRahgPAA').html('<div class="alert alert-success">ویرایش با موفقیت انجام شد .</div>');

                    },
                    error : function(xhr){
                      var errors = xhr.responseJSON;var error=errors.errors;
                      if(error['buy_id']) {
                          $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">مشکلی رخ داده است .</div>');
                      }
                      else if (error['code_rahgiry']) {
                          $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">کد رهگیری را صحیح وارد کنید .</div>');
                      }
                      else if (error['datePost']) {
                          $('#ajax_codeRahgPAA').html('<div class="alert alert-danger">تاریخ پست کالا را صحیح وارد کنید .</div>');
                      }
                },
      });
  }
  //تغییر  stage رکورد جهت رفتن به مراحل مختلف
function editStageOrderNSF (buy_id , stage , code_rahgiry , date_post  , page){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../editStageOrderNSF',
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
