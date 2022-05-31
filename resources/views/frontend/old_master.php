<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $seo = App\Models\Seo::first();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>{{ optional($seo)->meta_title }}</title>
    <meta name="title" content={{ optional($seo)->meta_title }}>
    <meta name="author" content={{ optional($seo)->meta_author }}>
    <meta name="description" content={{ optional($seo)->meta_description }} />
    <meta name="keywords" content={{ optional($seo)->meta_keyword }}>
    <meta name="google" content={{ optional($seo)->google_analytics }}>

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <link rel="shortcut icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css"
        integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Days+One&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl-Carousel  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"
        integrity="sha512-RWhcC19d8A3vE7kpXq6Ze4GcPfGe3DQWuenhXAbcGiZOaqGojLtWwit1eeM9jLGHFv8hnwpX3blJKGjTsf2HxQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--icon css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/themify.css ') }}">
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick.css ') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick-theme.css ') }}">
    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/animate.css ') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/bootstrap.css ') }}">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/islamic_color_11.css') }}"
        media="screen" id="color">
    <!-- -----------------------  Custom CSS for Sidebar and Other Pages ------------------------- -->
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/islamic_style.css ') }}">
    <!-- Selling Product CSS  -->
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/selling_product.css ') }}">

    {{-- new header top css --}}
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/bppshop_top_header.css ') }}">

    @yield('css')
</head>
<style>
    .slide-arrow {
        position: absolute;
        top: 50%;
        margin-top: -15px;
    }

    .prev-arrow {
        left: 40px;
        width: 0;
        height: 0;
        border-left: 0 solid transparent;
        border-right: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        z-index: 99;
    }

    .next-arrow {
        right: 40px;
        width: 0;
        height: 0;
        border-right: 0 solid transparent;
        border-left: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }
</style>

<body class="">
    @php
    @endphp
    <!--header start-->
    @include('frontend.body.header')
    <!--header end-->
    @include('frontend.body.fontend_sidber')
    @yield('islamic')
    <!-- Add to wishlist bar -->
    @include('frontend.body.mobile_sidbar_menu')
    <!-- Add to wishlist bar end-->
    <!-- add to  setting bar  start-->
    @include('frontend.body.addcart')
    @include('frontend.body.brands')
    <!-- Product Quick View Modal-->
    @include('frontend.body.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/conflict-detection.min.js"
        integrity="sha512-snlMxg0BDY6T/vdkGa4vLZYeOz/c33U1+d6r4z/xUNHgFRvX+ExspQ8bdH7uyAvxIRtURSKwKWX2uIIAKwnyLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--  jquery -->
    <script src=" {{ asset('frontend/assets/js/jquery-3.3.1.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/isotope.min.js') }} "></script>
    <!-- slick js-->
    <script src=" {{ asset('frontend/assets/js/slick.js') }} "></script>
    <!-- tool tip js -->
    <script src=" {{ asset('frontend/assets/js/tippy-popper.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/tippy-bundle.iife.min.js') }} "></script>
    <!-- popper js-->
    <script src=" {{ asset('frontend/assets/js/popper.min.js') }} "></script>
    <!-- ajax search js -->
    <script src=" {{ asset('frontend/assets/js/typeahead.bundle.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/typeahead.jquery.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/ajax-custom.js') }} "></script>
    <!-- Timer js-->
    <script src=" {{ asset('frontend/assets/js/menu.js') }} "></script>
    <!-- Bootstrap js-->
    <script src=" {{ asset('frontend/assets/js/bootstrap.js') }} "></script>
    <!-- father icon -->
    <script src=" {{ asset('frontend/assets/js/feather.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/feather-icon.js') }} "></script>
    <!-- Bootstrap js-->
    <script src=" {{ asset('frontend/assets/js/bootstrap-notify.min.js') }} "></script>
    <!-- Theme js-->
    <script src=" {{ asset('frontend/assets/js/script.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/modal.js') }} "></script>

    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>

    <!-- gmap js-->
    <script src="{{ asset('frontend/assets/libs/gmaps/gmaps.min.js') }} "></script>

    <!-- Init js-->
    <script src="{{ asset('backend/assets/js/pages/google-maps.init.js') }} "></script>

    <!-- -----------------------  Custom Js for Sidebar ------------------------- -->
    {{-- <script src=" {{ asset('frontend/sidebar.js') }} "></script> --}}
    <!-- -----------------------  Custom Js for Sidebar ------------------------- -->
    {{-- <script src=" {{ asset('frontend/sidebar.js') }} "></script> --}}
    <!-- Product mainMPP js / -->
    {{-- <script src=" {{ asset('frontend/assets/js/mainMPP.js') }} ">
    </script> --}}
    <!--script for slider-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('frontend/assets/js/jquery.picZoomer.js') }} "></script>
    @yield('script')
    {{-- sweet alert start --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '#cancel', function(e) {
                e.preventDefault();
                var link = document.getElementById('cancel').parentElement.getAttribute("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to cancel the order?",
                    icon: 'warning',
                    // iconHtml: '<img src="https://unsplash.com/photos/pJILiyPdrXI">',
                    showCancelButton: false,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(link);
                        window.location.href = link
                        Swal.fire(
                            'Canceled!',
                            'Your Order has been canceled.',
                            'success'
                        )
                    }
                })
            });
        }); // main funcations end
    </script>
    {{-- sweet alert end --}}


    {{-- </script> --}}
    {{-- sweet alert end --}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // product view model function
        function productView(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id ,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#product_id').val(id);
                    $('#pname').text(data.product.product_name);
                    $("#pmeta_desc").html(data.product.meta_desc);
                    // let pDetails = 
                    $('#pdetails').html(data.product.product_descp.slice(0, 200));
                    $('#pcode').text(data.product.product_code);
                    $('#punit').text(data.product.unit);
                    $('#pimg').attr('src', '/' + data.product.product_thambnail);

                    //------- Multi Image ---------
                    const multiImageCont = document.getElementById('modal_multiimage_cont');
                    let imageHTML = ``;
                    data?.multiimgs?.forEach((image, index) => {
                        imageHTML = imageHTML + `
                        <div class="column">
                            <img height="70" width="90" src="/${image?.photo_name}"
                                class="img-fluid" alt="Nature" onclick="changeQuickViewImage(this);">
                        </div>`;
                    });
                    multiImageCont.innerHTML = `${imageHTML}`;
                    if (data.product.discount_price === null) {
                        $('#discountprice').text(data.product.selling_price);

                    } else {
                        $('#discountprice').text(data.product.discount_price);
                        $('#sellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stockout');
                    }
                    //  load product color

                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'color_data')">${el}</p>
                                         
                                    </div>`;
                    });

                    $('#color_data').html(color);

                    let product_size = data.size.map((el) => {

                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this)">${el}</span>`;
                    });
                    $('#size_data').html(product_size);

                //   const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.subsubcategory.subsubcategory_slug_name}/${data.product.product_slug_name}`;
                    const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#details_link').attr("href", url);

                }
            })
        } // end function

        function sizeModalOnClick(element) {
            const sizeInner = document.getElementById('size_data').children;
            for (let i = 0; i < sizeInner.length; i++) {
                sizeInner[i].classList.remove('active');
            }
            element.classList.add('active');
        }

        function colorModalOnClick(element, id) {
            const sizeInner = document.getElementById(id).children;
            for (let i = 0; i < sizeInner.length; i++) {
                sizeInner[i].children[0].classList.remove('active');
            }
            element.classList.add('active');

        }

        function showStartInPstarUl(reviewData = 0) {
            // console.log(reviewData)
            const pstar = document.querySelector('#pstar');
            pstar.innerHTML = "";
            for (let i = 1; i <= reviewData; i++) {
                const li = document.createElement('li');
                li.innerHTML = `<i class="fas fa-star"></i>`;
                pstar.appendChild(li);
            }
        }
    </script>

    <script>
        < blade
        if | % 20(Session % 3 A % 3 Ahas( % 26 % 2339 % 3 Bmessage % 26 % 2339 % 3 B)) % 0 D >
            var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {

            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            default:
                break;
        } <
        /blade endif|%0D>
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

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
            addToCart(productId, productName, quantity, productSize, productColor);

        }

        function addToCart(getId, getName, getQuantity = 1, getSize, getColor) {

            var id = String(getId);
            var product_name = getName;
            var quantity = getQuantity;
            // add to cart post
            console.log(getSize);
            console.log(getColor);
            console.log(typeof getSize);
            console.log(typeof getColor);
            const Toast = Swal.mixin({
                toast: true,
                position: 'left',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            })
            if(getSize == "" || getColor == ""){
                Toast.fire({
                    type: 'warning',
                    title: "Please Select Color and Size"
                })
            }
            else{
                $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: getColor,
                    size: getSize,
                    quantity: quantity,
                    product_name: product_name
                },

                url: "/cart/data/store/" + id,
                success: function(data) {
                    // for auto update
                    $('#productQuickViewModal').modal('hide');
                    let width = screen.width;
                    if(width > 600){
                        document.getElementById("cart_side").classList.add('open-side');
                    }

                    couponCalculation();
                    miniCart();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'left',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,

                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            })
            }
            
        } // end function

        function addToCartFromModal() {
            var id = $('#product_id').val();
            var product_name = $('#pname').text();
            var quantity = $('#qty').val();


            const productSizeList = document.getElementById('size_data').children;    
            console.log(productSizeList);      

            let productSize = '';
            for (var i = 0; i < productSizeList.length; i++) {
                if (productSizeList[i].classList.contains('active')) {
                    productSize = productSizeList[i].getAttribute('eia-value');
                }
            }


            const productColorList = document.getElementById('color_data').children;
            let productColor = '';
            for (var i = 0; i < productColorList.length; i++) {
                if (productColorList[i].children[0].classList.contains('active')) {
                    productColor = productColorList[i].children[0].getAttribute('eia-value');
                }
            }


            addToCart(id, product_name, quantity, productSize, productColor);          
            
           
        } // end function

        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var miniCart = ""
                    var checkout = ""

                    $('#cartQty').text(response.cartQty);

                    let tax = 0;
                    let vat = 0;

                    $.each(response.carts, function(key, value) {
                        console.log(value, 'J');
                        tax = tax + (value.tax * value.qty);



                        // ------- Custom vat calculation --------
                        vat = vat + parseFloat(value.qty) * parseFloat(value.options.vat);


                        if (value.options.regular_price) {
                            miniCart += `
                                    <li class="cart-item">
                                    <div class="media">
                                        <a href="product-page(left-sidebar).html">
                                            <img alt="megastore1" class="me-3" src="{{ asset('${value.options.image}') }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="product-page(left-sidebar).html">
                                                <h4>${value.name}</h4>
                                            </a>

                                            <h5>

                                            <span>&#2547; ${value.subtotal} <span class="text-danger text-decoration-line-through me-2">&#2547; ${value?.options?.regular_price} </span> <span class="text-dark">Qty: ${value.qty}</span></span>
                                            <br>
                                            <span class="mt-1"><span class="text-dark">Color:</span> ${value?.options?.color}, <span class="text-dark">Size:</span> ${value?.options?.size}</span>
                                            </h5>
                                            <div class="addit-box">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <button type="submit"  id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-minus"><i class="fas fa-minus"></i></button>
                                                    <input class="qty-adj form-control" type="number" value="${value.qty}" />
                                                    <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-plus"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    </li>`
                        } else {
                            miniCart += `
                                    <li class="cart-item">
                                    <div class="media">
                                        <a href="product-page(left-sidebar).html">
                                            <img alt="megastore1" class="me-3" src="{{ asset('${value.options.image}') }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="product-page(left-sidebar).html">
                                                <h4>${value.name}</h4>
                                            </a>

                                            <h5>
                                            <span>&#2547; ${value.subtotal}  <span class="text-dark">Qty: ${value.qty}</span></span>
                                            <br>
                                            <span class="mt-1"><span class="text-dark">Color:</span> ${value?.options?.color}, <span class="text-dark">Size:</span> ${value?.options?.size}</span>
                                            </h5>
                                            <div class="addit-box">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <button type="submit"  id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-minus"><i class="fas fa-minus"></i></button>
                                                    <input class="qty-adj form-control" type="number" value="${value.qty}" />
                                                    <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-plus"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                   </li>`
                        }
                    });
                    $('#cart_product_container').html(miniCart);
                    $.each(response.carts, function(key, value) {
                        checkout += `<div class="checkout-product-cont">
                                              <p> ${value.name} * ${value.qty}</p>
                                              <p>&#2547; ${value.subtotal}</p>
                                           </div>`
                    });

                    $('#cart_checkout').html(checkout);


                    $('span[id="cartSubTotal"]').text(parseFloat(response.cartTotal) + vat);
                    $('span[id="tax"]').text(vat);
                    $('span[id="checkout_grandtotal"]').text(parseFloat(response.cartTotal) + vat);

                }
            })
        }
        couponCalculation();
        miniCart();
        /// mini cart remove Start
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
            couponCalculation();
        }
        //  end mini cart remove
    </script>
    <!--   Start Add Wishlist Page   -->
    <script type="text/javascript">
        function addToWishList(product_id) {

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }
        ///  Wishlist Function start  ////   -->
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                success: function(response) {
                    // console.log(response);

                    var rows = ""
                    $('#wishlistToShow').html('');
                    $.each(response, function(key, value) {

                        rows =

                            `<tr>
                            <td>
                                <div class="cart_product">

                                    <div class="item_content">
                                        <h4 class="item_title">${value.product.product_name}</h4>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <span class="price_text">${value.product.selling_price}</span>
                            </td>
                            <td>
                                <span class="total_price">${value.product.discount_price}</span>
                            </td>
                            <td>
                                <button  data-placement="top" class="btn btn-bg-text-primary py-0" title="Add To Cart" onclick="productView(${value.product_id})" data-bs-toggle="modal"
                                             data-bs-target="#productQuickViewModal"><small>Add to Cart</small><i
                                                class="fas fa-shopping-cart"></i></button>
                             <button type="submit"class="btn btn-bg-text-primary py-0" id="${value.id}" onclick="wishlistRemove(${this.id})"><i class="fas fa-trash"></i></button>


                            </td>
                        </tr>`;
                        $('#wishlistToShow').append(rows);

                    });


                }
            })
        }
        wishlist();


        ///  Wishlist remove Start
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,


                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        // End Wishlist remove
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {

                    couponCalculation();
                    miniCart();
                }
            });
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {

                    couponCalculation();
                    miniCart();
                }
            });
        }
    </script>
    {{-- CUPON AJAX START --}}
    <script>
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {

                    couponCalculation();
                    // coupon remove then auto page hide
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }
        //Coupon Calculation
        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    miniCart();
                    $('#gtotal').text(data.total_amount);
                    $('#dtotal').text(data.discount_amount);
                    if (data.cartTotal) {
                        $('#carttotal').text(data.cartTotal);
                    } else {
                        $('#carttotal').text(data.total_amount);
                    }

                    if (data.cartTotal != '0') {

                        $('#couponClaFiled').html(
                            `<div class="total">
                                Grand Total <span>${data.cartTotal}</span>
                            </div>`
                        )

                    } else {
                        $('#couponClaFiled').html(
                            `<div class="total">
                                Grand Total <span>00.00</span>
                            </div>`
                        )
                    }
                    if (data.coupon_name) {

                        $('#couponClaFiled').html(
                            `
                        <div class="mt-4">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h5>Coupon Name</h5>
                                    <h5>${data.coupon_name}</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5>Discount Amount</h5>
                                    <h5>$${data.discount_amount}</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5>Grand Total</h5>
                                    <h5>$${data.total_amount}</h5>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn fs-6" onclick="couponRemove()"><i class="fas fa-trash"></i> Delete Coupon</button>
                            </div>
                        </div>
                        `
                        )

                    }
                }
            });
        }
        couponCalculation();
    </script>
    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    // coupon calcution load
                    couponCalculation();

                    // coupon remove then auto page load
                    $('#couponField').show();

                    // old coupon code remove auto
                    $('#coupon_name').val('');


                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
    </script>


    {{-- CUPON AJAX END --}}
    @stack('js')
    <!-- Toastr cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
    default:
    break;
    }
    @endif


    <script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>
    <script src=" {{ asset('frontend/assets/js/productZoom.js') }} "></script>

</body>

</html>
