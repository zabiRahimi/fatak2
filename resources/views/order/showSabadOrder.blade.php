{{-- @php
namespace App\resource\wiews\pro\show_sabad_pro;
  use Cookie;

@endphp --}}
@extends('order.layoutOrder')
@section('title')
  {{'سبد خرید'}}
@endsection
@section('content')
  <div class="headerOrder">
    <div class="headerOrder_1">سبد خرید</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line headerOrderUl ">
    <a href="/showOneOrder/{{$show_pro->id}}"><li>بازگشت</li></a>
    <a href="/"><li>صفحه اصلی</li></a>
    <li>نحوه فعالیت</li>
    <li>قوانین و مقررات</li>
  </ul>
<div class="contentOrder">
<div class="sabad_kh">
        <?php
          // $sum_prise[]=$show_pro->price;
          // $sum_gram_sabad[]=$show_pro->gram_post;
          // $ids[]=$show_pro->id;
          // $num_id='num' . $show_pro->id;
          // Cookie::queue($num_id, 1);
          //
          // Cookie::queue('ids', serialize($ids));
          // $vazn_id='vazn' . $show_pro->id;
          // $pakat_id='pakat' . $show_pro->id;
          // Cookie::queue($vazn_id, $show_pro->gram_post);
          // if(!empty(Cookie::get($vazn_id))){}
          //   else{
          //     Cookie::queue($vazn_id, $show_pro->gram_post);
          //
          //   }
          //
          // if(!empty(Cookie::get($pakat_id))){}
          //   else{Cookie::queue($pakat_id , $show_pro->pakat_price);}

        ?>
        <div class="sabad_kh_body">

          <div class="sabad_kh_body2">
            <div class="sabad_kh_name_seller">
              {{-- ajax_vazn{{$show_pro->id}} --}}
              <span id="" style="display: none; ">{{$show_pro->gram_post}}</span>
              <span class="sabad_kh_name">{{$show_pro->name}}</span>
              <span class="sabad_kh_seller"><span class="sabad_kh_seller1">فروشنده :</span> <span class="sabad_kh_seller2">{{$show_pro->seller}}</span>
              <span class="sabad_kh_seller3">(
                {{-- @foreach ($shop->where('shop' ,$show_pro->seller ) as $show_ostan )
                  {{$show_ostan->ostan}}
                @endforeach --}}
                {{$shop->shop}}
                )
            </span> </span>
            </div>
            {{-- <span class="sabad_kh_del"><a href="/show_sabad_pro/{{$show_pro->id}}" ><i class="fas fa-trash-alt"></i></a> </span> --}}
          </div>
          <div class="sabad_kh_body3">
            <div class="sabad_kh_price1">
              <span class="sabad_kh_price1_1">قیمت واحد</span>
              <span class="sabad_kh_price1_2 number">{{number_format($show_pro->price)}}</span>
              <span class="sabad_kh_price1_3">تومان</span>
                <?php
                // $shop_id='shop' . $show_pro->id;
                // $ostan_id='ostan' . $show_pro->id;
                // $city_id='city' . $show_pro->id;
                //
                // Cookie::queue($shop_id, $id_shop->id);
                //
                // Cookie::queue($ostan_id, $id_shop->id_ostan);
                //
                // Cookie::queue($city_id, $id_shop->id_city);
                 ?>
            </div>

            <div class="sabad_kh_num">
                <span class="sabad_kh_num_add" onclick="num_add_sabad_order('add',{{$show_pro->num}},$('#ajax_add_cut').html(),{{$show_pro->price }},{{$priceSefarshi}},{{$pricePishtaz}},{{$show_pro->id}})"><i class="fas fa-plus"></i></span>
                {{-- ; sum_gram_post('add' , {{$show_pro->gram_post }},$('#ajax_add_cut{{$show_pro->id}}').html()) --}}
                <span class="sabad_kh_num_count">
                  <span class="sabad_kh_num_count2" id="ajax_add_cut">1</span>
                  <span class="sabad_kh_num_count3 num_add_cut2" id="num_add_cut2">عدد</span>
                </span>
                <span class="sabad_kh_num_cut" onclick="num_add_sabad_order('cut',{{$show_pro->num }} ,$('#ajax_add_cut').html() ,{{$show_pro->price }},{{$priceSefarshi}},{{$pricePishtaz}},{{$show_pro->id}});"><i class="fas fa-minus"></i></span>
                 {{-- sum_gram_post('cut' , {{$show_pro->gram_post }},$('#ajax_add_cut{{$show_pro->id}}').html()) --}}

            </div>
              <div class="sabad_kh_price2">
                <span class="sabad_kh_price2_1">قیمت مجموع</span>
                <span class="sabad_kh_price2_2 number" id="ajax_cuont_price">{{ number_format($show_pro->price)}}</span>
                <span class="sabad_kh_price2_3">تومان</span>

              </div>

          </div>
        </div>




      <div class="sabad_kh2">

        <div class="sabad_kh2_1">
          <span class="sabad_kh2_2_1">قیمت کل</span>
          {{-- {{number_format(array_sum($sum_prise))}} --}}
          <span class="sabad_kh2_2_2 number" id="ajax_price_all_pro">{{number_format($show_pro->price)}}</span>
          <span class="hidden" id="ajax_price_all_pro2">{{$show_pro->price}}</span>
          <span class="sabad_kh2_2_3">تومان</span>
          <!--به منظور استفاده از وزن پستی محصول می باشد این تگ مخفی است-->
          {{-- {{array_sum($sum_gram_sabad)}} --}}
          <span id="ajax_gram_sabad" style="display: none;"></span>
        </div>


        <div class="sabad_kh2_2">
          <span>توجه ! </span> جهت مشاهده هزینه نهایی و همچنین رفتن به مرحله بعد باید یکی از روشهای دریافت کالا را انتخاب کنید .
        </div>
      </div>
      {{-- <div class="sabad_kh_city_post">
        <div class="sabad_kh_ostan">
          <select name="cars" id="ajax_sabad_ostan" class="custom-select sabad_select_ostan" onclick="zabi()" onchange="">
            <option value="aval" onclick="show_city('no')" selected>انتخاب استان</option>
            <option value="1" onclick="show_city('ostan1')">اردبیل</option>
            <option value="2" onclick="show_city('ostan2')">اصفهان</option>
            <option value="3" onclick="show_city('ostan3')">البرز</option>
            <option value="4" onclick="show_city('ostan4')">ایلام</option>
            <option value="5" onclick="show_city('ostan5')">آذربایجان شرقی</option>
            <option value="6" onclick="show_city('ostan6')">آذربایجان غربی</option>
            <option value="7" onclick="show_city('ostan7')">بوشهر</option>
            <option value="8" onclick="show_city('ostan8')">تهران</option>
            <option value="9" onclick="show_city('ostan9')">چهار محال بختیاری</option>
            <option value="10" onclick="show_city('ostan10')">خراسان جنوبی</option>
            <option value="11" onclick="show_city('ostan11')">خراسان رضوی</option>
            <option value="12" onclick="show_city('ostan12')">خراسان شمالی</option>
            <option value="13" onclick="show_city('ostan13')">خوزستان</option>
            <option value="14" onclick="show_city('ostan14')">زنجان</option>
            <option value="15" onclick="show_city('ostan15')">سمنان</option>
            <option value="16" onclick="show_city('ostan16')">سیستان و بلوچستان</option>
            <option value="17" onclick="show_city('ostan17')">فارس</option>
            <option value="18" onclick="show_city('ostan18')">قزوین</option>
            <option value="19" onclick="show_city('ostan19')">قم</option>
            <option value="20" onclick="show_city('ostan20')">کردستان</option>
            <option value="21" onclick="show_city('ostan21')">کرمان</option>
            <option value="22" onclick="show_city('ostan22')">کرمانشاه</option>
            <option value="23" onclick="show_city('ostan23')">کهگیلویه و بویراحمد</option>
            <option value="24" onclick="show_city('ostan24')">گلستان</option>
            <option value="25" onclick="show_city('ostan25')">گیلان</option>
            <option value="26" onclick="show_city('ostan26')">لرستان</option>
            <option value="27" onclick="show_city('ostan27')">مازندران</option>
            <option value="28" onclick="show_city('ostan28')">مرکزی</option>
            <option value="29" onclick="show_city('ostan29')">هرمزگان</option>
            <option value="30" onclick="show_city('ostan30')">همدان</option>
            <option value="31" onclick="show_city('ostan31')">یزد</option>

         </select>

        </div>
        <div class="sabad_kh_city">
          <select name="" id="ajax_sabad_city" class="custom-select sabad_select_ostan">
                {{-- <option value="aval" selected>انتخاب شهر</option> --}}
                {{-- <option >ابتدا استان را انتخاب کنید</option> --}}
                {{-- @include('show_city')
              </select> --}}
        {{-- </div>
        <div class="sabad_kh_sefareshi ">
          <label class="sabad_kh_sefareshi1_1" style="width:100%;cursor: pointer;">
            <div class="sabad_kh_sefareshi1"onclick="end_price_all($('.sabad_kh2_2_2').html(),$('.sabad_kh_sefareshi2_1').html() , 1)">
              <input type="radio" class="sabad_kh_sefareshi1_1 form-check-input" name="post">
              <span class="sabad_kh_sefareshi1_2">پست سفارشی</span>
            </div>
          </label>
          <div class="sabad_kh_sefareshi2">
            <span class="sabad_kh_sefareshi2_1 number">0</span>
            <span class="sabad_kh_sefareshi2_2">تومان</span>
          </div>
        </div>
        <div class="sabad_kh_pishtaz">
            <label class="sabad_kh_pishtaz_1"  style="width:100%;cursor: pointer;">
              <div class="sabad_kh_pishtaz1" onclick="end_price_all($('.sabad_kh2_2_2').html(),$('.sabad_kh_pishtaz2_1').html(),2)">
                <input type="radio" class="sabad_kh_pishtaz1_1 form-check-input" name="post">
                <span class="sabad_kh_pishtaz1_2">پست پیشتاز</span>
              </div>
            </label>
            <div class="sabad_kh_pishtaz2">
              <span class="sabad_kh_pishtaz2_1 number">0</span>
              <span class="sabad_kh_pishtaz2_2">تومان</span>
            </div>
        </div>
      <div class="sabad_kh_end_price">
        <span class="sabad_kh_end_price1">هزینه نهایی</span>
        <span class="sabad_kh_end_price2 number">0</span>
        <span class="sabad_kh_end_price3">تومان</span>
      </div>
      <div class="sabad_kh_sabt">
      <a  onclick="chek_add_post($('.sabad_kh_end_price2').html())"  ><button type="button" class="btn btn-success btn-block">ثبت سفارش</button> </a>
      </div>
    </div> --}}
    <div class="rahnamaOrderSa">
      جهت راهنمایی هر یک از گزینه ها بروی علامت <i class="fas fa-info-circle"></i> همان گزینه کلیک کنید .
    </div>
    <div class="shopOrderSa">
      <span>آدرس فروشنده :</span>
      <span>{{$shop->ostan}} - {{$shop->city}}</span>

    </div>
    <div class="ersalOrderSa">
      <div class="ersalOrderHeader ersalOrderHzoory">حضوری</div>
      <div class="ersalOrderHzoory2">
        شما می توانید با حضور در فروشگاه مربوطه نسبت به تهیه سفارش خود اقدام نمایید ، چنانچه این گزینه را انتخاب نمایید آدرس کامل و شماره
        تماس فروشنده را در ادامه مشاهده خواهید کرد .
      </div>
      <div class="ersalOrderHzoory3">
        <div class="stampErsalSabad">
          <i class="fas fa-info-circle "></i>
          <label for="hzooryErsal">
            <span class=" ">حضوری</span>
            <input type="radio" class="" onclick="end_price_all(5)" id="hzooryErsal" name="post" value="5">
          </label>
        </div>
      </div>
    </div>
    <div class="ersalOrderSa">
      <div class="ersalOrderHeader ersalOrderPost">شرکت پست</div>
      @if ($show_pro->vaznPost > 40000 or $show_pro->dimension==2)
        <div class="ersalOrderSaPo_not">
          به علت وزن و یا حجم کالا ارسال این محصول از طریق شرکت پست امکان پذیر نیست .
        </div>
      @else
        @if ($show_pro->vaznPost > 8000)
          @php
            $class1='sefareshiOne';
            $class2='pishtazNot';
          @endphp
        @else
          @php
          $class1=null;
          $class2=null;
          @endphp
        @endif
        <div class="sabad_kh_amanat">
          <label class="sabad_kh_amanat1_1" style="width:100%;cursor: pointer;">
            <div class="sabad_kh_amanat1">
              <input type="radio" class="sabad_kh_amanat1_1 form-check-input" name="post"value="1"onclick="end_price_all(1)">
              <span class="sabad_kh_amanat1_2">پست امانت</span>
            </div>
          </label>
          <div class="sabad_kh_amanat2">
            <i class="fas fa-info-circle postIconSa"></i>
            <span class="sabad_kh_amanat2_1 number" id="orderAmanat">{{number_format($priceAmanat)}}</span>
            <span class="hidden" id="orderAmanat2">{{$priceAmanat}}</span>

            <span class="sabad_kh_samanat2_2">تومان</span>
          </div>
        </div>
        <div class="sabad_kh_sefareshi {{$class1}}">
          <label class="sabad_kh_sefareshi1_1" style="width:100%;cursor: pointer;">
            <div class="sabad_kh_sefareshi1">
              <input type="radio" class="sabad_kh_sefareshi1_1 form-check-input" name="post"value="2"onclick="end_price_all(2)">
              <span class="sabad_kh_sefareshi1_2">پست سفارشی</span>
            </div>
          </label>
          <div class="sabad_kh_sefareshi2">
            <i class="fas fa-info-circle postIconSa"></i>
            <span class="sabad_kh_sefareshi2_1 number" id="orderSefarshi">{{number_format($priceSefarshi)}}</span>
            <span class="hidden" id="orderSefarshi2">{{$priceSefarshi}}</span>

            <span class="sabad_kh_sefareshi2_2">تومان</span>
          </div>
        </div>


          <div class="sabad_kh_pishtaz {{$class2}}">
              <label class="sabad_kh_pishtaz_1"  style="width:100%;cursor: pointer;">
                <div class="sabad_kh_pishtaz1" >
                  <input type="radio" class="sabad_kh_pishtaz1_1 form-check-input" name="post"value="3"onclick="end_price_all(3)">
                  <span class="sabad_kh_pishtaz1_2">پست پیشتاز</span>
                </div>
              </label>
              <div class="sabad_kh_pishtaz2">
                <i class="fas fa-info-circle postIconSa"></i>
                <span class="sabad_kh_pishtaz2_1 number" id="orderPishtaz">{{number_format($pricePishtaz)}}</span>
                <span class="hidden" id="orderPishtaz2">{{$pricePishtaz}}</span>
                <span class="sabad_kh_pishtaz2_2">تومان</span>
              </div>
          </div>

      @endif
    </div>
    <div class="ersalOrderSa">
      <div class="ersalOrderHeader ersalOrderPublic">عمومی</div>
      @for ($i=0; $i < 7; $i++)
        @php
          $public='public'.$i;
        @endphp
        @continue(empty($stampPost->$public))
        <div class="stampErsalSabad">
          <i class="fas fa-info-circle "></i>
          <label for="stampErsal{{$i}}">
            <span class=" ">{{$stampPost->$public}}</span>
            <input type="radio" class=""onclick="end_price_all(4)" id="stampErsal{{$i}}" name="post"value="{{$public}}">
          </label>
        </div>
      @endfor
    </div>
    <div class="ersalOrderSa">
      <div class="ersalOrderHeader ersalOrderCompany">شرکتهای خصوصی</div>
      @for ($i=0; $i < 7; $i++)
        @php
          $company='company'.$i;
        @endphp
        @continue(empty($stampPost->$company))
        <div class="stampErsalSabad">
          <i class="fas fa-info-circle "></i>
          <label for="stamp2Ersal{{$i}}">
            <span class=" ">{{$stampPost->$company}}</span>
            <input type="radio" class=""onclick="end_price_all(4)" id="stamp2Ersal{{$i}}" name="post"value="{{$company}}">
          </label>
        </div>
      @endfor
    </div>
    <div class="sabad_kh_end_price">
      <span class="sabad_kh_end_price1">هزینه نهایی</span>
      <span class="sabad_kh_end_price2 number">0</span>
      <span class="sabad_kh_end_price3">تومان</span>
    </div>
    <div class="sabad_kh_sabt">
    <a  onclick="chek_add_post($('.sabad_kh_end_price2').html(), {{$show_pro->id}})"  ><button type="button" class="btn btn-success btn-block">ثبت سفارش</button> </a>
    </div>

</div><!-- end sabad -->
</div>
<!--modalچک کردن انتخاب شیوه پست کالا-->
<div class="modal " id="chek_add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body chek_add_post">
          توجه !!!<br>
          ابتدا یکی از شیوه های دریافت کالا راانتخاب نمایید .
      </div>
      <div class="chek_add_post2">

        <button type="button" class="btn btn-info chek_add_post3" data-dismiss="modal">متوجه شدم</button>
      </div>
    </div>
  </div>

</div><!--end modal -->

<div class="modal " id="rahnamaHzoori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content">
      <div class="modal-body chek_add_post">
          توجه !!!<br>
          ابتدا یکی از شیوه های دریافت کالا راانتخاب نمایید .
      </div><div class="chek_add_post2"><button type="button" class="btn btn-info chek_add_post3" data-dismiss="modal">متوجه شدم</button></div></div></div>
</div><!--end modal -->

@endsection
