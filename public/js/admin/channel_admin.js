//ویراش تمام اطلاعات شبکه
function edit1_ChannelAdmin(id){
  var mobail=$('#mobail_editDaChAd').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../edit1_ChannelAdmin',
    data: {
          id:id,
          name:$('#name_editDaChAd').val(),
          codemly:$('#codemly_editDaChAd').val(),
          mobail:mobail,
          email:$('#email_editDaChAd').val(),
          ostan:$('#ostan_editDaChAd').val(),
          city:$('#city_editDaChAd').val(),
          address:$('#address_editDaChAd').val(),
          codepost:$('#codepost_editDaChAd').val(),
          accountNumber:$('#accountNumber_editDaChAd').val(),
          cart:$('#cart_editDaChAd').val(),
          master:$('#master_editDaChAd').val(),
          bank:$('#bank_editDaChAd').val(),
         },
    success:function(){
      scroll_form_admin('form_editDaChAd');
      $('#ajax_editDaChAd').html('<div class="alert alert-success">تغییرات با موفقیت ثبت شد .</div>');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON; var error=errors.errors;
        scroll_form_admin('form_editDaChAd');
        if(error['name']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['name']+'</div>');

        }
        else if(error['codemly']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['codemly']+'</div>');

        }
         else if(error['mobail']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['mobail']+'</div>');
        }
        else if(error['email']){
          $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['email']+'</div>');
       }
        else if(error['ostan']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['ostan']+'</div>');

        }
        else if(error['city']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['city']+'</div>');
        }
        else if(error['address']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['address']+'</div>');
        }
        else if(error['codepost']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['codepost']+'</div>');
        }
        else if(error['accountNumber']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['accountNumber']+'</div>');
        }
        else if(error['cart']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['cart']+'</div>');
        }
        else if(error['master']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['master']+'</div>');
        }
        else if(error['bank']){
           $('#ajax_editDaChAd').html('<div class="alert alert-danger">'+error['bank']+'</div>');
        }  }  });}
//ویرایش اطلاعات اولیه شبکه اجتماعی
function edit2_ChannelAdmin(id) {
            var mobail=$('#mobail_editDaChAd').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
          $.ajax({
            type:'post',
            url:'../../edit2_ChannelAdmin',
            data:{
              id:id,
              name:$('#name_editDaChAd').val(),
              mobail:mobail,
            },
            success:function(){
              scroll_form_admin('form_editDaChAd');
              $('#ajax_editDaChAd').html('<div class="alert alert-success">تغییرات با موفقیت ثبت شد .</div>');
            },
            error : function(xhr){
              scroll_form_admin('form_editDaChAd');
              var errors = xhr.responseJSON;var error=errors.errors;
              if(error['name']) {
                  $('#ajax_editDaChAd').html('<div class="alert alert-danger">' + error['name'] + '</div>');
              }
              else if (error['mobail']) {
                  $('#ajax_editDaChAd').html('<div class="alert alert-danger">' + error['mobail'] + '</div>');
              }
          },  });}
function editPas_channelAdmin(id) {
            $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
                url: "../../editPas_channelAdmin",
                method: 'post',
                data: {
                    id:id,
                    pas:$('#pas_editPaschAd').val(),
                },
                success: function(data) {
                  $('#ajax_editPaschAd').html('<div class="alert alert-success"> تغییرات با موفقیت ثبت شد </div>');
                    },
                error: function(xhr) {
                  var errors = xhr.responseJSON;var error=errors.errors;
                  if(error['pas']){
                    $('#ajax_editPaschAd').html('<div class="alert alert-danger">'+error['pas']+'</div>');
                  }
        }}, "json");}
