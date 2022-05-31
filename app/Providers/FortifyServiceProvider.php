<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\StatefulGuard;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Controllers\AdminController;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\LoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {



        if(request()->is('/*'))
        {
            config()->set('fortify.guard','web');
            config()->set('fortify.home','/');
        }

        if (request()->is('employeer/*')) {
            config()->set('fortify.guard', 'employeer');
            config()->set('fortify.home', 'employeer/dashboard');
        }
        if(request()->is('admin/*'))
        {
            config()->set('fortify.guard','admin');
            config()->set('fortify.home','admin/dashboard');
        }

       $this->app->when([AdminController::class, AttemptToAuthenticate::class, RedirectIfTwoFactorAuthenticatable::class ])
            ->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard('admin');
        });

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {

                // dd(Cart::count());
                // dd("this is hitting");
                if($request->is('admin/*')){
                    return redirect()->intended(route('admin.dashboard'));
                }
                if($request->is('employeer/*')){
                    return redirect()->intended(route('employeer.dashboard'));
                }
                if(Cart::count() == 0 ){
                    return redirect()->intended(route('dashboard'));
                }
                else{
                    return redirect()->intended(route('mycart'));
                }

                // if(request()->is('super-admin/*'))
                // {
                //     config()->set('fortify.guard','super-admin');
                //     config()->set('fortify.home','super-admin/dashboard');
                // }


            }
        });



        Fortify::authenticateUsing(function (Request $request) {
            // dd(config('fortify.guard'));
            if(config('fortify.guard') == 'employeer'){
                $employee = Employee::where('email_id',$request->email)->first();
                if ($employee &&
                    Hash::check($request->password, $employee->password)) {
                    return $employee;
                }
                else{
                    return null;
                }
            }
            if(config('fortify.guard') == 'admin'){
                $admin = Admin::where('email',$request->email)->first();
                if ($admin &&
                    Hash::check($request->password, $admin->password)) {
                    return $admin;
                }
                else{
                    return null;
                }
            }
            else{
                $user = User::where('email', $request->email)->first();

                if ($user &&
                    Hash::check($request->password, $user->password)) {
                    return $user;
                }
                else{
                    return null;
                }

            }

        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton(
            \Laravel\Fortify\Contracts\LogoutResponse::class,
            \App\Http\Responses\LogoutResponse::class
        );
        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
