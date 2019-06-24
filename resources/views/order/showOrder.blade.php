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
    <li>صفحه اصلی</li>
    <li>نحوه فعالیت</li>
    <li>قوانین و مقررات</li>
  </ul>
  <div class="contentOrder">
    @if (!empty($pro[0]->id))
      @foreach ($pro as $value)
        <div class="">
          {{$value->name}}
        </div>
      @endforeach
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
