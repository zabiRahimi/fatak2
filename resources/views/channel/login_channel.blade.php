@extends('channel.layout')
@section('title')
  ورود-ثبت نام
@endsection
@section('content')
  <div class="channel_log">
    <div class="channel_log1">شبکه اجتماعی</div>
    <div class="channel_log2">با ما باشید</div>
    <div class="channel_log3"><a href="www.fatak.ir">fatak.ir</a></div>
  </div>
  <ul class="ul_line channel_log_ul">
    <a href="/"><li>صفحه اصلی</li></a>
    <li onclick="show_form_channel_log('channel_society_log')">نحوه کسب درآمد از شبکه اجتماعی</li>
    <li onclick="show_form_channel_log('channel_ghanon_log')">قوانین و مقررات</li>
  </ul>
    {{-- منو موبایل --}}
    <div class="chanel_menu_log">
      <button type="button" class="btn" name="button"onclick="show_menu_small('chanelMeLog_scroll')">
        <i class="fas fa-bars"></i>
        <span>منو</span>
      </button>
    </div>
    <div class="menu_small_1 chanelMeLog_small_1" onclick="hide_menu_small('chanelMeLog_scroll')">
    {{-- این دایو صرفا جهت فیکست بودن مودال می باشد و همچنین اعمال اوپتکی می باشد این دایو لازم است --}}
    </div>
    <div class="menu_small_2 chanelMeLog_small_2">
      <div class="close_menu_small" >
        <span><i class="fas fa-ellipsis-v"></i> منو</span> <button  onclick="hide_menu_small('chanelMeLog_scroll')"><span aria-hidden="true">&times;</span></button>
      </div>
      <ul class="menu_small_ul">
        <a href="/"><li class="modal_hide"><span><i class="far fa-window-maximize"></i> صفحه اصلی</span> </li></a>
        <li class="modal_hide" onclick="show_form_channel_log('channel_society_log');hide_menu_small('chanelMeLog_scroll')"><span><i class="fas fa-comments"></i> نحوه کسب درآمد از شبکه اجتماعی</span> </li>
        <li class="modal_hide" onclick="show_form_channel_log('channel_ghanon_log');;hide_menu_small('chanelMeLog_scroll')"><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
        <li class="modal_hide" onclick="modal_sub_show() ;hide_menu_small('chanelMeLog_scroll'); $('#modal_ghanon').modal('show')"><span><i class="fas fa-compass"></i> راهنما</span> </li>
      </ul>
    </div>
    {{-- //دکمه های ورود و ثبت نام --}}
    <div class="channel_btn_log">
      <div class="channel_btn_log1"><button type="button" class="btn" name="button" onclick="show_form_channel_log('channel_log_log')">ورود</button></div>
      <div class="channel_btn_log2"><button type="button" class="btn" name="button" onclick="show_form_channel_log('channel_sabt_log')">ثبت نام</button></div>
    </div>
    {{-- فرمهای ورود و ثبت نام --}}
    <div class="channel_sabt_log_log">
      <div class="channel_log_log channel_sabt_log_log2">
        <form class="form form_channellog" id="form_channellog" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ورود</div>
         <div id="ajax_channellog"></div>
         {{ csrf_field() }}

         <div class="form-group">
           <label for="mobail_channellog" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_channellog"></div>
         </div>
         <div class="form-group">
           <label for="pas_channellog" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_channellog" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_channellog" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_channellog" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="login_channel()" >ثبت</button>
         </div>
       </form>
      </div>

      <div class="channel_sabt_log channel_sabt_log_log2">
        <form class="form form_channelsabt1" id="form_channelsabt1" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت شبکه اجتماعی</div>
         <div id="ajax_channelsabt1"></div>
         {{ csrf_field() }}
         <div class="form-group">
           <label for="name_channelsabt1" class="control-label pull-right  "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی </label>
           <div class="div_form"><input type="text" class="form-control" id="name_channelsabt1" placeholder="به فارسی ..." ></div>
         </div>
         <div class="form-group">
           <label for="mobail_channelsabt1" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_channelsabt1"></div>
         </div>
         <div class="form-group">
           <label for="email_channelsabt1" class="control-label pull-right "><i class="fas fa-at i_form"></i>ایمیل (اختیاری)</label>
           <div class="div_form"><input type="text" class="form-control" id="email_channelsabt1"></div>
         </div>
         <div class="form-group">
           <label for="pas_channelsabt1" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_channelsabt1" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_channelsabt1" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_channelsabt1" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="sabt_channel_1()" >ثبت</button>
         </div>
       </form>
      </div>
      <div class="channel_ghanon_log channel_ghanon_society_log3">
        <div class="dashTitrCh">
          قوانین و مقررات شبکه ها
        </div>
        <div class="dashLBodyCh">
          <div class="ghanonCh society_cha3">
          	<ul class="ghanonChUl society_ul_cha">
              	<li>تمام فعالیت فروشگاه منطبق با قوانین کشور می باشد .</li>
                  <li>مدیران محترم کانالها و گروهها مکلفند که نحوه تعامل فروشگاه با کانالها و قوانین ومقررات کانالها
                  را به دقت مطالعه فرموده و  به آن عمل نمایند .</li>
                  <li>ثبت کانال به منزله مطالعه و قبول نحوه تعامل فروشگاه با کانال و قوانین و مقررات می باشد .</li>
                  <li>کانالها بطور جد باید از نمایش پستهای غیر مرتبط با فعالیت فروشگاه جهت  فریب اعضا بپرهزند . در صورت مشاهده برخورد خواهد شد .</li>
                  <li>کانالها باید از ثبت بازدید جعلی و استفاده از رباتها کاملا بپرهیزند <span class="kama">،</span> در صورت مشاهده عضویت آنها صلب خواهد شد و دیگر حق فعالیت نخواهند داشت <span class="kama">،</span> همچنین از تمامی
                  حقوق گذشته خود محروم و منافع آن به سود کانالها و گروها ضبط خواهد شد .
                  </li>
                  <li>کانالها مکلفند بطور مستمر  بستگی به تعداد اعضا ( ممبر ) بین بازه زمانی هفت روزه تا چهارده روزه
                  پست های تبلیغی خود را منتشر نمایند . بدیهیست که تبلیغ بیشتر باعث بازدید بیشتر و در نتیجه سوددهی بیشتر برای کانال و گروه خواهد شد . </li>
                 <li>تولید و درج پست تبلیغی بر عهده کانال و گروه می باشد .</li>
                 <li>همه مدیران کانالها و گروها برای عضویت در گروه فروشگاه در پیام رسان سروش دعوت خواهند شد . در گروه می توانند تبادل نظر داشته و
                 انتقادها <span class="kama">،</span> شکایات و پیشنهادهای خود را مطرح کنند.</li>

                 <li>
                 هرگونه انتشار محتوای غیر اخلاقی <span class="kama">،</span> توهین به مدیران کانالها <span class="kama">،</span> مدیریت فروشگاه و مخالف با قوانین و مقررات فروشگاه در گروه ممنوع می باشد .
                 در صورت مشاهده برخورد لازم خواهد شد .
                 </li>

                  <li>حق انتقاد <span class="kama">،</span> شکایت و پیشنهاد طرفین محفوظ است .</li>
                  <li>
                  جهت مطرح کردن شکایت <span class="kama">،</span> انتقاد و پیشنهاد می توان از راههای ارتباطی موجود در لینک " تماس با ما "
                  اقدام نمود.
                  همچنین پس از تشکیل شورا راههای ارتباطی با اعضا شورا منتشر خواهد شد .
                  </li>
                  <li>طرح دعوا در ابتدا توسط شورا که متشکل از 3 نفر از مدیران کانالها و دو نفر از مدیران فروشگاه می باشد <span class="kama">،</span> پیگیری
                  خواهد شد و در صورت عدم نتیجه گیری <span class="kama">،</span> به مراجع ذی صلاح ارجاع داده می شود .</li>
                  <li>تعیین سه مدیر کانالها جهت تشکیل شورا <span class="kama">،</span> توسط مدیران کانالها انتخاب و معرفی می گردد <span class="kama">،</span> فروشگاه هیچ دخالتی در این موضوع ندارد .</li>
              	<li>
                  شورا زمانی تشکیل خواهد شد که حداقل 30 کانال و یا گروه در فروشگاه ثبت شده باشد و مجموع اعضا ( ممبر ) کانالها و گروهها بیشتر از 5000 نفر باشد.
                  </li>
                  <li>
                  ممکن است قوانین و مقررات بسته به شرایط کاری و سیاستهای مدیریت فروشگاه تغییر نماید .  هر گونه تغییر به اطلاع مدیران کانالها خواهد رسید .
                  </li>
              </ul>
              <br>
              با سپاس
              <br>
              فروشگاه اینترنتی فاتک <a href="www.fatak.ir">www.fatak.ir</a>
          </div>
        </div>
      </div>
      <div class="channel_society_log channel_ghanon_society_log3">
        <div class="dashTitrCh">
          نحوه عملکرد و شراکت فروشگاه
        </div>
        <div class="dashLBodyCh">
          <div class="society_ch">
            <span class="span_society1">عبادت ده جزء دارد که نه جزء آن کسب در آمد حلال است . رسول اکرم(ص)</span>
              <br class="br">
              <p class="p_societyCh1">
                در این صفحه  نحوه کار و شراکت فروشگاه با مدیران محترم کانالها و گروهها بطور
                  کامل شرح داده شده است <span class="kama">،</span> لازم است با دقت کامل مطالب را مطالعه فرمایید تا بخوبی توجیه شده و با روند کار
                  آشنا شوید .
              </p>
               <p class="p_societyCh1">
                 اندیشه و هدف مدیریت فروشگاه در رابطه تعامل با مدیریت کانالها و گروهها <span class="kama">،</span> تامین منافع مشترک
                 و ایجاد یک رابطه پایدار برد - برد می باشد . در ادامه با طرح پرسش و پاسخ به این مهم پرداخته می شود.
               </p>
               <p class="p_societyCh1">
                 لازم است که مدیران محترم آگاهی کامل از نحوه فعالیت و ارائه خدمات فروشگاه کسب نمایند .
                  لذا شرح مختصری ارائه می گردد <span class="kama">:</span>
               </p>
              <p>
                فروشگاه فاتک در واقع نقش واسط بین مشتری و بازار در تمام جغرافیای کشور را بعهده
                دارد <span class="kama">،</span> و در هر زمینه ای و به هر میزان طبق قوانین کشور در صدد تامین محصول و کالای مشتریان برخواهد آمد.
                بخش بزرگی از ابزارها و زیر ساختهای نرم افزاری و مدیریتی لازم جهت تحقق
                اهداف فراهم شده است . تنها کافی است که مشتریان به آسانی سفارشات خود را در سایت ثبت نمایند.
                جهت آشنایی بیشتر به بخش " درباره ما " مراجعه فرمایید .
              </p>
                <br>
                <span class="span_society2">در این میان نقش کانالها و گروهها چیست و چگونه باید فعالیت نمایند ؟</span>
                <p class="p_societyCh2">
                  مدیران کانالها و گروهها تنها بایستی جهت معرفی خدمات و فعالیت فروشگاه پستهای مرتبط و جذاب در کانال و یا گروه خود منتشر نمایند <span class="kama">،</span>
                  واعضای کانال را با روشهای خلاقانه و منطقی تشویق به بازدید سایت و ارائه سفارش نیازهای خود نمایند .
                  در واقع کانالها و گروها تبلیغ فروشگاه را بر عهده دارند <span class="kama">،</span> و راهکاری جهت رفع نیازهای
                  اعضای خود را ارائه می کنند . مخصوصا کانالها و گروه هایی که بطور تخصصی در یک حوزه فعالیت دارند .
                </p>
                <br>
                <span class="span_society2">
                منافع و درآمدزایی کانالها و گروهها چگونه تامین می شود ؟
                </span>
                <p>
                  نکته جذاب ماجرا این است که مدیران کانالها و گروها عملا صاحب بخشی از فروشگاه می شوند.
                  به نحوی که بسته به درآمد فروشگاه در یک بازه زمانی مشخص (در حال حاضر 6 ماهه) 5 درصد به بالا
                  از سود نهایی فروشگاه را شامل می شود .
                </p>
                <span class="span_society2">
                چگونه درصد سود کانالها محاسبه می شود؟
                </span>
                <p>
                  برای تعیین درصد سود کانالها و گروهها از دو فاکتور استفاده می شود ; فاکتور اول سود حداقلی در نظر گرفته
                  شده برای فروشگاه می باشد (بستگی به منابع پولی و مدیریتی مصرف شده دارد) و دیگری سود حداکثری
                  در نظر گرفته شده برای کل کانالها و گروهها .
                </p>
                <p>
                  سود حداکثری برای کانالها اینگونه محاسبه می شود <span class="kama">،</span> فروشگاه یک ارزش حداکثری برای " یک " بازدید اعضا کانالها در نظر گرفته که در حال حاضر برای یک دوره 6 ماهه
                  <span class="span_society_num"> 10000 تومان </span> می باشد . برای محاسبه حداکثر سود کانالها کافیست که تعداد بازدید کل کانالها را در حداکثر ارزش یک بازدید ضرب کنیم .
                </p>
                 <br />
                 <p>سوددهی فروشگاه سه حالت دارد :</p>
                 <p>
                   <span class="span_society3">1- درآمد کل فروشگاه کمتر از سود حداقلی در نظر گرفته برای فروشگاه می باشد .</span>
                   <br>
                   در این صورت فروشگاه 5 درصد سود کل را برای کانالها در نظر می گیرد .
                 </p>
                   <p>
                     <span class="span_society3"> 2- درآمد فروشگاه بیشتر از سود حداقلی فروشگاه ولی کمتر از مجموع سود حداقلی فروشگاه و سود حداکثری کانالها می باشد :</span>
                   <br>
                   در این صورت کسر سود کل فروشگاه و سود حداقلی فروشگاه متعلق به کانالها می باشد <span class="kama">،</span> چنانچه مبلغ باقی مانده کمتر از 5 درصد کل سود فروشگاه باشد <span class="kama">،</span> فروشگاه 5 درصد از کل سود را
                   به کانالها و گروهها اختصاص می دهد .
                   </p>
                   <p>
                   <span class="span_society3">3- سود فروشگاه بیشتر از مجموع سود حداقلی فروشگاه و سود حداکثری کانالها می باشد :</span>
                   <br>
                   در این صورت  سود حداکثری کانالها به کانالها و گروهها اختصاص می یابد. یعنی حاصل ضرب تعداد بازدید کانالها و ارزش حداکثری یک بازدید .
                 </p>
                 <span class="span_society2">
                  سود هر کانال چگونه محاسبه می شود؟
                </span>
                <p>
                  پس از تعیین و مشخص شدن مبلغ تخصیص یافته به کانالها که طبق فرمولهای ذکر شده در بندهای بالا محاسبه می شود.
                  کافیست این مبلغ را تقسیم به کل بازدیدها نماییم تا ارزش یک بازدید مشخص شود . برای تعیین سود هر کانال تعداد بازدیدهای کانال مورد
                  نظر در ارزش بدست آمده یک بازدید ضرب می کنیم . اینگونه درآمد هر کانال مشخص می شود.
                </p>
                  <span class="span_society2">
                 چگونه تعداد بازدید ها را محاسبه می کنید؟
                 </span>
                 <p>
                   برای تعیین تعداد بازدیدها و ثبت آن مکانیزمهای لازم توسط تیم برنامه نویسی آماده شده است .
                   تعداد کل بازدید ها و همچنین تعداد بازدید هر کانال در پنل کاربری مدیر کانال قابل مشاهده می باشد <span class="kama">،</span> پس از ثبت کانال
                   <span class="kama">،</span> مدیر کانال می تواند وارد پنل خود شود .
                   <br>
                   برای ثبت بازدید هر کانال  همراه لینک فروشگاه که در کانال نمایش داده می شود<span class="kama">،</span> یک کد نیز ارسال می شود توسط این کد
                   مشخص می شود که این بازدید از سایت توسط اعضا کدام کانال و یا گروه انجام شده است<span class="kama">،</span>
                   دریافت کد پس از ثبت کانال ارائه می شود . لازم به ذکر است تنها عامل شناسایی یک کانال همین کد می باشد .
                 </p>
                  <span class="span_society2">
                 آیا از لحاظ امنیتی و تخلف احتمالی کانالها و یا اعضا کانالها تدابیری اندیشه شده؟
                 </span>
                  <p>
                    توسط تیم برنامه نویسی تدابیر لازم جهت جلوگیری از تخلفات و همچنین رباتها انجام پذیرفته که مرتبا به روز رسانی می شود .
                    <br>
                    لازم به ذکر است اگر یکی از اعضا کانال در طی 72 ساعت چندین بار از طرق لینک موجود در کانال
                    از فروشگاه بازدید نماید تنها یک بازدید به ازای بازدیدهایش برای کانال محاسبه می شود.
                    <br>
                    فروشگاه بطور جد برای احقاق حق مدیران کانالها تلاش می کند . و با متخلفین برخورد لازم انجام می گیرد.
                    <br> برای احقاق حق کانالها روشهای متعددی جهت شناسایی یک بازدید واقعی به کار گرفته می شود <span class="kama">،</span> از جمله
                     وجود رابطه معقول بین تعداد اعضا ( ممبر ) کانال و تعداد بازدیدهای ثبت شده کانال می باشد .
                  </p>
                  <span class="span_society2">
                  مبلغ سود کانالها چه موقع پرداخت می شود؟
                </span>
                <p>
                  مدیریت فروشگاه پرداخت ماهیانه وجوه را در دستور کار خود دارد البته اگر این مبلغ قابل توجهه باشد.
                  به علت نوپا بودن فروشگاه طبیعتا در شش ماه و یا یک سال اول فعالیت سود کمتری کسب می کند <span class="kama">،</span>
                  لذا ممکن است پرداخت سودها بطور ماهیانه انجام نگیرد . اما به محض رسیدن به جایگاه مناسب
                  از لحاظ در آمد زایی بطور منظم و ماهیانه سودها پرداخت خواهد شد .
                  <br>
                  اطلاعات بانکی مورد نیاز جهت پرداخت سودها در هنگام ثبت کانال دریافت خواهد شد.
                  <br>
                  لازم به ذکر است کانالهایی که در شش ماهه نخست فعالیت فروشگاه به ما بیوندند از امکانات  و
                  جوایز ویژه ای برخورد خواهند شد <span class="kama">،</span> مانند تخصیص سود بیشتر <span class="kama">،</span>  فرصت سرمایه گذاری در فروشگاه و
                  عضویت در هیئت مدیره فروشگاه و ...
                </p>
                <span class="span_society2">
                  آیا راه دیگری برای کسب در آمد کانالها و گروها از فروشگاه پیش بینی شده است ؟
                </span>
                <p>
                  آنچه که بطور موثرتری باعث درآمد کانالها می شود <span class="kama">،</span> وپس از رسیدن به جایگاه مناسب توسط مدیریت فروشگاه
                  با جدیت بیشتری پیگیری خواهد شد <span class="kama">،</span>
                  مربوط به این قسمت از کار می باشد <span class="kama">،</span> همانطور که ذکر شد پس از ثبت کانال یک کد در اختیار
                  مدیر کانال قرار خواهد گرفت <span class="kama">،</span> چنانچه یکی از اعضای کانال در فروشگاه ثبت سفارش کند و هنگام درج اطلاعات
                  در قسمت مربوطه این کد را درج کند <span class="kama">،</span>
                  درصدی از سود آن سفارش به مدیر کانال تعلق خواهد گرفت <span class="kama">،</span>
                  در حال حاضر ده درصد در نظر گرفته شده است .
                  <br>
                  این نوع کسب در آمد برای همه کانالها و بلاخص برای کانالهایی که در یک موضوع خاص فعالیت می کنند
                  بسیار مناسب می باشد .
                  <br>
                  کافسیت که اعضا را متقاعد کنند که  کالاها و محصولات مورد نیاز خود را از فروشگاه
                  تهیه نمایند<span class="kama">،</span> و کد مربوطه را درج نمایند . با توجه به سیاست کاری فروشگاه اعضا می توانند بدون محدودیت هر کالایی را سفارش دهند .
                  <br>
                  راه جذاب دیگری نیز برای درآمد کانالها در نظر گرفته شده که از راهکارهای راهبردی
                  فروشگاه محسوب می شود . مدیران کانالها می توانند در خور توان خود کالاهای سفارشی مشتریان را تامین نمایند <span class="kama">،</span>
                  به این ترتیب برای عرضه محصولات خود بازاری به بزرگی کشور عزیزمان در اختیار خواهند داشت.
                  جهت همکاری در این زمینه لازم است در قسمت مدیریت فروشگاهها ثبت نام کنند.
                </p>
                <span class="span_society2">
                  راستی آزمایی فعالیت فروشگاه و نحوه صحت عملکرد فروشگاه به چه صورت انجام میگیرد؟
                </span>
                <p>
                  همانگونه که در ابتدای صفحه ذکر شده <span class="kama">،</span> راهکار مدیریت فروشگاه  کسب درآمد حلال و  رسیدن به
                  یک رابطه پایدار برد - برد می باشد <span class="kama">،</span> بزرگترین عامل صحت عمل ما وجدان کاری ما می باشد . مدیریت به شدت معتقد است
                  موثرترین عامل جهت ماندن در کورس رقابت در این بازار رو به رشد اینترنت مبنا صداقت و تامین منافع عادلانه
                  شرکا و ارائه خدمات بی نقص به مشتریان می باشد . در غیر این صورت چیزی جز شکست نصیب شرکتها نخواهد شد<span class="kama">،</span>
                  شاید بتوان از راهی بجز صداقت در عمل به یک درآمدی دست یافت <span class="kama">،</span> اما درآمدی زودگذر می باشد . ضامن رشد شرکت ورسیدن
                  به جایگاه مناسب تنها با رعایت و عمل به تعهدات بدست می آید.
                  <br>
                  ولی برای اعتماد سازی لازم فروشگاه تمهیداتی اندیشیده است از جمله آنکه در پنل مدیریتی اطلاعات لازم
                  در اختیار مدیران قرار می گیرد <span class="kama">،</span> همچنین برای بررسی صحت این اطلاعات و رسیدگی به انتقادات و شکایت
                  <span class="kama">،</span> فروشگاه در نظر دارد یک شورای 5 نفره متشکل از سه نفر از مدیران منتخب کانالها و دونفر از مدیران شرکت <span class="kama">،</span>
                  تشکیل نماید . اعضای این شورا دسترسی کامل به اسناد و همچنین قسمت مدیریتی سایت را خواهند
                  داشت. و می توانند بطور حضوری در ساختمان ادرای و کارگاه فروشگاه از روند کار دیدن نمایند و اطلاعات لازم را کسب کنند.
                  <br>
                  لازم به ذکر است اعضای شورا چنانچه حضوری مراجعه فرمایند در حضور مدیر فروشگاه می توانند  به اطلاعات
                  دیتابیس هاست سایت نیز دسترسی داشته باشند .
                   <br>
                   تعیین مدیران کانالها جهت عضویت در  شورا توسط مدیران کانالها انتخاب و معرفی می گردد .
                   <br>
                   لازم به ذکر است برای تشکیل شورا باید حداقل 30 کانال در فروشگاه ثبت شده باشد و مجموع اعضا
                   (ممبر) باید بیشتر از 5000 نفر باشند <span class="kama">،</span> تعداد کانالهای عضو شده و نام و لینک آنها در پنل مدیر کانال قابل مشاهده می باشد .
                </p>
                  <span class="span_society2">
                  چه کانال و گروههای می توانند ثبت نام کنند ؟
                </span>
                <p>
                  در حال حاضر تمام کانالها و گروهها از هر پیام رسانی  و با هر تعداد عضو
                  می توانند ثبت نام کنند و به فعالیت بپردازند .
                  <br>
                  لازم به ذکر است که ثبت کانال از تاریخ ثبت به مدت 6 ماه معتبر می باشد . پس از گذشت 6 ماه
                  جهت ادامه فعالیت نیاز به تایید شورا و  مدیریت فروشگاه دارد.
                  همچنین قبول قوانین جدیدی که وضع خواهد شد. در قسمت مربوط به قوانین ومقررات کانالها بطور مفصل قوانین شرح داده شده است .
                </p>
                <p>با سپاس ;</p>
                <p>جهت کسب درآمد از کانال و گروهتان به ما بپیوندید.</p>
                <p>  فروشکاه مجازی فاتک <a href="www.fatak.ir">www.fatak.ir</a></p>
          </div>
        </div>
      </div>
    </div>
    {{-- لوگوهای شبکه اجتماعی --}}
    <div class="channel_logo_log">
      <span>
        <span>
          <img src="img_site/sorush-farsgraphic.png" alt="" >
          <img src="img_site/instagram-farsgraphic.png" alt="" >
          <img src="img_site/whatsapp.png" alt="" >
          <img src="img_site/telegram-farsgraphic.png" alt="" >
          <img src="img_site/google_fatak.png" alt="" >
          <img src="img_site/bisphone-farsgraphic.png" alt="" >
          <img src="img_site/Bale-Logo-LimooGraphic.png" alt="" >
        </span>
        <span></span>
      </span>
    </div>
    {{-- دیدگاهای مدیران --}}
    <div class="channel_did_log">
      <span class="channel_did_log1"></span>
      <span class="channel_did_log2">دیدگاه مدیران</span>
    </div>
    {{-- modals --}}
    <!-- Modal موفق بودن ثبت ابتدایی کانال-->
    <div class="modal fade" id="end_channelsabt1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body modal_ok">
            <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
            <div class="modal_ok2">تبریک !! ثبت اولیه شما انجام شد . جهت مشاهده پنل کاربری خود از فرم ورود استفاده کنید .</div>
          </div>
          <div class=" modal_ok3">
            <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
          </div>
        </div>
      </div>
    </div><!--end modal پایان موفقیت ثبت .-->
    <!-- Modal موفق بودن لاگین-->
    <div class="modal fade" id="end_channellog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body modal_ok">
            <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
            <div class="modal_ok2">خوش آمدید .</div>
          </div>
          <div class=" modal_ok3">
            <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
          </div>
        </div>
      </div>
    </div><!--end modal پایان لاگین .-->
@endsection
