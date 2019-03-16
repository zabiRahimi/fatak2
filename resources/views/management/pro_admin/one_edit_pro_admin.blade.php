<div class="edit_pro">
 ویرایش کردن محصول
</div>
<div class="edit_pro2">

  <form class="edit_pro_form1" action="" id="edit_pro_form1"  method="post">
    {{ csrf_field() }}
    <div class="ajax_formeditpro1_admin" id="ajax_formeditpro1_admin"></div>
    <div class="form-group edit_pro_form1_1">
      <label for="_editpro1_admin" class="control-label pull-right  ">نام محصول</label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="name_editpro1_admin"  ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="seller_editpro1_admin" class="control-label pull-right  "> فروشنده </label>
      <select class="form-control" name="" id="seller_editpro1_admin">
        <option value="">انتخاب کنید</option>
        <option value="fatak">فاتک </option>
      </select>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="price_editpro1_admin" class="control-label pull-right  "> قیمت محصول</label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="price_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="priceold_editpro1_admin" class="control-label pull-right  "> قیمت قبل محصول </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="priceold_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="vazn_editpro1_admin" class="control-label pull-right  "> وزن محصول </label>
      <select class="form-control" name="" id="vazn_editpro1_admin">
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
    <div class="form-group edit_pro_form1_1">
      <label for="vaznpost_editpro1_admin" class="control-label pull-right  "> وزن پستی محصول </label>
      <select class="form-control" name="" id="vaznpost_editpro1_admin">
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
    <div class="form-group edit_pro_form1_1">
      <label for="pakat_editpro1_admin" class="control-label pull-right  "> هزینه بسته بندی </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="pakat_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="dis_editpro1_admin" class="control-label pull-right  "> توضیحات محصول</label>
      <textarea name="name" id="dis_editpro1_admin"></textarea>
    </div>
    <div class="form-group edit_pro_form1_2 mavad_all_editpro1_admin">
      <label for="mavad1_editpro1_admin" class="control-label pull-right  ">مواد تشکیل دهنده محصول </label>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad1_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad2_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad3_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad4_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad5_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad6_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad7_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad8_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad9_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad10_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad11_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad12_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad13_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad14_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad15_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad16_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad17_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad18_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad19_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control"  id="mavad20_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="date_m_editpro1_admin" class="control-label pull-right  "> سال تولید </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="date_m_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="date_n_editpro1_admin" class="control-label pull-right  "> انقضا </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="date_n_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="dimension_editpro1_admin" class="control-label pull-right  "> ابعاد </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="dimension_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="sponsor_editpro1_admin" class="control-label pull-right  "> گارانتی </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="sponsor_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="term_editpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
      <textarea name="name" id="term_editpro1_admin"></textarea>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="bake_editpro1_admin" class="control-label pull-right  "> شرایط ارجاع </label>
      <textarea name="name" id="bake_editpro1_admin"></textarea>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="made_editpro1_admin" class="control-label pull-right  "> سازنده </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="made_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="model_editpro1_admin" class="control-label pull-right  "> مدل </label>
      <div class="div_data_buyer"><input type="text" class="form-control"  id="model_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 </label>
      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img1" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img1"></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 2</label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img2" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img2"></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 </label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img3" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img3"></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 </label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img4" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img4"></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 </label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img5" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img5"></div>
    </div>
    <div class="form-group edit_pro_form1_1">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 </label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img6" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img6"></div>
    </div>
    <div class="sabt_form_editPro">
      <button type="button" class="btn btn-success"
      onclick="save_edit_pro1(
      $('#mavad1_editpro1_admin').val(),$('#mavad2_editpro1_admin').val(),$('#mavad3_editpro1_admin').val(),
      $('#mavad4_editpro1_admin').val(),$('#mavad5_editpro1_admin').val(),$('#mavad6_editpro1_admin').val(),
      $('#mavad7_editpro1_admin').val(),$('#mavad8_editpro1_admin').val(),$('#mavad9_editpro1_admin').val(),
      $('#mavad10_editpro1_admin').val(),$('#mavad11_editpro1_admin').val(),$('#mavad12_editpro1_admin').val(),
      $('#mavad13_editpro1_admin').val(),$('#mavad14_editpro1_admin').val(),$('#mavad15_editpro1_admin').val(),
      $('#mavad16_editpro1_admin').val(),$('#mavad17_editpro1_admin').val(),$('#mavad18_editpro1_admin').val(),
      $('#mavad19_editpro1_admin').val(),$('#mavad20_editpro1_admin').val()
      )">
       ثبت تغییرات محصول
      </button>
    </div>
  </form>

</div>
{{-- مودال عکس اول --}}
<div class="modal fade" id="modal_edit_pro_img1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

        {{-- @if (count($show_img)>0)
          @foreach ($show_img as  $img)
            <div class="img_edit_pro">

              <img src="img_pro/{{$img->name}}" alt="">
            </div>
          @endforeach
        @else
            <div class="img_edit_pro2">
              عکسی موجود نیست ، عکس مورد نظر را آپلود نمایید .
            </div>
        @endif --}}
        <div class="titr_modal_img_editpro">
           آپلود عکس اول
        </div>
        <div class="" id="imgeditPro1"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg1" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal عکس اول-->
{{-- مودال عکس دوم --}}
<div class="modal fade" id="modal_edit_pro_img2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_editpro">
            آپلود عکس دوم
        </div>
        <div class="" id="imgeditPro2"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg2" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal عکس دوم-->
{{-- مودال عکس سوم--}}
<div class="modal fade" id="modal_edit_pro_img3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_editpro">
          آپلود عکس سوم
        </div>
        <div class="" id="imgeditPro3"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg3" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal عکس سوم-->
{{--  مودال عکس چهارم --}}
<div class="modal fade" id="modal_edit_pro_img4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_editpro">
          آپلود عکس چهارم
        </div>
        <div class="" id="imgeditPro4"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg4" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal عکس چهارم-->
{{--  مودال عکس  پنجم --}}
<div class="modal fade" id="modal_edit_pro_img5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_editpro">
          آپلود عکس پنچم
        </div>
        <div class="" id="imgeditPro5"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg5" action="/uplod_img_pro"   enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal عکس پنحم-->
{{--   مودال عکس ششم --}}
<div class="modal fade" id="modal_edit_pro_img6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modal_h_img_edit_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_editpro">
          آپلود عکس ششم
        </div>
        <div class="" id="imgeditPro6"></div>
        <form class="dropzone form_img_edit_pro" id="proeditImg6" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
      </div>
    </div>
  </div>
</div><!--end modal  عکس ششم -->
