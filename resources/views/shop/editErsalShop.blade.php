@extends('shop.layoutDashShop')
@section('title')
  ویرایش محصول ارسال شده
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
        ویرایش محصول ارسال شده
    </div>
    <div class="dashLBodySh">
      <form class="form form_editCodePSh" id="form_editCodePSh" action="" method="post">
         <div id="ajax_editCodePSh"></div>
         {{ csrf_field() }}
         <div class="form-group">
            <label for="code_editCodePSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#Mcode_editCodePSh"></i> کد فروش</label>
            <div class="div_form"><input type="text" class="form-control" id="code_editCodePSh"placeholder="" value=""></div>
          </div>
          <div class="form-group form_btn">
            <button type="button" class="btn btn-success" onclick="editCodeSh()" >جستجو</button>
          </div>
        </form>
        @if (!empty($order_id))
          <div class="editCodeBodySh">
            <div class="editCodeBodyBazSh">
              <button type="button" class="btn" onclick="window.location='/editErsalShop'">بازگشت</button>
            </div>
            <div class="editCodeBodyTSh">
              مشخصات محصول
            </div>
            <div class="editCodeBodyPSh">
              <div class="editCodeBodyP1Sh">نام محصول :</div>
              <div class="editCodeBodyP2Sh">{{$pro2->name}}</div>
            </div>
            <div class="editCodeBodyPSh">
              <div class="editCodeBodyP1Sh">تعداد محصول :</div>
              <div class="editCodeBodyP2Sh">{{$buyer->num_pro}}</div>
            </div>

            <div class="editCodeBodyLSh"></div>

            <div class="editCodeBodyT2Sh">
              مشخصات خریدار
            </div>
            <div class="editCodeBodyBSh">
              <div class="editCodeBodyB1Sh">نام خریدار :</div>
              <div class="editCodeBodyB2Sh">{{$buyer->name}}</div>
            </div>
            <div class="editCodeBodyBSh">
              <div class="editCodeBodyB1Sh">کد پستی :</div>
              <div class="editCodeBodyB2Sh">{{$buyer->codepost}}</div>
            </div>
            <div class="editCodeBodyBASh">
              <div class="editCodeBodyBA1Sh">آدرس :</div>
              <div class="editCodeBodyBA2Sh">{{$buyer->ostan}} -  {{$buyer->city}} -  {{$buyer->address}}</div>
            </div>
            <div class="editCodeBodyBPSh">
              <div class="editCodeBodyBP1Sh">نوع پست :</div>
              <div class="editCodeBodyBP2Sh">{{$buyer->post}}</div>
            </div>

          </div>
          <form class="form form_editCodeRahgirySh" id="form_editCodeRahgirySh" action="" method="post">
             <div id="ajax_editCodeRahgirySh"></div>
             {{ csrf_field() }}
             <div class="form-group">
                <label for="codeR_editCodePSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_rahnama"data-toggle="modal" data-target="#McodeR_editCodePSh"></i> کد رهگیری محموله</label>
                <div class="div_form"><input type="text" class="form-control" id="codeR_editCodePSh"placeholder="" value="{{$pro2->codeRahgiry}}"></div>
              </div>
              <div class="form-group form_btn">
                <button type="button" class="btn btn-success" onclick="editCodeRahgirySh({{$pro2->id}})" >ویرایش کد رهگیری</button>
              </div>
            </form>
        @else
          @if (empty($pro[0]->id))
            <div class="divNoR0wShop">
              محصول ارسال شده ای موجود نیست .
            </div>
          @else
          <div class="div_editCodeSh">
            <div class="div_editCodeSh1"><i class="fas fa-certificate"></i></div>
            <div class="div_editCodeSh2">کد محصول</div>
            <div class="div_editCodeSh3">نام محصول</div>
            <div class="div_editCodeSh4">کد رهگیری</div>
            <div class="div_editCodeSh5">تاریخ ثبت</div>
          </div>
          @php
            $r=0;
          @endphp
          @foreach ($pro as $value)
            <?php $r++;  ?>
            <div class="div2_editCodeSh @if ($r % 2 == 0) bColor2 @else bColor1 @endif "onclick="window.location='/editErsalShop/{{$value->order_id}}'">
              <div class="div_editCodeSh1">{{$r}}</div>
              <div class="div_editCodeSh2">{{$value->id}}</div>
              <div class="div_editCodeSh3">{{$value->name}}</div>
              <div class="div_editCodeSh4">{{$value->codeRahgiry}}</div>
              <div class="div_editCodeSh5">{{$value->date_up}}</div>
            </div>
          @endforeach
          @endif
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
