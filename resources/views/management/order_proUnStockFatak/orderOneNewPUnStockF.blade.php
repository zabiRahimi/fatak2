@extends('management.order_proUnStockFatak.layoutOrder_proUnStockFatak')
@section('title')
  مشاهده سفارش
@endsection
@section('show_UnstockFatak')

    <div class="div_titr">
      مشاهده سفارش
      <button type="button" class="btn btn-primary btnBack" onclick="window.location='/orderNewPUnStockF';">بازگشت</button>

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
      <form class="formAdmin form_OONPUSF" id="form_OONPUSF" action="" method="post">
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> قیمت ها را به تومان وارد کنید . </div>
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> وزن ها را به گرم وارد کنید .</div>
       <div class="warning_form"><i class="fas fa-exclamation-triangle"></i> تکمیل گزینه های ستاره دار الزامی است . </div>
       {{ csrf_field() }}
       <div class="ajax_form_admin" id="ajax_formOONPUSF"></div>
       <div class="form-group  textAll">
         <label for="show_addpro1_admin" class="control-label pull-right  ">نوع محصول  <i class="fas fa-star star_form"></i> </label>
         <div class="divRadio">
           <label class="labelRadio_R">
             <span >اصل محصول</span>
             <input type="radio" class=""  name="stamp_OONPUSF" value="1">
           </label>
           <label class="labelRadio_L">
             <span > مشابه محصول</span>
             <input type="radio" class=""  name="stamp_OONPUSF" value="2">
           </label>
         </div>
       </div>
       <div class="form-group textAll">
         <label for="name_orderSabtSh" class="control-label pull-right "> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_OONPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="maker_orderSabtSh" class="control-label pull-right ">  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_OONPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="brand_orderSabtSh" class="control-label pull-right ">  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_OONPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="model_orderSabtSh" class="control-label pull-right "> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_OONPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="price_orderSabtSh" class="control-label pull-right "> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="price_OONPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="vahed_addpro1_admin" class="control-label pull-right  "> واحد شمارش محصول <i class="fas fa-star star_form"></i> </label>
         <select class="form-control"id="vahed_OONPUSF">
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
       </div>
       <div class="form-group textAll">
         <label for="num_orderSabtSh" class="control-label pull-right "> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_OONPUSF"min="1" placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group  textAll">
         <label for="show_addpro1_admin" class="control-label pull-right  "> ابعاد محصول <i class="fas fa-star star_form"></i> </label>
         <div class="divRadio">
           <label class="labelRadio_R">
             <span >کمتر100cm</span>
             <input type="radio" class=""  name="dimension_OONPUSF" value="1">
           </label>
           <label class="labelRadio_L">
             <span >بیشتر100cm</span>
             <input type="radio" class=""  name="dimension_OONPUSF" value="2">
           </label>
         </div>
       </div>
       <div class="form-group textAll">
         <label for="vazn_orderSabtSh" class="control-label pull-right "> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_OONPUSF"placeholder="در صورت نیاز ..."></div>
       </div>

       <div class="form-group textAll">
         <label for="vaznPost_orderSabtSh" class="control-label pull-right "> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_OONPUSF"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="pakat_orderSabtSh" class="control-label pull-right ">  هزینه بسته بندی (تومان) </label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_OONPUSF"placeholder="چنانچه بسته بندی هزینه دارد ، الزامی است"></div>
       </div>
       <div class="fr-view textareaEditor">
         <label for="term_addpro1_admin" class="control-label pull-right  ">  توضیح محصول </label>
         <textarea name="name"class="editor" id="dis_OONPUSF"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
       </div>
       <div class="form-group textAll">
         <label for="dateMake_orderSabtSh" class="control-label pull-right "> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_OONPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="form-group textAll">
         <label for="dateExpiration_orderSabtSh" class="control-label pull-right "> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_OONPUSF"placeholder="اختیاری ..."></div>
       </div>
       <div class="fr-view textareaEditor">
         <label for="term_addpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
         <textarea name="name"class="editor" id="term_OONPUSF"></textarea>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 <span id="checkImg1"></span></label>
         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU1" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU1"></div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 2 <span id="checkImg2"></span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU2" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU2"></div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 <span id="checkImg3"></span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU3" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU3"></div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 <span id="checkImg4"></span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU4" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU4"></div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 <span id="checkImg5"></span></label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU5" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU5"></div>
       </div>
       <div class="form-group textAll">
         <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 <span id="checkImg6"></span> </label>

         <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#imgOONPU6" value="انتخاب کنید">
         <div class="ajax_addpro1_img" id="ajax_imgOONPU6"></div>
       </div>
       <div class="form-group divSabtForm">
         <button type="button" class="btn btn-success" onclick="saveOrderNPUF({{$order->id}})" >ثبت محصول </button>
       </div>
     </form>
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">محصول شما با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU1"></div>
           <div class="proAddImg1">
             <form class="dropzone form_img_add_pro" id="MimgOONPUSF1" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
                 @csrf
                 <div class=" dz-message ">
                     <div class="col-xs-8">
                         <div class="message ">
                             <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                         </div>
                     </div>
                 </div>
             </form>
           </div>

         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU2"></div>
           <form class="dropzone form_img_add_pro" id="MimgOONPUSF2" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU3"></div>
           <form class="dropzone form_img_add_pro" id="MimgOONPUSF3" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU4"></div>
           <form class="dropzone form_img_add_pro" id="MimgOONPUSF4" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU5"></div>
           <form class="dropzone form_img_add_pro" id="MimgOONPUSF5" action="/uplodImgProSh"   enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
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
           <div class="ajax_form_admin" style="width:100%; margin:5px 0;" id="AimgOONPU6"></div>
           <form class="dropzone form_img_add_pro" id="MimgOONPUSF6" action="/uplodImgProSh"  onclick="nm()"  enctype="multipart/form-data" method="post">
             {{ csrf_field() }}
             <div class="dz-message">
                 <div class="col-xs-8">
                     <div class="message">
                         <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                     </div>
                 </div>
             </div>
           </form>
         </div>
         <div class="footer_modal_img_add_pro">
             <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
             <button type="button" class="btn btn-danger" onclick="del_img('imgAddPro1','ajax_addpro1_img1','checkImg1')">حذف عکس</button>
         </div>
       </div>
     </div>
   </div><!--end modal  عکس ششم -->
@endsection
