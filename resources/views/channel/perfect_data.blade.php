@extends('channel.dashChLayout')
@section('title')
  تکمیل اطلاعات
@endsection
@section('dash_content')
  <form class="form form_channellog" id="form_perfect_data" action="" method="post">
   <div class="form_titr"><i class="fas fa-info-circle"></i>تکمیل اطلاعات</div>
   <div id="ajax_channellog"></div>
   {{ csrf_field() }}

   <div class="form-group">
     <label for="mly_perfectDaCh" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> کد ملی</label>
     <div class="div_form"><input type="text" class="form-control" id="mly_perfectDaCh"></div>
   </div>
   <div class="form-group">
     <div class="formGroupCity">
       <label for="" class="control-label pull-right labelCity"><i class="fas fa-mobile-alt i_form"></i> استان</label>
       <div class="div_formCity">
         <select class="" name="">
           <option value="">انتخاب استان</option>
         </select>
       </div>
     </div>
     <div class="formGroupCity">
       <label for="" class="control-label pull-right labelCity"><i class="fas fa-mobile-alt i_form"></i> شهر</label>
       <div class="div_formCity">
         <select class="" name="">
           <option value="">انتخاب شهر</option>
         </select>
       </div>
     </div>

   </div>
   <div class="form-group">
     <label for="pas_channellog" class="control-label pull-right  "><i class="fas fa-key i_form"></i> آدرس </label>
     <div class="div_formTextarea">
       <textarea name="name"></textarea>
     </div>
   </div>
   <div class="form-group form_btn">

     <button type="button" class="btn btn-success" onclick="login_channel()" >ثبت</button>
   </div>
 </form>
@endsection
