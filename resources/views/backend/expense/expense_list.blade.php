@extends('admin.admin_master')
@section('main-content')

<div class="content">

<!-- Start Content-->
<div class="container-fluid">


    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Expense List</h4>

                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Expense Type</th>
                                <th>Amount</th>
                                <th>Expense Payement Type</th>
                                <th>Description</th>
                                {{-- <th>View Document</th> --}}
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($expens as $exp)
                            <tr>
                                <td style="color: #8a99b5;">{{$exp->expense_date }}</td>
                                <td style="color: #8a99b5;">{{$exp['expense_type_name']['expense_type']}}</td>
                                <td style="color: #8a99b5;">{{$exp->expense_amount }} Tk.</td>
                                <td style="color: #8a99b5;">{{$exp->expense_payment_type}}</td>
                                <td style="color: #8a99b5;">{{$exp->description }}</td>
                                {{-- <td><button type="button" class="btn btn-success">View</button></td> --}}
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
