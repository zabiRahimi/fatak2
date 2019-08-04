var fixed = $(".pro_ad_body_r").offset();
$(window).scroll(function() {


  if ($(document).scrollTop() > fixed.top) {
    $('.pro_ad_body_r').addClass('fixed');

  }
else{
  $('.pro_ad_body_r').removeClass('fixed');
}
});

 Dropzone.options.proAddImg1 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg1").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img1").html( response );
   },

 }
 Dropzone.options.proAddImg2 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg2").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img2").html( response );

   },

 }
 Dropzone.options.proAddImg3 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg3").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img3").html( response );

   },

 }
 Dropzone.options.proAddImg4 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg4").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img4").html( response );

   },

 }
 Dropzone.options.proAddImg5 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg5").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img5").html( response );

   },

 }
 Dropzone.options.proAddImg6 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImg6").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_addpro1_img6").html( response );

   },

 }


 function save_add_pro1(mavad1,mavad2,mavad3,mavad4,mavad5,mavad6,mavad7,mavad8,mavad9,mavad10,mavad11,mavad12,mavad13,mavad14,mavad15,mavad16,mavad17,mavad18,mavad19,mavad20){
     var mavad=[mavad1,mavad2,mavad3,mavad4,mavad5,mavad6,mavad7,mavad8,mavad9,mavad10,mavad11,mavad12,mavad13,mavad14,mavad15,mavad16,mavad17,mavad18,mavad19,mavad20];
     $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
     $.ajax({
         url: "../../save_add_pro1",
         method: 'post',
         data: {
             name:$('#name_addpro1_admin').val(),
             vahed:$('#vahed_addpro1_admin').val(),
             seller: $('#seller_addpro1_admin').val(),
             price: $('#price_addpro1_admin').val(),
             old_price: $('#priceold_addpro1_admin').val(),
             dimension_stamp: $('input[name=dimension_stamp]:checked', '#add_pro_form1').val(),
             gram: $('#vazn_addpro1_admin').val(),
             gram_post: $('#vaznpost_addpro1_admin').val(),
             pakat_price: $('#pakat_addpro1_admin').val(),
             mavad:mavad,
             date_m: $('#date_m_addpro1_admin').val(),
             date_n: $('#date_n_addpro1_admin').val(),
             dimension: $('#dimension_addpro1_admin').val(),
             sponsor: $('#sponsor_addpro1_admin').val(),
             term: $('#term_addpro1_admin').val(),
             bake: $('#bake_addpro1_admin').val(),
             made: $('#made_addpro1_admin').val(),
             model: $('#model_addpro1_admin').val(),
             dis: $('#dis_addpro1_admin').val(),
             img1: $('#ajax_addpro1_img1').html(),
             img2: $('#ajax_addpro1_img2').html(),
             img3: $('#ajax_addpro1_img3').html(),
             img4: $('#ajax_addpro1_img4').html(),
             img5: $('#ajax_addpro1_img5').html(),
             img6: $('#ajax_addpro1_img6').html(),
             show:$('input[name=show1]:checked', '#add_pro_form1').val(),
         },
         success: function(data) {
           scroll_form_admin('add_pro_form1');

           document.getElementById("add_pro_form1").reset();
           $('#ajax_formaddpro1_admin').html('<div class="alert alert-success">محصول با موفقیت ذخیره شد</div>');
           // scroll_form('data_buyer');
           // end_buy();

             //window.location.href  = "/user/{{$user['id']}}";
             // $('#alarm_register').append('<div class="alert alert-success">'+'ثبت نام با موفقیت انجام شد'+'</div>');
             },
         error: function(xhr) {
             var errors = xhr.responseJSON;var error=errors.errors;

             scroll_form_admin('add_pro_form1');

             // $('.form-control').css("border-color" , "#fff");


              if(error['name']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">نام محصول را وارد کنید </div>');
             }
             else if(error['vahed']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">واحد شمارش محصول را انتخاب کنید .</div>');
             }
             else if(error['seller']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">فروشنده کالا را انتخاب کنید</div>');
             }

             else if(error['price']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">قیمت کالا را وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید.</div>');
             }
             else if(error['old_price']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">قیمت قبل کالا را به تومان  وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید</div>');
             }
             else if(error['dimension_stamp']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">ابعاد محصول را انتخاب کنید</div>');
             }
             else if(error['gram']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">وزن محصول را وارد کنید</div>');

             }
             else if(error['gram_post']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">وزن پستی کالا را وارد کنید</div>');

             }
             else if(error['pakat_price']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">قیمت بسته بندی را به تومان وارد کنید ، کلمه (تومان) را ننویستید</div>');
             }
             else if(error['dis']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">توضیحات محصول را وارد کنید</div>');
             }
             else if(error['img1']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">آپلود کردن عکس 1 الزامی است</div>');
             }
             else if(error['show']){

                $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">نحوه نمایش محصول در وب سایت را انتخاب کنید .</div>');
             }
             else{
               $('#ajax_formaddpro1_admin').html('<div class="alert alert-danger">اخطار : محصول ذخیره نشد !</div>');

             }


         }
}, "json");
 }

 Dropzone.options.proEditImg1 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE1").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img1").html( response );
   },

 }
 Dropzone.options.proEditImg2 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE2").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img2").html( response );

   },

 }
 Dropzone.options.proEditImg3 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE3").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img3").html( response );

   },

 }
 Dropzone.options.proEditImg4 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
    error:function(){

     $("#imgEditPro4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE4").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img4").html( response );

   },

 }
 Dropzone.options.proEditImg5 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE5").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img5").html( response );

   },

 }
 Dropzone.options.proEditImg6 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
     $("#checkImgE6").html('<i class="fas fa-check Icheck"></i>');
     $("#ajax_editpro1_img6").html( response );

   },

 }
 function save_edit_pro1(id,mavad1,mavad2,mavad3,mavad4,mavad5,mavad6,mavad7,mavad8,mavad9,mavad10,mavad11,mavad12,mavad13,mavad14,mavad15,mavad16,mavad17,mavad18,mavad19,mavad20){
   var mavad=[mavad1,mavad2,mavad3,mavad4,mavad5,mavad6,mavad7,mavad8,mavad9,mavad10,mavad11,mavad12,mavad13,mavad14,mavad15,mavad16,mavad17,mavad18,mavad19,mavad20];
   $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
   $.ajax({
       url: "../../save_edit_pro1",
       method: 'post',
       data: {
           id:id,
           name:$('#name_editpro1_admin').val(),
           vahed:$('#vahed_editpro1_admin').val(),
           seller: $('#seller_editpro1_admin').val(),
           price: $('#price_editpro1_admin').val(),
           old_price: $('#priceold_editpro1_admin').val(),
           dimension_stamp: $('input[name=dimension_stamp]:checked', '#edit_pro_form1').val(),
           gram: $('#vazn_editpro1_admin').val(),
           gram_post: $('#vaznpost_editpro1_admin').val(),
           pakat_price: $('#pakat_editpro1_admin').val(),
           mavad:mavad,
           date_m: $('#date_m_editpro1_admin').val(),
           date_n: $('#date_n_editpro1_admin').val(),
           dimension: $('#dimension_editpro1_admin').val(),
           sponsor: $('#sponsor_editpro1_admin').val(),
           term: $('#term_editpro1_admin').val(),
           bake: $('#bake_editpro1_admin').val(),
           made: $('#made_editpro1_admin').val(),
           model: $('#model_editpro1_admin').val(),
           dis: $('#dis_editpro1_admin').val(),
           img1: $('#ajax_editpro1_img1').html(),
           img2: $('#ajax_editpro1_img2').html(),
           img3: $('#ajax_editpro1_img3').html(),
           img4: $('#ajax_editpro1_img4').html(),
           img5: $('#ajax_editpro1_img5').html(),
           img6: $('#ajax_editpro1_img6').html(),
           show:$('input[name=show1]:checked', '#edit_pro_form1').val(),
       },
       success: function(data) {
         scroll_form_admin('edit_pro_form1');
         document.getElementById("edit_pro_form1").reset();
         var urlpro="/edit_pro/"+ id +"";
           window.location.href  = urlpro;
            $('#ajax_formeditpro1_admin').html('<div class="alert alert-success">محصول با موفقیت ذخیره شد</div>');
           },
       error: function(xhr) {
           var errors = xhr.responseJSON;var error=errors.errors;
           scroll_form_admin('edit_pro_form1');
            if(error['name']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">نام محصول را وارد کنید </div>');
           }
           else if(error['vahed']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">واحد شمارش محصول را انتخاب کنید .</div>');
           }
           else if(error['seller']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">فروشنده کالا را انتخاب کنید</div>');
           }
           else if(error['price']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">قیمت کالا را وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید.</div>');
           }

           else if(error['old_price']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">قیمت قبل کالا را به تومان  وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید</div>');
           }
           else if(error['dimension_stamp']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">ابعاد محصول را انتخاب کنید</div>');
           }
           else if(error['gram']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">وزن محصول را وارد کنید</div>');
           }
           else if(error['gram_post']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">وزن پستی کالا را وارد کنید</div>');
           }
           else if(error['pakat_price']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">قیمت بسته بندی را به تومان وارد کنید ، کلمه (تومان) را ننویستید</div>');
           }
           else if(error['dis']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">توضیحات محصول را وارد کنید</div>');
           }
           else if(error['img1']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">آپلود کردن عکس 1 الزامی است</div>');
           }
           else if(error['show']){
              $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">نحوه نمایش محصول در وب سایت را انتخاب کنید .</div>');
           }
           else{
             $('#ajax_formeditpro1_admin').html('<div class="alert alert-danger">اخطار : محصول ذخیره نشد !</div>');
           }
       }
}, "json");
}
function del_img(ajax , div , i) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../del_imgProAdmin',
    data: {

         },
    success:function(){
      $("#"+ ajax).html('<div class="alert alert-danger"> عکس حذف شد . </div>');
      $("#"+ div).html('');
      $("#"+ i).html( '' );
    },  });}
    function buyOnePrintSh(content) {
      var contents = $("#"+content).html();
      var frame1 = $('<iframe />');
      frame1[0].name = "frame1";
      frame1.css({ "position": "absolute", "top": "-1000000px" });
      $("body").append(frame1);
      var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
      frameDoc.document.open();
      //Create a new HTML document.
      frameDoc.document.write('<html><head>');
      frameDoc.document.write('</head><body>');
      //Append the external CSS file.
      frameDoc.document.write('<link href="/css/buyProShopOnePrint.css" rel="stylesheet" type="text/css" />');
      //Append the DIV contents.
      frameDoc.document.write(contents);
      frameDoc.document.write('</body></html>');
      frameDoc.document.close();
      setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
      }, 500);
    }
    function orderAghdam(id) {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      $.ajax({
        type:'post',
        url:'../../orderAghdam/' + id,
        data: {

             },
        success:function(){
          $('#ajaxOrderModalPro').html('<div class="alert alert-success">عملیات موفق بود .</div>');
          $('#orderModalPro').modal('show');
          $("#orderModalPro").on('hide.bs.modal', function () {
          window.location.href  = "/orderBuy";
          });

        },
        error : function(xhr){
          $('#ajaxOrderModalPro').html('<div class="alert alert-danger">عملیات نا موفق بود .</div>');
          $('#orderModalPro').modal('show');
        },
        });
      }
      function delBuyOrderA(id , page) {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $.ajax({
          type:'post',
          url:'../../delBuyOrderA/' + id,
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
        function backOrderBuy(id, page) {
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
          $.ajax({
            type:'post',
            url:'../../backOrderBuy/' + id,
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
  function orderErsalSabt() {
    buy_id =$('#code_ersalOrder').val(),
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'get',
      url:'../../orderErsalSabt/' + buy_id ,
      success:function(sd){
        window.location.href  = "/orderErsalSabt/" + buy_id;
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
function sabtCodeRahgiryAdmin(buy_id , page) {
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../../sabtCodeRahgiryAdmin',
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
function editCodeRahgiryAdmin(buy_id , page) {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $.ajax({
          type:'post',
          url:'../../editCodeRahgiryAdmin',
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
function editStageOrderAdmin (buy_id , stage , code_rahgiry , date_post  , page){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../editStageOrderAdmin',
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
function orderSabtEnd() {
  buy_id =$('#code_ersalOrder').val(),
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'get',
    url:'../../orderSabtEnd/' + buy_id ,
    success:function(sd){
      window.location.href  = "/orderSabtEnd/" + buy_id;
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
      else if(error['orderEnd']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">این سفارش قبلا به عنوان سفارش تحویلی ثبت شده است . پیگیری کنید . </div>');
      }
      else if(error['orderAghdam']) {
          $('#ajax_codePAA').html('<div class="alert alert-danger">سفارشی با این کد در دست اقدام است .</div>');
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
