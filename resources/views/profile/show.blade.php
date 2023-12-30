<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
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
      @if(Auth::user()->usertype == 1)
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('/redirect') }}"><img width="250" src="{{ asset('/images/logo.jpg') }}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/redirect') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/show_product')}}">Products</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/view_catagory') }}">Catagory</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" href="{{ url('/order') }}">Order</a>
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
      @else
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('/redirect') }}"><img width="250" src="{{ asset('/images/logo.jpg') }}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/redirect') }}">Home <span class="sr-only">(current)</span></a>
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
      @endif
         <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
    
                    <x-section-border />
                @endif
    
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>
    
                    <x-section-border />
                @endif
    
                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
    
                    <x-section-border />
                @endif
    
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
    
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />
    
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>



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

   

