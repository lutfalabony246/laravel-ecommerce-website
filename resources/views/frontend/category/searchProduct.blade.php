@extends('frontend.main_master')
@section('islamic')

<main class="main-body">
   <section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!--~~~~~~category page banner starts~~~~~~-->
        <div class="category01--banner">
           <div class="row">
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_left h-100">
                       <img src=" {{ asset('frontend/assets/images/category/sub-cat/image 169.png') }} " alt=""
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
              <div class="col-lg-6 col-md-6 com-sm-12">
                 <div class="subcat_banner_img h-100">
                    <div class="wrap_right h-100">
                       <img src=" {{ asset('frontend/assets/images/category/sub-cat/image 170.png') }} " alt="" height="100px"
                          class="img-fluid w-100 h-100">
                    </div>
                 </div>
              </div>
           </div>
        </div>


         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
               <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.view') }}">All Category</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="#">Search Products</a></li>
               {{-- @foreach ( $getsubsubcategory1 as $getsubsubcat)
               <li class="breadcrumb-item"><a href="{{ url('sub_sub_category_view/'.$getsubsubcat->id) }}">{{ $getsubsubcat['subcategory']['sub_category_name'] }}</a></li>
               @endforeach --}}
               {{--  <li class="breadcrumb-item"><a href="category.html">Food</a></li>
               <li class="breadcrumb-item"><a href="sub-category.html">Meat and Fish</a></li>
               <li class="breadcrumb-item active" aria-current="page">Meat</li>  --}}
            </ol>
         </nav>



         <section class="popular-products">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
               <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 py-lg-5 px-3 py-3">
                @if($products->count() == 0 )
                <h2>Product Not Found</h2>
              @endif
                   @foreach ($products as $subsubcat)
                  <div class="isotopeSelector filter all ec-card-lg">
                     <div class="overlay ec-card-inner">
                        <div class="border-portfolio">
                           <div class="card product-port">
                              <div class="image-overlay-container">
                                 {{--  <img src="{{ asset('frontend/assets/images/grocery/products/image80.png')}}" class="img-fluid  bg-img"
                                    alt="portfolio-image">  --}}
                                    <img class="img-fluid" src=" {{asset($subsubcat->product_thambnail ) }} "
                                    alt="">
                              </div>
                              <div class="text-center my-3">
                                 <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                 <h4 class="text-dark">{{ $subsubcat->subsubcategory_name }}</h4>
                                 <small>200 ml</small>
                                 <h4
                                   @if ($subsubcat->discount_price == null)
                                        TK.{{ $subsubcat->selling_price }}
                                     @else
                                        TK.{{ $subsubcat->discount_price }} ,<s>
                                        TK.{{ $subsubcat->selling_price }}</s>
                                     @endif
                                 {{-- class="primary-text">TK. {{ $subsubcat->discount_price }}.0 --}}
                                </h4>
                              </div>
                              <?php
                              $productName = strval("'" . $subsubcat->product_name . "'");
                              ?>
                            <div class="overlay-background">
                                <button class="overlay-add-to-bag"  onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName; ?>)">
                                   Add to <br> Shopping <br> Bag
                                </button>
                                <a class="overlay-details-link"onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                   data-bs-target="#productQuickViewModal">Details
                                   >></a>
                             </div>
                           </div>
                           <div class="d-flex justify-content-center">
                            <?php
                            $productName = strval("'".$subsubcat->product_name."'");
                            ?>
                            <button onclick="addToCart({{ $subsubcat->id }}, <?php echo $productName?>)"class="btn btn-primary-filled me-3 px-4"><i
                                class="fas fa-cart-plus me-2"></i>Add To Cart</button>
                           </div>
                        </div>
                     </div>
                  </div>

                  @endforeach
               </div>
            </div>
         </section>
      </div>
      </div>
   </section>

    @php
    $special_deale = App\Models\Product::where('special_deals','1')->get();
    @endphp

        <!-- Product Quick View Modal-->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="adduserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
            <div class="modal-content">
            <div class="modal-body">
                <div class="modal-close-btn">
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-times-circle"></i></button>
                </div>
                <div class="row view-modal">

                    <div class="col-lg-6 image">



                    <img style="height:370px" id="#pimg"  alt="">


                        {{-- <img src=" {{ $value->product_thambnail }} " alt=""> --}}

                    </div>

                    <div class="col-lg-6 ">
                        <div class="row">
                        <div class="product-details col-lg-10 col-12">
                            <h3 class="mb-3 product-title"><span id="#pname"></span></h3>
                            <div class="col">
                                <h5>
                                    <span class="mt-2" id="qty"></span>
                                </h5>
                            </div>
                            <div class="row">
                                <div class="col-9 mt-2">
                                    <h4>
                                    <span class="price me-1 ml-1" id="#price"></span>
                                    <span><strong style="color: green;">&#2547</strong>&nbsp; <del id="#oldprice"></del> <strong>&#2547;</strong></span>
                                    </h4>
                                </div>
                                <div class="col-2 price-container">
                                    <!-- <p class="card-price">30% Off</p> -->
                                    <p class="price-tag" ><span id="offer"></span><span>% off</span></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="product-quantity py-3">
                                    <div class="product-quantity-inner">
                                        <button onclick="quickViewQunatityIncr(event)"><i
                                                class="fas fa-plus"></i></button>
                                        <input type="text">
                                        <button onclick="quickViewQunatityDec(event)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button onclick="addToCart('${ $value.product_name}',${ $value.id})" value="${ $value.id}"  class="btn btn-primary2-filled px-4 py-1 mt-3"><i
                                        class="fas fa-shopping-bag me-2"></i>
                                    Add to Cart</button>
                                </div>
                                {{-- <div class="carts-btn py-3">
                                <input type="hidden" id="product_id">

                                    <button onclick="addToCart()" class="btn btn-primary-filled me-3">
                                    <i class="fas fa-cart-plus me-2"></i> Add To Cart</button>

                                </div> --}}
                            </div>
                            <div class="divider">

                            </div>
                            <div class="product-details">
                                <ul>
                                    <li> Product Code : <span id="pcode"></span></li>
                                    <br>
                                    <li> Category : <span id="pcategory"></span></li>
                                    {{-- <li> Brands : <span id="pbrand"></span></li> --}}
                                    <br>
                                    <li>Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color:white;"></span>
                                        <span class="badge badge-pill badge-success"
                                        id="stockout" style="background: red; color:white;"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="details">
                                <p id="detail"></p>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="top-footer">
                        <div class="banner">
                        <div class="left-part">
                            <ul>
                                <li>
                                    <span class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/delivery.png') }} " style="width: 50px;
                                height: 40px; margin-top: 8px;">
                                    <h5>30 minute delivery</h5>
                                    </span>
                                </li>
                                <li>
                                    <span class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/cash.png') }} "
                                        style="width: 50px; height: 35px; margin-top: 8px;">
                                    <h5>Cash on delivery</h5>
                                    </span>
                                </li>
                            </ul>

                        </div>
                        <div class="right-part">
                            <ul>
                                <li class="text">Pay with</li>
                                <li class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/brac-bank.png') }} " class="img-fluid"
                                    style="height: 40px; margin: 8px;">
                                </li>
                                <li class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/city-bank.png') }} " class="img-fluid"
                                    style="height: 40px; margin: 8px;">
                                </li>
                                <li class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/dbbl.png') }} " class="img-fluid"
                                    style=" height: 40px; margin: 8px;">
                                </li>
                                <li class="icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/rocket.png') }} " class="img-fluid"
                                    style="height: 40px; margin: 8px;">
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="footer-left">
                        <div class="top">
                            <h5>Grocery Shop</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="bottom">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h6>Customer Service</h6>
                                    <ul class="footer-links">
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">UI Design</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h6>About us</h6>
                                    <ul class="footer-links">
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h6>For Business</h6>
                                    <ul class="footer-links">
                                    <li><a href="#">Corporate</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-right">
                        <div class="app-section">
                            <img src=" {{ asset('frontend/assets/images/icon/google_play.jpg') }} "
                                style="width: 100px; height: 30px; cursor: pointer;">
                            <img src=" {{ asset('frontend/assets/images/icon/app_store.jpg') }} "
                                style="width: 100px; height: 30px; cursor: pointer;">
                        </div>
                        <div class="contact-section">
                            <div class="phone-number">
                                <span class="phone-icon">
                                    <img src=" {{ asset('frontend/assets/images/icon/phone.png') }} " alt="">
                                    <span class="text">18734</span>
                                </span>
                            </div>
                            <div class="email-address">
                                <span class="pre-text">or email</span>
                                <span class="email"><strong>support@excelitai.com</strong></span>
                            </div>
                        </div>
                        <div class="social-section">
                            <ul>
                                <li>
                                    <a href="#" target="_blank">
                                    <img src=" {{ asset('frontend/assets/images/icon/gmail.png') }} " class="img-fluid"
                                        style="margin-right: 6px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                    <img src=" {{ asset('frontend/assets/images/icon/facebook.png') }} " class="img-fluid"
                                        style="height: 25px; margin-right: 6px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                    <img src=" {{ asset('frontend/assets/images/icon/intagram.png') }} " class="img-fluid"
                                        style="height: 25px; margin-right: 6px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                    <img src=" {{ asset('frontend/assets/images/icon/youtube.png') }} " class="img-fluid"
                                        style="margin-right: 6px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                    <img src=" {{ asset('frontend/assets/images/icon/pinterest.png') }} " class="img-fluid"
                                        style="height: 25px;">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</main>

@endsection
