@extends('admin.admin_master')
@section('css')
    <style>
        span {
            color: #969997;
        }

    </style>
@endsection
@section('main-content')

    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row d-flex justify-content-center mt-4">
                <div class="col-xl-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                View Product
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10 col-md-6 col-sm-12" style="text-align: center;">
                                    <h5> <img src="{{ asset($product->product_thambnail) }}"
                                            style="width: 100px; height: 100px;" class="rounded-circle"> </h5>
                                </div>
                            </div>
                            <div class="row no-spacing no-gutters">
                                <div class="col-lg-4">
                                    <h4 class="pt-2">Product Name: <span>
                                            {{ $product->product_name }}</span>
                                    </h4>
                                    <h5 class="pt-2">Product Code: <span>{{ $product->product_code }}</span>
                                    </h5>
                                    <h5>product Quantity <span>
                                            <span> {{ $product->product_qty }}</span>
                                        </span></h5>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="pt-2">Product Size: <span>{{ $product->product_size }}</span>
                                    </h5>
                                    <h5 class="pt-2">Product Color:
                                        <span>{{ $product->product_color }}</span>
                                    </h5>
                                    <h5 class="pt-2">Product Color:
                                        <span>{{ $product->selling_price }}</span>
                                    </h5>
                                </div>
                                <div class="col-lg-4 pt-3">
                                    @if ($product->discount_price == null)
                                        <span class="badge bg-pill badge-danger" style="color: black;">No
                                            Discount</span>
                                    @else
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;

                                            $discount = ($amount / $product->selling_price) * 100;
                                        @endphp
                                        <h5>Discount:
                                            <span class="badge  bg-danger"
                                                style="color: black;">{{ round($discount) }}
                                                %</span>
                                        </h5>
                                    @endif
                                    <h5 class="pt-2">Product Description:
                                        <span>{!! $product->product_descp !!}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div>
@endsection
