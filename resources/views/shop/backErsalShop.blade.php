@extends('shop.layoutDashShop')
@section('title')
  محصولات مرجوعی
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
        محصولات مرجوعی
    </div>
    <div class="dashLBodySh">
      {{-- <form class="form form_payShop" id="form_payShop" action="" method="post">
         <div id="ajax_payShop"></div>
         {{ csrf_field() }}
         <div class="form-group">
            <label for="code_payShop" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#Mcode_sabtCodePSh"></i> کد فروش</label>
            <div class="div_form"><input type="text" class="form-control" id="code_payShop"placeholder="" value=""></div>
          </div>
          <div class="form-group form_btn">
            <button type="button" class="btn btn-success" onclick="SearchPayShop()" >جستجو</button>
          </div>
        </form> --}}




  @if (empty($order_id))
    <div class="searchDiv500">
      <div class="searchShop">
        <a  class="apjax"onclick="SearchAllDateBackShop()"><button type="button" class="btn" >مرجوعی 30 روز اخیر</button></a>
        <span class="searchSpanINShop"><button type="button" onclick="SearchAllNameBackShop()">همه محصولات</button><input type="text" class="searchInputSHShop placeholder"id="name_backProShop"value=""placeholder="نام محصول"> <a  class="apjax searchAShop" onclick="SearchNameBackShop()"><i class="fas fa-search"></i></a></span>
        <span class="searchSpanINShop"> <input type="text" class="searchInputSHShop placeholder"id="code_backShop"value=""placeholder="کد فروش"> <a  class="apjax searchAShop" onclick="SearchBackShop()"><i class="fas fa-search"></i></a></span>

        <div class="searchSpan2Shop">
          <div class="searchSpan2Shop2">
            <span class="searchSpan1Shop" >از تاریخ</span>
            <input type="text"class="searchInputShop searchInput2Shop"id="day1_backShop" placeholder="روز">
            <input type="text"class="searchInputShop searchInput2Shop"id="month1_backShop" placeholder="ماه">
            <input type="text"class="searchInputShop searchInput3Shop"id="year1_backShop" placeholder="سال">
          </div>
          <div class="searchSpan2Shop2">
            <span class="searchSpan1Shop">تا</span>
            <input type="text"class="searchInputShop searchInput2Shop"id="day2_backShop" placeholder="روز">
            <input type="text"class="searchInputShop searchInput2Shop"id="month2_backShop" placeholder="ماه">
            <input type="text"class="searchInputShop searchInput3Shop"id="year2_backShop" placeholder="سال">

            <a  class="apjax searchAShop" onclick="SearchDateSortBackShop()"><i class="fas fa-search"></i></a>
          </div>
        </div>
       </div>
       <div class="searchMapShop">
         <span class="searchMap1Shop">{{$search_pro}}</span> ,
         @if ($sortDate=='slicing')
           از تاریخ <span class="searchMap4Shop">{{$date1}}</span> تا <span class="searchMap5Shop">{{$date2}}</span>
         @else
           <span class="searchMap6Shop">{{$sortDate}}</span>
         @endif
       </div>

 </div>

      @if (empty($pro[0]->id))

        <div class="searchDiv500" id="ajax_backShop">

          <div class="divNoR0wShop">
            {{$erorrBackShop}}
          </div>
        </div>
        @else
        <div class="" style=" width: 100%;float:right " id="ajax_backShop">
          <div class="div_payShop" >
            <div class="div_payShop1"><i class="fas fa-certificate"></i></div>
            <div class="div_payShop2">کد فروش</div>
            <div class="div_payShop3">نام محصول</div>
            <div class="div_payShop4">تاریخ ارجاع</div>
            <div class="div_payShop5">تاریخ ارسال</div>
          </div>
          @php
            $r=0;
          @endphp
          @foreach ($pro as $value)
            <?php $r++;
              $value2=$backShop->where('order_id',$value->order_id)->first();
             ?>
            <div class="div2_payShop @if ($r % 2 == 0) payColor2 @else payColor1 @endif" onclick="window.location='/backErsalShop/{{$value->order_id}}'">
              <div class="div_payShop1">{{$r}}</div>
              <div class="div_payShop2">{{$value->order_id}}</div>
              <div class="div_payShop3">{{$value->name}}</div>
              <div class="div_payShop4 div2_payShop4 number">{{$value2->date_back}}</div>
              <div class="div_payShop5">{{$value->date_up}}</div>
            </div>
          @endforeach
       </div>{{-- //ejax error --}}

      @endif
  @else

      <div class="div3_payShop">
        <div class="editCodeBodyBazSh">
          <button type="button" class="btn" onclick="window.location='/backErsalShop'">بازگشت</button>
        </div>
        <div class="row1"><div class="row2_1">کد محصول :</div><div class="row2_2">{{$pro2->id}}</div> </div>
        <div class="row1"><div class="row2_1">نام محصول :</div><div class="row2_2">{{$pro2->name}}</div></div>
        <div class="row1"><div class="row2_1">خریدار :</div><div class="row2_2">{{$buy->name}}</div></div>
        <div class="row1"><div class="row2_1">تاریخ ارسال :</div><div class="row2_2">{{$pro2->date_up}}</div></div>
        <div class="row3"><div class="row3_1">توضیح خریدار :</div><div class="row3_2">{{$backShop2->buyer_dis}}</div></div>
        <div class="row3"><div class="row3_1">نظر کارشناس :</div><div class="row3_2">{{$backShop2->master_dis}}</div></div>

        <div class="row1"><div class="row2_1">هزینه ارجاع بعهده :</div><div class="row2_2 ">{{$backShop2->undertake_back}}</div></div>
        <div class="row1"><div class="row2_1">هزینه ارجاع :</div><div class="row2_2 number">{{number_format($backShop2->price_back) }}</div></div>
        <div class="row1"><div class="row2_1">هزینه ارسال بعهده :</div><div class="row2_2">{{$backShop2->undertake_ersal}}</div></div>
        <div class="row1"><div class="row2_1">هزینه ارسال :</div><div class="row2_2 number">{{number_format($buy->price_post) }}</div></div>
        <div class="row3"><div class="row3_1">شرح خسارت :</div><div class="row3_2">{{$backShop2->loss_dis}}</div></div>

        <div class="row1"><div class="row2_1">هزینه خسارت بعهده :</div><div class="row2_2">{{$backShop2->undertake_loss}}</div></div>
        <div class="row1"><div class="row2_1">هزینه خسارت :</div><div class="row2_2 number">{{number_format($backShop2->loss_price) }}</div></div>
        <div class="row1"><div class="row2_1">تاریخ ارجاع :</div><div class="row2_2">{{$backShop2->date_back}}</div></div>
        <div class="row1"><div class="row2_1">کد رهگیری محموله :</div><div class="row2_2">{{$backShop2->code_rahgiry}}</div></div>


      </div>
  @endif

    </div>
  @endif
   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_editCodeRahgirySh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">متشکریم !! کد رهگیری با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal error.-->
   <div class="modal fade" id="error_editCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         <div id="ajax_error_editCodePSh"></div>
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   {{--  --}}
   <div class="modal fade" id="Mcode_editCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           کد محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="McodeR_editCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          کد رهگیری محموله
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->


@endsection
