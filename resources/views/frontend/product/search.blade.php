
@extends('frontend.main_master')

@section('islamic')


 <style>
    .portfolio-padding{
      height: 500px;
      margin-top: 100px;
    }
 </style>


<main class="main-body">
   <div class="row">
      <div id="productDiv">
      
      <!-- sidebar mobile menu & sidebar cart - start
			================================================== -->
			@include('frontend.body.mobile_sidbar_menu')
			<!-- sidebar mobile menu & sidebar cart - end
			================================================== -->


	<section class="main-content" id="main-content">

       <section class="popular-products">
           <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
               <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">
                  @if(isset($products))
                     
                        @foreach ($products as $product)
                        <div class="isotopeSelector filter all ec-card-lg">
                           <div class="overlay ec-card-inner">
                                 <div class="border-portfolio">
                                    <div class="card product-port">
                                       <div class="image-overlay-container">
                                             <img src="{{ asset($product->product_thambnail) }}"
                                                class="img-fluid  bg-img" alt="portfolio-image">
                                       </div>
                                       <div class="text-center mt-3 mb-1">
                                             <h4 class="text-dark">
                                                {{ $product->product_name }}
                                             </h4>
                                             <b style="font-size:14px">{{ $product->unit }}</b>

                                             <!-- Selling and Discount Price Start -->
                                             @if ($product->discount_price == null)
                                             <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                {{ $product->selling_price }} </h4>
                                             @else
                                             <h4>
                                                <span style="color:black"> <span style="font-size:15px">৳</span>
                                                   {{ $product->discount_price }}</span>
                                                <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                         {{ $product->selling_price }}</s></span>
                                             </h4>
                                             @endif
                                             <!-- Selling and Discount Price End -->
                                       </div>

                                       <?php
                                          $productName = strval("'" . $product->product_name . "'");
                                       ?>

                                       <div class="overlay-background">
                                             <button class="overlay-add-to-bag"
                                             onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                             data-bs-target="#productQuickViewModal">
                                                Add to <br> Shopping <br> Bag
                                             </button>
                                             <a class="overlay-details-link"
                                                onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                                data-bs-target="#productQuickViewModal">Details
                                                >></a>
                                       </div>
                                    </div>

                                    <div class="d-flex justify-content-center cart-details-btn ">

                                       <a onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                             data-bs-target="#productQuickViewModal"><button
                                                class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                                To Cart
                                             </button></a>

                                    </div>
                                 </div>
                           </div>
                        </div>
                        @endforeach
                     
                  @endif                  

               @if(!$products->count() && !isset($brandWiseProduct->products) && !isset($categoryWiseProduct->products))
                  <p style="font-size: 25px;">No Product Found</p>
               @endif
            </div>
           </div>
       </section>
       <!-- Popular products End --> 
   </section>            
      </div>
   </div>

</main>
@endsection



