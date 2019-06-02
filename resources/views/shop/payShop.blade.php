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
      <form class="form form_payShop" id="form_payShop" action="" method="post">
         <div id="ajax_payShop"></div>
         {{ csrf_field() }}
         <div class="form-group">
            <label for="code_payShop" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#Mcode_sabtCodePSh"></i> کد محصول</label>
            <div class="div_form"><input type="text" class="form-control" id="code_payShop"placeholder="" value=""></div>
          </div>
          <div class="form-group form_btn">
            <button type="button" class="btn btn-success" onclick="SearchPayShop()" >جستجو</button>
          </div>
        </form>
  @if (empty($idPro))


      @if (empty($proShop[0]->id))
        <div class="">
          تاکنون پرداختی انجام نشده است .
        </div>
      @else
        <div class="div_payShop">
          <div class="div_payShop1"><i class="fas fa-certificate"></i></div>
          <div class="div_payShop2">کد محصول</div>
          <div class="div_payShop3">نام محصول</div>
          <div class="div_payShop4">مبلغ (تومان)</div>
          <div class="div_payShop5">تاریخ</div>
        </div>
        @php
          $r=0;
        @endphp
        @foreach ($proShop as $value)
          <?php $r++;
            $value2=$payShop->where('pro_id',$value->id)->first();
           ?>
          <div class="div2_payShop @if ($r % 2 == 0) payColor2 @else payColor1 @endif">
            <div class="div_payShop1">{{$r}}</div>
            <div class="div_payShop2">{{$value->id}}</div>
            <div class="div_payShop3">{{$value->name}}</div>
            <div class="div_payShop4 div2_payShop4 number">{{number_format($value2->price)}}</div>
            <div class="div_payShop5">{{$value2->date_up}}</div>
          </div>
        @endforeach
      @endif
  @else
      <div class="div3_payShop">
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
