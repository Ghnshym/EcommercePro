<!DOCTYPE html>
<html>
<head>
    <title>Your order</title>
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
         @include('home.header')
         <!-- end header section -->

         <div class="container" style="text-align: center; margin:auto;font-size:20px;font-weight:700;">
            Your All Order 
         </div>
       <div class="container">
           <table class="table table-striped table-bordered table-responsive">
        </div>  
        <tr class="text-center">
            <th>Product Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Image</th>
            <th>Cancel <br> Product</th>
        </tr>

        @foreach ($order as $order)
        <tr class="text-center">
            <td>{{ $order->product_title }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->payment_status }}</td>
            <td>{{ $order->delivery_status }}</td>
            <td style="width: 150px;height:120px;">
                <img src="/product/{{ $order->image }}" alt="product_image" style="width: 100%; height: 100%;">
            </td>

            @if($order->delivery_status=='processing')
            <td>
                <a onclick="return confirm('Are You Sure To Cancle This order')" href="{{ url('cancel_order',$order->id) }}" class="btn btn-danger">Cancel</a>
            </td>

            @else
            <td>
                <p class="text-primary">Not Allowed</p>
            </td>
            
            @endif

        </tr>
        @endforeach

      </table>
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