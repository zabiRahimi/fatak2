@if (empty($proShop[0]->id))
  محصولی یافت نشد .
@else
  <div class="divOrderRow1">
    <div class="divOrderSPR"><i class="fas fa-certificate"></i></div>
    <div class="divOrderSP1">نام محصول</div>
    <div class="divOrderSP2">کد محصول</div>
    <div class="divOrderSP3">قیمت (تومان)</div>
    <div class="divOrderSP4">تاریخ ثبت</div>
  </div>
  @php
    $r=0;

  @endphp
  @foreach ($proShop as $value)
    <?php $r++;
    if ($r%2==0) {
      $color='color1';
    }else {
      $color="color2";
    }
     ?>
    <div class="divOrderRow2 {{$color}}">
      <div class="divOrderSPR">{{$r}}</div>
      <div class="divOrderSP1">{{$value->name}}</div>
      <div class="divOrderSP2">{{$value->id}}</div>
      <div class="divOrderSP3">{{$value->price}} <span>تومان</span> </div>
      <div class="divOrderSP4">{{str_replace('-', '/',$value->date_up )}}</div>
    </div>
  @endforeach
@endif
