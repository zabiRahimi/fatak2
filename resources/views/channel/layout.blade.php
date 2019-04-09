<!doctype html>
<html  dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
        <title>@yield('title')</title>
        <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <link href="\css\app.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
         <!-- Add the slick-theme.css if you want default styling -->
         <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
         <link href="\css\main.css" rel="stylesheet" type="text/css">
         <link href="\css\channel.css" rel="stylesheet" type="text/css">
    </head>
    <body>
      <img src="http://localhost:8000/img_site/210.gif" class="gif_loding" alt="loding" >
        <div class="">
        <div class="content">
          <div class="" id="pjax">
            @yield('content')
          </div>
       </div>
        <footer>

        </footer>
        </div>

        <script type="text/javascript" src="\js\app.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
         <script type="text/javascript" src="\js\main.js"></script>
        <script type="text/javascript" src="\js\channel.js"></script>
        <script type="text/javascript">
           $(document).pjax('.a_pjax' , '#pjax');
           $(function () {  $('[data-toggle="tooltip"]').tooltip()});
        </script>
    </body>
</html>
