@extends('frontend.main_master')

@section('index')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in" style="padding: 150px 0px">
                        <h4 class="">Forgot Password</h4>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <button type="submit" class="btn-upper btn btn-success checkout-page-button">Email Password
                                Reset Link</button>
                        </form>

                    </div>
                    <!-- Sign-in -->


                </div><!-- /.row -->
            </div><!-- /.sigin-in-->

        </div><!-- /.container -->
    @endsection
