
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
        $('#add_modir_form').trigger('reset');//del form
        $('#ajax_FAM_a').html('<div class="alert alert-success">با موفقیت ثبت شد</div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
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

function editModirManeg(id) {
  var mobail=$('#mobail_modir_admin_e').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  // asd= $('#karbary_modir_admin').val()
  // alert(asd)
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../editModirManeg",
      method: 'post',
      data: {
          id:id,
          name:$('#name_modir_admin_e').val(),
          mobail:mobail,
          karbary:$('#karbary_modir_admin_e').val(),
          access:$('#access_modir_admin_e').val(),
          show:$('input[name=show_modir1]:checked', '#edit_modir_form').val(),

      },
      success: function(data) {

        $('#ajax_FAM_e').html('<div class="alert alert-success"> تغییرات با موفقیت ثبت شد </div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        if(error['name']){
          $('#ajax_FAM_e').html('<div class="alert alert-danger">'+error['name']+'</div>');
        }
        else if(error['mobail']){
          $('#ajax_FAM_e').html('<div class="alert alert-danger">'+error['mobail']+'</div>');
        }
        else if(error['karbary']){
          $('#ajax_FAM_e').html('<div class="alert alert-danger">'+error['karbary']+'</div>');
        }
        else if(error['access']){
          $('#ajax_FAM_e').html('<div class="alert alert-danger">سطح دسترسی مدیر را انتخاب کنید .</div>');
        }
        else if(error['show']){
          $('#ajax_FAM_e').html('<div class="alert alert-danger">نحوه فعالیت مدیر را انتخاب کنید .</div>');
        }

      }
}, "json");
}
function editPasModirManeg(id) {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../editPasModirManeg",
      method: 'post',
      data: {
          id:id,
          pas:$('#pas_modir_admin_e').val(),
      },
      success: function(data) {

        $('#ajax_FAM_e_pas').html('<div class="alert alert-success"> تغییرات با موفقیت ثبت شد </div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        if(error['pas']){
          $('#ajax_FAM_e_pas').html('<div class="alert alert-danger">'+error['pas']+'</div>');
        }


      }
}, "json");
}
function editModirManeg2(id) {
  var mobail=$('#mobail_modir_admin_e2').val();var check =/^[0-9]{10}$/;if(check.test(mobail)){mobail = 0 + mobail;}
  // asd= $('#karbary_modir_admin').val()
  // alert(asd)
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../editModirManeg",
      method: 'post',
      data: {
          id:id,
          name:$('#name_modir_admin_e2').val(),
          mobail:mobail,
          karbary:$('#karbary_modir_admin_e2').val(),
          access:1,
          show:1,

      },
      success: function(data) {

        $('#ajax_FAM_e2').html('<div class="alert alert-success"> تغییرات با موفقیت ثبت شد </div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        if(error['name']){
          $('#ajax_FAM_e2').html('<div class="alert alert-danger">'+error['name']+'</div>');
        }
        else if(error['mobail']){
          $('#ajax_FAM_e2').html('<div class="alert alert-danger">'+error['mobail']+'</div>');
        }
        else if(error['karbary']){
          $('#ajax_FAM_e2').html('<div class="alert alert-danger">'+error['karbary']+'</div>');
        }

      }
}, "json");
}
function editPasModirManeg2(id) {
  $.ajaxSetup({  headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
      url: "../../editPasModirManeg2",
      method: 'post',
      data: {
          id:id,
          oldPas:$('#pas1_modir_admin_e2').val(),
          pas:$('#pas2_modir_admin_e2').val(),
      },
      success: function(data) {

        $('#ajax_FAM_e_pas2').html('<div class="alert alert-success"> تغییرات با موفقیت ثبت شد </div>');
          },
      error: function(xhr) {
        var errors = xhr.responseJSON;
        var error=errors.errors;
        if(error['pas']){
          $('#ajax_FAM_e_pas2').html('<div class="alert alert-danger">'+error['pas']+'</div>');
        }
        else {
          $('#ajax_FAM_e_pas2').html('<div class="alert alert-danger">اطلاعات وارد شده صحیح نیست .</div>');

        }


      }
}, "json");
}
