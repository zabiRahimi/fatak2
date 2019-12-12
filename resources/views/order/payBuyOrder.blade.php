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
  @foreach ($dataPro as $key => $value)
    {{$key}} => {{$value}} <br>
  @endforeach
  <div class="contentOrder">
    <div class="payBuyAll">


    <div class="payBuy1">
      در حال حاضر پرداخت مبلغ کالا تنها از طریق درگاه اینترنتی فروشگاه مقدور می باشد .
    </div>
    <div class="payBuy2">
      <div class="payBuy3">
        <div class="payBuy3_1">مبلغ پرداخت :</div>
        <div class="payBuy3_2"><span>{{number_format($amount)}}</span> تومان</div>
      </div>
      <div class="payBuy4">
        <div class="payBuy4_1">
          <button type="button" class="btn btn-success" onclick="toBank({{$amount}},'{{$dataPro['name']}}')">پرداخت آنلاین</button>
        </div>
        <div class="payBuy4_2">
          <button type="button" class="btn btn-warning" onclick="delBuyOrder({{$dataPro['buy_id']}})">بعدا خرید می کنم</button>
        </div>
      </div>

    </div>
    </div>
  </div>
@endsection
