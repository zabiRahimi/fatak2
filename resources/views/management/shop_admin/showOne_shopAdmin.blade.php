{{-- all_edit_pro.css --}}
@extends('management.shop_admin.shop_admin')
 @section('title')
  مدیریت :: مشاهده فروشگاه
@endsection
@section('show_shop')
  <div class="div_titr">
    مشاهده و ویرایش فروشگاه
    <span class="span_code">
      <span class="span_code1">کد فروشگاه :</span>
      <span class="span_code2">{{$shop->id}}</span>
    </span>
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/all_edit_shop';">بازگشت</button>
  </div>
  <div class="div_body ">
    <form class="formAdmin form_editDaShopAd " id="form_editDaShopAd" action="" method="post">

     <div class="ajax_form_admin" id="ajax_editDaShopAd">
       @if ($shop->stage==1)
         <div class="alert alert-danger"><strong>اخطار !!</strong> صاحب فروشگاه اطلاعات تکمیلی را وارد نکرده است .</div>
       @endif
     </div>
     {{ csrf_field() }}
     <div class="form-group textAll">
       <label for="shop_editDaShopAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام فروشگاه</label>
       <div class="div_form"><input type="text" class="form-control" id="shop_editDaShopAd" value="{{$shop->shop}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="seller_editDaShopAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> فروشنده</label>
       <div class="div_form"><input type="text" class="form-control" id="seller_editDaShopAd" value="{{$shop->seller}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="codemly_editDaShopAd" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  کد ملی</label>
       <div class="div_form"><input type="text" class="form-control" id="codemly_editDaShopAd" value="{{$shop->codemly}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="mobail_editDaShopAd" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
       <div class="div_form"><input type="text" class="form-control" id="mobail_editDaShopAd" value="{{$shop->mobail}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="tel_editDaShopAd" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> تلفن</label>
       <div class="div_form"><input type="text" class="form-control" id="tel_editDaShopAd" value="{{$shop->tel}}"></div>
     </div>
     <div class="form-group textAll textEmail">
       <label for="email_editDaShopAd" class="control-label pull-right "><i class="fas fa-at i_form"></i>  ایمیل</label>
       <div class="div_form"><input type="text" class="form-control" id="email_editDaShopAd" value="{{$shop->email}}"></div>
     </div>
     <div class="form-group textAll">
       <div class="formGroupCity">
         <label for="ostan_editDaShopAd" class="control-label pull-right labelCity"><i class="fas fa-map-marker i_form"></i> استان</label>
         <div class="div_formCity">
           <select class="ostan" name="" id="ostan_editDaShopAd">
             @empty ($shop->ostan)
               <option value="" >استان را وارد کنید</option>
             @endempty
             <option value="اردبیل" onclick="show_city('ostan1')" @if ($shop->ostan=='اردبیل') selected @endif>اردبیل</option>
             <option value="اصفهان" onclick="show_city('ostan2')" @if ($shop->ostan=='اصفهان') selected @endif>اصفهان</option>
             <option value="البرز" onclick="show_city('ostan3')" @if ($shop->ostan=='البرز') selected @endif>البرز</option>
             <option value="ایلام" onclick="show_city('ostan4')" @if ($shop->ostan=='ایلام') selected @endif>ایلام</option>
             <option value="آذربایجان شرقی" onclick="show_city('ostan5')" @if ($shop->ostan=='آذربایجان شرقی') selected @endif>آذربایجان شرقی</option>
             <option value="آذربایجان غربی" onclick="show_city('ostan6')" @if ($shop->ostan=='آذربایجان غربی') selected @endif>آذربایجان غربی</option>
             <option value="بوشهر" onclick="show_city('ostan7')" @if ($shop->ostan=='بوشهر') selected @endif>بوشهر</option>
             <option value="تهران" onclick="show_city('ostan8')" @if ($shop->ostan=='تهران') selected @endif>تهران</option>
             <option value="چهار محال بختیاری" onclick="show_city('ostan9')" @if ($shop->ostan=='چهار محال بختیاری') selected @endif>چهار محال بختیاری</option>
             <option value="خراسان جنوبی" onclick="show_city('ostan10')" @if ($shop->ostan=='خراسان جنوبی') selected @endif>خراسان جنوبی</option>
             <option value="خراسان رضوی" onclick="show_city('ostan11')" @if ($shop->ostan=='خراسان رضوی') selected @endif>خراسان رضوی</option>
             <option value="خراسان شمالی" onclick="show_city('ostan12')" @if ($shop->ostan=='خراسان شمالی') selected @endif>خراسان شمالی</option>
             <option value="خوزستان" onclick="show_city('ostan13')" @if ($shop->ostan=='خوزستان') selected @endif>خوزستان</option>
             <option value="زنجان" onclick="show_city('ostan14')" @if ($shop->ostan=='زنجان') selected @endif>زنجان</option>
             <option value="سمنان" onclick="show_city('ostan15')" @if ($shop->ostan=='سمنان') selected @endif>سمنان</option>
             <option value="سیستان و بلوچستان" onclick="show_city('ostan16')" @if ($shop->ostan=='سیستان و بلوچستان') selected @endif>سیستان و بلوچستان</option>
             <option value="فارس" onclick="show_city('ostan17')" @if ($shop->ostan=='فارس') selected @endif>فارس</option>
             <option value="قزوین" onclick="show_city('ostan18')" @if ($shop->ostan=='قزوین') selected @endif>قزوین</option>
             <option value="قم" onclick="show_city('ostan19')" @if ($shop->ostan=='قم') selected @endif>قم</option>
             <option value="کردستان" onclick="show_city('ostan20')" @if ($shop->ostan=='کردستان') selected @endif>کردستان</option>
             <option value="کرمان" onclick="show_city('ostan21')" @if ($shop->ostan=='کرمان') selected @endif>کرمان</option>
             <option value="کرمانشاه" onclick="show_city('ostan22')" @if ($shop->ostan=='کرمانشاه') selected @endif>کرمانشاه</option>
             <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23')" @if ($shop->ostan=='کهگیلویه و بویراحمد') selected @endif>کهگیلویه و بویراحمد</option>
             <option value="گلستان" onclick="show_city('ostan24')" @if ($shop->ostan=='گلستان') selected @endif>گلستان</option>
             <option value="گیلان" onclick="show_city('ostan25')" @if ($shop->ostan=='گیلان') selected @endif>گیلان</option>
             <option value="لرستان" onclick="show_city('ostan26')" @if ($shop->ostan=='لرستان') selected @endif>لرستان</option>
             <option value="مازندران" onclick="show_city('ostan27')" @if ($shop->ostan=='مازندران') selected @endif>مازندران</option>
             <option value="مرکزی" onclick="show_city('ostan28')" @if ($shop->ostan=='مرکزی') selected @endif>مرکزی</option>
             <option value="هرمزگان" onclick="show_city('ostan29')" @if ($shop->ostan=='هرمزگان') selected @endif>هرمزگان</option>
             <option value="همدان" onclick="show_city('ostan30')" @if ($shop->ostan=='همدان') selected @endif>همدان</option>
             <option value="یزد" onclick="show_city('ostan31')" @if ($shop->ostan=='یزد') selected @endif>یزد</option>
           </select>
         </div>
       </div>
        </div>
       <div class="formGroup  textAll">
         <label for="city_editDaShopAd" class="control-label pull-right labelCity"><i class="fas fa-map-marker-alt i_form"></i> شهر</label>
         <div class="div_formCity">
           @php
             $city=$shop->city;
           @endphp
           <select class="ajax_sabad_city" id="city_editDaShopAd" onclick="">

             @include('show_city2')

           </select>
         </div>
       </div>


     <div class="textareaEditor">
       <label for="address_editDaShopAd" class="control-label pull-right  "><i class="fas fa-home i_form"></i> آدرس </label>
       <div class="div_formTextarea">
         <textarea class="textarea" name="name" id="address_editDaShopAd">{{$shop->address}}</textarea>
       </div>
     </div>
     <div class="form-group textAll">
       <label for="codepost_editDaShopAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> کد پستی</label>
       <div class="div_form"><input type="text" class="form-control" id="codepost_editDaShopAd" value="{{$shop->codepost}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="accountNumber_editDaShopAd" class="control-label pull-right "><i class="fas fa-money-check-alt i_form"></i> شماره حساب بانکی</label>
       <div class="div_form"><input type="text" class="form-control" id="accountNumber_editDaShopAd" value="{{$shop->accountNumber}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="cart_editDaShopAd" class="control-label pull-right "><i class="fas fa-money-check i_form"></i> شماره کارت بانکی</label>
       <div class="div_form"><input type="text" class="form-control" id="cart_editDaShopAd" value="{{$shop->cart}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="master_editDaShopAd" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام صاحب حساب</label>
       <div class="div_form"><input type="text" class="form-control" id="master_editDaShopAd" value="{{$shop->master}}"></div>
     </div>
     <div class="form-group textAll">
       <label for="bank_editDaShopAd" class="control-label pull-right "><i class="fas fa-database i_form"></i> نام بانک</label>
       <div class="div_form"><input type="text" class="form-control" id="bank_editDaShopAd" value="{{$shop->bank}}"></div>
     </div>
     <div class="form-group textAll">
       <label class="control-label pull-right  "> فعالیت فروشگاه </label>
       <div class="divRadio">
         <label class="labelRadio_R">
           <span >فعال</span>
           <input type="radio" @if ($shop->show == 1) checked @endif id="show_editpro" name="show_editDaShopAd" value="1">
         </label>
         <label class="labelRadio_L">
           <span >غیر فعال</span>
           <input type="radio" @if ($shop->show != 1) checked @endif id="show_editpro_2" name="show_editDaShopAd" value="2">
         </label>
       </div>

     </div>
     <div class="divSabtForm">
        @if ($shop->stage==1)
          <button type="button" class="btn btn-info"onclick="edit2_shopAdmin({{$shop->id}})"> ثبت تغییرات اطلاعات اولیه</button>
        @endif
          <button type="button" class="btn btn-success"onclick="edit1_shopAdmin({{$shop->id}})">  ثبت تغییرات اطلاعات کلی</button>
     </div>
     {{-- <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="editDaShopAdSave({{$shop->id}})" >ثبت</button>
     </div> --}}
    </form>
    <div class="divLine"></div>
    <div class="div_titr">
      تغییر رمز
      <span class="span_code">
        <span class="span_code1">کد فروشگاه :</span>
        <span class="span_code2">{{$shop->id}}</span>
      </span>
    </div>
    <br>
    <form class="formAdmin editPas_shopAdmin" action="" id="editPas_shopAdmin"  method="post">
      {{ csrf_field() }}
      <div class="ajax_form_admin" id="ajax_editPaschAd"></div>

      <div class="form-group textAll">
        <label for="pas_editPaschAd" class="control-label pull-right  ">رمز جدید</label>
        <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="pas_editPaschAd"  ></div>
      </div>
      <div class="divSabtForm">
        <button type="button" class="btn btn-success"onclick="editPas_shopAdmin({{$shop->id}})">تغییر رمز</button>
      </div>

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
      <button type="button" class="btn btn-success" onclick="editPasDaCh({{$shop->id}})" >تغییر رمز</button>
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
