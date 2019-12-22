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
                <div class="divBtnKharid divBtnKharid_p" onclick="window.location.href='/showSabadOrder/{{$show_pro->id}}'">
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
                  <li class="Explain_li4" onclick="Explain_active('Explain_li4', 'Explain_userDis');captcha()"> <i class="fas fa-comment"></i> نظرات کاربران</li>
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

                          {{-- <p class="question_explain_p"> <i class="fas fa-info-circle"></i><span>در حال حاضر پرسش و پاسخ تنها از طریق تماس تلفنی امکان پذیر است .</span> </p>
                          <div class="alert alert-danger question_explain_danger right">
                            <strong>هشدار !</strong> چنانچه غیر حضوری کالا را خریداری می کنید و محصول را از طریق پست و غیرو تحویل می گیرید ، حتما پرداخت وجه کالا را
                            از طریق درگاه اینترنتی فروشگاه انجام دهید ، در غیر این صورت فروشگاه هیچ تعهدی در قبال کالای خریداری شده شما ندارد .
                          </div>
                          <p class="question_explain_p2"><span>تماس با فروشنده کالا :</span> <span class="number">{{$shop->mobail}}</span> </p>
                          <p class="question_explain_p2"><span>تماس با مدیریت سایت :</span> <span class="number">09178023733</span> </p> --}}

                          {{-- <div class="question_pro"><i class="far fa-question-circle"></i><h4>پرسش و پاسخ</h4></div> --}}
                          <p class="question_stock"> <i class="fas fa-info-circle"></i>جهت پاسخ سریع با شماره <span>09178023733</span> تماس بگیرید . و یا اینکه از فرم زیر استفاده کنید . </p>
                          <form class="form_question_stock" id="form_question_pro" action="" method="post">
                            <div class="form_question_stock1">ایمیل و موبایل شما منتشر نمی شود</div>
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
                            <div class="form-group form-group2">
                                <label for="question_pro_questions" class="control-label pull-right ">پرسش</label>
                                <div class="mobail_question_pro"><textarea name="name" class="form-control" id="question_pro_questions" rows="4" cols="80"></textarea></div>
                            </div>
                            <div class="form-group" >
                                <label for="amniat_pro_questions" class="control-label pull-right ">کد امنیتی </label>
                                <div class="mobail_question_pro"><input type="text" class="form-control tel placeholder" id="amniat_pro_questions" placeholder="کد امنیتی زیر را وارد کنید ..."  onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
                            </div>
                            <div class="captcha_question_stock">
                                <span class="captcha4">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            <div class="button_question_stock">
                                <button type="button" id="submit_pro_question" class="btn btn-primary btn-block" onclick="sabt_question_pro({{$show_pro->id}},'{{str_replace(" ","-","$show_pro->name")}}')"><h5>ثبت پرسش</h5></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del_form('form_nazar_pro')"><h5>پاک کن</h5> </button>
                            </div>
                          </form>
                          {{-- پاسخها --}}
                          <div class="questionAnswer_stock"> <i class="fas fa-list-alt"></i> پرسشهای کاربران و پاسخها</div>
                          <div class="panel-body question_pro3">
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
                              @foreach ($answer_pro->where('question_pro_id' , $val_quest->id) as $val_answer)
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
                            <div class="alert alert-warning right">
                              تا کنون سوالی برای این محصول مطرح نشده!!
                              شما اولین نفری باشید که سوال مطرح میکنید .
                            </div>
                          @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
  </div>

</div>
@endsection
