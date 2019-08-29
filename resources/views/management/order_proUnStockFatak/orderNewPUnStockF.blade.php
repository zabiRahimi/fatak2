@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارش محصولات موجود فاتک
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   سفارشات جدید غیر ثابت
  </div>
  <div class="div_body">
      {{$dateDay}}
      <div class="div_search">
        <button type="button" class="btn byn_search" onclick="allPro_searchNPUF()">همه محصولات</button>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_pro_date placeholder" id="pro_searchNPUF" placeholder="نام محصول">
          <button type="button" class="btn_date btn" onclick="pro_searchNPUF()"><i class="fas fa-search"></i></button>
        </div>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_code_date placeholder" id="" placeholder="کد سفارش">
          <button type="button" class="btn_date btn"><i class="fas fa-search"></i></button>
        </div>
        </div>
        <div class="div_search">
        <button type="button" class="btn byn_search"onclick="date_searchNPUF('all')">همه تاریخ ها</button>
        <button type="button" class="btn byn_search" onclick="date_searchNPUF('month')">30 روز اخیر</button>
        <button type="button" class="btn byn_search"onclick="date_searchNPUF('today')">امروز</button>
        <button type="button" class="btn byn_search"onclick="date_searchNPUF('yesterday')">دیروز</button>
          <div class="div_search_form_date" action="index.html" method="post">
            <span>از تاریخ</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchNPUFDay1" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchNPUFMonth1" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchNPUFYear1" placeholder="سال">
            <span>تا</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchNPUFDay2" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchNPUFMont2" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchNPUFYear2" placeholder="سال">
            <button type="button" class="btn_date btn"onclick="fromDAte_searchNPUF()"><i class="fas fa-search"></i></button>
          </div>
        {{-- <button type="button" class="btn byn_search">امروز</button>
        <button type="button" class="btn byn_search">امروز</button>
        <button type="button" class="btn byn_search">امروز</button>
         --}}
         </div>
         <div class="div_search">
         <button type="button" class="btn byn_search">همه استان ها</button>

         <button type="button" class="btn byn_search">همه شهرها</button>
        <div class="div_search_form_date"  method="post">
            <select class=" select_search_date"id="vahed_addpro1_admin">
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
            <select class=" select_search_date"id="vahed_addpro1_admin">
              <option value="allCity">همه شهرها</option>
              @include('show_city2')
            </select>
          <button type="button" class="btn_date btn"><i class="fas fa-search"></i></button>
        </div>
      </div>
      <div class="div_map">
        سفارشات 30 روز اخیر
      </div>
      @if (empty($newOrder[0]['id']))
        <div class="div_alert alert alert-danger">
          سفارش جدیدی موجود نیست .
        </div>
      @else
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderNewUnS1">نام محصول</div>
        <div class="divRow3 orderNewUnS2">تعداد</div>
        <div class="divRow3 orderNewUnS3">کد سفارش</div>
        <div class="divRow3 orderNewUnS4">استان خریدار</div>
        <div class="divRow3 orderNewUnS5">شهر خریدار</div>
        <div class="divRow3 orderNewUnS6">تاریخ</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($newOrder as $newOrders)
        @php
        $r++;
        $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
        $date=str_replace('-', '/',$newOrders->date_up );
        @endphp
        <div class="divRow2 orderNewPSF_R {{$classBg}} " onclick="window.location='/orderOneNewPUnStockF/{{$newOrders->id}}'">
          <div class="divRow3 rowNumber ">{{$r}}</div>
          <div class="divRow3 orderNewUnS1 orderNewUnS1_2">{{$newOrders->name}}</div>
          <div class="divRow3 orderNewUnS2"><span>{{$newOrders->num}}</span> <span>{{$newOrders->vahed}}</span> </div>
          <div class="divRow3 orderNewUnS3 orderNewUnS3_2">{{$newOrders->id}}</div>
          <div class="divRow3 orderNewUnS4">{{$newOrders->ostan}}</div>
          <div class="divRow3 orderNewUnS5">{{$newOrders->city}} </div>
          <div class="divRow3 orderNewUnS6">{{$date}}</div>
        </div>
      @endforeach
    </div>
    @endif
  </div>


@endsection
