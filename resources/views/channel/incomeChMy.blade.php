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
        <div class="incomeChMy1_2 number">{{number_format($view_income_month)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy2">
        <div class="incomeChMy1_1">کل درآمد شبکه من</div>
        <div class="incomeChMy1_2 number">{{number_format($allIncome_my->income)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy3">
        <div class="incomeChMy1_1">کل درآمد ماه گذشته شبکه من</div>
        <div class="incomeChMy1_2 number">{{number_format($allIncomeMonth_my)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy4">
        <div class="incomeChMy1_1">درآمد بازدید ماه گذشته شبکه من</div>
        <div class="incomeChMy1_2 number">{{number_format($view_income_month_my)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy5">
        <div class="incomeChMy1_1 ">درآمد خرید ماه گذشته من</div>
        <div class="incomeChMy1_2 number">{{number_format($price_buy_month_my)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy6">
        <div class="incomeChMy1_1">درآمد تسویه شده</div>
        <div class="incomeChMy1_2 number">{{number_format($defray_my)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy7">
        <div class="incomeChMy1_1">درآمد تسویه نشده</div>
        <div class="incomeChMy1_2 number">{{number_format($noDefray_my)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy8">
        <div class="incomeChMy1_1">درآمد کل شبکه ها</div>
        <div class="incomeChMy1_2 number">{{number_format($all_income)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy incomeChMy9">
        <div class="incomeChMy1_1">درآمد ماه گذشته کل شبکه ها</div>
        <div class="incomeChMy1_2 number">{{number_format($month_income->channel)}}</div>
        <div class="incomeChMy1_3">تومان</div>
    </div>
    <div class="incomeChMy ">
      <div class="divIncomeChMy">پر درآمد ترینها</div>
      @php
        $r=0;
      @endphp
      @foreach ($superIncomeCh as $super)
        @php
          $r++;
        @endphp
        <div class="divIncomeChMy2_1">
          <div class="div34IncomeChMy2 number">{{$r}}</div>
          <div class="div34IncomeChMy3">{{$super->name}}</div>
          <div class="div34IncomeChMy4 number">{{number_format($super->income)}} <span>تومان</span> </div>
        </div>
        @break($r==10)
      @endforeach


    </div>
    <div class="incomeChMy incomeChMy10">
        <div class="incomeChMy1_1">رتبه درآمد شبکه من</div>
        @php
          $r2=0;
        @endphp
        @foreach ($superIncomeCh as $super)
          @php
            $r2++;
            $superId=$super->id;
          @endphp
          @if ($superId==$id)
            <div class="incomeChMy1_2 ">{{$r2}}</div>
          @endif
          @break($superId==$id)
        @endforeach

        <div class="incomeChMy1_3"></div>
    </div>
    @endif
  </div>

@endsection
