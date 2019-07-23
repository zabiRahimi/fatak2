
function modirAdminSabt() {
  var mobail=$('#mobail_modir_admin').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  // asd= $('#karbary_modir_admin').val()
  // alert(asd)
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../modirAdminSabt",
      method: 'post',
      data: {
          name:$('#name_modir_admin').val(),
          mobail:mobail,
          karbary:$('#karbary_modir_admin').val(),
          pas:$('#pas_modir_admin').val(),
          access:$('#access_modir_admin').val(),
          show:$('input[name=show_modir1]:checked', '#add_modir_form').val(),

      },
      success: function(data) {

        document.getElementById("add_modir_form").reset();
        $('#ajax_FAM_a').html('<div class="alert alert-success">با موفقیت ثبت شد</div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        captcha();
        if(error['name']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">'+error['name']+'</div>');
        }
        else if(error['mobail']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">'+error['mobail']+'</div>');
        }
        else if(error['karbary']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">'+error['karbary']+'</div>');
        }
        else if(error['pas']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">'+error['pas']+'</div>');
        }
        else if(error['access']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">سطح دسترسی مدیر را انتخاب کنید .</div>');
        }
        else if(error['show']){
          $('#ajax_FAM_a').html('<div class="alert alert-danger">نحوه فعالیت مدیر را انتخاب کنید .</div>');
        }

      }
}, "json");
}
