@extends('layout.layout')
@section('title')
  خانه
@endsection
@section('content')
 {{-- اسلایدر --}}
@if (!empty($ch))
  <div class="getid">
    {{$ch}}
  </div>
@endif
 <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
   <ol class="carousel-indicators">
     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img class="d-block w-100" src="/img_site/1.jpg "  alt="First slide">
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="/img_site/2.jpg " alt="Second slide">
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="/img_site/3.jpg " alt="Third slide">
     </div>
   </div>
   <a class="carousel-control-prev slider_prev_next" href="#carouselExampleIndicators" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next slider_prev_next" href="#carouselExampleIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
 {{-- توجه توجه توجه --}}
 {{-- مربوط به لب تاپ و کامپیوتر --}}
  <div class="row div_in1 pc_in">

      <div class="div_in2  order_in">
        <div class="order_in_1">
          سقارش محصول
        </div>
        <div class="order_in_2">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <div class="order_in_3">
        هر محصولی رو میخوای سفارش بده ، برات تهیه میکنیم ، ما متفاوت عمل میکنیم ! میخوای بدونی چه جوری ؟؟؟
        </div>
      </div>


      <div class="div_in2  paygiri_in">

        <div class="paygiri_in_1">
            پیگیری سفارش
        </div>
        <div class="paygiri_in_2">
          <i class="fab fa-searchengin"></i>
        </div>
        <div class="paygiri_in_3">
          محصولی که سفارش دادی رو پیکیری کن ...
        </div>
      </div>
      <div class="div_in2  kanal_in" onclick="location.href = '/page_login';">

        <div class="kanal_in_1">
              کانال و گروه
        </div>
        <div class="kanal_in_2">
          <i class="fas fa-comments-dollar"></i>
        </div>

        <div class="kanal_in_3">
          با کانال و گروهت همراه با ما کسب درآمد کن ...

        </div>
      </div>


      <div class="div_in2  froosh_in">

        <div class="froosh_in_1">
          فروشنده و تامین کننده
        </div>
        <div class="froosh_in_2">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="froosh_in_3">
          هر جای ایرانی تامین کننده و فروشنده ما باش ...
        </div>
      </div>

  </div>
  {{-- توجه توجه توجه --}}
  {{-- مربوط به موبایل --}}
  <div class="row div_in1 mobail_in">

      <div class="div_in2  order_in">



        <div class="order_in_1">
          سقارش محصول
        </div>

        <div class="order_in_2">
          <i class="fas fa-clipboard-check"></i>
        </div>

        <div class="order_in_3">
        هر محصولی رو میخوای سفارش بده ، برات تهیه میکنیم ، ما متفاوت عمل میکنیم ! میخوای بدونی چه جوری ؟؟؟
        </div>
      </div>


      <div class="div_in2  paygiri_in">

        <div class="paygiri_in_1">
            پیگیری سفارش
        </div>
        <div class="paygiri_in_2">
          <i class="fab fa-searchengin"></i>
        </div>
        <div class="paygiri_in_3">
          محصولی که سفارش دادی رو پیکیری کن ...
        </div>
      </div>


      <div class="div_in2  kanal_in" onclick="location.href = '/page_login';">
        <div class="kanal_in_3">
          با کانال و گروهت همراه با ما کسب درآمد کن ...
        </div>
        <div class="kanal_in_1">
              کانال و گروه
        </div>
        <div class="kanal_in_2">
          <i class="fas fa-comments-dollar"></i>
        </div>
      </div>
      <div class="div_in2  froosh_in">
        <div class="froosh_in_3">
          هر جای ایرانی تامین کننده و فروشنده ما باش ...
        </div>
        <div class="froosh_in_1">
          فروشنده و تامین کننده
        </div>
        <div class="froosh_in_2">
          <i class="fas fa-user-tie"></i>
        </div>
      </div>

  </div>

  <div class="carsol_pro_ess">
    @include('layout.carsol_pro_ess')
  </div>
  <!-- Modal بازدید شبکه اجتماعی-->
  <div class="modal fade" id="modal_bazdidCh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal_h_sabtname_header">
          <h5 class="modal-title modal_h_sabtname_label" id="exampleModalLabel"><i class="fab fa-cc-diners-club"></i> ورود به فروشگاه فاتک</h5>
        </div>
        <div class="modal-body modal_body_h_sabtname">
          <div class="modal_getch">
            خوش آمدید !!
          </div>
          <div class="modal_getch2">
            <span>سلام !</span>
            <p>
              شما به وسیله لینک از یک شبکه اجتماعی و یا یک وب سایت وارد فروشگاه شده اید .
              لطفا جهت ورود ایمن به فروشگاه کد امنیتی زیر را وارد نموده و دکمه ثبت را فشار دهید .
            </p>
          </div>
          <form class="form form_channellog" id="form_channellog" action="" method="post">
           {{ csrf_field() }}
           <div class="form-group" >
             <label for="amniat_channellog" class="control-label pull-right modal_getchLabel"><i class="fas fa-shield-alt i_form"></i> کد امنیتی </label>
             <div class="div_form"><input type="text" class="form-control tel" id="amniat_getchLabel" autofocus onblur="changeAdadFaToEn('amniat_pro_nazar')" ></div>
           </div>
           <div class="captcha_form">
             <span class="captcha4">{!! captcha_img() !!}</span>
             <button type="button" class="btn btn-succpro" onclick="captcha()" id="refresh"><i class="fas fa-sync-alt"></i></button>
           </div>
           <div class="form-group form_btn">

             <button type="button" class="btn btn-success" onclick="bazdidCh()" >ثبت</button>
           </div>
         </form>
        </div>
        <div class=" modal-footer-h-sabtname">
        </div>
      </div>
    </div>
  </div><!--end modal شکایت-->

@endsection
