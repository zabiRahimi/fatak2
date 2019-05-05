@extends('order.layoutOrder')
@section('title')
 ثبت سفارش
@endsection
@section('content')
  <div class="sabtOrder">
    <div class="sabtOrder_1">ثبت سفارش محصول</div>
    <div class="sabtOrder_2">به نام خدا</div>
    <div class="sabtOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line sabtOrderUl ">
    <li>صفحه اصلی</li>
    <li>نحوه فعالیت</li>
    <li>قوانین و مقررات</li>
  </ul>
  <div class="sabtOrder3">
    <form class="form form_sabtOrder" id="form_edit_data" action="" method="post">
     <div class="form_titr"><i class="fas fa-info-circle"></i>ویرایش اطلاعات</div>
     <div id="ajax_editDaShop"></div>
     {{ csrf_field() }}
     <div class="form-group">
       <label for="shop_editDaShop" class="control-label pull-right "><i class="fas fa-tag i_form"></i> نام فروشگاه</label>
       <div class="div_form"><input type="text" class="form-control" id="shop_editDaShop" ></div>
     </div>
     <div class="form-group">
       <label for="seller_editDaShop" class="control-label pull-right "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی</label>
       <div class="div_form"><input type="text" class="form-control" id="seller_editDaShop"></div>
     </div>
     <div class="form-group">
       <label for="codemly_editDaShop" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  کد ملی</label>
       <div class="div_form"><input type="text" class="form-control" id="codemly_editDaShop" ></div>
     </div>
     <div class="form-group">
       <label for="mobail_editDaShop" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
       <div class="div_form"><input type="text" class="form-control" id="mobail_editDaShop"></div>
     </div>

     <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="editDaShopSave()" >ثبت</button>
     </div>
   </form>
  </div>



<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_editDaShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">تغییرات با موفقیت انجام شد .</div>
      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->

@endsection
