{{-- all_edit_pro.css --}}
@extends('management.order_proStockSaier.layoutOrder_proStockSaier')
 @section('title')
  مدیریت :: سفارش در حال اقدام
@endsection
@section('show_stockSaier')
  <div class="div_titr">
   نمایش سفارش در حال اقدام
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/proceedOrderStockS';">بازگشت</button>
  </div>
  <div class="div_body ">
    <div id="buyOneDivH1">{{-- جهت پرینت --}}
      <div class="buyOneDivTitr">
        مشخصات محصول
        <span class="codeOrder">
          <span class="codeOrder1">کد سفارش :</span>
          <span class="codeOrder2">{{$buy->id}}</span>
        </span>
        <button type="button" class="btn buyOnePrint"onclick="buyOnePrintSh('buyOneDivH1')" >پرینت</button>
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
    </div>{{-- جهت پرینت --}}

    <div class="divLine"></div>
    <div id="buyOneDivH2">{{-- جهت پرینت --}}
      <div class="buyOne2DivTitr">
        مشخصات خریدار
        <span class="codeOrder">
          <span class="codeOrder1">کد سفارش :</span>
          <span class="codeOrder2">{{$buy->id}}</span>
        </span>
        <button type="button" class="btn buyOnePrint" onclick="buyOnePrintSh('buyOneDivH2')" >پرینت</button>
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
        <div class="buyOneDiv1 orderDivZ0 orderDate1">نحوه پست<span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$buy->post}}</div>
      </div>
    </div>{{-- جهت پرینت --}}
    <div class="divLine"></div>
    <div id="buyOneDivH2">{{-- جهت پرینت --}}
      <div class="buyOne2DivTitr">
        مشخصات فروشنده
        <span class="codeOrder">
          <span class="codeOrder1">کد فروشنده :</span>
          <span class="codeOrder2">{{$shop->id}}</span>
        </span>
        <button type="button" class="btn buyOnePrint" onclick="buyOnePrintSh('buyOneDivH2')" >پرینت</button>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام فروشگاه <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$shop->shop}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">فروشنده<span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$shop->seller}} </div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">موبایل <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$shop->mobail}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderSquad">
        <div class="buyOneDiv1 orderDivZ0 orderSquad1">تلفن <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderSquad2">{{$shop->tel}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">استان <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$shop->ostan}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">شهر <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$shop->city}}</div>
      </div>
      <div class="buyOneDivA orderDiv2 orderDis">
        <div class="buyOneDivA1 orderDivZ02 orderDis1">آدرس <span class="orderDivSpan">:</span></div>
        <div class="buyOneDivA2 orderDivZ2 orderDis2">{{$shop->address}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">کد پستی <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$shop->codepost}}</div>
      </div>

      <div class="buyOneDiv orderDiv orderDate">
        <div class="buyOneDiv1 orderDivZ0 orderDate1">رتبه<span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderDate2">{{$shop->rank}}</div>
      </div>
    </div>{{-- جهت پرینت --}}
    <div class="orderAghdamP">
      <button type="button"class="btn btn-primary orderAghdamP1"onclick=""data-toggle="modal" data-target="#orderBackModal">به سفارشات جدید برگردد</button>
      <button type="button"class="btn btn-danger orderAghdamP2"onclick=""data-toggle="modal" data-target="#orderDelModal">از سیستم حذف شود</button>
    </div>
  </div>
  {{-- modal --}}
  <div class="modal fade" id="orderBackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این محصول به صفحه محصولات سفارش شده برگردد؟</span>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary"onclick="backOrderNSS({{$buy->id}},'proceedOrderStockS')" data-dismiss="modal"  aria-label="Close">بله</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
        </div>
      </div>
    </div>
  </div><!--end modal  -->
  <div class="modal fade" id="orderDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body orderAghdamModal2 ">
          <span><b>توجه !!</b> آیا می خواهید این سفارش را حذف کنید ؟ </span>
        </div>
        <div class="orderAghdamModal3">
            <button type="button" class="btn btn-primary"onclick="delBuyOrderAdmin({{$buy->id}},1,'proceedOrderStockS')" data-dismiss="modal"  aria-label="Close">بله</button>
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
