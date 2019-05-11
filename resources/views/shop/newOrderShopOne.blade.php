@extends('shop.layoutDashShop')
@section('title')
  مشاهده سفارش
@endsection
@section('dash_content')

    <div class="dashTitrSh">
      مشاهده سفارش
      <a href="/newOrderShop"><button type="button" class="btn newOrderOneBut" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      <div class="orderDiv orderName">
        <div class="orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderName2">{{$newOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderDate">
        <div class="orderDivZ0 orderDate1">تاریخ ثبت <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderDate2">{{$newOrderOne->date_ad}}</div>
      </div>
      <div class="orderDiv orderSquad">
        <div class="orderDivZ0 orderSquad1">دسته محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderSquad2">{{$newOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$newOrderOne->num}} {{$newOrderOne->vahed}} </div>
      </div>
      <div class="orderDiv2 orderDis">
        <div class="orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ2 orderDis2">{{$newOrderOne->dis}}</div>
      </div>
      <div class="orderOk">
        {{-- <a href="#"><button type="button" class="btn btn-primary btn-block">  ثبت فروش این محصول </button></a> --}}
        چنانچه قادر به تهیه  و فروش این محصول و یا مشابه این محصول هستید ،  اطلاعات محصول خود را در فرم زیر
        وارد کنید .
      </div>
      <form class="form form_orderSabtSh" id="form_orderSabtSh" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول </div>
       <div id="ajax_orderSabtSh"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="stamp_orderSabtSh" class="control-label pull-right "><i class="fas fa-tag i_form"></i> نوع محصول</label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderSabtShD1">
               <label for="stamp_orderSabtSh1" class="control-label pull-right "> اصل محصول</label>
               <input type="radio" name="r" id="stamp_orderSabtSh1" value="1">
             </div>
             <div class="div_form_radio2 stamp_orderSabtShD2">
               <label for="stamp_orderSabtSh2" class="control-label pull-right "> مشابه محصول</label>
               <input type="radio" name="r" id="stamp_orderSabtSh2" value="2">
             </div>
         </div>

       </div>
       <div class="form-group">
         <label for="name_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> نام محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="name_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="brand_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="brand_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="model_orderSabtSh" class="control-label pull-right "><i class="fas fa-phone i_form"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="model_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="price_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> قیمت محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="price_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right "><i class="fas fa-clipboard-list i_form"></i> واحد شمارش کالا</label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_sabtOrder" name="" >
             <option value="">انتخاب کنید</option>
             <option value="عدد">عدد</option>
             <option value="بسته">بسته</option>
             <option value="کارتن">کارتن</option>
             <option value="گونی">گونی</option>
             <option value="گرم">گرم</option>
             <option value="کیلو گرم">کیلو گرم</option>
             <option value="جین">جین</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label for="vazn_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="vazn_orderSabtSh"placeholder="در صورت نیاز ..."></div>
       </div>
       <div class="form-group">
         <label for="vaznPost_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i> وزن پستی محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="vaznPost_orderSabtSh"></div>
       </div>
       <div class="form-group">
         <label for="pakat_orderSabtSh" class="control-label pull-right "><i class="fas fa-credit-card i_form"></i>  هزینه بسته بندی</label>
         <div class="div_form"><input type="text" class="form-control" id="pakat_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_orderSabtSh" class="control-label pull-right  "><i class="fas fa-home i_form"></i>توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" id="dis_orderSabtSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_orderSabtSh" class="control-label pull-right "><i class="far fa-address-card i_form"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control" id="dateMake_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_orderSabtSh" class="control-label pull-right "><i class="fas fa-at i_form"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control" id="dateExpiration_orderSabtSh"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group">
         <label for="dis_orderSabtSh" class="control-label pull-right  "><i class="fas fa-home i_form"></i>شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" id="dis_orderSabtSh"placeholder="اختیاری ..."></textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="img_orderSabtSh" class="control-label pull-right "><i class="fas fa-money-check i_form"></i> عکس محصول</label>
         <div class="div_form"><input type="text" class="form-control" id="img_orderSabtSh"></div>
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success" onclick="sabtShop_2()" >ثبت</button>
       </div>
     </form>
    </div>

   <!-- Modal موفق بودن ثبت ابتدایی کانال-->
   <div class="modal fade" id="end_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تکمیل اطلاعات انجام شد . شما هم اکنون می توانید سفارشهای مشتریان را مشاهده کنید  .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
@endsection
