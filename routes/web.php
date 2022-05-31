<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\BannerCatagoryController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\EmployeeSalary;
use App\Http\Controllers\Backend\PosController;

use App\Http\Controllers\SupplierDashboardController;


// ashim controller add
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeeController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
// for frontend
use App\Http\Controllers\Frontend\IndexController;
// use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ShopController;
use Illuminate\Support\Facades\Auth;
// for user
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\PageCartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\InformationController;
use App\Http\Controllers\Backend\AdminCartController;
use App\Http\Controllers\Frontend\SocialiteLoginController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\Social_Media_LoginController;
use App\Http\Controllers\Backend\ThirdPartySettingController;
use App\Http\Controllers\Backend\FileSystem_ConfigurationController;
use App\Http\Controllers\Backend\SMTPController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\PosCartController;
use App\Http\Controllers\Backend\ShippingCountriesController;
use App\Http\Controllers\Backend\ShippingStatesController;
use App\Http\Controllers\Backend\ShippingCitiesController;
use App\Http\Controllers\Backend\ShippingZoneController;
use App\Http\Controllers\Backend\TaxController;
use App\Http\Controllers\EmployeerController;
use App\Models\User;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;


Route::middleware(['auth'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/home',[HomeController::class, 'index'] )->name('home');

Route::post('login',[UserController::class, 'login'] )->name('newlogin');

Route::post('loginWithOtp',[UserController::class, 'loginWithOtp'] )->name('loginWithOtp');
Route::post('loginWithEmail',[UserController::class, 'loginWithEmail'] )->name('loginWithEmail');
Route::get('loginWithOtp', function () {
    return view('auth/OtpLogin');
})->name('loginWithOtp.view');

Route::post('sendOtp',[UserController::class, 'sendOtp'] );
Route::post('newregister',[UserController::class, 'register'] )->name('newregister');






// Frontend Route
Route::get('/', [IndexController::class, 'islamic'])->name('user.index');

// Islamic Website
Route::get('/islamic', [IndexController::class, 'index'])->name('islamic');


Route::get('/create/registration', [IndexController::class, 'createAccount'])->name('user.register'); //name('user.index')
// User Logout Route
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
// User Update Profile
Route::get('/user/profile/update', [IndexController::class, 'UserProfile'])->name('user.profile');
// user profile store
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
// user Change Password
Route::get('/user/change/password', [IndexController::class, 'UserChnagePassword'])->name('change.password');
// user  Password Update
Route::get('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Admin All Brands Route Group
// Admin prefix route
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {
    // Admin Route
    Route::middleware(['auth:admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard')->middleware('auth:admin');
    Route::post('admin/logout', [AuthenticatedSessionController::class, 'adminDestroy'])->name('admin.logout');
});

// employeer prefix route
Route::group(['prefix'=> 'employeer', 'middleware'=>['employeer:employeer']], function(){
	Route::get('/login', [EmployeerController::class, 'loginForm'])->name('employeer.loginForm');
	Route::post('/login',[EmployeerController::class, 'store'])->name('employeer.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:employeer'
    ]));
});

Route::middleware(['auth:employeer'])->group(function(){
    // employeer Route
    Route::get('/employeer/dashboard', function () {

        return view('admin.index');
    })->name('employeer.dashboard');

    Route::get('employeer/logout', [AuthenticatedSessionController::class, 'employeerDestroy'])->name('employeer.logout');

});


Route::prefix('/admin')->name('admin.')->group(function () {
    // admin profile route
    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin_profile_view');
    // admin profile Edit route
    Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin_profile_edit');
    ////Admin Profile edit store route
    Route::post('/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('profile.store');
    ////Admin password change
    Route::get('/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin_change_password');
    ////Admin update password
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
    ////Admin update password
    // Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});


Route::prefix('/{role}')->middleware('auth:'.config('fortify.guard'))->name('role.')->group(function () {
    //.................... Brand New crud with Jquery ....................//
    Route::prefix('brandnew')->name('brandnew.')->group(function () {
        Route::get('/add', [BrandController::class, 'BrandnewAdd'])->name('allbrand');
        Route::post('/store', [BrandController::class, 'BrandnewStore'])->name('store');
        Route::get('/view', [BrandController::class, 'BrandnewView'])->name('view');
        Route::get('/edit/{id}', [BrandController::class, 'BrandnewEdit'])->name('edit');
        Route::post('/update/{id}', [BrandController::class, 'BrandnewUpdate'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandnewDelete'])->name('delete');
    });

    //..... old Brand crud.....//
    Route::prefix('brand')->group(function () {

        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
        Route::get('/brand/destroy/{brand_id}', [BrandController::class, 'destroy']);
    });


    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('catview');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/fetchall', [CategoryController::class, 'fetchAll'])->name('fetchAll');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    });
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('allsubcategory');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('store');
        Route::get('/fetchall', [SubCategoryController::class, 'fetchAll'])->name('fetchAll');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('update');
    });

    // Admin All Sub SUb Category Route Group
    Route::prefix('subsubcategory')->name('subsubcategory.')->group(function () {
        Route::get('/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('view');
        // sub sub category route
        Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
        // sub category route
        Route::get('/subcategory/{category_id}', [SubSubCategoryController::class, 'getOnlySubCategory']);
        // sub category route
        Route::get('/subsubcategory/{subcategory}', [SubSubCategoryController::class, 'getOnlySubSubCategory']);
        // for auto select sub sub category route
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
        //Sub  Sub category store
        Route::post('/store', [SubSubCategoryController::class, 'store'])->name('store');
        Route::get('/fetchall', [SubSubCategoryController::class, 'fetchAll'])->name('fetchAll');
        Route::get('/delete/{id}', [SubSubCategoryController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SubSubCategoryController::class, 'update'])->name('update');
    });


    // Admin Product Route Group
  Route::prefix('product')->group(function () {
        // sub  category route
        Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
        // sub sub category route
        Route::get('/subsubcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubsubCategory']);

        Route::get('/view', [ProductController::class, 'ProductAdd'])->name('product.add');
        Route::get('/details/view/{id}', [ProductController::class, 'ProductAllInfoView'])->name('product.all_info_view');
        Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product_store');
        // Manage Product
        Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
                // Edit Product
        Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
                // Upadte Product
        Route::post('/update', [ProductController::class, 'UpdateProduct'])->name('product_update');

        // For Multiple Img Update
        Route::post('/update/multiimg', [ProductController::class, 'UpdateProductMultiImg'])->name('update_product_img');
        // for Multipart Deleted
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/get/barcode/{id}/{print_quantity}', [ProductController::class, 'Barcode'])->name('Get.barcode');
        //hot deals
        Route::get('/hot_deals', [ProductController::class, 'HotDeals'])->name('porduct.hotDeals');
        Route::get('/hot_deals/{id}', [ProductController::class, 'HotDealsID'])->name('porduct.hotDealsbyid');
        Route::post('/hot_deals/store', [ProductController::class, 'HotDealsStore'])->name('deals.store');
        // For Thambnail Img Update
        Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
        //===================================Product Active And Deactive========================================
        // for Deactive
        Route::get('/deactive/{id}', [ProductController::class, 'ProductDeactive'])->name('product.deactive');
        // for Active
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

        //===================================Product Delete========================================
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        Route::get('/purshase-list/{purchase_id}', [ProductController::class, 'GetPurchase']);

        Route::get('/get/barcode/{id}/{print_quantity}', [ProductController::class, 'Barcode'])->name('Get.barcode');
    });


    // Slider  Route Group
    Route::prefix('slider')->group(function () {

        Route::get('/view', [SliderController::class, 'SliderView'])->name('manage.slider');

        Route::get('/slidersdata', [SliderController::class, 'showdata']);

        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

        Route::post('/update/{id}', [SliderController::class, 'SliderUpdate']);

        Route::post('/delete/{id}', [SliderController::class, 'SliderDelete']);

        //===================================Product Active And Deactive==================================
        // for Deactive
        Route::get('/deactive/{id}', [SliderController::class, 'SliderDeactive'])->name('slider.deactive');
        // for Active
        Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
    });

    // Admin Coupon  Route Group
    Route::prefix('cupons')->group(function () {

        Route::get('/view', [CouponController::class, 'CouponView'])->name('manage.coupon');

        Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

        Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');

        Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

        Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    }); // end coupon prefix


    // Admin Banner  Route Group
    Route::prefix('banner')->group(function () {
        Route::get('/view', [BannerController::class, 'BennarView'])->name('bennar.manage');
        Route::post('/store', [BannerController::class, 'BennarStore'])->name('bennar.store');
        Route::get('/edit/{id}', [BannerController::class, 'BennarEdit'])->name('bennar.edit');
        Route::post('/update', [BannerController::class, 'BennarUpdate'])->name('bennar.update');
        Route::get('/dalete/{id}', [BannerController::class, 'BennarDelete'])->name('bennar.delete');
        // for Deactive
        Route::get('/deactive/{id}', [BannerController::class, 'BennarDeactive'])->name('bennar.deactive');
        // for Active
        Route::get('/active/{id}', [BannerController::class, 'BennarActive'])->name('bennar.active');
    });


    // Ashim bannerCategory  Route Group
    Route::prefix('bannerCategory')->group(function () {
        Route::get('/view', [BannerCatagoryController::class, 'BennarView'])->name('bannerCategory.manage');
        Route::post('/store', [BannerCatagoryController::class, 'BennarStore'])->name('bannerCategory.store');
        Route::get('/dalete{id}', [BannerCatagoryController::class, 'BennarDelete'])->name('bannerCategory.delete');

        Route::get('/edit/{id}', [BannerCatagoryController::class, 'BennarEdit'])->name('bannerCategory.edit');
        Route::post('/update', [BannerCatagoryController::class, 'BennarUpdate'])->name('bannerCategory.update');

        // for Deactive
        Route::get('/deactive/{id}', [BannerCatagoryController::class, 'BennarDeactive'])->name('bannerCategory.deactive');
        // for Active
        Route::get('/active/{id}', [BannerCatagoryController::class, 'BennarActive'])->name('bannerCategory.active');
    });
    // Admin Orders  Route Group
    Route::prefix('orders')->group(function () {

        // pending order view
        Route::get('/pending/orders', [OrderController::class, 'PendingOrder'])->name('pending.orders');
        // Pending Orders Details
        Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.orders.details');
        // Confirmed Orders
        Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
        Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('confirm-processing');
        Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

        Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

        Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

        Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

        // update route all
        //for confirm
        Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
        // fro processing
        Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
        // for  picdate
        Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
        // for shiped
        Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

        // for delevery
        Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered_20'])->name('shipped.delivered');
        // for cancel
        Route::get('/delivered/cancel/{order_id}', [OrderController::class, 'DeliveredToCancel'])->name('delivered.cancel');
        // Order Invoice Download
        Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    }); // end coupon prefix

    // Admin Product Strock Routes
    Route::prefix('stock/')->group(function () {
        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    }); // end Product Stock

    // Admin All user role###########################################################################
    Route::prefix('adminuserrole')->group(function () {
           Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
        Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
        Route::get('/emp.permision', [AdminUserController::class, 'EmpPermison'])->name('emp.permision');
        Route::get('/sup.permision', [AdminUserController::class, 'SupPermison'])->name('sup.permision');
        Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
        Route::post('/supplier/store', [AdminUserController::class, 'StoreSupplierRole'])->name('admin.supplier.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
        Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
    }); // All user role

    ////////////////SUPPLIERS ROUTE--------Start ############
    Route::prefix('suppliers')->group(function () {
        Route::get('/view', [SupplierController::class, 'show'])->name('suppliers.show');
        Route::post('/supplier/insertData', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::get('/supplier/all', [SupplierController::class, 'SupplierDataShowAll']);
        Route::get('/supplier/delete/{id}', [SupplierController::class, 'SupplierDataDeleteAll']);
        Route::get('/supplier/edit/{id}', [SupplierController::class, 'SupplierEditAll']);
        Route::post('/supplier/updateData/{id}', [SupplierController::class, 'SupplierUpdateAll']);
        Route::get('/supplier/Active/al/{id}', [SupplierController::class, 'SupplierActive'])->name('SupplierActive');
        Route::get('/supplier/Deactive/all/{id}', [SupplierController::class, 'SupplierDeactive'])->name('SupplierDeactive');
        
           //////////////new supplier add////////////////////
        Route::get('/dashboard', [SupplierDashboardController::class, 'supplierDashboard'])->name('demo');
        Route::get('/product_list', [SupplierDashboardController::class, 'supplierProduct'])->name('supplier.product');
        Route::get('/payment', [SupplierDashboardController::class, 'supplierPayment'])->name('supplier.payment');
        Route::get('/return_product', [SupplierDashboardController::class, 'supplierReturnProduct'])->name('supplier.return_product');


    });

    // Admin Get All User Routes
    Route::prefix('alluser')->group(function () {
        // All user view
        Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
        Route::get('/show/{id}', [AdminProfileController::class, 'show'])->name('all-users-show');
    }); // end user Get


    Route::prefix('return')->group(function () {
        // Return Request Show
        Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
        // Return Request Approve
        Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');
        // Return All Request
        Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
    });

    // Admin Site Setting Routes (logo, social link etc)
    Route::prefix('setting')->group(function () {
        // view
        Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
        // update
        Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
        // Seo
        Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
        // Seo Meta data
        Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
    });

    // Admin Coupon  Route Group
    Route::prefix('shipping')->group(function () {


        /// ship Division
        Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage.division');

        Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

        Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

        Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

        Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

        /// ship District
        Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage.district');
        /// ship District
        Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage.district');
        Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
        Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
        Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistricUpdate'])->name('district.update');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistricDelete'])->name('district.delete');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistricDelete'])->name('district.delete');
        /// Ship State
        Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage.state');
        Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
        Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
        Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
        Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');    });

    //  General Setting
    Route::prefix('general_setting')->group(function () {
        Route::get('/view', [GeneralController::class, 'GeneralAdd'])->name('general_setting.view');
    });


    //  Language Setting
    Route::prefix('language')->group(function () {
        Route::get('/view', [LanguageController::class, 'LanguageAdd'])->name('laguage.view');
        Route::get('/information_view', [LanguageController::class, 'Language_InformationAdd'])->name('laguage_information.view');
    });


    //  Currency Setting
    Route::prefix('currency')->group(function () {
        Route::get('/view', [CurrencyController::class, 'CurrencyAdd'])->name('currency.view');
        Route::get('/currency_information_view', [CurrencyController::class, 'Currency_InfoAdd'])->name('currency_information.view');
    });


    // SMTP
    Route::prefix('smtp')->group(function () {
        Route::get('/view', [SMTPController::class, 'SMTP_Add'])->name('smtp.view');
    });


    // Payment Method
    Route::prefix('payment_method')->group(function () {
        Route::get('/view', [PaymentMethodController::class, 'PaymentMethodAdd'])->name('payment_method.view');
    });


    // File System Configuration
    Route::prefix('file_system_configuration')->group(function () {
        Route::get('/view', [FileSystem_ConfigurationController::class, 'FileSystem_Configuration_Add'])->name('file_system_configuration.view');
    });


    //  Social Media Login
    Route::prefix('social_media_login')->group(function () {
        Route::get('/view', [Social_Media_LoginController::class, 'SocialMediaLogin_Add'])->name('social_media_login.view');
    });


    //  Third Party Setting
    Route::prefix('third_party_setting')->group(function () {
        Route::get('/view', [ThirdPartySettingController::class, 'ThirdPartySetting_Add'])->name('third_party_setting.view');
    });


    //  Shipping Countries
    Route::prefix('shipping_countries')->group(function () {
        Route::get('/view', [ShippingCountriesController::class, 'Shipping_CountriesAdd'])->name('shipping_countries.view');
    });


    //  Shipping States
    Route::prefix('shipping_states')->group(function () {
        Route::get('/view', [ShippingStatesController::class, 'Shipping_StatesAdd'])->name('shipping_states.view');
    });


    //  Shipping Cities
    Route::prefix('shipping_cities')->group(function () {
        Route::get('/view', [ShippingCitiesController::class, 'ShippingCitiesAdd'])->name('shipping_cities.view');
    });
    // Shipping Zone & Shipping Information
    Route::prefix('shipping_zone')->group(function () {
        Route::get('/view', [ShippingZoneController::class, 'ShippingZoneAdd'])->name('shipping_zone.view');
        Route::get('/information_view', [ShippingZoneController::class, 'ShippingZoneInformationAdd'])->name('shipping_zone.information_view');
    });



    // Tax
    Route::prefix('tax')->group(function () {
        Route::get('/view', [TaxController::class, 'TaxAdd'])->name('tax.view');
    });


    // Admin Reports Routes
    Route::prefix('reports')->group(function () {
        Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
        // Search Date Report
        Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
        // Search Month Report
        Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
        // Search Year Report
        Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
        //sallery report
        route::get('/sallary-view', [ReportController::class, 'SalaryReportView'])->name('sallary-report-view');
        route::post('/sallary', [ReportController::class, 'SalaryReport'])->name('sallary-report');
        //return report

        route::get('/return-product-view', [ReportController::class, 'returnReportView'])->name('return-report-view');
        route::post('/return-product', [ReportController::class, 'returnReport'])->name('return-report');

        //sallery report
        route::get('/user-activity-view', [ReportController::class, 'UserActivityReportView'])->name('User-activity-view');
        route::get('/user-activity', [ReportController::class, 'UserActivityReport'])->name('User-activity-report');

        route::get('/profitreport', [ReportController::class, 'ProfitReportView'])->name('profit.report');
        route::post('/profitreport/day', [ReportController::class, 'ProfitReportDay'])->name('profit.day');
        route::post('/profitreport/month', [ReportController::class, 'ProfitReportMonth'])->name('profit.month');
        route::post('/profitreport/year', [ReportController::class, 'ProfitReportYear'])->name('profit.year');

        // purchase report
        route::get('/purchasereport', [ReportController::class, 'PurchaseReportView'])->name('purchase.report');
        route::post('/purchasereport/store', [ReportController::class, 'PurchaseReportStore'])->name('purchase.report.store');
        route::get('/purchasereport/view', [ReportController::class, 'PurchaseReportViews'])->name('purchase.report.view');

        // sales report
        route::get('/salesreport', [ReportController::class, 'SaleReportView'])->name('sale.report');
        // Search Date Report
        Route::post('/sale/search/by/date', [ReportController::class, 'SaleReportByDate'])->name('sale-search-by-date');
        // Search Month Report
        Route::post('/sale/search/by/month', [ReportController::class, 'SaleReportByMonth'])->name('sale-search-by-month');
        // Search Year Report
        Route::post('/sale/search/by/year', [ReportController::class, 'SaleReportByYear'])->name('sale-search-by-year');
        route::get('/sale/salesreport/view', [ReportController::class, 'SaleReportShow'])->name('sale.report.show');

         // Category Wise Product Report
        route::get('/catwiseproductreport', [ReportController::class, 'CatWiseProReportView'])->name('catwiseproduct.report');
        route::post('/catwiseproductreport/get', [ReportController::class, 'getCatWiseProReport'])->name('getcatwiseproduct.report');

        //Product Stock Report
        route::get('/productstockreport',[ReportController::class,'productstockreport'])->name('gy.report');
        route::post('/getproductstockreport',[ReportController::class,'getproductstock'])->name('getstock.report');
    });  // end Reports



    Route::prefix('department')->group(function () {
        Route::get('/view', [DepartmentController::class, 'DepartmentView'])->name('department.view');
        Route::post('/store', [DepartmentController::class, 'DepartmentStore'])->name('department.store');
        Route::post('/edit', [DepartmentController::class, 'DepartmentEdit'])->name('department.edit');
        Route::post('/update', [DepartmentController::class, 'DepartmentUpdate'])->name('department.update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'DepartmentDelete'])->name('department.delete');
    });
    Route::prefix('expense')->group(function () {
        Route::get('/addview', [ExpenseController::class, 'ExpenseView'])->name('expense.add');
        Route::get('/list', [ExpenseController::class, 'ExpenseList'])->name('expense.list');
        Route::post('/store', [ExpenseController::class, 'ExpenseStore'])->name('expense.store');
        Route::get('/edit/{id}', [ExpenseController::class, 'ExpenseEdit'])->name('expense.edit');
        Route::post('/update', [ExpenseController::class, 'ExpenseUpdate'])->name('expense.update');
        Route::post('/addexpensetype', [ExpenseController::class, 'AddecpenseType'])->name('add.expnse.type');
        Route::get('/getexpensetype', [ExpenseController::class, 'GetExpenseType'])->name('get.expnse.type');
        Route::get('/report', [ExpenseController::class, 'GanerateReport'])->name('report.expense');
    });


    //  Employee Route Group
    Route::prefix('pos')->group(function () {
        Route::get('/pos', [PosController::class, 'pos'])->name('pos');
        Route::get('/search/{id}', [PosController::class, 'search']);
        Route::get('/product/list/{categorie_id}', [PosController::class, 'PosProductList'])->name('product.list');
        Route::get('/brand/product/list/{brand_id}', [PosController::class, 'PosBrandProductList'])->name('brand.product.list');
        Route::post('/carts/add/{product_id}', [PosCartController::class, 'addProductToCart'])->name('pos.product.add');
    });

    // for department employee salary
    Route::prefix('salary')->group(function () {

        Route::get('/add', [EmployeeSalary::class, 'AddSalary'])->name('salary-add');
        Route::get('/get_employee/{id}', [EmployeeSalary::class, 'getEmployee'])->name('get.employee');
        Route::post('/get_employee', [EmployeeSalary::class, 'find'])->name('employee.find');
        Route::post('/salary_payment', [EmployeeSalary::class, 'getSalary'])->name('payment_salary');
        Route::get('/paid_salary', [EmployeeSalary::class, 'paidSalary'])->name('paid_salary');
    });

    // purchase routes
    Route::prefix('purchase')->group(function () {
        // All purchase  view
        Route::get('/view', [PurchaseController::class, 'PurchaseView'])->name('purchase.view');
        Route::get('/add', [PurchaseController::class, 'AddPurchase'])->name('purchase.add');
        Route::post('/store', [PurchaseController::class, 'PurchaseStore'])->name('purchase.store');
        Route::get('/delete/{id}', [PurchaseController::class, 'PurchaseDelete'])->name('purchase.delete');
        // Edit purchase
        Route::get('/edit/{id}', [PurchaseController::class, 'PurchaseEdit'])->name('purchase.edit');
        // Upadte purchase
        Route::post('/update', [PurchaseController::class, 'PurchaseUpdate'])->name('purchase.update');
        //Employee Full View
        Route::get('/details/{id}', [PurchaseController::class, 'PurchaseDetails'])->name('purchase.details');
        Route::get('/qty/{id}', [PurchaseController::class, 'qty']);
        Route::get('/getCategoryByProduct/{product}', [PurchaseController::class, 'getCategoryByProduct']);
    });

    Route::prefix('employeer')->group(function () {
        Route::get('/view', [EmployeeController::class, 'EmployeeView'])->name('employee.view');
        Route::get('/addform', [EmployeeController::class, 'EmployeeAddForm'])->name('employee.addform');
        Route::post('/store', [EmployeeController::class, 'EmployeeStore'])->name('employee.store');
        // Edit Employee
        Route::get('/edit/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employee.edit');
        // Upadte Employee
        Route::post('/update', [EmployeeController::class, 'EmployeeUpdate'])->name('employee.update');

        //Employee Full View
        Route::get('/details/{id}', [EmployeeController::class, 'EmployeeDetails'])->name('employee.details');

        Route::get('/delete/{id}', [EmployeeController::class, 'EmployeetDelete'])->name('employee.delete');
    });
});

// Multi language
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');
// product detail route
// 2020
// Route::get('/product/detail/{cat_slug}/{subcat_slug}/{subsubcat_slug}/{slug}', [IndexController::class, 'ProductDetails'])->name('ProductDetails');
Route::get('/product/detail/{cat_slug}/{subcat_slug}/{slug}', [IndexController::class, 'ProductDetails'])->name('ProductDetails');
// Frontend tags page route
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}', [IndexController::class, 'SubCatWiseProduct']);
// Frontend Sub  SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}', [IndexController::class, 'SubSubCatWiseProduct']);
// Product view model ajax card
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Product Add to cart route ajax  use in package
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Product mini Cart ajax data
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart product
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist product
Route::get('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

######### Start Product wishlist only view Auth user in use middleware ###########
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {

    // Product Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    // Product Wishlist show data
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    // Remove  Wishlist Product
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    // for paytmet gatway route
    // Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');


    // cash on delivery
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    // My orders page
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');


    // user order_details
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

    // PDF invoices download
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    // Order Return Route
    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

    // order return list
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    // order cancel
    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');

    // /// Order Traking Route
    // Route::get('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

    Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');
    // user order_cancelorder
    Route::get('/cancelorder/{id}', [AllUserController::class, 'CancelOrder']);
});
####### End Product wishlist only view Auth user in use middleware  #############
// My cart page view
Route::get('/user/mycart', [PageCartController::class, 'MyCart'])->name('mycart');

// My Cart show data
Route::get('/user/get-cart-product', [PageCartController::class, 'GetCartProduct']);

// Remove  Wishlist Product
Route::get('/user/cart-remove/{rowId}', [PageCartController::class, 'RemoveCartProduct']);

// product increment botton route
Route::get('/cart-increment/{rowId}', [PageCartController::class, 'CartIncrement']);

// product Decrement botton route
Route::get('/cart-decrement/{rowId}', [PageCartController::class, 'CartDecrement']);


// Frontend Coupon  apply
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

// Frontend Coupon Calculation
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

// Coupon Remove
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

//################# start Checkout Route //####################
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/checkout/info', [CartController::class, 'CheckoutInfo'])->name('checkout.info');
Route::get('/checkout/info/all', [CartController::class, 'CheckoutInfoAll'])->name('checkout.info.all');
Route::get('/checkout/info/select/check/{id}', [CartController::class, 'CheckoutInfoSelect']);
Route::post('/checkout/info/delete', [CartController::class, 'CheckoutInfoDelete'])->name('checkout.info.delete');
Route::post('/checkout/process', [CartController::class, 'CheckoutProcess'])->name('checkout.process');
// Check out store route
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.storeorder');

//change payment route
Route::get('/changepayment/option/{order_id}', [CheckoutController::class, 'ChangePayment'])->name('change.payment');


//################ End Checkout Route //####################

//################ Division District and state auto select Route //################
// district
Route::get('/district/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
// State
Route::get('/state/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
//#################  End Division District and state auto select Route  //#############
/// Product Search Route
Route::get('product/search', [IndexController::class, 'ProductSearch'])->name('product.search');
Route::get('product/searchColor/{color}', [IndexController::class, 'searchByColor'])->name('product.searchColor');
Route::get('product/searchCategory/{category}', [IndexController::class, 'searchByCategory'])->name('product.searchCategory');
Route::get('product/Category/{category}', [IndexController::class, 'categoryByProduct'])->name('product.categoryProduct');
Route::get('product/searchSubSubCategory/{category}', [IndexController::class, 'searchBySubSubCategory'])->name('product.searchSubSubCategory');
Route::get('product/latestProduct', [IndexController::class, 'latestProduct'])->name('product.latestProduct');
Route::get('product/AllProduct', [IndexController::class, 'allProduct'])->name('product.allProduct');
Route::get('product/PopularProduct', [IndexController::class, 'popularProduct'])->name('product.popularProduct');
Route::get('product/SpecialOfferProduct', [IndexController::class, 'specialOffer'])->name('product.specialOffer');
Route::get('product/SpecialDealProduct', [IndexController::class, 'specialDeal'])->name('product.specialDeal');

// Shop Page Route
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');

//Facebook Login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [SocialiteLoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [SocialiteLoginController::class, 'handleFacebookCallback']);
// google login
Route::get('login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);

// Twitter Login
Route::get('login/twitter', [App\Http\Controllers\Auth\LoginController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('login/twitter/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleTwitterCallback']);
//subscribe route start
Route::post('/subscribe', [IndexController::class, 'subscribe'])->name('subscribe');
//subscribe route end
//Review route start
Route::post('/product/review/{id}', [IndexController::class, 'review'])->name('product.review');
//Review Search end

//contact US
Route::get('/contact-us', function () {
    return view('frontend.contact.contact_us');
})->name('contact');

Route::post('/contact-us/send', [IndexController::class, 'contactUs'])->name('contactUs.send');

//contact Us End
// Admin All Department Route Group
Route::get('/getSubCategory/{id}', [IndexController::class, 'getSubCategoryForSidebar']);
Route::get('/getSubSubCategory/{id}', [IndexController::class, 'getSubSubCategoryForSidebar']);
Route::get('/SubSubCategory/{id}', [IndexController::class, 'getSubSubSubCategoryForSidebar']);

Route::get('/clearSession', function () {
    session()->flash('carts', 'Task was successful!');
    return 'clear';
});



// for pos using database
Route::post('search/product/filter', [AdminCartController::class, 'filterProduct']);
Route::post('add/carts/product/{product}', [AdminCartController::class, 'AddToCart']);
Route::post('add/carts/product/filter/{category}', [AdminCartController::class, 'filterCategory']);
Route::post('add/carts/brand/filter/{brand}', [AdminCartController::class, 'filterBrand']);
Route::get('get/carts/product', [AdminCartController::class, 'GetCart']);
Route::get('remove/carts/product/{id}', [AdminCartController::class, 'RemoveCart']);
Route::get('increment/carts/product/{id}', [AdminCartController::class, 'IncrementProductCart']);
Route::get('decrement/carts/product/{id}', [AdminCartController::class, 'DecrementProductCart']);
Route::get('clear/carts/product', [AdminCartController::class, 'ClearProductCart']);
Route::post('add/order/product/confirm', [AdminCartController::class, 'OrderConfirm']);
Route::get('add/order/posview', [AdminCartController::class, 'orderrecipt']);
Route::post('add/new/customer', [AdminCartController::class, 'AddCustomer'])->name('add.new.customer');
Route::post('hold/order/product', [AdminCartController::class, 'HoldOrder']);
Route::get('get/hold/order/product', [AdminCartController::class, 'GetHoldOrder']);
Route::get('get/hold/order/product/item/{id}', [AdminCartController::class, 'GetHoldOrderItem']);
Route::get('show/hold/order/product/{id}', [AdminCartController::class, 'ShowHoldOrderItem']);

// All charts Route start
// for DoughnutChartOne
Route::get('/get/donut', [AdminController::class, 'DoughnutChartOne']);

//for BarChart
Route::get('/get/bar', [AdminController::class, 'barChart']);

// for morris donut chart
Route::get('/get/morris', [AdminController::class, 'morrisChart']);

//for pie chart
Route::get('/get/pie', [AdminController::class, 'pieChart']);
// Tax
Route::prefix('tax')->group(function () {
    Route::get('/view', [TaxController::class, 'TaxAdd'])->name('tax.view');
});


Route::get('/get/productSort/{sub_sub_category_id}', [IndexController::class, 'GetProductsSort']);
Route::get('/get/subproductSort/{sub_category_id}', [IndexController::class, 'GetProductsSort2']);
Route::post('/post/filteredProduct/', [IndexController::class, 'GetFilteredProducts']);
Route::post('/post/filteredProduct2/', [IndexController::class, 'GetFilteredProducts2']);
Route::get('/latestdiscountedproducts', [IndexController::class, 'LatestDiscountedProducts'])->name('latestdiscountedproducts.view');
Route::get('/all_category', [IndexController::class, 'test'])->name('all_category.view');
// Route::get('/product-search', [IndexController::class, 'searchProduct'])->name('searchproduct.view');
Route::get('/product/ajax/suggest/search', [IndexController::class, 'searchByProductName'])->name('searchproduct.view');
Route::get('/getSubCategory/{id}', [IndexController::class, 'getSubCategoryForSidebar'])->name('get.subcat');
Route::get('/getSubSubCategory/{id}', [IndexController::class, 'getSubSubCategoryForSidebar'])->name('get.subsubcat');
Route::get('/SubSubCategory/{id}', [IndexController::class, 'getSubSubSubCategoryForSidebar']);
// Special Offer
Route::get('/special/offer', [IndexController::class, 'Offer'])->name('specialoffer.view');
// Available Coupon offer
Route::get('/coupon/offer', [IndexController::class, 'Coupon'])->name('coupon.view');
// filtering category
Route::get('get_causes_against_category/{id}', [IndexController::class, 'get_causes_against_category']);
// filtering sub category
Route::get('get_causes_against_subcategory/{id}', [IndexController::class, 'get_causes_against_subcategory']);
// filtering sub sub category
Route::get('get_causes_against_subsubcategory/{id}', [IndexController::class, 'get_causes_against_subsubcategory']);
// filtering category sort
Route::get('get_causes_against_categorysort', [IndexController::class, 'get_causes_against_categorysort']);
// filtering category sort
Route::get('get_causes_against_subcategorysort/{id}', [IndexController::class, 'get_causes_against_subcategorysort']);
Route::get('get_causes_against_subsubcategorysort/{id}', [IndexController::class, 'get_causes_against_subsubcategorysort']);
Route::get('/404', [IndexController::class, 'ErrorPage'])->name('get.error');
// --------- Frontend Footer Information route start ------------//
// Privacy & Policy route
Route::get('/privacy' , [InformationController::class,'privacy'])->name('info.privacy');
Route::get('/about' , [InformationController::class,'aboutPage'])->name('info.aboutPage');
Route::get('/terms&condition' , [InformationController::class,'termsCondition'])->name('info.terms');
Route::get('/returnpolicy' , [InformationController::class,'returnPolicy'])->name('info.policy');
// --------- Frontend Footer Information route  end ------------//


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/sendMessage',[UserController::class,'sendSms']);

Route::get('/supplier/all', [IndexController::class, 'SupplierDataShowAll']);




Route::get('/product/ajax/suggest/search', [IndexController::class, 'searchByProductName'])->name('searchproduct.ajax');
Route::get('/product/view/suggest/search', [IndexController::class, 'searchByProductNameView'])->name('searchproduct.view');





// Sidebar Search Route Start
Route::prefix('bs')->group(function () {
Route::get('/category_view', [IndexController::class, 'CategoryView'])->name('category.view');
Route::get('/{cat_slug}', [IndexController::class, 'SubCategoryView'])->name('subcategory.view');
Route::get('/{cat_slug}/{subcat_slug}', [IndexController::class, 'SubSubCategoryView12'])->name('subsubcategory.view');
Route::get('/{cat_slug}/{subcat_slug}/{subsubcat_slug}', [IndexController::class, 'GetProductView1'])->name('getproduct.view');
    });
// Sidebar Search Route End





