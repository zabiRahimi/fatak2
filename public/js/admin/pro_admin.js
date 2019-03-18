var fixed = $(".pro_ad_body_r").offset();
$(window).scroll(function() {


  if ($(document).scrollTop() > fixed.top) {
    $('.pro_ad_body_r').addClass('fixed');

  }
else{
  $('.pro_ad_body_r').removeClass('fixed');
}
});
// جهت نمایش لینکهای محصولات
// function show_div(id){
//   $('.pro_ad_body_l_0').removeClass('div_activ');
//   $('.pro_ad_body_l_0').addClass('div_none');
//
//   $('#'+id).removeClass('div_none');
//   $('#'+id).addClass('div_activ');
// }

//تنظیمات دراپ زون برای آپلود عکس محصول
// var total_photos_counter = 0;
// Dropzone.options.img_pro = {
//             maxFilesize: 12,
//
//             acceptedFiles: ".jpeg,.jpg,.png,.gif",
//             addRemoveLinks: true,
//             timeout: 5000,
//             success: function(file, response)
//             {
//                 console.log(response);
//             },
//             error: function(file, response)
//             {
//                return false;
//             }
    // uploadMultiple: true,
    // parallelUploads: 2,
    // maxFilesize: 1,
    // acceptedFiles: ".jpeg , .jpg , .png",
    //
    // addRemoveLinks: true,
    // dictRemoveFile: 'Remove file',
    // dictFileTooBig: 'Image is larger than 16MB',
    // timeout: 10000,
    // success: function(file, response)
    //        {
    //            console.log(response);
    //        },
    //        error: function(file, response)
    //        {
    //           return false;
    //        }

    // init: function () {
    //
    //     this.on("removedfile", function (file) {
    //         $.post({
    //             url: '/images-delete',
    //             data: {id: file.name, _token: $('[name="_token"]').val()},
    //             dataType: 'json',
    //             success: function (data) {
    //                 total_photos_counter--;
    //                 $("#counter").text("# " + total_photos_counter);
    //             }
    //         });
    //     });
    // },
    // success: function (file, done) {
    //
    //     total_photos_counter++;
    //     $("#counter").text("# " + total_photos_counter);
    // }
// };
// var total_photos_counter = 0;
// Dropzone.options.myDropzone = {
//     uploadMultiple: true,
//     parallelUploads: 2,
//     maxFilesize: 0.1,
//     // previewTemplate: document.querySelector('#preview').innerHTML,
//     // addRemoveLinks: true,
//     // dictRemoveFile: 'Remove file',
//     // dictFileTooBig: 'Image is larger than 16MB',
//     timeout: 10000,
//     accseptedFiles:".png",
//
//     // init: function () {
//     //     this.on("removedfile", function (file) {
//     //       $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
//     //         // $.post({
//     //         //     url: '/images-delete',
//     //         //     data: {id: file.name, _token: $('[name="_token"]').val()},
//     //         //     dataType: 'json',
//     //         //     success: function (data) {
//     //         //         total_photos_counter--;
//     //         //         $("#counter").text("# " + total_photos_counter);
//     //         //     }
//     //         // });
//     //         $.ajax({
//     // type: "POST",
//     // url: '/images-delete',
//     // data: { ld: "Some"},
//     //             });
//     //     });
//     // },
//     success: function (file, done) {
//         total_photos_counter++;
//         $("#counter").text("# " + total_photos_counter);
//
//     },
//     error: function (done) {
//
//         $("#counter").text('noooooo');
//
//     }
// };
 Dropzone.options.proAddImg1 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro1").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro1").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_addpro1_img1").html( response );
   },

 }
 Dropzone.options.proAddImg2 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro2").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro2").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_addpro1_img2").html( response );

   },

 }
 Dropzone.options.proAddImg3 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro3").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro3").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_addpro1_img3").html( response );

   },

 }
 Dropzone.options.proAddImg4 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro4").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro4").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_addpro1_img4").html( response );

   },

 }
 Dropzone.options.proAddImg5 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro5").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro5").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_addpro1_img5").html( response );

   },

 }
 Dropzone.options.proAddImg6 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgAddPro6").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgAddPro6").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
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
             seller: $('#seller_addpro1_admin').val(),
             price: $('#price_addpro1_admin').val(),
             old_price: $('#priceold_addpro1_admin').val(),
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

           $('#ajax_formaddpro1_admin').empty();
           $('#ajax_formaddpro1_admin').append('<div id="alarm_green">محصول با موفقیت ذخیره شد</div>');
           // scroll_form('data_buyer');
           // end_buy();

             //window.location.href  = "/user/{{$user['id']}}";
             // $('#alarm_register').append('<div id="alarm_green">'+'ثبت نام با موفقیت انجام شد'+'</div>');
             },
         error: function(xhr) {

             var errors = xhr.responseJSON;

             var error=errors.errors;

             scroll_form_admin('add_pro_form1');
             $('#ajax_formaddpro1_admin').empty();
             // $('.form-control').css("border-color" , "#fff");


              if(error['name']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">نام محصول را وارد کنید </div>');
                $('#name_data_buyer').css("border-color" , "#c30909");
             }else if(error['seller']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">فروشنده کالا را انتخاب کنید</div>');
                $('#mobail_data_buyer').css("border-color" , "#c30909");
             }
             else if(error['price']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">قیمت کالا را وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید.</div>');
                $('#tel_data_buyer').css("border-color" , "#c30909");
             }

             else if(error['old_price']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">قیمت قبل کالا را به تومان  وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید</div>');
                $('#email_data_buyer').css("border-color" , "#c30909");
             }
             else if(error['gram']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">وزن محصول را وارد کنید</div>');

             }
             else if(error['gram_post']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">وزن پستی کالا را وارد کنید</div>');

             }
             else if(error['pakat_price']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">قیمت بسته بندی را به تومان وارد کنید ، کلمه (تومان) را ننویستید</div>');
                $('#codepost_data_buyer').css("border-color" , "#c30909");
             }
             else if(error['dis']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">توضیحات محصول را وارد کنید</div>');
                $('#address_data_buyer').css("border-color" , "#c30909");
             }
             else if(error['img1']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">آپلود کردن عکس 1 الزامی است</div>');
                $('#amniat_data_buyer').css("border-color" , "#c30909");
             }
             else if(error['show']){

                $('#ajax_formaddpro1_admin').append('<div id="alarm_red">نحوه نمایش محصول در وب سایت را انتخاب کنید .</div>');
                $('#amniat_data_buyer').css("border-color" , "#c30909");
             }
             else{
               $('#ajax_formaddpro1_admin').append('<div id="alarm_red">اخطار : محصول ذخیره نشد !</div>');
               $('#amniat_data_buyer').css("border-color" , "#c30909");
             }


         }
}, "json");
 }

 Dropzone.options.proEditImg1 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro1").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro1").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_editpro1_img1").html( response );
   },

 }
 Dropzone.options.proEditImg2 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro2").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro2").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_editpro1_img2").html( response );

   },

 }
 Dropzone.options.proEditImg3 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro3").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro3").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_editpro1_img3").html( response );

   },

 }
 Dropzone.options.proEditImg4 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro4").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro4").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_editpro1_img4").html( response );

   },

 }
 Dropzone.options.proEditImg5 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro5").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro5").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
     $("#ajax_editpro1_img5").html( response );

   },

 }
 Dropzone.options.proEditImg6 = {

    parallelUploads: 2,
    acceptedFiles:".png , .jpg , .jpeg",
    maxFilesize: 3,
   error:function(){

     $("#imgEditPro6").html('<div id="alarm_red">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
   },
   success:function(file , response){
     //آرگومان اول یک شی است
     //آرکومان دوم مقدار بازگشتی از کنترلر است

     $("#imgEditPro6").html('<div id="alarm_green"> عکس با موفقیت آپلود شد </div>');
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
           seller: $('#seller_editpro1_admin').val(),
           price: $('#price_editpro1_admin').val(),
           old_price: $('#priceold_editpro1_admin').val(),
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

         $('#ajax_formeditpro1_admin').empty();


         // scroll_form('data_buyer');
         // end_buy();
         var urlpro="/edit_pro/"+ id +"";
           window.location.href  = urlpro;
            $('#ajax_formeditpro1_admin').append('<div id="alarm_green">محصول با موفقیت ذخیره شد</div>');
           // $('#alarm_register').append('<div id="alarm_green">'+'ثبت نام با موفقیت انجام شد'+'</div>');
           },
       error: function(xhr) {

           var errors = xhr.responseJSON;

           var error=errors.errors;

           scroll_form_admin('edit_pro_form1');
           $('#ajax_formeditpro1_admin').empty();
           // $('.form-control').css("border-color" , "#fff");


            if(error['name']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">نام محصول را وارد کنید </div>');
              $('#name_data_buyer').css("border-color" , "#c30909");
           }else if(error['seller']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">فروشنده کالا را انتخاب کنید</div>');
              $('#mobail_data_buyer').css("border-color" , "#c30909");
           }
           else if(error['price']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">قیمت کالا را وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید.</div>');
              $('#tel_data_buyer').css("border-color" , "#c30909");
           }

           else if(error['old_price']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">قیمت قبل کالا را به تومان  وارد کنید ، از نوشتن کلمه ( تومان ) خودداری کنید</div>');
              $('#email_data_buyer').css("border-color" , "#c30909");
           }
           else if(error['gram']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">وزن محصول را وارد کنید</div>');

           }
           else if(error['gram_post']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">وزن پستی کالا را وارد کنید</div>');

           }
           else if(error['pakat_price']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">قیمت بسته بندی را به تومان وارد کنید ، کلمه (تومان) را ننویستید</div>');
              $('#codepost_data_buyer').css("border-color" , "#c30909");
           }
           else if(error['dis']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">توضیحات محصول را وارد کنید</div>');
              $('#address_data_buyer').css("border-color" , "#c30909");
           }
           else if(error['img1']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">آپلود کردن عکس 1 الزامی است</div>');
              $('#amniat_data_buyer').css("border-color" , "#c30909");
           }
           else if(error['show']){

              $('#ajax_formeditpro1_admin').append('<div id="alarm_red">نحوه نمایش محصول در وب سایت را انتخاب کنید .</div>');
              $('#amniat_data_buyer').css("border-color" , "#c30909");
           }

           else{
             $('#ajax_formeditpro1_admin').append('<div id="alarm_red">اخطار : محصول ذخیره نشد !</div>');
             $('#amniat_data_buyer').css("border-color" , "#c30909");
           }


       }
}, "json");
}
