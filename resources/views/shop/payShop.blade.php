@extends('shop.layoutDashShop')
@section('title')
 محصولات پرداخت شده
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
         محصولات پرداخت شده
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

          <div class="searchShop">
            <a  class="apjax"onclick="searchSortDateShop('all')"><button type="button" class="btn" >پرداخت 30 روز اخیر</button></a>
            <span class="searchSpanINShop"><button type="button" onclick="SearchAllNamePayShop()">همه محصولات</button><input type="text" class="searchInputSHShop placeholder"id="name_payProShop"value=""placeholder="نام محصول"> <a  class="apjax searchAShop" onclick="SearchNamePayShop()"><i class="fas fa-search"></i></a></span>
            <span class="searchSpanINShop"> <input type="text" class="searchInputSHShop placeholder"id="code_payShop"value=""placeholder="کد فروش"> <a  class="apjax searchAShop" onclick="SearchPayShop()"><i class="fas fa-search"></i></a></span>
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
           </div>
           <div class="searchDiv500">
           <div class="searchMapShop">
             sfsdf
             {{-- <span class="searchMap1Shop">{{$search_pro}}</span> , <span class="searchMap2Shop">{{$search_ostan}}</span> , <span class="searchMap3Shop">{{$search_city}}</span> ,
             @if ($sortDate=='slicing')
               از تاریخ <span class="searchMap4Shop">{{$date1}}</span> تا <span class="searchMap5Shop">{{$date2}}</span>
             @else
               <span class="searchMap6Shop">{{$search_order}}</span>
             @endif --}}


           </div>
        </div>

  @if (empty($order_id))


      @if (empty($proShop[0]->id))

        <div class="searchDiv500" id="ajax_payShop">

          <div class="divNoR0wShop">
            در 30 روز گذشته پرداختی انجام نشده است .
          </div>
        </div>
        @else
        <div class="" style=" width: 100%;float:right " id="ajax_payShop">
          <div class="div_payShop" >
            <div class="div_payShop1"><i class="fas fa-certificate"></i></div>
            <div class="div_payShop2">کد فروش</div>
            <div class="div_payShop3">نام محصول</div>
            <div class="div_payShop4">مبلغ (تومان)</div>
            <div class="div_payShop5">تاریخ</div>
          </div>
          @php
            $r=0;
          @endphp
          @foreach ($proShop as $value)
            <?php $r++;
              $value2=$payShop->where('order_id',$value->order_id)->first();
             ?>
            <div class="div2_payShop @if ($r % 2 == 0) payColor2 @else payColor1 @endif" onclick="window.location='/payShop/{{$value->order_id}}'">
              <div class="div_payShop1">{{$r}}</div>
              <div class="div_payShop2">{{$value->id}}</div>
              <div class="div_payShop3">{{$value->name}}</div>
              <div class="div_payShop4 div2_payShop4 number">{{number_format($value2->price)}}</div>
              <div class="div_payShop5">{{$value2->date_up}}</div>
            </div>
          @endforeach
       </div>{{-- //ejax error --}}

      @endif
  @else

      <div class="div3_payShop">
        <div class="editCodeBodyBazSh">
          <button type="button" class="btn" onclick="window.location='/payShop'">بازگشت</button>
        </div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">کد محصول :</div><div class="div3_payShop1_2">{{$proShop2->id}}</div> </div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">نام محصول :</div><div class="div3_payShop1_2">{{$proShop2->name}}</div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">خریدار :</div><div class="div3_payShop1_2"></div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">تاریخ ارسال :</div><div class="div3_payShop1_2"></div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">مبلغ :</div><div class="div3_payShop1_2"></div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">کد پرداخت سایت :</div><div class="div3_payShop1_2"></div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">شماره پرداخت :</div><div class="div3_payShop1_2"></div></div>
        <div class="div3_payShop1"><div class="div3_payShop1_1">تاریخ پرداخت :</div><div class="div3_payShop1_2"></div></div>

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
