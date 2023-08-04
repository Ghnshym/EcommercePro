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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
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
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>