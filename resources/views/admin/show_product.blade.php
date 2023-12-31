<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .center{
      margin: auto;
      width: 80%;
      border: 3px solid white;
      text-align: center;
      margin-top: 40px;
    }
    .font_size{
      text-align: center;
      font-size: 40px;
      padding-top: 5px;
    }
    .th_color{
      background-color: skyblue;
    }
    .th_deg{
      padding: 30px;
    }
    .img_size{
      width: 150px;
      height: 150px;
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

              <h2 class="font_size">All Products</h2>

              <table class="w-100 text-center" style="border: 1px solid white;">
                <tr class="th_color" style="border: 1px solid white;">
                  <th class="th_deg">Product Title</th>
                  <th class="th_deg">Description</th>
                  <th class="th_deg">Quantity</th>
                  <th class="th_deg">Catagory</th>
                  <th class="th_deg">Price</th>
                  <th class="th_deg">Discount Price</th>
                  <th class="th_deg">product Image</th>
                  <th class="th_deg">Action</th>
                  <th class="th_deg">Action</th>
                </tr>

                @foreach($product as $product)
                <tr style="border: 1px solid white;">
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->catagory }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->discount_price }}</td>
                  <td>
                    <img src="/product/{{ $product->image }}" alt="" class="img_size">
                  </td>
                  <td>
                    <a onclick="return confirm('Are You Sure to Delete This')" class="btn btn-danger" href="{{ url('/delete_product', $product->id) }}">Delete</a>
                  </td>
                  <td>
                    <a href="{{ url('/update_product', $product->id) }}" class="btn btn-success">Edit</a>
                  </td>
                </tr>
                @endforeach

              </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>