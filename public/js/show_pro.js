function b_img_pro(class1){
  $('.big_img_pro').removeClass('active_img_pro');
  $('.'+class1).addClass('active_img_pro');
}

function pro7_active(class1 , class2){

  $('.ul_pro7_1 li').removeClass('pro7_active');
  $('.'+class1).addClass('pro7_active');

  $('.show_pro8_0').removeClass('pro8_active');
  $('.'+class2).addClass('pro8_active');
  var h_mavad = $('.mavad_pro').outerHeight();
  var h_term = $('.term_pro').outerHeight();
  var h_bake = $('.bake_pro').outerHeight();

  $('.mavad_pro1').css("line-height",h_mavad +"px");
  $('.term_pro1').css("line-height",h_term +"px");
  $('.bake_pro1').css("line-height",h_bake +"px");

}
 function nazar_pro(){
   var h= $('.ersal_nazar_pro').offset();
   var fixedDiv= $('.fixed').outerHeight();
   var hTop=h.top-fixedDiv-12;
   window.scrollTo(0 ,hTop);
 }
//ثبت بازدید محصولات
// function view_pro(id){
//    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
//    $.ajax({
//      type:'put',
//      url:'../view_pro',
//      data: {
//           id: id ,
//           },
//      success:function(data){
//
//      }
//    });
// }
// اضافه کردن کالا به سبد خرید
function add_pro_sabad(id){

   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
     type:'put',
     url:'../../add_pro_sabad',
     data: {
          id: id ,
          },
     success:function(data){
       if(data){
         $('#sabad').html(data);
       }
         $('#pro_add_sabad').modal('show');
     },
     error:function(){alert(56)}
   });
}
