<div class="CDBMTitr">
  اضافه کردن مدیر
</div>
<form class="add_pro_form1" action="" id="add_pro_form1"  method="post">
  {{ csrf_field() }}
  <div class="ajax_formaddpro1_admin" id="ajax_formaddpro1_admin"></div>

  <div class="form-group add_pro_form1_1">
    <label for="_addpro1_admin" class="control-label pull-right  ">نام محصول</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="name_addpro1_admin"  ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="seller_addpro1_admin" class="control-label pull-right  "> فروشنده </label>
    <select class="form-control" name="" id="seller_addpro1_admin">
      <option value="">انتخاب کنید</option>
      <option value="fatak">فاتک </option>
    </select>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="price_addpro1_admin" class="control-label pull-right  "> قیمت محصول</label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="price_addpro1_admin" placeholder="به تومان ..." ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="priceold_addpro1_admin" class="control-label pull-right  "> قیمت قبل محصول </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="priceold_addpro1_admin" placeholder="به تومان ..." ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="vazn_addpro1_admin" class="control-label pull-right  "> وزن محصول </label>
    <select class="form-control" name="" id="vazn_addpro1_admin">
      <option value="">انتخاب کنید</option>
      <option value="100">100 گرم</option>
      <option value="200">200 گرم</option>
      <option value="300">300 گرم</option>
      <option value="400">400 گرم</option>
      <option value="500">500 گرم</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
    </select>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="vaznpost_addpro1_admin" class="control-label pull-right  "> وزن پستی محصول </label>
    <select class="form-control" name="" id="vaznpost_addpro1_admin">
      <option value="">انتخاب کنید</option>
      <option value="100">100 گرم</option>
      <option value="200">200 گرم</option>
      <option value="300">300 گرم</option>
      <option value="400">400 گرم</option>
      <option value="500">500 گرم</option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
    </select>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="pakat_addpro1_admin" class="control-label pull-right  "> هزینه بسته بندی </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="pakat_addpro1_admin" placeholder="به تومان ..." ></div>
  </div>
  <div class="fr-view add_pro_form1_2">
    <label for="dis_addpro1_admin" class="control-label pull-right  "> توضیحات محصول</label>
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
  <div class="form-group add_pro_form1_1">
    <label for="date_m_addpro1_admin" class="control-label pull-right  "> سال تولید </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="date_m_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="date_n_addpro1_admin" class="control-label pull-right  "> انقضا </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="date_n_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="dimension_addpro1_admin" class="control-label pull-right  "> ابعاد </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="dimension_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="sponsor_addpro1_admin" class="control-label pull-right  "> گارانتی </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="sponsor_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="fr-view add_pro_form1_2">
    <label for="term_addpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
    <textarea name="name" id="term_addpro1_admin"></textarea>
  </div>
  <div class="fr-view add_pro_form1_2">
    <label for="bake_addpro1_admin" class="control-label pull-right  "> شرایط ارجاع </label>
    <textarea name="name" id="bake_addpro1_admin"></textarea>

  </div>
  <div class="form-group add_pro_form1_1">
    <label for="made_addpro1_admin" class="control-label pull-right  "> سازنده </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="made_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="model_addpro1_admin" class="control-label pull-right  "> مدل </label>
    <div class="div_data_buyer"><input type="text" class="form-control"  id="model_addpro1_admin" placeholder="" ></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 </label>
    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img1" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img1"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 2</label>

    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img2" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img2"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 </label>

    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img3" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img3"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 </label>

    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img4" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img4"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 </label>

    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img5" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img5"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="img1_addpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 </label>

    <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_add_pro_img6" value="انتخاب کنید">
    <div class="ajax_addpro1_img" id="ajax_addpro1_img6"></div>
  </div>
  <div class="form-group add_pro_form1_1">
    <label for="show_addpro1_admin" class="control-label pull-right  "> نحوه نمایش محصول </label>
    <div class="div_show_addpro">
      <div class="div_show_addpro_1">
        <label for="show_addpro">فعال</label>
        <input type="radio" class="" id="show_addpro" name="show1" value="1">
      </div>
      <div class="div_show_addpro_2">
        <label for="show_addpro_2">غیر فعال</label>
        <input type="radio" class="" id="show_addpro_2" name="show1" value="2">
      </div>

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
