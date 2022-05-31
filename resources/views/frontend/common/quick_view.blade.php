	<!-- product quick view - start -->
    <div class="quickview_modal modal fade" id="quickview_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content clearfix">
                <button type="button" class="close" id="closeModel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="item_image">
                    <img src="" class="card-img-top" id="pimg" alt="productimg" height="200" width="180">
                </div>
                <div class="item_content">
                    <span class="item_price mb_15" style="font-size:25px;" >Product Price: <span id="price" style="color: green;">;</span><strong style="color: green;">&#2547</strong>&nbsp; <del id="oldprice"></del> <strong>&#2547;</strong></span>
                    <p class="mb_30"><strong>Product Name: </strong><span id="pname" ></span></p>
                    <div class="quantity_form mb_30 clearfix">
                        <strong class="list_title">Quantity: </strong>
                        <div class="quantity_input">
                            <form action="#">
                                <span class="input_number_decrement">–</span>
                                <input id="qty" class="input_number" type="text">
                                <span class="input_number_increment">+</span>
                            </form>
                        </div>
                    </div>
                    <div class="item-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details">
                                    <ul>
                                        <li> Product Code : <span id="pcode"></span></li>
                                        <li> Category : <span id="pcategory"></span></li>
                                        <li> Brands : <span id="pbrand"></span></li>
                                        <li>Stock: <span class="badge badge-pill badge-success"
                                            id="aviable" style="background: green; color:white;"></span>
                                            <span class="badge badge-pill badge-success"
                                            id="stockout" style="background: red; color:white;"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Choose Color:</label>
                                    <select class="form-control" name="color" id="color">

                                    </select>
                                  </div>
                                  <div class="form-group"  id="sizeArea">
                                    <label for="size">Choose Size:</label>
                                    <select class="form-control" name="size" id="size">

                                    </select>
                                  </div>
                            </div>
                        </div>

                    </div>
                    <ul class="btns_group ul_li mb_30 clearfix">
                        <input type="hidden" id="product_id">
                        <li><a href="#!" class="custom_btn bg_carparts_red" onclick="addToCart()">Add to Cart</a></li>
                       {{-- <li><a class="tooltips" data-placement="top" title="Add To Wishlist"><i class="fal fa-heart"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- product quick view - end -->
    <!-- shop_section - end
        ================================================== -->
