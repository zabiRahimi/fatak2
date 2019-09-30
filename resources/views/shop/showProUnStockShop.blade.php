@extends('shop.layoutDashShop')
@section('title')
  سفارشات غیر ثابت
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
      سفارشات غیر ثابت
    </div>
    <div class="div_search_c">
      <button type="button" class="btn btn_search_c" onclick="allpro_searchC('proSPUSS' , 'showProUnStockShop')">همه محصولات</button>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_pro_date_c placeholder" id="pro_searchSPUSS" placeholder="نام محصول">
        <button type="button" class="btn_date_c btn" onclick="pro_searchC('proSPUSS' , 'pro_searchSPUSS' , 'showProUnStockShop')"><i class="fas fa-search"></i></button>
      </div>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_code_date_c placeholder"  id="id_searchSPUSS" placeholder="کد محصول">
        <button type="button" class="btn_date_c btn"onclick="id_searchC('id_searchSPUSS' , 'showProUnStockShop',1) "><i class="fas fa-search"></i></button>
      </div>
      </div>
    <div class="dashLBodySh">
      <div class="div_map_c">
        <span>{{$mapPro}} </span>
      </div>
      @if (empty($proShop[0]['id']) and $notRecord=='ok')
        <div class="div_alert alert alert-danger">
          تا کنون هیچ محصول غیر ثابتی ثبت نشده است .
        </div>
      @elseif (empty($proShop[0]['id']) and $notRecord=='no')
        <div class="div_alert alert alert-danger">
          طبق جستجوی شما محصولی یافت نشد .
        </div>
      @else
      <div class="showProUSSAll">
      <div class="showProUSS">
        <div class="showProUSSRwo"><i class="fas fa-certificate"></i></div>
        <div class="showProUSSName">نام محصول</div>
        <div class="showProUSSECode">کد محصول</div>
        <div class="showProUSSPrice">قیمت (تومان)</div>
        <div class="showProUSSOrder">پیشنهاد به مشتری</div>
        <div class="showProUSSDate">تاریخ ثبت</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($proShop as $value)
        <?php
        // $checkOrder=$stampProOrder->where('order_id',$value->id)->first();
        // if($checkOrder){continue;}
         $r++;
         if ($r%2==0) {
           $color='color1';
         }else {
           $color="color2";
         }
        ?>
        <a href="/newOrderShopOne/{{$value->id}}" class="showProUSSA">
          <div class="showProUSS showProUSS_1 {{$color}}">
            <div class="showProUSSRwo  ">{{$r}}</div>
            <div class="showProUSSName showProUSSName_1">{{$value->name}}</div>
            <div class="showProUSSECode">
              {{$value->id}}
            </div>
            <div class="showProUSSPrice">{{$value->price}} <span>تومان</span> </div>
            <div class="showProUSSOrder">@if ($value->offerOrder) {{$value->offerOrder}} <span>مورد</span>@else 0 @endif</div>
            <div class="showProUSSDate">{{verta($value->date_up)->format('Y/n/j')}}</div>
          </div>
        </a>
      @endforeach
    </div>

    @endif
    </div>
  @endif


@endsection
