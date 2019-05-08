@extends('shop.layoutDashShop')
@section('title')
  سفارشات جدید
@endsection
@section('dash_content')
  @if ($stage==1)
    <div class="NoperfectDaSh">
      <span>توجه :</span>
      <br>
      <p>
        شما تاکنون اطلاعات هویتی خود را تکمیل نکرده اید . جهت تکمیل اطلاعات به صفحه
        <a href="/editDaShop" class="apjax">تکمیل اطلاعات</a>  وارد شوید .
      </p>
      <br>
      <a href="/perfectDaShop" class="apjax"><button type="button" class="btn btn-info">تکمیل اطلاعات</button> </a>
    </div>
  @else
    <div class="dashTitrSh">
      سفارشات جدید
    </div>
    <div class="dashLBodySh">
      <div class="newOrder">
        <div class="newOrderRwo"><i class="fas fa-certificate"></i></div>
        <div class="newOrderName">نام محصول</div>
        <div class="newOrderVahed">واحد</div>
        <div class="newOrderDate">تاریخ</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($newOrder as $value)
        <?php
         $r++;
         if ($r%2==0) {
           $color='color1';
         }else {
           $color="color2";
         }
        ?>
        <div class="newOrder_1 {{$color}}">
          <div class="newOrderRwo_1 ">{{$r}}</div>
          <div class="newOrderName_1">{{$value->name}}</div>
          <div class="newOrderVahed_1">
            <span>{{$value->num}}</span>
            <span>{{$value->vahed}}</span>
          </div>
          <div class="newOrderDate_1">{{$value->date_ad}}</div>
        </div>
      @endforeach

    </div>
  @endif
   <!-- Modal موفق بودن ثبت ابتدایی کانال-->
   <div class="modal fade" id="end_perfectDaSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تکمیل اطلاعات انجام شد . شما هم اکنون می توانید سفارشهای مشتریان را مشاهده کنید  .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
@endsection
