<!DOCTYPE html>
<html>
<head>
    <title>stripe payment</title>
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.jpg" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/products')}}">Products</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/show_cart') }}">CarT</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{ url('/user_order') }}">Order</a>
                       </li>
        
                          @if(Route::has('login'))
                          @auth
                          <x-app-layout>
        
                          </x-app-layout>
                          @else
                             
                        <li class="nav-item">
                          <a class="btn btn-primary mx-4" href="{{ route('login') }}">Login</a>
                       </li>
                       <li class="nav-item">
                          <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                       </li>
                       @endauth
        
                       @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
         
      
      <!-- product section -->
      @include('home.product_page')
      <!-- end product section -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>