<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// for user online and offline
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
      

        // user  active and deactive online or offline
        if (Auth::check()) {
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online' . Auth::user()->id, true, $expireTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
         } // end 



        if (Auth::check() && Auth::user()) {
            return $next($request);
         }else {
             return redirect()->route('login');
         }  



    }
}
