// css file on main.css
function show_city(ostanId){
  $('.selectOstan').css('display' , 'none');
  $('.cityOff').removeClass('cityShow');
  $('.'+ostanId).addClass('cityShow');
}
