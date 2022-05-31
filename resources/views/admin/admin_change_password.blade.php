@extends('admin.admin_master')

{{-- section id is yeild name --}}

@section('main-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">
            <div class="card mt-5">
                <div class="card-body">


                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Admin Profile</h4>
                            <h6 class="box-subtitle">Profile Edit<a class="text-warning"> </a></h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                    <form novalidate="" method="POST"
                                        action="{{ route('admin.update.change.password') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="current_password" name="oldpassword"
                                                            class="form-control" required=""
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <h5>New Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password"
                                                            class="form-control" required=""
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                            </div> {{-- row end --}}

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <h5> Confirm Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control" required=""
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>

                                            </div> {{-- row end --}}

                                            <div class="text-xs-right mt-2">
                                                <button type="submit" class="btn btn-rounded btn-info">Update
                                                    Password</button>
                                            </div>
                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection
