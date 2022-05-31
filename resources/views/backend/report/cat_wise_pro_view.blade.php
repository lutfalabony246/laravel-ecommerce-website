@extends('admin.admin_master')
@section('main-content')

<!-- Start Content-->
<div class="container-fluid">
    {{-- for table --}}
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="header-title" style="font-size: 24px;">Category Wise Products</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name </th>
                                <th>Product Quantity </th>
                                <th>Sold Qty </th>
                                <th>Available Qty</th>
                                <th>Purchaed By</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($catwiseproduct as $cwp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cwp->category_name }} </td>
                                    <td>{{ $cwp->product_counts }} </td>
                                    <td>{{ $cwp->sum_of_product }} </td>
                                    <td>{{ $cwp->product_counts - $cwp->sum_of_product }}</td>
                                    <td>{{ Auth::guard('admin')->user()->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    {{-- end table --}}
</div>

@endsection
