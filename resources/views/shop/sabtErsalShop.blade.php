@extends('shop.layoutDashShop')
@section('title')
  ثبت محصول ارسال شده
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
      ثبت محصول ارسال شده
    </div>
    <div class="dashLBodySh">
      <form class="form form_sabtCodePSh" id="form_sabtCodePSh" action="" method="post">
         <div id="ajax_sabtCodePSh"></div>
         {{ csrf_field() }}
         <div class="form-group">
            <label for="code_sabtCodePSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#Mcode_sabtCodePSh"></i> کد فروش</label>
            <div class="div_form"><input type="text" class="form-control" id="code_sabtCodePSh"placeholder="" value=""></div>
          </div>
          <div class="form-group form_btn">
            <button type="button" class="btn btn-success" onclick="sabtCodeSh()" >ثبت و جستجو</button>
          </div>
        </form>
        @if (!empty($order_id))
          <div class="sabtCodeBodySh">
            <div class="sabtCodeBodyTSh">
              مشخصات محصول
            </div>
            <div class="sabtCodeBodyPSh">
              <div class="sabtCodeBodyP1Sh">نام محصول :</div>
              <div class="sabtCodeBodyP2Sh">{{$pro->name}}</div>
            </div>
            <div class="sabtCodeBodyPSh">
              <div class="sabtCodeBodyP1Sh">تعداد محصول :</div>
              <div class="sabtCodeBodyP2Sh">{{$buyer->num_pro}}</div>
            </div>

            <div class="sabtCodeBodyLSh"></div>

            <div class="sabtCodeBodyT2Sh">
              مشخصات خریدار
            </div>
            <div class="sabtCodeBodyBSh">
              <div class="sabtCodeBodyB1Sh">نام خریدار :</div>
              <div class="sabtCodeBodyB2Sh">{{$buyer->name}}</div>
            </div>
            <div class="sabtCodeBodyBSh">
              <div class="sabtCodeBodyB1Sh">کد پستی :</div>
              <div class="sabtCodeBodyB2Sh">{{$buyer->codepost}}</div>
            </div>
            <div class="sabtCodeBodyBASh">
              <div class="sabtCodeBodyBA1Sh">آدرس :</div>
              <div class="sabtCodeBodyBA2Sh">{{$buyer->ostan}} -  {{$buyer->city}} -  {{$buyer->address}}</div>
            </div>
            <div class="sabtCodeBodyBPSh">
              <div class="sabtCodeBodyBP1Sh">نوع پست :</div>
              <div class="sabtCodeBodyBP2Sh">{{$buyer->post}}</div>
            </div>

          </div>
          <form class="form form_sabtCodeRahgirySh" id="form_sabtCodeRahgirySh" action="" method="post">
             <div id="ajax_sabtCodeRahgirySh"></div>
             {{ csrf_field() }}
             <div class="form-group">
                <label for="codeR_sabtCodePSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#McodeR_sabtCodePSh"></i> کد رهگیری محموله</label>
                <div class="div_form"><input type="text" class="form-control" id="codeR_sabtCodePSh"placeholder="" value=""></div>
              </div>
              <div class="form-group form_btn">
                <button type="button" class="btn btn-success" onclick="sabtCodeRahgirySh({{$pro->id}})" >ثبت کد</button>
              </div>
            </form>

        @endif
    </div>
  @endif
   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_sabtCodeRahgirySh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
   <div class="modal fade" id="error_sabtCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         <div id="ajax_error_sabtCodePSh"></div>
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   {{--  --}}
   <div class="modal fade" id="Mcode_sabtCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           کد محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="McodeR_sabtCodePSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          کد رهگیری محموله
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->


@endsection
