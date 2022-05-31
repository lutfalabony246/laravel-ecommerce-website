@extends('frontend.main_master')
 @section('index')
 @include('frontend.body.mobile_sidbar_menu')
<section class="profile">
    <div class="container">
    <div class="row profile-wrapper">
        <div class="col-lg-2">
            @include('frontend.common.user_sidebar')
        </div>
        <div class="col-lg-6 col-sm-12" style="padding: 200px 0px 0px 150px">
            <div class="checkout-form-wrap">
               <div class="checkout-form-inner">
                  <div class="checkout-product-info" >
                     <div class="checkout-product-header">
                        <h5> Product</h5>
                        <h5> Total</h5>
                     </div>
                     <!-- end checkout-product-header-->

                     <div class="checkout-product-inner-cont" id="cart_checkout">
                        <div class="checkout-product-cont">
                           <p> White T-shirt * 1</p>
                           <p>&#2547; 2,000.0</p>
                        </div>


                     </div>
                     <!-- end checkout-product-inner-cont  -->

                     <div class="checkout-product-inner-cont">
                        <div class="checkout-product-cont">
                           <p>Tax</p>
                           <p class="total-clr">&#2547;<span id="tax"></span></p>
                        </div>
                        <div class="checkout-product-cont">
                           <p> Sub Total</p>
                           <p class="total-clr">&#2547;<span id="cartSubTotal"></span></p>
                        </div>
                        <div class="checkout-product-cont" >
                           <p>Discount Amount</p>
                           <p class="total-clr">&#2547;<span id="dtotal">0.00</span></p>
                        </div>
                        <div class="checkout-product-cont" >
                           <p> Total</p>
                           <p class="total-clr">&#2547;<span id="gtotal">0.00</span></p>
                        </div>
                        <!-- end checkout-product-cont-->
                        {{-- <div class="checkout-product-cont">
                           <p> Shipping</p>
                           <div class="checkbox-checkout">
                              <div class="form-group">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                       Free Shipping
                                    </label>

                                 </div>
                                 <!-- end form-check  -->
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                       Local Pickup
                                    </label>

                                 </div>
                                 <!-- end form-check  -->

                              </div>
                              <!-- end form-group -->

                           </div> --}}

                        </div>
                     </div>
                     <!-- end checkout-product-cont-->
                     <div class="checkout-total-radio">
                        <div class="checkout-product-cont">
                           <p>Grand Total</p>
                           <p class="total-clr">&#2547; <span id="carttotal"></span></p>
                        </div>
                        <!-- end checkout-product-cont-->

                        <div class="form-group">
                         <div class="billing_payment_mathod">

                                     <div class="checkbox_item mb-0 pl-0">
                                         <label for="check_payments"><input name="payment_method" value="stripe" type="radio">Stripe</label>
                                     </div>

                                     <div class="checkbox_item mb-0 pl-0">
                                         <label for="cash_delivery"><input name="payment_method" value="cash" type="radio"> Cash On Delivery </label>
                                     </div>

                                     <div class="checkbox_item mb-0 pl-0">
                                         <label for="paypal_checkbox"><input name="payment_method" value="card" type="radio">Card<a href="#!"></a></label>
                                     </div>

                             <button type="submit" class="btn btn-primary">PLACE ORDER</button>
                         </div>

                           </div>
                           <!-- end form-check  -->



                        </div>
                        <!-- end form-group  -->


                     </div>
                     <!-- end checkout-total-radio  -->

                     {{-- <div class="checkout-button-holder">
                         <button type="submit" class="btn btn-success">PLACE ORDER</button>
                     </div> --}}
                     <!-- end checkout-button-holder -->
                  </div>
                  <!-- end checkout-product-inner-cont  -->
                 </form>
               </div>
               <!-- end checkout-product-info  -->
            </div>
            <!-- end checkout-form-inner  -->
         </div>
    </div>
    </div>
</section>
<br>
 @include('frontend.body.brands')
</div>
@endsection
