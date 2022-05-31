@extends('admin.admin_master')

{{-- section id is yeild name --}}

@section('main-content')
    <div class="container mt-5">
        <section class="content">
            <div class="container-fluid">
                <div class="mb-3 row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="box-header with-border bg-secondary text-white">
                                <h3 class="box-title text-center text-white  ">Edit Supplier</h3>
                            </div>
                            <div class="card-body">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <form method="POST"
                                                action="{{ route('role.suppliers.update', [config('fortify.guard'), $supplier->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $supplier->id }}">
                                                <input type="hidden" name="old_image" value="{{ $supplier->supplyer_photo }}">

                                                <div class="form-group">
                                                    <h5>  Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" required name="supplyer_name"
                                                            value="{{ $supplier->supplyer_name }}" class="form-control">

                                                        @error('supplyer_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $supplier->supplyer_address }}"
                                                            id="address" name="supplyer_address" class="form-control">

                                                        @error('supplyer_address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" required value="{{ $supplier->supplyer_phone }}"
                                                            id="number" name="supplyer_phone" class="form-control">

                                                        @error('supplyer_phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="email" value="{{ $supplier->supplyer_email }}"
                                                            id="email" name="supplyer_email" class="form-control">

                                                        @error('supplyer_email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="supplyer_photo" name="image" class="form-control">


                                                        @error('supplyer_photo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="text-xs-right mt-2 text-center">
                                                    <input type="submit" class="btn btn-rounded bg-secondary text-white"
                                                        value="Update Supplier">
                                                </div>
                                            </form>
                                        </div> <!-- table res.. end -->
                                    </div> <!-- box body end -->
                                </div> <!-- box end -->
                            </div> <!-- col end -->
                        </div>
                    </div>
                </div> <!--  row end-->
            </div>
        </section> <!--  content end-->
    </div> <!--  row end-->
@endsection
