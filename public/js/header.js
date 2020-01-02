var fixed = $("#fixed").offset();
$(window).scroll(function() {
  if ($(document).scrollTop() > fixed.top) {
    $('#fixed').addClass('fixed');
  }
else{
  $('#fixed').removeClass('fixed');
}
});
function show_menu_mobail(){
  $('body').addClass('hide_overflow');
  $('.menu_mobail_1').addClass('show_menu_mobail_1');
  $('.menu_mobail_2').addClass('show_menu_mobail_2');
}
function hide_menu_mobail(){
  $('body').removeClass('hide_overflow');
  $('.menu_mobail_1').removeClass('show_menu_mobail_1');
  $('.menu_mobail_2').removeClass('show_menu_mobail_2');
}
function modal_sub_show(class_show=0){
  $('.modal_hide ul').css('display','none');
  $('.modal_hide').css("color","#167fc2"  );
  $('.'+class_show+' ul').css("display","block"  );
  $('.'+class_show).css("color","#c85413"  );
}

// جستجو
function search_empty(search_matn=0){
   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  if(search_matn==0){alert('متنی برای جستجو وارد کنید .')}
  else{
    $('.gif_loding').css('display','block');
    $.ajax({
      type:'get',
      url:'../../search',
      data: {
           search_matn: search_matn ,
           },
      success:function(data){
        $("#search").html(data);
        var h= $('.search_all').offset();
        var hTop=h.top-200;
        window.scrollTo(0 ,hTop);
        $('.gif_loding').css('display','none');
      }
    });
  }
}
