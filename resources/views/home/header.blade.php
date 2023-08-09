<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="{{ asset('/images/logo.jpg') }}" alt="#" /></a>
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
                  <li>
                     <a href="{{ url('/redirect') }}#ourProducts">
                  <i class="fa fa-search" aria-hidden="true"></i>
                     </a>
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