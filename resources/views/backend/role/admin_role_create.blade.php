@extends('admin.admin_master')

@section('main-content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid pt-5">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title pb-2">Create Admin</h4>
                        <form method="post" action="{{ route('role.admin.user.store',config('fortify.guard')) }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="admin-input-container">
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="user-name" class="form-label">User Name</label>
                                            <div class="controls">
                                                <input type="text" id="user-name" name="name" class="form-control" placeholder="User Name" >
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">User Phone</label>
                                            <div class="controls">
                                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" >
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="adminUserImage" class="form-label">User Image</label>
                                            <div class="controls">
                                                <input type="file" name="profile_photo_path" class="form-control" required="" id="image">
                                            </div>
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="controls">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" >
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="controls">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
                                            </div>
                                        </div>

                                        <div>
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;" alt="Image">
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>

                            <div class="admin-access-container pt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_2" name="admin_dashboard" value="1">
                                            <label class="form-check-label" for="customckeck1">Admin Dashboard </label>
                                        </div>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_2" name="brand" value="1">
                                            <label class="form-check-label" for="customckeck1">Brand</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-success">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_3" name="category" value="1">
                                            <label class="form-check-label" for="customckeck2">Category</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_4" name="product" value="1">
                                            <label class="form-check-label" for="customckeck3">Product</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-warning">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_5" name="slider" value="1">
                                            <label class="form-check-label" for="customckeck4">Slider</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-warning">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_17" name="pos" value="1">
                                            <label class="form-check-label" for="customckeck13">POS</label>
                                        </div>
                                       
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="employee" value="1">
                                            <label class="form-check-label" for="customckeck12">Employee</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="supplier" value="1">
                                            <label class="form-check-label" for="customckeck12">Supplier</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="expence" value="1">
                                            <label class="form-check-label" for="customckeck12">Expence</label>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_7" name="shipping" value="1">
                                            <label class="form-check-label" for="customckeck10">Shipping</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-success">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_9" name="setting" value="1">
                                            <label class="form-check-label" for="customckeck11">Setting</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_10" name="returnorder" value="1">
                                            <label class="form-check-label" for="customckeck12">Return Order</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-warning">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_11" name="review" value="1">
                                            <label class="form-check-label" for="customckeck13">Review</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-pink">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_6" name="cupons" value="1">
                                            <label class="form-check-label" for="customckeck5">Coupons</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="department" value="1">
                                            <label class="form-check-label" for="customckeck12">Department</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="employee_salary" value="1">
                                            <label class="form-check-label" for="customckeck12">Employee salary</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="purchase" value="1">
                                            <label class="form-check-label" for="customckeck12">Purchase</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_12" name="orders" value="1">
                                            <label class="form-check-label" for="customckeck10">Orders</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-success">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_13" name="stock" value="1">
                                            <label class="form-check-label" for="customckeck11">Stock</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_14" name="reports" value="1">
                                            <label class="form-check-label" for="customckeck12">Reports</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-warning">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_15" name="alluser" value="1">
                                            <label class="form-check-label" for="customckeck13">Alluser</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="adminuserrole" value="1">
                                            <label class="form-check-label" for="customckeck12">Adminuserrole</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="banner" value="1">
                                            <label class="form-check-label" for="customckeck12">Banner</label>
                                        </div>
                                        <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="banner_caregory" value="1">
                                            <label class="form-check-label" for="customckeck12">Banner Caregory</label>
                                        </div> 
                                        
                                         <div class="form-check mb-2 form-check-danger">
                                            <input type="checkbox" class="form-check-input rounded-circle" id="checkbox_16" name="websetting" value="1">
                                            <label class="form-check-label" for="customckeck12">Web Settings</label>
                                        </div> 
                                    </div>
                                </div> <!-- end row-->
                            </div>
                            <button type="submit" class="admin-btn mt-3">Add Admin</button>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div> <!-- container -->


</div> <!-- content -->
@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection


