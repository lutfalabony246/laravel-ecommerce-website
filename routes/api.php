<?php

use Illuminate\Http\Request;
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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[UserController::class, 'loginAPI'] );
Route::post('loginWithOtp',[UserController::class, 'loginWithOtp'] );
Route::post('login/Email',[UserController::class, 'loginWithEmail'] );
Route::post('newregister',[UserController::class, 'registerapi'] )->name('newregister');





