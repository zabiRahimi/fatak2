@extends('order.layoutOrder')
@section('title')
  صفحه پرداخت
@endsection
@section('content')
  <div class="headerOrder">
    <div class="headerOrder_1">صفحه پرداخت</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <div class="contentOrder">
    <div class="payBuyAll">


    <div class="payBuy1">
      در حال حاضر پرداخت مبلغ کالا تنها از طریق درگاه اینترنتی فروشگاه مقدور می باشد .
    </div>
    <div class="payBuy2">
      <div class="">
        <div class="">مبلغ پرداخت :</div>
        <div class=""></div>
      </div>
      <div class="">
        <div class="">
          <button type="button" class="btn btn-success" name="button">پرداخت آنلاین</button>
        </div>
        <div class="">
          <button type="button" class="btn btn-warning" name="button">بعدا خرید می کنم</button>
        </div>
      </div>

    </div>
    </div>
  </div>
@endsection
