@extends('frontend.main_master')

@section('islamic')
@include('frontend.body.mobile_sidbar_menu')

   <section class="profile main-content">
    <div class="container">
        <div class="row profile-wrapper">
            <div class="col-lg-3">
                @include('frontend.common.user_sidebar')
            </div>
            <div class="col-lg-9">
                   <!-- --------------------------My Orders ---------------------------- -->
                   <div>
                   <div class="purchase-header">
                    <h2 style="color: black;font-weight:bold;">Cancel Order</h2>
                   </div>
                   <!-- start order-table  -->
                   <div class="order-table-inner">
                      <table class="table table-hover">
                         <thead class="category-header7">
                            <tr>
                                <th > Order date</th>
                                <th > Total</th>
                                <th > Payment </th>
                                <th > Invoice</th>
                                <th > Order</th>
                                <th > Action</th>
                            </tr>
                         </thead>
                         <tbody>
                                @foreach ( $orders as $order )

                                <td>{{ $order->order_date }}</td>
                                <td>${{ $order->amount }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->invoice_no }}</td>
                                <td> <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span></td>
                                <td>
                                    <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-danger">Invoice</a>
                                </td>
                                @endforeach
                         </tbody>
                      </table>
                      <!-- end table  -->
                   </div>
                   <!-- end order-table-inner  -->
                </div>


            </div>
        </div>
    </div>
</section>

@endsection

