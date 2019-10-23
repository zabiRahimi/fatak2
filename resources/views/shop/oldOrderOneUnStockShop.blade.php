@extends('shop.layoutDashShop')
@section('title')
  مشاهده و ویرایش محصول پیشنهاد شده
@endsection
@section('dash_content')

    <div class="dashTitrSh">
    مشاهده و ویرایش محصول پیشنهاد شده
      <a href="/oldOrderUnStockShop"><button type="button" class="btn btn-info btnBack" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      @if ($numShowOrder)
        <div class="alert alert-warning">
          <strong>توجه :</strong> شما این محصول را در حال حاضر به {{$numShowOrder}} مشتری معرفی کرده اید .
        </div>
      @endif
      <div class="orderDivTitr">
        مشخصات سفارش خریدار
      </div>
      <div class="orderDiv orderName">
        <div class="orderDivZ0 orderName1">نام محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderName2">{{$oldOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderDate">
        <div class="orderDivZ0 orderDate1">تاریخ ثبت <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderDate2">{{Verta($oldOrderOne->date_ad)->format('y/m/d')}}</div>
      </div>
      <div class="orderDiv orderSquad">
        <div class="orderDivZ0 orderSquad1">دسته محصول <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ orderSquad2">{{$oldOrderOne->name}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">تعداد محصول <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->num}} {{$oldOrderOne->vahed}} </div>
      </div>
      <div class="orderDiv2 orderDis">
        <div class="orderDivZ02 orderDis1">توضیح مشتری <span class="orderDivSpan">:</span></div>
        <div class="orderDivZ2 orderDis2">{{$oldOrderOne->dis}}</div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">استان مشتری <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->ostan}} </div>
      </div>
      <div class="orderDiv orderVahed">
        <div class="orderDivZ0 orderVahed1">شهر مشتری <span class="orderDivSpan">:</span> </div>
        <div class="orderDivZ orderVahed2">{{$oldOrderOne->city}}</div>
      </div>
      <ul class="ul_line ulOOUSS" data-radius='r1'>
        <li onclick="showAddOffer()">پیشنهاد محصول دیگر به این سفارش <i class='fas fa-caret-down ulOOUSS_i1'></i><i class='fas fa-caret-up ulOOUSS_i2'></i></li>
      </ul>
      <ul class="ulOOUSS2" id="ulOOUSS2">
        <li onclick="showAddOffer();div_active('divStockOOUS','.divStockOOUS','#sProSStock','#sIdSStock','#ajax_searchProSStock','#form_orderEditOOUSS')">انتخاب از محصولات ثابت</li>
        <li onclick="showAddOffer();div_active('divUnStockOOUS','.divUnStockOOUS','#sProSUnStock','#sIdSUnStock','#ajax_searchProSUnStock','#form_orderEditOOUSS')">انتخاب از محصولات غیر ثابت</li>
        <li onclick="showAddOffer();div_active('divNewOOUS','.divNewOOUS','','','#ajax_newPSabtOOUSS','#form_orderEditOOUSS')">ثبت محصول جدید</li>
        <li onclick="showAddOffer();window.location.href='/oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}'">محصول جاری ({{$proShopOne->name}})</li>
      </ul>
      <div class="divOOUSS divStockOOUS orderDivH ">
        <div class="tDivOOUSS">انتخاب از محصولات ثابت
          <button type="button" class="BOOUSS"onclick="window.location.href='/oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}'">برگشت <span class="SBOOUSS">به ویرایش محصول جاری ({{$proShopOne->name}})</span> </button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sProSStock" value="" placeholder="نام محصول ثابت">
          <button type="button" onclick="searchProSStock()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sIdSStock" value="" placeholder="کد محصول ثابت">
          <button type="button" onclick=""><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivSPSS" id="ajax_searchProSStock"></div>
      </div>
      <div class="divOOUSS divUnStockOOUS orderDivH">
        <div class="tDivOOUSS">انتخاب از محصولات غیر ثابت
          <button type="button" class="BOOUSS" onclick="window.location.href='/oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}'">برگشت <span class="SBOOUSS">به ویرایش محصول جاری ({{$proShopOne->name}})</span> </button>
          {{-- {{$proShopOne->name}} --}}
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sProSUnStock" value="" placeholder="نام محصول غیر ثابت">
          <button type="button" onclick="searchProSUnStock({{$oldOrderOne->id}});spinner()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sIdSUnStock" value="" placeholder="کد محصول غیر ثابت">
          <button type="button" onclick="searchIdSUnStock('',{{$oldOrderOne->id}});spinner()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivSPSS" id="ajax_searchProSUnStock"></div>
      </div>
      <div class="divOOUSS divNewOOUS orderDivH">
      <form class="form form_newPSabtSh" id="form_newPSabtOOUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول جدید
         <button type="button" class="BOOUSS"onclick="window.location.href='/oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}'">برگشت <span class="SBOOUSS">به ویرایش محصول جاری ({{$proShopOne->name}})</span> </button>

       </div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
      <div class="ajax_form_modal" id="ajax_newPSabtSh"></div>
      {{ csrf_field() }}
      <div class="form-group">
        <label for="stamp_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_orderSabtSh"></i> نوع محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form_radio1">
            <div class="div_form_radio2 stamp_orderSabtShD1">
              <label for="stamp_orderSabtSh1" class="control-label pull-right "> اصل محصول</label>
              <input type="radio" name="stamp_newPSabtSh" id="stamp_newPSabtSh1" value="1">
            </div>
            <div class="div_form_radio2 stamp_orderSabtShD2">
              <label for="stamp_orderSabtSh2" class="control-label pull-right "> مشابه محصول</label>
              <input type="radio" name="stamp_newPSabtSh" id="stamp_newPSabtSh2" value="2">
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="name_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mname_orderSabtSh"></i> نام محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="name_newPSabtSh"></div>
      </div>
      <div class="form-group">
        <label for="maker_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmaker_orderSabtSh"></i>  سازنده محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="maker_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="brand_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mbrand_orderSabtSh"></i>  برند محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="brand_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="model_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmodel_orderSabtSh"></i> مدل محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="model_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="price_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="price_newPSabtSh"></div>
      </div>
      <div class="form-group">
        <label for="priceFOrder_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت برای این سفارش</label>
        <div class="div_form"><input type="text" class="form-control placeholder"value="" id="priceFOrder_newPSabtSh"placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
      </div>
      <div class="form-group">
        <label for="vahed_newPSabtSh" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
        <div class="div_form">
          <select class="select squad_sabtOrder" id="vahed_newPSabtSh" name="" >
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
        <label for="num_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mnum_orderSabtSh"></i> تعداد کالای موجود</label>
        <div class="div_form"><input type="number" class="form-control placeholder" id="num_newPSabtSh"min="1" placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="vazn_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvazn_orderSabtSh"></i> وزن محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_newPSabtSh"placeholder="در صورت نیاز ..."></div>
      </div>
      <div class="form-group">
        <label for="dimension_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mdimension_orderSabtSh"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form_radio1">
            <div class="div_form_radio2 dimension_orderSabtShD1">
              <label for="dimension_newPSabtSh1" class="control-label pull-right "> بزرگتر از 100 cm</label>
              <input type="radio" name="dimension_newPSabtSh" id="dimension_newPSabtSh1" value="2">
            </div>
            <div class="div_form_radio2 stamp_orderSabtShD2">
              <label for="dimension_newPSabtSh2" class="control-label pull-right ">کوچکتر از 100 cm </label>
              <input type="radio" name="dimension_newPSabtSh" id="dimension_newPSabtSh2" value="1">
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="vaznPost_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MvaznPost_orderSabtSh"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_newPSabtSh"></div>
      </div>
      <div class="form-group">
        <label for="pakat_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mpakat_orderSabtSh"></i>  هزینه بسته بندی (تومان)</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="dis_newPSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i> توضیح محصول</label>
        <div class="div_formTextarea">
          <textarea name="name" class="placeholder" id="dis_newPSabtSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="disSeller_newPSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i>توضیح برای این سفارش</label>
        <div class="div_formTextarea">
          <textarea name="name" class="placeholder" id="dis_newPSabtSh"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید ."></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="dateMake_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateMake_orderSabtSh"></i> تاریخ تولید</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="dateExpiration_newPSabtSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateExpiration_orderSabtSh"></i> تاریخ انقضا</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_newPSabtSh"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="term_newPSabtSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mterm_orderSabtSh"></i> شرایط نگهداری</label>
        <div class="div_formTextarea">
          <textarea name="name" class=" placeholder" id="term_newPSabtSh"placeholder="اختیاری ..."></textarea>
        </div>
      </div>
      <div class="tImgForm">
        بارگذاری عکس محصول
      </div>
      <div class="imgForm" >
        <div class="loader loaderImg " >{{-- loaderAjax --}}
          <div class="opacityC opacityImg"></div>{{-- opacityAjax --}}
          <div class="spinner-border text-primary spinnerC spinnerImg" >.</div>{{-- spinnerAjax --}}
        </div>
        <div class="btnImgForm" onclick="setDropzone()">
          <i class='fas fa-camera'></i>
        </div>
      </div>
      <div class="form-group form_btn">
        <button type="button" class="btn btn-success"onclick="proShop({{$oldOrderOne->id}},'stamp_newPSabtSh','name_newPSabtSh','maker_newPSabtSh','brand_newPSabtSh','model_newPSabtSh','price_newPSabtSh','priceFOrder_newPSabtSh','vahed_newPSabtSh','num_newPSabtSh','vazn_newPSabtSh','dimension_newPSabtSh','vaznPost_newPSabtSh','pakat_newPSabtSh','dis_newPSabtSh','disSeller_newPSabtSh','dateMake_newPSabtSh','dateExpiration_newPSabtSh','term_newPSabtSh','Aimg1_newPSabtSh','Aimg2_newPSabtSh','Aimg3_newPSabtSh','Aimg4_newPSabtSh','Aimg5_newPSabtSh','Aimg6_newPSabtSh',
        'ajax_newPSabtSh','form_newPSabtSh','oldOrderUnStockShop')" >ثبت</button>
      </div></form></div>
      <div class="orderLine"></div>
      <form class="form form_orderEditSh" id="form_orderEditOOUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i> مشاهده و ویرایش محصول جاری ({{$proShopOne->name}})</div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_orderEditOOUSS"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="stamp_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh" data-toggle="modal" data-target="#Mstamp_orderEditSh"></i> نوع محصول <i class="fas fa-star star_form"></i><span style="font-size: 12px;color:#946304;">(برای این سفارش)</span></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderEditShD1">
               <label for="stamp_orderEditSh1" class="control-label pull-right "> اصل محصول</label>
               <input type="radio" name="stamp_orderEditSh" id="stamp_orderEditSh1" value="1" @if ($stampProOrder->stamp==1) checked @endif>
             </div>
             <div class="div_form_radio2 stamp_orderEditShD2">
               <label for="stamp_orderEditSh2" class="control-label pull-right "> مشابه محصول</label>
               <input type="radio" name="stamp_orderEditSh" id="stamp_orderEditSh2" value="2" @if ($stampProOrder->stamp==2) checked @endif>
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="name_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mname_orderEditSh"></i> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_orderEditSh" value="{{$proShopOne->name}}"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group">
         <label for="maker_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmaker_orderEditSh"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->maker}}"></div>
       </div>
       <div class="form-group">
         <label for="brand_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mbrand_orderEditSh"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->brand}}"></div>
       </div>
       <div class="form-group">
         <label for="model_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmodel_orderEditSh"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_orderEditSh"placeholder="اختیاری ..." value="{{$proShopOne->model}}"></div>
       </div>
       <div class="form-group">
         <label for="price_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mprice_orderEditSh"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="price_orderEditSh" value="{{$proShopOne->price}}"placeholder="الزامی ... به تومان"></div>
       </div>
       <div class="form-group">
         <label for="priceFOrder_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mprice_orderPSUS"></i> قیمت برای این سفارش(تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number"value="{{$stampProOrder->price}}" id="priceFOrder_orderEditSh"placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
       </div>
       <div class="form-group">
         <label for="vahed_sabtOrder" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_orderEditSh" name="" >
             <option value="">انتخاب کنید</option>
             <option value="عدد"  @if ($proShopOne->vahed=='عدد') selected @endif >عدد</option>
             <option value="بسته" @if ($proShopOne->vahed=='بسته') selected @endif >بسته</option>
             <option value="کارتن" @if ($proShopOne->vahed=='کارتن') selected @endif>کارتن</option>
             <option value="گونی" @if ($proShopOne->vahed=='گونی') selected @endif>گونی</option>
             <option value="گرم" @if ($proShopOne->vahed=='گرم') selected @endif>گرم</option>
             <option value="کیلو گرم" @if ($proShopOne->vahed=='کیلو گرم') selected @endif>کیلو گرم</option>
             <option value="جین" @if ($proShopOne->vahed=='جین') selected @endif>جین</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label for="num_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mnum_orderEditSh"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_orderEditSh"min="1" placeholder="اختیاری ..."value="{{$proShopOne->num}}"></div>
       </div>
       <div class="form-group">
         <label for="vazn_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvazn_orderEditSh"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_orderEditSh"placeholder="در صورت نیاز ..."value="{{$proShopOne->vazn}}"></div>
       </div>
       <div class="form-group">
         <label for="vaznPost_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MvaznPost_orderEditSh"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_orderEditSh"value="{{$proShopOne->vaznPost}}"placeholder="الزامی ... به گرم"></div>
       </div>
       <div class="form-group">
         <label for="pakat_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mpakat_orderEditSh"></i> هزینه بسته بندی (تومان) </label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="pakat_orderEditSh"placeholder="اختیاری ... به تومان"value="{{$proShopOne->pakat}}"></div>
       </div>
       <div class="form-group">
         <label for="dis_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mdis_orderEditSh"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_orderEditSh"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShopOne->dis}}</textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="disSeller_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mdis_orderEditSh"></i>توضیح برای این سفارش</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="disSeller_orderEditSh"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید .">{{$stampProOrder->disSeller}}</textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateMake_orderEditSh"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_orderEditSh"placeholder="اختیاری ..."value="{{$proShopOne->dateMake}}"></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_orderEditSh" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateExpiration_orderEditSh"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_orderEditSh"placeholder="اختیاری ..."value="{{$proShopOne->dateExpiration}}"></div>
       </div>
       <div class="form-group">
         <label for="term_orderEditSh" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mterm_orderEditSh"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="term_orderEditSh"placeholder="اختیاری ...">{{$proShopOne->term}}</textarea>
         </div>
       </div>
       <div class="tImgForm">
         بارگذاری عکس محصول
       </div>
       <div class="imgForm" >
         <div class="loader loaderImg " >{{-- loaderAjax --}}
           <div class="opacityC opacityImg"></div>{{-- opacityAjax --}}
           <div class="spinner-border text-primary spinnerC spinnerImg" >.</div>{{-- spinnerAjax --}}
         </div>
         <div class="btnImgForm" onclick="setDropzone()">
           <i class='fas fa-camera'></i>
         </div>
         @php
           $rr=1;
           @endphp

         @for ($r=1;$r<7; $r++ )
           {{-- {{$rr}} --}}
           @continue(empty($imgPro['pic_b'.$r]))
           @php
             $imgClass='imgClass'.$r;
             $celImgB='pic_b'.$r;
             $celImgS='pic_s'.$r;
           @endphp
           <div class="divImgP {{$imgClass}}" >
             <i class='fas fa-times iDElImg' onclick="delimg2({{$imgPro['id']}},'{{$celImgB}}','{{$celImgS}}','{{$imgPro[$celImgB]}}','{{$imgClass}}')" ></i>
             <img  src="/img_shop/{{$imgPro[$celImgB]}}" alt="" width="90" height="90">

           </div>
           @php
             $rr++
           @endphp
         @endfor
       </div>
       <div class="form-group form_btn">
         <button type="button" class="btn btn-success" onclick="editProShopUnStock({{$proShopOne->id}},{{$oldOrderOne->id}},{{$imgPro->id}},'stamp_orderEditSh','name_orderEditSh','maker_orderEditSh','brand_orderEditSh','model_orderEditSh','price_orderEditSh','priceFOrder_orderEditSh','vahed_orderEditSh','num_orderEditSh','vazn_orderEditSh','dimension_orderEditSh','vaznPost_orderEditSh','pakat_orderEditSh','dis_orderEditSh','disSeller_orderEditSh','dateMake_orderEditSh','dateExpiration_orderEditSh','term_orderEditSh',
         'ajax_orderEditSh','form_orderEditSh','oldOrderOneUnStockShop',null,2)" >ثبت تغییرات</button>
         <button type="button"class="btn btn-danger orderAghdamP2"data-toggle="modal" data-target="#del_OfferPro">حذف پیشنهاد محصول</button>
       </div>
     </form>
    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderSabtSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تغییرات با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
   {{-- هشدار برای حذف پیشنهاد این محصول برای مشتری جاری --}}
   <div class="modal fade" id="del_OfferPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-body orderAghdamModal2 alertCheckDlePro1">
           <span><b>توجه !!</b> آیا می خواهید پیشنهاد این محصول به سفارش جاری را حذف کنید ؟ْ </span>
         </div>
         <div class="orderAghdamModal3 alertCheckDlePro2">
             <button type="button" class="btn btn-primary"onclick="del_offerProShop({{$proShopOne->id}},{{$oldOrderOne->id}},'oldOrderUnStockShop')" data-dismiss="modal"  aria-label="Close">بله</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">خیر</button>
         </div>
       </div>
     </div>
   </div><!--end modal  -->
   {{--  --}}
   <div class="modal fade" id="MDropzone"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <div class="modal-body modal_body_h_login "><div class="titr_modal_img_addpro">آپلود عکس</div><div class="ajax_form_modal addIdAjax warningDropzone"></div>
   <form  class="dropzone form_img_add_pro addIdForm" action="/uplodImgProSh"enctype="multipart/form-data"method="post">{{ csrf_field() }}<div class="dz-message"><div class="col-xs-8"><div class="message"><p>جهت آپلود عکس این کادر را کلیک کنید</p></div></div></div></form></div>
   <div class="footer_modal_img_add_pro ajaxFooter"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div></div></div> </div><!--end modal  عکس -->

   <div class="modal fade" id="Mstamp_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           مشابه محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mname_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           نام محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmaker_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
         maker
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mbrand_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
           برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است . برند تست آزمایشی است .
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mmodel_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          مدل
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mprice_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama">
          قیمت
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvahed_sabtOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           واحد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mnum_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          تعداد
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mvazn_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MvaznPost_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           وزن پستی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mpakat_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
          بسته بندی
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mdis_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           توضیح محصول
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateMake_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ تولید
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="MdateExpiration_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           تاریخ انقضا
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mterm_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           شرایط نگهداری
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg1_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
       <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 1
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->
   <div class="modal fade" id="Mimg0_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg modal-xl" role="document">
   <div class="modal-content"><div class="modal-body MRahnama ">
           عکس 0
       </div><div class="footer_modal_img_add_pro"><button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button></div>
   </div></div></div><!--end modal -->

@endsection
