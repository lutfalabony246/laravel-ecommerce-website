@extends('frontend.main_master')

 @section('index')
 @include('frontend.body.mobile_sidbar_menu')

<section class="profile">
    <div class="container">

      <div class="row profile-wrapper">
          <div class="col-lg-2" style="padding-top: 100px">
              @include('frontend.common.user_sidebar')
          </div>
          <div class="col-lg-10" style="padding: 250px 0px 0px 100px">
            <div class="cart_table mb_50">
                <table class="table">
                    <thead class="text-uppercase">
                        <tr>
                            <th>Product Image & Name</th>
                            <th>S Price</th>
                            <th>D Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="wishlistToShow">



                    </tbody>
                </table>
            </div>
          </div>
      </div>

    </div>
</section>



@endsection
