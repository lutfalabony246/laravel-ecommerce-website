@php
     // for  hot_deals
  $hot_deals = App\Models\Product::where('hot_deals', 1)->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->limit(6)->get();

@endphp



<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

      @foreach($hot_deals as $hot_deal)
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image">

             <a href="{{ url('product/detail/'. $hot_deal->id ) }}"> <img src=" {{ asset( $hot_deal->product_thambnail ) }}"alt="">
             </a>
            </div>
            <div class="sale-offer-tag"><span>49%<br>
              off</span></div>
            <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
              </div>
            </div>
          </div>
          <!-- /.hot-deal-wrapper -->


          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="{{ url('product/detail/'. $hot_deal->id ) }}">{{ $hot_deal->product_name }}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="product-price"> <span class="price"> {{ $hot_deal->discount_price}} </span>
              <span class="price-before-discount">{{ $hot_deal->selling_price }}</span> </div>
            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->

          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">




                <button class="btn btn-primary icon" type="button" title="Add Cart"
                data-toggle="modal" data-target="#exampleModal" id="{{ $hot_deal->id }}" onclick="productView(this.id)">
                  <i class="fa fa-shopping-cart"></i> </button>

              <button class="btn btn-primary cart-btn" data-toggle="modal" data-target="#exampleModal" type="button" id="{{ $hot_deal->id }}" onclick="productView(this.id)">Add to cart</button>

                                </li>

              <button class="btn btn-primary icon" type="button" title="Wishlist"
              id="{{ $hot_deal->id }}"onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
              </div>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
        </div>
      </div>

      @endforeach {{-- end loop --}}

    </div>
    <!-- /.sidebar-widget -->
  </div>
