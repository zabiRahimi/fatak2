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
    <div class="searchShop">
      <a  class="apjax"onclick="searchSortDateShop('all')"><button type="button" class="btn" >همه سفارشات</button></a>
      <a  class="apjax"onclick="searchSortDateShop('today')"><button type="button" class="btn" >امروز</button></a>
      <a  class="apjax"onclick="searchSortDateShop('yesterday')"><button type="button" class="btn" >دیروز</button></a>
      {{-- جهت موبایل --}}
      <span class="searchSpanShop">
        <span class="searchSpan1Shop" >از تاریخ</span>
        <input type="text"class="searchInputShop searchInput2Shop"id="searchShopDay1" placeholder="روز">
        <input type="text"class="searchInputShop searchInput2Shop"id="searchShopMonth1" placeholder="ماه">
        <input type="text"class="searchInputShop searchInput3Shop"id="searchShopYear1" placeholder="سال">
        <span class="searchSpan1Shop">تا</span>
        <input type="text"class="searchInputShop searchInput2Shop"id="searchShopDay2" placeholder="روز">
        <input type="text"class="searchInputShop searchInput2Shop"id="searchShopMont2" placeholder="ماه">
        <input type="text"class="searchInputShop searchInput3Shop"id="searchShopYear2" placeholder="سال">

        <a  class="apjax searchAShop" onclick="searchShop()"><i class="fas fa-search"></i></a>

      </span>
      {{-- جهت کامپیوتر --}}
      <button type="button" class="btn searchShopBtn_pc"data-toggle="modal" data-target="#modalSearchShop">پیشرفته</button>
    </div>
    <div class="dashLBodySh">
      <div class="searchMapShop">
        <span class="searchMap1Shop">{{$search_pro}}</span> , <span class="searchMap2Shop">{{$search_ostan}}</span> , <span class="searchMap3Shop">{{$search_city}}</span> ,
        @if ($sortDate=='slicing')
          از تاریخ <span class="searchMap4Shop">{{$date1}}</span> تا <span class="searchMap5Shop">{{$date2}}</span>
        @else
          <span class="searchMap6Shop">{{$search_order}}</span>
        @endif


      </div>
      @if (empty($newOrder[0]->id))
        <div class="divNoR0wShop">
          @if ($sortDate=='all')
            در یک ماه اخیر سفارشی ثبت نشده است .
          @elseif ($sortDate=='today')
            امروز تا کنون سفارشی ثبت نشده است .
          @elseif ($sortDate=='yesterday')
            دیروز سفارشی ثبت نشده است .
          @elseif ($sortDate=='slicing')
            در بازه زمانی مورد نظر شما سفارشی ثبت نشده است .
          @endif
        </div>
      @else
      <div class="newOrder">
        <div class="newOrderRwo"><i class="fas fa-certificate"></i></div>
        <div class="newOrderName">نام محصول</div>
        <div class="newOrderVahed">واحد</div>
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
            <div class="newOrderDate_1">{{str_replace('-', '/',$value->date_up )}}</div>
          </div>
        </a>
      @endforeach

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
   <!-- Modal پیشرفته-->
   <div class="modal fade" id="modalSearchShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body ">
           <div class="M_searchSpanShop">
             <div class="M_searchSpanShop2">
               <span class="M_searchSpan1Shop" >از تاریخ</span>
               <input type="text"class="searchInputShop M_searchInput2Shop"id="day1_searchAdvancedShop" placeholder="روز">
               <input type="text"class="searchInputShop M_searchInput2Shop"id="month1_searchAdvancedShop" placeholder="ماه">
               <input type="text"class="searchInputShop M_searchInput3Shop"id="year1_searchAdvancedShop" placeholder="سال">
             </div>
             <div class="M_searchSpanShop3">
               <span class="M_searchSpan1Shop">تا</span>
               <input type="text"class="searchInputShop M_searchInput2Shop"id="day2_searchAdvancedShop" placeholder="روز">
               <input type="text"class="searchInputShop M_searchInput2Shop"id="month2_searchAdvancedShop" placeholder="ماه">
               <input type="text"class="searchInputShop M_searchInput3Shop"id="year2_searchAdvancedShop" placeholder="سال">

               <a href="#" class="M_searchAShop"><i class="fas fa-search"></i></a>
             </div>
           </div>
           <div class="M_searchSpanShop4">
             <input type="text" class="pro_searchShop"id="pro_searchAdvancedShop" value="{{$search_proA}}"placeholder="نام محصول">
             <select class="osatn_searchShop"id="ostan_searchAdvancedShop" name="">

               <option value="allOstan"onclick="searchOstanShop('allOstan')">استان خریدار</option>
               <option value="allOstan"onclick="searchOstanShop('allOstan')">همه استانها</option>
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
               @if (!empty($search_ostanA) && $search_ostanA!='allOstan' )
                 <option value="{{$search_ostanA}}"selected>{{$search_ostanA}}</option>
               @endif
             </select>
             <select class="ajax_sabad_city city_searchShop"id="city_searchAdvancedShop" name="">
               <option value="allCity">همه شهرها</option>
               @include('show_city2')
             </select>
           </div>
         </div>

         <div class="M_searchSpanShop10">
           <button type="button" class="btn btn-primary "onclick="searchAdvancedShop()"data-dismiss="modal" aria-label="Close" >اعمال تغییرات</button>
         </div>
       </div>
     </div>
   </div><!--end modalپیشرفته.-->
@endsection
