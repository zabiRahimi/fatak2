//ویراش تمام اطلاعات شبکه
function edit1_shopAdmin(id){
  var mobail=$('#mobail_editDaShopAd').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../edit1_shopAdmin',
    data: {
          id:id,
          shop:$('#shop_editDaShopAd').val(),
          seller:$('#seller_editDaShopAd').val(),
          codemly:$('#codemly_editDaShopAd').val(),
          mobail:mobail,
          tel:$('#tel_editDaShopAd').val(),
          email:$('#email_editDaShopAd').val(),
          ostan:$('#ostan_editDaShopAd').val(),
          city:$('#city_editDaShopAd').val(),
          address:$('#address_editDaShopAd').val(),
          codepost:$('#codepost_editDaShopAd').val(),
          accountNumber:$('#accountNumber_editDaShopAd').val(),
          cart:$('#cart_editDaShopAd').val(),
          master:$('#master_editDaShopAd').val(),
          bank:$('#bank_editDaShopAd').val(),
          show:$('input[name=show_editDaShopAd]:checked', '#form_editDaShopAd').val(),
         },
    success:function(){
      scroll_form_admin('form_editDaShopAd');
      $('#ajax_editDaShopAd').html('<div class="alert alert-success">تغییرات با موفقیت ثبت شد .</div>');
    },
    error: function(xhr) {
        var errors = xhr.responseJSON; var error=errors.errors;
        scroll_form_admin('form_editDaShopAd');
        if(error['shop']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['shop']+'</div>');
        }
        else if(error['seller']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['seller']+'</div>');
        }
        else if(error['codemly']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['codemly']+'</div>');

        }
         else if(error['mobail']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['mobail']+'</div>');
        }
        else if(error['tel']){
          $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['tel']+'</div>');
       }
        else if(error['email']){
          $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['email']+'</div>');
       }
        else if(error['ostan']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['ostan']+'</div>');

        }
        else if(error['city']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['city']+'</div>');
        }
        else if(error['address']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['address']+'</div>');
        }
        else if(error['codepost']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['codepost']+'</div>');
        }
        else if(error['accountNumber']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['accountNumber']+'</div>');
        }
        else if(error['cart']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['cart']+'</div>');
        }
        else if(error['master']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['master']+'</div>');
        }
        else if(error['bank']){
           $('#ajax_editDaShopAd').html('<div class="alert alert-danger">'+error['bank']+'</div>');
        }  }  });}
//ویرایش اطلاعات اولیه شبکه اجتماعی
function edit2_shopAdmin(id) {
            var mobail=$('#mobail_editDaShopAd').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
          $.ajax({
            type:'post',
            url:'../../edit2_shopAdmin',
            data:{
              id:id,
              seller:$('#seller_editDaShopAd').val(),
              mobail:mobail,
            },
            success:function(){
              scroll_form_admin('form_editDaShopAd');
              $('#ajax_editDaShopAd').html('<div class="alert alert-success">تغییرات با موفقیت ثبت شد .</div>');
            },
            error : function(xhr){
              scroll_form_admin('form_editDaShopAd');
              var errors = xhr.responseJSON;var error=errors.errors;
              if(error['seller']) {
                  $('#ajax_editDaShopAd').html('<div class="alert alert-danger">' + error['seller'] + '</div>');
              }
              else if (error['mobail']) {
                  $('#ajax_editDaShopAd').html('<div class="alert alert-danger">' + error['mobail'] + '</div>');
              }
          },  });}
function editPas_shopAdmin(id) {
            $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
                url: "../../editPas_shopAdmin",
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
