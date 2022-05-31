
@include('frontend.body.header_top')
@include('frontend.body.bppshop_header')

<section class="bppShop-main-content  category-closed" id="main-content">
    <!-- <<<<<<<<<<<<<<<<<<< bpp_shop_main_container start >>>>>>>>>>>>>>>>> -->
    <section class="bpp_shop_main_container">
       <div class="container">
          <div class="row mt-5 pt-5">
             <div class="col-lg-3 col-md-4 col-sm-12">
                <a href=" {{ route('islamic') }} ">
                    <div class="card">
                        <div class="card-body">
                           <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/bpp_islamic.jpg') }}" alt="">
                        </div>
                        <div class="card-footer">
                           <h5 class="text">Islamic Product</h5>
                        </div>
                     </div>                   
                </a>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/grocery_new.jpg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Grocery</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/fashion.jpg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Fashion</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/electronics.jpg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Electronics</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/baby_products.jpeg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Baby Care</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/cosmetic.png') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Cosmetic</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/furniture.jpg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Furniture</h5>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                   <div class="upcoming">
                      <p>Upcoming...</p>
                   </div>
                   <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('frontend/assets/images/bpp_shop_main/shoe.jpeg') }}" alt="">
                   </div>
                   <div class="card-footer">
                      <h5 class="text">Shoe</h5>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- <<<<<<<<<<<<<<<<<<< bpp_shop_main_container end >>>>>>>>>>>>>>>>> -->


 </section>

 <script>
   //======================== Search option start ======================//
   let searchById = document.getElementById("searchId");
   
       searchById.addEventListener("keyup", event => {
           let searchBy = event.target.value;
           if(searchBy !=''){
                  $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html(response);
                      }
                  });
              }else{
               $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html('');
                      }
                  });
              }
   
       });
   
   //======================== Search option end ======================//
   </script>


@include('frontend.body.footer_bpp_shop')
@include('frontend.body.header_footer')