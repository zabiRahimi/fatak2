{{-- all_edit_pro.css --}}
@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: سفارش
@endsection
@section('show_pro')
  <div class="pro_titr">
   نمایش سفارش
   <button type="button" class="btn btn-primary btnBack" onclick="window.location='/orderBuy';">بازگشت</button>
  </div>
  <div class="pro_body ">
    <div id="buyOneDivH1">{{-- جهت پرینت --}}
      <div class="buyOneDivTitr">
        مشخصات محصول
        <button type="button" class="btn buyOnePrint"onclick="buyOnePrintSh('buyOneDivH1')" >پرینت</button>
      </div>
      <div class="buyOneDiv orderDiv orderName">
        <div class="buyOneDiv1 orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="buyOneDiv2 orderDivZ orderName2">{{$pro->name}}</div>
      </div>
      <div class="buyOneDiv orderDiv orderVahed">
        <div class="buyOneDiv1 orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buy->num}} {{$pro->vahed}} </div>
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

    <div class="orderLine"></div>
    <div id="buyOneDivH2">{{-- جهت پرینت --}}
      <div class="buyOne2DivTitr">
        مشخصات خریدار
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
      <div class="buyOneDivP buyOneShopPost">
        <div class="buyOneDivP1 buyOneShopPost1">نحوه پست درخواستی </div>
        <div class="buyOneDivP2 buyOneShopPost2"><span>پست {{$buy->post}}</span> </div>
      </div>
    </div>{{-- جهت پرینت --}}
  </div>

@endsection
