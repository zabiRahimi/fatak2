
//کم یا زیاد کردن تعداد خرید یک محصول
function num_add_sabad_order(add_cut , num ,num_buyer, vahed_price,sefarshi,pishtaz,id){

  if (add_cut=='cut'&&num_buyer==1) {}else{
  if(add_cut=='add'&&num_buyer==num){
    alert('فروشنده تنها ' + num_buyer + 'عدد کالا را برای فروش دارد . جهت خرید کالای بیشتر با فروشنده تماس بگیرید .')
  }else{
    num_buyer=Number(num_buyer);

    if (add_cut=='cut') {
      num_buyer=num_buyer-1;
    }
    if (add_cut=='add') {
      num_buyer=num_buyer+1;
    }
    // num_buyer * vahed_price
    let sum_price=num_buyer * vahed_price;
    let sum_sefarshi=number_format(num_buyer * sefarshi);
    let sum_pishtaz=number_format(num_buyer * pishtaz);
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
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
       $('#ajax_price_all_pro').html(number_format(sum_price));
       $('#ajax_price_all_pro2').html(sum_price);
       $('.sabad_kh_end_price2').html(0);
       $('input[name="post"]').prop('checked', false);
       // $('#ajax_add_cut'+id).html(data );
       // $('.sabad_kh_pishtaz2_1').html(0);
       // $('.sabad_kh_sefareshi2_1').html(0);
       // $('.sabad_kh_end_price2').html(0);
       // $('#ajax_sabad_city').val('aval');
       // $('#ajax_sabad_ostan').val('aval');
       pricePostOrder(id , num_buyer);
     },
     // complete:function(){
     //
     // },
   //   complete:function(){new_price(id , $('#ajax_add_cut'+id).html() , vahed_price ,add_cut);
   //   new_all_price( vahed_price , add_cut);
   // },
   });
 }}
}
//مجموع قیمت جدید برای محصولی که کاربر مبادرت به خرید بیشتر از یک کالا نموده
function pricePostOrder(id , num ){

  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../pricePostOrder/' + id + '/' + num,
    data: {
         // num: num ,
         // vahed_price: vahed_price,
         },
    success:function(data){
      $('#orderSefarshi').html(number_format(data[0]));
      $('#orderSefarshi2').html(data[0]);
      $('#orderAmanat').html(number_format(data[1]));
      $('#orderAmanat2').html(data[1]);
      $('#orderPishtaz').html(number_format(data[2]));
      $('#orderPishtaz2').html(data[2]);
      // $('#ajax_cuont_price'+id).html(data );

    },

  });
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
function end_price_all(model_post){

  if(model_post == 1){var price_post = $('#orderAmanat2').html();}
  else if(model_post== 2){ var price_post= $('#orderSefarshi2').html();}
  else if(model_post== 3){ var price_post= $('#orderPishtaz2').html();}
  else if(model_post== 4){ var price_post=0;}
  // let payWork = 2000;//کارمزد
  let price_pro=$('#ajax_price_all_pro2').html();
  let price_all1=Number(price_pro) + Number(price_post);
  let payWork=(price_all1 * 2) / 100 + 2000;
  let price_all2=price_all1 + payWork;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'/../../end_price_all',
    success:function(data){
      if(model_post== 5){
        $('.sabad_kh_end_price').html('<span class="sabad_kh_end_price_span">شما گزینه دریافت کالا به صورت حضوری را انتخاب نموده اید ، پس از انتخاب دکمه ثبت سفارش آدرس کامل و شماره تماس فروشنده در اختیار شما قرار می گیرد .</span>');
      }
      else{
        $('.sabad_kh_end_price').html('<span class="sabad_kh_end_price1">هزینه نهایی</span><span class="sabad_kh_end_price2 number">' + number_format(price_all2) + '</span><span class="sabad_kh_end_price3">تومان</span>');
      }

    },});  }
//کنترل انتخاب شیوه پست کردن کالا
function chek_add_post(chek,id){
  if (chek!=0) {
    var num=$('#ajax_add_cut').html();
    var post=$('input[name="post"]:checked').val();
    window.location="/factor_order/" + id + "/" + num + "/" + post;
  } else {
    $('#chek_add_post').modal('show');
  }
}
//اعتبار سنجی و ذخیره اطلاعات خریدار
$(document).ready(function(){
							$('.submit_data_buyer2').click(function(e){
								e.preventDefault();
								$.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
								var mobail=$('#mobail_data_buyer2').val();	var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
									$.ajax({
											url: "../../../save_data_buyer2",
											method: 'post',
											data: {
													name: $('#name_data_buyer2').val(),
													mobail: mobail,
                          tel:$('#tel_data_buyer2').val(),
													email: $('#email_data_buyer2').val(),
                          ostan: $('#ostan_data_buyer2').val(),
                          city: $('#city_data_buyer2').val(),
                          codepost: $('#codepost_data_buyer2').val(),
                          address: $('#address_data_buyer2').val(),
													amniat: $('#amniat_data_buyer2').val(),
											},
											success: function(data) {
                        $('#ajax_data_buyer2').empty();
                        $('#sabt_date_buyer2').modal('show');
                        scroll_form('data_buyer2');
                        end_buy();
                      },
											error: function(xhr) {
													var errors = xhr.responseJSON;
													var error=errors.errors;
                          scroll_form('form_data_buyer');
													$('#ajax_data_buyer2').empty();
                          $('.form-control').css("border-color" , "#fff");
													captcha();
                          $('#amniat_data_buyer2').val('');
													 if(error['name']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['name']+'</div>');
                             $('#name_data_buyer2').css("border-color" , "#c30909");
                          }else if(error['mobail']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['mobail']+'</div>');
                             $('#mobail_data_buyer2').css("border-color" , "#c30909");
                          }
													else if(error['tel']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['tel']+'</div>');
                             $('#tel_data_buyer2').css("border-color" , "#c30909");
                          }
                          else if(error['email']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['email']+'</div>');
                             $('#email_data_buyer2').css("border-color" , "#c30909");
                          }
                          else if(error['ostan']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['ostan']+'</div>');
                        	}
                          else if(error['city']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['city']+'</div>');
                          }
                          else if(error['codepost']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['codepost']+'</div>');
                             $('#codepost_data_buyer2').css("border-color" , "#c30909");
                          }
                          else if(error['address']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['address']+'</div>');
                             $('#address_data_buyer2').css("border-color" , "#c30909");
                          }
													else if(error['amniat']){
														 $('#ajax_data_buyer2').append('<div id="alarm_red">'+error['amniat']+'</div>');
                             $('#amniat_data_buyer2').css("border-color" , "#c30909");
                          }
                          else {
													   $('#warning_date_buyer2').modal('show');
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
