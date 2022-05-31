@extends('admin.admin_master')

@section('main-content')




<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card" style="margin-left: 50px">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="header-title">Confirmed Orders List </h4>
                        </div>

                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                </div>
                    </div>
                </div>

                <div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1581px;">
                            <thead>
                                <tr role="row">

                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>



                            </thead>
                            <tbody>

                                @foreach ($orders as $item)


                                <tr class="odd">
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>{{ $item->status }}</td>


                                    <td width="25%">

                                        <a href="{{route('role.pending.orders.details',[config('fortify.guard'),$item->id ])}}"
                                            class="action-icon view-icon"><i class="fa fa-eye"></i></a>

                                        </td>

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
