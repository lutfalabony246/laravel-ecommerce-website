
@php
$id = (Auth::check()) ? (Auth::user()->id): false ;


($id)? $user = App\Models\User::find($id) : ($user=null);
@endphp

<div class="user-info">


@php
$id = (Auth::check()) ? (Auth::user()->id): false ;


($id)? $user = App\Models\User::find($id) : ($user=null);
@endphp

<div class="user-info">

    <div class="">
        <div>
           <div class="user-profile-image d-flex justify-content-center">
            <img class="cart-img-top" style="border-radius:50%" src="{{ (!empty($user->profile_photo_path))?url('upload/users_images/'
            .$user->profile_photo_path):url('upload/avatar-1.png') }}" alt="User Avatar" height="150px" weight="150px">
           </div>
           <!-- end user-profile-image  -->
           <div class="user-info">
              <h4>{{ Auth::user()->name }}</h4>
           </div>
        </div>

        <div class="nav nav-pills me-3 user-menu-btn d-flex flex-lg-column flex-wrap " id="v-pills-tab"
           role="tablist" aria-orientation="vertical">
           <!-- ---------------------- Side Buttons -------------------------- -->
            <a href="{{ url('/') }}" class="btn active"> Home Page </a>
            <a href="{{ route('user.profile') }}" class="btn">Profile Update</a>
            <a href="{{ route('my.orders') }}" class="btn">My Order</a>
            <a href="{{ route('cancel.orders') }}" class="btn">Cancel Order</a>

            <a href="{{ route('return.order.list') }}" class="btn">Return Order</a>
            {{--  <a href="{{ route('wishlist') }}" class="btn">My Whishlist</a>  --}}
            <a href="{{ route('checkout') }}" class="btn">Checkout</a>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Order tracking
            </button>
            <a href="{{ route('change.password') }}" class="btn">Change Password</a>
            <a href="{{ route('user.logout')}}" class="btn">Log Out</a>

        </div>
     </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('order.tracking') }}">
                @csrf
               <div class="modal-body">
                <label>Invoice Code</label>
                <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">
               </div>

               <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

              </form>
        </div>

      </div>
    </div>
  </div>


<!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="{{ route('order.tracking') }}">
            @csrf
           <div class="modal-body">
            <label>Invoice Code</label>
            <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">
           </div>

           <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

          </form>
        </div>

      </div>
    </div>
  </div>

</div>







