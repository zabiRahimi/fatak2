@extends('channel.dashChLayout')
@section('title')
  کد وآدرس شبکه من
@endsection
@section('dash_content')
  <div class="dashTitrCh">
    کد وآدرس شبکه من
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
    @else
    <p>
      آدرسی که شما باید در شبکه خود از آن استفاده کنید ، آدرس زیر می باشد :
    </p>
    <div class="divUrlCHMy">
      www/fatak/{{$id}}
    </div>
    <p>
      این آدرس مخصوص شما است ، شما به هیج وجه نباید تغییری در آن ایجاد کنید ، هر گونه تغییر در آدرس
      باعث عدم ثبت بازدید برای شما می شود .
      <br>
      شما می توانید از این آدرس در هر شبکه اجتماعی که دارید استفاده نمایید .
    </p>
    @endif
  </div>

@endsection
