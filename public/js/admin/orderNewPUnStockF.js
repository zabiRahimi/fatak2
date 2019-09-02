Dropzone.options.MimgOONPUSF1 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU1").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU1").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg1").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img1").html( response );
  },

}
Dropzone.options.MimgOONPUSF2 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU2").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU2").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg2").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img2").html( response );

  },

}
Dropzone.options.MimgOONPUSF3 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU3").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU3").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg3").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img3").html( response );

  },

}
Dropzone.options.MimgOONPUSF4 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU4").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU4").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg4").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img4").html( response );

  },

}
Dropzone.options.MimgOONPUSF5 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU5").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU5").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg5").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img5").html( response );

  },

}
Dropzone.options.MimgOONPUSF6 = {

   parallelUploads: 2,
   acceptedFiles:".png , .jpg , .jpeg",
   maxFilesize: 3,
  error:function(){

    $("#AimgOONPU6").html('<div class="alert alert-danger">خطا : عکس آپلود نشد <br>فرمت های مجاز : jpg , png <br> حداکثر حجم 3000 کیلوبایت</div>');
  },
  success:function(file , response){
    //آرگومان اول یک شی است
    //آرکومان دوم مقدار بازگشتی از کنترلر است

    $("#AimgOONPU6").html('<div class="alert alert-success"> عکس با موفقیت آپلود شد </div>');
    $("#checkImg6").html('<i class="fas fa-check Icheck"></i>');
    $("#ajax_addpro1_img6").html( response );

  },

}
function pro_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../pro_searchNPUF',
    data: {
          pro:$('#pro_searchNPUF').val(),
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function allPro_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../allPro_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    }
    });
}
function date_searchNPUF(day) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../date_searchNPUF',
    data: {
          day:day,
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function fromDAte_searchNPUF() {
  var day1=$('#searchNPUFDay1').val();
  //var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#searchNPUFMonth1').val();//var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#searchNPUFYear1').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#searchNPUFDay2').val();//var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#searchNPUFMont2').val();//var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#searchNPUFYear2').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}

  var date1=year1+'/'+month1+'/'+day1;
  // var date1='1360/12/03';
  var date2=year2+'/'+month2+'/'+day2;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../fromDAte_searchNPUF',
    data: {
      date1:date1,
      date2:date2,
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function ostan_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../ostan_searchNPUF',
    data: {
      osatn:$('#searchNPUFOstan').val(),
      city:$('#searchNPUFCity').val(),
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function AllOstan_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../AllOstan_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function AllCiyt_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../AllCiyt_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function id_searchNPUF() {
  var order_id=$('#id_searchNPUF').val();
  window.location='/orderNewPUnStockF/' +order_id ;
}
function saveOrderNPUF(id) {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../saveOrderNPUF",
      method: 'post',
      data: {
          id:id,
          stamp:$('input[name=stamp_OONPUSF]:checked', '#form_OONPUSF').val(),
          namePro:$('#name_OONPUSF').val(),
          maker:$('#maker_OONPUSF').val(),
          brand: $('#brand_OONPUSF').val(),
          model: $('#model_OONPUSF').val(),
          price: $('#price_OONPUSF').val(),
          vahed: $('#vahed_OONPUSF').val() ,
          num: $('#num_OONPUSF').val(),
          dimension:$('input[name=dimension_OONPUSF]:checked', '#form_OONPUSF').val(),
          vazn: $('#vazn_OONPUSF').val(),
          vaznPost: $('#vaznPost_OONPUSF').val(),
          pakat: $('#pakat_OONPUSF').val(),
          dis: $('#dis_OONPUSF').val(),
          dateMake: $('#dateMake_OONPUSF').val(),
          dateExpiration: $('#dateExpiration_OONPUSF').val(),
          term: $('#term_OONPUSF').val(),
          img1: $('#ajax_imgOONPU1').html(),
          img2: $('#ajax_imgOONPU2').html(),
          img3: $('#ajax_imgOONPU3').html(),
          img4: $('#ajax_imgOONPU4').html(),
          img5: $('#ajax_imgOONPU5').html(),
          img6: $('#ajax_imgOONPU6').html(),

      },
      success: function(data) {
        scroll_form_admin('form_OONPUSF');

        document.getElementById("form_OONPUSF").reset();
        $('#ajax_formaddpro1_admin').html('<div class="alert alert-success">محصول با موفقیت ذخیره شد</div>');
        // scroll_form('data_buyer');
        // end_buy();

          //window.location.href  = "/user/{{$user['id']}}";
          // $('#alarm_register').append('<div class="alert alert-success">'+'ثبت نام با موفقیت انجام شد'+'</div>');
          },
      error: function(xhr) {
          var errors = xhr.responseJSON;var error=errors.errors;
          scroll_form_admin('form_OONPUSF');
           if(error['stamp']){

             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">نوع محصول را انتخاب کنید .</div>');
          }
          else if(error['namePro']){

             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">نام محصول را وارد کنید .</div>');
          }
          else if(error['price']){

             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">'+error['price']+'</div>');
          }
          else if(error['vahed']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">واحد شمارش کالا را انتخاب کنید .</div>');
          }
          else if(error['num']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">تعداد کالای موجود را به عدد وارد کنید .</div>');
          }
          else if(error['dimension']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">ابعاد محصول را انتخاب کنید .</div>');
          }
          else if(error['vazn']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">وزن محصول را به عدد وارد کنید ، از نوشتن کلمه  "گرم" خود داری کنید .</div>');
          }
          else if(error['vaznPost']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">وزن پستی را وارد کنید ، از نوشتن کلمه " گرم " خود داری کنید .</div>');
          }
          else if(error['pakat']){
             $('#ajax_formOONPUSF').html('<div class="alert alert-danger">هزینه بسته بندی کالا را به عدد وارد کنید . </div>');
          }

     }}, "json");
}
