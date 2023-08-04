<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .title_deg{
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        padding: 5px;
        margin: 10px;
    }
    .form_deg{
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        padding: 5px;
        margin: 10px;
        color: black;
    }
    
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial header  -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title_deg">All Orders</h1>
                <div class="form_deg">
                    <form action="{{ url('search') }}" method="get">
                        @csrf
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="search for something">

                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>
                
                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="bg-success text-danger">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Customer Address</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Product image</th>
                        <th>payment status</th>
                        <th>Delivery status</th>
                        <th>Delivered</th>
                        <th>Invoice</th>
                        <th>Send Email</th>
                    </tr>
                    @forelse ($order as $order )    
                    <tr style="color: white">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }} </td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>
                            <img src="/product/{{ $order->image }}" alt="" style="width: 180px;height:100px;border-radius:unset">
                        </td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            @if($order->delivery_status == 'processing')
                                 <a onclick="return confirm('Are You Sure To Delivery is Confirmed')" href="{{ url('delivered', $order->id) }}" class="btn btn-danger">Delivered</a>
                            @else
                                <p style="color: green;">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('order_pdf', $order->id) }}"  class="btn btn-success">Download</a>
                        </td>

                        <td>
                            <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">email</a>
                        </td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" style="font-size: 18px; font-wight: bold; text-align:center; color:white;">No data Found</td>
                    </tr>
                    @endforelse
                </table>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>