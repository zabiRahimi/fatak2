
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

function show_city_edit(){
  switch ($('.ostan').val()) {
    case 'اردبیل': var ostan = 'ostan1';break;
    case 'اصفهان': var ostan = 'ostan2';break;
    case 'البرز': var ostan = 'ostan3';break;
    case 'ایلام': var ostan = 'ostan4';break;
    case 'آذربایجان شرقی': var ostan = 'ostan5';break;
    case 'آذربایجان غربی': var ostan = 'ostan6';break;
    case 'بوشهر': var ostan = 'ostan7';break;
    case 'تهران': var ostan = 'ostan8';break;
    case 'چهار محال بختیاری': var ostan = 'ostan9';break;
    case 'خراسان جنوبی': var ostan = 'ostan10';break;
    case 'خراسان رضوی': var ostan = 'ostan11';break;
    case 'خراسان شمالی': var ostan = 'ostan12';break;
    case 'خوزستان': var ostan = 'ostan13';break;
    case 'زنجان': var ostan = 'ostan14';break;
    case 'سمنان': var ostan = 'ostan15';break;
    case 'سیستان و بلوچستان': var ostan = 'ostan16';break;
    case 'فارس': var ostan = 'ostan17';break;
    case 'قزوین': var ostan = 'ostan18';break;
    case 'قم': var ostan = 'ostan19';break;
    case 'کردستان': var ostan = 'ostan20';break;
    case 'کرمان': var ostan = 'ostan21';break;
    case 'کرمانشاه': var ostan = 'ostan22';break;
    case 'کهگیلویه و بویراحمد': var ostan = 'ostan23';break;
    case 'گلستان': var ostan = 'ostan24';break;
    case 'گیلان': var ostan = 'ostan25';break;
    case 'لرستان': var ostan = 'ostan26';break;
    case 'مازندران': var ostan = 'ostan27';break;
    case 'مرکزی': var ostan = 'ostan28';break;
    case 'هرمزگان': var ostan = 'ostan29';break;
    case 'همدان': var ostan = 'ostan30';break;
    case 'یزد': var ostan = 'ostan31';break;
  }
    $('.selectOstan').css('display' , 'none');
    $('.cityOff').removeClass('cityShow');
    $('.'+ostan).addClass('cityShow');
}
