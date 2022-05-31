@extends('frontend.main_master')

@section('index')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .bottom-border {
            border-bottom: 1px solid rgb(192, 188, 188);
        }

        .checkout-form-wrap .checkout-form-inner .checkout-product-inner-cont {
            border-bottom: none;
        }

    </style>


    <main class="main-body">

        <!-- sidebar mobile menu & sidebar cart - start
                               ================================================== -->
        @include('frontend.body.mobile_sidbar_menu')
        <!-- sidebar mobile menu & sidebar cart - end
                               ================================================== -->

        <section class="main-content" id="main-content">
            <div class="container profile mt-3 px-0">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2">
                    <div class="checkout-header-wrap">
                        <div class="checkout-header">
                            <h4 style="color: #386938">Checkout</h4>
                            <div class="checkout-subhead">
                                <a href="#" class="">Home &#8250;</a>
                                <a href="#" class="">Cart &#8250;</a>
                                <a href="#" class=""> Checkout</a>
                            </div>
                            <!-- end whishlist-subhead  -->
                        </div>
                        <!-- end checkout-header  -->
                    </div>
                    <!-- end checkout-header-wrap  -->

                    <!-- end checkout-header-inner  -->
                    <div class="checkout-wrapper">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="checkout-form-wrap">
                                    <div class="checkout-header-inner">
                                        <h5 style="background-color:#386938 ; color:white">Billing Details</h5>
                                    </div>
                                    <div class="checkout-form-inner">
                                        <form class="register-form" method="POST"
                                            action="{{ route('checkout.storeorder') }}">
                                            @csrf
                                            <div class="row form-row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label for="">FullName</label>
                                                    <input type="text" class="form-control" name="shipping_name"
                                                        value="{{ Auth::user()->name }}" placeholder="Name">
                                                </div>
                                                <!-- end col  -->

                                                <div class="col-lg-12 col-md-12">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="shipping_phone" class="form-control"
                                                        value="{{ Auth::user()->phone }}" placeholder="Phone">
                                                </div>
                                                <!-- end col  -->
                                                <div class="col-lg-12 col-md-12">
                                                    <label for="">Email Address</label>
                                                    <input type="text" class="form-control" name="shipping_email"
                                                        value="{{ Auth::user()->email }}" placeholder="Email">
                                                </div>
                                                <!-- end col  -->

                                                <!-- end col  -->
                                                <div class="col-sm-12">
                                                    <label for=""> Division Select </label>
                                                    <select name="cdivision_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Division</option>
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division->id }}">{{ $division->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('cdivision_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- end col  -->
                                                <div class="col-sm-12" class="option_select" id="option_district_id">
                                                    <label for="">District Select</label>

                                                    <select name="cdistrict_id" id="cdistrict_id" required=""
                                                        class="form-control"> districts

                                                    </select>
                                                    @error('cdistrict_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- end col  -->
                                                <div class="col-sm-12">
                                                    <label for="">Thana</label>
                                                    <select name="cstate_id" class="form-control" id="cstate_id"
                                                        required="">


                                                    </select>
                                                    @error('cstate_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-12">
                                                    <label for="">Stree Address</label>
                                                    <input type="text" class="form-control" name="shipping_name"
                                                        value="#" placeholder="Name">
                                                    {{--  <select name="cstate_id" class="form-control" id="cstate_id"
                                                        required="">
                                                    </select>  --}}
                                                    @error('cstate_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <label for="">Postcode / Zip*</label>
                                                    <input type="text" name="post_code" class="form-control"
                                                        placeholder="post_code">
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <label for=""> Area / Zip*</label>
                                                    <input type="text" name="post_code" class="form-control"
                                                        placeholder="area">
                                                </div>

                                                <div class="col-lg-6 col-md-12">
                                                    <label for="">Floor</label>
                                                    <input type="text" class="form-control" name="shipping_name"
                                                        value="" placeholder="Name">
                                                </div>
                                                <!-- end col  -->
                                                <!-- end col  -->
                                                <div class="col-lg-6 col-md-12">
                                                    <label for="">Apartment</label>
                                                    <input type="text" name="shipping_phone" class="form-control"
                                                        value="" placeholder="Phone">
                                                </div>
                                                <!-- end col  -->

                                                <div class="col-sm-12">
                                                    <div><label for="">Order notes</label></div>
                                                    <textarea class="form-control" cols="100" rows="6" placeholder="Notes"
                                                        name="notes"></textarea>
                                                    {{-- <input type="text" class="form-control" placeholder="Postal Code"> --}}
                                                </div>


                                            </div>

                                    </div>
                                    <!-- end checkout-form-inner  -->
                                </div>
                                <!-- end checkout-form-wrap  -->
                            </div>
                            <!-- end col  -->






                            <div class="col-lg-6 ">
                                <div class="checkout-form-wrap pt-1">
                                    <div class="checkout-header-inner">
                                        <h5 style="background-color: #386938 ; color:white">Your Checkout Progress</h5>
                                    </div>

                                    <div class="checkout-form-inner">
                                        <div style="text-align: center">
                                            <h3 style="color: black">Grocery Shop</h3>
                                            <h5Alhaz Samssuddin Mansion (9thfloor),Moghbazar,
                                            New Eskaton, Ramna Dhaka-1217></h5>
                                            <h5>Office Phone: 01611815656</h5>
                                            <h5>BIN - 001181565-5566</h5>
                                            <h5>Mushak- 6.3</h5>
                                        </div>
                                        <div class="checkout-product-info">
                                            <div class="checkout-product-header">
                                                <h5> Product</h5>
                                                <h5> Total</h5>
                                            </div>
                                            <!-- end checkout-product-header-->
                                            {{-- @foreach ($carts as $item) --}}
                                            {{-- \id="cart_checkout" --}}
                                            <div class="checkout-product-inner-cont">
                                                @foreach ($carts as $item)
                                                    <div
                                                        class="cart_product d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="item_image">
                                                                <img height="60" width="60" class="img-fluid"
                                                                    src="{{ asset($item->options->image) }}">
                                                            </div>

                                                            <div class="ms-2">
                                                                <h5>{{ $item->name }}</h5>
                                                                <h6>Quantity: {{ $item->qty }}</h6>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h5>&#2547; {{ $item->qty * $item->price }}</h5>
                                                        </div>

                                                    </div>
                                                    <hr>



                                                    {{-- <span class="quantity_text">{{ $item->options->color }}</span>

                                                    <span class="total_price">{{ $item->options->size }}</span> --}}
                                                @endforeach
                                            </div>
                                            {{-- @endforeach --}}

                                            <!-- end checkout-product-inner-cont  -->

                                            <tr>
                                                @if (Session::has('coupon'))
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Tax: </strong>
                                                        <h6>
                                                        &#2547; <span id="tax"></span>
                                                        </h6>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>SubTotal: </strong>
                                                        <h6>&#2547; {{ $cartTotal }}</h6>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Coupon Name: </strong>
                                                        <h6>{{ session()->get('coupon')['coupon_name'] }}
                                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )</h6>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Coupon Discount: </strong>
                                                        <h6>&#2547; {{ session()->get('coupon')['discount_amount'] }}</h6>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Grand Total: </strong>
                                                        <h5>&#2547; {{ session()->get('coupon')['total_amount'] }}</h5>
                                                    </div>

                                                @else
                                                    <div class="d-flex justify-content-between">
                                                        <h5>Subtotal:</h5>
                                                        <h5>
                                                        &#2547;{{ $cartTotal }}
                                                        </h5>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <h5>Tax:</h5>
                                                        <h5>&#2547; <span id="tax"></span></h5>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <h5>Grand Total:</h5>
                                                        <h5>
                                                        &#2547;<span id="checkout_grandtotal"></span>
                                                        </h5>
                                                    </div>
                                                @endif
                                            </tr>
                                        </div>

                                        <!-- end checkout-product-cont-->
                                        <div class="checkout-total-radio">

                                            <!-- end checkout-product-cont-->
                                            <br>

                                            <div class="form-group">
                                                <div class="billing_payment_mathod mt-3">

                                                    <div class="checkbox_item mb-0 pl-0 d-flex align-items-center mb-2">
                                                        <label class="mb-0 me-2" for="check_payments">
                                                            <input class="mb-0" name="payment_method"
                                                                value="stripe" type="radio"> Stripe</label>
                                                        <img src={{ asset('frontend/assets/images/checkout/stripe.png') }}
                                                            alt="">
                                                    </div>

                                                    <div class="checkbox_item mb-0 pl-0 d-flex align-items-center mb-2">
                                                        <label class="mb-0 me-2" for="cash_delivery">
                                                            <input class="mb-0" name="payment_method" value="cash"
                                                                type="radio" required> Cash On Delivery </label>
                                                        <img src={{ asset('frontend/assets/images/checkout/cod.png') }}
                                                            alt="">
                                                    </div>

                                                    <div class="checkbox_item mb-0 pl-0 d-flex align-items-center mb-4">
                                                        <label class="mb-0 me-2" for="paypal_checkbox">
                                                            <input name="payment_method" value="card" type="radio"> Card<a
                                                                href="#!"></a></label>
                                                        <img src={{ asset('frontend/assets/images/checkout/visa.png') }}
                                                            alt="">
                                                    </div>

                                                    <button type="submit" class="btn btn-success px-4">PLACE ORDER</button>
                                                </div>

                                            </div>
                                            <!-- end form-check  -->



                                        </div>
                                        <!-- end form-group  -->


                                    </div>
                                    <!-- end checkout-total-radio  -->

                                    {{-- <div class="checkout-button-holder">
                                                <button type="submit" class="btn btn-success">PLACE ORDER</button>
                                            </div> --}}
                                    <!-- end checkout-button-holder -->
                                </div>
                                <!-- end checkout-product-inner-cont  -->
                                </form>
                            </div>
                            <!-- end checkout-product-info  -->
                        </div>
                        <!-- end checkout-form-inner  -->
                    </div>
                    <!-- end checkout-form-wrap  -->
                </div>
                <!-- end col  -->
            </div>
            <!-- end row  -->
            </div>
            <!-- end checkout-wrapper  -->




        </section>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="cdivision_id"]').on('change', function() {
                    var division_id = $(this).val();
                    $c = $('select[id="cstate_id"]').empty();
                    $d = $('select[name="cdistrict_id"]').empty();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/district/ajax') }}"+'/' + division_id,
                            type: "GET",
                            success: function(data) {
                                console.log('hrere');
                                $c = $('select[name="cstate_id"]').empty();
                                $d = $('select[name="cdistrict_id"]').empty();
                                console.log(data);
                                //
                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.district_name;
                                    // list.append(liItem);
                                    $('select[name="cdistrict_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                        });
                    } else {
                        alert('danger');
                    }
                });
                $('select[name="cdistrict_id"]').on('change', function() {
                    var district_id = $(this).val();
                    $c = $('select[name="cstate_id"]').empty();
                    if (district_id) {
                        $.ajax({
                            url: "{{ url('/state/ajax') }}"+'/' + district_id,
                            type: "GET",
                            success: function(data) {
                                console.log(data);
                                var d = $('select[name="cstate_id"]').empty();
                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.name;
                                    // list.append(liItem);
                                    $('select[name="cstate_id"]').append('<option value="' +
                                        value.id + '">' + value.name + '</option>'
                                    );
                                });
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>
    @endsection
