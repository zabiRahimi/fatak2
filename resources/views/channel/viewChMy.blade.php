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
      <span>کل بازدیدها من :</span><span class="number">{{number_format($count)}}</span>
    </div>
    <div class="divViweChMy div2ViweChMy">
      <span>بازدیدهای ماه جاری من :</span><span class="number">{{number_format($count_view_month)}}</span>
    </div>
    <div class="divViweChMy div3ViweChMy">
      <span>بازدیدهای ماه گذشته من :</span><span class="number">{{number_format($count_view_monthPast)}}</span>
    </div>
    <div class="divViweChMy div5ViweChMy">
      <span>کل بازدیدهای منجر به خرید من :</span><span class="number">{{number_format($count_buy)}}</span>
    </div>
    <div class="divViweChMy div5ViweChMy">
      <span>بازدیدهای منجر به خرید ماه جاری :</span><span class="number">{{number_format($count_buy_month)}}</span>
    </div>
    <div class="divViweChMy div6ViweChMy">
      <span>بازدیدهای منجر به خرید ماه گذشته :</span><span class="number">{{number_format($buy_monthPast)}}</span>
    </div>
    @endif
  </div>
@endsection
