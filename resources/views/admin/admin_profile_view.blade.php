@extends('admin.admin_master')
@section('main-content')
    <section class="content">
        <div class="row mt-5">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="pt-2 pb-2">
                            <img style="height:8rem" class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))?url('public/upload/admin_images/'
                               .$adminData->profile_photo_path):url('upload/avatar-4.png') }}" alt="User Avatar">
                            <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Admin Name:</a></h4>
                            <p class="text-muted" > <span> <b style="font-weight:bold; color:black" ></b> {{ $adminData->name }}</span></p>
                            <p class="text-muted"> <span> <b style="font-weight:bold; color:black" >Email:</b> {{ $adminData->email }}</span></p>
                            <a href="{{ route('admin.admin_profile_edit')}}" class="btn btn-success">Update Profile</a>
                        </div> <!-- end .padding -->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
             <div class="col-lg-2"></div>
        </div>
    </section>
    <!-- /.content -->
@endsection
