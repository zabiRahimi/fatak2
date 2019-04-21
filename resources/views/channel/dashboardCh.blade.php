@extends('channel.dashChLayout')
@section('title')
  داشبورد کانال
@endsection
@section('dash_content')
  <div class="dashTitrCh">
    صفحه نخست داشبورد
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
        <p>
          جهت دریافت کد و آدرس مربوط به شبکه اجتماعی خود و استفاده از امکانات
          پنل می بایست اطلاعات هویتی خود را تکمیل نمایید .
        </p>
        <br>
        <a href="/perfectDaCh" class="apjax"><button type="button" class="btn btn-info">تکمیل اطلاعات</button> </a>

      </div>
    @endif

  </div>
@endsection
