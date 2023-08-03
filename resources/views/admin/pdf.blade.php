<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center">Order-details</h1>

    Costumer Name : 
       <h3>{{ $order->name  }}</h3>
 Costumer email :
        <h3>{{ $order->email  }}</h3>
 Costumer phone : 
       <h3>{{ $order->phone  }}</h3>
 Costumer address : 
       <h3>{{ $order->address  }}</h3>
 Costumer id : 
       <h3>{{ $order->id  }}</h3>

 Product name : </h6> 
      <h3> {{ $order->product_title  }}</h3>
 Product price : 
       <h3>{{ $order->price  }}</h3>
 Product quantity : 
       <h3>{{ $order->quantity  }}</h3>
 payment status : 
       <h3>{{ $order->payment_status  }}</h3>
 product id : 
       <h3>{{ $order->product_id  }}</h3>

       <img src="product/{{ $order->image }}" alt="" width="250px" height="200px">
    </div>
</body>
</html>