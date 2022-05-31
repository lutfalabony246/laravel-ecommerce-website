
@extends('frontend.main_master')
@section('islamic')
    <style>
        .search-container {
            margin-bottom: 0 !important;
        }

        .checked {
            color: darkorange;
        }

        .material .color {
            color: Green;
            font-size: 18px;
            font-weight: 700;
        }

        .main-content ul li a {
            text-decoration: none;
        }

        .material-span {
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }

        .material {
            margin-bottom: 20px;
        }

        .product-amount-innt {
            display: flex;
            justify-content: start;
            align-items: center;
            flex-wrap: wrap;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 5px;
        }

        .product-amount-innt h6 {
            margin-right: 5px;
            color: red;
            font-weight: bold;
            font-size: 20px;
        }

        .product-amount-innt del {
            margin-right: 5px;
            color: #c2c2c2;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .product-amount-innt .like,
        .mes {
            text-align: center;
            margin-right: 5px;
            background: #c2c2c2;
            color: #fff;
            padding: 4px 8px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .product-details-quantity {
            display: flex;
            justify-content: safe;
            align-items: center;
        }

        .product-title {
            padding-right: 10px;
        }

        .product-right .pro-group .product-social li a {
            background-color: #F9B92E;
            color: white
        }

        .product-right .pro-group .product-social li a:hover {
            background-color: #ffd06b;
            color: white
        }

        .section-big-pt-space {
            padding-top: 0px;
        }

        .section-big-pt-space .product-img-innr {
            background: #ffff;
            padding: 10px;
            border: 1px solid #c2c2c2;
            margin-bottom: 30px;
        }

        .section-big-pt-space .product-slider-img-innr {
            margin: 30px 0;
        }

        .section-big-pt-space .product-slider-img-innr a {
            margin: 30px 0;
            border: 1px solid #c2c2c2;
            padding: 40px 15px;
        }

        .prod-btn {
            padding: 8px 30px;
            font-weight: bold;
            font-size: 18px;
            line-height: 29px;
            color: #1d1f1f;
            text-align: start;
            border-bottom: 1px solid #c2c2c2;
            margin: 10px;
            margin-right: 30px;
        }

        .prod-btn.active {
            font-family: Tahoma;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 29px;
            position: relative;
            background: var(--primary);
            color: #fff;
            margin-bottom: 20px;
            border-radius: 0;
            border-bottom: none;
        }

        .prod-btn.active:before {
            position: absolute;
            content: " ";
            width: 20px;
            height: 20px;
            background: var(--primary);
            top: 23%;
            right: -16px;
            clip-path: polygon(100% 54%, 0 0, 1% 100%);
        }

        .tab-contents {
            border: 1px solid #c2c2c2;
            padding: 50px;
        }

        .rating li i {
            color: goldenrod !important;
        }

        .client-review h6 {
            font-weight: 600;
            font-size: 16px;
            color: rgb(78, 78, 78);
        }

        .submit-review .review-table {
            border: 1px solid rgb(218, 218, 218);
            padding: 10px;
        }

        .submit-review .col-2 {
            padding: 10px;
            text-align: center;
        }
        .price-section{
            margin-right: 150px;
        }
        .price{
            font-size: 28px;
            color: green;
            font-weight: bold;
        }
        .price del{
            font-size: 20px;
            color: red;
            font-weight: bold;
        }
        .product-right .pro-group .product-choose-innr{
            padding-top: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dddddd;
        }
        .product-details-quantity{
            padding-top: 32px;
        }
        .submit-button{
            text-align: end;
        }
        .review-btn{
            background-color: var(--primary);
            border: 1px solid var(--primary);
            color: white;
            width: 200px;
            height: 42px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <main>
        <!-- sidebar mobile menu & sidebar cart - start
       ================================================== -->
        @include('frontend.body.mobile_sidbar_menu')
        <!-- sidebar mobile menu & sidebar cart - end
       ================================================== -->
        <section class="main-content" id="main-content">
            <div class="container-fluid profile px-md-5 px-3 mt-3">

                <!-- breadcrumb start -->
                <div class="breadcrumb-main">
                    <ul class="category-breadcrumb-product">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        
                        <li><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="">Product Details</a></li>
                    </ul>
                </div>
                <!-- breadcrumb End -->

                <!-- section start -->
                <section class="section-big-pt-space container-fluid b-g-light">
                    <div class="collection-wrapper">
                        <div class="custom-container">
                            <div class="row">

                                <div class="col-lg-4 p-lg-4 p-1 d-flex justify-content-center">
                                    <div class="xzoom-container">
                                        <div class="product-img-innr">
                                            <img class="xzoom5 img-fluid " id="xzoom-default"
                                                src="{{ asset($product->product_thambnail) }} "
                                                xoriginal="{{ asset($product->product_thambnail) }}" />
                                        </div>
                                        <!-- end product-img-innr  -->
                                        <div class="xzoom-thumbs product-slider-img-innr">
                                            @foreach ($multiimgs as $img)
                                                <a href="{{ asset($img->photo_name) }}"><img class="xzoom-gallery5"
                                                        width="80" src="{{ asset($img->photo_name) }}" title=""></a>
                                            @endforeach
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="col-lg-8 rtl-text px-lg-5 px-2 py-4 pt-0">
                                    <div class="product-right">
                                        <div class="pro-group">
                                            <h2 class="mt-0">{{ $product->product_name }}</h2> 
                                            {{-- <div
                                                class="product-amount-innt d-flex justify-content-start align-items-center flex-wrap">
                                                <h6 style="color: green">&#2547; {{ $product->discount_price }}</h6>&nbsp;
                                                <s style="color: red"><h6>&#2547;&nbsp;{{ $product->selling_price}}</h6></s>
                                            </div> --}}
                                            <ul class="material">
                                                <li class="price-section">
                                                    <p class="price">&#2547;{{ $product->discount_price }} <del>&#2547;{{ $product->selling_price}}</del></p>
                                                </li>
                                                    
                                                <li><span class="material-span">Material:</span>
                                                    {{ strtoupper($product->product_material) }}</li>
                                                @if ($product->product_qty > 0)
                                                    <li><span class="material-span">Stock:</span> <span
                                                            class="in-stock color"> Available</span></li>
                                                @else
                                                    <li><span class="material-span">Stock:</span> <span
                                                            class="in-stock">Stock Out</span></li>
                                                @endif
                                            </ul>
                                               @if(count($reviews) == 0)
                                                <div id="pvm-rating" class="modal-rating">
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                    <span><i class="fas fa-star"></i></span>
                                                </div>
                                            @else
                                                @php
                                                $rating = 0;
                                                @endphp
                                                @foreach ($reviews as $review )                                            
                                                <div id="pvm-rating" class="modal-rating">
                                                @php
                                                    $rating = $rating+((intval($review->quality) + intval($review->price) + intval($review->value)) / 3);                                                    
                                                @endphp 
                                                @endforeach
                                                    @php
                                                        $rating = $rating/count($reviews);
                                                        $rating_blank = 5 - floor($rating);
                                                    @endphp                                                           
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $rating; $i++)
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        @endfor                                                                   
                                                        @for ($i = 1; $i <= $rating_blank; $i++)
                                                            <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                        @endfor                                                                   
                                                    </ul>
                                                    {{-- <span>(10 Reviews)</span> --}}
                                                </div>
                                            @endif 
                                            <!-- end product-amount-innt  -->
                                            <p>{{ strip_tags($product->product_descp) }}</p>
                                        </div>
                                        <div id="selectSize"
                                            class="pro-group addeffect-section product-description border-product mb-0">
                                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight
                                                                Kurta</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body"><img src="" alt=""
                                                                class="img-fluid "></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row product-choose-innr">

                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="error-mes-innr">
                                                        <h6 class="product-title">SIZE</h6>

                                                        <div class="size-box">
                                                            <ul id="productSize">
                                                                @foreach ($product_size_all as $key => $value)
                                                                    @if ($key == 0)
                                                                        <li class="productSize-inner" eia-value="{{ $value }}">
                                                                            <span>{{ $value }}</span>
                                                                        </li>
                                                                    @else
                                                                        <li class="productSize-inner" eia-value="{{ $value }}">
                                                                            <span>{{ $value }}</span>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col  -->
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="color-select-innr">
                                                        <h6 class="product-title">color</h6>
                                                        <div class="color-selector inline">
                                                            <div class="product-color-list d-flex col-lg-2 w-100" id="productColor">
                                                                @foreach($product_color_all as $key => $value)
                                                                <div class="">
                                                                    <p eia-value={{$value}} class="color-family" onclick="colorModalOnClick(this, 'productColor')">{{$value}}</p>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row  -->

                                            <div class="product-details-quantity mb-3">

                                                <h6 class="product-title pt-2">QTY:</h6>
                                                <div class="product-quantity-inner">
                                                    <button onclick="quickViewQunatityIncr(event)"><i
                                                            class="fas fa-plus"></i></button>
                                                    <input id="productQuantity" type="text" value="1">
                                                    <button onclick="quickViewQunatityDec(event)"><i
                                                            class="fas fa-minus"></i></button>
                                                </div>

                                                <?php
                                                $productName = strval("'" . $product->product_name . "'");
                                                // dd($most_popular_alls->id);
                                                ?>

                                                <div class="product-buttons">
                                                    <a href="javascript:void(0)" id="cartEffect"
                                                        onclick="addToCartProductDetails({{ $product->id }}, <?php echo $productName; ?>)"
                                                        class="btn btn-primary-filled tooltip-top py-1"
                                                        data-tippy-content="Add to cart">
                                                        <i class="fa fa-shopping-cart" style="margin: 6px 0;"></i>
                                                        Add to Cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pro-group product-tag pb-0 ">
                                            <div class="d-flex justify-content-end align-items-center my-2">
                                                <h6 class="product-title text-uppercase my-2">share</h6>
                                                <ul class="product-social">
                                                    <li>
                                                        <a href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank"> <i
                                                                class="fa-brands fa-facebook-f"></i> </a> </li>
                                                    <li><a href="https://www.youtube.com/" rel="noopener noreferrer" target="_blank"><i
                                                                class="fa-brands fa-youtube"></i></a></li>
                                                    <li><a href="https://www.linkedin.com/" rel="noopener noreferrer" target="_blank"><i
                                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                                    <li><a href="https://www.twitter.com/" rel="noopener noreferrer" target="_blank"><i
                                                                class="fa-brands fa-twitter"></i></a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section ends -->
                <!-- start Product-details -->

                <section style="overflow: auto;" class="mb-5">
                    <div class="custom-container profile mt-3 px-0">
                        <div class="d-md-flex align-items-start px-md-5 px-3 ">
                            <div class="">

                                <div class="nav nav-pills me-3  d-flex flex-md-column flex-wrap " id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <!-- ---------------------- Side Buttons -------------------------- -->
                                    <button class="btn prod-btn active" id="v-pills-my-account-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-my-account" type="button" role="tab"
                                        aria-controls="v-pills-my-account" aria-selected="true">Description</button>
                                    <button class="btn prod-btn" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-update-profile" type="button" role="tab"
                                        aria-controls="v-pills-my-account" aria-selected="true">Review</button>
                                </div>
                            </div>
                            <div class="tab-content  tab-contents flex-grow-1" id="v-pills-tabContent">

                                <!-- --------------------------Update Profile ---------------------------- -->
                                <div class="tab-pane fade show active" id="v-pills-my-account" role="tabpanel"
                                    aria-labelledby="v-pills-my-account-tab">
                                    <div class="my-account">
                                        <div class=" tab-content prod1" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-detail" role="tabpanel"
                                                aria-labelledby="pills-detail-tab">
                                                <div class="product-detail-video">
                                                    <div class="product-detail-title">
                                                        <p>{{ strip_tags($product->product_descp) }}</p>
                                                    </div>
                                                    <div
                                                        class="product-detail-video-link mt-5 d-flex justify-content-center align-items-center">
                                                        <img src="{{ asset($product->product_thambnail) }}"
                                                            alt="no image" class="img-fluid video-image">
                                                        <div class="video-link-iocon">
                                                            <a class="my-video-links" data-autoplay="true"
                                                                data-vbtype="video" rel="noopener noreferrer" target="_blank" href="{{ asset($product->video_link) }}">
                                                                <i class="fab fa-youtube"></i></a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>    

                                        </div>
                                    </div>
                                </div>

                                <!-- --------------------------Update Profile ---------------------------- -->                               
                                <div class="tab-pane fade" id="v-pills-update-profile" role="tabpanel"
                                    aria-labelledby="v-pills-my-account-tab">
                                   
                                        <form method="POST" action="/product/review/{{ $product->id }}">
                                            @csrf
                                        <h5 class="mb-2">Customer Reviews</h5>
                                        <div class="client-reviews">
                                            @foreach ($reviews as $review )
                                                <div class="client-review d-flex w-100 mt-2">
                                                    <div>
                                                        <img src="../../frontend/assets/images/user/1.png" alt="" srcset="">
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <div class="w-100">
                                                            <div class="d-flex justify-content-between">
                                                                <h6>{{$review->user->name}}</h6>  
                                                                @php
                                                                    $rating = (intval($review->quality) + intval($review->price) + intval($review->value)) / 3; 
                                                                    $rating_blank = 5 - floor($rating);
                                                                @endphp                                                             
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= $rating; $i++)
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                    @endfor                                                                   
                                                                    @for ($i = 1; $i <= $rating_blank; $i++)
                                                                        <li><i class="fa-solid fa-star" style="color: #c2c2c2!important"></i></li>
                                                                    @endfor                                                                   
                                                                </ul>
                                                            </div>
                                                            <p>{{$review->review}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="submit-review mt-4 mb-3">
                                            <h4 class="mb-3">Write Your Own review</h4>
                                            <input type="hidden" name="product_id" value={{ $product->id }}>                                         
                                            <div class="review-table">
                                                <div class="row review-table-header">
                                                    <div class="col-2"></div>
                                                    <div class="col-2">1 Star</div>
                                                    <div class="col-2">2 Star</div>
                                                    <div class="col-2">3 Star</div>
                                                    <div class="col-2">4 Star</div>
                                                    <div class="col-2">5 Star</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">Quality</div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="quality" value="5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">Price</div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="price" value="5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">Value</div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="1">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="2">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="3">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="4">
                                                    </div>
                                                    <div class="col-2">
                                                        <input class="form-check-input"
                                                            type="radio" name="value" value="5">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div>
                                            <div class="row">
                                               
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Review <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" rows="5" name="review"></textarea>
                                                    </div>
                                                </div>
                                                <div class="submit-button">
                                                    <button class="review-btn" type="submit">SUBMIT REVIEW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- end row  -->
                        </div>
                </section>
                <!-- End start Product-details  -->
            </div>
        </section>
    </main>
@endsection

@section('scripts')

<script>
    var $grid = $('.product-main-content-inner').isotope({
        // options
    });
    // filter items on button click
    $('.product-content-menu').on('click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });
</script>


{{-- --------- Add To Cart - Seyam ----------- --}}
<script>
    function addToCartProductDetails(productId, productName) {
        const quantity = document.getElementById('productQuantity').value;
        const productSizeList = document.getElementById('productSize').children;
        let productSize = '';
        for (var i = 0; i < productSizeList.length; i++) {
            if (productSizeList[i].classList.contains('active')) {
                productSize = productSizeList[i].getAttribute('eia-value');
            }
        }

        const productColorList = document.getElementById('productColor').children;
        let productColor = '';
        for (var i = 0; i < productColorList.length; i++) {
            if (productColorList[i].children[0].classList.contains('active')) {
                productColor = productColorList[i].children[0].getAttribute('eia-value');
            }
        }
        console.log(productId, productName, quantity, productSize, productColor);

    }
</script>


@endsection

