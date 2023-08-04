<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
   @include('admin.css')
   <style>
    .div_center{
        text-align: center;
        padding-top: 40px; 
    }
    .font_size{
        font-size: 40px;
        padding-bottom: 40px; 
    }
    .text_color{
        color: black;
        padding-bottom: 20px;
    }
    label{
        display: inline-block;
        width: 200px
    }
    .div_design{
        padding-bottom: 15px;
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="div_center">
                    <h1 class="font_size">Send Email at : {{ $order->email }}</h1>


                <form action="{{ url('send_user_email', $order->id) }}" method="post">

                    @csrf
                    <div class="div_design">
                        <label>Email Greeting:</label>
                        <input class="text_color" type="text" name="greeting" placeholder="Enter a greeting" required >
                    </div>
                    <div class="div_design">
                        <label>Email FirstLine :</label>
                        <input class="text_color" type="text" name="firstline" placeholder="Enter a firstline " required>
                    </div>
                    <div class="div_design">
                        <label>Email Body :</label>
                        <input class="text_color" type="text" name="body" placeholder="Enter body for email " required>
                    </div>
                    <div class="div_design">
                        <label>Email button name :</label>
                        <input class="text_color" type="text" name="button" placeholder="Email button" required>
                    </div>
                    <div class="div_design">
                        <label>Email URL :</label>
                        <input class="text_color" type="text" name="url" placeholder="Enter a discount price">
                    </div>
                    <div class="div_design">
                        <label>Email lastline:</label>
                        <input class="text_color" type="text" min="0" name="lastline" placeholder="Enter last-line" required>
                    </div>
                    <div class="div_design">
                        <input type="submit" class="btn btn-primary" value="Send Email">
                    </div>
                </form>


                </div>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>