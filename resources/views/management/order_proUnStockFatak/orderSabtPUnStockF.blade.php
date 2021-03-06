@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارشات ثبت شده غیر ثابت فاتک
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   سفارشات ثبت شده فاتک
  </div>
  <div class="div_body">
      <div class="div_search">
        <button type="button" class="btn byn_search" onclick="allPro_searchUSF('proSCOSPUSF','orderSabtPUnStockF')">همه محصولات</button>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_pro_date placeholder" id="pro_searchSPUF" placeholder="نام محصول">
          <button type="button" class="btn_date btn" onclick="pro_searchUSF('proSCOSPUSF','pro_searchSPUF' , 'orderSabtPUnStockF')"><i class="fas fa-search"></i></button>
        </div>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_code_date placeholder"  id="idPro_searchSPUF" placeholder="کد محصول">
          <button type="button" class="btn_date btn"onclick="id_searchUSF('idPro_searchSPUF' , 'orderSabtPUnStockF' , 1)  "><i class="fas fa-search"></i></button>
        </div>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_code_date placeholder"  id="idOrder_searchSPUF" placeholder="کد سفارش">
          <button type="button" class="btn_date btn"onclick="id_searchUSF('idOrder_searchSPUF' , 'orderSabtPUnStockF' , 2)  "><i class="fas fa-search"></i></button>
        </div>
        </div>
        <div class="div_search">
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCOSPUSF','all', 'orderSabtPUnStockF')">همه تاریخ ها</button>
        <button type="button" class="btn byn_search" onclick="date_searchUSF('dateSCOSPUSF','month', 'orderSabtPUnStockF')">30 روز اخیر</button>
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCOSPUSF','today', 'orderSabtPUnStockF')">امروز</button>
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCOSPUSF','yesterday', 'orderSabtPUnStockF')">دیروز</button>
          <div class="div_search_form_date" action="index.html" method="post">
            <span>از تاریخ</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchSPUFDay1" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchSPUFMonth1" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchSPUFYear1" placeholder="سال">
            <span>تا</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchSPUFDay2" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchSPUFMont2" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchSPUFYear2" placeholder="سال">
            <button type="button" class="btn_date btn"onclick="fromDAte_searchUSF('dateSCOSPUSF','date1SCOSPUSF','date2SCOSPUSF','orderSabtPUnStockF','searchSPUFDay1','searchSPUFMonth1','searchSPUFYear1','searchSPUFDay2','searchSPUFMont2','searchSPUFYear2')"><i class="fas fa-search"></i></button>
          </div>
        {{-- <button type="button" class="btn byn_search">امروز</button>
        <button type="button" class="btn byn_search">امروز</button>
        <button type="button" class="btn byn_search">امروز</button>
         --}}
         </div>

      <div class="div_map">
        @if ($mapId)
          <span>{{$mapId}}</span>
        @else
        <span>{{$mapPro}} ,</span>
        <span> {{$mapDate}} </span>

        @endif
      </div>
      @if (empty($proShop[0]['id']) and $notRecord=='no' )
        <div class="div_alert alert alert-danger">
          سفارش جدیدی موجود نیست .
        </div>
      @elseif (empty($proShop[0]['id']) and $notRecord=='ok')
        <div class="div_alert alert alert-danger">
          طبق جستجوی شما سفارشی یافت نشد .
        </div>
      @else
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderSabtUnS1">نام محصول</div>
        <div class="divRow3 orderSabtUnS2">کد محصول</div>
        <div class="divRow3 orderSabtUnS3">نام سفارش(خریدرا)</div>
        <div class="divRow3 orderSabtUnS4">کد سفارش</div>
        <div class="divRow3 orderSabtUnS5">تاریخ سفارش</div>
        <div class="divRow3 orderSabtUnS6">تاریخ ثبت</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($proShop as $proShops)
        @php
        $orders=$order->find($proShops->order_id);
        $r++;
        $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;
        @endphp
        <div class="divRow2 pointer {{$classBg}} " onclick="window.location='/orderOneSabtPUnStockF/{{$proShops->id}}'">
          <div class="divRow3 rowNumber ">{{$r}}</div>
          <div class="divRow3 orderSabtUnS1 orderSabtUnS1_2">{{$proShops->name}}</div>
          <div class="divRow3 orderSabtUnS2 orderSabtUnS1_2">{{$proShops->id}}</div>
          <div class="divRow3 orderSabtUnS3 orderSabtUnS3_2">{{$orders->name}}</div>
          <div class="divRow3 orderSabtUnS4 orderSabtUnS3_2">{{$proShops->order_id}}</div>
          <div class="divRow3 orderSabtUnS5 orderSabtUnS3_2">{{ str_replace('-', '/',$orders->date_up )}} </div>
          <div class="divRow3 orderSabtUnS6 orderSabtUnS1_2">{{ str_replace('-', '/',$proShops->date_up )}}</div>
        </div>
      @endforeach
    </div>
    @endif
  </div>


@endsection
