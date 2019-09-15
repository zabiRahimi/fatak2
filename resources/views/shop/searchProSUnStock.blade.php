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
    <div class="divOrderRow2 {{$color}}">
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
    <form class="form form_orderSabtSh" id="form_orderSabtSh" action="" method="post">
     <div class="form_titr"><i class="fas fa-info-circle"></i> ثبت محصول </div>
     <div class="formTitrShop">
         <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
     </div>
     <div id="ajax_orderSabtSh"></div>
     {{ csrf_field() }}
     <div class="form-group">
       <label for="stamp_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_orderSabtSh"></i> نوع محصول</label>
       <div class="div_form_radio1">
           <div class="div_form_radio2 stamp_orderSabtShD1">
             <label for="stamp_orderSabtSh1" class="control-label pull-right "> اصل محصول</label>
             <input type="radio" name="stamp_orderSabtSh" id="stamp_orderSabtSh1"@if ($proShop->stamp==1) checked @endif value="1">
           </div>
           <div class="div_form_radio2 stamp_orderSabtShD2">
             <label for="stamp_orderSabtSh2" class="control-label pull-right "> مشابه محصول</label>
             <input type="radio" name="stamp_orderSabtSh" id="stamp_orderSabtSh2"@if ($proShop->stamp==2) checked @endif value="2">
           </div>
       </div>
     </div>
     <div class="form-group">
       <label for="name_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mname_orderSabtSh"></i> نام محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->name}}" id="name_orderSabtSh"></div>
     </div>
     <div class="form-group">
       <label for="maker_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmaker_orderSabtSh"></i>  سازنده محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->maker}}" id="maker_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="brand_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mbrand_orderSabtSh"></i>  برند محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->brand}}" id="brand_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="model_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmodel_orderSabtSh"></i> مدل محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->model}}" id="model_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="price_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت محصول (تومان)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->price}}" id="price_orderSabtSh"></div>
     </div>
     <div class="form-group">
       <label for="vahed_sabtOrder" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا</label>
       <div class="div_form">
         <select class="select squad_sabtOrder" id="vahed_orderSabtSh" name="" >
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
       <label for="num_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mnum_orderSabtSh"></i> تعداد کالای موجود</label>
       <div class="div_form"><input type="number" class="form-control placeholder"value="{{$proShop->num}}" id="num_orderSabtSh"min="1" placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="vazn_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvazn_orderSabtSh"></i> وزن محصول</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vazn}}" id="vazn_orderSabtSh"placeholder="در صورت نیاز ..."></div>
     </div>
     <div class="form-group">
       <label for="stamp_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_orderSabtSh"></i> ابعاد محصول</label>
       <div class="div_form_radio1">
           <div class="div_form_radio2 stamp_orderSabtShD1">
             <label for="dimension_orderSabtSh1" class="control-label pull-right "> بزرگتر از 100 cm</label>
             <input type="radio" name="dimension_orderSabtSh"@if ($proShop->dimension==1) checked @endif id="dimension_orderSabtSh1" value="2">
           </div>
           <div class="div_form_radio2 stamp_orderSabtShD2">
             <label for="dimension_orderSabtSh2" class="control-label pull-right ">کوچکتر از 100 cm </label>
             <input type="radio" name="dimension_orderSabtSh"@if ($proShop->dimension==1) checked @endif  id="dimension_orderSabtSh2" value="1">
           </div>
       </div>
     </div>
     <div class="form-group">
       <label for="vaznPost_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MvaznPost_orderSabtSh"></i> وزن پستی محصول (گرم)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->vaznPost}}" id="vaznPost_orderSabtSh"></div>
     </div>
     <div class="form-group">
       <label for="pakat_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mpakat_orderSabtSh"></i>  هزینه بسته بندی (تومان)</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->pakat}}" id="pakat_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="dis_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i> توضیح محصول</label>
       <div class="div_formTextarea">
         <textarea name="name" class="placeholder" id="dis_orderSabtSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShop->dis}}</textarea>
       </div>
     </div>
     <div class="form-group">
       <label for="dateMake_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateMake_orderSabtSh"></i> تاریخ تولید</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->dateMake}}" id="dateMake_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="dateExpiration_orderSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateExpiration_orderSabtSh"></i> تاریخ انقضا</label>
       <div class="div_form"><input type="text" class="form-control placeholder"value="{{$proShop->dateExpiration}}" id="dateExpiration_orderSabtSh"placeholder="اختیاری ..."></div>
     </div>
     <div class="form-group">
       <label for="term_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mterm_orderSabtSh"></i> شرایط نگهداری</label>
       <div class="div_formTextarea">
         <textarea name="name" class=" placeholder" id="term_orderSabtSh"placeholder="اختیاری ...">{{$proShop->term}}</textarea>
       </div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img1_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg1_orderSabtSh"></i> عکس 1 <span id="Iimg1_orderSabtSh"></span></label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg1" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg1_orderSabtSh"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img2_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 2 <span id="Iimg2_orderSabtSh"></span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg2" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg2_orderSabtSh"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img3_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 3 <span id="Iimg3_orderSabtSh"></span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg3" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg3_orderSabtSh"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img4_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 4 <span id="Iimg4_orderSabtSh"></span></label>
      <div class="div_form"> <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg4" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg4_orderSabtSh"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img5_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 5 <span id="Iimg5_orderSabtSh"></span></label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg5" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg5_orderSabtSh"></div>
     </div>
     <div class="form-group add_pro_form1_1">
       <label for="img6_orderSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mimg0_orderSabtSh"></i> عکس 6 <span id="Iimg6_orderSabtSh"></span> </label>
       <div class="div_form"><input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#MAddProImg6" value="انتخاب کنید"></div>
       <div class="imgHidden" id="Aimg6_orderSabtSh"></div>
     </div>
     <div class="form-group form_btn">
       <button type="button" class="btn btn-success" onclick="proShop({{$proShop->id}})" >ثبت</button>
     </div>
   </form>
  @endif
@endif
