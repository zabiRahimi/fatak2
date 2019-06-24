@extends('order.layoutOrder')
@section('title')
 پیگیری سفارش
@endsection
@section('content')
  <div class="headerOrder">
    <div class="headerOrder_1">پیگیری سفارش</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line headerOrderUl ">
    <li>صفحه اصلی</li>
    <li>نحوه فعالیت</li>
    <li>قوانین و مقررات</li>
  </ul>
  <div class="contentOrder">
    <div class="sabtAndSearchOrder">
      <form class="form form_searchOrder" id="form_searchOrder" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>پیگیری سفارش</div>
       <div id="ajax_searchOrder"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="mobail_searchOrder" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i>موبایل</label>
         <div class="div_form"><input type="text" class="form-control" onblur="mobailSearchOrder()" id="mobail_searchOrder" ></div>
       </div>
       <div class="form-group">
         <label for="pro_searchOrder" class="control-label pull-right "><i class="fas fa-clipboard-list i_form"></i> محصول سفارشی</label>
         <div class="div_form">
           <select class="select pro_searchOrder" id="pro_searchOrder" name="" >
             <option >انتخاب کنید</option>
             <option >ابتدا موبایل را وارد کنید</option>

           </select>
         </div>
       </div>
       <div class="form-group" >
         <label for="amniat_searchOrder" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
         <div class="div_form"><input type="text" class="form-control tel" id="amniat_searchOrder" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
       </div>
       <div class="captcha_form">
         <span class="captcha4">{!! captcha_img() !!}</span>
         <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success" onclick="searchOrderSave()" >ثبت</button>
       </div>
     </form>
    </div>
  </div>

<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">سفارش شما با موفقیت ثبت شد .</div>
        <div class="modal_ok2">
          <p>
            کد پیگیری سفارش شما <span class="idOrder">12</span> است .
            <br>
            شما جهت پیگیری و خرید سفارش خود به این کد نیاز دارید ، این کد را یادداشت نمایید .
          </p>
        </div>


      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->
{{-- <div class="modal fade" id="error_mobailOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content"><div class="modal-body modal_ok">
      <div id="ajax_error_mobailOrder"></div>
    </div><div class="modal_ok3"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">متوجه شدم !! </button></div>
</div></div></div><!--end modal --> --}}

@endsection
