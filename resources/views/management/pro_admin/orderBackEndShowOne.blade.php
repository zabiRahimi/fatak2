{{-- all_edit_pro.css --}}
@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: سفارش مرجوعی تسویه شده
@endsection
@section('show_pro')
  <div class="div_titr">
   نمایش سفارش مرجوعی تسویه شده
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/orderBackEndShowAll';">بازگشت</button>
  </div>
  <div class="div_body ">
      <div class="buyOneDivTitr">
        مشخصات محصول
        <span class="codeOrder">
          <span class="codeOrder1">کد سفارش :</span>
          <span class="codeOrder2">{{$buy->id}}</span>
        </span>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$pro->name}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buy->num_pro}} {{$pro->vahed}} </div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">تاریخ خرید <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->date}}</div>
      </div>

    <div class="divLine"></div>

      <div class="buyOne2DivTitr">
        مشخصات خریدار
        <span class="codeOrder">
          <span class="codeOrder1">کد سفارش :</span>
          <span class="codeOrder2">{{$buy->id}}</span>
        </span>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام خریدار <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$buy->name}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">موبایل<span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buy->mobail}} </div>
      </div>
      <div class="buyOneDivA orderDiv2 orderDis">
        <div class="buyOneDivA1 orderDivZ02 orderDis1">آدرس <span class="orderDivSpan">:</span></div>
        <div class="buyOneDivA2 orderDivZ2 orderDis2">استان {{$buy->ostan}} - شهر {{$buy->city}} - {{$buy->address}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">کد پستی <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->codepost}}</div>
      </div>
      <div class="divLine"></div>
      <div class="buyOne2DivTitr">
        مشخصات پرداخت
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">کل پرداختی  <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{number_format($buy->amount)}} تومان</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">قیمت محصول<span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{number_format($buy->price_pro)}} تومان </div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">کارمزد<span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{number_format($buy->paywork)}} تومان</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">مالیات<span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{number_format($buy->scot)}} تومان</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">هزینه پست<span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{number_format($buy->price_post)}} تومان</div>
      </div>
  </div>
  {{-- <form class="form formAdmin form_sabtOrderBack_admin" id="form_sabtOrderBack_admin" action="" method="post">
     <div class="ajax_form_admin" id="ajax_sabtOrderBack"></div>
     {{ csrf_field() }}
     <div class="form-group textAll ">
        <label for="codeRahgiryBack" class="control-label pull-right "> کد رهگیری برگشتی</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="codeRahgiryBack"placeholder="کد رهگیری را وارد کنید .." value="{{$backPro->code_rahgiry}}"></div>
      </div>
      <div class="form-group textAll ">
         <label for="datePostBack" class="control-label pull-right "> تاریخ پست کالا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="datePostBack"placeholder="فرمت تاریخ 1398/01/01" value="{{$backPro->date_post}}"></div>
       </div>
       <div class="form-group textAll ">
          <label for="pricePostBack" class="control-label pull-right "> هزینه پست</label>
          <div class="div_form"><input type="text" class="form-control placeholder" id="pricePostBack"placeholder="به تومان ..." value="{{$backPro->price_post}}"></div>
       </div>
       <div class=" add_pro_form1_2">
         <label for="buyerDisBack" class="control-label pull-right placeholder"> توضیحات مشتری جهت ارجاع <i class="fas fa-star star_form"></i></label>
         <textarea name="" id="buyerDisBack">{{$backPro->buyer_dis }}</textarea>
       </div>
       <div class=" add_pro_form1_2">
         <label for="technicianDisBack" class="control-label pull-right placeholder">توضیحات کارشناس ارجاع <i class="fas fa-star star_form"></i></label>
         <textarea name="" id="technicianDisBack">{{$backPro->technician_dis}}</textarea>
       </div>
       <div class="form-group textAll ">
          <label for="payBuyerBack" class="control-label pull-right "> مبلغ پرداخت به مشتری</label>
          <div class="div_form"><input type="text" class="form-control placeholder" id="payBuyerBack"placeholder="به تومان ..." value="{{$backPro->pay_buyer}}"></div>
       </div>

      <div class="form-group divSabtForm">
        <button type="button" class="btn btn-success" onclick="orderBackEdit({{$backPro->id}})" >ثبت تغییرات</button>
      </div>
    </form>
    <div class="orderAghdamP">
      <button type="button"class="btn btn-success orderAghdamP1"onclick=""data-toggle="modal" data-target="#orderAghdamModal">برگشت به سفارشات ارسالی</button>
      <button type="button"class="btn btn-danger orderAghdamP2"onclick=""data-toggle="modal" data-target="#orderDelModal1">از سیستم حذف شود</button>
    </div> --}}
  {{-- modal --}}
  <div class="modal fade" id="orderAghdamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این سفارش را به سفارشات ارسالی باز گردانید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
          {{-- editStageOrderAdmin({{$buy->id}} , 4 ,{{$buy->code_rahgiry}}, {{$buy->date_post}} , orderBackShowAll); --}}
            <button type="button" class="btn btn-primary"onclick="delOrderBack({{$buy->id}},{{$backPro->id}},'','orderBackShowAll')" data-dismiss="modal"  aria-label="Close">بله</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
        </div>
      </div>
    </div>
  </div><!--end modal  -->
  <div class="modal fade" id="orderDelModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این سفارش را حذف کنید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary"onclick="delOrderBack({{$buy->id}},{{$backPro->id}},'ok','orderBackShowAll')" data-dismiss="modal"  aria-label="Close">بله</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
        </div>
      </div>
    </div>
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
