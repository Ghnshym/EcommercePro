<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
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
      <style>
        .total_price{
            font-size: 22px;
            font-weight: 500;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .cart_header{
            font-size: 25px; text-align:center;padding:20px;color:rgb(249, 62, 5);font-weight:800
        }
        .product_image{
            width: 100px;
            height: 100px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
             {{ session()->get('message') }}
         </div>
     @endif
         
            <h1  class="cart_header">Your Cart </h1>
         
         <div class="container">
            <table class="table table-striped" >
                <tr class="text-center">
                    <th >Product TiTle</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>

                <?php $totalprice = 0; ?>
                <?php $totalproduct=0;  ?>
                @foreach($cart as $cart)
                    
                <tr class="text-center">
                <td>{{ $cart->product_title }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>${{ $cart->price }}</td>
                <td>
                        <img src="product/{{ $cart->image }}" class="product_image">
                </td>
                <td>
                    <a onclick="return confirm('Are You Sure To Remove This Product ?')" href="{{ url('/remove_cart', $cart->id) }}" class="btn btn-danger">Remove</a>
                </td>
                </tr>
                <?php $totalprice = $totalprice + $cart->price; ?>
                <?php $totalproduct++; ?>
                @endforeach

            </table>
            <div class="container text-center">
                <h1 class="total_price">Your Total Price : ${{ $totalprice }}</h1>
            </div>

            <div class="conatiner text-center mt-8">
                <h1 style="font-size: 25px;margin-bottom:10px">Place to Order </h1>
                <a href="{{ url('/cash_order',$totalproduct) }}" class="btn btn-danger">Cash On Delivery</a>
                <a href="" class="btn btn-danger">Pay Using Card</a>
            </div>
            
         </div>
      </div>
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>