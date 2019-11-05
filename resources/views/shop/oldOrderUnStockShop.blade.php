@extends('shop.layoutDashShop')
@section('title')
  محصولات پیشنهاد شده
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
      محصولات پیشنهاد شده
    </div>
    <div class="div_search_c">
      <button type="button" class="btn btn_search_c" onclick="pro_searchC('proCheckOOUSS', 'proOOUSS', 'all' , '' , '' , 'oldOrderUnStockShop' , '' )">همه محصولات</button>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_pro_date_c placeholder" id="pro_searchOOUSS" placeholder="نام محصول">
        <button type="button" class="btn_date_c btn" onclick="pro_searchC('proCheckOOUSS', 'proOOUSS', 'pro' , 'pro_searchOOUSS' , '' , 'oldOrderUnStockShop' , 1 )"><i class="fas fa-search"></i></button>
      </div>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_code_date_c placeholder"  id="id_searchOOUSS" placeholder="کد محصول">
        <button type="button" class="btn_date_c btn"onclick="pro_searchC('proCheckOOUSS', 'proOOUSS', 'id' , '' , 'id_searchOOUSS' , 'oldOrderUnStockShop' , 2 ) "><i class="fas fa-search"></i></button>
      </div>
      </div>
    <div class="div_search_c">
      <button type="button" class="btn btn_search_c" onclick="pro_searchC('orderCheckOOUSS', 'orderOOUSS', 'all' , '' , '' , 'oldOrderUnStockShop' , '' )">همه سفارشات</button>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_pro_date_c placeholder" id="pro_searchOOUSS2" placeholder="نام سفارش">
        <button type="button" class="btn_date_c btn" onclick="pro_searchC('orderCheckOOUSS', 'orderOOUSS', 'pro' , 'pro_searchOOUSS2' , '' , 'oldOrderUnStockShop' , 3 )"><i class="fas fa-search"></i></button>
      </div>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_code_date_c placeholder"  id="id_searchOOUSS2" placeholder="کد سفارش">
        <button type="button" class="btn_date_c btn"onclick="pro_searchC('orderCheckOOUSS', 'orderOOUSS', 'id' , '' , 'id_searchOOUSS2' , 'oldOrderUnStockShop' , 4 )"><i class="fas fa-search"></i></button>
      </div>
      </div>

      <div class="div_search_c">
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateOOUSS','all','oldOrderUnStockShop')">همه تاریخ ها</button>
      <button type="button" class="btn btn_search_c" onclick="date_searchC('dateOOUSS','month','oldOrderUnStockShop')">30 روز اخیر</button>
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateOOUSS','today','oldOrderUnStockShop')">امروز</button>
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateOOUSS','yesterday','oldOrderUnStockShop')">دیروز</button>
        <div class="div_search_form_date_c2" action="index.html" method="post">
          <div class="div_search_c2">
            <span>از تاریخ</span>
            <input type="text" class="input_date_c input_day_date_c placeholder" id="seOOUSSDay1" placeholder="روز">
            <input type="text" class="input_date_c input_month_date_c placeholder" id="seOOUSSMonth1" placeholder="ماه">
            <input type="text" class="input_date_c input_year_date_c placeholder" id="seOOUSSYear1" placeholder="سال">
          </div>
          <div class="div_search_c2">
            <span>تا</span>
            <input type="text" class="input_date_c input_day_date_c placeholder" id="seOOUSSDay2" placeholder="روز">
            <input type="text" class="input_date_c input_month_date_c placeholder" id="seOOUSSMont2" placeholder="ماه">
            <input type="text" class="input_date_c input_year_date_c placeholder" id="seOOUSSYear2" placeholder="سال">
            <button type="button" class="btn_date_c btn"onclick="fromDAte_searchC('dateOOUSS','date1OOUSS','date2OOUSS','oldOrderUnStockShop','seOOUSSDay1','seOOUSSMonth1','seOOUSSYear1','seOOUSSDay2','seOOUSSMont2','seOOUSSYear2')"><i class="fas fa-search"></i></button>
          </div>
        </div>
       </div>
       <div class="div_search_c">
       <button type="button" class="btn btn_search_c" onclick="AllOstan_searchC('ostanAndCityOOUSS','ostanOOUSS','cityOOUSS','oldOrderUnStockShop')">همه استان ها</button>
       <button type="button" class="btn btn_search_c" onclick="AllCity_searchC('cityOOUSS' , 'oldOrderUnStockShop')">همه شهرها</button>
      <div class="div_search_form_date_c2"  method="post">
        <div class="div_search_c2">
          <select class=" select_search_date_c"id="seOOUSSOstan">
            <option value="">انتخاب استان</option>
            <option value="اردبیل" onclick="show_city('ostan1');searchOstanShop('اردبیل')">اردبیل</option>
            <option value="اصفهان" onclick="show_city('ostan2');searchOstanShop('اصفهان')">اصفهان</option>
            <option value="البرز" onclick="show_city('ostan3');searchOstanShop('البرز')">البرز</option>
            <option value="ایلام" onclick="show_city('ostan4');searchOstanShop('ایلام')">ایلام</option>
            <option value="آذربایجان شرقی" onclick="show_city('ostan5');searchOstanShop('آذربایجان شرقی')">آذربایجان شرقی</option>
            <option value="آذربایجان غربی" onclick="show_city('ostan6');searchOstanShop('آذربایجان غربی')">آذربایجان غربی</option>
            <option value="بوشهر" onclick="show_city('ostan7');searchOstanShop('بوشهر')">بوشهر</option>
            <option value="تهران" onclick="show_city('ostan8');searchOstanShop('تهران')">تهران</option>
            <option value="چهار محال بختیاری" onclick="show_city('ostan9');searchOstanShop('چهار محال بختیاری')">چهار محال بختیاری</option>
            <option value="خراسان جنوبی" onclick="show_city('ostan10');searchOstanShop('خراسان جنوبی')">خراسان جنوبی</option>
            <option value="خراسان رضوی" onclick="show_city('ostan11');searchOstanShop('خراسان رضوی')">خراسان رضوی</option>
            <option value="خراسان شمالی" onclick="show_city('ostan12');searchOstanShop('خراسان شمالی')">خراسان شمالی</option>
            <option value="خوزستان" onclick="show_city('ostan13');searchOstanShop('خوزستان')">خوزستان</option>
            <option value="زنجان" onclick="show_city('ostan14');searchOstanShop('زنجان')">زنجان</option>
            <option value="سمنان" onclick="show_city('ostan15');searchOstanShop('سمنان')">سمنان</option>
            <option value="سیستان و بلوچستان" onclick="show_city('ostan16');searchOstanShop('سیستان و بلوچستان')">سیستان و بلوچستان</option>
            <option value="فارس" onclick="show_city('ostan17');searchOstanShop('فارس')">فارس</option>
            <option value="قزوین" onclick="show_city('ostan18');searchOstanShop('قزوین')">قزوین</option>
            <option value="قم" onclick="show_city('ostan19');searchOstanShop('قم')">قم</option>
            <option value="کردستان" onclick="show_city('ostan20');searchOstanShop('کردستان')">کردستان</option>
            <option value="کرمان" onclick="show_city('ostan21');searchOstanShop('کرمان')">کرمان</option>
            <option value="کرمانشاه" onclick="show_city('ostan22');searchOstanShop('کرمانشاه')">کرمانشاه</option>
            <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23');searchOstanShop('کهگیلویه و بویراحمد')">کهگیلویه و بویراحمد</option>
            <option value="گلستان" onclick="show_city('ostan24');searchOstanShop('گلستان')">گلستان</option>
            <option value="گیلان" onclick="show_city('ostan25');searchOstanShop('گیلان')">گیلان</option>
            <option value="لرستان" onclick="show_city('ostan26');searchOstanShop('لرستان')">لرستان</option>
            <option value="مازندران" onclick="show_city('ostan27');searchOstanShop('مازندران')">مازندران</option>
            <option value="مرکزی" onclick="show_city('ostan28');searchOstanShop('مرکزی')">مرکزی</option>
            <option value="هرمزگان" onclick="show_city('ostan29');searchOstanShop('هرمزگان')">هرمزگان</option>
            <option value="همدان" onclick="show_city('ostan30');searchOstanShop('همدان')">همدان</option>
            <option value="یزد" onclick="show_city('ostan31');searchOstanShop('یزد')">یزد</option>
          </select>
        </div>
        <div class="div_search_c2">
          <select class=" select_search_date_c"id="seOOUSSCity">
            <option value="allCity">همه شهرها</option>
            @include('show_city2')
          </select>
        <button type="button" class="btn_date_c btn" onclick="ostan_searchC('ostanAndCityOOUSS','ostanOOUSS','cityOOUSS','oldOrderUnStockShop','seOOUSSOstan','seOOUSSCity')"><i class="fas fa-search"></i></button>
      </div>
      </div>
    </div>
    <div class="dashLBodySh">
      <div class="div_map_c">
        <span>{{$mapPro}} ، </span>{{-- $mapPro --}}
        <span >{{$mapOrder}} ، </span>{{-- $mapOrder  --}}
        <span > {{$mapDate}} ، </span>{{-- $mapDate --}}
        <span > {{$mapOstan}} ، </span>{{-- $mapOstan --}}
        <span> {{$mapCity}}</span>{{-- $mapCity --}}
      </div>
      @if (empty($stampProOrder[0]->id))
        <div class="alert alert-danger div_alert">
          شما تا کنون محصولی به مشتریان پیشنهاد نداده اید ، یا اینکه محصولات پیشنهادی به فروش رفته اند .
      @else
      <div class="orderOSUSAll">
      <div class="orderOSUS">
        <div class="orderOSUSRwo"><i class="fas fa-certificate"></i></div>
        <div class="orderOSUSName">نام محصول</div>
        <div class="orderOSUSCode1">کد</div>
        <div class="orderOSUSOrder">نام سفارش</div>
        <div class="orderOSUSCode2">کد</div>
        <div class="orderOSUSPrice">قیمت</div>
        <div class="orderOSUSCity">شهر مشتری</div>
        <div class="orderOSUSDate">تاریخ ثبت</div>
      </div>
      @php
        $r=0;

      @endphp
      @foreach ($stampProOrder as $value)
        <?php
            $order=$order->where('id', $value->order_id)->first();
            if($order->stage!=1){continue;}
            if(!empty($nameOrder) and strpos( $order->name , $nameOrder) === false){continue;}
            if(!empty($nameOstan) and $order->ostan!=$nameOstan ){continue;}
            if(!empty($nameCity) and $order->city!=$nameCity ){continue;}

            $pro=$pro->where('id', $value->pro_id)->first();
            if(!empty($namePro) and strpos( $pro->name , $namePro) === false){continue;}
            $issetRecord='ok';
         $r++;
         if ($r%2==0) {
           $color='color1';
         }else {
           $color="color2";
         }
        ?>

        <a href="/oldOrderOneUnStockShop/{{$order->id}}/{{$pro->id}}" >
          <div class="orderOSUS orderOSUS_1 {{$color}}">
            <div class="orderOSUSRwo">{{$r}}</div>
            <div class="orderOSUSName orderOSUSName_1">{{$pro->name}}</div>
            <div class="orderOSUSCode1">{{$pro->id}}</div>
            <div class="orderOSUSOrder">{{$order->name}}</div>
            <div class="orderOSUSCode2">{{$order->id}}</div>
            <div class="orderOSUSPrice">@if ($value->price) {{$value->price}} @else {{$pro->price}} @endif </div>
            <div class="orderOSUSCity">{{$order->ostan}} , {{$order->city}}</div>
            <div class="orderOSUSDate">{{verta($value->date_up)->format('y/m/d')}}</div>
          </div>
        </a>
      @endforeach
      @empty ($issetRecord)
        <div class="alert alert-danger div_alert">
          طبق جستجوی شما نتیجه ای یافت نشد.
        </div>
      @endempty
    </div>
    @endif
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
