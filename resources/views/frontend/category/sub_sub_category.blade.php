@extends('frontend.main_master')
@section('islamic')
<section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3 mt-3">
        <!-- breadcrumb end -->
        <!-- ~~~~filter button starts~~~~~ -->

        <!-- ~~~~filter button ends~~~~~ -->
        @if(($subsubcategories->isNotEmpty()))
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
                            <img src=" {{ asset('frontend/assets/images/category/sub-cat/image 170.png') }} " alt=""
                                height="100px" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb start -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.view') }}">All
                        Category </a></li>

                <li class="breadcrumb-item">
                    <a href="">
                        {{ Request::segment(2) }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">
                        {{ Request::segment(3) }} </a>
                </li>

            </ol>
        </nav>
        <div class="product_items">
            <div id="category_view_cont" class="ec-card-group cause_parent">
                @forelse ($subsubcategories as $subsubcategory)
                <div id="subcategoryShow{{ $subsubcategory->id }}" class="ec-card-lg subCategroyCard">
                    <a
                        href="{{ url('/bs/'.$subsubcategory->category->category_slug_name.'/'. $subsubcategory->subcategory->sub_category_slug_name.'/'. $subsubcategory->subsubcategory_slug_name) }}">
                        <div class="ec-card-inner">
                            <img class="img-fluid" src=" {{ asset($subsubcategory->subsubcategory_image) }} " alt="">
                            <h4 class="text-dark text-center mt-2">{{ $subsubcategory->subsubcategory_name }}</h4>
                        </div>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        {{-- @php
        $products = App\Models\Product::where('sub_category_id',$getsubsubcategory[0]->id)->get();
        @endphp
        @if($products)
        <!-- breadcrumb start -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb category-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('category.view') }}">All
                        Category </a></li>

                @foreach ($getsubsubcategory1 as $getsubsubcat)
                <li class="breadcrumb-item"><a
                        href="{{ url('/'.$getsubsubcat->category->category_slug_name.'/'. $getsubsubcat->subcategory->sub_category_slug_name) }}">{{
                        $getsubsubcat['subcategory']['sub_category_name'] }}</a>
                </li>
                @endforeach
            </ol>
        </nav> --}}
        {{-- <section class="popular-products">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                <div id="products-cont" class="ec-card-group zoom-gallery portfolio-2 px-lg-5 py-lg-5 px-3 py-3">
                    @foreach ($products as $subsubcat)
                    <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner">
                            <div class="border-portfolio">
                                <div class="card product-port">
                                    <div class="image-overlay-container">
                                        <img class="img-fluid" src=" {{ asset($subsubcat->product_thambnail) }} "
                                            alt="">
                                    </div>
                                    <div class="text-center my-3">
                                        <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                        <b style="font-size:18px">{{ $subsubcat->unit }} </b>
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

                                        <!--  -->

                                    </div>
                                    <?php
                                 $productName = strval("'" . $subsubcat->product_name . "'");
                                  ?>
                                    <div class="overlay-background">
                                        <button class="overlay-add-to-bag" onclick="productView({{ $subsubcat->id }})"
                                            data-bs-toggle="modal" data-bs-target="#productQuickViewModal"> Add to <br>
                                            Shopping <br> Bag </button>

                                        <a class="overlay-details-link" onclick="productView({{ $subsubcat->id }})"
                                            data-bs-toggle="modal" data-bs-target="#productQuickViewModal">Details
                                            >></a>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center cart-details-btn">
                                    <a onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                        data-bs-target="#productQuickViewModal"><button
                                            class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                            To Cart
                                        </button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        {{-- @endif --}}
        @else
        <div class="row px-md-5 px-2 bg-white p-2">
            <form id="filterForm" class="col-md-9">
                @php
                $maxPrice = 10;
                @endphp
                @foreach($productUnderSubCategory as $subsubcat)
                {{-- ---------- Get Max Price ----------- --}}
                @php

                if ((float) $subsubcat->selling_price > $maxPrice) {
                $maxPrice = (float) $subsubcat->selling_price;
                }
                @endphp
                @endforeach
                @php
                $step = $maxPrice / 100;
                @endphp

                <div class="d-flex">
                    <div data-role="page">
                        <div data-role="header">
                            <h6 class="mb-2">By Price</h6>
                        </div>
                        <div class="range-slider">
                            <input name="minPrice" value="0" min="0" max="{{ $maxPrice }}" step="{{ $step }}"
                                type="range">
                            <input name="maxPrice" value="{{ $maxPrice }}" min="0" max="{{ $maxPrice }}"
                                step="{{ $step }}" type="range">
                            <div class="pt-3">
                                <span>Range: </span><span class="rangeValues"></span>
                            </div>
                        </div>
                    </div>

                    <div class="ms-4 d-flex align-items-center">
                        <button type="submit" id="filter-btn" class="btn btn-primary-filled px-4">
                            <i class="fas fa-filter text-white"></i>
                            Filter
                        </button>
                    </div>

                </div>



                <input id="subCategory_input" name="subCategory" type="hidden"
                    value="{{ $productUnderSubCategory1?$productUnderSubCategory->first()->sub_category_id:''}}">

            </form>
            <div class="col-md-3 sortby--dropdown check d-flex align-items-center mt-3 mt-md-0" id="filtercombo"
                data-role="fieldcontain">
                <select style="width: auto" id="select_sort_by" class="form-select country"
                    aria-label=".form-select-lg example">
                    <option selected disabled>Sort by:</option>
                    <option value="oldest">Oldest</option>

                    <option value="newest"> Newest</option>

                    <option value="price_low_high">Price: Low to High</option>
                    <option value="price_high_low">Price:High to Low</option>
                    <option value="alphabhatic_a-z" id="alphabhaticOrder">Name: A-Z</option>
                    <option value="alphabhatic_z-a">Name: Z-A</option>
                </select>
            </div>
        </div>

        <section class="popular-products">
            <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
                <div id="products-cont" class="ec-card-group zoom-gallery portfolio-2 px-lg-5 py-lg-5 px-3 py-3">
                    @foreach ($productUnderSubCategory as $subsubcat)
                    <div class="isotopeSelector filter all ec-card-lg">
                        <div class="overlay ec-card-inner">
                            <div class="border-portfolio">
                                <div class="card product-port">
                                    <div class="image-overlay-container">
                                        <img class="img-fluid" src=" {{ asset($subsubcat->product_thambnail) }} "
                                            alt="">
                                    </div>
                                    <div class="text-center my-3">
                                        <h4 class="text-dark">{{ $subsubcat->product_name }}</h4>
                                        <b style="font-size:18px">{{ $subsubcat->unit }} </b>
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

                                    <?php
                                            $productName = strval("'" . $subsubcat->product_name . "'");
                                            ?>
                                    <div class="overlay-background">
                                        <button class="overlay-add-to-bag" onclick="productView({{ $subsubcat->id }})"
                                            data-bs-toggle="modal" data-bs-target="#productQuickViewModal"> Add to <br>
                                            Shopping <br> Bag </button>
                                        <a class="overlay-details-link" onclick="productView({{ $subsubcat->id }})"
                                            data-bs-toggle="modal" data-bs-target="#productQuickViewModal">Details
                                            >></a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center cart-details-btn">

                                    <a onclick="productView({{ $subsubcat->id }})" data-bs-toggle="modal"
                                        data-bs-target="#productQuickViewModal"><button
                                            class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                            To Cart
                                        </button></a>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

    </div>
    <div class="causes_div">
    </div>
    <div class="container-fluid">
    </div>
    </div>
    </div>
    </div>

</section>
@endsection
@section('script')
@section('script')
<script>
    //--------------- Price Slider ---------------
function getCategoryPriceSliderValue() {
    // Get slider values
    let parent = this.parentNode;
    let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat(slides[0].value);
    let slide2 = parseFloat(slides[1].value);
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
        let tmp = slide2;
        slide2 = slide1;
        slide1 = tmp;
    }

    let displayElement = parent.getElementsByClassName("rangeValues")[0];
    displayElement.innerHTML = "৳ " + slide1 + " - ৳ " + slide2;
}

window.onload = function() {
    // Initialize Sliders
    let sliderSections = document.getElementsByClassName("range-slider");
    for (let x = 0; x < sliderSections.length; x++) {
        let sliders = sliderSections[x].getElementsByTagName("input");
        for (let y = 0; y < sliders.length; y++) {
            if (sliders[y].type === "range") {
                sliders[y].oninput = getCategoryPriceSliderValue;
                // Manually trigger event first time to display values
                sliders[y].oninput();
            }
        }
    }
}


$(document).ready(function() {
    $('#filterForm').submit(function(e) {
        e.preventDefault();
        const formData = $('#filterForm').serializeArray();
        let brandArray = [];
        let maxPrice = 0;
        let minPrice = 0;
        let subCategory = '';


        formData.forEach(data => {
            if (data.name === 'brand') {
                brandArray = [...brandArray, data.value];
            } else if (data.name === 'minPrice') {
                minPrice = data.value;
            } else if (data.name === 'maxPrice') {
                maxPrice = data.value;
            } else if (data.name === 'subCategory') {
                subCategory = data.value;
            }
        });

        const submitFormData = {
            minPrice: minPrice,
            maxPrice: maxPrice,
            subCategory: subCategory
        }


        $.ajax({
            type: 'POST',
            url: '/post/filteredProduct2',
            data: submitFormData,
            dataType: "json",
            success: function(response) {
                let productsContainterHtml = '';
                response.forEach(subsubcat => {

                    let priceHTML = '0';
                    if (subsubcat.discount_price === null) {
                        price = subsubcat.selling_price;
                    } else {
                        price =
                            `<span class="text-dark">${subsubcat.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${subsubcat.selling_price}</s>`;
                    }
                    const productHtml =
                        `
                                <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                    <img class="img-fluid"
                                                        src="../../../${subsubcat.product_thambnail}" alt="">
                                                </div>
                                                <div class="text-center my-3">
                                                    <h4 class="text-dark">${subsubcat.product_name}</h4>


                                                    <h4 style="padding:5px">
                                                        <span style="font-size:15px">৳</span> ${price}
                                                    </h4>
                                                </div>

                                                <div class="overlay-background">
                                                  <button class="overlay-add-to-bag" onclick="productView(${subsubcat.id})"
                                                    data-bs-toggle="modal" data-bs-target="#productQuickViewModal" >
                                                     Add to <br> Shopping <br> Bag
                                                </button>

                                                    <a class="overlay-details-link"
                                                        onclick="productView(${subsubcat.id})" data-bs-toggle="modal"
                                                        data-bs-target="#productQuickViewModal">Details
                                                        >></a>


                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">
                                            <a onclick="productView(${subsubcat.id}" data-bs-toggle="modal"
                                           data-bs-target="#productQuickViewModal"><button
                                               class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                               To Cart
                                           </button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                    productsContainterHtml = productsContainterHtml +
                        productHtml;
                });
                $('#products-cont').html(productsContainterHtml);
            }
        });
    });
});
</script>

{{-- for sorting --}}
<script>
    $(document).ready(function() {
    const renderResponseToProduct = (response) => {
        let product_view_cont_html = '';
        response.forEach(product => {

            let priceHTML = '0';
            if (product.discount_price === null) {
                price = product.selling_price;
            } else {
                price =
                    `<span class="text-dark">${product.discount_price}</span>, <span style="font-size:15px">৳</span><s class="text-danger">${product.selling_price}</s>`;
            }
            const productHtml =
                `
                                <div class="isotopeSelector filter all ec-card-lg">
                                    <div class="overlay ec-card-inner">
                                        <div class="border-portfolio">
                                            <div class="card product-port">
                                                <div class="image-overlay-container">
                                                    <img class="img-fluid"
                                                        src="../../${product.product_thambnail}" alt="">
                                                </div>
                                                <div class="text-center my-3">
                                                    <h4 class="text-dark">${product.product_name}</h4>

                                                    <h4 style="padding:5px">
                                                        <span style="font-size:15px">৳</span> ${price}
                                                    </h4>
                                                </div>

                                                <div class="overlay-background">
                                                     <button class="overlay-add-to-bag" onclick="productView(${product.id})"
                                                     data-bs-toggle="modal" data-bs-target="#productQuickViewModal"
                                                       > Add to <br> Shopping <br> Bag </button>

                                                          <a class="overlay-details-link"
                                                       onclick="productView(${product.id})" data-bs-toggle="modal"
                                                       data-bs-target="#productQuickViewModal">Details
                                                       >></a>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center cart-details-btn">


                                                 <a onclick="productView(${product.id})" data-bs-toggle="modal"
                                               data-bs-target="#productQuickViewModal"><button
                                                   class="btn btn-primary-filled px-4"><i class="fas fa-cart-plus me-2"></i>Add
                                                   To Cart
                                               </button></a>


                                            </div>
                                        </div>
                                    </div>
                                </div>`;

            product_view_cont_html = product_view_cont_html + productHtml;
        });

        $('#products-cont').html(product_view_cont_html);
    }


    $('#select_sort_by').change(function() {
        // const selectedValue = $('#select_sort_by').find(":selected").text();
        const subCategory = $('#subCategory_input').val();
        const selectedValue = $('#select_sort_by').val();


        $.ajax({
            type: 'GET',
            url: '/get/subproductSort/' + subCategory,
            success: function(response) {
                if (selectedValue === 'alphabhatic_a-z') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name < b.product_name) {
                            return -1;
                        }
                        if (a.product_name > b.product_name) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'alphabhatic_z-a') {
                    function alphabhaticReorder(a, b) {
                        if (a.product_name > b.product_name) {
                            return -1;
                        }
                        if (a.product_name < b.product_name) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);

                } else if (selectedValue === 'price_low_high') {
                    function alphabhaticReorder(a, b) {
                        if (a.selling_price < b.selling_price) {
                            return -1;
                        }
                        if (a.selling_price > b.selling_price) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'price_high_low') {
                    function alphabhaticReorder(a, b) {
                        if (a.selling_price > b.selling_price) {
                            return -1;
                        }
                        if (a.selling_price < b.selling_price) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'newest') {
                    function alphabhaticReorder(a, b) {
                        if (a.id < b.id) {
                            return -1;
                        }
                        if (a.id > b.id) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                } else if (selectedValue === 'oldest') {
                    function alphabhaticReorder(a, b) {
                        if (a.id > b.id) {
                            return -1;
                        }
                        if (a.id < b.id) {
                            return 1;
                        }
                        return 0;
                    }
                    response.sort(alphabhaticReorder);
                    renderResponseToProduct(response);
                }
            }
        });
    });
});
</script>

@endsection
