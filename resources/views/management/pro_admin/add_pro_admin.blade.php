<div class="add_pro">
 اضافه کردن محصول
</div>
<div class="add_pro2">

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
    <div class="sabt_form_addPro">
      <button type="button" class="btn btn-success"
      onclick="save_add_pro1()">
       ثبت محصول
      </button>
    </div>
  </form>

</div>
{{-- مودال عکس اول --}}
<div class="modal fade" id="modal_add_pro_img1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

        {{-- @if (count($show_img)>0)
          @foreach ($show_img as  $img)
            <div class="img_add_pro">

              <img src="img_pro/{{$img->name}}" alt="">
            </div>
          @endforeach
        @else
            <div class="img_add_pro2">
              عکسی موجود نیست ، عکس مورد نظر را آپلود نمایید .
            </div>
        @endif --}}
        <div class="titr_modal_img_addpro">
           آپلود عکس اول
        </div>
        <div class="" id="imgAddPro1"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg1" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal عکس اول-->
{{-- مودال عکس دوم --}}
<div class="modal fade" id="modal_add_pro_img2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_addpro">
            آپلود عکس دوم
        </div>
        <div class="" id="imgAddPro2"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg2" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal عکس دوم-->
{{-- مودال عکس سوم--}}
<div class="modal fade" id="modal_add_pro_img3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_addpro">
          آپلود عکس سوم
        </div>
        <div class="" id="imgAddPro3"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg3" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal عکس سوم-->
{{--  مودال عکس چهارم --}}
<div class="modal fade" id="modal_add_pro_img4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_addpro">
          آپلود عکس چهارم
        </div>
        <div class="" id="imgAddPro4"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg4" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal عکس چهارم-->
{{--  مودال عکس  پنجم --}}
<div class="modal fade" id="modal_add_pro_img5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header modal_h_login_header">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_addpro">
          آپلود عکس پنچم
        </div>
        <div class="" id="imgAddPro5"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg5" action="/uplod_img_pro"   enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal عکس پنحم-->
{{--   مودال عکس ششم --}}
<div class="modal fade" id="modal_add_pro_img6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modal_h_img_add_pro" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_h_login">
        <div class="titr_modal_img_addpro">
          آپلود عکس ششم
        </div>
        <div class="" id="imgAddPro6"></div>
        <form class="dropzone form_img_add_pro" id="proAddImg6" action="/uplod_img_pro"  onclick="nm()"  enctype="multipart/form-data" method="post">
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
      </div>
    </div>
  </div>
</div><!--end modal  عکس ششم -->
