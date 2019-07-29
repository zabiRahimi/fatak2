@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: اضافه کردن محصول
@endsection
@section('show_pro')

<div class="add_pro">
 اضافه کردن محصول
</div>
<div class="add_pro2">

  <form class="formAdmin add_pro_form1" action="" id="add_pro_form1"  method="post">
    {{ csrf_field() }}
    <div class="ajax_form_admin" id="ajax_formaddpro1_admin"></div>
    <div class="warning_form">
      <i class="fas fa-exclamation-triangle"></i>
      قیمت ها را به تومان وارد کنید .
    </div>
    <div class="warning_form">
      <i class="fas fa-exclamation-triangle"></i>
      وزن ها را به گرم وارد کنید .
    </div>
    <div class="form-group textAll">
      <label for="_addpro1_admin" class="control-label pull-right  ">نام محصول <i class="fas fa-star star_form"></i></label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="name_addpro1_admin"  ></div>
    </div>
    <div class="form-group textAll">
      <label for="vahed_addpro1_admin" class="control-label pull-right  "> واحد شمارش محصول <i class="fas fa-star star_form"></i> </label>
      <select class="form-control"id="vahed_addpro1_admin">
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
      <label for="seller_addpro1_admin" class="control-label pull-right  "> فروشنده <i class="fas fa-star star_form"></i> </label>
      <select class="form-control" name="" id="seller_addpro1_admin">
        <option value="">انتخاب کنید</option>
        <option value="fatak">فاتک </option>
      </select>
    </div>
    <div class="form-group textAll">
      <label for="price_addpro1_admin" class="control-label pull-right  "> قیمت محصول <i class="fas fa-star star_form"></i></label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="price_addpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group textAll">
      <label for="priceold_addpro1_admin" class="control-label pull-right  "> قیمت قبل محصول </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="priceold_addpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group  textAll">
      <label for="show_addpro1_admin" class="control-label pull-right  "> ابعاد محصول <i class="fas fa-star star_form"></i> </label>
      <div class="divRadio">
        <label class="labelRadio_R">
          <span >کمتر100cm</span>
          <input type="radio" class=""  name="dimension_stamp" value="1">
        </label>
        <label class="labelRadio_L">
          <span >بیشتر100cm</span>
          <input type="radio" class=""  name="dimension_stamp" value="2">
        </label>
      </div>

    </div>
    <div class="form-group textAll">
      <label for="vazn_addpro1_admin" class="control-label pull-right  "> وزن محصول <i class="fas fa-star star_form"></i> </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="vazn_addpro1_admin" placeholder="به گرم ..." ></div>

    </div>
    <div class="form-group textAll">
      <label for="vaznpost_addpro1_admin" class="control-label pull-right  "> وزن پستی محصول <i class="fas fa-star star_form"></i> </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="vaznpost_addpro1_admin" placeholder="به گرم ..." ></div>
    </div>
    <div class="form-group textAll">
      <label for="pakat_addpro1_admin" class="control-label pull-right  ">هزینه بسته بندی <i class="fas fa-star star_form"></i></label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="pakat_addpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="fr-view add_pro_form1_2">
      <label for="dis_addpro1_admin" class="control-label pull-right placeholder"> توضیحات محصول <i class="fas fa-star star_form"></i></label>
      <textarea name="name" id="dis_addpro1_admin"></textarea>
    </div>
    <div class="form-group add_pro_form1_2 mavad_all_addpro1_admin">
      <label for="mavad1_addpro1_admin" class="control-label pull-right  ">مواد تشکیل دهنده محصول </label>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad1_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad2_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad3_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad4_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad5_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad6_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad7_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad8_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad9_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad10_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad11_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad12_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad13_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad14_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad15_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad16_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad17_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad18_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad19_addpro1_admin" placeholder="" ></div>
      <div class="mavad_addpro1_admin"><input type="text" class="form-control"  id="mavad20_addpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="date_m_addpro1_admin" class="control-label pull-right  "> سال تولید </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="date_m_addpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="date_n_addpro1_admin" class="control-label pull-right  "> انقضا </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="date_n_addpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="dimension_addpro1_admin" class="control-label pull-right  "> ابعاد </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="dimension_addpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="sponsor_addpro1_admin" class="control-label pull-right  "> گارانتی </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder"  id="sponsor_addpro1_admin" placeholder="" ></div>
    </div>
    <div class="fr-view add_pro_form1_2">
      <label for="term_addpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
      <textarea name="name" id="term_addpro1_admin"></textarea>
    </div>
    <div class="fr-view add_pro_form1_2">
      <label for="bake_addpro1_admin" class="control-label pull-right  "> شرایط ارجاع </label>
      <textarea name="name" id="bake_addpro1_admin"></textarea>

    </div>
    <div class="form-group textAll">
      <label for="made_addpro1_admin" class="control-label pull-right  "> سازنده </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="made_addpro1_admin"  ></div>
    </div>
    <div class="form-group textAll">
      <label for="model_addpro1_admin" class="control-label pull-right  "> مدل </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="model_addpro1_admin"  ></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 <i class="fas fa-star star_form"></i><span id="checkImg1"></span></label>
      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img1" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img1"></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 2 <span id="checkImg2"></span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img2" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img2"></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 <span id="checkImg3"></span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img3" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img3"></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 <span id="checkImg4"></span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img4" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img4"></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 <span id="checkImg5"></span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img5" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img5"></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 <span id="checkImg6"></span> </label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img6" value="انتخاب کنید">
      <div class="ajax_addpro1_img" id="ajax_addpro1_img6"></div>
    </div>

    <div class="form-group  textAll">
      <label for="show_addpro1_admin" class="control-label pull-right  "> نحوه نمایش محصول <i class="fas fa-star star_form"></i> </label>
      <div class="divRadio">
        <label class="labelRadio_R">
          <span >فعال</span>
          <input type="radio" class="" id="show_addpro" name="show1" value="1">
        </label>
        <label class="labelRadio_L">
          <span >غیر فعال</span>
          <input type="radio" class="" id="show_addpro_2" name="show1" value="2">
        </label>
      </div>

    </div>
    <div class="sabt_form_addPro">
      <button type="button" class="btn btn-success"
      onclick="save_add_pro1(
      $('#mavad1_addpro1_admin').val(),$('#mavad2_addpro1_admin').val(),$('#mavad3_addpro1_admin').val(),
      $('#mavad4_addpro1_admin').val(),$('#mavad5_addpro1_admin').val(),$('#mavad6_addpro1_admin').val(),
      $('#mavad7_addpro1_admin').val(),$('#mavad8_addpro1_admin').val(),$('#mavad9_addpro1_admin').val(),
      $('#mavad10_addpro1_admin').val(),$('#mavad11_addpro1_admin').val(),$('#mavad12_addpro1_admin').val(),
      $('#mavad13_addpro1_admin').val(),$('#mavad14_addpro1_admin').val(),$('#mavad15_addpro1_admin').val(),
      $('#mavad16_addpro1_admin').val(),$('#mavad17_addpro1_admin').val(),$('#mavad18_addpro1_admin').val(),
      $('#mavad19_addpro1_admin').val(),$('#mavad20_addpro1_admin').val()
      )">
       ثبت محصول
      </button>
    </div>

  </form>

</div>


@endsection
