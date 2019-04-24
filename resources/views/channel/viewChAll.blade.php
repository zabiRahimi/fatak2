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
      <span>تعداد کل شبکه ها :</span><span>{{$count_ch}}</span>
    </div>
    <div class="divViweChAll div1ViweChAll">
      <span>کل بازدیدها :</span><span>{{$count_view_ch}}</span>
    </div>
    <div class="divViweChAll div2ViweChAll">
      <span>کل بازدیدهای ماه جاری :</span><span>{{$count_view_month}}</span>
    </div>
    <div class="divViweChAll2 div3ViweChAll">
      <div class="div3ViweChAll1">پر بازدیدترینها</div>
      @php
        $i=0;
        $i2=0;
        $i3=0;
      @endphp
      @foreach ($bigViewCh as $val)
        @php
          $ch=$channel->find($val->channel_id);
          $i++;

        @endphp
      <div class="divViweChAll2_1">
        <div class="div34ViweChAll2">{{$i}}</div>
        <div class="div34ViweChAll3">{{$ch->name}}</div>
        <div class="div34ViweChAll4">{{$val->ch_views}} <span>بازدید</span> </div>
      </div>
      @break($i==10)
      @endforeach


    </div>
    <div class="divViweChAll2 div4ViweChAll">
      <div class="div4ViweChAll1">پر بازدیدترینها ماه جاری</div>
      @foreach ($bigViewChMont as $val)
        @php
          $ch=$channel->find($val->channel_id);
          $i2++;
        @endphp
      <div class="divViweChAll2_1">
        <div class="div34ViweChAll2">{{$i2}}</div>
        <div class="div34ViweChAll3">{{$ch->name}}</div>
        <div class="div34ViweChAll4">{{$val->ch_views}} <span>بازدید</span> </div>
      </div>

        @break($i2==10)

      @endforeach
    </div>
    <div class="divViweChAll div5ViweChAll">
      <span>رتبه شبکه من :</span>

      @foreach ($bigViewCh as $val)
        @php
          $i3++;
          $valId=$val->channel_id;
        @endphp
        @if ($valId==$id)
          <span>{{$i3}}</span>
        @endif
      @break($valId==$id)
      @endforeach
    </div>
    @endif
  </div>
@endsection
