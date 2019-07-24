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
    <a href="/"><li>صفحه اصلی</li></a>
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
        @foreach ($pro as $value)
          @php
          $imgValue=$img->where('pro_shop_id',$value->id)->first();
          $shopValue=$shop->where('id',$value->shop_id)->first();
          @endphp
          <a href="/showOneOrder/{{$value->id}}">
            <div class="proOrder">
              <div class="proAllorder proImgOrder"><img src="/img_shop/{{$imgValue->pic_b1}}" width="152" height="125" alt=""> </div>
              <div class="proAllorder proStampOrder">@if ($value->stamp==1) <span class="span1StampOrder"> اصل محصول</span> @else <span class="span2StampOrder"> مشابه محصول</span> @endif </div>
              <div class="proAllorder proNameOrder">{{$value->name}}</div>
              <div class="proAllorder proPriceOrder number"><span>{{number_format($value->price)}}</span><span>تومان</span> </div>
              <div class="proAllorder proShopOrder"><span>فروشنده : </span><span>{{$shopValue->shop}}</span> </div>
            </div>
          </a>
        @endforeach
      </div>

    @else
      <div class="">
        فعلا محصولی ثبت نشده است
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