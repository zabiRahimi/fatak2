@extends('shop.layoutDashShop')
@section('title')
  مشخصات محصول و خریدار
@endsection

@section('dash_content')

    <div class="dashTitrSh">
    مشخصات محصول و خریدار
      <a href="/buyProShop"><button type="button" class="btn btnBack" onclick="">  بازگشت  </button></a>
    </div>
       {{-- <br /> --}}

    <div class="dashLBodySh">
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
          <div class="buyOneDiv2 orderDivZ orderVahed2">{{$pro->num}} {{$pro->vahed}} </div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">سازنده محصول <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$pro->maker}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderSquad">
          <div class="buyOneDiv1 orderDivZ0 orderSquad1">مدل محصول <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderSquad2">{{$pro->model}}</div>
        </div>
        <div class="buyOneDivM orderDiv2 orderDis">
          <div class="buyOneDiv1M orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2M orderDivZ2 orderDis2">{{$buyer->dis}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">تاریخ خرید <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyer->date_up}}</div>
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
          <div class="buyOneDiv2 orderDivZ orderName2">{{$buyer->name}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderVahed">
          <div class="buyOneDiv1 orderDivZ0 orderVahed1">موبایل<span class="orderDivSpan">:</span> </div>
          <div class="buyOneDiv2 orderDivZ orderVahed2">{{$buyer->mobail}} </div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">استان <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyer->ostan}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderSquad">
          <div class="buyOneDiv1 orderDivZ0 orderSquad1">شهر <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderSquad2">{{$buyer->city}}</div>
        </div>
        <div class="buyOneDivA orderDiv2 orderDis">
          <div class="buyOneDivA1 orderDivZ02 orderDis1">آدرس <span class="orderDivSpan">:</span></div>
          <div class="buyOneDivA2 orderDivZ2 orderDis2">{{$buyer->address}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">کد پستی <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyer->codepost}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">تلفن <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$buyer->tel}}</div>
        </div>
        <div class="buyOneDivP buyOneShopPost">
          <div class="buyOneDivP1 buyOneShopPost1">نحوه پست درخواستی </div>
          <div class="buyOneDivP2 buyOneShopPost2"><span>پست {{$buyer->post}}</span> </div>
        </div>
      </div>{{-- جهت پرینت --}}
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تغییرات با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
   {{--  --}}

@endsection
