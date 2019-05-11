@extends('shop.layoutShop')
@section('title')
  ورود-ثبت نام
@endsection
@section('content')
  <div class="shop_log">
    <div class="shop_log1">تامین کننده</div>
    <div class="shop_log2">با ما باشید</div>
    <div class="shop_log3"><a href="www.fatak.ir">fatak.ir</a></div>
  </div>
  <ul class="ul_line shop_log_ul">
    <a href="/"><li>صفحه اصلی</li></a>
    <li onclick="show_form_shop_log('shop_society_log')">نحوه همکاری با ما بعنوان فروشنده</li>
    <li onclick="show_form_shop_log('shop_ghanon_log')">قوانین و مقررات</li>
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
        <li class="modal_hide" onclick="show_form_shop_log('shop_society_log');hide_menu_small('chanelMeLog_scroll')"><span><i class="fas fa-handshake"></i> نحوه همکاری با ما بعنوان فروشنده</span> </li>
        <li class="modal_hide" onclick="show_form_shop_log('shop_ghanon_log');hide_menu_small('chanelMeLog_scroll')"><span><i class="fas fa-balance-scale"></i> قوانین و مقررات</span> </li>
        <li class="modal_hide" onclick="modal_sub_show() ;hide_menu_small('chanelMeLog_scroll'); $('#modal_ghanon').modal('show')"><span><i class="fas fa-compass"></i> راهنما</span> </li>
      </ul>
    </div>
    {{-- //دکمه های ورود و ثبت نام --}}
    <div class="shop_btn_log">
      <div class="shop_btn_log1"><button type="button" class="btn" name="button" onclick="show_form_shop_log('shop_log_log');captcha()">ورود</button></div>
      <div class="shop_btn_log2"><button type="button" class="btn" name="button" onclick="show_form_shop_log('shop_sabt_log');captcha()">ثبت نام</button></div>
    </div>
    {{-- فرمهای ورود و ثبت نام --}}
    <div class="shop_sabt_log_log">
      <div class="shop_log_log shop_sabt_log_log2">
        <form class="form form_shoplog" id="form_shoplog" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ورود به پنل</div>
         <div id="ajax_shoplog"></div>
         {{ csrf_field() }}

         <div class="form-group">
           <label for="mobail_shoplog" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_shoplog"></div>
         </div>
         <div class="form-group">
           <label for="pas_shoplog" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_shoplog" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_shoplog" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_shoplog" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="loginShop()" >ثبت</button>
         </div>
       </form>
      </div>

      <div class="shop_sabt_log shop_sabt_log_log2">
        <form class="form form_shopsabt1" id="form_shopsabt1" action="" method="post">
         <div class="form_titr"><i class="fas fa-info-circle"></i>ثبت تامین کننده</div>
         <div id="ajax_shopsabt1"></div>
         {{ csrf_field() }}
         <div class="form-group">
           <label for="seller_shopsabt1" class="control-label pull-right  "><i class="fas fa-user-tie i_form"></i> نام و نام خانوادگی </label>
           <div class="div_form"><input type="text" class="form-control" id="seller_shopsabt1" placeholder="به فارسی ..." ></div>
         </div>
         <div class="form-group">
           <label for="mobail_shopsabt1" class="control-label pull-right "><i class="fas fa-mobile-alt i_form"></i> موبایل</label>
           <div class="div_form"><input type="text" class="form-control" id="mobail_shopsabt1"></div>
         </div>
         <div class="form-group">
           <label for="pas_shopsabt1" class="control-label pull-right  "><i class="fas fa-key i_form"></i> رمز عبور </label>
           <div class="div_form"><input type="text" class="form-control" id="pas_shopsabt1" placeholder="به لاتین ..."></div>
         </div>
         <div class="form-group" >
           <label for="amniat_shopsabt1" class="control-label pull-right "><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
           <div class="div_form"><input type="text" class="form-control tel" id="amniat_shopsabt1" onblur="changeAdadFaToEn('amniat_pro_nazar')"></div>
         </div>
         <div class="captcha_form">
           <span class="captcha4">{!! captcha_img() !!}</span>
           <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
         </div>
         <div class="form-group form_btn">

           <button type="button" class="btn btn-success" onclick="sabtShop_1()" >ثبت</button>
         </div>
       </form>
      </div>
      <div class="shop_ghanon_log shop_ghanon_society_log3">
        <div class="dashTitrCh">
          قوانین و مقررات فروشندگان
        </div>
        <div class="dashLBodyCh">
          <div class="ghanonCh society_cha3">
          	<ul class="ghanonChUl society_ul_cha">

        	<li>تمام فعالیت <a href="www.fatak.ir/index.php?st=ghanon">بازارچه آنلاین فاتک</a> منطبق با قوانین کشور می باشد .</li>
            <li>فروشندهای محترم مکلفند که نحوه تعامل بازارچه با فروشندگان
            را به دقت مطالعه فرموده و  به آن عمل نمایند .</li>
            <li>
  ثبت عضویت به عنوان فروشنده در بازارچه به منزله مطالعه و قبول نحوه شراکت و تعامل بازارچه با فروشندگان و همچنین قبول قوانین و مقرارات مربوط به فروشندگان می باشد .
            </li>
            <li>
            بازارچه در قبول و یا رد عضویت فروشندگان مختار می باشد .
            </li>
            <li>
      هر گونه گران فروشی و ایجاد هزینه اضافی برای خریداران ممنوع می باشد . در صورت اثبات این موضوع تبعات آن متوجه فروشنده می باشد .
             </li>
            <li>
            حق شکایت <span class="kama">،</span> انتقاد و پیشنهاد برای طرفین محفوظ می باشد .
             </li>
           <li>
           سهم بازارچه از هر فروش موفق ؛ 2 درصد از کل مبلغی که بین خریدار <span class="kama">،</span> بازارچه و فروشنده رد و بدل می شود <span class="kama">،</span> می باشد.
           منظور از کل مبلغ عبارت است از مجموع مبلغ کالا <span class="kama">،</span> هزینه پست کالا <span class="kama">،</span> هزینه بسته بندی و غیرو  .
           </li>
           <li>
            بازارچه مکلف است تمام مجوزهای لازم جهت فعالیت را کسب نماید. مانند نماد اعتماد الکترونیک و نماد ساماندهی وب سایتها .</li>

           <li>
          حداقل سن فروشندگان 16 سال می باشد . فروشنده باید تابعیت ایرانی داشته و منع داد و ستد نیز نداشته باشد .
           </li>

            <li>
           فروشنده باید صلاحیت فروش کالایی را که عرضه می کند را داشته باشد و در صورت لزوم مجوز فروش کالا را دارا باشد .
            </li>
            <li>
           فروشندگان تنها باید کالاهایی را که می توانند تهیه و ارسال نمایند را ثبت نمایند . چنانچه فروشنده کالایی را ثبت نموده و خریدار آن کالا را خریداری نماید اما فروشنده قادر به تهیه و ارسال کالا نباشد به ازای هر کالا 20000 هزارتومان جریمه می شود .
             </li>
            <li>طبق قانون حمایت از مصرف کنندگان عودت کالا حق خریدار می باشد . خریداران پس از تحویل کالا حدکثر 24 ساعت فرصت دارند کالای خریداری شده خود را به فروشنده عودت نمایند <span class="kama">،</span> فروشندگان موظف به پذیرش عودت کالا می باشند .
            چنانچه خریدار از کالا استفاده نموده باشد و یا اینکه کالای خریداری شده را معیوب نموده باشد و همچنین باعث تخریب بسته بندی کارخانه سازنده کالا شده باشد حق عودت کالا را ندارد . <br />
 چنانچه محصول خریداری شده هیچ مشکلی نداشته باشد و تنها دلیل عودت کالا توسط خریدار <span class="kama">،</span> انصراف از خرید باشد هزینه ارسال و عودت کالا بعهده خریدار می باشد .
            </li>
            <li>
           چنانچه کالای خریداری شده معیوب باشد و یا اینکه مغایرت با کالای سفارش داده شده <span class="kama">،</span> داشته باشد و یا اینکه اوصاف ذکر شده از طرف فروشنده را نداشته باشد <span class="kama">،</span> خریدار می تواند ظرف مدت سه روز از تحویل کالا <span class="kama">،</span> کالا را عودت نماید . در چنین شرایطی هزینه ارسال و عودت کالا بعهده فروشنده می باشد .
            </li>
        	<li>
            مرجع رسیدگی به عودت کالا <span class="kama">،</span> کارشناس عودت کالا در بازارچه می باشد . و تعیین صلاحیت عودت و یا عدم عودت کالا بعهده ایشان می باشد .
            </li>
            <li>
            ممکن است قوانین و مقررات بسته به شرایط کاری و سیاستهای مدیریت بازارچه تغییر نماید .  هر گونه تغییر به اطلاع فروشندگان خواهد رسید .
            </li>
        </ul>
              <br>
              با سپاس
              <br>
              فروشگاه اینترنتی فاتک <a href="www.fatak.ir">www.fatak.ir</a>
          </div>
        </div>
      </div>
      <div class="shop_society_log shop_ghanon_society_log3">
        <div class="dashTitrCh">
          نحوه عملکرد و شراکت فروشگاه
        </div>
        <div class="dashLBodyCh">
          <div class="society_ch">
            <span class="span_society1">عبادت ده جزء دارد که نه جزء آن کسب در آمد حلال است . رسول اکرم(ص)</span>
              <br class="br">
              <br class="br">
   		 در این صفحه  نحوه کار و شراکت بازارچه با فروشندگان و تامین کنندگان محترم بطور
         کامل شرح داده شده است <span class="kama">،</span> لازم است با دقت کامل مطالب را مطالعه فرمایید تا بخوبی توجیه شده و با روند کار
         آشنا شوید .
         <br>
         اندیشه و هدف مدیریت بازارچه در رابطه با شراکت و تعامل با فروشندگان و تامین کنندگان <span class="kama">،</span> تامین منافع مشترک
         و ایجاد یک رابطه پایدار برد - برد می باشد .
         <br class="br">
         لازم است که فروشندگان محترم آگاهی کامل از نحوه فعالیت و ارائه خدمات بازارچه کسب نمایند .
          لذا شرح مختصری ارائه می گردد ;
          <br class="br">
          فروشگاه فاتک در واقع نقش واسط بین مشتری و بازار و معرفی فروشندگان و تامین کنندگان و همچنین بازار یابی و جلب نظر خریداران را در تمام جغرافیای کشور  بعهده
          دارد <span class="kama">،</span> و در هر زمینه ای و به هر میزان طبق قوانین کشور در صدد تامین محصول و کالای مشتریان برخواهد آمد.
          بخش اعظم از ابزارها و زیر ساختهای نرم افزاری و مدیریتی لازم جهت تحقق
          اهداف فراهم شده است . و همواره سعی در ارتقاء و نوآوری امکانات جهت ارائه خدمات بهتر در دستور کار مدیریت و مجموعه های بازارچه فاتک می باشد     .
          <br />
          نحوه کار بازارچه خلاقانه و به صورت زیر انجام می گیرد :
          <br />
           از ابتدا بازارچه محصولی را برای فروش ارائه نمی نماید بلکه این مشتریان و خریداران هستند که کالایی را که بازارچه باید ارائه دهد را مشخص می کنند <span class="kama">،</span> خریداران اطلاعات کالای مورد نیاز خود را در
           فرم مربوطه وارد می نمایند <span class="kama">،</span> بلافاصله اطلاعات محصول ثبت شده در پنل کاربری فروشندگان جهت اطلاع
           فروشنده ارسال می شود . و فروشندگانی که می توانند محصول  مورد نیاز خریدار و یا مشابه آن محصول را تامین کنند
           فرم ثبت کالا را تکمیل می نمایند <span class="kama">،</span> اطلاعات ثبت شده به صورت آنی برای خریدار ارسال
           می گردد <span class="kama">،</span> خریدار بنا به سلیقه خود و با توجه به قیمت و اطلاعات وارد شده توسط فروشندگان
           یکی از کالاهای عرضه شده را انتخاب نموده و فرآیند خرید را طی می نماید .
           <br />
           به غیر از روش بالا <span class="kama">،</span> روشهای دیگری جهت عرضه محصولات شما در دستور کار می باشد که به محض فراهم شدن زیر ساختهای لازم
           به اطلاع فروشندگان محترم می رسد <span class="kama">،</span> مخصوصا فروشندگانی که توسط پیام رسانها محصولات خود را می فروشند <span class="kama">،</span> می توانند به راحتی جهت اطمینان بخشیدن
           به خریداران خود از امکاناتی که در آینده نزدیک ارائه خواهد شد استفاده نمایند .
           <br />
           در ادامه با طرح پرسش و پاسخ بیشتر با نحوه کار آشنا می شوید :

          <br class="br">
          <span class="span_rabete2">اخذ مبلغ کالا از خریداران چگونه انجام می گیرد ؟</span>
          <br>
          مشتری پس از انتخاب یکی از کالاهای ارائه شده توسط فروشندگان به طور خودکار به صفحه سبد خرید
          هدایت می شود <span class="kama">،</span> در آنجا باید اطلاعات مورد نیاز <span class="kama">،</span> از قبیل آدرس و کد پستی را ثبت نماید . پس از ثبت
          اطلاعات به طور خودکار به صفحه درگاه بانکی هدایت می شود و به صورت آنلاین
          مبلغ کالا را پرداخت می نماید <span class="kama">،</span> این مبلغ به صورت امانی نزد بازارچه باقی می ماند <span class="kama">،</span> پس از ارسال کالا توسط فروشنده و تحویل گرفتن
          و رضایت مندی خریدار از کالا <span class="kama">،</span> مبلغ مورد نظر به حساب فروشندگان محترم واریز خواهد شد .
          <br class="br">
          <span class="span_rabete2">
          چرا ما باید به عنوان فروشنده عضو بازارچه شویم ؟ منافع ما از این کار چیست؟
          </span>
          <br>
          شما با عضویت در بازارچه به یک بازار بسیار بزرگتری به پهنای کشور عزیزمان دست خواهید داشت و
          سهمی از بازار رو به رشد خرید اینترنتی را نصیب خود خواهید کرد و عملا وارد این بازار خواهید شد
          . در واقع شما با عضو شدن در بازارچه درهای فروشگاه خود را بر روی خریداران اینترنتی باز خواهید کرد
          . با ورود به  <a href="www.fatak.ir/index.php?st=rabete">بازارچه آنلاین فاتک</a> دربهای فروشگاه شما بطور مداوم و در بیست وچهار ساعت <span class="kama">،</span> همچنین روزهای تعطیل نیز باز می باشد
          .

          <br class="br"/>
          <span class="span_rabete2">
          شما  چگونه به سود و منافع خود دسترسی خواهید داشت؟ هزینه عضویت ما در بازارچه چقدر و چگونه محاسبه می شود ؟
          </span>
          <br />
          بازارچه آنلاین فاتک زیر ساختها و هزینه های لازم جهت ایجاد یک بستر مناسب برای داد و ستد اینترنتی  را برعهده دارد که نیاز به منابع
          مالی و انسانی بالایی می باشد . بازارچه با در نظر گرفتن این هزینه ها و حداقل سود برای خود <span class="kama">،</span>  به ازای فروش موفقت آمیز هر کالا توسط فروشندگان تنها
            <span class="span_rabete_num"> 2 درصد </span> از مجموع مبلغ کالا و هزینه پست محصول را از فروشنده اخذ می نماید .
            <br />
            چنانچه فروشنده برای ارسال کالای خود از روش دیگری بجز اداره پست استفاده نماید و در مورد نحوه ارسال کالا با خریدار به توافق برسد
            دیگر لازم نیست 2 درصد از هزینه پست کالا را به بازارچه پرداخت کند.
            <br  />
            در واقع فروشگاه 2 درصد از مبلغ رد و بدل شده بین خریدار <span class="kama">،</span> بازارچه و فروشنده را به عنوان سهم خود اخذ می نماید .
         	<br />
            شایان ذکر است محاسبه سهم بازارچه به روش بالا منحصر به زمان حال می باشد <span class="kama">،</span> ممکن است با تغییر سیاستهای مدیریت بازارچه
            آنلاین  فاتک و بازخورد بازار روش محاسبه سهم بازارچه نیز تغییر کند . در چنین صورتی <span class="kama">،</span> تغییرات سریعا به اطلاع فروشندگان محترم خواهد رسید .
          <br class="br">
          <span class="span_rabete2">
          	مبلغ کالای فروخته شده چه موقع به حساب فروشنده واریز می شود؟
          </span>
          <br>
			از زمان ارسال کالا توسط فروشنده حداکثر ده روز بعد مبلغ مورد نظر که شامل مبلغ کالا <span class="kama">،</span> هزینه پست و بسته بندی می باشد به حساب فروشنده واریز خواهد شد .
            <br />
            البته پرداخت وجه منوط به تحویل کالا به خریدار و رضایت مندی کامل از  خرید خود می باشد .
          <br class="br">
          <span class="span_rabete2">
          آیا امکان عودت کالا توسط مشتری وجود دارد؟ تحت چه شرایطی خریدار می تواند محصول خریداری شده را عودت دهد ؟
          </span>
          <br>
طبق ماده 2 قانون حمایت از مصرف کنندگان <span class="kama">،</span> هر خریداری می تواند کالا ی خریداری شده را به فروشنده برگرداند . البته خریدار تنها در یک محدوده زمانی مشخص و یک دلیل قانع کننده می تواند جنس خود را عودت نماید .
شرایط عودت کالا در بازارچه آنلاین به قرار زیر می باشد :
<br />
1 : علت برگشت هر کالایی از طرف خریدار توسط کارشناس ارجاع کالا مورد بررسی قرار خواهد گرفت .
 <br />
 2 : مغایرت کالا با آنچه خریدار سفارش داده است . در چنین شرایطی فروشنده باید هزینه ارسال و عودت کالا را پرداخت نمایید .
<br />
3 : کالای خریداری شده اوصاف ذکر شده از طرف فروشنده را ندارد<span class="kama">،</span> در چنین شرایطی فروشنده باید هزینه ارسال و عودت کالا را پرداخت نماید .
ماده 410 قانون مدنی در این خصوص می گوید ؛ هرگاه کسی کالای مورد معامله را ندیده و آن را فقط بابیان اوصاف توسط فروشنده خریده و بعد از دیدن بفهمد جنس مورد معامله دارای اوصاف ذکر شده نیست <span class="kama">،</span> می تواند معامله را فسخ نماید .
<br />
3 : جنس مورد معامله هنگام ارسال کالا توسط اداره پست و یا کسی که رساندن کالا به دست خریدار را بعهده گرفته <span class="kama">،</span> معیوب شده باشد . در چنین شرایطی خسارات کالا و هزینه ارسال بعهده شرکت پست و یا کسی که عهده دار رساندن کالا بوده <span class="kama">،</span> می باشد .
<br  />
4 : چنانچه کالای خریداری شده معیوب باشد و کسی هم باعث عیب کالا نشده باشد <span class="kama">،</span> یعنی کالا از ابتدا معیوب بوده باشد . در چنین شرایطی هزینه ارسال و عودت کالا بر عهده فروشنده می باشد .
 <br />
 5 : جنانچه محصول هیچ عیب و ایرادی نداشته باشد ولی خریدار از خرید کالا منصرف شده باشد <span class="kama">،</span> تنها ظرف مدت 24 ساعت پس از تحویل کالا می تواند کالا را عودت دهد
 . زمانی خریدار می تواند کالا را عودت نماید که به هیچ وجه از کالا استفاده ننموده باشد <span class="kama">،</span> کالا را معیوب ننموده باشد <span class="kama">،</span> کارتن و بسته بندی کارخانه سازنده کالا خراب و معیوب نشده باشد <span class="kama">،</span> در چنین شرایطی کلیه هزینه ارسال و عودت کالا بعهده خریدار می باشد .
 <br  />
  در صفحه قوانین مربوط به خریداران سایت مفصل تر در  مورد عودت کالا بحث شده است
    .
 <br />
          <span class="span_rabete2">
 چگونه ما بعنوان فروشنده به بازارچه اعتماد کنیم ؟
          </span>
          <br>
          همانگونه که در ابتدای صفحه ذکر شده <span class="kama">،</span> راهکار مدیریت بازارچه  کسب درآمد حلال و  رسیدن به
          یک رابطه پایدار برد - برد می باشد <span class="kama">،</span> بزرگترین عامل صحت عمل ما وجدان کاری ما می باشد . مدیریت به شدت معتقد است
          موثرترین عامل جهت ماندن در کورس رقابت در این بازار رو به رشد اینترنت مبنا صداقت و تامین منافع عادلانه
          شرکا و ارائه خدمات بی نقص به مشتریان می باشد . در غیر این صورت چیزی جز شکست نصیب شرکتها نخواهد شد<span class="kama">،</span>
          شاید بتوان از راهی بجز صداقت در عمل به یک درآمدی دست یافت <span class="kama">،</span> اما این نوع درآمد حرام <span class="kama">،</span> زودگذر و با تبعات بالا همراه می باشد . ضامن رشد شرکت ورسیدن
          به جایگاه مناسب تنها با رعایت و عمل به تعهدات بدست می آید.
          <br>
          ولی برای اعتماد سازی <span class="kama">،</span> بازارچه مجوزهای لازم از قبیل نماد الکترونیکی ( Enamad ) از وزارت صنعت و معدن  ,  و نماد ساماندهی سایتها و کانالها  از وزارت ارشاد را دریافت نموده است . که در پایین صفحه اصلی سایت و همین صفحه قابل مشاهده می باشند .

    		<br class="br">
            <span class="span_rabete2">
          	راهای ارتباط با بازارچه کدامند ؟
          </span>
          <br>
          در قسمت تماس با ما جهت ارتباط با مدیریت بازارچه <span class="kama">،</span> موبایل مدیر <span class="kama">،</span> تلفن ثابت و ایمیل مدیر درج شده است همچنین آدرس و کدپستی بازارچه قابل مشاهده می باشد . از طریق لوگو مربوط به نماد الکترونیکی وزارت صنعت و معدن و نماد مربوط به وزارت ارشاد می توانید به اطلاعات تماس با ما نیز دسترسی داشته باشید .
          <br />
          همچنین پس از ثبت نام از طریق شماره موبایل ثبت شده توسط شما به کانال و گروه ما در پیام رسان سروش دعوت خواهید شد .
          <br />
          جهت هر گونه شکایت <span class="kama">،</span> انتقاد <span class="kama">،</span> و پیشنهاد می توانید از لینک ثبت شکایات تعبیه شده در وب سایت استفاده نمایید <span class="kama">،</span> همچنین می توانید متن مورد نظرتان را در گروه بازارچه ارسال نمایید .

          <br>
          بسیار ضروری ولازم است قوانین مربوط به فروشندگان را با دقت مطالعه نمایید . <br />
          برای ثبت نام و نحوه کار در پنل مدیریتی فروشنده راهنمای مربوط به فروشندگان را به دقت مطالعه نمایید .
          <br />
          چنانچه سوال و یا اینکه نیاز به راهنمایی بیشتری دارید با شماره 09178023733 تماس حاصل نمایید .
          <br />
          با سپاس ;
          <br>
          جهت کسب درآمد بیشتر و ورود به بازار خرید اینترنتی به ما بپیوندید.
          <br>
          بازارچه مجازی فاتک <a href="www.fatak.ir">www.fatak.ir</a>

    </div>
          </div>
        </div>
      </div>
    </div>
    {{-- لوگوهای تامین کننده --}}
    <div class="shop_logo_log">
      <span>
        <span>
          همراه با ما درآمد کسب کنید

        </span>
        <span></span>
      </span>
    </div>
    {{-- دیدگاهای مدیران --}}
    <div class="shop_did_log">
      <span class="shop_did_log1"></span>
      <span class="shop_did_log2">دیدگاه مدیران</span>
    </div>
    {{-- modals --}}
    <!-- Modal موفق بودن ثبت ابتدایی کانال-->
    <div class="modal fade" id="end_shopsabt1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="end_shoplog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
