<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <base href="/product">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         
         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%;margin-top: 20px">
            <div class="box">
               <div class="img-box" style="margin-bottom: 20px">
                  <img src="product/{{ $product->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h6><b>
                     {{ $product->title }}
                  </b></h6>
                  @if($product->discount_price!=null)
                    
                  <h6 style="color: red;">
                    Discount Price : 
                    ${{ $product->discount_price }}
                  </h6>
                  <h6 style="color: blue;  text-decoration-line: line-through;">
                    price : 
                    ${{ $product->price }}
                  </h6>
                  @else
                  <h6 style="color: blue">
                    price
                    <br/>
                    ${{ $product->price }}
                  </h6>
                  @endif
                  <h6><b>Product Catagory : </b>{{ $product->catagory }}</h6>
                  <h6><b>Product Details : </b>{{ $product->description }}</h6>
                  <h6><b>Availability : </b>{{ $product->quantity }}</h6>
                  <a href="" class="btn btn-primary">Add to Cart</a>
               </div>
            </div>
         </div>
         

      


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
     
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>