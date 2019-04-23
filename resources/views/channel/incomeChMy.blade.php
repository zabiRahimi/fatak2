@extends('channel.dashChLayout')
@section('title')
  درآمد شبکه من
@endsection
@section('dash_content')
  <div class="dashTitrCh">
    در آمد و ارزش بازدید من
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
    <div class="alert alert-warning">
      <strong>توجه !</strong> درآمد ماه جاری محاسبه نشده است .
    </div>
    <div class="incomeChMy incomeChMy1">
        <div class="incomeChMy1_1">ارزش بازدید ماه گذشته</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy2">
        <div class="incomeChMy1_1">درآمد کل شبکه من</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy3">
        <div class="incomeChMy1_1">درآمد ماه گذشته شبکه من</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy4">
        <div class="incomeChMy1_1">درآمد بازدید ماه گذشته شبکه من</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy5">
        <div class="incomeChMy1_1">درآمد بازدید منجر به خرید شبکه من</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy6">
        <div class="incomeChMy1_1">درآمد تصویه شده</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy7">
        <div class="incomeChMy1_1">درآمد تصویه نشده</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy8">
        <div class="incomeChMy1_1">درآمد کل شبکه ها</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy9">
        <div class="incomeChMy1_1">درآمد ماه گذشته کل شبکه ها</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy ">
      <div class="divIncomeChMy">پر درآمد ترینها</div>
      <div class="divIncomeChMy2_1">
        <div class="div34IncomeChMy2">19</div>
        <div class="div34IncomeChMy3">zabi alll rahimi sdjjj</div>
        <div class="div34IncomeChMy4">{{number_format(52012223)}} <span>تومان</span> </div>
      </div>

    </div>
    <div class="incomeChMy incomeChMy10">
        <div class="incomeChMy1_1">رتبه درآمد شبکه من</div>
        <div class="incomeChMy1_2">520122</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    @endif
  </div>

@endsection
