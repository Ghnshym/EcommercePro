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
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
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
                    <h1 class="h2_font">catagory</h1>
                    <form action="{{ url('/add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory" placeholder="Enetr Catagory">
                        <input type="submit" value="add cataory" class="btn btn-primary">
                    </form>
                </div>
                <table class="center">
                    <tr>
                        <th>Catagory</th>
                        <th>Action</th>
                    </tr>

                    @foreach($data as $data)
                        
                    <tr>
                        <td>{{ $data->catagory_name }}</td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this.')" href="{{ url('delete_catagory', $data->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>

    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>