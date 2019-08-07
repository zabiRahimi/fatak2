@extends('management.pro_admin.pro_admin')
 @section('title')
  مدیریت :: ویرایش محصول
@endsection

@section('show_pro')

<div class="div_titr">
 ویرایش محصول
</div>
<div class="div_body">

  <form class="edit_pro_form1 edit_pro_form1" id="edit_pro_form1"  method="post">
    {{ csrf_field() }}
    <div class="ajax_form_admin" id="ajax_formeditpro1_admin"></div>

    <div class="form-group textAll">
      <label for="name_editpro1_admin" class="control-label pull-right  ">نام محصول</label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->name}}"  id="name_editpro1_admin"   ></div>
    </div>
    <div class="form-group textAll">
      <label for="vahed_editpro1_admin" class="control-label pull-right  "> واحد شمارش محصول <i class="fas fa-star star_form"></i> </label>
      <select class="form-control"id="vahed_editpro1_admin">
        <option value="">انتخاب کنید</option>
        <option @if ($pro->vahed=="عدد") selected @endif value="عدد">عدد</option>
        <option @if ($pro->vahed=="کیلو گرم") selected @endif value="کیلو گرم">کیلو گرم</option>
        <option @if ($pro->vahed=="گرم") selected @endif value="گرم">گرم</option>
        <option @if ($pro->vahed=="جین") selected @endif value="جین">جین</option>
        <option @if ($pro->vahed=="گونی") selected @endif value="گونی">گونی</option>
        <option @if ($pro->vahed=="درجن") selected @endif value="درجن">درجن</option>
        <option @if ($pro->vahed=="کارتن") selected @endif value="کارتن">کارتن</option>
        <option @if ($pro->vahed=="سایر") selected @endif value="سایر">سایر</option>
      </select>
    </div>
    <div class="form-group textAll">
      <label for="seller_editpro1_admin" class="control-label pull-right  "> فروشنده </label>
      <select class="form-control" name="" id="seller_editpro1_admin">
        <option value="">انتخاب کنید</option>
        <option @if ($pro->seller=="fatak") selected @endif value="fatak">فاتک </option>
      </select>
    </div>
    <div class="form-group textAll">
      <label for="price_editpro1_admin" class="control-label pull-right  "> قیمت محصول</label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->price}}"  id="price_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group textAll">
      <label for="priceold_editpro1_admin" class="control-label pull-right  "> قیمت قبل محصول </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->old_price}}"  id="priceold_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group  textAll">
      <label  class="control-label pull-right  "> ابعاد محصول <i class="fas fa-star star_form"></i> </label>
      <div class="divRadio">
        <label class="labelRadio_R">
          <span >کمتر100cm</span>
          <input type="radio" @if ($pro->dimension_stamp==1) checked @endif  name="dimension_stamp" value="1">
        </label>
        <label class="labelRadio_L">
          <span >بیشتر100cm</span>
          <input type="radio"@if ($pro->dimension_stamp==2) checked @endif  name="dimension_stamp" value="2">
        </label>
      </div>

    </div>
    <div class="form-group textAll">
      <label for="vazn_editpro1_admin" class="control-label pull-right  "> وزن محصول </label>
      <div class="div_data_buyer"><input type="text" class="form-control placeholder" value="{{$pro->gram}}"  id="vazn_editpro1_admin" placeholder="به گرم .." ></div>
    </div>
    <div class="form-group textAll">
      <label for="vaznpost_editpro1_admin" class="control-label pull-right  "> وزن پستی محصول </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->gram_post}}"  id="vaznpost_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="form-group textAll">
      <label for="pakat_editpro1_admin" class="control-label pull-right  "> هزینه بسته بندی </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->pakat_price}}"  id="pakat_editpro1_admin" placeholder="به تومان ..." ></div>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="dis_editpro1_admin" class="control-label pull-right  "> توضیحات محصول</label>
      <textarea name="name" id="dis_editpro1_admin" >{{$pro->name}}</textarea>
    </div>
    <div class="form-group edit_pro_form1_2 mavad_all_editpro1_admin">
      <label for="mavad1_editpro1_admin" class="control-label pull-right  ">مواد تشکیل دهنده محصول </label>
      @php
      $mavads=  json_decode($pro->mavad);
      @endphp
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[0]}}"  id="mavad1_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[1]}}"  id="mavad2_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[2]}}"  id="mavad3_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[3]}}"  id="mavad4_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[4]}}"  id="mavad5_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[5]}}"  id="mavad6_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[6]}}"  id="mavad7_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[7]}}"  id="mavad8_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[8]}}"  id="mavad9_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[9]}}"  id="mavad10_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[10]}}"  id="mavad11_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[11]}}"  id="mavad12_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[12]}}"  id="mavad13_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[13]}}"  id="mavad14_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[14]}}"  id="mavad15_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[15]}}"  id="mavad16_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[16]}}"  id="mavad17_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[17]}}"  id="mavad18_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[18]}}"  id="mavad19_editpro1_admin" placeholder="" ></div>
      <div class="mavad_editpro1_admin"><input type="text" class="form-control" value="{{$mavads[19]}}"  id="mavad20_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="date_m_editpro1_admin" class="control-label pull-right  "> سال تولید </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->date_m}}"  id="date_m_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="date_n_editpro1_admin" class="control-label pull-right  "> انقضا </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->date_n}}"  id="date_n_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="dimension_editpro1_admin" class="control-label pull-right  "> ابعاد </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->dimension}}"  id="dimension_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="sponsor_editpro1_admin" class="control-label pull-right  "> گارانتی </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->sponsor}}" id="sponsor_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="term_editpro1_admin" class="control-label pull-right  "> شرایط نگهداری </label>
      <textarea name="name" id="term_editpro1_admin"><?=$pro->term ?></textarea>
    </div>
    <div class="fr-view edit_pro_form1_2">
      <label for="bake_editpro1_admin" class="control-label pull-right  "> شرایط ارجاع </label>
      <textarea name="name" id="bake_editpro1_admin"><?=$pro->bake?></textarea>
    </div>
    <div class="form-group textAll">
      <label for="made_editpro1_admin" class="control-label pull-right  "> سازنده </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->made}}"  id="made_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="model_editpro1_admin" class="control-label pull-right  "> مدل </label>
      <div class="div_data_buyer"><input type="text" class="form-control" value="{{$pro->model}}" id="model_editpro1_admin" placeholder="" ></div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 1 <span id="checkImgE1"> @if ($img->pic_b1)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img1" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img1">{{$img->pic_b1}}</div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 2 <span id="checkImgE2"> @if ($img->pic_b2)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img2" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img2">{{$img->pic_b2}}</div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 3 <span id="checkImgE3"> @if ($img->pic_b3)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img3" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img3">{{$img->pic_b3}}</div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 4 <span id="checkImgE4"> @if ($img->pic_b4)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img4" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img4">{{$img->pic_b4}}</div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 5 <span id="checkImgE5"> @if ($img->pic_b5)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img5" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img5">{{$img->pic_b5}}</div>
    </div>
    <div class="form-group textAll">
      <label for="img1_editpro1_admin" class="control-label pull-right  "> انتخاب عکس 6 <span id="checkImgE6"> @if ($img->pic_b6)<i class="fas fa-check Icheck"></i> @endif</span></label>

      <input type="button" name="" class="form-control btn btn-info" data-toggle="modal" data-target="#modal_edit_pro_img6" value="انتخاب کنید">
      <div class="ajax_editpro1_img" id="ajax_editpro1_img6">{{$img->pic_b6}}</div>
    </div>
    <div class="form-group textAll">
      {{-- <label for="show_editpro1_admin" class="control-label pull-right  "> نحوه نمایش محصول </label>
      <div class="div_show_editpro">
        <div class="div_show_editpro_1">
          <label for="show_editpro">فعال</label>
          <input type="radio" class="" @if ($pro->show == 1) checked @endif id="show_editpro" name="show1" value="1">
        </div>
        <div class="div_show_editpro_2">
          <label for="show_editpro_2">غیر فعال</label>
          <input type="radio" class="" @if ($pro->show != 1) checked @endif id="show_editpro_2" name="show1" value="2">
        </div>

      </div> --}}

      <label class="control-label pull-right  "> نحوه نمایش محصول </label>
      <div class="divRadio">
        <label class="labelRadio_R">
          <span >فعال</span>
          <input type="radio" @if ($pro->show == 1) checked @endif id="show_editpro" name="show1" value="1">
        </label>
        <label class="labelRadio_L">
          <span >غیر فعال</span>
          <input type="radio" @if ($pro->show != 1) checked @endif id="show_editpro_2" name="show1" value="2">
        </label>
      </div>

    </div>
    <div class="sabt_form_editPro">
      <button type="button" class="btn btn-success"
      onclick="save_edit_pro1({{$pro->id}},
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro1"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg1" action="/uplod_img_pro"    enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b1)
                      <img src="/img_pro/{{$img->pic_b1}}" alt=""style="margin-top: -20px;" width="130" height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif

                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro1','ajax_editpro1_img1','checkImgE1')">حذف عکس</button>
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro2"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg2" action="/uplod_img_pro"    enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b2)
                      <img src="/img_pro/{{$img->pic_b2}}" alt=""style="margin-top: -20px;" width="130" height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro2','ajax_editpro1_img2','checkImgE2')">حذف عکس</button>
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro3"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg3" action="/uplod_img_pro"    enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b3)
                      <img src="/img_pro/{{$img->pic_b3}}" alt=""style="margin-top: -20px;" width="130" height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro3','ajax_editpro1_img3','checkImgE3')">حذف عکس</button>
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro4"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg4" action="/uplod_img_pro"    enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b4)
                      <img src="/img_pro/{{$img->pic_b4}}" alt=""style="margin-top: -20px;" width="130" height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro4','ajax_editpro1_img4','checkImgE4')">حذف عکس</button>
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro5"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg5" action="/uplod_img_pro"   enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b5)
                      <img src="/img_pro/{{$img->pic_b5}}" alt=""style="margin-top: -20px;" width="130"height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro5','ajax_editpro1_img5','checkImgE5')">حذف عکس</button>
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
        <div class="ajax_form_admin"style="width:100%; margin:5px 0;" id="imgEditPro6"></div>
        <form class="dropzone form_img_edit_pro" id="proEditImg6" action="/uplod_img_pro"enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="dz-message">
              <div class="col-xs-8">
                  <div class="message">
                    @if ($img->pic_b6)
                      <img src="/img_pro/{{$img->pic_b6}}" style="margin-top: -20px;" alt="" width="130" height="130">
                    @else
                      <p>جهت آپلود عکس این کادر را کلیک کنید</p>
                    @endif
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="footer_modal_img_edit_pro">
          <button type="button" class="btn btn-warning" data-dismiss="modal"  aria-label="Close"> خروج </button>
          <button type="button" class="btn btn-danger" onclick="del_img('imgEditPro6','ajax_editpro1_img6','checkImgE6')">حذف عکس</button>
      </div>
    </div>
  </div>
</div><!--end modal  عکس ششم -->

@endsection
