{{-- showOnePro.css --}}{{-- showOneOrder.php مشترک با --}}
@extends('layout.layout')
@section('title')
  {{$show_pro->name}}
@endsection
@section('content')
  <div class="bodyShowPro bodyShowPro_p">
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
                    <img src="../../img_pro/{{$pic_pro->$pic}}" alt="" class=" {{$b_img_p}} big_img_pro @if($i==1) active_img_pro @endif  " >
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
                          <img src="../../img_pro/{{$pic_pro->$pic_s}}" alt="  " onclick="b_img_pro('{{$b_img_p}}')">
                        </div>
                      @endfor


                  </div>
                </div>
            </div>
            <div class="infoUpContentSP">
                <div class="oldPriceIUCSP">
                    <span class="oldPriceIUCSP_S1 number">{{number_format($show_pro->old_price)}}</span><span class="oldPriceIUCSP_S2 ">تومان</span>
                    @php
                        if($show_pro->old_price > 0){
                          $percent_price=100- ($show_pro->price * 100)/$show_pro->old_price;
                         }else{$percent_price=0;}
                    @endphp
                    <span class="oldPriceIUCSP_S3 number">{{round($percent_price).'%'}} </span>
                </div>
                <div class="priceIUCSP">
                  @if (empty($stampProOrder->price))
                    {{-- قیمت اصلی محصول هنگامی که فروشنده هیچ تخفیفی به سفارش دهنده نداده است --}}
                    <span class="priceIUCSP_s1">قیمت :</span>
                    <span class="priceIUCSP_s2">{{number_format($show_pro->price)}}</span>
                    <span class="priceIUCSP_s3">تومان</span>
                  @else
                    {{-- قیمت اصلی محصول برای هنگامی که فروشنده به سفارش دهنده تخفیف داده است ، که به صورت فونت کوچکتر و یک خط بر روی آن نمایش داده می شود . --}}
                    <div class="priceIUCSP_prime">
                      <span class="priceIUCSP_s1_prime">قیمت :</span>
                      <span class="priceIUCSP_s2_prime">{{number_format($show_pro->price)}}</span>
                      <span class="priceIUCSP_s3_prime">تومان</span>
                    </div>
                    {{-- نمایش قیمت تخفیف داده شده --}}
                    <span class="priceIUCSP_s1">قیمت <span class="priceIUCSP_s1_tk" >(تخفیف  برای شما)</span>: </span>
                    <span class="priceIUCSP_s2">{{number_format($stampProOrder->price)}}</span>
                    <span class="priceIUCSP_s3">تومان</span>
                  @endif
                </div>
                <div class="divBtnKharid divBtnKharid_p" onclick="add_pro_sabad({{$show_pro->id}})">
                   <i class="fas fa-cart-plus"></i> <span class="">افزودن به سبد خرید</span>
                </div>
                <div class="addSeller">
                    <span> <i class="fas fa-user-tie addSeller_i"></i> به جمع فروشندگان ما بپیوندید</span>
                </div>
                <div class="addChannel">
                    <span> <i class="fas fa-cloud addChannel_i1"></i> به راحتی از شبکه اجتماعی خود کسب درآمد کنید
                          <br><i class="fab fa-whatsapp  addChannel_whatsapp "></i><i class="fab fa-telegram addChannel_telegram"></i><i class="fab fa-instagram addChannel_instagram"></i><i class="addChannel_point">...</i>
                    </span>
                </div>
                <div class="sharingIUCSP"><!-- اشتراک گذاری -->
                <i class="fas fa-share-alt share_pro" ></i>   <i class="fab fa-twitter-square twit_pro"></i> <i class="fab fa-facebook-square face_pro"></i> <i class="fab fa-google-plus goo_pro"></i> <i class="fab fa-linkedin linked_pro"></i>
                </div>
                <div class="sellerIUCSP">
                <a   onclick=""><span>فروشنده :</span> <span class="sellerIUCSP_s2 ">{{$shop->shop}}</span></a>
                </div>
            </div>
        </div>
        <div class="downContentSP">
            {{-- Explain == توضیح دادن --}}
                <ul class="Explain_ul  ">
                  <li class="Explain_li1  Explain_active" onclick="Explain_active('Explain_li1' , '.Explain_Explain')">  <i class="fas fa-clipboard-check"></i> توضیحات کالا </li>
                  <li class="Explain_li2 " onclick="Explain_active('Explain_li2', '.Explain_specs')"> <i class="fas fa-clipboard-list"></i> مشخصات کالا </li>
                  <li class="Explain_li3 " onclick="Explain_active('Explain_li3', '.Explain_question');captcha()"> <i class="fas fa-question-circle"></i> پرسش و پاسخ </li>
                  <li class="Explain_li4" onclick="Explain_active('Explain_li4', '.Explain_nazar');captcha()"> <i class="fas fa-comment"></i> نظرات کاربران</li>
                </ul>
                {{-- این تگ صرفا جهت نمایش دو قسمت مشخصات کالا و پرسش و پاسخ است هنگامی که کاربر دکمه متناظر با آن را فشار می دهد --}}
                <div class="showExplain Explain_body"></div>
                <div class="showExplain_line Explain_line"></div>
                <div class="Explain_body Explain_Explain">
                  <div class="Explain_titr">
                      توضیحات کالا
                  </div>
                  @if (!empty($show_pro->dis))
                    <div class="Explain_matn">
                      {{ $show_pro->dis }}
                      @if (!empty($stampProOrder->disSeller ))
                        <div class="disSeller_titr">توضیح فروشنده برای شما</div>
                        <div class="disSeller_matn">{{$stampProOrder->disSeller}}</div>
                      @endif
                    </div>
                  @else
                    <div class="alert alert-warning right">
                      برای این محصول توضیحی نوشته نشده است .
                    </div>
                  @endif
                </div>
                  {{-- specs = مشخصات --}}
                <div class="Explain_line Explain_specs_line"></div>
                <div class="Explain_body Explain_specs">
                    <div class="Explain_titr">
                        مشخصات کالا
                    </div>
                    <div class="Explain_matn">
                        <div class="made_pro explain_row">
                            <div class="made_pro1">سازنده :</div>
                            <div class="made_pro2">{{$show_pro->maker}}</div>
                        </div>
                        <div class="model_pro explain_row">
                            <div class="model_pro1">مدل :</div>
                            <div class="model_pro2">{{$show_pro->model}}</div>
                        </div>
                        <div class="vazn_pro explain_row">
                            <div class="vazn_pro1">وزن <span>(گرم)</span> : </div>
                            <div class="vazn_pro2">{{$show_pro->vazn}} <span class="specs_pro_vahd">gr</span> </div>
                        </div>
                        <div class="dimension_pro explain_row">
                            <div class="dimension_pro1">ابعاد <span>(سانتیمتر)</span> : </div>
                            <div class="dimension_pro2">{{$show_pro->dimension}} cm</div>
                        </div>

                        <div class="mavad_pro  explain_row2">
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
                        <div class="date_m_pro explain_row">
                            <div class="date_m_pro1">تاریخ تولید :</div>
                            <div class="date_m_pro2">{{$show_pro->dateMake}}</div>
                        </div>
                        <div class="date_n_pro explain_row">
                            <div class="date_n_pro1">تاریخ انقضا :</div>
                            <div class="date_n_pro2">{{$show_pro->dateExpiration}}</div>
                        </div>
                        <div class="term_pro explain_row2">
                            <div class="term_pro1">شرایط نگهداری :</div>
                            <div class="term_pro2"><?=$show_pro->term?></div>
                        </div>
                        <div class="bake_pro explain_row2">
                            <div class="bake_pro1">شرایط ارجاع کالا :</div>
                            <div class="bake_pro2"><?=$show_pro->bake?></div>
                        </div>
                        <div class="sponsor_pro explain_row2">
                            <div class="sponsor_pro1">گارانتی :</div>
                            <div class="sponsor_pro2"> </div>
                        </div>
                    </div>
                </div>
                <div class="Explain_line Explain_question_line"></div>
                <div class="Explain_body Explain_question">
                    <div class="Explain_titr">
                        پرسش و پاسخ
                    </div>
                    <div class="Explain_matn">
                          <p class="questionPStock"> <i class="fas fa-info-circle"></i>جهت پاسخ سریع با شماره <span>09178023733</span> تماس بگیرید . و یا اینکه از فرم زیر استفاده کنید . </p>
                          <form class="formQuestionStock" id="formQuestionStock"method="post">
                            {{ csrf_field() }}
                            <div class="NotPropagateEmail">ایمیل و موبایل شما منتشر نمی شود</div>
                            <div id="formQuestionAjaxStock"></div>

                            <div class="form-group">
                                <label for="nameQuestionsStock" class="control-label pull-right  ">نام </label>
                                <div class="mobail_question_pro"><input type="text" class="form-control" id="nameQuestionsStock"></div>
                            </div>
                            <div class="form-group">
                                <label for="mobailQuestionsStock" class="control-label pull-right ">موبایل ( اختیاری )</label>
                                <div class="mobail_question_pro"><input type="text" class="form-control" id="mobailQuestionsStock"></div>
                            </div>
                            <div class="form-group">
                                <label for="emailQuestionsStock" class="control-label pull-right ">ایمیل ( اختیاری )</label>
                                <div class="mobail_question_pro"><input type="text" class="form-control" id="emailQuestionsStock"></div>
                            </div>
                            <div class="form-group form-group2">
                                <label for="questionQuestionsStock" class="control-label pull-right ">پرسش</label>
                                <div class="mobail_question_pro"><textarea name="name" class="form-control" id="questionQuestionsStock" rows="2" cols="80"></textarea></div>
                            </div>
                            <div class="form-group" >
                                <label for="amniatQuestionsStock" class="control-label pull-right ">کد امنیتی </label>
                                <div class="mobail_question_pro"><input type="text" class="form-control tel placeholder" id="amniatQuestionsStock" placeholder="کد امنیتی زیر را وارد کنید ..."  onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
                            </div>
                            <div class="captcha">
                                <span class="captcha4">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            <div class="button">
                                <button type="button" id="submit_pro_question" class="btn btn-primary btn-block" onclick="sabtQuestionStock({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')"><h5>ثبت پرسش</h5></button>
                                <button type="reset" class="btn btn-danger" ><h5>پاک کن</h5> </button>
                            </div>
                          </form>
                          {{-- پاسخها --}}
                          <div class="questionAnswer_stock"> <i class="fas fa-list-alt"></i> پرسشهای کاربران و پاسخها</div>
                          <div class="panel-body questionPanel">
                            @if (count($question_pro)>0)
                            @foreach ($question_pro as  $val_quest)
                            <div class="questionBodyStock">
                              <div class="questionHeaderStock">
                                <i class="fas fa-user-tie"></i>
                                <div class="questionNameDateStock">
                                  <h4>{{$val_quest->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{verta($val_quest->date)->format('y/m/d')}}</h4>
                                </div>
                                <i class="fas fa-check-double"></i>
                              </div>
                              <p class="questionMatn">{{$val_quest->question}} </p>
                              <div class="linkAnswer" data-toggle="modal" data-target="#modalAnswerStock" onclick="question_id({{$val_quest->id}}) ">پاسخ دهید</div>
                              {{-- پاسخهای داده شده --}}
                              @foreach ($answer_pro->where('question_pro_id' , $val_quest->id) as $val_answer)
                              <div class="answerBodyStock">
                                <div class="answerHeaderStock">
                                  <i class="fas fa-user-tie"></i>
                                  <div class="answerNameDateStock">
                                    <h4>{{$val_answer->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{verta($val_answer->date)->format('y/m/d')}}</h4>
                                  </div>
                                </div>
                                <p class="answerMatn">{{$val_answer->answer}}</p>
                              </div>
                              @endforeach
                            </div>
                          @endforeach
                          @else
                            <div class="alert alert-warning right">
                              تا کنون سوالی برای این محصول مطرح نشده!!
                              شما اولین نفری باشید که سوال مطرح میکنید .
                            </div>
                          @endif
                        </div>
                    </div>
                </div>
                {{-- نظرات کاربران --}}
                <div class="Explain_line Explain_nazar_line"></div>
                <div class="Explain_body Explain_nazar">
                    <div class="Explain_titr">
                        نظرات کاربران
                    </div>
                    <div class="Explain_matn">
                          {{-- <p class="questionPStock"> <i class="fas fa-info-circle"></i>جهت پاسخ سریع با شماره <span>09178023733</span> تماس بگیرید . و یا اینکه از فرم زیر استفاده کنید . </p> --}}
                          <form class="formNazarStock" id="formNazarStock"method="post">
                            {{ csrf_field() }}
                            <div class="NotPropagateEmail">ایمیل و موبایل شما منتشر نمی شود</div>
                            <div id="formNazarAjaxStock"></div>

                            <div class="form-group">
                                <label for="nameNazarStock" class="control-label pull-right  ">نام </label>
                                <div class="mobail_Nazar_pro"><input type="text" class="form-control" id="nameNazarStock"></div>
                            </div>
                            <div class="form-group">
                                <label for="mobailNazarStock" class="control-label pull-right ">موبایل ( اختیاری )</label>
                                <div class="mobail_Nazar_pro"><input type="text" class="form-control" id="mobailNazarStock"></div>
                            </div>
                            <div class="form-group">
                                <label for="emailNazarStock" class="control-label pull-right ">ایمیل ( اختیاری )</label>
                                <div class="mobail_Nazar_pro"><input type="text" class="form-control" id="emailNazarStock"></div>
                            </div>
                            <div class="form-group form-group2">
                                <label for="nazarNazarStock" class="control-label pull-right ">نظر</label>
                                <div class="mobail_Nazar_pro"><textarea name="name" class="form-control" id="nazarNazarStock" rows="2" cols="80"></textarea></div>
                            </div>
                            <div class="form-group" >
                                <label for="amniatNazarStock" class="control-label pull-right ">کد امنیتی </label>
                                <div class="mobail_Nazar_pro"><input type="text" class="form-control tel placeholder" id="amniatNazarStock" placeholder="کد امنیتی زیر را وارد کنید ..."  onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
                            </div>
                            <div class="captcha">
                                <span class="captcha4">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            <div class="button">
                                <button type="button" id="submit_pro_Nazar" class="btn btn-primary btn-block" onclick="sabtNazarStock({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')"><h5>ثبت نظر</h5></button>
                                <button type="reset" class="btn btn-danger" ><h5>پاک کن</h5> </button>
                            </div>
                          </form>
                          {{-- نظرات --}}
                          <div class="questionAnswer_stock"> <i class="fas fa-list-alt"></i>  نظرات</div>
                          <div class="panel-body nazarPanel">
                            @if (count($nazar_pro)>0)
                            @foreach ($nazar_pro as  $nazar)
                            <div class="nazarBodyStock">
                              <div class="nazarHeaderStock">
                                <i class="fas fa-user-tie"></i>
                                <div class="nazarNameDateStock">
                                  <h4>{{$nazar->name}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4>{{verta($nazar->date)->format('y/m/d')}}</h4>
                                </div>
                                <i class="fas fa-check-double"></i>
                              </div>
                              <p class="nazarMatn">{{$nazar->nazar}} </p>

                            </div>
                          @endforeach
                          @else
                            <div class="alert alert-warning right">
                                تا کنون برای این محصول نظری داده نشده !! شما اولین نفر باشید که نظر می دهید .
                            </div>
                          @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
  </div>

</div>
<!--modal ثبت سوال -->
<div class="modal " id="endQuestionStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content">
      <div class="modal-body alert alert-success  alertQuestionSuccess">ممنون !! پرسش شما ثبت شد .</div>
      <div class="divQuestionModal"><button type="button"  class="btn btn-info " data-dismiss="modal" >متوجه شدم !! </button></div></div></div>
</div><!--end modal -->
{{-- modal پاسخ --}}
<div class="modal fade" id="modalAnswerStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header modalAnswerheaderStock"><h5 class="modal-title ">پاسخ </h5><span aria-hidden="true"data-dismiss="modal" aria-label="Close">&times;</span></div>
      <div class="modal-body modalAnswerBodyStock">
         <form class="formAnswerStock" id="formAnswerStock" action="" method="post">
           {{ csrf_field() }}
          <div class="NotPropagateEmail">ایمیل و موبایل شما منتشر نمی شود</div>
          <div id="formAnswerAjaxStock"></div>
          <div class="form-group">
            <label for="nameAnswerStock" class="control-label pull-right  ">نام </label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="nameAnswerStock" ></div>
          </div>
          <div class="form-group">
            <label for="mobailAnswerStock" class="control-label pull-right ">موبایل ( اختیاری )</label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="mobailAnswerStock"></div>
          </div>
          <div class="form-group">
            <label for="emailAnswerStock" class="control-label pull-right ">ایمیل ( اختیاری )</label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control" id="emailAnswerStock"></div>
          </div>
          <div class="form-group">
            <label for="answerAnswerStockr" class="control-label pull-right ">پاسخ</label>
            <div class="mobail_pasohk_pro1"><textarea name="name" class="form-control" id="answerAnswerStock" rows="2" cols="80"></textarea></div>
          </div>
          <div class="form-group" >
            <label for="amniatAnswerStock" class="control-label pull-right ">کد امنیتی </label>
            <div class="mobail_pasohk_pro"><input type="text" class="form-control tel" id="amniatAnswerStock" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
          </div>
          <div class="captcha">
            <span class="captcha4">{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
          </div>
          <div class="button">
            <button type="button" class="btn btn-primary modal-footer-pro-question1" onclick="sabtAnswerStock({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')">ثبت پاسخ</button>
            <button type="reset" class="btn btn-secondary modal-footer-pro-question2" data-dismiss="modal">خروج</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!--end modal -->
<!--modal ثبت پاسخ-->
<div class="modal " id="endAnswerStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"><div class="modal-body alert alert-success  alertQuestionSuccess">ممنون !! پاسخ شما ثبت شد .</div>
      <div class="divQuestionModal"><button type="button"  class="btn btn-info" data-dismiss="modal" >متوجه شدم !! </button></div>
    </div></div>
</div><!--end modal -->
<!--modal ثبت نظر -->
<div class="modal " id="endNazarStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-body alert alert-success  alertQuestionSuccess"> ممنون !! نظر شما ثبت شد  </div>
    <div class="divQuestionModal"><button type="button"  class="btn btn-info" data-dismiss="modal" >متوجه شدم !! </button>  </div>
  </div></div>
</div><!--end modal -->
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
</div><!--end modal -->
@endsection
