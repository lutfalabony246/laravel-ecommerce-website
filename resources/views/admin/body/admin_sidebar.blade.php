 @php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();
 @endphp

@php
$currentUser = auth()->guard(config('fortify.guard'))->user();
$brand = isset($currentUser->brand) && $currentUser->brand == 1 ? true:false;
$category = isset($currentUser->category) && $currentUser->category == 1 ?  true:false;
$product = isset($currentUser->product) && $currentUser->product == 1 ?  true:false;
$slider = isset($currentUser->slider) && $currentUser->slider == 1 ? true:false;
$cupons =  isset($currentUser->cupons) && $currentUser->cupons == 1 ? true:false;
$shipping = isset($currentUser->shipping) && $currentUser->shipping == 1 ?  true:false;
$setting =  isset($currentUser->setting) && $currentUser->setting == 1 ? true:false;
$returnorder =  isset($currentUser->returnorder) && $currentUser->returnorder == 1 ?true:false;
$review =  isset($currentUser->review) && $currentUser->review == 1 ?true:false;
$orders =  isset($currentUser->orders) && $currentUser->orders == 1 ? true:false;
$stock = isset($currentUser->stock) && $currentUser->stock == 1 ? true:false;
$reports =  isset($currentUser->reports) && $currentUser->reports == 1 ? true:false;
$alluser = isset($currentUser->alluser) && $currentUser->alluser == 1 ?  true:false;
$adminuserrole =isset($currentUser->adminuserrole) && $currentUser->adminuserrole == 1 ?  true:false;
$expense  = isset($currentUser->expence ) && $currentUser->expence  == 1 ? true:false;
$department  = isset($currentUser->department ) && $currentUser->department  == 1 ? true:false;
$pos  = isset($currentUser->pos ) && $currentUser->pos  == 1 ? true:false;
$employee  = isset($currentUser->employee ) && $currentUser->employee  == 1 ? true:false;
$supplier  = isset($currentUser->supplier ) && $currentUser->supplier  == 1 ? true:false;
$banner_caregory  = isset($currentUser->banner_caregory ) && $currentUser->banner_caregory  == 1 ? true:false;
$banner  = isset($currentUser->banner ) && $currentUser->banner  == 1 ? true:false;
$purchase  = isset($currentUser->purchase ) && $currentUser->purchase  == 1 ? true:false; 
$websetting  = isset($currentUser->websetting ) && $currentUser->websetting  == 1 ? true:false; 
$supplier_dashboard = isset($currentUser->supplier_dashboard ) && $currentUser->supplier_dashboard  == 1 ? true:false; 

$admin_dashboard = isset($currentUser->admin_dashboard ) && $currentUser->admin_dashboard  == 1 ? true:false; 
      

@endphp
 <div class="left-side-menu">
     <div class="h-100" data-simplebar>
         <!--- Sidemenu -->
         <div id="sidebar-menu">

             <ul id="side-menu">
                 
                      @if($admin_dashboard == true)
                 <li>
                     <a href="{{ route('admin.dashboard') }}">
                         <i class="fas fa-calculator"></i>
                         <span> Dashboard </span>
                     </a>
                 </li>
                  @else
                 @endif
                 
                 
                 @if ($pos == true)
                 <li>
                     <a href="{{ route('role.pos', config('fortify.guard')) }}">
                         <i class="fas fa-calculator"></i>
                         <span> POS </span>
                     </a>
                 </li>

                 @else
                 @endif
        @if($brand == true)
                 <li>
                     <a href="#brand" data-bs-toggle="collapse">
                         <i class="fas fa-list-alt"></i>
                         <span> Brands </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="brand">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.brandnew.allbrand', config('fortify.guard')) }}">All
                                     Brands</a>
                             </li>
                         </ul>
                     </div>
                 </li>
        @endif

        @if($category == true)
                 <li>
                     <a href="#category" data-bs-toggle="collapse">
                         <i class="fas fa-list-alt"></i>
                         <span> Category </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="category">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.category.catview', config('fortify.guard')) }}">All
                                     Category</a>
                                 {{-- <a href="{{ route('role.all.brand', config('fortify.guard')) }}">All Brands</a> --}}
                             </li>
                             <li>
                                 <a href="{{ route('role.subcategory.allsubcategory', config('fortify.guard')) }}">All
                                     Sub-Category</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.subsubcategory.view', config('fortify.guard')) }}">All
                                     Sub-Sub-Category</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 @else
                 @endif
                 @if ($supplier == true)
                 <li>
                     <a href="#supplier" data-bs-toggle="collapse">
                         <i class="fas fa-shopping-cart"></i>
                         <span>Manage Supplier </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="supplier">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.suppliers.show', config('fortify.guard')) }}">All
                                     Supplier</a>
                             </li>

                         </ul>
                     </div>
                 </li>

                 @else
                 @endif



 @if($product == true)
                 <li>
                     <a href="#product" data-bs-toggle="collapse">
                         <i class="fas fa-list-alt"></i>
                         <span> Manage Product </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="product">
                         <ul class="nav-second-level">

                             <li>
                                 <a href="{{ route('role.manage-product', config('fortify.guard')) }}">Add
                                     Product</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.porduct.hotDeals', config('fortify.guard')) }}"> Products Hot
                                     Deals
                                     </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 @else
                 @endif
                 @if($orders == true)
                 <li>
                     <a href="#order" data-bs-toggle="collapse">
                         <i class="fab fa-first-order"></i>
                         <span> Orders </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="order">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.pending.orders', config('fortify.guard')) }}">Pending
                                     Orders</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.confirmed-orders', config('fortify.guard')) }}">Confirmed
                                     Orders</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.confirm-processing', config('fortify.guard')) }}">Processing
                                     Orders</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.picked-orders', config('fortify.guard')) }}">Picked
                                     Orders</a>
                             </li>

                             <li>
                                 <a href="{{ route('role.shipped-orders', config('fortify.guard')) }}">Shipped
                                     Orders</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.delivered-orders', config('fortify.guard')) }}">Delivered
                                     Orders</a>
                             </li>

                             <li>
                                 <a href="{{ route('role.cancel-orders', config('fortify.guard')) }}">Cancel
                                     Orders</a>
                             </li>


                         </ul>
                     </div>
                 </li>
                 @else
                 @endif
                 @if($returnorder == true)
                 <li>
                     <a href="#product-stock" data-bs-toggle="collapse">
                         <i class="fa fa-undo"></i>
                         <span> Return Order </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="product-stock">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.return.request', config('fortify.guard')) }}">Return
                                     Request</a>
                             </li>
                             <li>
                                 <a href="{{ route('role.all.request', config('fortify.guard')) }}">All Return</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 @else
                 @endif
                 @if($stock == true)
                 <li>
                     <a href="#return-order" data-bs-toggle="collapse">
                         <i class="fa fa-list"></i>
                         <span> Manage Stock </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="return-order">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.product.stock', config('fortify.guard')) }}">Product
                                     Stock</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 @else
                 @endif

             @if($employee == true)
             <li>
                 <a href="#add-employee" data-bs-toggle="collapse">
                     <i class="fa fa-building"></i>
                     <span> Employee Manage </span>
                     <span class="menu-arrow"></span>
                 </a>

                 <div class="collapse" id="add-employee">
                     <ul class="nav-second-level">

                        @if($department == true)
                        <li>
                            <a href="{{ route('role.department.view', config('fortify.guard')) }}">Manage
                                Department</a>
                        </li>
                        @else
                        @endif

                         <li>
                             <a href="{{ route('role.employee.addform', config('fortify.guard')) }}">Add Employee</a>
                         </li>
                         <li>
                             <a href="{{ route('role.employee.view' , config('fortify.guard')) }}">Manage Employee</a>
                         </li>
                     </ul>
                 </div>
             </li>
           @else
        @endif


        @if ($expense == true)
        <li>
            <a href="#expense" data-bs-toggle="collapse">
                <i class="fas fa-shopping-cart"></i>
                <span> Expense </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="expense">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('role.expense.add', config('fortify.guard')) }}">Add Expence</a>
                    </li>
                    <li>
                        <a href="{{ route('role.expense.list', config('fortify.guard')) }}">View Expence</a>
                    </li>
                </ul>
            </div>
        </li>
        @else
        @endif
    @if ($reports == true)
    <li>
        <a href="#sidebarReport" data-bs-toggle="collapse">
            <i class="fas fa-file"></i>
            <span> All Reports </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarReport">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('role.all-reports', config('fortify.guard')) }}">Order
                        Reports</a>
                </li>

                <li>
                    <a href="{{ route('role.sale.report', config('fortify.guard')) }}">Sales
                        Reports</a>
                </li>


                <li>
                    <a href="{{ route('role.return-report-view', config('fortify.guard')) }}">Return
                        Product Reports</a>
                </li>
                <li>
                    <a href="{{ route('role.User-activity-view', config('fortify.guard')) }}">User
                        Active
                        Reports</a>
                </li>
                <li>
                    <a href="{{ route('role.sallary-report-view', config('fortify.guard')) }}">Salary
                        Reports</a>
                </li>

                <li>
                    <a href="{{ route('role.profit.report', config('fortify.guard')) }}">Profit
                        Reports</a>
                </li>
                <li>
                    <a href="{{ route('role.purchase.report', config('fortify.guard')) }}">Purchase
                        Reports</a>
                </li>

                <li>
                    <a href="{{ route('role.catwiseproduct.report', config('fortify.guard')) }}">Categpry Wise Product
                        Reports</a>

                </li>

                <li>
                    <a href="{{ route('role.gy.report',config('fortify.guard')) }}">Product Stock
                        Reports</a>

                </li>

            </ul>
        </div>
    </li>
@else
@endif

                @if($websetting == true)
                 <li>
                    <a href="#web_site_setting" data-bs-toggle="collapse">
                        <i class="fe-settings"></i>
                        <span> Web Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="web_site_setting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#manager_slider" data-bs-toggle="collapse">

                                    <i class="fas fa-sliders-h"></i>
                                    <span> Slider Option </span>
                                </a>

                                <div class="collapse" id="manager_slider">
                                    <ul class="nav-second-level">
                                        @if($slider == true)
                                        <li>
                                            <a href="{{ route('role.manage.slider', config('fortify.guard')) }}">Manage
                                                Slider</a>
                                        </li>
                                        @else
                                    @endif
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#top_banner" data-bs-toggle="collapse">
                                    <i class="far fa-image"></i>
                                    <span> Top Banner </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="top_banner">
                                    <ul class="nav-second-level">
                                        @if($banner == true)
                                        <li>
                                            <a href="{{ route('role.bennar.manage', config('fortify.guard')) }}">Manage Banner</a>

                                        </li>
                                        @else
                                    @endif
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#bannerCategory" data-bs-toggle="collapse">
                                    <i class="far fa-image"></i>
                                    <span> Ads Banner  </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="bannerCategory">
                                    <ul class="nav-second-level">
                                        @if($banner_caregory == true)
                                        <li>
                                            <a href="{{ route('role.bannerCategory.manage', config('fortify.guard')) }}">Manage
                                                Banner</a>
                                        </li>
                                        @else
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#coupon" data-bs-toggle="collapse">
                                    <i class="fas fa-gift"></i>
                                    <span> Coupon Option </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="coupon">
                                    <ul class="nav-second-level">
                                       @if($cupons == true)
                                        <li>
                                            <a href="{{ route('role.manage.coupon', config('fortify.guard')) }}">Manage
                                                Coupon</a>
                                        </li>
                                        @else
                                        @endif

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                
                @else
                @endif
                
                @if($purchase == true)
                <li>
                    <a href="#software_setting_main" data-bs-toggle="collapse">
                        <i class="fe-settings"></i>
                        <span> Software Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="software_setting_main">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#software_setting" data-bs-toggle="collapse">
                                    Admin User Role <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="software_setting">
                                    <ul class="nav-second-level">
                                        @if($adminuserrole == true)
                                        <li>
                                            <a href="{{ route('role.all.admin.user', config('fortify.guard')) }}">All Admin User
                                                Role</a>
                                        </li>
                                        @else
                                    @endif
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#user_all" data-bs-toggle="collapse">
                                    All Users <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="user_all">
                                    <ul class="nav-second-level">
                                        @if($alluser == true)
                                        <li>
                                            <li>
                                                <a href="{{ route('role.all-users', config('fortify.guard')) }}">All Users</a>
                                            </li>
                                        </li>
                                        @else
                                    @endif
                                    </ul>
                                </div>
                            </li>
                            @if ($setting == true)
                                    <li>
                                        <a href="{{ route('role.site.setting', config('fortify.guard')) }}">
                                            General Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('role.seo.setting', config('fortify.guard')) }}">
                                            SEO Setting</a>
                                    </li>
                                    @else
                                    @endif


                        </ul>
                    </div>
                </li>
                @else
               @endif
               
               
                   @if ($supplier_dashboard == true)    
         <li>
         <a href="#SupplierPanel" data-bs-toggle="collapse">
             <i class="fas fa-list-alt"></i>
             <span> Supplier Panel </span>
             <span class="menu-arrow"></span>
         </a>
         <div class="collapse" id="SupplierPanel">
             <ul class="nav-second-level">
                 <li>
                     <a href="{{ route('role.demo', config('fortify.guard')) }}">
                         Supplier Dashboard
                     </a>

                 </li>

                 <li>
                     <a href="{{ route('role.supplier.product', config('fortify.guard')) }}">
                         Supplier Product List
                     </a>

                 </li>
                 <li>
                     <a href="{{ route('role.supplier.payment', config('fortify.guard')) }}">
                         Supplier Payment
                     </a>

                 </li>

                 <li>
                     <a href="{{ route('role.supplier.return_product', config('fortify.guard')) }}">
                         Supplier Return Product
                     </a>

                 </li>
             </ul>
         </div>
        </li>
           @else
               @endif


            </ul>

        </div>
        <!-- End Sidebar -->
    </div>
    <!-- Sidebar -left -->
</div>

