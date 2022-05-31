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
                            <h4 class="header-title">All Return Order List</h4>
                        </div>

                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <td>Amount</td>
                                    <td>Payment</td>
                                    <td>Status</td>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td> {{ $item->order_date }}  </td>
                                    <td> {{ $item->invoice_no }}  </td>
                                    <td> ${{ $item->amount }}  </td>
                                    <td> {{ $item->payment_method }}  </td>
                                    <td>
                                    @if($item->return_order == 1)
                                    <span class="status">Pending </span>
                                    @elseif($item->return_order == 2)
                                    <span class="status"> Success </span>
                                    @endif
                                    </td>
                                    <td width="25%">
                                        <span class="status"> Return Success </span>
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


