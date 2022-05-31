@extends('frontend.main_master')

@section('islamic')
@include('frontend.body.mobile_sidbar_menu')

<section class="profile main-content">

        <div class="row profile-wrapper">      
            <div class="col-lg-4"  style="margin-left: 20px">
                <div class="user-order-table">                   
           <br>
           <br>
                    <form method="POST" action="{{ route('user.password.update') }}" >
                        @csrf
                        <div class="from-group">
                            <label style="font-weight:bold; font-size: 16px" >Old Password</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter Old Password">
                        </div>
                        @error('oldpassword')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="from-group">
                            <label style="font-weight:bold; font-size: 16px" >New Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="from-group">
                            <label style="font-weight:bold; font-size: 16px" >Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm password">
                        </div>
                        <br/>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="from-group">
                            <button type="submit" class="btn btn-danger" > Update Password</button>
                        </div>
                    </form> <br>
                </div>
            </div>

            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>

    </div>
</section>

@endsection
