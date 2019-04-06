@extends('layout.layout_dashboard_user')
@section('title')
  داشبورد
@endsection
@section('content')
  <div class="edit_1">
    <div class="edit_2">ویرایش اطلاعات</div>
    <form class="form_edit_register" id="form_edit_register"  method="post">
      <div id="ajax_edit_register"></div>
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name_register" class="control-label pull-right  "><i class="fas fa-user-tie i_name_sabt"></i> نام و نام خانوادگی </label>
        <div class="div_h_sabtname"><input type="text" class="form-control" id="name_register" value="{{$user['name']}}" ></div>
      </div>
      <div class="form-group">
        <label for="karbary_register" class="control-label pull-right  "><i class="fas fa-user-circle i_namekarbary_sabt"></i>  نام کاربری </label>
        <div class="div_h_sabtname"><input type="text" class="form-control" id="karbary_register" value="{{$user['karbary']}}"></div>
      </div>

      <div class="form-group">
        <label for="mobail_register" class="control-label pull-right "><i class="fas fa-mobile-alt i_mobail_sabt"></i> موبایل</label>
        <div class="div_h_sabtname"><input type="text" class="form-control" id="mobail_register" value="{{$user['mobail']}}"></div>
      </div>
      <div class="form-group">
        <label for="email_register" class="control-label pull-right "><i class="fas fa-at i_email_sabt"></i> ایمیل</label>
        <div class="div_h_sabtname"><input type="text" class="form-control" id="email_register" value="{{$user['email']}}"></div>
      </div>

      <div class="form-group">
        <button type="button" class="btn btn-primary " onclick="edit_register({{$user['id']}});">ثبت تغییرات</button>

      </div>

    </form>
  </div>
  {{-- modals --}}
  <!-- Modal موفق بودن ثبت تغییرات-->
  <div class="modal fade" id="ok_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header end_register_header">
          <h5 class="modal-title end_register_label" id="exampleModalLabel"><i class="fas fa-user-plus"></i> پایان ثبت نام</h5>
          <button type="button" class="close end_register_label_2" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <div class="modal-body modal_body_end_register">
          <div class="edit_register_modal_6"><i class="far fa-check-circle"></i></div>
          <div class="edit_register_modal_7">تغییرات ثبت شد .</div>
        </div>
        <div class=" edit_register_modal_8">
          <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>

        </div>
      </div>
    </div>
  </div><!--end modal پایان موفقیت ثبت تغییرات-->
@endsection
