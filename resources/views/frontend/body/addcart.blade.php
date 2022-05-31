<style>
    .modal-main-row {
        margin: 0;
    }

    .modal-img {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-img {
        background: #fff;
        width: 100%;
        height: 750px;
        margin: 0;
        padding: 0;
    }

    .modal-img img {
        /* width: 350px;
    height: 750px;
    padding: 0; */

        /* width: 300px;
    height: 650px; */
        width: 300px;
        height: 550px;
        margin: 40px 20px;
    }

    .modal-wrap {
        padding: 20px;
    }

    .modal-content-border {
        /* border-bottom: 1px solid #939B9E; */
        margin-bottom: 15px;
    }

    .modal-content-img {
        margin-bottom: 50px;
    }

    .modal-content-inner h3 {
        font-weight: 500;
        font-size: 24px;
        line-height: 34px;
        color: #444444;
    }

    .modal-content-img1 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img2 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img3 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img4 {
        background: #fff;
        width: 100px;
        height: 100px;
        border: 1px solid #d2d2d2;
    }

    .modal-content-img {
        width: 120px;
        height: 120px;
        border: 1px solid #d2d2d2;
        padding: 10px;
    }

    .modal-content-img img {
        width: 100px;
        height: 100px;
    }

    .modal-content-inner .pera {
        font-family: Poppins;
        font-size: 12px;
        line-height: 20px;
        color: #939b9e;
        margin-bottom: 15px;
    }

    .modal-offer {
        display: flex;
    }

    .modal-offer h5 {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        color: #ffbb34;
        margin-bottom: 10px;
        margin-right: 5px;
    }

    .modal-offer span {
        font-weight: 600;
        font-size: 12px;
        color: #444444;
        margin-right: 5px;
        margin-bottom: 10px;
    }

    .modal-offer span del {
        color: #939b9e;
    }

    .modal-rating span {
        font-size: 16px;
    }

    .modal-rating .yellow {
        color: #ffb31f;
    }

    .modal-rating {
        margin-bottom: 10px;
    }

    .modal-btn-holder .modal-btn1 {
        background: #e3e3e3;
        border-radius: 5px;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 15px;
        margin-bottom: 10px;
        padding: 6px 20px;
        margin-right: 8px;
        color: #111;
    }

    .modal-cart-innr span h4 {
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 17px;
        color: #444444;
        margin-bottom: 10px;
        margin-right: 30px;
    }

    .modal-cart-innr span h4 span {
        font-weight: 600;
    }

    .modal-cart-innr .liner {
        position: relative;
    }

    .modal-cart-innr .liner::before {
        position: absolute;
        content: " ";
        width: 2px;
        height: 22px;
        background: #939b9e;
        top: 4%;
        right: 13px;
    }

    .modal-cart-innr p {
        font-size: 12px;
        line-height: 19px;
        font-family: Roboto;
        color: #000000;
    }

    .modal-clr .clr1,
    .clr2,
    .clr3,
    .clr4,
    .clr5,
    .clr6,
    .clr7 {
        width: 26px;
        height: 26px;
        background: pink;
        border-radius: 50%;
        margin: 10px 0;
    }

    .modal-clr .clr2 {
        background: #3c96ff;
    }

    .modal-clr .clr3 {
        background: #000000;
    }

    .modal-clr .clr4 {
        background: #1f9b00;
    }

    .modal-clr .clr5 {
        background: #ffd12e;
    }

    .modal-clr .clr6 {
        background: #f9b92e;
    }

    .modal-clr .clr7 {
        background: #ef0000;
    }

    .cart-add-btn-holder .cart-btn {
        background: var(--primary);
        font-family: Roboto;
        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 17px;
        display: flex;
        align-items: center;
        color: #ffffff;
        padding: 11px 20px;
        border-radius: 5px;
        margin-right: 5px;
        margin-bottom: 10px;
    }

    .cart-add-btn-holder .cart-btn i {
        padding: 0 5px;
    }

    .image-list .column img {
        margin-top: 10px;
        margin-bottom: 10px;
        border: 1px solid rgb(206, 206, 206);
    }

    .product-color-list div {
        margin: 5px;
        text-align: center;
    }

    .product-color-list div img {
        border: 1px solid rgb(206, 206, 206);
    }

    .product-size .size-inner span {
        background: #c9c9c9;
        padding: 1px 12px;
        color: #fff;
        margin-right: 15px;
        border-radius: 5px;
        font-size: 20px;
        font-weight: normal;
    }

    .product-size .size-inner {
        margin-bottom: 12px;
    }

    .product-size .size-inner span:hover {
        background: #FFA800;
    }

    .product-size .size-inner .size-clr.active {
        background: #FFA800;
    }

    .color-family {
        border: 1px solid #c9c9c9;
        padding: 4px 16px;
        font-size: 16px;
        border-radius: 6px;
    }

    .color-family:hover {
        border: 1px solid #FFA800;
        padding: 4px 16px;
        font-size: 16px;
        border-radius: 6px;
    }

    .product-color-list .color-family.active {
        border: 1px solid #FFA800;
    }

    .discountprice {
        color: green;
        font-size: 16px;
        font-weight: bold;
    }

    #sellingprice {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
        margin-right: 5px;
    }

    .sellingprice {
        font-family: Montserrat;
        font-style: normal;
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 10px;
    }
</style>



<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right">
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div id="cart_side">

            </div>
        </div>
        <div class="cart_media">
            <ul id="cart_product_container" class="cart_product">
            </ul>
            <ul class="cart_total ">
                <li class="mx-3">
                    <div class="total">
                        Grant total<span id="cartSubTotal"></span>
                    </div>
                </li>

                <li class="mx-3">
                
                </li>

                </li>
                <li>
                    <div class="buttons d-flex justify-content-center">
                        <a href="{{ route('checkout') }}" type="submit" class="btn"><span
                                class="btn-primary-filled px-4 py-2">PLACE
                                ORDER</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Product Quick View Modal-->
<div class="modal fade" id="productQuickViewModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered product-quick-view-modal">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-design" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row modal-main-row w-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-0 modal-syle-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-8 col-sm-12 col-12 d-flex align-items-center">
                                <img id="pimg" src="{{ asset('') }}"
                                    class="img-fluid product-quickview-image" alt="">
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12 col-12">
                                <div class="row h-100 px-2 py-4">
                                    <div id="modal_multiimage_cont" class="image-list col-lg-2 w-100">
                                        <div class="column">
                                            <img height="70" width="90"
                                                src="{{ asset('') }}"
                                                class="img-fluid" alt="Nature" onclick="changeQuickViewImage(this);">
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal-img  -->
                            </div>
                        </div>
                        <!-- end col  -->
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="modal-wrap">
                            <div class="row w-100">
                                <!-- end col  -->
                                <div class="col-lg-12  col-md-12 col-sm-12">

                                    <div class="modal-content-inner modal-content-border ">
                                        <h3 id="pname"></h3>
                                        <div class="d-flex">
                                            
                                          <div class="mt-2">
                                                <span class="me-2" style="font-size: 16px; font-weight:bold !important; color:#cf6208 !important;"><span class="fs-6" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> &#2547;
                                                    <span class="fw-bold" id="price" style="font-weight:bold; color:#cf6208 !important; font-size: 16px " > </span> </span>
                                                    
                                                <span style="font-size: 16px; font-weight:bold !important; color:red !important" ><span class="fs-6"></span> <s> &#2547;
                                                <span class="primary-text fw-bold" id="oldprice" style="font-size: 16px; font-weight:bold !important; color:red !important"></span> </s> </span>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- end modal-offer  -->
                                         <div id="pvm-rating" class="modal-rating">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                        </div>
                                        <p class="pera" id="pdetails"> </p>
                                        <p style="width: 0px: height: 0px" id="product_id"></p>

                                        <div class="modal-cart-innr d-flex align-items-center flex-wrap">
                                            <span class="liner">
                                                <h4>Product Material: <span id="pmtrl" style="color: Crimson">
                                                    </span>
                                                </h4>
                                            </span>
                                            <span>
                                                <h4>Stock: <span id="aviable" style="color: green;"></span></h4>
                                            </span>
                                        </div>
                                        <!-- end modal-cart-innr  -->
                                        <div class="product-size pt-2">
                                            <h4 class="mb-2">Size </h4>
                                            <div class="size-inner" id="size_data">
                                            </div>
                                        </div>
                                        <div class="product-color py-3">
                                            <h4>Color Family :</h4>
                                            <div class="product-color-list d-flex col-lg-2 w-100" id="color_data">

                                            </div>
                                        </div>


                                        <div class="product-details-quantity quality-inner">
                                            <h4 class="product-title">Quantity</h4>
                                            <div class="product-quantity-inner">
                                                <button onclick="quickViewQunatityIncr(event)"><i
                                                        class="fas fa-plus"></i></button>
                                                <input id="qty" type="text" value="1">
                                                <button onclick="quickViewQunatityDec(event)"><i
                                                        class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <!-- end quality-inner  -->

                                        <div
                                            class="cart-add-btn-holder d-flex justify-content-start align-items-center flex-wrap mt-4">
                                            <a href="#" class="cart-btn" onclick="addToCartFromModal()"> <i
                                                    class="fas fa-shopping-cart "> </i> Add
                                                to Cart </a>
                                            <a id="details_link" class="cart-btn"><i class="fas fa-shopping-cart"></i>Details</a>
                                        </div>
                                    </div>
                                    <!-- end modal-content-inner  -->
                                </div>
                                <!-- end col  -->

                                <div class="col-lg-9 col-sm-12">

                                    <!-- end cart-add-btn-holder  -->

                                </div>
                                <!-- end col  -->
                            </div>
                            <!-- end row  -->

                        </div>
                        <!-- end modal-wrap  -->
                    </div>
                    <!-- end col  -->
                </div>
                <!-- end row  -->
            </div>
            <!-- end modal-body  -->
        </div>
    </div>
</div>


<script>
    function myGallary(images) {
        var image = document.getElementById("pimg");
        image.src = images.src;
    }
</script>
