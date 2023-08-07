<section class="product_section layout_padding" id="ourProducts">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="container">
         <form action="{{ url('product_search') }}#ourProducts" method="GET">
             @csrf
             <div class="d-flex justify-content-center">
                 <input type="text" name="search" placeholder="Search Product" style="width: 900px;" class="form-control" value="{{ request('search') }}">
             </div>
             <input type="submit" class="btn btn-success mt-3 d-block mx-auto" value="Search Product">
         </form>
     </div>

     @if(isset($noResultsMessage))
     <div class="alert alert-info mt-3" role="alert">
       {{ $noResultsMessage }}
     </div>
   @else
     
       <div class="row">

         @foreach($products as $product)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('/product_details',$product->id) }}" class="option1">
                      Product Details
                      </a>
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
                <div class="img-box">
                   <img src="product/{{ $product->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h6>
                      {{ $product->title }}
                   </h6>
                   @if($product->discount_price!=null)
                     
                   <h6 style="color: red;">
                     Discount Price
                     <br/>
                     ${{ $product->discount_price }}
                   </h6>
                   <h6 style="color: blue;  text-decoration-line: line-through;">
                     price
                     <br/>
                     ${{ $product->price }}
                   </h6>
                   @else
                   <h6 style="color: blue">
                     price
                     <br/>
                     ${{ $product->price }}
                   </h6>
                   @endif
                </div>
             </div>
          </div>
         @endforeach
         {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

        
       
    </div>
    @endif
 </section>