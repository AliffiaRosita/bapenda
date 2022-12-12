<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="Ayman Fikry"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Multi-purpose energy html5 template"/>
    <title>Home Main - Energia Responsive Bootstrap 5 energy HTML5 Template</title>
    @include('guest.partials.style')
  </head>
  <body>
    {{-- <div class="preloader">
      <div class="dual-ring">
        
      </div>
      <br>
      <img src="{{asset('img/logo-bapenda.png')}}" style="width:300px"alt=""> 
    </div> --}}
    <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      <!-- 
      ============================
      Header #2
      ============================
      -->
      @include('guest.partials.nav')
      <!-- End .header-->
      @yield('content')
      
      @include('guest.partials.footer')
      <!--
      ============================
      BackToTop #1
      ============================
      -->
      <div class="back-top" id="back-to-top" data-hover=""><i class="energia-arrow-up"></i></div>
    </div>
    <!--  Footer Scripts==
    -->
    <script src="{{asset('guest/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/vendor.js')}}"></script>
    <script src="{{asset('guest/assets/js/functions.js')}}"></script>
  </body>
</html>