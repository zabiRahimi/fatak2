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
      <a href="#"><button type="button" class="btn" >سفارشات امروز</button></a>
      <a href="#"><button type="button" class="btn" >دیروز</button></a>
      {{-- جهت موبایل --}}
      <span class="searchSpanShop">
        <span class="searchSpan1Shop" >از تاریخ</span>
        <input type="text"class="searchInputShop searchInput2Shop" placeholder="روز">
        <input type="text"class="searchInputShop searchInput2Shop" placeholder="ماه">
        <input type="text"class="searchInputShop searchInput3Shop" placeholder="سال">
        <span class="searchSpan1Shop">تا</span>
        <input type="text"class="searchInputShop searchInput2Shop" placeholder="روز">
        <input type="text"class="searchInputShop searchInput2Shop" placeholder="ماه">
        <input type="text"class="searchInputShop searchInput3Shop" placeholder="سال">

        <a href="#" class="searchAShop"><i class="fas fa-search"></i></a>

      </span>
      {{-- جهت کامپیوتر --}}
      <button type="button" class="btn searchShopBtn_pc"data-toggle="modal" data-target="#modalSearchShop">پیشرفته</button>
    </div>
    <div class="dashLBodySh">
      @if (empty($proShop[0]->id))
        <div class="divNoR0wShop">
          در حال حاضر سفارشی ثبت نشده است .
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
        $checkOrder=$proShop->where('order_id',$value->id)->first();

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
            <div class="newOrderDate_1">{{$value->date_ad}}</div>
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
               <input type="text"class="searchInputShop M_searchInput2Shop" placeholder="روز">
               <input type="text"class="searchInputShop M_searchInput2Shop" placeholder="ماه">
               <input type="text"class="searchInputShop M_searchInput3Shop" placeholder="سال">
             </div>
             <div class="M_searchSpanShop3">
               <span class="M_searchSpan1Shop">تا</span>
               <input type="text"class="searchInputShop M_searchInput2Shop" placeholder="روز">
               <input type="text"class="searchInputShop M_searchInput2Shop" placeholder="ماه">
               <input type="text"class="searchInputShop M_searchInput3Shop" placeholder="سال">

               <a href="#" class="M_searchAShop"><i class="fas fa-search"></i></a>
             </div>
           </div>
           <div class="M_searchSpanShop4">
             <select class="pro_searchShop" name="">
               <option value="">دسته محصول</option>
             </select>
             <select class="osatn_searchShop" name="">
               <option value="">استان خریدار</option>
               <option value="اردبیل" onclick="show_city('ostan1')">اردبیل</option>
               <option value="اصفهان" onclick="show_city('ostan2')">اصفهان</option>
               <option value="البرز" onclick="show_city('ostan3')">البرز</option>
               <option value="ایلام" onclick="show_city('ostan4')">ایلام</option>
               <option value="آذربایجان شرقی" onclick="show_city('ostan5')">آذربایجان شرقی</option>
               <option value="آذربایجان غربی" onclick="show_city('ostan6')">آذربایجان غربی</option>
               <option value="بوشهر" onclick="show_city('ostan7')">بوشهر</option>
               <option value="تهران" onclick="show_city('ostan8')">تهران</option>
               <option value="چهار محال بختیاری" onclick="show_city('ostan9')">چهار محال بختیاری</option>
               <option value="خراسان جنوبی" onclick="show_city('ostan10')">خراسان جنوبی</option>
               <option value="خراسان رضوی" onclick="show_city('ostan11')">خراسان رضوی</option>
               <option value="خراسان شمالی" onclick="show_city('ostan12')">خراسان شمالی</option>
               <option value="خوزستان" onclick="show_city('ostan13')">خوزستان</option>
               <option value="زنجان" onclick="show_city('ostan14')">زنجان</option>
               <option value="سمنان" onclick="show_city('ostan15')">سمنان</option>
               <option value="سیستان و بلوچستان" onclick="show_city('ostan16')">سیستان و بلوچستان</option>
               <option value="فارس" onclick="show_city('ostan17')">فارس</option>
               <option value="قزوین" onclick="show_city('ostan18')">قزوین</option>
               <option value="قم" onclick="show_city('ostan19')">قم</option>
               <option value="کردستان" onclick="show_city('ostan20')">کردستان</option>
               <option value="کرمان" onclick="show_city('ostan21')">کرمان</option>
               <option value="کرمانشاه" onclick="show_city('ostan22')">کرمانشاه</option>
               <option value="کهگیلویه و بویراحمد" onclick="show_city('ostan23')">کهگیلویه و بویراحمد</option>
               <option value="گلستان" onclick="show_city('ostan24')">گلستان</option>
               <option value="گیلان" onclick="show_city('ostan25')">گیلان</option>
               <option value="لرستان" onclick="show_city('ostan26')">لرستان</option>
               <option value="مازندران" onclick="show_city('ostan27')">مازندران</option>
               <option value="مرکزی" onclick="show_city('ostan28')">مرکزی</option>
               <option value="هرمزگان" onclick="show_city('ostan29')">هرمزگان</option>
               <option value="همدان" onclick="show_city('ostan30')">همدان</option>
               <option value="یزد" onclick="show_city('ostan31')">یزد</option>
             </select>
             <select class="ajax_sabad_city city_searchShop" name="">
               <option value="">همه شهرها</option>
               @include('show_city2')
             </select>
           </div>
         </div>

         <div class="M_searchSpanShop10">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >اعمال تغییرات</button>
         </div>
       </div>
     </div>
   </div><!--end modalپیشرفته.-->
@endsection
