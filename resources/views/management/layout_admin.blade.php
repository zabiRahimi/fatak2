<!doctype html>
<html  dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta http-equiv="x-pjax-version" content="v123"> --}}
        <meta name="_token" content="{{csrf_token()}}" />
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="\css\app.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
        <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
        <link href="\css\admin\main_admin.css" rel="stylesheet" type="text/css">
        <link href="\css\admin\header_admin.css" rel="stylesheet" type="text/css">
        <link href="\css\admin\pro_admin.css" rel="stylesheet" type="text/css">
        <link href="\css\admin\add_pro.css" rel="stylesheet" type="text/css">
        <link href="\css\admin\all_edit_pro.css" rel="stylesheet" type="text/css">
        <link href="\css\admin\one_edit_pro.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
          @include('management.header_admin')
        </header>
        <div class="content" id="pjax">
          @yield('content')
        </div>
        <footer>

        </footer>
        <script type="text/javascript" src="\js\app.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

        <script type='text/javascript' src='froala\js\froala_editor.pkgd.min.js'></script>
        <script type="text/javascript" src="\js\admin\main_admin.js"></script>
        <script type="text/javascript" src="\js\admin\pro_admin.js"></script>
        <script type="text/javascript">
           $(function() { $('textarea').froalaEditor() });
           $(document).pjax('.a_pjax' , '#pjax');
           $(document).pjax('.apjaxpro' , '#pjaxpro');
           $(function () {  $('[data-toggle="tooltip"]').tooltip()});
       </script>
    </body>
</html>
