@extends('admin.admin_master')

@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="header-title">Product Stock List</h4>
                                <!--<h6 class="total-user-nbr">2</h6>-->
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <td>Product Price</td>
                                        <td>Product Quantity</td>
                                        <td>Total Money</td>
                                        <th>Product Discount</th>
                                        <th>Product Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        @if ($item->product_qty < 1)
                                            <tr style="background-color: rgba(255, 0, 0, 0.5);color:whitesmoke">
                                            @else
                                            <tr>
                                        @endif
                                        <td> <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 60px; height: 50px;"> </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->selling_price }} </td>
                                        <td>{{ $item->product_qty }} Pic</td>
                                        <td>{{ (int) $item->product_qty * (int) $item->selling_price }} taka</td>

                                        <td>
                                            @if ($item->discount_price == null && $item->selling_price)
                                            <span class="badge bg-danger">No Discount</span>
                                            @else
                                            @php
                                            if ($item->selling_price) {
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount / $item->selling_price) * 100;
                                            }
                                            elseif($item->selling_price == NULL) {
                                            $discount=0;
                                            }
                                            else{}
                                            @endphp
                                            <span class="badge bg-danger">{{ round($discount) }} %</span>
                                            @endif
                                        </td>

                                        <td  style="font-size:16px">
                                            @if ($item->status == 1)
                                                <span class="badge bg-success"> Active </span>
                                            @else
                                                <span class="badge bg-danger"> InActive </span>
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->
    </div> <!-- content -->
@endsection
