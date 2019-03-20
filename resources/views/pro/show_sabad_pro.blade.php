@extends('layout.layout')
@section('title')
  {{'سبد خرید'}}
@endsection
@section('content')
<div class="sabad_kh">
  <div class="sabad_kh_titr">
    <h4>سبد خرید شما</h4>
    <span>تعداد کالا <span>{{$num_pro}} </span> </span>
    {{-- @if (Session::has('sabad_pro2')){{ count(session('sabad_pro2'))}}@endif --}}
  </div>

  @if (!empty($num_pro))

    @foreach ($id_pros as  $value)

      @foreach ($show_sabad_pro->where('id' , $value) as  $value2)

        <?php
          $sum_prise[]=$value2->price;
          $sum_gram_sabad[]=$value2->gram_post;
          $ids[]=$value2->id;
          $num_id='num' . $value2->id;
          Session::put($num_id, 1);
          Session::put('ids' , $ids);
          $vazn_id='vazn' . $value2->id;
          $pakat_id='pakat' . $value2->id;
          if(Session::has($vazn_id)){}
            else{Session::put($vazn_id , $value2->gram_post);}
          if(Session::has($pakat_id)){}
            else{Session::put($pakat_id , $value2->pakat_price);}

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
                $ostan_id='ostan' . $value2->id;
                $shop_id='shop' . $value2->id;
                Session::put($ostan_id , $id_shop->id_ostan);
                Session::put($shop_id , $id_shop->id);
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
          <select name="cars" id="ajax_sabad_ostan" class="custom-select sabad_select_ostan" onchange="show_city($('#ajax_sabad_ostan').val())">
            <option value="aval" selected>انتخاب استان</option>
            @foreach ($ostan as  $value)
              <option value="{{$value->id}}" >{{$value->city}}</option>
            @endforeach
         </select>

        </div>
        <div class="sabad_kh_city">
          <select name="cars" id="ajax_sabad_city" class="custom-select sabad_select_ostan">
                <option value="aval" selected>انتخاب شهر</option>
                <option >ابتدا استان را انتخاب کنید</option>

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
