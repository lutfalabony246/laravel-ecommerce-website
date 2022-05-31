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
                        <h4 class="header-title" style="font-size: 24px;">Product Stock Report</h4>
                    </div>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Name </th>
                                <th>Product Quantity </th>
                                <th>Sold Qty </th>
                                <th>In Stock</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($productstock as $stock)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stock->product_name }} </td>
                                    <td>{{ $stock->product_qty }} </td>
                                    <td>{{ $stock->orderQty }} </td>
                                    @if ( $stock->product_qty != null )
                                    <td> <button class="btn btn-success">Stock Available</button></td>
                                    @else
                                    <td> <button class="btn btn-danger"> NOT Available</button></td>
                                    @endif
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
