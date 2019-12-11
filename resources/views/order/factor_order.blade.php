@extends('order.layoutOrder')
@section('title')
  {{'فاکتور خرید'}}
@endsection
@section('content')
  <div class="headerOrder">
    <div class="headerOrder_1">ثبت اطلاعات پستی</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line headerOrderUl ">
    <a href="/showSabadOrder/{{$dataPro['id']}}/{{$order->id}}"><li>بازگشت</li></a>
    <a href="/"><li>صفحه اصلی</li></a>

  </ul>
  <div class="contentOrder">
    <div class="" style="text-align: left; direction:left;">
      {{-- @foreach ($dataPro as $key => $value)

          {{ $key }} = {{$value}} <br>

      @endforeach --}}
      <br>
      @if (is_array($pricePost))
        ok
      @else
        no
      @endif
      امانت = {{ $pricePost[1] }} <br>
      سقارشی = {{ $pricePost[2] }} <br>
      پیشتاز = {{ $pricePost[3] }} <br>
    </div>
<div class="all_factor">
  @if ($modelPost==5)
    <div class="all_factorHz">
      جهت دریافت و خرید کالای خود به آدرس زیر مراجعه فرمایید .
    </div>
    <div class="all_factorHz_2">
      <div class="all_factorHz_2_1">
        آدرس فروشنده :
      </div>
      <div class="all_factorHz_2_2">
        {{$shop->ostan}} - {{$shop->city}} - {{$shop->address}}
      </div>
    </div>


    <div class="all_factorHz_2">
      <div class="all_factorHz_2_1">
        شماره تماس فروشنده :
      </div>
      <div class="all_factorHz_2_2">
        {{$shop->mobail}}
      </div>
    </div>


  @else
  <div class="titr_faktor">
    فاکتور خرید و ثبت اطلاعات پستی
  </div>

    <div class="body_factor1 body_factor0">
      <div class="name_pro_factor1">محصول</div><div class="num_pro_factor1">تعداد</div><div class="price_factor1">واحد (<span class="factor_toman">تومان</span>)</div><div class="all_price_factor1">مجموع (<span class="factor_toman">تومان</span>)</div>
    </div>
    <?php $i=1; ?>
    {{-- @foreach ($id_pros as  $value) --}}

      {{-- @foreach ($show_sabad_pro->where('id' , $value) as  $value2) --}}
        <?php
          // $num_id='num' . $value2->id;
          // $pakat[]=Cookie::get('pakat' . $value2->id);
          // $praice_all=Cookie::get($num_id)*$value2->price;
          // $praice_pro_all[]=Cookie::get($num_id)*$value2->price;
          // $price_work[]=1000*Cookie::get($num_id);

         ?>
         <div class="body_factor1 body_factor2 ">
           <div class="name_pro_factor1">{{$dataPro['name']}}</div><div class="num_pro_factor1">{{$dataPro['num_buy']}} <span class="factor_span">عدد</span> </div><div class="price_factor1 number"><span class="factor_span">قیمت واحد :</span> {{number_format($dataPro['price']) }} <span class="factor_toman2">تومان</span> </div>
           <div class="all_price_factor1 number"><span class="factor_span">قیمت :</span> {{number_format($price)}} <span class="factor_toman2">تومان</span> </div>
         </div>

      {{-- @endforeach --}}
    {{-- @endforeach --}}

      <div class="body_factor3 bg_color_factor">
        <div class="titr_body_factor3">نحوه ارسال کالا</div>
        <div class="matn_body_factor3">
        {{$post2}}
        </div>
      </div>
      <div class="body_factor3 ">
        <div class="titr_body_factor3 ">هزینه پست</div>
        <div class="matn_body_factor3 number">
          {{number_format($price_post)}} <span class="factor_span2">تومان</span>
        </div>
      </div>
      {{-- <div class="body_factor3">
        <div class="titr_body_factor3">هزینه بسته بندی</div><div class="matn_body_factor3 number"> <span class="factor_span2">تومان</span> </div>
      </div> --}}
      <div class="body_factor3 bg_color_factor">
        <div class="titr_body_factor3">مالیات</div><div class="matn_body_factor3 number">0 <span class="factor_span2">تومان</span></div>
      </div>
      <div class="body_factor3">
        <div class="titr_body_factor3">کارمزد</div><div class="matn_body_factor3 number">{{number_format($payWork)}} <span class="factor_span2">تومان</span></div>
      </div>
      <div class="body_factor3 bg_color_factor">
        <div class="titr_body_factor3">تخفیف</div><div class="matn_body_factor3 number">0 <span class="factor_span2">تومان</span></div>
      </div>
      <div class="body_factor4">

        <span class="body_factor4_1">هزینه نهایی</span><span class="body_factor4_2 number">{{number_format($allPrice)}} </span><span class="body_factor4_3">تومان</span>
      </div>
      {{-- دریافت و ثبت اطلاعات خریدار --}}
      <div class="data_buyer">
        <div class="titr_data_buyer">
          ثبت اطلاات پستی شما
        </div>
        <form class="form_data_buyer" action="" method="post">
          {{ csrf_field() }}
         <div class="titr_data_buyer1"><i class="fas fa-info-circle"></i>با دقت اطلاعات را وارد کنید .</div>
         <div id="ajax_data_buyer2"></div>
         <div class="form-group">
           <label for="name_data_buyer2" class="control-label pull-right  "><i class="fas fa-user-tie i_name_sabt"></i> نام و نام خانوادگی </label>
           <div class="div_data_buyer"><input type="text" class="form-control" onfocus="$('.form-control').css('border-color' , '#fff')" id="name_data_buyer2" placeholder="به فارسی ..." ></div>
         </div>

         <div class="form-group">
           <label for="mobail_data_buyer2" class="control-label pull-right "><i class="fas fa-mobile-alt i_mobail_sabt"></i> موبایل</label>
           <div class="div_data_buyer"><input type="text" class="form-control" value="{{$order->mobail}}" onfocus="$('.form-control').css('border-color' , '#fff')" id="mobail_data_buyer2" disabled></div>
         </div>
         <div class="form-group">
           <label for="tel_data_buyer2" class="control-label pull-right "><i class="fas fa-phone i_mobail_sabt"></i>تلفن (اختیاری)</label>
           <div class="div_data_buyer"><input type="text" class="form-control" onfocus="$('.form-control').css('border-color' , '#fff')" id="tel_data_buyer2"></div>
         </div>
         <div class="form-group">
           <label for="email_data_buyer2" class="control-label pull-right "><i class="fas fa-at i_email_sabt"></i> ایمیل (اختیاری)</label>
           <div class="div_data_buyer"><input type="text" class="form-control" onfocus="$('.form-control').css('border-color' , '#fff')" id="email_data_buyer2"></div>
         </div>
         <div class="form-group">
           <label for="ostan_data_buyer2" class="control-label pull-right "><i class="fas fa-map-marker i_email_sabt"></i> استان</label>
           <div class="div_data_buyer"><input type="text" value="{{$order->ostan}}"  class="form-control"  id="ostan_data_buyer2" disabled ></div>
         </div>
         <div class="form-group">
           <label for="city_data_buyer2" class="control-label pull-right "><i class="fas fa-map-marker-alt i_email_sabt"></i> شهر</label>
           <div class="div_data_buyer"><input type="text" value="{{$order->city}}" class="form-control" id="city_data_buyer2" disabled ></div>
         </div>
         <div class="form-group">
           <label for="codepost_data_buyer2" class="control-label pull-right "><i class="far fa-address-card i_email_sabt"></i> کد پستی</label>
           <div class="div_data_buyer"><input type="text" class="form-control" onfocus="$('.form-control').css('border-color' , '#fff')" id="codepost_data_buyer2"></div>
         </div>
         <div class="form-group">
        <label for="address_data_buyer2" class="control-label pull-right "><i class="fas fa-pencil-alt i_email_sabt"></i> آدرس</label>
        <div class="mobail_question_pro"><textarea name="name" class="form-control" onfocus="$('.form-control').css('border-color' , '#fff')" id="address_data_buyer2" rows="2" cols="80"></textarea></div>

        </div>
         <div class="form-group" >
           <label for="amniat_data_buyer2" class="control-label pull-right "><i class="fas fa-shield-alt i_amniat_sabt"></i> کد امنیتی </label>
           <div class="div_data_buyer"><input type="text" class="form-control tel" id="amniat_data_buyer2" onfocus="$('.form-control').css('border-color' , '#fff')" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_data_buyer">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onfocus="$('.form-control').css('border-color' , '#fff')" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="end_form_data_buyer">
            <button type="button" class="btn btn-success btn-block submit_data_buyer2" onclick="sabtDataBuyerOrder({{$dataPro['id']}},{{$order->id}})">ثبت اطلاعات</button>
         </div>
       </form>
      </div>

  @endif
</div></div>
{{-- modal اعلام خطای عدم ثبت اطلاعات در دیتابیس --}}
<div class="modal " id="warning_date_buyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body warning_date_buyer">
          توجه !!!<br>
          ثبت اطلاعات شما با خطا مواجه شد ، دوباره سعی نمایید !
      </div>
      <div class="warning_date_buyer2">

        <button type="button" class="btn btn-info warning_date_buyer3" data-dismiss="modal">متوجه شدم</button>
      </div>
    </div>
  </div>
</div><!--end modal خطای ثبت-->
{{-- modal اعلام موفق بودن ثبت اطلاعات خریدار در دیتابیس--}}
<div class="modal " id="sabt_date_buyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body sabt_date_buyer">
        اطلاعات شما با موفقیت ثبت شد !!
      </div>
      <div class="sabt_date_buyer2">

        <button type="button" class="btn btn-info sabt_date_buyer3" data-dismiss="modal">متوجه شدم</button>
      </div>
    </div>
  </div>
</div><!--end modal صحت ثبت-->
@endsection
