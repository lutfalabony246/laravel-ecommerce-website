@extends('frontend.main_master')
@section('islamic')

   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-3 px-3">

  <!-- Popular products Start -->
  <div class="section-title-no-bg px-md-5 px-3">
    <h4 class="pt-2 text-center text-dark" >Special offer</h4>
 </div>
 @php
 $special_offer = App\Models\Product::where('special_offer','1')->get();
 @endphp
 <section class="popular-products">
    <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
       <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 py-lg-5 px-3 py-3">
        @foreach ($special_offer as $item)
          <div class="isotopeSelector filter all ec-card-lg">
             <div class="overlay ec-card-inner">
                <div class="border-portfolio">
                   <div class="card product-port">
                      <div class="image-overlay-container">
                         <img src="{{asset($item->product_thambnail)}}" class="img-fluid  bg-img"
                            alt="portfolio-image">
                      </div>
                      <div class="text-center my-3">
                         <h4 class="text-dark">{{$item->product_name}}</h4>
                         <small>{{$item->unit}}</small>
                         
                       
                         
                         
                         
                          <!-- Selling and Discount Price Start -->
                                        @if ($item->discount_price == null)
                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                            {{ $item->selling_price }} </h4>
                                        @else
                                        <h4>
                                            <span style="color:black"> <span style="font-size:15px">৳</span>
                                                {{ $item->discount_price }}</span>
                                            <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                    {{ $item->selling_price }}</s></span>
                                        </h4>
                                        @endif
                                        <!-- Selling and Discount Price End -->
                         
                         
                      </div>
                      <?php
                      $productName = strval("'".$item->product_name."'");
                      ?>
                      <div class="overlay-background">
                        
                         <button class="overlay-add-to-bag"
                            onclick="productView({{ $item->id }})" 
                            data-bs-toggle="modal"
                            data-bs-target="#productQuickViewModal">Add to <br> Shopping <br> Bag </button>
                        
                             <a class="overlay-details-link"
                                            onclick="productView({{ $item->id }})" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal">Details
                                            >></a>
                     </div>
                   </div>
                   <div class="d-flex justify-content-center cart-details-btn">
                     <a onclick="productView({{ $item->id }})" data-bs-toggle="modal"
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
 <!-- Popular products End -->
      </div>
      </div>


   </section>

</main>

@endsection

