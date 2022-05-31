@extends('frontend.main_master')

<style>
   .user-profile-section{
      min-height: 60vh;
   }
</style>

@section('islamic')
{{--  @include('frontend.body.mobile_sidbar_menu')  --}}

   <section class="profile main-content">
   
   <section class="user-profile-section px-4 py-5">
            <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="profile-header">
                     <h2>My Orders </h2>
                  </div>
                  <!-- end profile-header  -->
                  <div class="order-wrapper">

                  @foreach($orders as $order)
                     
                     @if($order->status == "Pending" || $order->status == "processing" || $order->status == "picked" || $order->status == "shipped")
                        <div class="order-inner my-3 ">
                           <div class="card  ">
                              <div class="card-body d-flex justify-content-between align-items-center py-3 px-3">
                                 <div class="payment-process">
                                    <span class="processing-btn mb-4">
                                       Processing
                                    </span>
                                    <p class="">Order<span class="fw-bold text-dark"> {{$order->id }}</span></p>
                                    <span class="text-dark">&#2547; {{$order->amount}}</span>
                                     <p> Invoice No - <span class="text-dark"> {{$order->invoice_no}}</span> </p>
                                 </div>
                                 <!-- end payment-process  -->
                                 <div class="order-process d-flex justify-content-between align-items-center">
                                    <div class="cancle-order-innr text-center px-3 ">
                                       <!-- <a href="" class=" text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                             class="fas fa-circle-xmark text-center"></i></a>
                                       <p>Cancel Order</p> -->
                                       <div>
                                 @if($order->status =='cancel')
                                 <div class="text-danger">
                                    <h3>Your Order Has Been Canceled</h3>
                                 </div>
                                 @else
                                 @if($order->status =='delivered')
                                 <!-- <button  type="button" class="btn btn-danger mb-3" onclick="myFunction()">Cancel Order</button> -->
                                 <a href="" class=" text-center"><i
                                          class="fas fa-circle-xmark text-center" onclick="myFunction()" >
                                             </i></a>
                                    <p>Cancel Order</p>
                                 <br>
                                    <b id="demo" class="text-danger">
                                    </b>
                                    @else
                                    <a href="{{ url('user/cancelorder/'.$order->id ) }}"   ><i
                                                            class="fas fa-circle-xmark text-center" id="cancel" ></i></a>
                                                      <p>Cancel Order</p>
                                    @endif
                                    @endif
                                    </div>
                                    </div>
                                    <!-- end cancle-order-innr  -->
                                    <div class="cancle-order-innr text-center px-3">
                                       <a href="{{route('change.payment',$order->id)}}" class="text-center"> <i
                                             class="fa-solid fa-money-check text-center"></i></a>
                                       <p>Change Payment</p>
                                    </div>
                                    <!-- end cancle-order-innr  -->
                                 </div>
                                 <!-- end order-process  -->
                              </div>
                              <!-- end card-body  -->
                              <div class="card-footer text-center">
                                 <a href="#" class=" jfss-view viewDetails" data-id="{{$order->id}}" onclick="viewFun()"> <i
                                       class="fa-solid fa-circle-chevron-down"></i> View
                                    Details</a>
                              </div>
                              <!-- end card-footer  -->
                           </div>
                           <!-- end card  -->
                        </div>

                     @elseif($order->status == 'delivered')

                        <div class="order-inner my-3 ">
                           <div class="card">
                              <div class="card-body d-flex justify-content-between align-items-center py-3 px-3">
                                 <div class="payment-process">
                                    <span class="processing-btn complete mb-4">
                                       Complete
                                    </span>
                                    <p class="">Order
                                       <span class="fw-bold text-dark"> {{$order->id }}</span>
                                    </p>
                                    <span class="text-dark">&#2547; {{$order->amount}}</span>
                                     <p> Invoice No - <span class="text-dark"> {{$order->invoice_no}}</span> </p>
                                 </div>
                                 <!-- end payment-process  -->
                                 <div class="order-process">
                                    <div class="ratting">
                                       <span>
                                          <i class="fa-solid fa-star"></i>
                                       </span>
                                       <span>
                                          <i class="fa-solid fa-star"></i>
                                       </span>
                                       <span>
                                          <i class="fa-solid fa-star"></i>
                                       </span>
                                       <span>
                                          <i class="fa-solid fa-star"></i>
                                       </span>
                                       <span>
                                          <i class="fa-solid fa-star"></i>
                                       </span>
                                    </div>
                                    <!-- end ratting  -->
                                    
                                    <p class="mb-1 text-right">{{$order->delivery_date}}</p>
                                    <p class="mb-1 text-right">{{$order->delivery_time}}</p>
                                    <a href="#" class="report-btn btn  p-2">
                                       <i class="fa-solid fa-triangle-exclamation"></i>
                                       Report Issue</a>
                                 </div>
                                 <!-- end order-process  -->
                              </div>
                              <!-- end card-body  -->
                              <div class="card-footer text-center">
                                 <a href="#" class=" jfss-view viewDetails" data-id="{{$order->id}}" onclick="viewFun()"> <i
                                       class="fa-solid fa-circle-chevron-down"></i> View
                                    Details</a>
                              </div>
                              <!-- end card-footer  -->
                           </div>
                           <!-- end card  -->
                        </div>
                     
                     @elseif($order->status == "cancel")
                        <div class="order-inner my-3 ">
                           <div class="card  ">
                              <div class="card-body d-flex justify-content-between align-items-center py-3 px-3">
                                 <div class="payment-process">
                                    <span class="processing-btn cancle mb-4 text-dark">
                                       Cancelled
                                    </span>
                                    <p class="">Order <span class="fw-bold text-dark"> {{$order->id }}</span></p>
                                    <span class="text-dark">&#2547; {{$order->amount}}</span>
                                     <p> Invoice No - <span class="text-dark"> {{$order->invoice_no}}</span> </p>
                                 </div>
                                 <!-- end payment-process  -->
                              </div>
                              <!-- end card-body  -->
                              <div class="card-footer text-center">
                                 <a href="#" class="jfss-view viewDetails" data-id="{{$order->id}}" onclick="viewFun()"> <i
                                       class="fa-solid fa-circle-chevron-down"></i> View
                                    Details</a>
                              </div>
                              <!-- end card-footer  -->
                           </div>
                           <!-- end card  -->
                        </div>

                     @endif
                     <!-- end order-inner  -->

                     
                     <!-- end order-inner  -->
                     <!-- end order-inner  -->

                  @endforeach

                  </div>
                  <!-- end order-wrapper  -->
               </div>
               <!-- end col  -->
               <div class="col-lg-4 col-md-6 col-sm-12 col-blk" id="orderDetId">
                  <div class="order-details-head">
                     <h2 class="text-center mb-3">Order Details</h2>
                  </div>
                  <!-- end order-details-head  -->
                  <div class="order-details-innar" id="productList">
                     
                     <!-- end card  -->
                  </div>
                  <!-- end order-details-inner  -->
               </div>
               <!-- end col  -->
            </div>
            <!-- end row  -->
         </section>
</section>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center jfss-cancel-mb">
               <h2>Are you sure ?</h2>
               <p>You want to cancel this order</p>
               <div class="jfss-cancel-modal">
                  <button type="button" class="btn jfss-cancel-mbtn" data-bs-dismiss="modal">Yes</button>
                  <button type="button" class="btn  jfss-cancel-mbtn2">No</button>
               </div>
            </div>
         </div>
      </div>
   </div>



<script>

      function viewFun() {
         document.querySelector('.col-blk').style.display = 'block';
      }


     
      
</script>



@endsection

@section('script')

<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "You can not cancel the the product Now.Beccause it has already been shipped for delivery.  For more details contact to <i>Support</i> ";
}
</script>

<script>

   $(document).ready(function(){
      $('.viewDetails').on('click',function(){
        
         var dataId = $(this).attr("data-id");
         $.ajax({
            type: 'GET',
            url: '/user/order_details/'+dataId,
            success: function(response) {
               console.log(response);

               $('#productList').empty();

               var s = `<div class="cards">
                        <div class="card-headers text-center py-4">
                           <h4>Address</h4>
                           <h6>${response.street_address}</h6>
                        </div>
                        <!-- end card-header  -->
                        <div class="card-bodys">
                           <div class="card-pro-title d-flex justify-content-between align-items-center">
                               <p> Invoice No - <span class="text-dark"> ${response.invoice_no}</span> </p>
                              <div class="card-time">
                                 <p><span>${response.delivery_date}, <span>${response.delivery_time}</span></span> </p>
                              </div>
                           </div>
                         
                           <!-- end card-pro-title  -->
                           <div class="product-det-table" style="overflow-y: scroll;">
                              <table class="h-50">
                                 
                                 <tbody>`;

                                 $.each(response.order_items, function( index, value ) {
                                    s+= `<tr>
                                    
                                       <td class="py-2">
                                       <img src="/${value.product.product_thambnail}" width="50px" height="50px" alt="">
                                       </td>
                                       <td class="text-left">
                                          <h4>${value.product.product_name}</h4>
                                          <div class="product-detailss d-flex justify-content-start align-items-center">
                                          <p class="mr-5">${value.product.unit}</p>
                                          <p class="mr-5">Qty.${value.qty}</p>
                                          <p class="mr-5">Tk. ${value.price}</p>
                                          </div>
                                       <!-- end product-detailss  -->
                                       </td>

                                    </tr>`;
                                 });
                                    

                                 s+= `</tbody>
                                 <!-- end tbody  -->
                              </table>
                              <!-- end table  -->
                           </div>
                           <!-- end product-det-table  -->
                        </div>
                        <!-- end card-body  -->
                     </div>`;


                     $('#productList').append(s);
            }
         });
      })

   });


</script>

@endsection



