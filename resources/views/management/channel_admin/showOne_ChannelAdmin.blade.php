{{-- all_edit_pro.css --}}
@extends('management.channel_admin.channel_admin')
 @section('title')
  مدیریت :: مشاهده شبکه
@endsection
@section('show_channel')
  <div class="div_titr">
    مشاهده و ویرایش شبکه اجتماعی
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/all_edit_channel';">بازگشت</button>
  </div>
  <div class="div_body ">
    <form class="formAdmin form_editDaChAd " id="form_editDaChAd" action="" method="post">

     <div class="ajax_form_admin" id="ajax_editDaChAd">
       @if ($channel->stage==1)
         <div class="alert alert-danger"><strong>اخطار !!</strong> صاحب شبکه اطلاعات تکمیلی را وارد نکرده است .</div>
       @endif
     </div>
     {{ csrf_field() }}
     <div class="form-group textAll">
       <label for="name_editDaChAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی</label>
       <div class="div_form"><input type="text" class="form-control" id="name_editDaChAd" value="{{$channel->name}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="codemly_editDaChAd" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  کد ملی</label>
       <div class="div_form"><input type="text" class="form-control" id="codemly_editDaChAd" value="{{$channel->codemly}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="mobail_editDaChAd" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
       <div class="div_form"><input type="text" class="form-control" id="mobail_editDaChAd" value="{{$channel->mobail}}"></div>
     </div>
     <div class="form-group textAll textEmail">
       <label for="email_editDaChAd" class="control-label pull-right "><i class="fas fa-at i_form"></i>  ایمیل</label>
       <div class="div_form"><input type="text" class="form-control" id="email_editDaChAd" value="{{$channel->email}}"></div>
     </div>
     <div class="form-group textAll">
       <div class="formGroupCity">
         <label for="ostan_editDaChAd" class="control-label pull-right labelCity"><i class="fas fa-map-marker i_form"></i> استان</label>
         <div class="div_formCity">
           <select class="ostan" name="" id="ostan_editDaChAd">

             <option value="اردبیل" onclick="show_city('ostan1')" @if ($channel->ostan=='اردبیل') selected @endif>اردبیل</option>
             <option value="اصفهان" onclick="show_city('ostan2')" @if ($channel->ostan=='اصفهان') selected @endif>اصفهان</option>
             <option value="البرز" onclick="show_city('ostan3')" @if ($channel->ostan=='البرز') selected @endif>البرز</option>
             <option value="ایلام" onclick="show_city('ostan4')" @if ($channel->ostan=='ایلام') selected @endif>ایلام</option>
             <option value="آذربایجان شرقی" onclick="show_city('ostan5')" @if ($channel->ostan=='آذربایجان شرقی') selected @endif>آذربایجان شرقی</option>
             <option value="آذربایجان غربی" onclick="show_city('ostan6')" @if ($channel->ostan=='آذربایجان غربی') selected @endif>آذربایجان غربی</option>
             <option value="بوشهر" onclick="show_city('ostan7')" @if ($channel->ostan=='بوشهر') selected @endif>بوشهر</option>
             <option value="تهران" onclick="show_city('ostan8')" @if ($channel->ostan=='تهران') selected @endif>تهران</option>
             <option value="چهار محال بختیاری" onclick="show_city('ostan9')" @if ($channel->ostan=='چهار محال بختیاری') selected @endif>چهار محال بختیاری</option>
             <option value="خراسان جنوبی" onclick="show_city('ostan10')" @if ($channel->ostan=='خراسان جنوبی') selected @endif>خراسان جنوبی</option>
             <option value="خراسان رضوی" onclick="show_city('ostan11')" @if ($channel->ostan=='خراسان رضوی') selected @endif>خراسان رضوی</option>
             <option value="خراسان شمالی" onclick="show_city('ostan12')" @if ($channel->ostan=='خراسان شمالی') selected @endif>خراسان شمالی</option>
             <option value="خوزستان" onclick="show_city('ostan13')" @if ($channel->ostan=='خوزستان') selected @endif>خوزستان</option>
             <option value="زنجان" onclick="show_city('ostan14')" @if ($channel->ostan=='زنجان') selected @endif>زنجان</option>
             <option value="سمنان" onclick="show_city('ostan15')" @if ($channel->ostan=='سمنان') selected @endif>سمنان</option>
             <option value="سیستان و بلوچستان" onclick="show_city('ostan16')" @if ($channel->ostan=='سیستان و بلوچستان') selected @endif>سیستان و بلوچستان</option>
             <option value="فارس" onclick="show_city('ostan17')" @if ($channel->ostan=='فارس') selected @endif>فارس</option>
             <option value="قزوین" onclick="show_city('ostan18')" @if ($channel->ostan=='قزوین') selected @endif>قزوین</option>
             <option value="قم" onclick="show_city('ostan19')" @if ($channel->ostan=='قم') selected @endif>قم</option>
             <option value="کردستان" onclick="show_city('ostan20')" @if ($channel->ostan=='کردستان') selected @endif>کردستان</option>
             <option value="کرمان" onclick="show_city('ostan21')" @if ($channel->ostan=='کرمان') selected @endif>کرمان</option>
             <option value="کرمانشاه" onclick="show_city('ostan22')" @if ($channel->ostan=='کرمانشاه') selected @endif>کرمانشاه</option>
             <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23')" @if ($channel->ostan=='کهگیلویه و بویراحمد') selected @endif>کهگیلویه و بویراحمد</option>
             <option value="گلستان" onclick="show_city('ostan24')" @if ($channel->ostan=='گلستان') selected @endif>گلستان</option>
             <option value="گیلان" onclick="show_city('ostan25')" @if ($channel->ostan=='گیلان') selected @endif>گیلان</option>
             <option value="لرستان" onclick="show_city('ostan26')" @if ($channel->ostan=='لرستان') selected @endif>لرستان</option>
             <option value="مازندران" onclick="show_city('ostan27')" @if ($channel->ostan=='مازندران') selected @endif>مازندران</option>
             <option value="مرکزی" onclick="show_city('ostan28')" @if ($channel->ostan=='مرکزی') selected @endif>مرکزی</option>
             <option value="هرمزگان" onclick="show_city('ostan29')" @if ($channel->ostan=='هرمزگان') selected @endif>هرمزگان</option>
             <option value="همدان" onclick="show_city('ostan30')" @if ($channel->ostan=='همدان') selected @endif>همدان</option>
             <option value="یزد" onclick="show_city('ostan31')" @if ($channel->ostan=='یزد') selected @endif>یزد</option>
           </select>
         </div>
       </div>
        </div>
       <div class="formGroup  textAll">
         <label for="city_editDaChAd" class="control-label pull-right labelCity"><i class="fas fa-map-marker-alt i_form"></i> شهر</label>
         <div class="div_formCity">
           @php
             $city=$channel->city;
           @endphp
           <select class="ajax_sabad_city" id="city_editDaChAd" onclick="">

             @include('show_city2')

           </select>
         </div>
       </div>


     <div class="textareaEditor">
       <label for="address_editDaChAd" class="control-label pull-right  "><i class="fas fa-home i_form"></i> آدرس </label>
       <div class="div_formTextarea">
         <textarea class="textarea" name="name" id="address_editDaChAd">{{$channel->address}}</textarea>
       </div>
     </div>
     <div class="form-group textAll">
       <label for="accountNumber_editDaChAd" class="control-label pull-right "><i class="fas fa-money-check-alt i_form"></i> شماره حساب بانکی</label>
       <div class="div_form"><input type="text" class="form-control" id="accountNumber_editDaChAd" value="{{$channel->accountNumber}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="cart_editDaChAd" class="control-label pull-right "><i class="fas fa-money-check i_form"></i> شماره کارت بانکی</label>
       <div class="div_form"><input type="text" class="form-control" id="cart_editDaChAd" value="{{$channel->cart}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="master_editDaChAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام صاحب حساب</label>
       <div class="div_form"><input type="text" class="form-control" id="master_editDaChAd" value="{{$channel->master}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="bank_editDaChAd" class="control-label pull-right "><i class="fas fa-database i_form"></i> نام بانک</label>
       <div class="div_form"><input type="text" class="form-control" id="bank_editDaChAd" value="{{$channel->bank}}"></div>
     </div>
     <div class="form-group textAll">
       <label class="control-label pull-right  "> نحوه نمایش محصول </label>
       <div class="divRadio">
         <label class="labelRadio_R">
           <span >فعال</span>
           <input type="radio" @if ($channel->show == 1) checked @endif id="show_editpro" name="show1" value="1">
         </label>
         <label class="labelRadio_L">
           <span >غیر فعال</span>
           <input type="radio" @if ($channel->show != 1) checked @endif id="show_editpro_2" name="show1" value="2">
         </label>
       </div>

     </div>
     <div class="divSabtForm">
        @if ($channel->stage==1)
          <button type="button" class="btn btn-success"onclick="edit2_ChannelAdmin({{$channel->id}})"> ثبت تغییرات اطلاعات اولیه</button>
        @endif
          <button type="button" class="btn btn-success"onclick="">  ثبت تغییرات محصول</button>
     </div>
     {{-- <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="editDaChAdSave({{$channel->id}})" >ثبت</button>
     </div> --}}
    </form>
    {{-- <div class="line_editCh"></div> --}}

    {{-- <form class="form form_editPasDaCh" id="form_editPasDaCh" action="" method="post">
    <div class="form_titr"><i class="fas fa-info-circle"></i>تغییر رمز</div>
    <div id="ajax_editPasDaCh"></div>
    {{ csrf_field() }}

    <div class="form-group">
      <label for="pasOld_editPasDaCh" class="control-label pull-right "><i class="fas fa-unlock i_form"></i> رمز فعلی</label>
      <div class="div_form"><input type="text" class="form-control" id="pasOld_editPasDaCh"></div>
    </div>
    <div class="form-group">
      <label for="pasNew_editPasDaCh" class="control-label pull-right "><i class="fas fa-unlock-alt i_form"></i> رمز جدید</label>
      <div class="div_form"><input type="text" class="form-control" id="pasNew_editPasDaCh"></div>
    </div>

    <div class="form-group form_btn">
      <button type="button" class="btn btn-success" onclick="editPasDaCh({{$channel->id}})" >تغییر رمز</button>
    </div>
    </form> --}}

  </div>
  {{-- modal --}}
  {{-- <div class="modal fade" id="orderAghdamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این سفارش را به سفارشات ارسالی باز گردانید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
          {{-- editStageOrderAdmin({{$buy->id}} , 4 ,{{$buy->code_rahgiry}}, {{$buy->date_post}} , orderBackShowAll); --}}
            {{-- <button type="button" class="btn btn-primary"onclick="delOrderBack({{$buy->id}},{{$backPro->id}},'','orderBackShowAll')" data-dismiss="modal"  aria-label="Close">بله</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
        </div>
      </div>
    </div> --}}
  {{-- </div><!--end modal  --> --}}
  <div class="modal fade" id="orderDelModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این سفارش را حذف کنید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary"onclick="delOrderBack({{$buy->id}},{{$backPro->id}},'ok','orderBackShowAll')" data-dismiss="modal"  aria-label="Close">بله</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
        </div>
      </div>
    </div> --}}
  </div><!--end modal  -->
  <div class="modal fade" id="orderModalPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <div id="ajaxOrderModalPro">

          </div>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary" data-dismiss="modal"  aria-label="Close">متوجه شدم !!</button>
        </div>
      </div>
    </div>
  </div><!--end modal  -->
@endsection
