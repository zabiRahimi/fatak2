@extends('shop.layoutDashShop')
@section('title')
  داشبورد فروشنده
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
          <a href="/perfectDaShop" class="apjax">تکمیل اطلاعات</a>  وارد شوید .
        </p>
        <br>
        <p>
        جهت ادامه فعالیت و استفاده از امکانات پنل باید اطلاعات هویتی
        خود را وارد کنید .
        </p>
        <p>
          اطلاعات خود را با دقت و صحیح وارد کنید ، اطلاعات راستی آزمایی می شود .
        </p>
        <br>
        <a href="/perfectDaShop" class="apjax"><button type="button" class="btn btn-info">تکمیل اطلاعات</button> </a>
      </div>
    @endif

  </div>
@endsection
