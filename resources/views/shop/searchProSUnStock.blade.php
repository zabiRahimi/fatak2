@if ($check==1)
@if (empty($proShop[0]->id))
  <div class="alert alert-danger">
    محصولی مطابق با جستجوی شما یافت نشد .
  </div>
@else
  <div class="divOrderRow1">
    <div class="divOrderSPR"><i class="fas fa-certificate"></i></div>
    <div class="divOrderSP1">نام محصول</div>
    <div class="divOrderSP2">کد محصول</div>
    <div class="divOrderSP3">قیمت (تومان)</div>
    <div class="divOrderSP4">تاریخ ثبت</div>
  </div>
  @php
    $r=0;
  @endphp
  @foreach ($proShop as $value)
    <?php $r++;
    if ($r%2==0) {
      $color='color1';
    }else {
      $color="color2";
    }
     ?>
    <div class="divOrderRow2 {{$color}}"onclick="searchIdSUnStock({{$value->id}})">
      <div class="divOrderSPR">{{$r}}</div>
      <div class="divOrderSP1">{{$value->name}}</div>
      <div class="divOrderSP2">{{$value->id}}</div>
      <div class="divOrderSP3">{{$value->price}} <span>تومان</span> </div>
      <div class="divOrderSP4">{{str_replace('-', '/',$value->date_up )}}</div>
    </div>
  @endforeach
@endif
@elseif ($check==2)
  @if (empty($proShop->id))
    <div class="alert alert-danger">
      محصولی مطابق با جستجوی شما یافت نشد .
    </div>
  @else
    <form class="form form_orderPSUS" id="form_orderPSUS" action="" method="post">
     <div class="form_titr"><i class="fas fa-info-circle"></i> ثبت محصول </div>
     <div class="formTitrShop">
         <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
     </div>
     <div id="ajax_orderPSUS"></div>
     {{ csrf_field() }}
     <div class="form-group">
       <label for="stamp_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS" data-toggle="modal" data-target="#Mstamp_orderPSUS"></i> نوع محصول</label>
       <div class="div_form_radio1">
           <div class="div_form_radio2 stamp_orderPSUSD1">
             <label for="stamp_orderPSUS1" class="control-label pull-right "> اصل محصول</label>
             <input type="radio" name="stamp_orderPSUS" id="stamp_orderPSUS1"@if ($proShop->stamp==1) checked @endif value="1">
           </div>
           <div class="div_form_radio2 stamp_orderPSUSD2">
             <label for="stamp_orderPSUS2" class="control-label pull-right "> مشابه محصول</label>
             <input type="radio" name="stamp_orderPSUS" id="stamp_orderPSUS2"@if ($proShop->stamp==2) checked @endif value="2">
           </div>
       </div>
     </div>
     <div class="form-group">
       <label for="name_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mname_orderPSUS"></i> نام محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->name}}" id="name_orderPSUS"></div>
     </div>
     <div class="form-group">
       <label for="maker_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mmaker_orderPSUS"></i>  سازنده محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->maker}}" id="maker_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="brand_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mbrand_orderPSUS"></i>  برند محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->brand}}" id="brand_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="model_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mmodel_orderPSUS"></i> مدل محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->model}}" id="model_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="price_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mprice_orderPSUS"></i> قیمت محصول (تومان)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->price}}" id="price_orderPSUS"></div>
     </div>
     <div class="form-group">
       <label for="price_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mprice_orderPSUS"></i> قیمت برای این سفارش</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="" id="price_orderPSUS"placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
     </div>
     <div class="form-group">
       <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا</label>
       <div class="div_form">
         <select class="select squad_sabtOrder" id="vahed_orderPSUS" name="" >
           <option value="">انتخاب کنید</option>
           <option value="عدد">عدد</option>
           <option value="بسته">بسته</option>
           <option value="کارتن">کارتن</option>
           <option value="گونی">گونی</option>
           <option value="گرم">گرم</option>
           <option value="کیلو گرم">کیلو گرم</option>
           <option value="جین">جین</option>
         </select>
       </div>
     </div>
     <div class="form-group">
       <label for="num_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mnum_orderPSUS"></i> تعداد کالای موجود</label>
       <div class="div_form"><input type="number" class="form-control placeholder"value="{{$proShop->num}}" id="num_orderPSUS"min="1" placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="vazn_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mvazn_orderPSUS"></i> وزن محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vazn}}" id="vazn_orderPSUS"placeholder="در صورت نیاز ..."></div>
     </div>
     <div class="form-group">
       <label for="stamp_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS" data-toggle="modal" data-target="#Mstamp_orderPSUS"></i> ابعاد محصول</label>
       <div class="div_form_radio1">
           <div class="div_form_radio2 stamp_orderPSUSD1">
             <label for="dimension_orderPSUS1" class="control-label pull-right "> بزرگتر از 100 cm</label>
             <input type="radio" name="dimension_orderPSUS"@if ($proShop->dimension==1) checked @endif id="dimension_orderPSUS1" value="2">
           </div>
           <div class="div_form_radio2 stamp_orderPSUSD2">
             <label for="dimension_orderPSUS2" class="control-label pull-right ">کوچکتر از 100 cm </label>
             <input type="radio" name="dimension_orderPSUS"@if ($proShop->dimension==1) checked @endif  id="dimension_orderPSUS2" value="1">
           </div>
       </div>
     </div>
     <div class="form-group">
       <label for="vaznPost_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#MvaznPost_orderPSUS"></i> وزن پستی محصول (گرم)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vaznPost}}" id="vaznPost_orderPSUS"></div>
     </div>
     <div class="form-group">
       <label for="pakat_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mpakat_orderPSUS"></i>  هزینه بسته بندی (تومان)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->pakat}}" id="pakat_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="dis_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mdis_orderPSUS"></i> توضیح محصول</label>
       <div class="div_formTextarea">
         <textarea name="name" class="placeholder" id="dis_orderPSUS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShop->dis}}</textarea>
       </div>
     </div>
     <div class="form-group">
       <label for="dis_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mdis_orderPSUS"></i>توضیح برای این سفارش</label>
       <div class="div_formTextarea">
         <textarea name="name" class="placeholder" id="dis_orderPSUS"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید .">{{$proShop->dis}}</textarea>
       </div>
     </div>
     <div class="form-group">
       <label for="dateMake_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#MdateMake_orderPSUS"></i> تاریخ تولید</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->dateMake}}" id="dateMake_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="dateExpiration_orderPSUS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#MdateExpiration_orderPSUS"></i> تاریخ انقضا</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->dateExpiration}}" id="dateExpiration_orderPSUS"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="term_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mterm_orderPSUS"></i> شرایط نگهداری</label>
       <div class="div_formTextarea">
         <textarea name="name" class=" placeholder" id="term_orderPSUS"placeholder="اختیاری ...">{{$proShop->term}}</textarea>
       </div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img1_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg1_orderPSUS"></i> عکس 1 <span id="Iimg1_orderPSUS">@if (!empty($picture_shop->pic_b1)) <i class="fas fa-check Icheck"></i> @endif</span></label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg1" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg1_orderPSUS"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img2_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg0_orderPSUS"></i> عکس 2 <span id="Iimg2_orderPSUS">@if (!empty($picture_shop->pic_b2)) <i class="fas fa-check Icheck"></i> @endif</span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg2" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg2_orderPSUS"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img3_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg0_orderPSUS"></i> عکس 3 <span id="Iimg3_orderPSUS">@if (!empty($picture_shop->pic_b3)) <i class="fas fa-check Icheck"></i> @endif</span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg3" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg3_orderPSUS"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img4_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg0_orderPSUS"></i> عکس 4 <span id="Iimg4_orderPSUS">@if (!empty($picture_shop->pic_b4)) <i class="fas fa-check Icheck"></i> @endif</span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg4" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg4_orderPSUS"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img5_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg0_orderPSUS"></i> عکس 5 <span id="Iimg5_orderPSUS">@if (!empty($picture_shop->pic_b5)) <i class="fas fa-check Icheck"></i> @endif</span></label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg5" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg5_orderPSUS"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img6_orderPSUS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mimg0_orderPSUS"></i> عکس 6 <span id="Iimg6_orderPSUS">@if (!empty($picture_shop->pic_b6)) <i class="fas fa-check Icheck"></i> @endif</span> </label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MPSUSProImg6" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg6_orderPSUS"></div>
     </div>
     <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="editProShopUnStock({{$proShop->id}})" >ثبت و اعمال تغییرات</button>
     </div>
   </form>
  @endif
@endif
<!-- Modal موفق بودن ثبت محصول-->
<div class="modal fade" id="end_orderPSUS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
{{--
 نکته بیسار مهم : مودال های عکس در صفحه زیر قرار دارند
 newOrderShopOne.blade.php
 --}}
