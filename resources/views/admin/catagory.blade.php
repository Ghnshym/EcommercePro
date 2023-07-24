<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color{
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
                <div class="div_center">
                    <h1 class="h2_font">catagory</h1>
                    <form action="{{ url('/add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory" placeholder="Enetr Catagory">
                        <input type="submit" value="add cataory" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>