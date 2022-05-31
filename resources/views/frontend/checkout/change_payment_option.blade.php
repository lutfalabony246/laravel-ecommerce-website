@extends('frontend.main_master')

@section('islamic')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .card-payments {
            background: #D8F4D8;
            border-radius: 10px;
            text-align: center;
            padding: 15px 30px;
            border: none;
         }
         .card-payments .card-body p {
            font-weight: 300;
            font-size: 16px;
            line-height: 22px;
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
         }
         .card-payments .card-body h6 {
            font-weight: 400;
            font-size: 14px;
            line-height: 19px;
            text-align: center;
            color: #000000;
            margin-bottom: 10px;
         }
         .card-payments .card-body h4 {
            font-weight: 600;
            font-size: 20px;
            line-height: 27px;
            text-align: center;
            color: #000000;
         }
         .card-img {
            margin-bottom: 20px;
         }
         .payment-box {
            background: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
         }
         .payment-box h6 {
            font-family: 'Nunito';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 19px;
            color: #000000;
         }
         .payment-del-box p {
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #232323;
         }
         .payment-del-box span {
            font-weight: 600;
            font-size: 12px;
            line-height: 16px;
            color: #232323;
         }
         .or-innr {
            position: relative;
            text-align: center;
         }
         .or-innr h4 {
            position: relative;
            font-weight: 300;
            font-size: 12px;
            line-height: 16px;
            color: #232323;
         }
         .or-innr::before {
            position: absolute;
            content: " ";
            width: 220px;
            border: 1px solid #D1D1D1;
            background: #232323;
            top: 50%;
            left: 10px;
         }
         .or-innr::after {
            position: absolute;
            content: " ";
            width: 220px;
            border: 1px solid #D1D1D1;
            background: #232323;
            top: 50%;
            right: 10px;
         }
         .credit-card-inners {
            background: #FFFFFF;
            border: 0.5px solid #DEE2E6;
            box-sizing: border-box;
            border-radius: 5px;
         }
         .trxid {
            font-weight: 300;
            font-size: 14px;
            line-height: 19px;
            text-decoration-line: underline;
            color: #000000;
         }
         .order-details-card {
            background: #F0FBF0;
            border-radius: 10px;
            border: none;
            padding: 15px 30px;
         }
         .order-details-card h4 {
            font-weight: 600;
            font-size: 24px;
            line-height: 33px;
            color: #4D4D4D;
            margin-bottom: 10px;
         }
         .card-body-details-innr .details-order {
            margin-bottom: 10px;
         }
         .card-body-details-innr .details-order h6 {
            font-weight: 400;
            font-size: 16px;
            line-height: 22px;
            color: #3A3A3A;
         }
         .card-body-details-innr .details-order .price-text {
            font-weight: 600;
            color: #232323;
         }
         .order-form-control {
            border: none;
            font-size: 20px;
            font-weight: 300;
            font-size: 14px;
            line-height: 19px;
            color: #7D7D7D;
            line-height: 40px;
            margin-right: 5px;
         }
         .jfss-btn {
            background: #3DC73C;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            transform: matrix(-1, 0, 0, 1, 0, 0);
            padding: 10px 15px;
            color: #fff;
            font-size: 20px;
         }
         .jfss-btn-shop {
            background: #F9B92E;
            border-radius: 5px;
            font-weight: 600;
            font-size: 18px;
            line-height: 22px;
            text-align: center;
            text-transform: uppercase;
            color: #FFFF;
            padding: 10px 60px;
         }
         
         
         
         
         @media(max-width:1200px) {
            .or-innr::before {
               width: 165px;
            }
            .or-innr::after {
               width: 165px;
            }
         }
         @media(max-width:992px) {
            .or-innr::before {
               width: 122px;
            }
            .or-innr::after {
               width: 122px;
            }
         }
         @media(max-width:768px) {
            .or-innr::before {
               width: 180px;
            }
            .or-innr::after {
               width: 180px;
            }
         }
         @media(max-width:576px) {
            .or-innr::before {
               width: 175px;
            }
            .or-innr::after {
               width: 175px;
            }
         }
         @media(max-width:420px) {
            .or-innr::before {
               width: 145px;
            }
            .or-innr::after {
               width: 145px;
            }
         }
         @media(max-width:375px) {
            .or-innr::before {
               width: 145px;
            }
            .or-innr::after {
               width: 145px;
            }
         }
         @media(max-width:360px) {
            .or-innr::before {
               width: 125px;
            }
            .or-innr::after {
               width: 125px;
            }
         }

    </style>


    <main class="main-body">

        @include('frontend.body.mobile_sidbar_menu')
        <!-- sidebar mobile menu & sidebar cart - end -->




        <section class="main-content category-closed" id="main-content">
            <!--home slider start-->

            <section class="cart-section">

               <div class="container">
                  <div class="row">
                     <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="cart-wrapper my-4">
                           <div class="cart-inner">
                              <div class="card card-payments">
                                 <div class="card-body">
                                    <p class="">Your Order is on its way</p>
                                    <div class="card-img d-flex justify-content-center align-items-center">
                                       <img src=" {{ asset('/frontend/assets/images/checkout/bg_payment.png') }} " alt="" class="img-fluid">
                                    </div>
                                    <!-- end card-img  -->
                                    <h6>Selected Delivery Slot</h6>

                                    <h4>{{ $payments->delivery_time }}</h4>
                                 </div>
                                 <!-- end card-body  -->
                                 <div class="card-footers">
                                    <div class="payment-box d-flex justify-content-between align-items-center">
                                       <h6>Pay with</h6>

                                       <div class="payment-del-box">
                                          <p>
                                             <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                   d="M14.3719 5.29022V8.97982L16.6968 8.09568L13.4751 0.00488281L0.302734 5.29022"
                                                   fill="#6F9935" />
                                                <path
                                                   d="M15.0419 8.7201V4.62012H1.97085L0.972656 5.02075V5.2898H14.3722V8.97452L15.0419 8.7201Z"
                                                   fill="#658B30" />
                                                <path d="M0.302734 5.29004H14.3719V13.9998H0.302734V5.29004Z"
                                                   fill="#79A73A" />
                                                <path
                                                   d="M1.64307 8.20906C2.01632 8.09741 2.35597 7.89473 2.63145 7.61925C2.90694 7.34376 3.10962 7.00411 3.22126 6.63086H11.4554C11.5669 7.00416 11.7696 7.34384 12.0451 7.61934C12.3206 7.89483 12.6602 8.09749 13.0335 8.20906V11.0827C12.6602 11.1943 12.3206 11.397 12.0451 11.6724C11.7696 11.9479 11.5669 12.2876 11.4554 12.6609H3.22028C3.10873 12.2878 2.9062 11.9482 2.6309 11.6727C2.35559 11.3973 2.01614 11.1945 1.64307 11.0827V8.20906Z"
                                                   fill="#AAC16B" />
                                                <path
                                                   d="M7.33729 11.3201C8.2622 11.3201 9.01199 10.5703 9.01199 9.6454C9.01199 8.72049 8.2622 7.9707 7.33729 7.9707C6.41239 7.9707 5.6626 8.72049 5.6626 9.6454C5.6626 10.5703 6.41239 11.3201 7.33729 11.3201Z"
                                                   fill="#79A73A" />
                                                <path
                                                   d="M14.1403 5.2914L13.3458 3.24434L13.3098 3.15466C12.9226 3.1891 12.533 3.12698 12.1757 2.97387C11.8185 2.82076 11.5047 2.58145 11.2627 2.27734L11.173 2.31341L3.98779 5.2914H14.1403Z"
                                                   fill="#AAC16B" />
                                                <path d="M5.60303 4.62012L3.98779 5.2898H14.1403L13.88 4.62012H5.60303Z"
                                                   fill="#89B140" />
                                                <path
                                                   d="M3.6532 9.98121C3.8384 9.98121 3.98853 9.83107 3.98853 9.64588C3.98853 9.46068 3.8384 9.31055 3.6532 9.31055C3.468 9.31055 3.31787 9.46068 3.31787 9.64588C3.31787 9.83107 3.468 9.98121 3.6532 9.98121Z"
                                                   fill="#79A73A" />
                                                <path
                                                   d="M11.0228 9.98121C11.208 9.98121 11.3582 9.83107 11.3582 9.64588C11.3582 9.46068 11.208 9.31055 11.0228 9.31055C10.8376 9.31055 10.6875 9.46068 10.6875 9.64588C10.6875 9.83107 10.8376 9.98121 11.0228 9.98121Z"
                                                   fill="#79A73A" />
                                             </svg>


                                             Cash on Delivery : <span> ৳  {{ $payments->amount }}</span>
                                          </p>
                                       </div>
                                       <!-- end payment-del-box  -->

                                    </div>
                                    <!-- end payment-box  -->
                                 </div>
                                 <!-- end card-footer  -->
                              </div>
                              <!-- end card  -->
                           </div>
                           <!-- end cart-inner  -->

                           <div class="or-innr my-4">
                              <h5>Or</h5>
                           </div>
                           <!-- end or-innr  -->

                           <div class="card mb-3 credit-card-inners">
                              <div class="card-body">
                                 <div class="credit-card d-flex justify-content-between align-items-center">
                                    <h5>Credit / Debit Card</h5>

                                    <div class="credit-card-img">
                                       <img src="{{ asset('frontend/assets/images/checkout/master.png') }}" alt="" class="mx-1 ">
                                       <img src="{{ asset('frontend/assets/images/checkout/visa.png') }}" alt="" class="mx-1 ">
                                       <img src="{{ asset('frontend/assets/images/checkout/ame.png') }}" alt="" class="mx-1 ">
                                    </div>
                                    <!-- end credit-card-img   -->

                                 </div>
                                 <!-- end credit-card  -->
                              </div>
                              <!-- end card-body  -->
                           </div>
                           <!-- end card  -->


                           <div class="card mb-3 credit-card-inners">
                              <div class="card-body">
                                 <div class="credit-card d-flex justify-content-between align-items-center">
                                    <h5>International Credit / Debit Card</h5>

                                    <div class="credit-card-img">
                                       <img src="{{  asset('frontend/assets/images/checkout/master.png ')}}" alt="">
                                    </div>
                                    <!-- end credit-card-img   -->

                                 </div>
                                 <!-- end credit-card  -->
                              </div>
                              <!-- end card-body  -->
                           </div>
                           <!-- end card  -->




                           <div class="card mb-3 credit-card-inners">
                              <div class="card-body">
                                 <div class="credit-card d-flex justify-content-between align-items-center">
                                    <h5>bKash</h5>

                                    <div class="credit-card-img">

                                       <img src="{{  asset('frontend/assets/images/checkout/bkash.png ')}}" alt="">
                                    </div>
                                    <!-- end credit-card-img   -->

                                 </div>
                                 <!-- end credit-card  -->
                              </div>
                              <!-- end card-body  -->
                           </div>
                           <!-- end card  -->

                           <h4 class="trxid">
                              bKash (TrxID method)
                           </h4>


                        </div>
                        <!-- end cart-wrapper  -->
                     </div>
                     <!-- end col  -->


                     <div class="col-lg-5 col-md-6 col-sm-12 ">
                        <div class="order-details-wrapper my-4">
                           <div class="order-details-inner">

                              <div class="card order-details-card">
                                 <div class="card-body">
                                    <h4 class=""> Order Details</h4>

                                    <div class="card-body-details-innr">

                                       <div class="details-order d-flex justify-content-between align-items-center">
                                          <h6> Order Number</h6>
                                          <h6>{{ $payments->id }}</h6>
                                       </div>
                                       
                                        <div class="details-order d-flex justify-content-between align-items-center">
                                            <h6> Invoice Number</h6>
                                            <h6>{{ $payments->invoice_no }}</h6>
                                       </div>
                                       
                                       <!-- end details-order  -->
                                       <div class="details-order d-flex justify-content-between align-items-center">
                                          <h6> Total (Incl. VAT)</h6>
                                          <h6 class="price-text">&#2547; {{ $payments->amount }}</h6>
                                       </div>
                                       <!-- end details-order  -->
                                       <div class="details-order d-flex justify-content-between align-items-center">

                                                    <h6> Address</h6>

                                                    <h6>{{ $payments->street_address }}</h6>
                                       </div>
                                       <!-- end details-order  -->


                                       <!-- end inst-ord-inner  -->
                                    </div>
                                    <!-- end card-body-details-innr  -->
                                 </div>
                                 <!-- end card-body  -->
                              </div>
                              <!-- end card  -->
                           </div>
                           <!-- end order-details-inner  -->

                           <div class="jfss-btn-holder d-flex justify-content-center align-items-center">
                              <a href="{{ route('user.index') }}" class="jfss-btn-shop">
                                 Back to Shopping
                              </a>
                           </div>
                           <!-- end jfss-btn-holder  -->
                        </div>
                        <!-- end order-details-wrapper  -->
                     </div>
                     <!-- end col  -->
                  </div>
                  <!-- end row  -->
               </div>
               <!-- end container  -->
            </section>
            <!-- end cart-section  -->




         </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @endsection



