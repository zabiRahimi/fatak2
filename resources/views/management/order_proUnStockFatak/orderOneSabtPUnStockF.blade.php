@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
@section('title')
  مشاهده محصول ثبت شده
@endsection
@section('show_UnstockFatak')

    <div class="div_titr">
    مشاهده محصول ثبت شده
      <button type="button" class="btn btn-primary btnBack" onclick="window.location='/orderSabtPUnStockF';">بازگشت</button>

    </div>
    <div class="div_body">
      <div id="buyOneDivH1">{{-- جهت پرینت --}}
        <div class="buyOneDivTitr">
          مشخصات محصول
          <span class="codeOrder">
            <span class="codeOrder1">کد سفارش :</span>
            <span class="codeOrder2">{{$order->id}}</span>
          </span>
          <button type="button" class="btn buyOnePrint"onclick="buyOnePrintSh('buyOneDivH1')" >پرینت</button>
        </div>
        <div class="buyOneDiv orderDiv orderName">
          <div class="buyOneDiv1 orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderName2">{{$order->name}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderVahed">
          <div class="buyOneDiv1 orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
          <div class="buyOneDiv2 orderDivZ orderVahed2">{{$order->num}} {{$order->vahed}} </div>
        </div>
        <div class="buyOneDiv orderDiv orderVahed">
          <div class="buyOneDiv1 orderDivZ0 orderVahed1">دسته محصول <span class="orderDivSpan">:</span> </div>
          <div class="buyOneDiv2 orderDivZ orderVahed2">{{$order->squad}} </div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">سازنده محصول <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{$order->made}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderSquad">
          <div class="buyOneDiv1 orderDivZ0 orderSquad1">مدل محصول <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderSquad2">{{$order->model}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">تاریخ سفارش<span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{ str_replace('-', '/',$order->date_up )}}</div>
        </div>
        <div class="buyOneDivM orderDiv2 orderDis">
          <div class="buyOneDiv1M orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2M orderDivZ2 orderDis2">{{$order->dis}}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">استان مشتری<span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{ $order->ostan }}</div>
        </div>
        <div class="buyOneDiv orderDiv orderDate">
          <div class="buyOneDiv1 orderDivZ0 orderDate1">شهر مشتری<span class="orderDivSpan">:</span></div>
          <div class="buyOneDiv2 orderDivZ orderDate2">{{ $order->city }}</div>
        </div>
      </div>{{-- جهت پرینت --}}

      <div class="divLine"></div>
      <div class="card bg-info text-white">
        <div class="card-body">چنانچه قادر به تهیه  و فروش این محصول و یا مشابه این محصول هستید ،  اطلاعات محصول خود را در فرم زیر
        وارد کنید .</div>

      </div>
      <form class="formAdmin form_OOSPUSF" id="form_OOSPUSF" action="" method="post">
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> قیمت ها را به تومان وارد کنید . </div>
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> وزن ها را به گرم وارد کنید .</div>
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> تکمیل گزینه های ستاره دار الزامی است . </div>
       {{ csrf_field() }}
       <div class="ajax_form_admin" id="ajax_formOOSPUSF"></div>
       <div class="form-group  textAll">
         <label for="show_addpro1_admin" class="control-label pull-right  ">نوع محصول  <i class="fas fa-star star_form"></i> </label>
         <div class="divRadio">
           <label class="labelRadio_R">
             <span >اصل محصول</span>
             <input type="radio" class=""  name="stamp_OOSPUSF" @if ($proShop->stamp==1) checked @endif value="1">
           </label>
           <label class="labelRadio_L">
             <span > مشابه محصول</span>
             <input type="radio" class=""  name="stamp_OOSPUSF" @if ($proShop->stamp==2) checked @endif value="2">
           </label>
         </div>
       </div>
       <div class="form-group textAll">
         <label for="name_orderSabtSh" class="control-label pull-right "> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$proShop->name}}" id="name_OOSPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="maker_orderSabtSh" class="control-label pull-right ">  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$proShop->maker}}" id="maker_OOSPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="brand_orderSabtSh" class="control-label pull-right ">  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$proShop->brand}}" id="brand_OOSPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="model_orderSabtSh" class="control-label pull-right "> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$proShop->model }}" id="model_OOSPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="price_orderSabtSh" class="control-label pull-right "> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" value="{{$proShop->price}}" id="price_OOSPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="vahed_addpro1_admin" class="control-label pull-right  "> واحد شمارش محصول <i class="fas fa-star star_form"></i> </label>
         <select class="form-control"id="vahed_OOSPUSF">
           <option value="" >انتخاب کنید</option>
           <option value="عدد"@if($proShop->vahed=='عدد')selected @endif>عدد</option>
           <option value="کیلو گرم"@if($proShop->vahed=='کیلو گرم')selected @endif>کیلو گرم</option>
           <option value="گرم"@if($proShop->vahed=='گرم')selected @endif>گرم</option>
           <option value="جین"@if($proShop->vahed=='جین')selected @endif>جین</option>
           <option value="گونی"@if($proShop->vahed=='گونی')selected @endif>گونی</option>
           <option value="درجن"@if($proShop->vahed=='درجن')selected @endif>درجن</option>
           <option value="کارتن"@if($proShop->vahed=='کارتن')selected @endif>کارتن</option>
           <option value="سایر"@if($proShop->vahed=='سایر')selected @endif>سایر</option>
         </select>
       </div>
       <div class="form-group textAll">
         <label for="num_orderSabtSh" class="control-label pull-right "> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder"value="{{$proShop->num }}" id="num_OOSPUSF"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group  textAll">
         <label for="show_addpro1_admin" class="control-label pull-right  "> ابعاد محصول <i class="fas fa-star star_form"></i> </label>
         <div class="divRadio">
           <label class="labelRadio_R">
             <span >کمتر100cm</span>
             <input type="radio" class=""  name="dimension_OOSPUSF" @if ($proShop->dimension==1) checked @endif value="1">
           </label>
           <label class="labelRadio_L">
             <span >بیشتر100cm</span>
             <input type="radio" class=""  name="dimension_OOSPUSF" @if ($proShop->dimension==2) checked @endif value="2">
           </label>
         </div>
       </div>
       <div class="form-group textAll">
         <label for="vazn_orderSabtSh" class="control-label pull-right "> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vazn}}" id="vazn_OOSPUSF"placeholder="در صورت نیاز ..."></div>
       </div>

       <div class="form-group textAll">
         <label for="vaznPost_orderSabtSh" class="control-label pull-right "> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vaznPost}}" id="vaznPost_OOSPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="pakat_orderSabtSh" class="control-label pull-right ">  هزینه بسته بندی (تومان) </label>
         <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->pakat}}" id="pakat_OOSPUSF"placeholder="چنانچه بسته بندی هزینه دارد ، الزامی است"></div>
       </div>
       <div class="fr-view textareaEditor">
         <label for="term_addpro1_admin" class="control-label pull-right  ">  توضیح محصول </label>
         <textarea name="name"class="editor" id="dis_OOSPUSF"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShop->dis}}</textarea>
       </div>
       <div class="form-group textAll">
         <label for="dateMake_orderSabtSh" class="control-label pull-right "> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder"  value="{{$proShop->dateMake}}"id="dateMake_OOSPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="dateExpiration_orderSabtSh" class="control-label pull-right "> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder"  value="{{$proShop->dateExpiration}}"id="dateExpiration_OOSPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="fr-view textareaEditor">
         <label for="term_addpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
         <textarea name="name"class="editor" id="term_OOSPUSF">{{$proShop->term}}</textarea>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 <span id="checkImg1">@if ($picture_shops->pic_b1)<i class="fas fa-check Icheck"></i> @endif</span></label>
         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU1" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU1">{{$picture_shops->pic_b1}}</div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 2 <span id="checkImg2">@if ($picture_shops->pic_b2)<i class="fas fa-check Icheck"></i> @endif</span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU2" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU2">{{$picture_shops->pic_b2}}</div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 <span id="checkImg3">@if ($picture_shops->pic_b3)<i class="fas fa-check Icheck"></i> @endif</span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU3" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU3">{{$picture_shops->pic_b3}}</div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 <span id="checkImg4">@if ($picture_shops->pic_b4)<i class="fas fa-check Icheck"></i> @endif</span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU4" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU4">{{$picture_shops->pic_b4}}</div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 <span id="checkImg5">@if ($picture_shops->pic_b5)<i class="fas fa-check Icheck"></i> @endif</span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU5" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU5">{{$picture_shops->pic_b5}}</div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 <span id="checkImg6">@if ($picture_shops->pic_b6)<i class="fas fa-check Icheck"></i> @endif</span> </label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU6" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOOSPU6">{{$picture_shops->pic_b6}}</div>
       </div>
       <div class="form-group divSabtForm">
         <button type="button" class="btn btn-success" onclick="editOrderSPUF({{$proShop->id}},{{$order->id}})" >ثبت محصول </button>
       </div>
     </form>
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="orderModalPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-body orderAghdamModal2 ">
           <div id="ajaxOrderModalPro">

           </div>
         </div>
         <div class="orderAghdamModal3">
             <button type="button" class="btn btn-primary" data-dismiss="modal"  aria-label="Close">متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal  -->
   {{--  --}}


   {{-- مودال عکس اول --}}
   <div class="modal fade" id="imgOONPU1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body ">
           <div class="div_titr">
              آپلود عکس اول
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU1"></div>
           <div class="proAddImg1">
             <form class="dropzone form_img_add_pro" id="MimgOOSPUSF1" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
                 @csrf
                 <div class=" dz-message ">
                     <div class="col-xs-8">
                         <div class="message ">
                           @if ($picture_shops->pic_b1)
                             <img src="/img_shop/{{$picture_shops->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
                           @else
                             <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                           @endif
                         </div>
                     </div>
                 </div>
             </form>
           </div>

         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU1','ajax_imgOOSPU1','checkImg1')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس اول-->
   {{-- مودال عکس دوم --}}
   <div class="modal fade" id="imgOONPU2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header ">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="div_titr">
               آپلود عکس دوم
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU2"></div>
           <form class="dropzone form_img_add_pro" id="MimgOOSPUSF2" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($picture_shops->pic_b2)
                         <img src="/img_shop/{{$picture_shops->pic_b2}}" alt=""style="margin-top: -20px;" width="130" height="130">
                       @else
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                       @endif
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU2','ajax_imgOOSPU2','checkImg2')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس دوم-->
   {{-- مودال عکس سوم--}}
   <div class="modal fade" id="imgOONPU3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header ">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="div_titr">
             آپلود عکس سوم
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU3"></div>
           <form class="dropzone form_img_add_pro" id="MimgOOSPUSF3" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($picture_shops->pic_b3)
                         <img src="/img_shop/{{$picture_shops->pic_b3}}" alt=""style="margin-top: -20px;" width="130" height="130">
                       @else
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                       @endif
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU3','ajax_imgOOSPU3','checkImg3')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس سوم-->
   {{--  مودال عکس چهارم --}}
   <div class="modal fade" id="imgOONPU4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header modal_h_login_header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="div_titr">
             آپلود عکس چهارم
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU4"></div>
           <form class="dropzone form_img_add_pro" id="MimgOOSPUSF4" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($picture_shops->pic_b4)
                         <img src="/img_shop/{{$picture_shops->pic_b4}}" alt=""style="margin-top: -20px;" width="130" height="130">
                       @else
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                       @endif
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU4','ajax_imgOOSPU4','checkImg4')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس چهارم-->
   {{--  مودال عکس  پنجم --}}
   <div class="modal fade" id="imgOONPU5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header modal_h_login_header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="div_titr">
             آپلود عکس پنچم
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU5"></div>
           <form class="dropzone form_img_add_pro" id="MimgOOSPUSF5" action="/uplodImgProSh"   enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($picture_shops->pic_b5)
                         <img src="/img_shop/{{$picture_shops->pic_b5}}" alt=""style="margin-top: -20px;" width="130" height="130">
                       @else
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                       @endif
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU5','ajax_imgOOSPU5','checkImg5')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal عکس پنحم-->
   {{--   مودال عکس ششم --}}
   <div class="modal fade" id="imgOONPU6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body modal_body_h_login">
           <div class="div_titr">
             آپلود عکس ششم
           </div>
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOOSPU6"></div>
           <form class="dropzone form_img_add_pro" id="MimgOOSPUSF6" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                       @if ($picture_shops->pic_b6)
                         <img src="/img_shop/{{$picture_shops->pic_b6}}" alt=""style="margin-top: -20px;" width="130" height="130">
                       @else
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                       @endif
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_imgNPUF('AimgOOSPU6','ajax_imgOOSPU6','checkImg6')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal  عکس ششم -->
@endsection
