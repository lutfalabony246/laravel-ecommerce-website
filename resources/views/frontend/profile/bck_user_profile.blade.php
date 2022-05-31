@extends('frontend.main_master')

@section('index')
@include('frontend.body.mobile_sidbar_menu')

   <section class="profile main-content">
    <div class="container">
        <div class="row profile-wrapper">
            <div class="col-lg-3">
                @include('frontend.common.user_sidebar')
            </div>
            <div class="col-lg-9" >
                <div class="user-order-table">
                    <h2>Profile Update</h2>
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="from-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" id="Name" placeholder="Enter full name" value="{{ $user->name }}">
                        </div>
                        <div class="from-group">
                            <label>E-mail Address</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email address" value="{{ $user->email }}">
                        </div>
                        <div class="from-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ $user->phone }}">
                        </div>
                        <div class="from-group">
                            <label>Upload images</label>
                            <input type="file"  class="form-control" name="profile_photo_path" id="profile_photo_path">
                        </div>
                        <br/>
                        <div class="from-group">
                            <button type="submit" class="btn btn-danger">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
