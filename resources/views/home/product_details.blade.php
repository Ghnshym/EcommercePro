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
      <style>
         .replies-container {
    border-left: 1px solid #ccc;
    padding-left: 10px;
}

.reply-branch {
    border: none;
    border-left: 1px solid #ccc;
    padding-left: 10px;
}

      </style>
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
                  <h6 class="my-2"><b>
                     {{ $product->title }}
                  </b></h6>
                  @if($product->discount_price!=null)
                    
                  <h6 class="my-2" style="color: red;">
                    Discount Price : 
                    ${{ $product->discount_price }}
                  </h6>
                  <h6 class="my-2" style="color: blue;  text-decoration-line: line-through;">
                    price : 
                    ${{ $product->price }}
                  </h6>
                  @else
                  <h6 class="my-2" style="color: blue">
                    price
                    <br/>
                    ${{ $product->price }}
                  </h6>
                  @endif
                  <h6 class="my-2"><b>Product Catagory : </b>{{ $product->catagory }}</h6>
                  <h6 class="my-2"><b>Product Details : </b>{{ $product->description }}</h6>
                  <h6 class="my-2"><b>Availability : </b>{{ $product->quantity }}</h6>

                  <form action="{{ url('/add_cart', $product->id) }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-4">
                           <input type="number" name="quantity" min="1" value="1" class="option2">   
                        </div> 
                        <div class="col-md-4">
                           <input type="submit" value="Add To Cart" class="option2" >   
                        </div>   
                     </div>   
                  </form>
               </div>
            </div>
         </div>
      </div>
      

      

     


     <div class="container">
      <h2>Add Comment :</h2>
      <!-- Form to add a new comment -->
      <div class="comment-form">
          <form action="{{ route('comment.store', ['productId' => $product->id]) }}" method="post">
              @csrf
              <input type="text" name="content" placeholder="Enter your comment" required>
              <button type="submit" class="btn btn-primary">Submit Comment</button>
          </form>
      </div>
  </div>
  
  <div class="container">
      <h2>All Comments</h2>
      <!-- Container to display comments -->
      <div class="row">
          @foreach ($product->comments as $comment)
              <!-- Comment container -->
              <div class="col-8 mx-auto mb-4">
                  <div class="card">
                      <div class="card-body">
                          <!-- Display user name for the comment -->
                          <h5 class="card-title">{{ $comment->name }} ( Date : {{ $comment->created_at->format('d/m/y') }} ) </h5>
                          <!-- Display comment content -->
                          <p class="card-text">{{ $comment->content }}</p>
  
                          <!-- Display replies for each comment -->
                          <div class="replies-container">
                              @foreach ($comment->replies as $reply)
                                  <!-- Reply content with indentation and timestamp -->
                                  <div class="card mt-3 reply-branch">
                                      <!-- Display user name and formatted date for the reply -->
                                      <h6 class="card-title">{{ $reply->name }} ( Date : {{ $reply->created_at->format('d/m/y') }} ) </h6>
                                      <!-- Display reply content -->
                                      <p class="card-text">{{ $reply->content }}</p>
                                  </div>
                              @endforeach
  
                              <!-- Reply form -->
                              <div class="reply-form mt-2" style="display: none;">
                                  <form action="{{ route('reply.store', ['commentId' => $comment->id]) }}" method="post">
                                      @csrf
                                      <input type="text" name="content" placeholder="Enter your reply" required>
                                      <button type="submit" class="btn btn-primary btn-sm">Submit Reply</button>
                                  </form>
                              </div>
                          </div>
  
                          <!-- Reply button to show/hide reply form -->
                          <button class="btn btn-secondary btn-sm reply-btn mt-3">Reply</button>
  
                      </div>
                  </div>
              </div>
          @endforeach
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
      <!-- Include Bootstrap CSS and JS (you can include it from a CDN or your project's assets) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
       // Get all reply buttons
       const replyButtons = document.querySelectorAll('.reply-btn');

       // Attach click event listener to each reply button
       replyButtons.forEach(button => {
           button.addEventListener('click', function() {
               // Get the replies container associated with the clicked reply button
               const repliesContainer = this.parentElement.querySelector('.replies-container');

               // Toggle the reply form visibility
               const replyForm = repliesContainer.querySelector('.reply-form');
               replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
           });
       });
   });
</script>

   </body>
</html>
