@extends('management.layout_admin')
@section('content')
  <header>
    @include('management.header_admin')
  </header>
 @yield('contentDash')
 <footer>
   <div class="">
     footer
   </div>
 </footer>
@endsection
