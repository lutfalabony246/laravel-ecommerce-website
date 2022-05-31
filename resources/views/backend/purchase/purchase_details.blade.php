@extends('admin.admin_master')

@section('main-content')

 <div class="content">
      <!-- Start Content-->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-4">
        <div class="col-xl-8 col-12">
            <div class="card">
            <div class="card-header">
                <h4>
                    View Purchase
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5>Supplier Name: <span>{{$purchase->supplier->supplyer_name}}</span></h5>
                    <h5 class="pt-2">Unit_price: <span > {{ $purchase->unit_price}}</span></h5>
                    <h5 class="pt-2">Due Amount: <span >{{ $purchase->due_amount}}</span></h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5>Product Name: <span> @if ($purchase->product_id)
                            <td>{{ $purchase->productName->product_name }}</td>
                            @else
                            <td>{{ $purchase->new_product }}</td>
                            @endif</span></h5>
                    <h5 class="pt-2">Total_price: <span>{{ $purchase->total_price}}</span></h5>
                    <h5 class="pt-2">Purchase Date: <span>{{ $purchase->purchase_date}}</span></h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5>Product Quantity: <span>{{ $purchase->product_qty}}</span></h5>
                    <h5 class="pt-2">Pay Amount: <span>{{ $purchase->pay_amount}}</span></h5>
                    <h5 class="pt-2">Purchase Note: <span>{{ $purchase->purchase_note}}</span></h5>
                </div>
                </div>
            </div>
            </div>  <!-- end card -->
        </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
 </div>

@endsection
