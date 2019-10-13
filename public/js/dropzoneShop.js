// var idForm;
function setDropzone(id) {
$.cookie('cookieIdShop', id , '');
$('.addIdAjax').attr('id' , 'imgPUSSPro6');
$('form.addIdForm').addClass('kjk');
$('form.addIdForm').addClass('dropzone');

$('#MPUSSProImg6').modal('show');
// $('.ajaxForm').html('<div class="titr_modal_img_addpro">آپلود عکس ششم</div><div class="ajax_form_modal" id="imgPUSSPro6"></div><form class="dropzone form_img_add_pro" id="proPUSSImg6"action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form>')
}
var imgForm=$.cookie('cookieIdShop');
var imgOk='imgPUSSPro6';
Dropzone.autoDiscover = false;
           $(".addIdForm").dropzone({
             parallelUploads: 2,
             acceptedFiles:".png , .jpg , .jpeg",
             maxFilesize: 3,
            error:function(){
              $("#imgPUSSPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
            },
            success:function(file , response){
              // $("#"+imgOk).html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
              // $("#Iimg6_proPUSS").html('<i class="fas fa-check Icheck"></i>');
              this.removeFile(this.files[0]);
              $('#MPUSSProImg6').modal('hide');
              $(".btnImgForm").after('<img src="/img_shop/'+ response +'" alt=""style="margin:2px;" width="90" height="90">');


            },
           });
  function delimg2(img_id,cell_imgB,cell_imgS,nameImg,imgClass) {
    /*
    **stage
    **چک می کند که عکس در جدول عکس محصولات ذخیره شده یا خیر
    **مقدار 1 یعنی عکس در دیتابیس ذخیره شده
    **مقدار 2 عکس در دیتابیس ذخیره نشده
    */
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    $.ajax({
      type:'post',
      url:'../delimg2',
      data: {
            img_id:img_id,
            cell_imgB:cell_imgB,
            cell_imgS:cell_imgS,
            nameImg:nameImg,
            // stage:stage,
           },
      success:function(){
        $('.'+imgClass).css('display' , 'none');

        // $('#end_orderSabtSh').modal('show');
        // $("#end_orderSabtSh").on('hide.bs.modal', function () {
        //   if (order_id) {
        //     window.location.href  = "/"+url+"/"+order_id;
        //   } else {
        //     window.location.href  = "/"+url;
        //   }
        // });
      },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;

         }  });
  }
// var ty=Dropzone  .  options  .  proPUSSImg6;
// // Dropzone.options  .  proPUSSImg6= {
// //    parallelUploads: 2,
// //    acceptedFiles:".png , .jpg , .jpeg",
// //    maxFilesize: 3,
// //   error:function(){
// //     $("#imgPUSSPro6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
// //   },
// //   success:function(file , response){
// //     $("#imgPUSSPro6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
// //     $("#Iimg6_proPUSS").html('<i class="fas fa-check Icheck"></i>');
// //
// //     $("#Aimg6_proPUSS").html( response );
// //   },  }
