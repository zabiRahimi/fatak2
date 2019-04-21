@extends('channel.dashChLayout')
@section('title')
  آمار بازدید کل شبکه ها
@endsection
@section('dash_content')
  <div class="dashTitrCh">
    بازدید کل شبکه ها
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
    <div class="divViweChAll div0ViweChAll">
      <span>تعداد کل شبکه ها :</span><span>123</span>
    </div>
    <div class="divViweChAll div1ViweChAll">
      <span>کل بازدیدها :</span><span>123</span>
    </div>
    <div class="divViweChAll div2ViweChAll">
      <span>کل بازدیدهای ماه جاری :</span><span>923564587</span>
    </div>
    <div class="divViweChAll2 div3ViweChAll">
      <div class="div3ViweChAll1">پر بازدیدترینها</div>
      <div class="divViweChAll2_1">
        <div class="div34ViweChAll2">19</div>
        <div class="div34ViweChAll3">zabi alll rahimi sdjjj</div>
        <div class="div34ViweChAll4">148456987 <span>بازدید</span> </div>
      </div>
    </div>
    <div class="divViweChAll2 div4ViweChAll">
      <div class="div4ViweChAll1">پر بازدیدترینها ماه جاری</div>
      <div class="divViweChAll2_1">
        <div class="div34ViweChAll2">1</div>
        <div class="div34ViweChAll3">zabi alll rahimi sdjjj</div>
        <div class="div34ViweChAll4">148456987 <span>بازدید</span> </div>
      </div>
    </div>
    <div class="divViweChAll div5ViweChAll">
      <span>رتبه شبکه من :</span><span>123</span>
    </div>
    @endif
  </div>
@endsection
