@extends('shop.layoutDashShop')
@section('title')
  سفارشات جدید
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
      سفارشات جدید
    </div>
    <div class="div_search_c">
      <button type="button" class="btn btn_search_c" onclick="pro_searchC('proCheckSNOS', 'proSNOS', 'all' , '' , '' , 'newOrderShop' , '' )">همه سفارشات</button>
      <div class="div_search_form_date_c" action="index.html" method="post">
        <input type="text" class="input_date_c input_pro_date_c placeholder" id="pro_searchNOS" placeholder="نام سفارش">
        <button type="button" class="btn_date_c btn" onclick="pro_searchC('proCheckSNOS', 'proSNOS', 'pro' , 'pro_searchNOS' , '' , 'newOrderShop' , 3)"><i class="fas fa-search"></i></button>
      </div>
      </div>
      <div class="div_search_c">
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateSNOS','all','newOrderShop')">همه تاریخ ها</button>
      <button type="button" class="btn btn_search_c" onclick="date_searchC('dateSNOS','month','newOrderShop')">30 روز اخیر</button>
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateSNOS','today','newOrderShop')">امروز</button>
      <button type="button" class="btn btn_search_c"onclick="date_searchC('dateSNOS','yesterday','newOrderShop')">دیروز</button>
        <div class="div_search_form_date_c2" action="index.html" method="post">
          <div class="div_search_c2">
            <span>از تاریخ</span>
            <input type="text" class="input_date_c input_day_date_c placeholder" id="seNOSDay1" placeholder="روز">
            <input type="text" class="input_date_c input_month_date_c placeholder" id="seNOSMonth1" placeholder="ماه">
            <input type="text" class="input_date_c input_year_date_c placeholder" id="seNOSYear1" placeholder="سال">
          </div>
          <div class="div_search_c2">
            <span>تا</span>
            <input type="text" class="input_date_c input_day_date_c placeholder" id="seNOSDay2" placeholder="روز">
            <input type="text" class="input_date_c input_month_date_c placeholder" id="seNOSMont2" placeholder="ماه">
            <input type="text" class="input_date_c input_year_date_c placeholder" id="seNOSYear2" placeholder="سال">
            <button type="button" class="btn_date_c btn"onclick="fromDAte_searchC('dateSNOS','date1SNOS','date2SNOS','newOrderShop','seNOSDay1','seNOSMonth1','seNOSYear1','seNOSDay2','seNOSMont2','seNOSYear2')"><i class="fas fa-search"></i></button>
          </div>
        </div>
       </div>
       <div class="div_search_c">
       <button type="button" class="btn btn_search_c" onclick="AllOstan_searchC('ostanAndCitySNOS','ostanSNOS','citySNOS','newOrderShop')">همه استان ها</button>
       <button type="button" class="btn btn_search_c" onclick="AllCity_searchC('citySNOS' , 'newOrderShop')">همه شهرها</button>
      <div class="div_search_form_date_c2"  method="post">
        <div class="div_search_c2">
          <select class=" select_search_date_c"id="seNOSOstan">
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
          <select class=" select_search_date_c"id="seNOSCity">
            <option value="allCity">همه شهرها</option>
            @include('show_city2')
          </select>
        <button type="button" class="btn_date_c btn" onclick="ostan_searchC('ostanAndCitySNOS','ostanSNOS','citySNOS','newOrderShop','seNOSOstan','seNOSCity')"><i class="fas fa-search"></i></button>
      </div>
      </div>
    </div>
    <div class="dashLBodySh">
      <div class="div_map_c">
        <span>{{$mapPro}} ,</span>
        <span> {{$mapDate}} ,</span>
        <span> {{$mapOstan}} ,</span>
        <span> {{$mapCity}}</span>
      </div>
      @if (empty($newOrder[0]['id']) and $notRecord=='no')
        <div class="div_alert alert alert-danger">
          سفارش جدیدی موجود نیست .
        </div>
      @elseif (empty($newOrder[0]['id']) and $notRecord=='ok')
        <div class="div_alert alert alert-danger">
          طبق جستجوی شما سفارشی یافت نشد .
        </div>
      @else
      <div class="newOrderAll">
      <div class="newOrder">
        <div class="newOrderRwo"><i class="fas fa-certificate"></i></div>
        <div class="newOrderName">نام محصول</div>
        <div class="newOrderVahed">واحد</div>
        <div class="newOrderOstan">استان</div>
        <div class="newOrderCity">شهر</div>
        <div class="newOrderDate">تاریخ</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($newOrder as $value)
        <?php
        $checkOrder=$stampProOrder->where('order_id',$value->id)->first();
        if($checkOrder){continue;}
         $r++;
         if ($r%2==0) {
           $color='color1';
         }else {
           $color="color2";
         }
        ?>
        <a href="/newOrderShopOne/{{$value->id}}" class="newOrderA">
          <div class="newOrder_1 {{$color}}">
            <div class="newOrderRwo_1 ">{{$r}}</div>
            <div class="newOrderName_1">{{$value->name}}</div>
            <div class="newOrderVahed_1">
              <span>{{$value->num}}</span>
              <span>{{$value->vahed}}</span>
            </div>
            <div class="newOrderOstan_1">{{$value->ostan}}</div>
            <div class="newOrderCity_1">{{$value->city}}</div>
            <div class="newOrderDate_1">{{verta($value->date_up)->format('Y/n/j')}}</div>
          </div>
        </a>
      @endforeach
    </div>

    @endif
    </div>
  @endif

@endsection
