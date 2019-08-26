{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: ثبت محصول تحویل گرفته شده
@endsection
@section('show_stockSaier')
  <div class="div_titr">
   ثبت سفارش تحویلی
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
          <button type="button" class="btn btn-success" onclick="orderSabtEndStockS()" >ثبت و جستجو</button>
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
              <div class="buyOneDiv1 orderDivZ0 orderDate1">سازنده محصول <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$pro->made}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderSquad">
              <div class="buyOneDiv1 orderDivZ0 orderSquad1">مدل محصول <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderSquad2">{{$pro->model}}</div>
            </div>
            <div class="buyOneDivM orderDiv2 orderDis">
              <div class="buyOneDiv1M orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2M orderDivZ2 orderDis2">{{$buy->dis}}</div>
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
            <div class="buyOneDiv orderDiv orderDate">
              <div class="buyOneDiv1 orderDivZ0 orderDate1">استان <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->ostan}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderSquad">
              <div class="buyOneDiv1 orderDivZ0 orderSquad1">شهر <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderSquad2">{{$buy->city}}</div>
            </div>
            <div class="buyOneDivA orderDiv2 orderDis">
              <div class="buyOneDivA1 orderDivZ02 orderDis1">آدرس <span class="orderDivSpan">:</span></div>
              <div class="buyOneDivA2 orderDivZ2 orderDis2">{{$buy->address}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderDate">
              <div class="buyOneDiv1 orderDivZ0 orderDate1">کد پستی <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->codepost}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderDate">
              <div class="buyOneDiv1 orderDivZ0 orderDate1">تلفن <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->tel}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderDate">
              <div class="buyOneDiv1 orderDivZ0 orderDate1">نحوه پست <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->post}}</div>
            </div>
            <div class="buyOneDiv orderDiv orderDate">
              <div class="buyOneDiv1 orderDivZ0 orderDate1">کد رهگیری <span class="orderDivSpan">:</span></div>
              <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->code_rahgiry}}</div>
            </div>

        </div>
        <div class="orderAghdam">
          {{-- , 5 , {{$buy->code_rahgiry}}, '{{$buy->date_post}}','orderSabtEndStockS' --}}
          <button type="button"class="btn btn-success orderAghdam1"onclick="editStageOrderNSS({{$buy->id}}, 5 , {{$buy->code_rahgiry}}, '{{$buy->date_post}}','orderSabtEndStockS')">به عنوان سفارش تحویلی ثبت شود</button>
        </div>

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
