<!doctype html>
<html  dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
        <title>@yield('title')</title>

       <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
       {{-- <link href="\css\app.css" rel="stylesheet" type="text/css"> --}}
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
       <!-- Add the slick-theme.css if you want default styling -->
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
       <link href="\css\main.css" rel="stylesheet" type="text/css">
       <link href="\css\header.css" rel="stylesheet" type="text/css">
       <link href="\css\index.css" rel="stylesheet" type="text/css">
       <link href="\css\slider.css" rel="stylesheet" type="text/css">
       <link href="\css\show_pro.css" rel="stylesheet" type="text/css">
       <link href="\css\footer.css" rel="stylesheet" type="text/css">
       <link href="\css\sabad_kharid.css" rel="stylesheet" type="text/css">

    </head>
    <body>
      <img src="http://localhost:8000/img_site/210.gif" class="gif_loding" alt="loding" >
       <div class="all_khat">
          <div class="khat1"></div><div class="khat2"></div><div class="khat3"></div>
        </div>
        <div class="">
        <header>
          @include('layout.header')
        </header>
<div class="content">

        <div class="search_all" id="search">  </div>


          <div class="" id="pjax">
            @yield('content')

          </div>
          {{-- <div class="carsol_pro_ess">
            @include('layout.carsol_pro_ess')
          </div> --}}

{{-- <div class="clear">
hj
</div> --}}
       </div>
        <footer>
          @include('layout.footer')
        </footer>
        </div>

        {{-- <script type="text/javascript" src="\js\app.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
         <script type="text/javascript" src="\js\main.js"></script>
        <script type="text/javascript" src="\js\slider.js"></script>
        <script type="text/javascript" src="\js\show_pro.js"></script>
        <script type="text/javascript" src="\js\sabad_kharid.js"></script>
        <script type="text/javascript" src="\js\city.js"></script>
        <script type="text/javascript" src="\js\login.js"></script>

        <script type="text/javascript">

         $('.nm').carousel({
     interval: 100000
 });


           $(document).pjax('.a_pjax' , '#pjax');
           $(function () {  $('[data-toggle="tooltip"]').tooltip()});
           // $('.div_in12_1').click(function () { $(".div_in13").animate({left:'1500px'}).delay(3500) });
           // $('.div_in12_2').click(function () { $(".div_in13").animate({left:'0'} , 2000).delay(3500)});
            function pro(page , take , count,up_back){
              var x=count/take;
             var take2= Math.ceil(count/take);
             if(up_back=='up'){
              if(page>take2){page=1;}
            }
            else if(up_back=='back'){
              if(page==0){page=take2;}
            }

             $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
             var url='/pro/'+page;

             $.get(url , {  } , function(data){

               $(".zabi").html(data).delay(5000);
             });
           }
        </script>
       <script type="text/javascript"  src="/js/header.js">

        </script>
    </body>
</html>
