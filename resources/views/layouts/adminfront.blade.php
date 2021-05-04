<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Solar - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/fondo/logo-hexagono.png') }}">  

    <link href="{{ asset('assets/googlefonts/css/css.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/system.css') }}" rel="stylesheet" />

    @stack('styles')
  </head>

  <body  id="body" >
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
   
        <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
     
    <style>
         #body{

          background-image: url("{{asset('/images/fondo/fondo_pagina.png') }}");    
          background-repeat: repeat;
          background-position: 30px;
    
        }
    </style>
  </body>
</html>
