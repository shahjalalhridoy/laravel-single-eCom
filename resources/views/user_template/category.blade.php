@extends('user_template.layouts.template')
@section('main-content')

<div class="fashion_section">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 class="fashion_taital">{{ $category_info->category_name }} - ({{ $category_info->product_count  }})
                  </h1>
                  <div class="fashion_section_2">
                     <div class="row">
@foreach ($products as $pro )
      

                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">{{ $pro->product_name }}</h4>
                              <p class="price_text">Price  <span style="color: #262626;">$ {{ $pro->product_price }}</span></p>
                              <div class="tshirt_img"><img src="{{ asset($pro->product_image) }}"></div>
                              <div class="btn_main">
                                 <form action="{{ route('productaddtocart') }}" method="POST">
                                     @csrf
                                     <input type="hidden" value="{{ $pro->id }}" name="product_id">
                                     <input type="hidden" value="{{ $pro->product_price }}" name="product_price">
                                     <input type="hidden" value="1" name="product_qty">
                                     {{-- <label for="cart_qty">How many items?</label>
                        <input  type="number" min="1"  max="{{ $pro->product_qty  }}" name="cart_qty" placeholder="1">
<br> --}}
                                     <input class="btn btn-warning" type="submit" value="Add To Cart">

                                 </form>

                                 {{-- <a href="#">Add To cart</a> --}}
                                 <div class="seemore_bt">
                                     <a href="{{ route('singleproduct', [$pro->id, $pro->product_slug]) }}">View Details</a>
                                 </div>
                             </div>
                           </div>
                        </div>
                        @endforeach


                      
                        
                     </div>
                  </div>
               </div>
            </div>
          
        
         </div>
        
      </div>
   </div>

@endsection
