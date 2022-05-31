@extends('admin.admin_master')
@section('css')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets') }}/images/favicon.ico">

    <!-- Plugins css -->
    <link href="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('backend/assets') }}/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('backend/assets') }}/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('backend/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets') }}/css/product.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .toggle {
            margin: 0 0 0 2rem;
            position: relative;
            display: inline-block;
            width: 6rem;
            height: 2.4rem;
        }

        .toggle input {
            display: none;
        }

        .roundbutton {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            background-color: #dae0eb;
            display: block;
            transition: all 0.3s;
            border-radius: 3.4rem;
            cursor: pointer;
        }

        .roundbutton:before {
            position: absolute;
            content: "";
            height: 1.4rem;
            width: 1.5rem;
            border-radius: 100%;
            display: block;
            left: 0.5rem;
            bottom: 0.5rem;
            background-color: white;
            transition: all 0.3s;
        }

        input:checked+.roundbutton {
            background-color: #7a88e6;
        }

        input:checked+.roundbutton:before {
            transform: translate(2.6rem, 0);
        }

        .bootstrap-tagsinput {
            background: #272e48;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.12);
            font: #ffffff;
        }

    </style>
@endsection
@section('main-content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- form start -->
            <form action="{{ route('role.product_store', config('fortify.guard')) }}" method="POST"
                enctype="multipart/form-data" class=" mt-4">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                    <label class="mb-1">Product Name</label>
                                    
                                        <select id="productt" name="product_name"
                                            class="category_id form-select form-control select2" data-toggle="select2" data-width="100%">
                                            <option value="" selected="" disabled="">Select Product Name
                                            </option>
                                            @foreach ($purchase_product as $purchase_productt)
                                                <option value="{{ $purchase_productt->id }}">
                                                    {{ $purchase_productt->new_product }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                
                                       </div>   
                                       <div class="col-lg-3">
                                      <input type="hidden" name="brand_name" id="product_n">
                                        <label class="mb-1">Brand</label>
                                        <div >
                                            <select name="brand_id" class="category_id form-select form-control">
                                            <option value="" selected="" disabled="">Select Brand Name
                                            </option>
                                            @foreach ($brands as $purchase_productt)
                                                <option value="{{ $purchase_productt->id }}">
                                                    {{ $purchase_productt->brand_name_cats_eye }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                       </div>
                                    </div>
                                                <input type="hidden" class="form-control" id="category_id" name="category_id">
           
                                                <input type="hidden" class="form-control" id="subcategory_id"
                                                name="subcategory_id">
                                                <input type="hidden" class="form-control" id="subsubcategory_id"
                                                 name="subsubcategory_id">
                                    <div class="col-lg-3">
                                        <label class="mb-1">Product Unit</label>
                                        <div >
                                            <input type="text" class=" form-control"
                                                placeholder="Please enter the quantity and unit (10 kg, 120grm, 5lb, ltr, 5pcs, each)"
                                                name="unit" >
                                       </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="mb-1">Size</label>
                                        <div >
                                            <input type="text" class="selectize-close-btn form-control" value="tag"
                                                name="product_size" >
                                            @error('product_size')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                           <br>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="mb-1">
                                            Thumbnail Image<small style="color: #5a789b;"> (300*300)</small>
                                        </label>
                                       
                                            <input class="form-control" type="file" id="formFile" name="product_thambnail"
                                                onchange="mainThamUrl(this)">
                                            @error('product_thambnail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <p><small style="color: #5a789b;">Use 600*600 sizes images.Keep same
                                                    blank
                                                    images
                                                    around main object of your image</small></p>
                                            <img src="" id="mainThmb" />
                                       
                                    </div>

                                       <div class="col-lg-3">
                                            <label class="mb-1">
                                                Multi Image<small style="color: #5a789b;">(600*600)</small>
                                            </label>
                                       

                                                <input type="file" name="multi_img[]" multiple="" id="MultiImg"
                                                    class="form-control">
                                                <p><small style="color: #5a789b;">Use 600*600 sizes images</small></p>
                                                <div class="row" id="preview_img"></div>
                                         
                                      </div>
                                      <div class="col-lg-3">
                                    <div class="row mb-3">
                                    <label class="mb-1">Colors</label>
                                       <select class="form-control chkddl select2" data-toggle="select2" data-width="100%"
                                            multiple="multiple" data-placeholder="Choose Color..." id="DDL" name="color[]">
                                            <option value="Red" id="red">Red</option>
                                            <option value="Pink" id="pink">Pink</option>
                                            <option value="White" id="white">White</option>
                                            <option value="Blue" id="blue">Blue</option>
                                            <option value="Yellow" id="yellow">Yellow</option>
                                            <option value="Green" id="green">Green</option>
                                            <option value="Black" id="black">Black</option>
                                        </select>
                                     </div>
                                          
                                    </div>

                                    <div class="col-lg-3">
                                    <label for="validationCustom08" class="mb-1">Video Link</label>
                                   
                                        <input type="text" class="form-control" id="validationCustom08"
                                            placeholder="Video Link" name="video_link" >
                                   
                                    </div>
                                </div>
                           
       
           
                                 <div class="row">
                                    <div class="col-lg-6">
                                    <label class="mb-1">Description</label>
                                   
                                        <textarea class=" form-control ckeditor" name="product_descp"></textarea>
                                        @error('product_descp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                                                       
                                   </div>
                                      <div class="col-lg-6">
                                          <label for="validationCustom007" class="mb-1">Tags</label>
                                            <div>
                                            <input type="text" class="selectize-close-btn form-control" value=""
                                                    name="product_tags" >
                                                @error('product_tags')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                              <div >
                                     
                                                <label for="validationCustom08" class="mb-1">Vat %</label>
                                            
                                                    <input type="text" class="form-control" id="validationCustom08" placeholder="Vat"
                                                        data-toggle="input-mask" data-mask-format="000" name="vat"
                                                        >
                                    
                                              </div>
                                                <br>
                                                
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Refundable</label>
                                                  <div>
                                                  <label class="toggle">
                                                            <input id="toggleswitch" type="checkbox" name="refundable">
                                                            <span class="roundbutton"></span>
                                                        </label>
                                                
                                                  </div>
                                                   
<br>
<br>
                                                        <!-- <div class="col-sm-1">
                                                        <input class="form-check-input chkddl" type="checkbox" value=""
                                                            id="flexCheckDefault" onclick="Enableddl(this)">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Check
                                                        </label>
                                                      </div> -->
                                      </div>
                                </div>
                                <div class="row mb-3">                               
                                </div>
                                <div class="mb-3 row">
                                    
                                </div>
                            </div> <!-- end card-body-->                          
                        </div> <!-- end card-->
  
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-lg-4">
                                            <label class="mb-1">Purchase Price</label>
                                            <div >
                                            <input  type="text" class="form-control disable"  placeholder="Purchase Price"
                                                name="purchase_price" id="purchase" data-mask-format="0000000000000">
                                            </div>
                              
                                    </div>
                                    <div class="col-lg-4">
                                            <label  class="mb-1">Selling Price</label>
                                            
                                                <input id="selling" type="text" class="form-control" placeholder="Selling Price"
                                                    data-toggle="input-mask" data-mask-format="0000000000000"
                                                    name="selling_price" >
                                                @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            
                                       
                                    </div>


                                       <div class="col-lg-4">
                                            <label class="mb-1">Discount Price</label>
                                           
                                            <input type="text" class="form-control" placeholder="Discount Price"
                                            data-toggle="input-mask" data-mask-format="0000000000000"
                                            name="discount_price" id="myTextBox" onKeyUp="checkInput()" >
                                            <div id="invalid" style="color: red;">
                                            </div>    
                                      </div>
                                    
                                    </div>

                                         <br><br>
                                 <div class=" row">
                                 <div class="col-lg-4">
                                            <label class="mb-1">Discount Start
                                                Date</label>
                                           
                                                <input type="text" id="basic-datepicker" class="form-control"
                                                    placeholder="Discount start" name="start_date">
                                           
                                          
                                      </div> 
                                    <div class="col-lg-4">
                                        <label class="mb-1">Discount End
                                            Date</label>
                                       
                                            <input type="text" id="humanfd-datepicker" class="form-control"
                                                placeholder="Discount end" name="end_date">
                                     </div>
                                     <div class="col-lg-4">
                                            <label class="mb-1">Quantity</label>
                                            
                                                <input type="number" class="form-control" placeholder="Quantity" id="qty"
                                                    name="product_qty" >
                                                @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            
                                     </div>
                                    
                                </div>
                                <!-- <div class="row mb-3">
                                   
                                </div> -->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        
                    <div class=" row"> 
                    <div class="col-xl-6 col-12">
                        <div class="card">
                            <div class="card-body">                                  
                                            <label for="validationCustom08" class="mb-1">Meta Title</label>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Meta Title"
                                                    name="meta_title" >
                                            </div><br>
                                            <label for="validationCustom08" class="mb-1">Description</label>
                                                <div >
                                                <input type="text" class="form-control" placeholder="Meta Title"
                                                name="meta_desc" >
                                                 
                                                </div>
                                                
                                              </div>
                                             
                                     </div>
                                     </div>
                                     <div class="col-xl-6 col-12">
                                     <div class="card">
                                  <div class="card-body">                           
                                            <div class="card-header" style="margin: -23px;">
                                            <h4 class="card-title">Shipping Configuration</h4>
                                            </div>
                                            <div class="card-body" style="margin: -23px;">
                                                <div class="row mb-1 switch">
                                                    <label class="col-sm-6 col-form-label">Free Shipping</label>
                                                    <div class="col-sm-6 switchery-demo">
                                                        <label class="toggle">
                                                            <input id="toggleswitch" type="checkbox" name="shipping">
                                                            <span class="roundbutton"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-header" style="margin: -23px;">
                                               <h4 class="card-title">Cash On Delivery</h4>
                                            </div>
                                                            <div class="card-body">
                                                                <div class="row mb-1 switch">
                                                                    <label class="col-sm-6 col-form-label">Cash On Delivery Available</label>
                                                                    <div class="col-sm-6 switchery-demo">
                                                                        <label class="toggle">
                                                                            <input id="toggleswitch" type="checkbox" name="cash_on_delivery">
                                                                            <span class="roundbutton"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-header" style="margin: -23px;">
                                                      <h4 class="card-title">All Deals</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-1 switch">
                                                        <label class="col-sm-6 col-form-label">Featured</label>
                                                        <div class="col-sm-6 switchery-demo">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox" name="featured">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1 switch">
                                                        <label class="col-sm-6 col-form-label">Hot Deals</label>
                                                        <div class="col-sm-6 switchery-demo">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox" name="hot_deals">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1 switch">
                                                        <label class="col-sm-6 col-form-label">Special Offer</label>
                                                        <div class="col-sm-6 switchery-demo">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox" name="special_offer">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1 switch">
                                                        <label class="col-sm-6 col-form-label">Special Deals</label>
                                                        <div class="col-sm-6 switchery-demo">

                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox" name="special_deals">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>        
                                         </div> 
                             
                            </div>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-xl-4 col-12">
                        <div class="card">
                           
                        </div>
                        <div class="card">
                            
                        </div>
                        <div class="card">
                            
                        </div>
                        <div class="card">
                           
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <input type="submit" class="btn btn-rounded btn-info mb-5 " value="Add Product">
            </form>
            <!-- form end -->
        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('meta_desc');
    </script>
    <script>
        CKEDITOR.replace('product_descp');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var myTextBox = document.getElementById('myTextBox').val();
        function checkInput() {
        var myTextBox=document.getElementById("myTextBox").value;
        var value = document.getElementById('selling').value;
        if (parseFloat(myTextBox) >= parseFloat(value)) {
            document.getElementById("invalid").innerHTML = 'discount price can not be bigger or equal than selling price';
        }
        else{
            document.getElementById("invalid").innerHTML = '';
        }
        }
    </script>
    <script>
        var input = document.getElementById('toggleswitch');
        var outputtext = document.getElementById('status');
        input.addEventListener('change', function() {
            if (this.checked) {
                outputtext.innerHTML = "1";
            } else {
                outputtext.innerHTML = "0";
            }
        });
    </script>
    <script>
        function Enableddl(chkddl) {
            var ddl = document.getElementById("DDL");
            ddl.disabled = chkddl.checked ? false : true;
            if (!ddl.disabled) {
                ddl.focus();
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#productt").on('change', function(e) {
                let purchase_id = this.value;
                console.log(purchase_id);
                const product_n = document.getElementById('product_n');
                const category_id = document.getElementById('category_id');
                const subcategory_id = document.getElementById('subcategory_id');
                const subsubcategory_id = document.getElementById('subsubcategory_id');
                const qty = document.getElementById('qty');
                 const purchase = document.getElementById('purchase');
                axios.get(`/{{ config('fortify.guard') }}/product/purshase-list/${purchase_id}`)
                    .then(response => {
                        console.log(response);
                        product_n.value = response.data.purchase.new_product;
                        category_id.value = response.data.purchase.category_id;
                        subcategory_id.value = response.data.purchase.sub_category_id;
                        subsubcategory_id.value = response.data.purchase.sub_sub_category_id;
                        qty.value = response.data.purchase.product_qty;
                        purchase.value = response.data.purchase.unit_price;
                    })
                    .catch(error => {
                    })
            });
        });
    </script>
    {{-- // Img Tham script --}}
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}
    <script>
        $(document).ready(function() {
            $('#MultiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Vendor js -->
    <script src="{{ asset('backend/assets') }}/js/vendor.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Init js-->
    <script src="{{ asset('backend/assets') }}/js/pages/form-fileuploads.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-advanced.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-masks.init.js"></script>
    <script src="{{ asset('backend/assets') }}/js/pages/form-pickers.init.js"></script>
    <!-- Validation init js-->
    <script src="{{ asset('backend/assets') }}/js/pages/form-validation.init.js"></script>
    <!-- Quill js -->
    <script src="{{ asset('backend/assets') }}/libs/quill/quill.min.js"></script>
    <!-- Init js -->
    <script src="{{ asset('backend/assets') }}/js/pages/add-product.init.js"></script>
    <!-- App js -->
    <script src="{{ asset('backend/assets') }}/js/product.js"></script>
@endsection