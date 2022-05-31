@extends('frontend.main_master')

@section('islamic')
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

            <div class="container">
                <div class="checkout-box ">
                    <div class="row" style="padding-top: 150px">
                        <div class="col-md-6">
                            <!-- checkout-progress-sidebar -->
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Your Shopping Amount </h4>
                                        </div>
                                        <div class="">
                                            <ul class="list-unstyled">
                                                <hr>
                                                <li>
                                                    @if (Session::has('coupon'))
                                                        <strong>SubTotal: </strong>
                                                        &#2547; {{ session()->get('coupon')['total_amount'] }}
                                                        <hr>
                                                        <strong>Coupon Name : </strong>
                                                        {{ session()->get('coupon')['coupon_name'] }}
                                                        ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                        <hr>
                                                        <strong>Coupon Discount : </strong>
                                                        &#2547; {{ session()->get('coupon')['discount_amount'] }}
                                                        <hr>
                                                        <strong>Grand Total : </strong>
                                                        &#2547; {{ session()->get('coupon')['total_amount'] }}
                                                        <hr>
                                                    @else
                                                        <strong>SubTotal: </strong> &#2547; {{ $cartTotal }}
                                                        <hr>
                                                        <strong>Grand Total : </strong> &#2547; <span id="checkout_grandtotal"></span>
                                                        <hr>
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-progress-sidebar -->
                        </div> <!--  // end col md 6 -->

                        <div class="col-md-6">
                            <!-- checkout-progress-sidebar -->
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                        </div>

                                        <form action="{{ route('cash.order') }}" method="POST" id="payment-form">
                                            @csrf

                                            <div class="form-row">
                                                <img style="height: 50"
                                                    src="{{ asset('frontend/assets/images/payments/cod.png') }}">
                                                <label for="card-element">
                                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                                    <input type="hidden" name="email"
                                                        value="{{ $data['shipping_email'] }}">
                                                    <input type="hidden" name="phone"
                                                        value="{{ $data['shipping_phone'] }}">
                                                    <input type="hidden" name="post_code"
                                                        value="{{ $data['post_code'] }}">
                                                    <input type="hidden" name="division_id"
                                                        value="{{ $data['division_id'] }}">
                                                    <input type="hidden" name="district_id"
                                                        value="{{ $data['district_id'] }}">
                                                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                                </label>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary">Submit Payment</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- checkout-progress-sidebar -->
                        </div><!--  // end col md 6 -->
                    </div><!-- /.row -->
                </div><!-- /.checkout-box -->
                <!-- === ===== BRANDS CAROUSEL ==== ======== -->
                <!-- ===== == BRANDS CAROUSEL : END === === -->
            </div><!-- /.container -->
        </section>
    @endsection
