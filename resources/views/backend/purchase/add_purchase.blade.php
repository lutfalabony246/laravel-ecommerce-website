@extends('admin.admin_master')
@section('css')
 <link href="{{ asset('backend/assets') }}/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- form start -->
            <form class="mt-4" action="{{ route('role.purchase.store', config('fortify.guard')) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <!-- start card -->
                        <div class="card">
                            <div class="card-header" style="background-color: #fff;">
                                <h4>Purchase</h4>
                            </div>
                            <div class="card-body">
                                
                                <div class="row mb-3">
                                    
                                    <div class="col-lg-2" style="width: 193px;">
                                        <label for="validationCustom01" class="col-form-label ">  Supplier Name <span class="text-danger">**</span></label>
                                        <select id="suppler_id" name="supplier_id" class="form-control select2" data-toggle="select2" >
                                            <option selected disabled>Select Supplier Name</option>
                                            @foreach ($suppliers as $item)
                                                <option value="{{ $item->id }}">{{ $item->supplyer_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="col-lg-1"style="width: 166px; padding-left:0px" >
                                        <label for="validationCustom02" class="col-form-label">Purchase Date <span class="text-danger">**</span></label>
                                        <input type="date" id="purchase_date" name="purchase_date" class="form-control "  >
                                        @error('purchase_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    
                                     <div class="col-lg-3">
                                        <label for="validationCustom03" class="col-form-label">Product Name <span class="text-danger">**</span></label>
                                        <select name="product_name" id="product_namepurchase" class="form-control "
                                            >
                                            <option selected disabled>Select Product Name</option>
                                            <option value="new">Add New Product </option>
                                            @foreach ($product as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                        <input style="border: thick double #32a1ce;" type="text" name="new_product"
                                            id="product_namebig" class="form-control">
                                        {{-- <input name="product_name" id="product_namebig" class="form-control" rows="3"></textarea> --}}
                                        @error('product_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    
                                      <div class="col-lg-2">
                                        <label for="validationCustom04" class="col-form-label">Category Name <span class="text-danger">**</span></label>
                                        <select id="category_id" name="category_id" class="form-control" >
                                            <option selected disabled>Select Category Name</option>
                                            @foreach ($Categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <label for="validationCustom05" class="col-form-label">Sub Category Name <span class="text-danger">**</span></label>
                                        <select id="sub_category_id" name="sub_category_id" class="form-control">
                                            <option selected disabled>Select Sub Category Name</option>
                                            @foreach ($SubCategorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->sub_category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                    
                                     <div class="col-lg-2">
                                        <label for="validationCustom06" class="col-form-label">Sub Sub Category Name</label>
                                        <select id="sub_sub_category_id" name="sub_sub_category_id" class="form-control"
                                            >
                                            <option selected disabled>Select Sub Sub Category Name</option>
                                            @foreach ($SubSubCategorys as $subsubcategory)
                                                <option value="{{ $subsubcategory->id }}">
                                                    {{ $subsubcategory->subsubcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                                <!-- end row -->
                                <div class="row ">
                                    <div class="col-lg-2">
                                        <label for="validationCustom07" class="col-form-label">Product Quantity <span class="text-danger">**</span></label>
                                        <input
                                            type="number" id="product_qty" name="product_qty" class="form-control" placeholder="0.00"
                                            >
                                        @error('product_qty')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="validationCustom08" class="col-form-label">Unit Price <span class="text-danger">**</span></label>
                                        <input type="number" id="unit_price"
                                            name="unit_price" class="form-control" >
                                        @error('unit_price')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="validationCustom09" class="col-form-label">Total Price</label>
                                        <input type="number" readonly id="total_price" name="total_price"
                                            class="form-control" >
                                        @error('total_price')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                     <div class="col-lg-2">
                                        <label for="validationCustom10" class="col-form-label">Pay Amount <span class="text-danger">**</span></label>
                                        <input  type="number" id="pay_amount"
                                            name="pay_amount" class="form-control" placeholder="0.00">
                                        @error('pay_amount')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="validationCustom11" class="col-form-label">Due Amount</label>
                                        <input type="number" readonly id="due_amount" name="due_amount"
                                            class="form-control" >
                                        @error('due_amount')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                     <div class="col-lg-2">
                                        <label for="validationCustom12" class="col-form-label">Payment Method <span class="text-danger">**</span></label>
                                        <select id="payment_method"
                                            name="payment_method" class="form-control" >
                                            <option selected disabled>Payment Method</option>
                                            <option>Cash</option>
                                            <option>Bank</option>
                                            <option>Bkash</option>
                                        </select>
                                        @error('payment_method')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                               <div class="col-lg-4">
                                        <label for="validationCustom13" class="col-form-label">Purchase Note</label>
                                        <textarea id="purchase_note" name="purchase_note" class="form-control"
                                            cols="10" rows="3"></textarea>
                                        @error('purchase_note')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->


                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                    </div>
                    <!-- end col-->
                </div>
                <button class="btn btn-blue mb-2" type="submit">Submit</button>
            </form>
            <!-- form end -->



        </div> <!-- container -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const addPriceObject = {
                product_qty: document.querySelector('#product_qty'),
                total_price: document.querySelector('#total_price'),
                pay_amount: document.querySelector("#pay_amount"),
                due_amount: document.querySelector('#due_amount'),
                unit_price: document.querySelector('#unit_price'),
                TOTAL_PRICE: 0,
                PRODUCT_QTY: 0,
                UNIT_PRICE: 0,
                DUE_PAYMENT: 0,
                PAY_AMOUNT: 0,
                calculateTotal() {
                    this.TOTAL_PRICE = this.PRODUCT_QTY * this.UNIT_PRICE;
                    this.SETItem_IN_DOM();

                },
                SETItem_IN_DOM() {
                    this.total_price.value = this.TOTAL_PRICE;
                    this.due_amount.value = this.TOTAL_PRICE - this.PAY_AMOUNT;
                },

                init() {
                    this.product_qty.addEventListener('keyup', (event) => {
                        this.PRODUCT_QTY = event.target.value;
                        this.calculateTotal();
                    });
                    this.product_qty.addEventListener('click', (event) => {
                        this.PRODUCT_QTY = event.target.value;
                        this.calculateTotal();
                    });
                    this.unit_price.addEventListener('keyup', (event) => {
                        this.UNIT_PRICE = event.target.value;
                        this.calculateTotal();
                    });
                    this.unit_price.addEventListener('click', (event) => {
                        console.log("this is running")
                        this.UNIT_PRICE = event.target.value;
                        this.calculateTotal();
                    });
                    this.pay_amount.addEventListener('keyup', (event) => {
                        this.PAY_AMOUNT = event.target.value;
                        this.calculateTotal();
                    });
                    this.pay_amount.addEventListener('click', (event) => {
                        this.PAY_AMOUNT = event.target.value;
                        this.calculateTotal();
                    });
                }
            }
            addPriceObject.init();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const showProductCategory = {
                product_name: document.querySelector("#product_namepurchase"),
                category_id: document.querySelector("#category_id"),
                sub_category_id: document.querySelector("#sub_category_id"),
                sub_sub_category_id: document.querySelector("#sub_sub_category_id"),
                init() {
                    this.product_name.addEventListener('change', (event) => {
                        let product_id = event.target.value;
                        axios.get(
                                `/{{ config('fortify.guard') }}/purchase/getCategoryByProduct/${product_id}`
                            )
                            .then(response => {
                                console.log(response);
                                const {
                                    category,
                                    sub_category,
                                    sub_sub_category
                                } = response.data;
                                console.log(category, sub_category, sub_sub_category)
                                this.sub_sub_category_id.value = sub_sub_category;
                                this.sub_category_id.value = sub_category;
                                this.category_id.value = category;

                            })
                    })
                }
            }
            showProductCategory.init();
        })
    </script>
    <script type="text/javascript">
        const setSubCategoryOption = document.querySelector("#sub_category_id").innerHTML =
            '<option selected disabled>Select Sub Category Name</option>';
        const setSubSubCategoryOption = document.querySelector("#sub_sub_category_id").innerHTML =
            '<option selected disabled>Select Sub  Sub-Category Name</option>';

        $(document).ready(function() {
            const showProductSubCategory = {
                category_id: document.querySelector("#category_id"),
                sub_category_id: document.querySelector("#sub_category_id"),
                sub_sub_category_id: document.querySelector("#sub_sub_category_id"),
                init() {
                    this.category_id.addEventListener('change', (event) => {
                        let category_id = event.target.value;
                        this.sub_category_id.innerHTML = '';
                        this.sub_sub_category_id.innerHTML = '';
                        axios.get(
                                `/{{ config('fortify.guard') }}/subsubcategory/subcategory/ajax/${category_id}`
                            )
                            .then(response => {
                                const {
                                    data: {
                                        subsubcategories
                                    }
                                } = response;
                                this.setsubCategories(response.data);

                            })
                        this.setSubSubCategoryOption;
                    })
                    this.sub_category_id.addEventListener('focus', (event) => {
                        let sub_category_id = event.target.value;
                        axios.get(
                                `/{{ config('fortify.guard') }}/subsubcategory/sub-subcategory/ajax/${sub_category_id}`
                            )
                            .then(response => {
                                if (response.data == '') {
                                    this.setSubSubCategoryOption
                                } else {
                                    this.setSubSubCategoris(response.data)
                                }

                            })

                    })
                    this.sub_category_id.addEventListener('change', (event) => {
                        let sub_category_id = event.target.value;
                        axios.get(
                                `/{{ config('fortify.guard') }}/subsubcategory/sub-subcategory/ajax/${sub_category_id}`
                            )
                            .then(response => {
                                this.setSubSubCategoris(response.data)
                            })
                    })
                },
                setsubCategories(subcategories) {
                    this.sub_category_id.innerHTML = "";
                    subcategories.forEach(subCategory => {
                        let option = document.createElement('option');
                        option.value = subCategory.id;
                        option.innerText = subCategory.sub_category_name;
                        this.sub_category_id.appendChild(option);
                    })
                },
                setSubSubCategoris(subsubcategories) {
                    this.sub_sub_category_id.innerHTML = "";

                    subsubcategories.forEach(subsubCategory => {
                        let option = document.createElement('option');
                        option.value = subsubCategory.id;
                        option.innerText = subsubCategory.subsubcategory_name;
                        this.sub_sub_category_id.appendChild(option);
                    })
                }
            }
            showProductSubCategory.init();
        })

        // $(document).ready(function)(){

        //     const category_id    = document.querySelector("#category_id"),
        //      sub_category_id     = document.querySelector("#sub_category_id"),
        //      sub_sub_category_id = document.querySelector("#sub_sub_category_id"),

        //     category_id.addEventListener('change',(event)=>{
        //         let category_id = event.target.value;
        //         alert('category_id');
        //     }

        // });
    </script>


    <script>
        $('#product_namebig').hide().attr('name', '');
        $('#product_namepurchase').change(function() {
            if ($(this).val() == 'new') {
                $(this).hide().attr('name', '');
                $('#product_namebig').show().attr('name', 'new_product');
            }


        });
    </script>
@endsection
@section('script')
     <script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script>
@endsection

