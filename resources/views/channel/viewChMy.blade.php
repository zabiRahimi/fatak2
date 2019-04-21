@extends('channel.dashChLayout')
@section('title')
  آمار بازدید شبکه من
@endsection
@section('dash_content')
  <div class="dashTitrCh">
    آمار بازدید شبکه من
  </div>
  <div class="dashLBodyCh">
    @if ($stage==1)
      <div class="NoPerfectDaCH">
        <span>توجه :</span>
        <br>
        <p>
          شما تاکنون اطلاعات هویتی خود را تکمیل نکرده اید . جهت تکمیل اطلاعات به صفحه
          <a href="/perfectDaCh" class="apjax">تکمیل اطلاعات</a>  وارد شوید .
        </p>
        <br>
        <a href="/perfectDaCh" class="apjax"><button type="button" class="btn btn-info">تکمیل اطلاعات</button> </a>
      </div>
    @else
    <div class="divViweChMy div1ViweChMy">
      <span>کل بازدیدها :</span><span>123</span>
    </div>
    <div class="divViweChMy div2ViweChMy">
      <span>بازدیدهای ماه جاری :</span><span>923564587</span>
    </div>
    <div class="divViweChMy div3ViweChMy">
      <span>بازدیدهای تصویه شده :</span><span>233568974</span>
    </div>
    <div class="divViweChMy div4ViweChMy">
      <span>بازدیدهای تصویه نشده :</span><span>237878878</span>
    </div>
    <div class="divViweChMy div5ViweChMy">
      <span>بازدیدهای منجر به خرید :</span><span>23989744</span>
    </div>
    <div class="divViweChMy div6ViweChMy">
      <span>بازدیدهای منجر به خرید تصویه شده :</span><span>98455234</span>
    </div>
    <div class="divViweChMy div7ViweChMy">
      <span>بازدیدهای منجر به خرید تصویه نشده :</span><span>98645234</span>
    </div>
    @endif
  </div>
@endsection
