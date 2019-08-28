@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
 @section('title')
  مدیریت :: سفارش محصولات موجود فاتک
@endsection
@section('show_UnstockFatak')
  <div class="div_titr">
   سفارشات جدید غیر ثابت
  </div>
  <div class="div_body">
    @if (empty($newOrder[0]['id']))
      <div class="alert alert-danger">
        سفارش جدیدی موجود نیست .
      </div>
    @else
      <div class="div_search">
        <button type="button" class="btn byn_search">همه محصولات</button>
        <button type="button" class="btn byn_search">همه استان ها</button>
        <button type="button" class="btn byn_search">امروز</button>
        <button type="button" class="btn byn_search">دیروز</button>
        <form class="div_search_form_date" action="index.html" method="post">
          <span>از تاریخ</span>
          <input type="text" class="input_day_date placeholder" id="" placeholder="روز">
          <input type="text" class="input_month_date placeholder" id="" placeholder="ماه">
          <input type="text" class="input_year_date placeholder" id="" placeholder="سال">
          <span>تا</span>
          <input type="text" class="input_day_date placeholder" id="" placeholder="روز">
          <input type="text" class="input_month_date placeholder" id="" placeholder="ماه">
          <input type="text" class="input_year_date placeholder" id="" placeholder="سال">
          <button type="button" class="btn_date btn"><i class="fas fa-search"></i></button>
        </form>
        <form class="div_search_form_date"  method="post">

            <select class="form-control select"id="vahed_addpro1_admin">
              <option value="">انتخاب کنید</option>
              <option value="عدد">عدد</option>
              <option value="کیلو گرم">کیلو گرم</option>
              <option value="گرم">گرم</option>
              <option value="جین">جین</option>
              <option value="گونی">گونی</option>
              <option value="درجن">درجن</option>
              <option value="کارتن">کارتن</option>
              <option value="سایر">سایر</option>
            </select>

          <button type="button" class="btn_date btn"><i class="fas fa-search"></i></button>
        </form>
      </div>
      <div class="div_map">
        سفارشات 30 روز اخیر
      </div>
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
