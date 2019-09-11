{{-- all_edit_pro.css --}}
@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارش جدیدغیر ثابت فاتک
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   نمایش سفارش غیر ثابت فاتک
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/orderBuyUnStockF';">بازگشت</button>
  </div>
  <div class="div_body ">
    <div id="buyOneDivH1">{{-- جهت پرینت --}}
      <div class="buyOneDivTitr">
        مشخصات محصول
        <span class="codeOrder">
          <span class="codeOrder1">کد محصول :</span>
          <span class="codeOrder2">{{$proShop->id}}</span>
        </span>
        <button type="button" class="btn buyOnePrint"onclick="buyOnePrintSh('buyOneDivH1')" >پرینت</button>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$proShop->name}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buyOrder->num_pro}} {{$proShop->vahed}} </div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">سازنده محصول <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$proShop->made}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderSquad">
        <div class="buyOneDiv1 orderDivZ0 orderSquad1">مدل محصول <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderSquad2">{{$proShop->model}}</div>
      </div>
      <div class="buyOneDivM orderDiv2 orderDis">
        <div class="buyOneDiv1M orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2M orderDivZ2 orderDis2">{{$buyOrder->dis}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">تاریخ خرید <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{str_replace('-', '/',$buyOrder->date_up )}}</div>
      </div>
    </div>{{-- جهت پرینت --}}

    <div class="divLine"></div>
    <div id="buyOneDivH2">{{-- جهت پرینت --}}
      <div class="buyOne2DivTitr">
        مشخصات خریدار
        <span class="codeOrder">
          <span class="codeOrder1">کد خرید :</span>
          <span class="codeOrder2">{{$buyOrder->id}}</span>
        </span>
        <button type="button" class="btn buyOnePrint" onclick="buyOnePrintSh('buyOneDivH2')" >پرینت</button>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام خریدار <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$buyOrder->name}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">موبایل<span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buyOrder->mobail}} </div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">استان <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyOrder->ostan}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderSquad">
        <div class="buyOneDiv1 orderDivZ0 orderSquad1">شهر <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderSquad2">{{$buyOrder->city}}</div>
      </div>
      <div class="buyOneDivA orderDiv2 orderDis">
        <div class="buyOneDivA1 orderDivZ02 orderDis1">آدرس <span class="orderDivSpan">:</span></div>
        <div class="buyOneDivA2 orderDivZ2 orderDis2">{{$buyOrder->address}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">کد پستی <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyOrder->codepost}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">تلفن <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyOrder->tel}}</div>
      </div>
      <div class="buyOneDivP buyOneShopPost">
        <div class="buyOneDivP1 buyOneShopPost1">نحوه پست درخواستی </div>
        <div class="buyOneDivP2 buyOneShopPost2"><span>پست {{$buyOrder->post}}</span> </div>
      </div>
    </div>{{-- جهت پرینت --}}
    <div class="orderAghdamP">
      <button type="button"class="btn btn-success orderAghdamP1"onclick=""data-toggle="modal" data-target="#orderAghdamModal">اقدام شود</button>
      <button type="button"class="btn btn-danger orderAghdamP2"onclick=""data-toggle="modal" data-target="#orderDelModal1">از سیستم حذف شود</button>
    </div>
  </div>
  {{-- modal --}}
  <div class="modal fade" id="orderAghdamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا اطلاعات محصول و خریدار را چاپ کرده اید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary"onclick="orderAghdamAdmin({{$buyOrder->id}},2,'orderBuyUnStockF')" data-dismiss="modal"  aria-label="Close">بله</button>
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
            <button type="button" class="btn btn-primary"onclick="delBuyOrderAdmin({{$buyOrder->id}},2,'orderNewPUnStockF')" data-dismiss="modal"  aria-label="Close">بله</button>
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
