@extends('admin.admin_master')
@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h4 class="header-title">Product List</h4>
                            </div>
                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable-buttons_length">
                                            <label class="form-label">Show <select name="datatable-buttons_length"
                                                    aria-controls="datatable-buttons" class="form-select form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" style="overflow-x: auto;">
                                        <table id="datatable-buttons"
                                            class="table table-striped nowrap w-100 dataTable no-footer" role="grid"
                                            aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                        style="width: 77.0781px;">Date</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Code: activate to sort column ascending"
                                                        style="width: 107.344px;">Product Code</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Supplier Product Code: activate to sort column ascending"
                                                        style="width: 176.516px;">Supplier Product Code</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Brand Name: activate to sort column ascending"
                                                        style="width: 95.1875px;">Brand Name</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Category: activate to sort column ascending"
                                                        style="width: 73.1562px;">Category</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Name: activate to sort column ascending"
                                                        style="width: 253.172px;">Product Name</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Unit: activate to sort column ascending"
                                                        style="width: 32.1875px;">Unit</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="QTY: activate to sort column ascending"
                                                        style="width: 34.2969px;">QTY</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Buying Price: activate to sort column ascending"
                                                        style="width: 98.2656px;">Buying Price</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Return: activate to sort column ascending"
                                                        style="width: 118.328px;">Product Return</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Withdrawal Amount: activate to sort column ascending"
                                                        style="width: 156.5px;">Withdrawal Amount</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Total Balance: activate to sort column ascending"
                                                        style="width: 105.219px;">Total Balance</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($productList as $supplierList)
                                                <tr class="odd">
                                                    <td>{{ $supplierList->start_date }}</td>
                                                    <td>{{ $supplierList->product_code }}</td>
                                                    <td>{{ $supplierList->supplier_id }}</td>
                                                    <td>{{ $supplierList->brand->brand_name_cats_eye }}</td>
                                                    <td>{{ $supplierList->category->category_name}}</td>
                                                    <td>{{ $supplierList->product_name }}</td>
                                                    <td>{{ $supplierList->unit }}</td>
                                                    <td>{{ $supplierList->product_qty }}</td>
                                                    <td>{{ $supplierList->purchase_price }}</td>
                                                    <td>{{ $supplierList->product_descp }}</td>
                                                    <td>--</td>
                                                    <td>--</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div>
@endsection
