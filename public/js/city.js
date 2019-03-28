
function show_city(ostanId){


  $('#ajax_sabad_city option[value="aval"]').prop('selected', true);
  $('.sabad_kh_sefareshi2_1').html(0);
  $('.sabad_kh_pishtaz2_1').html(0);
  $('.sabad_kh_end_price2').html(0);
  $(".form-check-input"). prop("checked", false);
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
