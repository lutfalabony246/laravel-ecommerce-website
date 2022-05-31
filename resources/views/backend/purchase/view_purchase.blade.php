@extends('admin.admin_master')



@section('main-content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <div class="mb-2">
                <h4 class="header-title">View Purchase</h4>
                </div>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>SL</th>
                         <th>Supplier Name</th>
                         <th>Product Name </th>
                         <th>Product Quantity</th>
                         <th>Unit Price</th>
                         <th>Total Amount</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                       @foreach($purchases as $purchase)

                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $purchase['supplier']['supplyer_name'] }}</td>
                            @if ($purchase->product_id)
                            <td>{{ $purchase['productName']['product_name'] }}</td>
                            @else
                            <td>{{ $purchase->new_product }}</td>
                            @endif
                            <td>{{ $purchase->product_qty }}</td>
                             <td>{{ $purchase->unit_price}}</td>
                            <td>{{ $purchase->total_price }}</td>
                            <td>
                                <a href="{{route('role.purchase.details',[config('fortify.guard'),$purchase->id]),}}" ><i
                                 class="fa fa-eye"></i></a>

                            </td>
                        </tr>
                    @endforeach
                 </tbody>
               </table>
               </div> <!-- table res.. end -->
             </div>  <!-- box body end -->
          </div>      <!-- box end -->
     </div> <!-- col end -->

</div> <!--  row end-->
</section> <!--  content end-->
</div> <!--  row end-->



@endsection
