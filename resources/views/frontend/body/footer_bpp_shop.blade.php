<footer>
    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp
    <div class="footer-main " >
        <div class="container-fluid">
            <div class="row py-5 px-lg-5 px-3">
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center ">
                    <div class="footer-section-1 px-3 px-md-1">
                        
                         <!--@php-->
                         <!-- $setting = App\Models\SiteSetting::select('logo')->first();-->
                         <!--@endphp-->
                        
                                  
                        <a class="title"
                            href="{{ route('user.index') }}"  ><img src={{ asset(optional($setting)->logo) }}   alt=""  height="40px"  ></a>
                        <ul class="mt-3">
                            <li><a href={{ optional($setting)->twitter }}><img class="img-fluid"
                                        src=" {{ asset('frontend/assets/images/socials/twitter.png') }}"
                                        alt="" srcset=""></a></li>
                            <li><a href={{ optional($setting)->facebook }}><img class="img-fluid me-1"
                                        src=" {{ asset('frontend/assets/images/socials/facebook.png') }} "
                                        alt="" srcset=""></a></li>
                            <li><a href={{ optional($setting)->linkedin }}><img class="img-fluid me-1"
                                        src=" {{ asset('frontend/assets/images/socials/linkedin.png') }} "
                                        alt="" style="height: 30px; width:30px;" srcset=""></a></li>
                            <li><a href={{ optional($setting)->youtube }}><img class="img-fluid me-1"
                                        src=" {{ asset('frontend/assets/images/socials/youtube.png') }} "
                                        alt="" srcset=""></a></li>
                            
                        </ul>
                        <br>
                        <div class="company_info" style="color:azure">
                            <div class="d-flex">
                                <div>
                                    <i class="fa-solid fa-location-pin"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->company_address }} </span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->email }} </span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <span> {{ optional($setting)->phone_one }} </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-2 px-3 px-md-1">
                        <h6 class="secondary-text">WE ARE HERE TO HELP !</h6>
                        <h6 style="color:white">FAQ</h6>
                        <h6 class="secondary-text">24/7 CUSTOMER SUPPORT</h6>
                        <h6 style="color:white"><i class="fas fa-phone me-2"
                                style="color:#f9b92e"></i>{{ optional($setting)->phone_two }}</h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-3 px-3 px-md-1">
                        <h6 class="secondary-text">KNOW US BETTER</h6>
                        <ul class="important-links-list">
                            <li><a href="{{ route('info.aboutPage') }}">About Us</a></li>
                            <li><a href="{{ route('info.aboutPage') }}">Contact Us</a></li>
                            <li><a href="{{ route('info.privacy') }}">Privacy Policy</a></li>
                            <!--<li><a href="#">Shipping Rates & Policies</a></li>-->
                            <li><a href="{{ route('info.terms') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('info.policy') }}">Return and Return Policy</a></li>
                            <!--<li><a href="#">Taxes & Import Duties</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12 d-flex justify-content-center">
                    <div class="footer-section-3 px-3 px-md-1">
                        <h6 class="secondary-text">MAKE MONEY WITH US</h6>
                        <ul class="important-links-list">
                            <li><a href="#">Sell on BPPSHOPS</a></li>
                            <li><a href="#">Seller term & conditions</a></li>
                        </ul>
                        <div>
                            <button class="btn btn-secondary-transparent px-4 text-white mt-3">SUBSCRIBE</button>
                        </div>
                        <div class="mt-3 app-cont row">
                            <div class="col-md-12 col-6 text-center text-md-start">
                                <a href="#"><img class="img-fluid me-2"
                                        src=" {{ asset('frontend/assets//images/icon/apple-app-store.png') }} "
                                        alt="" srcset=""></a>
                            </div>
                            <div class="col-md-12 col-6 mt-0 mt-md-2 text-center text-md-start">
                                <a href="#"><img class="img-fluid"
                                        src=" {{ asset('frontend/assets//images/icon/google-play-store.png') }} "
                                        alt="" srcset=""></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 px-5 mt-5">
                    <div class="d-flex flex-wrap bg-white justify-content-evenly align-items-center p-3 rounded-2 payment-method">
                        <div class="d-flex align-items-center">
                            <h5 class="text-dark">Pay With</h5>
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 1.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 2.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 3.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 4.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 5.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 6.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 7.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 8.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 9.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 10.jpg') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 12.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 13.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 14.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 15.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 16.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 17.png') }} "
                                alt="" srcset="">
                        </div>
                        <div class="p-1"><img height="40"
                                src=" {{ asset('frontend/assets/images/footer-brands/image 18.png') }} "
                                alt="" srcset="">
                        </div>
                        <div><img height="60"
                                src=" {{ asset('frontend/assets/images/footer-brands/sslcom.png') }} "
                                alt="" srcset=""></div>
                    </div>
                </div>
            </div>

        </div>


        <div class="subfooter">
            <div class="container-fluid px-5">
                <div class="row">
                    <div
                        class="col-md-4 col-12 d-flex align-items-center justify-content-center justify-content-md-start">
                        <p>&#169; All Right Reserved BPPSHOPS</p>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-logo.png') }} "
                            alt="">
                        <p class="text-white mt-2">Our logistics Partner</p>
                    </div>
                    <div class="col-md-4 col-12 text-center mt-3 mt-md-0">
                        <img src=" {{ asset('frontend/assets/images/company/excel-it-with-text.png') }} "
                            alt="">
                        <p class="text-white mt-2">Our IT Partner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
