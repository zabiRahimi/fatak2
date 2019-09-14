@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارش محصولات در حال اقدام
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   سفارشات در حال اقدام غیر ثابت (سایر)
  </div>
  <div class="div_body">
      <div class="div_search">
        <button type="button" class="btn byn_search" onclick="allPro_searchUSF('proSCONPUSF','orderNewPUnStockF')">همه محصولات</button>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_pro_date placeholder" id="pro_searchNPUF" placeholder="نام محصول">
          <button type="button" class="btn_date btn" onclick="pro_searchUSF('proSCONPUSF','pro_searchNPUF' , 'orderNewPUnStockF')"><i class="fas fa-search"></i></button>
        </div>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_code_date placeholder"  id="idPro_searchSPUF" placeholder="کد محصول">
          <button type="button" class="btn_date btn"onclick="id_searchUSF('idPro_searchSPUF' , 'orderSabtPUnStockF' , 1)  "><i class="fas fa-search"></i></button>
        </div>
        <div class="div_search_form_date" action="index.html" method="post">
          <input type="text" class="input_date input_code_date placeholder"  id="id_searchNPUF" placeholder="کد خرید">
          <button type="button" class="btn_date btn"onclick="id_searchUSF('id_searchNPUF' , 'orderNewPUnStockF') "><i class="fas fa-search"></i></button>
        </div>
        </div>
        <div class="div_search">
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCONPUSF','all', 'orderNewPUnStockF')">همه تاریخ ها</button>
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCONPUSF','today', 'orderNewPUnStockF')">امروز</button>
        <button type="button" class="btn byn_search"onclick="date_searchUSF('dateSCONPUSF','yesterday', 'orderNewPUnStockF')">دیروز</button>
          <div class="div_search_form_date" action="index.html" method="post">
            <span>از تاریخ</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchNPUFDay1" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchNPUFMonth1" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchNPUFYear1" placeholder="سال">
            <span>تا</span>
            <input type="text" class="input_date input_day_date placeholder" id="searchNPUFDay2" placeholder="روز">
            <input type="text" class="input_date input_month_date placeholder" id="searchNPUFMont2" placeholder="ماه">
            <input type="text" class="input_date input_year_date placeholder" id="searchNPUFYear2" placeholder="سال">
            <button type="button" class="btn_date btn"onclick="fromDAte_searchUSF('dateSCONPUSF','date1SCONPUSF','date2SCONPUSF','orderNewPUnStockF','searchNPUFDay1','searchNPUFMonth1','searchNPUFYear1','searchNPUFDay2','searchNPUFMont2','searchNPUFYear2')"><i class="fas fa-search"></i></button>
          </div>
         </div>
      <div class="div_map">
        @if ($mapId)
          <span>{{$mapId}}</span>
        @else
        <span>{{$mapPro}} ,</span>
        <span> {{$mapDate}} </span>
        @endif
      </div>
      {{-- @if (empty($newOrder[0]['id']) and $notRecord=='no')
        <div class="div_alert alert alert-danger">
          سفارش جدیدی موجود نیست .
        </div>
      @elseif (empty($newOrder[0]['id']) and $notRecord=='ok')
        <div class="div_alert alert alert-danger">
          طبق جستجوی شما سفارشی یافت نشد .
        </div>
      @else --}}
    <div class="divRow">
      <div class="divRow2">
        <div class="divRow3 rowNumber"><i class="fas fa-certificate"></i></div>
        <div class="divRow3 orderProceedUnSF1">نام محصول</div>
        <div class="divRow3 orderProceedUnSF2">تعداد</div>
        <div class="divRow3 orderProceedUnSF3">کد محصول</div>
        <div class="divRow3 orderProceedUnSF4">کد خرید</div>
        <div class="divRow3 orderProceedUnSF5">تاریخ خرید</div>
        <div class="divRow3 orderProceedUnSF6">خریدار</div>
        <div class="divRow3 orderProceedUnSF7">استان خریدار</div>
      </div>
      @php
        $r=0;
      @endphp
      @foreach ($buyOrder as $buyOrders)
        @php
        $pro2=$proShop->find($buyOrders->proShop_id);

        $r++;
        $classBg = ($r % 2 == 0) ? 'classBg2' : 'classBg1' ;;
        @endphp
        <div class="divRow2 pointer {{$classBg}} " onclick="window.location='/orderOneBuyUnStockF/{{$buyOrders->id}}'">
          <div class="divRow3 rowNumber ">{{$r}}</div>
          <div class="divRow3 orderProceedUnSF1 orderProceedUnSF1_2">{{$pro2->name}}</div>
          <div class="divRow3 orderProceedUnSF2">{{$buyOrders->num_pro}} {{$pro2->vahed}}</div>
          <div class="divRow3 orderProceedUnSF3 orderProceedUnSF3_2">{{$pro2->id}}</div>
          <div class="divRow3 orderProceedUnSF4 orderProceedUnSF4_2">{{$buyOrders->id}}</div>
          <div class="divRow3 orderProceedUnSF5">{{str_replace('-', '/',$buyOrders->date_up )}}</div>
          <div class="divRow3 orderProceedUnSF6">{{$buyOrders->name}} </div>
          <div class="divRow3 orderProceedUnSF7">{{$buyOrders->ostan}}</div>
        </div>
      @endforeach
    </div>
    {{-- @endif --}}
  </div>


@endsection
