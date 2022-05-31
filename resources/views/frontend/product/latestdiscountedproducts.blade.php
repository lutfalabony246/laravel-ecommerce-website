@extends('frontend.main_master')
@section('islamic')

   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
           <div class="row">
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_left h-100">
                       <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat1.png') }} " alt=""
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_right h-100">
                       <img src=" {{ asset('frontend/assets/images/category/sub-cat/sub_sub_cat2.png') }} " alt="" height="100px"
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
           </div>
        </div>

        <section class="popular-products">
                        <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <h3 class="mt-5 text-center"style="color:black" >Latest Discounted Products</h3>
                            <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-4 pb-lg-3 px-3 py-3">
                            @foreach ($latest as $subsubcat)
                                    <div class="isotopeSelector filter all ec-card-lg">
                                        <div class="overlay ec-card-inner">
                                            <div class="border-portfolio">
                                                <div class="card product-port">
                                                    <div class="image-overlay-container">
                                                        <img src="{{asset($subsubcat->product_thambnail ) }}"
                                                            class="img-fluid  bg-img" alt="portfolio-image">
                                                    </div>
                                                    <div class="text-center my-3">
                                                    <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                                    <h4 style="color:green">{{ $subsubcat->unit }}</h4>
                                                  
                                               
                                                
                                                      <!-- Selling and Discount Price Start -->
                                                    @if ($subsubcat->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ $subsubcat->selling_price }} </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $subsubcat->discount_price }}</span>
                                                        <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                                {{ $subsubcat->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                          
                                                    </div>                                                  
                                                    <div class="overlay-background">
                                                 
                                                
                                                 <button class="overlay-add-to-bag"
                            onclick="productView({{ $subsubcat->id }})" 
                            data-bs-toggle="modal"
                            data-bs-target="#productQuickViewModal">Add to <br> Shopping <br> Bag </button>
                                                
                                                <a class="overlay-details-link"onclick="productView({{ $subsubcat->id }})" 
                                                data-bs-toggle="modal" data-bs-target="#productQuickViewModal">Details >></a>
                                                    </div>
                                                </div>
                                                
                                                   <a class="overlay-details-link"
                                            onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal">Details
                                            >></a>

                                                <div class="d-flex justify-content-center cart-details-btn ">

                                               
                                                 <a onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                         data-bs-target="#productQuickViewModal"><button
                                         class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add To Cart </button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!--  End -->
     
     
     
                  </div>       
               </div>
   </section>

</main>

@endsection
