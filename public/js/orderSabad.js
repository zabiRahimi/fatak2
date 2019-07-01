
//کم یا زیاد کردن تعداد خرید یک محصول
function num_add_sabad_order(add_cut , num ,num_buyer, vahed_price){

  if (add_cut=='cut'&&num_buyer==1) {}else{
  if(add_cut=='add'&&num_buyer==num){
    alert('خرید محصول بیشتر از 10 عدد از طریقه سامانه مجاز نمی باشد ، جهت تهیه  بیشتر از 10 عدد محصول باشماره 09178023733 تماس حاصل نمایید .')
  }else{
    num_buyer=Number(num_buyer);
    if (add_cut=='cut') {
      num_buyer=num_buyer-1;
    }
    if (add_cut=='add') {
      num_buyer=num_buyer+1;
    }
    // num_buyer * vahed_price
    var sum_price=number_format(num_buyer * vahed_price);
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     // type:'post',
     // url:'../../num_add_sabad_order',
     // data: {
     //
     //   vahed_price:vahed_price,
     //   num_buyer: num_buyer ,
     //
     //
     //      },
     success:function(data){
       $('#ajax_add_cut').html(num_buyer);
       $('#ajax_cuont_price').html(sum_price);
       $('#ajax_price_all_pro').html(sum_price);
       // $('#ajax_add_cut'+id).html(data );
       // $('.sabad_kh_pishtaz2_1').html(0);
       // $('.sabad_kh_sefareshi2_1').html(0);
       // $('.sabad_kh_end_price2').html(0);
       // $('#ajax_sabad_city').val('aval');
       // $('#ajax_sabad_ostan').val('aval');
     },
   //   complete:function(){new_price(id , $('#ajax_add_cut'+id).html() , vahed_price ,add_cut);
   //   new_all_price( vahed_price , add_cut);
   // },
   });
 }}
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
//جمع کردن وزن محصولات جهت هزینه پست
function sum_gram_post(add_cut , gram_post , num){
  if (add_cut=='cut'&&num==1) {}else{//کنترل خرید کمتر از یک عدد
  if(add_cut=='add'&&num==10){}else{// کنترل خرید بیشتر از 10 عدد

  var old_gram=$('#ajax_gram_sabad').html();

  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../../sum_gram_post',
    data: {
         gram_post: gram_post,
         old_gram: old_gram,
         add_cut: add_cut,
         },
    success:function(data){
      $('#ajax_gram_sabad').html(data );
    },

  });}}}
//مجموع قیمت جدید برای محصولی که کاربر مبادرت به خرید بیشتر از یک کالا نموده
function new_price(id , num , vahed_price ){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../new_price',
    data: {
         num: num ,
         vahed_price: vahed_price,
         },
    success:function(data){
      $('#ajax_cuont_price'+id).html(data );
    },
    complete:function(){},
  });}
//مجموع قیمت کل محصولات بدون احتساب هزینه پست
function new_all_price( vahed_price , add_cut ){
var old_all_price=$('#ajax_price_all_pro').html();
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../../new_all_price',
    data: {
         vahed_price: vahed_price,
         old_all_price: old_all_price,
         add_cut: add_cut,
         },
    success:function(data){
      $('#ajax_price_all_pro').html(data );
    },});}
function post_pishtaz(id_ostan , id_city ){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'put',
      url:'../../../post_pishtaz',
      data: {
           id_ostan: id_ostan,
           id_city:id_city,
           },
      success:function(data){
        $('.sabad_kh_pishtaz2_1').html(data);
      },});}
function post_sefareshi(id_ostan , id_city, city){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'put',
      url:'../../../post_sefareshi',
      data: {
           id_ostan: id_ostan,
           id_city: id_city,
           city:city,
           },
      success:function(data){
        $('.sabad_kh_sefareshi2_1').html(data);
    },});}
//درج هزینه نهایی در سبد خرید
function end_price_all(price_pros , price_post , model_post){
if( price_post==0){}
else{
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../end_price_all',
    data: {
            price_pros:price_pros , price_post:price_post, model_post:model_post,
         },
    success:function(data){
      $('.sabad_kh_end_price2').html(data);
    },});  }}
//کنترل انتخاب شیوه پست کردن کالا
function chek_add_post(chek){
  if (chek!=0) {
    $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      $.ajax({
          url: "/create_cookie",
          method: 'post',
          data: {name_cookie:'factor_buy',},
          success: function(data) {
              window.location.href  = '/show_factor_buy';
              },}, "json");
  } else {
    $('#chek_add_post').modal('show');
  }
}
//اعتبار سنجی و ذخیره اطلاعات خریدار
$(document).ready(function(){
							$('.submit_data_buyer').click(function(e){
								e.preventDefault();
								$.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
								var mobail=$('#mobail_data_buyer').val();	var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
									$.ajax({
											url: "../../../save_data_buyer",
											method: 'post',
											data: {
													name: $('#name_data_buyer').val(),
													mobail: mobail,
                          tel:$('#tel_data_buyer').val(),
													email: $('#email_data_buyer').val(),
                          ostan: $('#ostan_data_buyer').val(),
                          city: $('#city_data_buyer').val(),
                          codepost: $('#codepost_data_buyer').val(),
                          address: $('#address_data_buyer').val(),
													amniat: $('#amniat_data_buyer').val(),
											},
											success: function(data) {
                        $('#ajax_data_buyer').empty();
                        $('#sabt_date_buyer').modal('show');
                        scroll_form('data_buyer');
                        end_buy();
                      },
											error: function(xhr) {
													var errors = xhr.responseJSON;
													var error=errors.errors;
                          scroll_form('form_data_buyer');
													$('#ajax_data_buyer').empty();
                          $('.form-control').css("border-color" , "#fff");
													captcha();
                          $('#amniat_data_buyer').val('');
													 if(error['name']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['name']+'</div>');
                             $('#name_data_buyer').css("border-color" , "#c30909");
                          }else if(error['mobail']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['mobail']+'</div>');
                             $('#mobail_data_buyer').css("border-color" , "#c30909");
                          }
													else if(error['tel']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['tel']+'</div>');
                             $('#tel_data_buyer').css("border-color" , "#c30909");
                          }
                          else if(error['email']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['email']+'</div>');
                             $('#email_data_buyer').css("border-color" , "#c30909");
                          }
                          else if(error['ostan']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['ostan']+'</div>');
                        	}
                          else if(error['city']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['city']+'</div>');
                          }
                          else if(error['codepost']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['codepost']+'</div>');
                             $('#codepost_data_buyer').css("border-color" , "#c30909");
                          }
                          else if(error['address']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['address']+'</div>');
                             $('#address_data_buyer').css("border-color" , "#c30909");
                          }
													else if(error['amniat']){
														 $('#ajax_data_buyer').append('<div id="alarm_red">'+error['amniat']+'</div>');
                             $('#amniat_data_buyer').css("border-color" , "#c30909");
                          }
                          else {
													   $('#warning_date_buyer').modal('show');
													}
											}
		}, "json");
  });
});
//ثبت نهایی سفارش و پرداخت آنلاین
function end_buy(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../end_buy',
    data: {},
    success:function(data){
      $('.data_buyer').html(data);
    },
  });
}
//ارسال قیمت و نام کالا برای درگاه بانک
function pardakht(price , pro){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'put',
    url:'../../pardakht',
    data: {
      pro:pro,
         },
    success:function(data){
      alert(data);
    },});}
