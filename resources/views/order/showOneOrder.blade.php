{{-- show_pro.css --}}
@extends('order.layoutOrder')
@section('title')
  {{$show_pro->name}}
@endsection
@section('content')

  <div class="headerOrder">
    <div class="headerOrder_1">مشاهده محصول</div>
    <div class="headerOrder_2">به نام خدا</div>
    <div class="headerOrder_3"><span><a href="www.fatak.ir">fatak.ir</a></span> <span>فروشگاه فاتک</span></div>
  </div>
  <ul class="ul_line headerOrderUl ">
    <li onclick="window.location.href='/showOrder/{{$order_id}}'">بازگشت</li>
    <li onclick="window.location.href='/'">صفحه اصلی</li>
    <li>نحوه عملکرد</li>
    <li>قوانین و مقررات</li>
  </ul>
  <div class="bodyShowPro">
    <div class="titrShowPro">
        <h1 >{{$show_pro->name}}</h1>
        <div class="amarTiterSP">
          <span> <i class="far fa-eye "></i> {{$show_pro->bazdid}}</span>
          <span><i class="fas fa-comments "></i> 0</span>
        </div>
    </div>
    <div class="contentShowPro">
        <div class="upContentSP">
            <div class="imgUpContentSP">
                <div class="bigImgUpCSP">
                  @for ($i=1; $i < 7; $i++)
                    <?php $pic ='pic_b'.$i; $b_img_p='b-img-p'.$i; ?>
                    <img src="../../img_pro/{{$pic_pro->$pic}}" alt="" class=" {{$b_img_p}} big_img_pro <?php if ($i==1) {echo   'active_img_pro' ;} ?> " >
                  @endfor
                </div>
                <div class="smallImgUpCSP  ">
                  <div class=" smallImgSlickAll ">
                    @for ($i=1; $i < 7; $i++)
                      <?php
                        $pic_s ='pic_s'.$i;
                        $b_img_p='b-img-p'.$i;
                        if(empty($pic_pro->$pic_s)){continue;}
                      ?>
                      <div class="smallImgSlickOne">
                        <img src="../../img_pro/{{$pic_pro->$pic_s}}" alt="  " class=""  onclick="b_img_pro('{{$b_img_p}}')">
                      </div>
                    @endfor
                  </div>
                </div>
            </div>
            <div class="infoUpContentSP">

            </div>
        </div>
        <div class="downContentSP">

        </div>
    </div>
  </div>
<div class="contentOrder">

<div class="show_pro_ess" id="show_pro_ess">
<div class="show_pro">
<div class="show_pro1 row">
{{-- col-5 col-xs-push-4 --}}
  <div class="show_pro2 text-right">
    <h1>{{$show_pro->name}}</h1>

  </div>
  {{-- col-7 col-xs-pull-8 --}}
  <div class="  text-left show_pro3">
    <div class="show_pro3_1 row" dir="ltr"><div class="show_pro3_2 "><span class=""></span>  <i class="fas fa-comments bn"></i> <!----></div><div class="show_pro3_3 "> <span class="">{{$show_pro->views}}</span> <i class="far fa-eye bn"></i> <!--<span class="pro_span4"></span>--> </div></div>
  </div>
</div>





<div class="show_pro40">




  <div class="show_pro5">
      {{-- <div class="small_img_pro5 ">
          <div class="sp5-768 short_img_pro slider">
            @for ($i=1; $i < 7; $i++)
              < ? php
                $pic_s ='pic_s'.$i;
                $b_img_p='b-img-p'.$i;
                if(empty($pic_pro->$pic_s)){continue;}
              ?>
              <div class=""><img src="../../img_pro/{{$pic_pro->$pic_s}}" alt="img" class="sp5-768" height="77" onclick="b_img_pro('{{$b_img_p}}')"></div>
            @endfor
          </div>
      </div> --}}
      <div class="big_img_pro5">
          <div class="bp5-768">
            @for ($i=1; $i < 7; $i++)
              <?php $pic ='pic_b'.$i; $b_img_p='b-img-p'.$i; ?>
              <img src="../../img_pro/{{$pic_pro->$pic}}" alt="" class=" {{$b_img_p}} big_img_pro <?php if ($i==1) {echo   'active_img_pro' ;} ?> " height="380">
            @endfor
          </div>
          <div class="bp5-600">
             @for ($i=1; $i < 7; $i++)
              <?php $pic ='pic_b'.$i; $b_img_p='b-img-p'.$i; ?>
              <img src="../../img_pro/{{$pic_pro->$pic}}" alt="" class=" {{$b_img_p}} big_img_pro <?php if ($i==1) {echo 'active_img_pro' ;} ?> " height="290">
            @endfor
          </div>
          <div class="bp5-500">
            @for ($i=1; $i < 7; $i++)
              <?php $pic ='pic_b'.$i; $b_img_p='b-img-p'.$i; ?>
              <img src="../../img_pro/{{$pic_pro->$pic}}" alt="" class=" {{$b_img_p}} big_img_pro <?php if ($i==1) {echo   'active_img_pro' ;} ?> " height="180">
            @endfor
          </div>
      </div>
      <div class="show_pro5_end">
        <div class="sp5-600 short_img_pro21 slider2">
          @for ($i=1; $i < 7; $i++)
            <?php
              $pic_s ='pic_s'.$i;
              $b_img_p='b-img-p'.$i;
              if(empty($pic_pro->$pic_s)){continue;}
            ?>
            <div class=""><img src="../../img_pro/{{$pic_pro->$pic_s}}" alt="  " class="" height="54" onclick="b_img_pro('{{$b_img_p}}')"></div>
          @endfor
        </div>
      </div>
  </div>
  <div class="show_pro6">
      <div class="show_pro6_1">
          <div class="show_pro6_1_1">
              <span class="span_pro6_1_1 number">{{number_format($show_pro->old_price)}}</span><span class="span_pro6_1_2 ">تومان</span>
              @php
                  if($show_pro->old_price > 0){
                    $percent_price=100- ($show_pro->price * 100)/$show_pro->old_price;
                   }else{$percent_price=0;}
              @endphp
              <span class="span_pro6_1_3 number">{{round($percent_price).'%'}} </span>
          </div>
          <div class="show_pro6_1_2">
              <span class="span_pro6_1_4">قیمت </span> <span class="number span_pro6_1_5">:</span> <span class="span_pro6_1_6 number"> {{number_format($show_pro->price)}}</span><span class="span_pro6_1_7">تومان</span>
              {{-- <span class="span_pro6_1_4">قیمت برای شما</span> <span class="number span_pro6_1_5">:</span> <span class="span_pro6_1_6 number"> {{number_format($show_pro->price)}}</span><span class="span_pro6_1_7">تومان</span> --}}

          </div>
      </div>
      {{-- <a href="/showSabadOrder/{{$show_pro->id}}"> --}}
        {{-- <div class="show_pro6_2" onclick="window.location.href='/showSabadOrder/{{$show_pro->id}}'">
          <span class="span_pro6_1_8 span_pro6_1_8_2"> <span class="span_pro6_1_9"><i class="fas fa-cart-plus"></i></span> <span class="span_pro6_1_10">خرید </span> </span>
        </div> --}}
        <div class="divBtnKharid" onclick="window.location.href='/showSabadOrder/{{$show_pro->id}}'">
           <i class="fas fa-cart-plus"></i> <span class="">خـــرید</span>
        </div>
      {{-- </a> --}}
      <div class="show_pro6_3">
        <span class="sp_pro6_3_1"> <span class="sp_pro6_3_1_1"><i class="fas fa-user-tie"></i></span> <span class="sp_pro6_3_1_1">به جمع فروشندگان ما بپیوندید</span> </span>
        <br>
        <span class="sp_pro6_3_2">
            <span class="sp_pro6_3_2_1">
              <span class="sp_pro6_321_1"><i class="fas fa-cloud"></i></span> <span class="sp_pro6_321_2">به راحتی از شبکه اجتماعی خود کسب درآمد کنید</span>
            </span>
            <span class="sp_pro6_3_2_2">
                <i class="fab fa-whatsapp i_pro63_1"></i><i class="fab fa-telegram i_pro63_2"></i><i class="fab fa-instagram i_pro63_3"></i><i class="i_pro63_4">...</i>
            </span>
        </span>
      </div>

      <div class="show_pro6_4"><!-- اشتراک گذاری -->
      <i class="fas fa-share-alt share_pro" ></i>   <i class="fab fa-twitter-square twit_pro"></i> <i class="fab fa-facebook-square face_pro"></i> <i class="fab fa-google-plus goo_pro"></i> <i class="fab fa-linkedin linked_pro"></i>

      </div>
      <div class="show_pro6_5">
      <a   onclick=""><span>فروشنده :</span> <span class="sp_pro6_5_1">{{$shop->shop}}</span></a>
      </div>
  </div>

  <div class="show_pro7">
      <ul class="ul_pro7_1">
        <li class="li_pro7_1 pro7_active" onclick="pro7_active('li_pro7_1' , 'show_pro8_1')"> <span class="span_pro7_0"> <span class="span_pro7_1"> <i class="fas fa-clipboard-check"></i></span> <span class="span_pro7_2">توضیحات کالا</span> </span></li>
        <li class="li_pro7_2" onclick="pro7_active('li_pro7_2', 'show_pro8_2')"> <span class="span_pro7_0"> <span class="span_pro7_3"><i class="fas fa-clipboard-list"></i></span> <span class="span_pro7_4">مشخصات کالا</span> </span></li>
        {{-- <li class="li_pro7_3" onclick="pro7_active('li_pro7_3', 'show_pro8_3');captcha()"> <span class="span_pro7_0"> <span class="span_pro7_5"><i class="fas fa-comment"></i></span> <span class="span_pro7_6">نظرات کاربران</span> </span></li> --}}
        <li class="li_pro7_4" onclick="pro7_active('li_pro7_4', 'show_pro8_4');captcha()"> <span class="span_pro7_0"> <span class="span_pro7_7"><i class="fas fa-question-circle"></i></span> <span class="span_pro7_8">پرسش و پاسخ</span> </span></li>
      </ul>
  </div>
  <div class="show_pro8">
      <div class="show_pro8_0 show_pro8_1  pro8_active ">
        <?=$show_pro->dis?>
      </div>
      <div class="show_pro8_0 show_pro8_2">
        <div class="made_pro specs_pro">
            <div class="made_pro1">سازنده :</div>
            <div class="made_pro2">{{$show_pro->maker}}</div>
        </div>
        <div class="model_pro specs_pro">
            <div class="model_pro1">مدل :</div>
            <div class="model_pro2">{{$show_pro->model}}</div>
        </div>
        <div class="vazn_pro specs_pro">
            <div class="vazn_pro1">وزن (گرم) :</div>
            <div class="vazn_pro2">{{$show_pro->vazn}} <span class="specs_pro_vahd">gr</span> </div>
        </div>
        <div class="dimension_pro specs_pro">
            <div class="dimension_pro1">ابعاد (سانتیمتر) :</div>
            <div class="dimension_pro2">{{$show_pro->dimension}} cm</div>
        </div>

        <div class="mavad_pro specs_pro">
            <div class="mavad_pro1">مواد اولیه :</div>
            <div class="mavad_pro2">

              <ul>
                {{-- @php
                $mavads=  json_decode($show_pro->mavad);
                @endphp
                @foreach ($mavads as $mavads2)
                  @if ($mavads2!=null)
                    <li>{{$mavads2}}</li>
                  @endif
                @endforeach --}}
              </ul>
            </div>
        </div>
        <div class="date_m_pro specs_pro">
            <div class="date_m_pro1">تاریخ تولید :</div>
            <div class="date_m_pro2">{{$show_pro->dateMake}}</div>
        </div>
        <div class="date_n_pro specs_pro">
            <div class="date_n_pro1">تاریخ انقضا :</div>
            <div class="date_n_pro2">{{$show_pro->dateExpiration}}</div>
        </div>
        <div class="term_pro specs_pro">
            <div class="term_pro1">شرایط نگهداری :</div>
            <div class="term_pro2"><?=$show_pro->term?></div>
        </div>
        <div class="bake_pro specs_pro">
            <div class="bake_pro1">شرایط ارجاع کالا :</div>
            <div class="bake_pro2"><?=$show_pro->bake?></div>
        </div>
        <div class="sponsor_pro specs_pro">
            <div class="sponsor_pro1">گارانتی :</div>
            <div class="sponsor_pro2"> </div>

        </div>
      </div>
      {{-- نظرات --}}
      {{-- <div class="show_pro8_0 show_pro8_3">
        <div class="nazar_pro0 ">
          <!-- Default panel contents -->
            <div class="nazar_pro1">
                <h4 ><span class="fas fa-comments bn2" id="scroll_nazar_pro"></span>&nbsp; نظر کاربران  <span class="badge pro_question_count"></span></h4>
                <button type="button" class="btn btn-succpro btn_pro" onclick="nazar_pro()"  name="button">ارسال نظر</button>
            </div>
            <div class="panel-body nazar_pro2">
              {{-- @if (count($nazar_pro)>0)
              @foreach ($nazar_pro as  $nazar)
              <div class="pro_nazar_body">
                <div class="pro_nazar_header">
                  <i class="fas fa-user-tie pro_ikon_nazar"></i>
                  <div class="pro_nazar_header2">
                    <h4>{{$nazar->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{$nazar->date}}</h4>
                  </div>
                  <i class="fas fa-check-double pro_tik_nazar"></i>
                </div>
                <p class="pro_nazra_matn">{{$nazar->nazar}} </p>
              </div>
            @endforeach
            @else
              <div class="no_nazar_pro">
                تا کنون برای این محصول نظری داده نشده !! شما اولین نفر باشید که نظر می دهید .
              </div>
            @endif --}}
            {{-- </div>
          </div> --}}
{{-- ارسال نظر --}}
      {{-- <div class="ersal_nazar_pro">
        <div class="ersal_nazar_pro1">
            <h4><i class="far fa-comment-dots"></i> نظر دهید </h4>
            <span> ایمیل و موبایل شما منتشر نمی شود .</span>
        </div>
                <form id="form_nazar_pro" class="form_nazar_pro" method="post">
                    {{ csrf_field() }}
                    <div id="alarm_pro_nazar"></div>
                    <div class="form-group">
                        <label for="name_pro_nazar" class="control-label pull-right  ">نام </label>
                        <div class="mobail_n_pro"><input type="text" class="form-control" id="name_pro_nazar" ></div>
                    </div>
                    <div class="form-group">
                        <label for="mobail_pro_nazar" class="control-label pull-right ">موبایل ( اختیاری )</label>
                        <div class="mobail_n_pro"><input type="text" class="form-control" id="mobail_pro_nazar"></div>
                    </div>
                    <div class="form-group">
                        <label for="email_pro_nazar" class="control-label pull-right ">ایمیل ( اختیاری )</label>
                        <div class="mobail_n_pro"><input type="text" class="form-control" id="email_pro_nazar"></div>
                    </div>
                    <div class="form-group">
                        <label for="nazar_pro_nazar" class="control-label pull-right ">نظر</label>
                        <div class="mobail_n_pro"><textarea name="name" class="form-control" id="nazar_pro_nazar" rows="8" cols="80"></textarea></div>
                    </div>
                    <div class="form-group" >
                         <label for="amniat_pro_nazar" class="control-label pull-right ">کد امنیتی </label>
                         <div class="mobail_n_pro"><input type="text" class="form-control tel" id="amniat_pro_nazar" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
                    </div>
                    <div class="captcha_nazar_form">
                        <span class="captcha4">{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
                    </div>
                    <div class="button_nazar_pro">
                         <button type="button" id="submit_pro_nazar" class="btn btn-primary btn-block" onclick="sabt_nazar_pro({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')"><h5>ثبت نظر</h5></button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del_form('form_nazar_pro')"><h5>پاک کن</h5> </button>
                    </div>
                </form>
        </div> --}}
  {{-- </div>  --}}
      {{-- پرسشها و پاسخها --}}
      <div class="show_pro8_0 show_pro8_4">
          <div class="question_pro"><i class="far fa-question-circle"></i><h4>پرسش و پاسخ</h4></div>
          <p class="question_pro_p"> <i class="fas fa-info-circle"></i><span>در حال حاضر پرسش و پاسخ تنها از طریق تماس تلفنی امکان پذیر است .</span> </p>
          <div class="alert alert-danger question_pro_danger" style="float: right;">
            <strong>هشدار !</strong> چنانچه غیر حضوری کالا را خریداری می کنید و محصول را از طریق پست و غیرو تحویل می گیرید ، حتما پرداخت وجه کالا را
            از طریق درگاه اینترنتی فروشگاه انجام دهید ، در غیر این صورت فروشگاه هیچ تعهدی در قبال کالای خریداری شده شما ندارد .
          </div>
          <p class="question_pro_p2"><span>تماس با فروشنده کالا :</span> <span class="number">{{$shop->mobail}}</span> </p>
          <p class="question_pro_p2"><span>تماس با مدیریت سایت :</span> <span class="number">09178023733</span> </p>

          {{-- <form class="form_question_pro" id="form_question_pro" action="" method="post">
            <div class="form_question_pro1">ایمیل و موبایل شما منتشر نمی شود</div>
            <div id="question_pro"></div>

            <div class="form-group">
                <label for="name_pro_questions" class="control-label pull-right  ">نام </label>
                <div class="mobail_question_pro"><input type="text" class="form-control" id="name_pro_questions"></div>
            </div>
            <div class="form-group">
                <label for="mobail_pro_questions" class="control-label pull-right ">موبایل ( اختیاری )</label>
                <div class="mobail_question_pro"><input type="text" class="form-control" id="mobail_pro_questions"></div>
            </div>
            <div class="form-group">
                <label for="email_pro_questions" class="control-label pull-right ">ایمیل ( اختیاری )</label>
                <div class="mobail_question_pro"><input type="text" class="form-control" id="email_pro_questions"></div>
            </div>
            <div class="form-group">
                <label for="question_pro_questions" class="control-label pull-right ">پرسش</label>
                <div class="mobail_question_pro"><textarea name="name" class="form-control" id="question_pro_questions" rows="4" cols="80"></textarea></div>
            </div>
            <div class="form-group" >
                <label for="amniat_pro_questions" class="control-label pull-right ">کد امنیتی </label>
                <div class="mobail_question_pro"><input type="text" class="form-control tel" id="amniat_pro_questions" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
            </div>
            <div class="captcha_question_form">
                <span class="captcha4">{!! captcha_img() !!}</span>
                <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
            </div>
            <div class="button_question_pro">
                <button type="button" id="submit_pro_question" class="btn btn-primary btn-block" onclick="sabt_question_pro({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')"><h5>ثبت پرسش</h5></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del_form('form_nazar_pro')"><h5>پاک کن</h5> </button>
            </div>
          </form> --}}
          {{-- پاسخها --}}
          {{-- <div class="question_pro2"> <i class="fas fa-list-alt"></i> پرسشهای کاربران و پاسخها</div> --}}
          {{-- <div class="panel-body question_pro3">
            @if (count($question_pro)>0)
            @foreach ($question_pro as  $val_quest)
            <div class="pro_question_body">
              <div class="pro_question_header">
                <i class="fas fa-user-tie pro_ikon_nazar"></i>
                <div class="pro_question_header2">
                  <h4>{{$val_quest->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{$val_quest->date}}</h4>
                </div>
                <i class="fas fa-check-double pro_tik_question"></i>
              </div>
              <p class="pro_question_matn">{{$val_quest->question}} </p>
              <div class="pro_question_pasohk" data-toggle="modal" data-target="#pro_question_answer" onclick="question_id({{$val_quest->id}}) ">به این سوال پاسخ دهید</div>
              {{-- پاسخهای داده شده --}}
              {{-- @foreach ($answer_pro->where('question_pro_id' , $val_quest->id) as $val_answer)
              <div class="pro_pasohk_body">
                <div class="pro_pasohk_header">
                  <span>پاسخ از</span>
                  <div class="pro_pasohk_header2">
                    <h4>{{$val_answer->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{$val_answer->date}}</h4>
                  </div>
                  <i class="fas fa-check-double pro_tik_pasohk"></i>
                </div>
                <p class="pro_pasohk_matn">{{$val_answer->answer}}</p>
              </div>
              @endforeach

            </div>

          @endforeach
          @else
            <div class="no_question_pro">
              تا کنون سوالی برای این محصول مطرح نشده!!
              شما اولین نفری باشید که سوال مطرح میکنید .
            </div>
          @endif --}}
        {{-- </div> --}}

      </div>
</div>

</div>
</div>
{{-- <!-- Modal پاسخها-->

<div class="modal fade" id="pro_question_answer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-pasohk-header">
        <h5 class="modal-title modal_pasohk_label" id="exampleModalLabel">پاسخ</span> </h5>
        <button type="button" class="close modal_pasohk_label_2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body_pasohk">
         <form class="form_pasohk_pro" id="form_answer_pro" action="" method="post">
          <div class="form_pasohk_pro1">ایمیل و موبایل شما منتشر نمی شود</div>
          <div id="alarm_pro_answer"></div>
          <div class="form-group">
            <label for="name_pro_answer" class="control-label pull-right  ">نام </label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="name_pro_answer" ></div>
          </div>
          <div class="form-group">
            <label for="mobail_pro_answer" class="control-label pull-right ">موبایل ( اختیاری )</label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="mobail_pro_answer"></div>
          </div>
          <div class="form-group">
            <label for="email_pro_answer" class="control-label pull-right ">ایمیل ( اختیاری )</label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="email_pro_answer"></div>
          </div>
          <div class="form-group">
            <label for="answer_pro_answer" class="control-label pull-right ">پاسخ</label>
            <div class="mobail_pasohk_pro1"><textarea name="name" class="form-control" id="answer_pro_answer" rows="4" cols="80"></textarea></div>
          </div>
          <div class="form-group" >
            <label for="amniat_pro_answer" class="control-label pull-right ">کد امنیتی </label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control tel" id="amniat_pro_answer" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
          </div>
          <div class="captcha_pasohk_form">
            <span class="captcha4">{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
          </div>
        </form>
      </div>
      <div class=" modal-footer-pro-question">
        <button type="button" class="btn btn-primary modal-footer-pro-question1" onclick="sabt_answer_pro({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')">ثبت پاسخ</button>
        <button type="button" class="btn btn-secondary modal-footer-pro-question2" data-dismiss="modal">خروج</button>
      </div>
    </div>
  </div>
</div><!--end modal --> --}}
{{--
<!--modal پیام اضافه شدن به سبد خرید -->
<div class="modal " id="pro_add_sabad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body modal_pro_add_sabad">
          این محصول با موفقیت به سبد خرید شما اضافه شد !
      </div>
      <div class="modal_pro_add_sabad2">
        <a href="/show_sabad_pro" class="a_pjax" onclick="$('#pro_add_sabad').modal('hide')">
        <button type="button"  class="btn btn-success modal_pro_add_sabad3" >مشاهده سبد خرید </button>
      </a>
        <button type="button" class="btn btn-info modal_pro_add_sabad4" data-dismiss="modal">خرید محصولی دیگر</button>
      </div>
    </div>
  </div>
</div><!--end modal --> --}}
<!--modal ثبت نظر -->
{{-- <div class="modal " id="end_nazar_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body modal_pro_add_sabad">
          ممنون !! نظر شما ثبت شد
      </div>
      <div class="modal_pro_add_sabad2">

        <button type="button"  class="btn btn-success modal_pro_add_sabad3" data-dismiss="modal" >متوجه شدم !! </button>


      </div>
    </div>
  </div>
</div><!--end modal --> --}}
<!--modal ثبت سوال -->
{{-- <div class="modal " id="end_question_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body modal_pro_add_sabad">
          ممنون !! پرسش شما ثبت شد .
      </div>
      <div class="modal_pro_add_sabad2">

        <button type="button"  class="btn btn-success modal_pro_add_sabad3" data-dismiss="modal" >متوجه شدم !! </button>


      </div>
    </div>
  </div>
</div><!--end modal --> --}}
<!--modal ثبت پاسخ-->
{{-- <div class="modal " id="end_answer_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body modal_pro_add_sabad">
          ممنون !! پاسخ شما ثبت شد .
      </div>
      <div class="modal_pro_add_sabad2">

        <button type="button"  class="btn btn-success modal_pro_add_sabad3" data-dismiss="modal" >متوجه شدم !! </button>


      </div>
    </div>
  </div>
</div><!--end modal --> --}}
</div><!-- end show_pro -->
</div>
@endsection
