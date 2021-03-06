@php
namespace App\resource\wiews\pro\show_sabad_pro;
  use Cookie;

@endphp
@extends('layout.layout')
@section('title')
  {{'سبد خرید'}}
@endsection
@section('content')
<div class="sabad_kh">
  <div class="sabad_kh_titr">
    <h4>سبد خرید شما</h4>
    <span>تعداد کالا <span>{{$num_pro}} </span> </span>

  </div>

  @if (!empty($num_pro))

    @foreach ($id_pros as  $value)

      @foreach ($show_sabad_pro->where('id' , $value) as  $value2)

        <?php
          $sum_prise[]=$value2->price;
          $sum_gram_sabad[]=$value2->gram_post;
          $ids[]=$value2->id;
          $num_id='num' . $value2->id;
          Cookie::queue($num_id, 1);

          Cookie::queue('ids', serialize($ids));
          $vazn_id='vazn' . $value2->id;
          $pakat_id='pakat' . $value2->id;
          Cookie::queue($vazn_id, $value2->gram_post);
          if(!empty(Cookie::get($vazn_id))){}
            else{
              Cookie::queue($vazn_id, $value2->gram_post);

            }

          if(!empty(Cookie::get($pakat_id))){}
            else{Cookie::queue($pakat_id , $value2->pakat_price);}

        ?>
        <div class="sabad_kh_body">

          <div class="sabad_kh_body2">
            <div class="sabad_kh_name_seller">
              <span id="ajax_vazn{{$value2->id}}" style="display: none; ">{{$value2->gram_post}}</span>
              <span class="sabad_kh_name">{{$value2->name}}</span>
              <span class="sabad_kh_seller"><span class="sabad_kh_seller1">فروشنده :</span> <span class="sabad_kh_seller2">{{$value2->seller}}</span>
              <span class="sabad_kh_seller3">(
                @foreach ($shop->where('shop' ,$value2->seller ) as $show_ostan )
                  {{$show_ostan->ostan}}
                @endforeach
                )
            </span> </span>
            </div>
            <span class="sabad_kh_del"><a href="/show_sabad_pro/{{$value2->id}}" ><i class="fas fa-trash-alt"></i></a> </span>
          </div>
          <div class="sabad_kh_body3">
            <div class="sabad_kh_price1">
              <span class="sabad_kh_price1_1">قیمت واحد</span>
              <span class="sabad_kh_price1_2 number">{{number_format($value2->price)}}</span>
              <span class="sabad_kh_price1_3">تومان</span>
              @foreach ($shop->where('shop' , $value2->seller) as  $id_shop)

                <?php
                $shop_id='shop' . $value2->id;
                $ostan_id='ostan' . $value2->id;
                $city_id='city' . $value2->id;

                Cookie::queue($shop_id, $id_shop->id);

                Cookie::queue($ostan_id, $id_shop->id_ostan);

                Cookie::queue($city_id, $id_shop->id_city);

                 ?>
              @endforeach

            </div>

            <div class="sabad_kh_num">

                <span class="sabad_kh_num_add" onclick="num_pro_sabad_add({{$value2->id}} ,'add',$('#ajax_add_cut{{$value2->id}}').html(),{{$value2->price }} , {{$value2->gram_post}} ,{{$value2->pakat_price}}); sum_gram_post('add' , {{$value2->gram_post }},$('#ajax_add_cut{{$value2->id}}').html())"><i class="fas fa-plus"></i></span>
                <span class="sabad_kh_num_count">
                  <span class="sabad_kh_num_count2" id="ajax_add_cut{{$value2->id}}">1 </span>

                  <span class="sabad_kh_num_count3 num_add_cut2" id="num_add_cut2">عدد</span>
                </span>
                <span class="sabad_kh_num_cut" onclick="num_pro_sabad_add({{$value2->id}} ,'cut' ,$('#ajax_add_cut{{$value2->id}}').html() ,{{$value2->price }} , {{$value2->gram_post}},{{$value2->pakat_price}}); sum_gram_post('cut' , {{$value2->gram_post }},$('#ajax_add_cut{{$value2->id}}').html())"><i class="fas fa-minus"></i></span>

            </div>
              <div class="sabad_kh_price2">
                <span class="sabad_kh_price2_1">قیمت مجموع</span>
                <span class="sabad_kh_price2_2 number" id="ajax_cuont_price{{$value2->id}}">{{ number_format($value2->price)}}</span>
                <span class="sabad_kh_price2_3">تومان</span>

              </div>

          </div>
        </div>

      @endforeach

    @endforeach
      <div class="sabad_kh2">

        <div class="sabad_kh2_1">
          <span class="sabad_kh2_2_1">قیمت کل</span>
          <span class="sabad_kh2_2_2 number" id="ajax_price_all_pro">{{number_format(array_sum($sum_prise))}}</span>
          <span class="sabad_kh2_2_3">تومان</span>
          <!--به منظور استفاده از وزن پستی محصول می باشد این تگ مخفی است-->
          <span id="ajax_gram_sabad" style="display: none;">{{array_sum($sum_gram_sabad)}}</span>
        </div>


        <div class="sabad_kh2_2">
          توجه : جهت مشاهده هزینه نهایی ، استان و شهر خود را وارد کنید و سپس نوع پست کالا را انتخاب نمایید .
        </div>
      </div>
      <div class="sabad_kh_city_post">
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
                @include('show_city')
              </select>
        </div>
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
    </div>
    @else
      <div class="sabad_kh_empty">
          سبد شما خالی هست !
          <div class="sabad_kh_empty2">
              <a href="/"><button type="button"class="btn btn-info" name="button">برگشت </button></a>
          </div>
      </div>
    @endif

</div><!-- end sabad -->

<!--modalچک کردن انتخاب شیوه پست کالا-->
<div class="modal " id="chek_add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body chek_add_post">
          توجه !!!<br>
          ابتدا شهر خود و سپس شیوه پست کردن کالا را انتخاب کنید !
      </div>
      <div class="chek_add_post2">

        <button type="button" class="btn btn-info chek_add_post3" data-dismiss="modal">متوجه شدم</button>
      </div>
    </div>
  </div>
</div><!--end modal -->
@endsection
