@extends('admin.admin_master')

@section('main-content')
    <section class="content">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h4 class="header-title">Coupon List</h4>
                                    </div>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Coupon Name</th>
                                                <th>Coupon Discount</th>
                                                <th>Coupon Validity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $item)
                                                <tr>
                                                    <td> {{ $item->coupon_name }} </td>
                                                    <td> {{ $item->coupon_discount }}% </td>
                                                    <td width="25%">
                                                        {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                                    </td>

                                                    <td>
                                                        @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                            <span class="badge badge-pill bg-success"> Active </span>
                                                        @else
                                                            <span class="badge badge-pill bg-danger"> InActive </span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('role.coupon.edit', [config('fortify.guard'), $item->id]) }}"
                                                            class="btn btn-info" title="Edit Data"><i
                                                                class="mdi mdi-square-edit-outline"></i> </a>

                                                        <a href="{{ route('role.coupon.delete', [config('fortify.guard'), $item->id]) }}"
                                                            class="btn btn-danger" title="Delete Data" id="delete"> <i
                                                                class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div> <!-- box body end -->
                    </div> <!-- box end -->
                </div> <!-- col end -->



                <!--================================form add Category======================================- -->

                <div class="col-lg-4">

                    <div class="box">

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h4 class="header-title">Coupon List</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">


                                        <form method="POST"
                                            action="{{ route('role.coupon.store', config('fortify.guard')) }}">

                                            @csrf

                                            <div class="form-group">
                                                <h5> <span class="text-danger">*</span> Coupon Name</h5>
                                                <div class="controls">
                                                    <input type="text" id="coupon_name" name="coupon_name"
                                                        class="form-control">

                                                    @error('coupon_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <h5>Coupon Discount <span class="text-danger">%</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="coupon_discount" name="coupon_discount"
                                                        class="form-control">

                                                    @error('coupon_discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <h5>Coupon Validity Date</h5>
                                                <div class="controls">
                                                    <input type="date" name="coupon_validity" class="form-control"
                                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                                    @error('coupon_validity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                    </div>

                                    <div class="text-xs-right mt-3">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Category">
                                    </div>

                                    </form>
                                </div> <!-- table res.. end -->
                            </div>
                        </div>
                    </div> <!-- box body end -->
                </div> <!-- box end -->
            </div> <!-- col end -->
        </div>
    @endsection
