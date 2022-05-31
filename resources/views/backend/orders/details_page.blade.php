
@extends('admin.admin_master')

@section('main-content')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <h4 class="header-title my-4">Order Details</h4>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="text-center pt-4"><h4>Shippings Details</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

<table class="table">

    <tr>
      <th> Shipping Name : </th>
       <th> {{ $order->name }} </th>
    </tr>

     <tr>
      <th> Shipping Phone : </th>
       <th> {{ $order->phone }} </th>
    </tr>

     <tr>
      <th> Shipping Email : </th>
       <th> {{ $order->email }} </th>
    </tr>

     <tr>
      <th> Division : </th>
       <th> {{  optional($order->division)->division_name }} </th>
    </tr>

     <tr>
      <th> District : </th>
       <th> {{ optional($order->district)->district_name }} </th>
    </tr>

     <tr>
      <th> State : </th>
       <th>{{ optional($order->state)->state_name }} </th>
    </tr>

    <tr>
      <th> Post Code : </th>
       <th> {{ $order->post_code }} </th>
    </tr>

    <tr>
      <th> Order Date : </th>
       <th> {{ $order->order_date }} </th>
    </tr>

   </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="text-center pt-4"><h4>Shippings Details<span style="color: #ff3333;">  Invoice: {{ $order->invoice_no }}</span> </h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                <table class="table">
                                <tr>
                                  <th>  Name : </th>
                                   <th> {{ optional($order->user)->name }} </th>
                                </tr>

                                 <tr>
                                  <th>  Phone : </th>
                                   <th> {{ optional($order->user)->phone }} </th>
                                </tr>

                                 <tr>
                                  <th> Payment Type : </th>
                                   <th> {{ $order->payment_method }} </th>
                                </tr>

                                 <tr>
                                  <th> Tranx ID : </th>
                                   <th> {{ $order->transaction_id }} </th>
                                </tr>

                                 <tr>
                                  <th> Invoice  : </th>
                                   <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>

                                 <tr>
                                  <th> Order Total : </th>
                                   <th>{{ $order->amount }} </th>
                                </tr>

                                <tr>
                                  <th> Order : </th>
                                   <th>

                                    <span class="badge badge-pill badge-warning" style="background: #418DB9; font-size:16px">{{ $order->status }} </span> </th>
                                </tr>

                                <tr>
                                  <th>  </th>
                                   <th>


                                     @if($order->status == 'Pending')

                                     {{-- {{ route('pending-confirm',$order->id) }} --}}


                                     <a href="{{route('role.pending-confirm',[config('fortify.guard'),$order->id ])}}"
                                      class="btn btn-block btn-success" id="confirm">Confirm Order</a>

                                      {{-- {{ route('confirm.processing',$order->id) }} --}}


                                      @elseif($order->status == 'confirm')
                                      <a href="{{route('role.confirm.processing',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                        id="processing">Processing Order</a>

                                        {{-- {{ route('processing.picked',$order->id) }} --}}

                                     @elseif($order->status == 'processing')
                                      <a href="{{route('role.processing.picked',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                        id="picked">Picked Order</a>

                                      {{-- {{ route('picked.shipped',$order->id) }} --}}


                                       @elseif($order->status == 'picked')
                                      <a href="{{route('role.picked.shipped',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                        id="shipped">Shipped Order</a>


                                      {{-- {{ route('shipped.delivered',$order->id) }} --}}

                                      @elseif($order->status == 'shipped')
                                     <a href="{{route('role.shipped.delivered',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                      id="delivered">Delivered Order</a>

                                      {{-- {{ route('delivered.cancel',$order->id) }} --}}

                                        @elseif($order->status == 'delivered')
                                        <a href="{{route('role.delivered.cancel',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                         id="canceled">Cancel Order</a>


                                         {{-- @elseif($order->status == 'cancel')
                                         <a href="{{route('role.cancel-orders',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                          id="canceled"></a>  --}}


                                         @elseif($order->status == 'shipped')
                                         <a href="{{route('role.invoice.download',[config('fortify.guard'),$order->id ])}}" class="btn btn-block btn-success"
                                          id="delivered">Invoice Download</a>

                                      @endif

                                     </th>
                                </tr>

                               </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>

                                  <tr>
                                    <td width="10%">
                                      <label for=""> Product Image</label>
                                    </td>

                                     <td width="20%">
                                      <label for=""> Product Name </label>
                                    </td>

                                 <td width="10%">
                                      <label for=""> Product Code</label>
                                    </td>


                                   <td width="10%">
                                      <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                      <label for=""> Size </label>
                                    </td>

                                      <td width="10%">
                                      <label for=""> Quantity </label>
                                    </td>

                                   <td width="10%">
                                      <label for=""> Price </label>
                                    </td>

                                  </tr>


                                  @foreach($orderItem as $item)
                           <tr>
                                   <td width="10%">
                                      <label for=""><img src="{{ asset(optional($item->product)->product_thambnail) }}" height="50px;" width="50px;"> </label>
                                    </td>

                                   <td width="20%">
                                      <label for=""> {{ optional($item->product)->product_name }}</label>
                                    </td>


                                    <td width="10%">
                                      <label for=""> {{ optional($item->product)->product_code }}</label>
                                    </td>

                                   <td width="10%">
                                      <label for=""> {{ $item->color }}</label>
                                    </td>

                                   <td width="10%">
                                      <label for=""> {{ $item->size }}</label>
                                    </td>

                                    <td width="10%">
                                      <label for=""> {{ $item->qty }}</label>
                                    </td>

                             <td width="10%">
                                      <label for=""> {{ $item->price }}  (  {{ $item->price * $item->qty}} ) </label>
                                    </td>

                                  </tr>
                                  @endforeach


                                </tbody>

                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>

@endsection
