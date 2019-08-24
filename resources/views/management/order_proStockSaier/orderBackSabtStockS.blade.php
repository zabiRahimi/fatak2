{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: ثبت سفارش مرجوعی
@endsection
@section('show_pro')
  <div class="div_titr">
   ثبت سفارش مرجوعی
  </div>
  <div class="div_body ">
    <form class="form formAdmin formCodePA" id="form_sabtCodePSh" action="" method="post">
       <div class="ajax_form_admin" id="ajax_codePAA"></div>
       {{ csrf_field() }}
       <div class="form-group textAll divFormCodePA">
          <label for="code_sabtCodePSh" class="control-label pull-right ">کد سفارش</label>
          <div class="div_form"><input type="text" class="form-control placeholder" id="code_ersalOrder"placeholder="کد سفارش را وارد کنید .." value=""></div>
        </div>
        <div class="form-group divSabtForm">
          <button type="button" class="btn btn-success" onclick="orderBackSabt()" >ثبت و جستجو</button>
        </div>
      </form>
      @if (!empty($buy_id))
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
        <form class="form formAdmin form_sabtOrderBack_admin" id="form_sabtOrderBack_admin" action="" method="post">
           <div class="ajax_form_admin" id="ajax_sabtOrderBack"></div>
           {{ csrf_field() }}
           <div class="form-group textAll ">
              <label for="codeRahgiryBack" class="control-label pull-right "> کد رهگیری برگشتی</label>
              <div class="div_form"><input type="text" class="form-control placeholder" id="codeRahgiryBack"placeholder="کد رهگیری را وارد کنید .." value=""></div>
            </div>
            <div class="form-group textAll ">
               <label for="datePostBack" class="control-label pull-right "> تاریخ پست کالا</label>
               <div class="div_form"><input type="text" class="form-control placeholder" id="datePostBack"placeholder="فرمت تاریخ 1398/01/01" value=""></div>
             </div>
             <div class="form-group textAll ">
                <label for="pricePostBack" class="control-label pull-right "> هزینه پست</label>
                <div class="div_form"><input type="text" class="form-control placeholder" id="pricePostBack"placeholder="به تومان ..." value=""></div>
             </div>
             <div class=" textareaEditor">
               <label for="buyerDisBack" class="control-label pull-right placeholder"> توضیحات مشتری جهت ارجاع <i class="fas fa-star star_form"></i></label>
               <textarea class="editor"name="" id="buyerDisBack"></textarea>
             </div>
             <div class=" textareaEditor">
               <label for="technicianDisBack" class="control-label pull-right placeholder">توضیحات کارشناس ارجاع <i class="fas fa-star star_form"></i></label>
               <textarea class="editor"name="" id="technicianDisBack"></textarea>
             </div>
             <div class="form-group textAll ">
                <label for="payBuyerBack" class="control-label pull-right "> مبلغ پرداخت به مشتری</label>
                <div class="div_form"><input type="text" class="form-control placeholder" id="payBuyerBack"placeholder="به تومان ..." value=""></div>
             </div>

            <div class="form-group divSabtForm">
              <button type="button" class="btn btn-success" onclick="orderBackSave({{$buy->id}} ,{{$buy->pro_id}} ,{{$buy->shop_id}})" >ثبت اطلاعات</button>
            </div>
          </form>

      @endif

  </div>

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
