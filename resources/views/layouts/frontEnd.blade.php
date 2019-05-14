{{--
<!--  @auth
                <a href="{{ url('/dashboard') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth-->--}}




<!DOCTYPE html>
<html lang="en">

<head lang="en">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>{{$setting->site_name}} | {{$title ?? ''}}</title>

   <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


   <!--Plugins styles-->

   <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
   
   <!--Styles for RTL-->

   <!--<link rel="stylesheet" type="text/css" href="{{asset('app/css/rtl.css')}}">-->

   <!--External fonts-->

   <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
   <style>
      .padded-50 {
         padding: 40px;
      }

      .text-center {
         text-align: center;
      }
   </style>

</head>


<body class=" ">
   @include('includes.header')

   <!-- ... End Header -->

   <div class="content-wrapper">

    @yield('content')

              
      <!-- Subscribe Form -->

     @include('includes.subscribe')

      <!-- End Subscribe Form -->
   </div>
   @include('includes.footer')


   <!-- JS Script -->

   <script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
   <script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
   <script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
   <script src="{{asset('app/js/theme-plugins.js')}}"></script>
   <script src="{{asset('app/js/main.js')}}"></script>
   <script src="{{asset('app/js/form-actions.js')}}"></script>
   <script src="{{asset('app/js/velocity.min.js')}}"></script>
   <script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
   <script src="{{asset('app/js/animation.velocity.min.js')}}"></script>

   <script>
      @if(Session::has('success'))
     alert("{{Session::get('success')}}")
      @endif
 

  </script>


   <!-- ...end JS Script -->

</body>

</html>