
//تنظیم اسکرول فرمها پس از ایجاد خطا و نمایش خطا به کاربر
function scroll_form_admin(class_form){
  var h= $('.'+class_form).offset();
  var hTop=h.top-12;
  window.scrollTo(0 ,hTop);
}
function captcha(){
  $.ajax({
    type:'GET',
    url:'/refreshcaptcha',
    success:function(data){
      $(".captcha4").html(data.captcha);
    }
  });
}
function show_city(ostanId){
  $('#ajax_sabad_city option[class="aval"]').prop('selected', true);
  $('.ajax_sabad_city option[class="aval"]').prop('selected', true);
  $('.sabad_kh_sefareshi2_1').html(0);
  $('.sabad_kh_pishtaz2_1').html(0);
  $('.sabad_kh_end_price2').html(0);
  $(".form-check-input"). prop("checked", false);
  $('.spanCity').html('');
  $('.spanCity').val(0);
  if(ostanId=="no"){
    $('.selectOstan').css('display' , 'block');
    $('.cityOff').removeClass('cityShow');
  }
  else{
    $('.selectOstan').css('display' , 'none');
    $('.cityOff').removeClass('cityShow');
    $('.'+ostanId).addClass('cityShow');
  }
}
function loginManage() {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../loginManage",
      method: 'post',
      data: {
          nameKarbary:$('#name_manage_log').val(),
          pas: $('#pas_manage_log').val(),
          amniat: $('#amniat_manage_log').val(),

      },
      success: function(data) {

        document.getElementById("loginFormManage").reset();
        $('.ajaxLoginManage').html('');
        window.location="/dashbordAdmin";
          },
      error: function(xhr) {
        captcha();
        $('.ajaxLoginManage').html('<div class="alert alert-danger">اطلاعات ورودی اشتباه هستند .</div>');
      }
}, "json");
}
function adModirManeg() {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../adModirManeg",
      method: 'post',

      success: function(data) {

        $('#ajaxModirManeg').html(data);
          },

}, "json");
}
function orderAghdamAdmin(id,stampBuy,url) {//اقدام تهیه و ارسال سفارش موجود فروشگاه فاتک
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../orderAghdamAdmin/' + id + '/' + stampBuy,
    data: {

         },
    success:function(){
      $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات موفق بود .</div>');
      $('#orderModalPro').modal('show');
      $("#orderModalPro").on('hide.bs.modal', function () {
      window.location.href  = "/" + url;
      });

    },
    error : function(xhr){
      $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
      $('#orderModalPro').modal('show');
    },
    });
  }
function delBuyOrderAdmin(id ,stampDel, page) {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      $.ajax({
        type:'post',
        url:'../../delBuyOrderAdmin/' + id + '/' + stampDel,
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
