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
    success:function(sd){
      scroll_form('form_editDaChAd');
        $('#ajax_editDaChAd').html('<div class="alert alert-success">تغییرات با موفقیت ثبت شد .</div>');
    },
    error : function(xhr){
      scroll_form('form_editDaChAd');
      var errors = xhr.responseJSON;var error=errors.errors;
      if(error['name']) {
          $('#ajax_editDaChAd').html('<div class="alert alert-danger">+error['name']+</div>');
      }
      else if (error['mobail']) {
          $('#ajax_editDaChAd').html('<div class="alert alert-danger">+ error['mobail'] +</div>');
      }

    },
    });
}
