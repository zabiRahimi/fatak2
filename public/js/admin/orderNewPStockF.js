
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
