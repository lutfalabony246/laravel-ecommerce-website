@extends('frontend.main_master')
@section('index')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <div class="card" style="margin-top:100px; margin-bottom: 66px;">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loginWithOtp') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="number" class="form-control" name="mobile" required autofocus>

                                </div>
                            </div>



                            <div class="form-group row otp">
                                <label for="password" class="col-md-4 col-form-label text-md-right">OTP</label>

                                <div class="col-md-6">

                                    <input id="otp" type="number" class="form-control" name="otp" >
                                </div>
                            </div>


                            <div class="form-group row mb-0 otp">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                        <div class="form-group row send-otp">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success otp-btn" onclick="sendOtp(event)">Send OTP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>     
        
    </script>
@endsection
