@extends('shop.layoutDashShop')
@section('title')
  محصولات خریداری شده
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
      محصولات خریداری شده
    </div>
    <div class="dashLBodySh">
      <div class="oldOrder">
        <div class="oldOrderRwo"><i class="fas fa-certificate"></i></div>
        <div class="oldOrderName">نام محصول</div>
        <div class="oldOrderVahed">نام خریدار</div>
        <div class="oldOrderDate">تاریخ خرید</div>
      </div>
      @php
        $r=0;

      @endphp
      @foreach ($proShop as $value)
        <?php
        // $checkOrder=$proShop->where('order_id',$value->id)->first();

        // if($checkOrder){continue;}
         $r++;
         if ($r%2==0) {
           $color='color1';
         }else {
           $color="color2";
         }
        ?>

        <a href="/buyProShopOne/{{$value->buyer_id}}/{{$value->id}}" class="oldOrderA">
          <div class="oldOrder_1 {{$color}}">
            <div class="oldOrderRwo_1 ">{{$r}}</div>
            <div class="oldOrderName_1">{{$value->name}}</div>
            <div class="oldOrderVahed_1">{{$value->date_ad}}</div>
            <div class="oldOrderDate_1">{{$value->date_up}}</div>
          </div>
        </a>
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
