@extends('frontend.main_master')

@section('islamic')


<section class="main-content" id="main-content">
    <div class="container-fluid px-md-5 px-3">
        <!-- Popular products Start -->
        <div class="section-title-no-bg px-md-5 px-3">
            <h4 class="">Available Coupon Offers</h4>
        </div>
        @php
        $coupons = App\Models\Coupon::orderBy('id', 'DESC')->get();
        @endphp
        <div class="featured-category-promo mx-md-5 mx-3">
            <div class="row">
                @foreach ($coupons as $couponitem)
                    @if ($couponitem->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                    <div class="col-lg-3 col-md-6 col-12 px-4 py-3">
                        <div class="row bg-white py-5 px-3 promo-card h-100">
                            <div class="col-7 d-flex align-items-center justify-content-center">
                                <div>
                                <h4 style=" font-size: 20px;"><b>Coupon Code: </b> {{ $couponitem->coupon_name }} </h4>
                                <h4 style=" font-size: 19px;"><b style="font-size: 30px;
                                    color: green;">{{ $couponitem->coupon_discount }}</b>  % Discount</h4>
                                <h4 style=" font-size: 19px;">couponitem : {{ $couponitem->coupon_validity }} </h4>
                                <span class="badge badge-pill bg-success"> Active </span>
                                </div>
                            </div>
                            <div class="col-5">
                                <img class="img-fluid" src=" {{ asset('frontend/assets/images/icon/coupon1.png') }} "  alt=""
                                srcset="">
                            </div>
                        </div>
                    </div>
                    @else
                    @endif

                @endforeach
            </div>
        </div>
 <!--rounded category end-->
 <!-- Popular products End -->
    </div>
    </div>
   </section>
</main>
@endsection

