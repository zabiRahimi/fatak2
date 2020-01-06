{{-- showOnePro.css --}}{{--  مشترک با ShowOnePro.php--}}
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
                        <img src="../../img_pro/{{$pic_pro->$pic_s}}" alt="  " onclick="b_img_pro('.{{$b_img_p}}')">
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
                <div class="divBtnKharid" onclick="window.location.href='/showSabadOrder/{{$show_pro->id}}/{{$stampProOrder->order_id}}'">
                   <i class="fas fa-cart-plus"></i> <span class="">خـــرید</span>
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
                  <li class="Explain_li1  Explain_active" onclick="Explain_active('.Explain_li1' , '.Explain_Explain')">  <i class="fas fa-clipboard-check"></i> توضیحات کالا </li>
                  <li class="Explain_li2 " onclick="Explain_active('.Explain_li2', '.Explain_specs')"> <i class="fas fa-clipboard-list"></i> مشخصات کالا </li>
                  {{-- <li class="li_pro7_3" onclick="Explain_active('.Explain_li3', 'show_pro8_3');captcha()"> <span class="span_pro7_0"> <span class="span_pro7_5"><i class="fas fa-comment"></i></span> <span class="span_pro7_6">نظرات کاربران</span> </span></li> --}}
                  <li class="Explain_li3 " onclick="Explain_active('.Explain_li3', '.Explain_question');"> <i class="fas fa-question-circle"></i> پرسش و پاسخ </li>
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
                      <p class="question_explain_p"> <i class="fas fa-info-circle"></i><span>در حال حاضر پرسش و پاسخ تنها از طریق تماس تلفنی امکان پذیر است .</span> </p>
                      <div class="alert alert-danger question_explain_danger right">
                        <strong>هشدار !</strong> چنانچه غیر حضوری کالا را خریداری می کنید و محصول را از طریق پست و غیرو تحویل می گیرید ، حتما پرداخت وجه کالا را
                        از طریق درگاه اینترنتی فروشگاه انجام دهید ، در غیر این صورت فروشگاه هیچ تعهدی در قبال کالای خریداری شده شما ندارد .
                      </div>
                      <p class="question_explain_p2"><span>تماس با فروشنده کالا :</span> <span class="number">{{$shop->mobail}}</span> </p>
                      <p class="question_explain_p2"><span>تماس با مدیریت سایت :</span> <span class="number">09178023733</span> </p>
                    </div>
                </div>
        </div>
    </div>
  </div>

</div>
@endsection
