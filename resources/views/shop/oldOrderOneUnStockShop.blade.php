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
          <button type="button" onclick="searchProSUnStock({{$oldOrderOne->id}},'oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}');spinner()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivInput1">
          <input type="text" class="placeholder" id="sIdSUnStock" value="" placeholder="کد محصول غیر ثابت">
          <button type="button" onclick="searchIdSUnStock('',{{$oldOrderOne->id}},'oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}');spinner()"><i class='fas fa-search iODI'></i></button>
        </div>
        <div class="orderDivSPSS" id="ajax_searchProSUnStock"></div>
      </div>
      <div class="divOOUSS divNewOOUS orderDivH">
      <form class="form form_newPSabtOOUSS" id="form_newPSabtOOUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت محصول جدید
         <button type="button" class="BOOUSS"onclick="window.location.href='/oldOrderOneUnStockShop/{{$oldOrderOne->id}}/{{$proShopOne->id}}'">برگشت <span class="SBOOUSS">به ویرایش محصول جاری ({{$proShopOne->name}})</span> </button>

       </div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
      <div class="ajax_form_modal" id="ajax_newPSabtOOUSS"></div>
      {{ csrf_field() }}
      <div class="form-group">
        <label for="stamp_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mstamp_newPSabtOOUSS"></i> نوع محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form_radio1">
            <div class="div_form_radio2 stamp_orderSabtShD1">
              <label for="stamp_newPSabtOOUSS1" class="control-label pull-right "> اصل محصول</label>
              <input type="radio" name="stamp_newPSabtOOUSS" id="stamp_newPSabtOOUSS1" value="1">
            </div>
            <div class="div_form_radio2 stamp_orderSabtShD2">
              <label for="stamp_newPSabtOOUSS2" class="control-label pull-right "> مشابه محصول</label>
              <input type="radio" name="stamp_newPSabtOOUSS" id="stamp_newPSabtOOUSS2" value="2">
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="name_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mname_orderSabtSh"></i> نام محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="name_newPSabtOOUSS"></div>
      </div>
      <div class="form-group">
        <label for="maker_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmaker_orderSabtSh"></i>  سازنده محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="maker_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="brand_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mbrand_orderSabtSh"></i>  برند محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="brand_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="model_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mmodel_orderSabtSh"></i> مدل محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="model_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="price_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="price_newPSabtOOUSS"></div>
      </div>
      <div class="form-group">
        <label for="priceFOrder_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mprice_orderSabtSh"></i> قیمت برای این سفارش</label>
        <div class="div_form"><input type="text" class="form-control placeholder"value="" id="priceFOrder_newPSabtOOUSS"placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
      </div>
      <div class="form-group">
        <label for="vahed_newPSabtOOUSS" class="control-label pull-right"><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvahed_sabtOrder"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
        <div class="div_form">
          <select class="select squad_sabtOrder" id="vahed_newPSabtOOUSS" name="" >
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
        <label for="num_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mnum_orderSabtSh"></i> تعداد کالای موجود</label>
        <div class="div_form"><input type="number" class="form-control placeholder" id="num_newPSabtOOUSS"min="1" placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="vazn_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mvazn_orderSabtSh"></i> وزن محصول</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_newPSabtOOUSS"placeholder="در صورت نیاز ..."></div>
      </div>
      <div class="form-group">
        <label for="dimension_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh" data-toggle="modal" data-target="#Mdimension_orderSabtSh"></i> ابعاد محصول <i class="fas fa-star star_form"></i></label>
        <div class="div_form_radio1">
            <div class="div_form_radio2 dimension_orderSabtShD1">
              <label for="dimension_newPSabtSh1" class="control-label pull-right "> بزرگتر از 100 cm</label>
              <input type="radio" name="dimension_newPSabtOOUSS" id="dimension_newPSabtOOUSS1" value="2">
            </div>
            <div class="div_form_radio2 stamp_orderSabtShD2">
              <label for="dimension_newPSabtSh2" class="control-label pull-right ">کوچکتر از 100 cm </label>
              <input type="radio" name="dimension_newPSabtOOUSS" id="dimension_newPSabtOOUSS2" value="1">
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="vaznPost_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MvaznPost_orderSabtSh"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_newPSabtOOUSS"></div>
      </div>
      <div class="form-group">
        <label for="pakat_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mpakat_orderSabtSh"></i>  هزینه بسته بندی (تومان)</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="pakat_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="dis_newPSabtOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i> توضیح محصول</label>
        <div class="div_formTextarea">
          <textarea name="name" class="placeholder" id="dis_newPSabtOOUSS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید ."></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="disSeller_newPSabtOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#Mdis_orderSabtSh"></i>توضیح برای این سفارش</label>
        <div class="div_formTextarea">
          <textarea name="name" class="placeholder" id="dis_newPSabtOOUSS"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید ."></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="dateMake_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateMake_orderSabtSh"></i> تاریخ تولید</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="dateExpiration_newPSabtOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#MdateExpiration_orderSabtSh"></i> تاریخ انقضا</label>
        <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_newPSabtOOUSS"placeholder="اختیاری ..."></div>
      </div>
      <div class="form-group">
        <label for="term_newPSabtOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderSabtSh"data-toggle="modal" data-target="#Mterm_orderSabtSh"></i> شرایط نگهداری</label>
        <div class="div_formTextarea">
          <textarea name="name" class=" placeholder" id="term_newPSabtOOUSS"placeholder="اختیاری ..."></textarea>
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
        <button type="button" class="btn btn-success"onclick="proShop({{$oldOrderOne->id}},'stamp_newPSabtOOUSS','name_newPSabtOOUSS','maker_newPSabtOOUSS','brand_newPSabtOOUSS','model_newPSabtOOUSS','price_newPSabtOOUSS','priceFOrder_newPSabtOOUSS','vahed_newPSabtOOUSS','num_newPSabtOOUSS','vazn_newPSabtOOUSS','dimension_newPSabtOOUSS','vaznPost_newPSabtOOUSS','pakat_newPSabtOOUSS','dis_newPSabtOOUSS','disSeller_newPSabtOOUSS','dateMake_newPSabtOOUSS','dateExpiration_newPSabtOOUSS','term_newPSabtOOUSS',
        'ajax_newPSabtOOUSS','form_newPSabtOOUSS','oldOrderUnStockShop')" >ثبت</button>
      </div></form></div>
      <div class="orderLine"></div>
      <form class="form form_orderEditOOUSS" id="form_orderEditOOUSS" action="" method="post">
       <div class="form_titr"><i class="fas fa-info-circle"></i> مشاهده و ویرایش محصول جاری ({{$proShopOne->name}})</div>
       <div class="formTitrShop">
           <span>راهنما !!</span> چنانچه بر روی علامت <i class="fas fa-info-circle "></i>هر یک از کادرها کلیک کنید ، راهنمای مربوط به همان کادر را مشاهده خواهید کرد .
       </div>
       <div class="ajax_form_modal" id="ajax_orderEditOOUSS"></div>
       {{ csrf_field() }}
       <div class="form-group">
         <label for="stamp_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh" data-toggle="modal" data-target="#Mstamp_orderEditOOUSS"></i> نوع محصول <i class="fas fa-star star_form"></i><span style="font-size: 12px;color:#946304;">(برای این سفارش)</span></label>
         <div class="div_form_radio1">
             <div class="div_form_radio2 stamp_orderEditShD1">
               <label for="stamp_orderEditOOUSS1" class="control-label pull-right "> اصل محصول</label>
               <input type="radio" name="stamp_orderEditOOUSS" id="stamp_orderEditOOUSS1" value="1" @if ($stampProOrder->stamp==1) checked @endif>
             </div>
             <div class="div_form_radio2 stamp_orderEditShD2">
               <label for="stamp_orderEditOOUSS2" class="control-label pull-right "> مشابه محصول</label>
               <input type="radio" name="stamp_orderEditOOUSS" id="stamp_orderEditOOUSS2" value="2" @if ($stampProOrder->stamp==2) checked @endif>
             </div>
         </div>
       </div>
       <div class="form-group">
         <label for="name_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mname_orderEditOOUSS"></i> نام محصول <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="name_orderEditOOUSS" value="{{$proShopOne->name}}"placeholder="الزامی ..."></div>
       </div>
       <div class="form-group">
         <label for="maker_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmaker_orderEditOOUSS"></i>  سازنده محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="maker_orderEditOOUSS"placeholder="اختیاری ..." value="{{$proShopOne->maker}}"></div>
       </div>
       <div class="form-group">
         <label for="brand_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mbrand_orderEditOOUSS"></i>  برند محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="brand_orderEditOOUSS"placeholder="اختیاری ..." value="{{$proShopOne->brand}}"></div>
       </div>
       <div class="form-group">
         <label for="model_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mmodel_orderEditOOUSS"></i> مدل محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="model_orderEditOOUSS"placeholder="اختیاری ..." value="{{$proShopOne->model}}"></div>
       </div>
       <div class="form-group">
         <label for="price_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mprice_orderEditOOUSS"></i> قیمت محصول (تومان) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="price_orderEditOOUSS" value="{{$proShopOne->price}}"placeholder="الزامی ... به تومان"></div>
       </div>
       <div class="form-group">
         <label for="priceFOrder_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderPSUS"data-toggle="modal" data-target="#MpriceFOrder_orderEditOOUSS"></i> قیمت برای این سفارش(تومان)</label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number"id="priceFOrder_orderEditOOUSS"value="{{$stampProOrder->price}}" placeholder="اختیاری!!ممکن است برای این مشتری قیمت خاصی داشته باشید."></div>
       </div>
       <div class="form-group">
         <label for="vahed_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvahed_orderEditOOUSS"></i> واحد شمارش کالا <i class="fas fa-star star_form"></i></label>
         <div class="div_form">
           <select class="select squad_sabtOrder" id="vahed_orderEditOOUSS" name="" >
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
         <label for="num_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mnum_orderEditOOUSS"></i> تعداد کالای موجود</label>
         <div class="div_form"><input type="number" class="form-control placeholder" id="num_orderEditOOUSS"min="1" placeholder="اختیاری ..."value="{{$proShopOne->num}}"></div>
       </div>
       <div class="form-group">
         <label for="vazn_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mvazn_orderEditOOUSS"></i> وزن محصول</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vazn_orderEditOOUSS"placeholder="در صورت نیاز ..."value="{{$proShopOne->vazn}}"></div>
       </div>
       <div class="form-group">
         <label for="vaznPost_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MvaznPost_orderEditOOUSS"></i> وزن پستی محصول (گرم) <i class="fas fa-star star_form"></i></label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="vaznPost_orderEditOOUSS"value="{{$proShopOne->vaznPost}}"placeholder="الزامی ... به گرم"></div>
       </div>
       <div class="form-group">
         <label for="pakat_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mpakat_orderEditOOUSS"></i> هزینه بسته بندی (تومان) </label>
         <div class="div_form"><input type="text" class="form-control placeholder_price number" id="pakat_orderEditOOUSS"placeholder="اختیاری ... به تومان"value="{{$proShopOne->pakat}}"></div>
       </div>
       <div class="form-group">
         <label for="dis_orderEditOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mdis_orderEditOOUSS"></i> توضیح محصول</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="dis_orderEditOOUSS"placeholder="اختیاری !! ولی برای درک بهتر از کالای شما بهتر است وارد کنید .">{{$proShopOne->dis}}</textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="disSeller_orderEditOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditOOUSS"data-toggle="modal" data-target="#MdisSeller_orderEditOOUSS"></i>توضیح برای این سفارش</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="disSeller_orderEditOOUSS"placeholder="اختیاری !! ممکن است برای این مشتری توضیح خاصی داشته باشید .">{{$stampProOrder->disSeller}}</textarea>
         </div>
       </div>
       <div class="form-group">
         <label for="dateMake_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateMake_orderEditOOUSS"></i> تاریخ تولید</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateMake_orderEditOOUSS"placeholder="اختیاری ..."value="{{$proShopOne->dateMake}}"></div>
       </div>
       <div class="form-group">
         <label for="dateExpiration_orderEditOOUSS" class="control-label pull-right "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#MdateExpiration_orderEditOOUSS"></i> تاریخ انقضا</label>
         <div class="div_form"><input type="text" class="form-control placeholder" id="dateExpiration_orderEditOOUSS"placeholder="اختیاری ..."value="{{$proShopOne->dateExpiration}}"></div>
       </div>
       <div class="form-group">
         <label for="term_orderEditOOUSS" class="control-label pull-right  "><i class="fas fa-info-circle i_form i_orderEditSh"data-toggle="modal" data-target="#Mterm_orderEditOOUSS"></i> شرایط نگهداری</label>
         <div class="div_formTextarea">
           <textarea name="name" class="placeholder" id="term_orderEditOOUSS"placeholder="اختیاری ...">{{$proShopOne->term}}</textarea>
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
         <button type="button" class="btn btn-success" onclick="editProShopUnStock({{$proShopOne->id}},{{$oldOrderOne->id}},{{$imgPro->id}},'stamp_orderEditOOUSS','name_orderEditOOUSS','maker_orderEditOOUSS','brand_orderEditOOUSS','model_orderEditOOUSS','price_orderEditOOUSS','priceFOrder_orderEditOOUSS','vahed_orderEditOOUSS','num_orderEditOOUSS','vazn_orderEditOOUSS','dimension_orderEditOOUSS','vaznPost_orderEditOOUSS','pakat_orderEditOOUSS','dis_orderEditOOUSS','disSeller_orderEditOOUSS','dateMake_orderEditOOUSS','dateExpiration_orderEditOOUSS','term_orderEditOOUSS',
         'ajax_orderEditOOUSS','form_orderEditOOUSS','oldOrderOneUnStockShop',null,2)" >ثبت تغییرات</button>
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
