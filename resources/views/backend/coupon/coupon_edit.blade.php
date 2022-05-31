@extends('admin.admin_master')

@section('main-content')

    <div class="content">
        <div class="container-fluid mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!--   ------------ Add Coupon Page -------- -->

                        <div class="col-8">

                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Coupon </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">

                                        {{-- <form method="post" action="{{ route('role.coupon.update', [config('fortify.guard'), $item->id])}}"> --}}
                                        <form method="post"
                                            action="{{ route('role.coupon.update', [config('fortify.guard'), $coupons->id]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <h5>Coupon Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="coupon_name" class="form-control"
                                                        value="{{ $coupons->coupon_name }}">

                                                    @error('coupon_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="coupon_discount" class="form-control"
                                                        value="{{ $coupons->coupon_discount }}">

                                                    @error('coupon_discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="coupon_validity" class="form-control"
                                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                        value="{{ $coupons->coupon_validity }}">

                                                    @error('coupon_validity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="text-xs-right mt-2">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                    value="Update">
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection
