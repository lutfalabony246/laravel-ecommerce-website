@extends('frontend.main_master')


@section('index')
<style>
.collection-banner-main:nth-child(2) {
    margin-top: 14px !important;
}

.slick-track {
    display: flex !important;
}

.slick-slide {
    height: inherit !important;
}
</style>

<main class="main-body">
    <div class="row">
        <div id="productDiv">
            <section class="main-content" id="main-content">
                <!--home slider start-->
                <section class="megastore-slide collection-banner section-py-space">
                    <div class="container-fluid">
                        <div class="row mega-slide-block">
                            <div class="col-xl-9 col-lg-12 collection-banner-close" id="megastore-collection-banner">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slide-1 no-arrow">
                                            @foreach ($sliders as $slider)
                                            <div class="slide-main">
                                                <img src=" {{ asset($slider->slider_img) }} " class="img-fluid bg-img"
                                                    alt="mega-store">
                                                <div class="slide-contain">
                                                    <div>
                                                        <h4>{{ $slider->title }}</h4>
                                                        <p>{{ $slider->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-12 top-banner">
                                <div class="row collection-p6">
                                    <div class="col-12 collection-banner-main-cont">
                                        @php
                                        $bennars = App\Models\Banner::where('status', 1)
                                        ->orderBy('id', 'DESC')
                                        ->limit(2)
                                        ->get();
                                        @endphp
                                        @foreach ($bennars as $bennar)
                                        <div
                                            class="collection-banner-main banner-17 banner-style7 collection-color14 p-left">
                                            <div class="collection-img">
                                                @isset($bennar->bennar_img)
                                                <img src=" {{ asset($bennar->bennar_img) }}" class="img-fluid bg-img  "
                                                    alt="banner">
                                                @endisset
                                            </div>
                                            <div class="collection-banner-contain ">
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--home slider end-->
                <!-- <section class="px-md-5 px-3">
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-card">
                                    <a href="#popular-products">

                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-card">
                                    <a href="#daily-best-sales">

                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-card">
                                    <a href="#latest-discounted-products">

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-cards">
                        <div class="row">
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/popular.png')}}" alt=""
                                        srcset="">
                                    <a href="#popular-products">
                                        <span>Popular Products</span>
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/daily-best.png')}}" alt=""
                                        srcset="">
                                    <a href="#daily-best-sales">
                                        <span>Daily Best Sells</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/discount.png')}}" alt=""
                                        srcset="">
                                     <a href="#latest-discounted-products">
                                        <span>Discounted Products</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/recent.png')}}" alt="" srcset="">
                                     <a href="#recently-added">
                                        <span>Recently Added</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/recent.png')}}" alt="" srcset="">
                                    <a href="#recently-added">
                                        <span>Recently Added</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-6 mt-1 top-card">
                                <div>
                                    <img class="img-fluid"
                                        src="{{asset('frontend/assets/images/top-cards/recent.png')}}" alt="" srcset="">
                                     <a href="#recently-added">
                                        <span>Recently Added</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section> -->


                <!--rounded category start-->
                <!-- <div class="section-title-no-bg px-md-5 px-3">
                    <h4 class="pt-4">Categories</h4>
                </div> -->



                <section class="featured-category mt-3 px-md-5 px-3">
                    <div class="container-fluid px-2 px-lg-5">
                        <div class="row">
                            <div class="col">
                                <div class="slide-7">
                                    @foreach ($categories as $category)
                                    <div>
                                        <a href="{{ url('sub_category_view/' . $category->id) }}">
                                            <div class="featured-category-item text-center">
                                                <div class="d-flex justify-content-center">
                                                    <img src=" {{ asset($category->category_image) }} " alt="">
                                                </div>
                                                <h6 class="fw-bold mt-3" style="color:green; font-weight:bold">
                                                    {{ $category->category_name }}
                                                </h6>
                                                <p style="color:black; font-weight:bold">
                                                    {{ $category->products_count }} Items</p>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </section>
                {{-- banner category script --}}
                @php
                $bennarcategory = App\Models\BannerCatagory::where('status', 1)
                ->orderBy('id', 'DESC')
                ->limit(3)
                ->get();
                @endphp

                <div class="featured-category-promo mx-md-5 mx-3 mt-4">
                    <div class="row">
                        @foreach ($bennarcategory as $category)
                        <div class="col-lg-4 col-md-6 col-12 px-4 py-3">
                            <div class="row bg-white py-2 px-3 promo-card h-100">
                                <div class="col-7 d-flex align-items-center justify-content-center">
                                    <div>
                                        <h4>{{ $category->banner_title }}</h4>
                                        <a href="{{ route('category.view') }}"> <button
                                                class="btn btn-primary-filled px-3 mt-4">Shop Now <i
                                                    class="fas fa-arrow-right ms-1"></i></button> </a>
                                    </div>
                                </div>
                                <div class="col-5 p-4">
                                    <img class="img-fluid" src="{{ asset($category->bennar_img) }}" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Popular products Start -->
                <div id="popular-products" class="section-title-no-bg px-md-5 px-3">
                    <h4 class="pt-4">Popular Products</h4>
                </div>

                <section class="popular-products">
                    <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">
                            @foreach ($most_popular_all as $most_popular_alls)
                            <div class="isotopeSelector filter all ec-card-lg">
                                <div class="overlay ec-card-inner">
                                    <div class="border-portfolio">
                                        <div class="card product-port">
                                            <div class="image-overlay-container">
                                                <img src="{{ asset($most_popular_alls->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="portfolio-image">
                                            </div>
                                            <div class="text-center mt-3 mb-1">
                                                <h4 class="text-dark">{{ $most_popular_alls->product_name }}
                                                </h4>
                                                <b style="font-size:14px">{{ $most_popular_alls->unit }}</b>

                                                <!-- Selling and Discount Price Start -->
                                                @if ($most_popular_alls->discount_price == null)
                                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                    {{ $most_popular_alls->selling_price }} </h4>
                                                @else
                                                <h4>
                                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ $most_popular_alls->discount_price }}</span>
                                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                                            {{ $most_popular_alls->selling_price }}</s></span>
                                                </h4>
                                                @endif
                                                <!-- Selling and Discount Price End -->
                                            </div>

                                            <?php
                                                    $productName = strval("'" . $most_popular_alls->product_name . "'");
                                                    ?>

                                            <div class="overlay-background">
                                                <button class="overlay-add-to-bag"
                                                    onclick="addToCart({{ $most_popular_alls->id }}, <?php echo $productName; ?>)">
                                                    Add to <br> Shopping <br> Bag
                                                </button>
                                                <a class="overlay-details-link"
                                                    onclick="productView({{ $most_popular_alls->id }})"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#productQuickViewModal">Details
                                                    >></a>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center cart-details-btn ">
                                            <input type="hidden" id="product_id">
                                            <button
                                                onclick="addToCart({{ $most_popular_alls->id }}, <?php echo $productName; ?>)"
                                                class="btn btn-primary-filled px-4"><i
                                                    class="fas fa-cart-plus me-2"></i>Add To Cart
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- Popular products End -->


                <!-- Daily Best Sells Start-->
                <div id="daily-best-sales" class="section-title-no-bg mt-2 px-md-5 px-3">
                    <h4>Daily Best Sells</h4>
                </div>
                <section class="daily-best-sells">
                    <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                        <div class="ec-card-group zoom-gallery portfolio-2 px-lg-5 px-3 py-3 slide-6">
                            @foreach ($dailyBestSales as $dailyBestSale)
                            <div class="isotopeSelector">
                                <div class="overlay">
                                    <div class="border-portfolio bg-white">
                                        <div class="card product-port">
                                            <div class="image-overlay-container">
                                                <img src="{{ asset($dailyBestSale->product_thambnail) }}"
                                                    class="img-fluid  bg-img" alt="portfolio-image">
                                            </div>
                                            <div class="mt-3 mb-1 px-2 text-center">
                                                <div class="daily-best-sales-text-cont">
                                                    <h4 class="text-dark fw-normal">
                                                        {{ $dailyBestSale->product_name }}</h4>
                                                    <p>{{ $dailyBestSale->unit }}</p>
                                                </div>
                                                <div class="text-center mt-2 mb-1">

                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($dailyBestSale->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        {{ $dailyBestSale->selling_price }} </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $dailyBestSale->discount_price }}</span>
                                                        <span><s class="text-danger"><span
                                                                    style="font-size:15px">৳</span>
                                                                {{ $dailyBestSale->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->


                                                </div>
                                            </div>
                                            <?php
                                                    $productName = strval("'" . $dailyBestSale->product_name . "'");
                                                    ?>
                                            <div class="overlay-background">
                                                <button class="overlay-add-to-bag"
                                                    onclick="addToCart({{ $dailyBestSale->id }}, <?php echo $productName; ?>)">
                                                    Add to <br> Shopping <br> Bag
                                                </button>
                                                <a class="overlay-details-link"
                                                    onclick="productView({{ $dailyBestSale->id }})"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#productQuickViewModal">Details
                                                    >></a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">

                                            <button
                                                onclick="addToCart({{ $dailyBestSale->id }}, <?php echo $productName; ?>)"
                                                class="btn btn-primary-filled px-4"><i
                                                    class="fas fa-cart-plus me-2"></i>Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- Best Selling Products End-->



                <!-- Latest Discounted Products Start -->
                <div id="latest-discounted-products" class="section-title-no-bg px-md-5 px-3">
                    <h4>Latest Discounted Products</h4>
                </div>
                <section>
                    <div class="latest-discounted-products px-md-5 px-3 mt-2">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-12 my-3">
                                <div class="discounted-card-inner h-100 d-flex align-items-center p-5"
                                    style="background-image: url('frontend/assets/images/grocery/background_img.jpg');">
                                    <div class="image-overlay-container">
                                    </div>
                                    <div>
                                        <a href="{{ url('/latestdiscountedproducts') }}"
                                            class="btn btn-primary-filled px-4" class="fas fa-arrow-right">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-12 my-3 latest-discounted-products-slider-cont">
                                <div class="slide-4">
                                    @foreach ($latestdiscountproduct as $latestdiscountproducts)
                                    <div class="discounted-product-card-wrapper">
                                        <div class="discounted-product-card">

                                            <div class="discounted-product-card-inner">
                                                <div class="discount-percent">
                                                    @php
                                                    $amount = $latestdiscountproducts->selling_price -
                                                    $latestdiscountproducts->discount_price;

                                                    $discount = ($amount / $latestdiscountproducts->selling_price) *
                                                    100;
                                                    @endphp

                                                    <span class="badge badge-pill badge-danger"
                                                        style="font-size:15px">-{{ round($discount) }}%</span>
                                                </div>
                                                <div class="image-overlay-container">
                                                    <img src=" {{ asset($latestdiscountproducts->product_thambnail) }} "
                                                        class="img-fluid  bg-img" alt="portfolio-image">
                                                </div>
                                                <div class="my-3 px-3 text-center">
                                                    <h4 class="text-dark fw-bold" style="height: 50px;">
                                                        {{ $latestdiscountproducts->product_name }}</h4>
                                                    <b style="font-size:14px">{{ $latestdiscountproducts->unit }}</b>
                                                    <br>
                                                    <b style="color:black"> <span style="color:green">Brand:</span>
                                                        {{ $latestdiscountproducts['brand']['brand_name_cats_eye'] }}</b>

                                                    <div class="text-center my-2">
                                                        <!-- Selling and Discount Price Start -->
                                                        @if ($latestdiscountproducts->discount_price == null)
                                                        <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $latestdiscountproducts->selling_price }}
                                                        </h4>
                                                        @else
                                                        <h4>
                                                            <span style="color:black"> <span
                                                                    style="font-size:15px">৳</span>
                                                                {{ $latestdiscountproducts->discount_price }}</span>
                                                            <span><s class="text-danger"><span
                                                                        style="font-size:15px">৳</span>
                                                                    {{ $latestdiscountproducts->selling_price }}</s></span>
                                                        </h4>
                                                        @endif
                                                        <!-- Selling and Discount Price End -->


                                                    </div>
                                                </div>
                                                <?php
                                                        $productName = strval("'" . $latestdiscountproducts->product_name . "'");
                                                        ?>
                                                <div class="overlay-background">
                                                    <button class="overlay-add-to-bag"
                                                        onclick="addToCart({{ $latestdiscountproducts->id }}, <?php echo $productName; ?>)">
                                                        Add to <br> Shopping <br> Bag
                                                    </button>
                                                    <a class="overlay-details-link"
                                                        onclick="productView({{ $latestdiscountproducts->id }})"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModal">Details
                                                        >></a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <?php
                                                        $productName = strval("'" . $latestdiscountproducts->product_name . "'");
                                                        ?>
                                                <button
                                                    onclick="addToCart({{ $latestdiscountproducts->id }}, <?php echo $productName; ?>)"
                                                    class="btn btn-primary-filled me-3"><i
                                                        class="fas fa-cart-plus me-2"></i>Add To Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </section>
                <!-- Latest Discounted Products End -->

                <!-- Top Selling, Trending Products, Recently Added, Top Rated Start -->
                <section class="selling-product">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                <div class="selling-product-header">
                                    <h4>Top Selling</h4>
                                </div>
                                <!-- end selling-product-header  -->
                                <div class="row">
                                    @foreach ($trendingProducts as $top_selling)
                                    <div class="col-md-12 col-6 mt-3 mt-md-1">
                                        <div class="selling-product-wrapper">
                                            <div class="selling-product-inner">
                                                <div class="selling-product-img">
                                                    <img src=" {{ asset($top_selling->product_thambnail) }} " alt="">
                                                </div>
                                                <!-- end selling-product-img  -->
                                                <div class="selling-product-info">
                                                    <h6>{{ $top_selling->product_name }}</h6>
                                                    <!-- end ratting-product  -->
                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($top_selling->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        <span>{{ $top_selling->selling_price }}</span>
                                                    </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $top_selling->discount_price }}</span>
                                                        <span><s class="text-danger"><span
                                                                    style="font-size:15px">৳</span>
                                                                {{ $top_selling->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                                </div>
                                                <!-- end selling-product-info  -->
                                            </div>
                                            <!-- end selling-product-inner  -->
                                        </div>
                                        <!-- end selling-product-wrapper  -->
                                        <button class="btn btn-primary-filled py-0 px-2"
                                            onclick="productView(<% $top_selling->id %>)" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal"><small> <i
                                                    class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- end col   -->

                            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                <div class="selling-product-header">
                                    <h4>Trending Products</h4>
                                </div>
                                <!-- end selling-product-header  -->

                                <div class="row">
                                    @foreach ($trendingProducts as $top_selling)
                                    <div class="col-md-12 col-6 mt-3 mt-md-1">
                                        <div class="selling-product-wrapper">
                                            <div class="selling-product-inner">
                                                <div class="selling-product-img">
                                                    <img src=" {{ asset($top_selling->product_thambnail) }} " alt="">
                                                </div>
                                                <!-- end selling-product-img  -->
                                                <div class="selling-product-info">
                                                    <h6>{{ $top_selling->product_name }}</h6>
                                                    <!-- end ratting-product  -->
                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($top_selling->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        <span>{{ $top_selling->selling_price }}</span>
                                                    </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $top_selling->discount_price }}</span>
                                                        <span><s class="text-danger"><span
                                                                    style="font-size:15px">৳</span>
                                                                {{ $top_selling->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                                </div>
                                                <!-- end selling-product-info  -->
                                            </div>
                                            <!-- end selling-product-inner  -->
                                        </div>
                                        <!-- end selling-product-wrapper  -->
                                        <button class="btn btn-primary-filled py-0 px-2"
                                            onclick="productView(<% $top_selling->id %>)" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal"><small> <i
                                                    class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end selling-product-wrapper  -->
                            </div>
                            <!-- end col   -->

                            <div id="recently-added" class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                <div class="selling-product-header">
                                    <h4>Recently Added</h4>
                                </div>
                                <!-- end selling-product-header  -->
                                <div class="row">
                                    @foreach ($latest_products as $latest_product)
                                    <div class="col-md-12 col-6 mt-3 mt-md-1">
                                        <div class="selling-product-wrapper">
                                            <div class="selling-product-inner">
                                                <div class="selling-product-img">
                                                    <img src=" {{ asset($latest_product ->product_thambnail) }} "
                                                        alt="">
                                                </div>
                                                <!-- end selling-product-img  -->
                                                <div class="selling-product-info">
                                                    <h6>{{ $latest_product->product_name }}</h6>
                                                    <!-- end ratting-product  -->
                                                    <!-- Selling and Discount Price Start -->
                                                    @if ($latest_product->discount_price == null)
                                                    <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                                        <span>{{ $latest_product->selling_price }}</span>
                                                    </h4>
                                                    @else
                                                    <h4>
                                                        <span style="color:black"> <span style="font-size:15px">৳</span>
                                                            {{ $latest_product->discount_price }}</span>
                                                        <span><s class="text-danger"><span
                                                                    style="font-size:15px">৳</span>
                                                                {{ $latest_product->selling_price }}</s></span>
                                                    </h4>
                                                    @endif
                                                    <!-- Selling and Discount Price End -->
                                                </div>
                                                <!-- end selling-product-info  -->
                                            </div>
                                            <!-- end selling-product-inner  -->
                                        </div>
                                        <!-- end selling-product-wrapper  -->
                                        <button class="btn btn-primary-filled py-0 px-2"
                                            onclick="productView(<% $top_selling->id %>)" data-bs-toggle="modal"
                                            data-bs-target="#productQuickViewModal"><small> <i
                                                    class="fas fa-cart-plus me-1"></i>Details</small></button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- end col   -->
                            <!-- <div class="col-lg-3 col-md-6 col-sm-12 mt-4">

                                        </div> -->
                            <!-- end col   -->


                        </div>
                        <!-- end row  -->
                    </div>
                    <!-- end container-fluid  -->
                </section>
                <!-- end selling-product  -->



                <!-- Banner Add -->
                <section id="footer-banner">
                    <div class="position-relative foot-banner">
                        <div class="footer-banner-content">
                            <h3>Make your online shop easier with our mobile app</h3>
                            <p>Boro Bazar makes online grocery fast and easy.Get Groceries delivered and order the best
                                of
                                seasonal farm fresh food.</p>
                        </div>
                        <div class="footer-share">
                            <div class="app-icon">
                                <a href="#"><img
                                        src=" {{ asset('frontend/assets/images/footer-banner/download-on-the-app-store-badge.png') }} "
                                        alt=""></a>
                            </div>
                            <div class="google-icon">
                                <a href="#"><img
                                        src=" {{ asset('frontend/assets/images/footer-banner/Google_Play_Store_badge_EN.svg') }} "
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="foot-ban-right-img">
                            <img src=" {{ asset('frontend/assets/images/footer-banner/banner-9.png') }} " alt="">
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>

</main>




<!--Login Modal for grocery start-->
<div class="modal fade" id="loginModal" tabindex="-1"
      role="dialog" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered d-flex justify-content-center"  role="document">
         <div class="modal-content" style="width: 400px;">
            <div class="modal-body p-4">
               <div class="loginTitle">
                  <p>Login</p>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="facebookLogin">
                  <button><i class="fa-brands fa-facebook-f pe-2"></i> Sing Up or Login with <span>Facebook</span></button>
               </div>
               <div class="emailLogin">
                  <button><i class="fa-solid fa-envelope emailIcon pe-2"></i> Login with <span>Email</span></button>
               </div>
               <div class="or">
                  <p>Or</p>
               </div>
               <div class="phoneContainer">
                  <h6>Please Enter your mobile phone number</h6>
                  <div class="phoneNumberContainer">
                     <img src="../assets/images/cosmeticProjectImage/potaka.jpg" alt="">
                     <div class="number" id="number">
                        <input onclick="showText()" type="text" placeholder="+88">
                     </div>
                  </div>
                  <p class="hidePhoneText" id="hidePhoneText">e.g. +01712345678</p>
               </div>
               <div class="singUpLogin">
                  <button>SING UP / LOGIN</button>
               </div>
               <div class="footer py-4">
                  <p>This site is protected by reCAPTCHA and the Google <span><a href="">Privacy Policy</a></span> and <span><a href="#">Terms of Service</a></span> apply.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--Login Modal for grocery end-->





@endsection
