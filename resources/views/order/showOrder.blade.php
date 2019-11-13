@extends('order.layoutOrder')
@section('title')
 مشاهده محصولات
@endsection
@section('content')
  <div class="headerOrder">
    <div class="headerOrder_1">مشاهده محصولات</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line headerOrderUl ">
    <li onclick="window.location.href='/'">صفحه اصلی</li>
    <li onclick="window.location.href='/searchOrder'">برگشت</li>
   <li>نحوه فعالیت</li>
   <li>قوانین و مقررات</li>
  </ul>
  <div class="contentOrder">
    @if (!empty($pro[0]->id))
      <div class="mapOrder">
        <span class="span1MapOrder">{{$pro_count}}</span>
        <span class="span2MapOrder">محصول از</span>
        <span class="span3MapOrder">{{$shop_count}}</span>
        <span class="span4MapOrder">فروشنده</span>
      </div>
      <div class="proBadyOrder">
        @foreach ($id_pro as $value)
          @php
          $pro=$pro->find($value);
          $imgValue=$img->where('pro_id',$pro->id)->first();
          $shopValue=$shop->where('id',$pro->shop_id)->first();
          $stampProOrderValue=$stampProOrder->where('pro_id',$pro->id)->where('shop_id',$pro->shop_id)->first();
          @endphp
          <a href="/showOneOrder/{{$pro->id}}/{{ $order_id }}">
            <div class="proOrder">

              <div class="proAllorder proImgOrder">@if (!empty($imgValue->pic_b1)) <img src="/img_pro/{{$imgValue->pic_b1}}"  alt="fatak"> @else <i class='fas fa-camera' style='font-size:48px;color:#fff'></i> @endif </div>
              <div class="proAllorder proStampOrder">@if ($stampProOrderValue->stamp==1) <span class="alert alert-success"> اصل محصول</span> @else <span class="alert alert-warning"> مشابه محصول</span> @endif </div>
              <div class="proAllorder proNameOrder">{{$pro->name}}</div>
              <div class="proAllorder proPriceOrder number"><span>{{number_format($pro->price)}}</span><span>تومان</span> </div>
              <div class="proAllorder proShopOrder"><span>فروشنده : </span><span>{{$shopValue->shop}}</span> </div>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="noProSo">
        <div class="alert alert-danger right">
          تاکنون هیچ فروشنده ای محصولی برای پیشنهاد به شما ثبت نکرده است .
        </div>
        <div class="alert alert-info right">
        چنانچه 48 ساعت از ثبت سفارش شما می گذرد با شماره زیر تماس بگیرید .
        <br>
        09178023733
        </div>
      </div>
    @endif
  </div>

<!-- Modal موفق بودن ویرایش-->
<div class="modal fade" id="end_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body modal_ok">
        <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
        <div class="modal_ok2">سفارش شما با موفقیت ثبت شد .</div>
        <div class="modal_ok2">
          <p>
            کد پیگیری سفارش شما <span class="idOrder">12</span> است .
            <br>
            شما جهت پیگیری و خرید سفارش خود به این کد نیاز دارید ، این کد را یادداشت نمایید .
          </p>
        </div>


      </div>
      <div class=" modal_ok3">
        <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
      </div>
    </div>
  </div>
</div><!--end modal پایان موفقیت ثبت .-->
{{-- <div class="modal fade" id="error_mobailOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content"><div class="modal-body modal_ok">
      <div id="ajax_error_mobailOrder"></div>
    </div><div class="modal_ok3"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">متوجه شدم !! </button></div>
</div></div></div><!--end modal --> --}}

@endsection
